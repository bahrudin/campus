<?php
/*
 * Copyright (c) 2024. Bahrudin Ardiansyah | bahrudin.no8@gmail.com
 */

namespace App\Http\Controllers;

use App\Http\Requests\Academics\StudentAddRequest;
use App\Http\Requests\Academics\StudentEditRequest;
use App\Models\Document;
use App\Models\Lesson;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('students.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|never
     * @throws \Exception
     */
    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $students = Student::query()->latest()->select('*')
                ->where('nik', 'like', '%' . $request->get('getName') . '%')
                ->orWhere('name', 'like', '%' . $request->get('getName') . '%')
                ->orWhere('address', 'like', '%' . $request->get('getName') . '%')
                ->orWhere('gender', 'like', '%' . $request->get('getName') . '%')
                ->get();

            foreach ($students as $student) {
                $student->total_lessons = $student->lessons->count();
            }

            return Datatables::of($students)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="btn-group">';
                    $btn .= '<a href="' . route('students.edit', $row->id) . '" class="btn btn-warning btn-sm">Ubah</a>';
                    $btn .= '<a href="javascript:void(0)" data-id="' . $row->id . '" class="btn btn-danger btn-sm btnDelete">Hapus</a>';
                    $btn .= '</div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return abort('404');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentAddRequest $request)
    {
        $student = Student::create($request->only(['nik', 'name', 'gender', 'address']));
        $student->lessons()->sync($this->convertArrayMap($request->addMore));

        if ($request->uploadDoc != '') {
            $randomNumber = str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT);
            $currentDate = now()->format('Ymd');
            $fileName = $request->nik . '-' . $currentDate . '-' . $randomNumber . '.' . $request->file('uploadDoc')->getClientOriginalExtension();
            $filePath = 'document-students';
            //upload to server
            $request->file('uploadDoc')->storeAs($filePath, $fileName, 'public');
            //saved file
            $student->documents()->save(new Document([
                'slug' => $fileName,
                'file_path' => $filePath,
                'full_path' => $filePath.'/'.$fileName
            ]));

        }

        return redirect()->back()->withInput()->with('success', 'Add data success');
    }

    /**
     * @param $data
     * @return array
     */
    public function convertArrayMap($data)
    {
        $lessonIds = collect($data)->map(function ($item, $key) {
            return $item['lesson'];
        });
        return $lessonIds->all();
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $lessons = Lesson::all();
        return view('students.edit', compact(['student','lessons']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentEditRequest $request, Student $student)
    {
        $student->update([
            'nik' => $request->nik,
            'name' => $request->name,
            'gender' => $request->gender,
            'address' => $request->address
        ]);

        // Sync (sinkronkan) mata kuliah yang diambil oleh mahasiswa
        // $student->lessons()->sync($request->lessons);
        $student->lessons()->sync($this->convertArrayMap($request->addMore));

        if ($request->uploadDoc != '') {
            //check file
            foreach ($student->documents()->get() as $doc) {
                if (Storage::disk('public')->exists('document-students/' . $doc->slug)) {
                    Storage::disk('public')->delete('document-students/' . $doc->slug);
                }
            }
            //Hapus data di table
            $student->documents()->delete();

            $randomNumber = str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT);
            $currentDate = now()->format('Ymd');
            $fileName = $request->nik . '-' . $currentDate . '-' . $randomNumber . '.' . $request->file('uploadDoc')->getClientOriginalExtension();
            $filePath = 'document-students';
            //upload to server
            $request->file('uploadDoc')->storeAs($filePath, $fileName, 'public');
            //saved file
            $student->documents()->save(new Document([
                'slug' => $fileName,
                'file_path' => $filePath,
                'full_path' => $filePath.'/'.$fileName
            ]));

        }
        return redirect()->back()->withInput()->with('success', 'Data updated success.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        try {
            //cek file upload
            if ($student->documents()->count() > 0) {
                foreach ($student->documents()->get() as $doc) {
                    if (Storage::disk('public')->exists('document-students/' . $doc->slug)) {
                        Storage::disk('public')->delete('document-students/' . $doc->slug);
                    }
                }
                $student->documents()->delete();
            }

            //cek study campus
            if ($student->lessons()->count() > 0) {
                $student->lessons()->detach();
                //$student->lessons()->delete();
            }

            //Cek master Row
            if ($student->delete()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Deleted successfully.'
                ]);
            }
        } catch (\Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => 'Deleted fail.',
                'data' => $ex->getMessage()
            ]);
        }
        return abort('404');
    }
}
