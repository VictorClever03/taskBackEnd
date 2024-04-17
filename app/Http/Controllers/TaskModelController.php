<?php

namespace App\Http\Controllers;

use App\Models\TaskModel;
use Illuminate\Http\Request;

class TaskModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // para pegar todos registros
        $tasks = TaskModel::all();
        return response()->json($tasks,200);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $store=TaskModel::create($data);

        return  response()->json( $store,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TaskModel  $taskModel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = TaskModel::find($id);
        if(!$task){
            return response()->json(["error"=>"task not found"],404);
        }
        return response()->json($task,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TaskModel  $taskModel
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TaskModel  $taskModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        if (!$task = TaskModel::find($id)) {
            return response()->json(["error"=> "task not found"],404);
        }
        $data = $request->all();


        $task->update($data);

        return response()->json($task,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaskModel  $taskModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // forma 1
        $task = TaskModel::find($id);
        if (!$task) {
            return response()->json(["error"=> "task not found"],404);

        }

        $task->delete();
        return response()->json($task, 200);

        // forma 2
        // TaskModel::where('id', $id)->delete();




    }
    public function search(Request $request)
    {

        $tasks = TaskModel::where('title', '=', "{$request->search}")
            ->orwhere('title', 'LIKE', "%{$request->search}%")->paginate(3);
        return response()->json($tasks ,200);
    }
}
