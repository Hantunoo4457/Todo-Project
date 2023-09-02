<?php

namespace App\Http\Controllers;

use App\Http\Requests\ToDoRequest;
use App\Http\Resources\ToDoResource;
use App\Models\ToDo;
use Illuminate\Http\Request;

class ToDoController extends Controller
{
    public function todo($name){
        $todo = Todo::where('title','LIKE','%'.$name.'%')->paginate(4);
        return response()->json([
            "message" => 'sus',
            'data' => $todo
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ToDo::paginate(4);

        // return response()->json([
        //     'data' => ToDoResource::collection($todos)
        // ],200);
     }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ToDoRequest $request)
    {
        $todo = new ToDo();
        $todo->title = $request->title;
        $todo->todo = $request->todo;
        $todo->save();
        return response()->json([
            'data' => new ToDoResource($todo)
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ToDo $to_do)
    {
        return response()->json([
            'data' => new ToDoResource($to_do)
        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ToDoRequest $request, ToDo $to_do)
    {
        $to_do->title = $request->title;
        $to_do->todo = $request->todo;
        $to_do->update();
        return response()->json([
            'data' => new ToDoResource($to_do)
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ToDo $to_do)
    {
        $to_do->delete();
        return response()->json([
            'data' => []
        ],204);
    }
}
