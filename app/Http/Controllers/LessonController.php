<?php
/*
 * Copyright (c) 2024. Bahrudin Ardiansyah | bahrudin.no8@gmail.com
 */

namespace App\Http\Controllers;

use App\Http\Requests\Academics\LessonAddRequest;
use App\Http\Requests\Academics\LessonEditRequest;
use App\Models\Lesson;
use App\Models\Student;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('lessons.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|never
     * @throws \Exception
     */
    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $lessons = Lesson::query()->latest()->get();

            return Datatables::of($lessons)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="btn-group">';
                    $btn .= '<a href="javascript:void(0)" data-id="' . $row->id . '" data-toggle="tooltip" data-original-title="Edit" class="btn btn-warning btn-sm btn-edit">Ubah</a>';
                    $btn .= '<a href="javascript:void(0)" data-id="' . $row->id . '" data-toggle="tooltip" data-original-title="Delete" class="btn btn-danger btn-sm btn-delete">Hapus</a>';
                    $btn .= '</div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return abort('404');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LessonAddRequest $request)
    {
        $newData = Lesson::create($request->all());

        return response()->json(['success' => true, 'message' => 'New entry successfully.', 'data' => $newData]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Lesson $lesson)
    {
        return response()->json($lesson);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LessonEditRequest $request, string $id)
    {
        try {
            $lesson = Lesson::find($id);
            $lesson->update($request->all());
            return response()->json(['success' => true,'message' => 'Update successfully','data' => $lesson]);
        }catch (\Exception $ex){
            return response()->json(['success' => false,'message' => 'Update fail','errors' => $ex->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson)
    {
        try {
            if ($lesson->students()->exists()) {
                //ada relasi jangan di hapus
                return response()->json(['success'=>false,'message' => 'Data berelasi dengan lainnya','errors'=> 'relasi data'], 422);
            }

            if ($lesson->delete()){
                return response()->json(['success' => true,'message' => 'Deleted successfully', 'data'=>$lesson],200);
            }
        }catch (\Exception $ex) {
            return response()->json(['success' => false,'message' => 'Update fail','errors' => $ex->getMessage()], 500);
        }
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function autocomplete(Request $request)
    {
        $movies = [];
        if($request->has('q')){
            $search = $request->q;
            $movies = Lesson::select("id", "title")
                ->where('title', 'LIKE', "%$search%")
                ->get();
        }
        return response()->json($movies);
    }
}
