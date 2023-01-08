<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tasks = Task::with('getUser');
        if($request->get('user_id')){
            $tasks = $tasks->where('user_id',$request->get('user_id'));
        }
        $tasks = $tasks->get();
        $users = User::get();
        return view('Task.index',compact('tasks','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Task.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',   
            'image' => 'mimes:jpg,jpeg,png,gif,JPG,JPEG,svg,SVG' 
        ]);
        try{
            $task = new Task();
            $task->title = $request->title;
            $task->description = $request->description;
            $task->status = 1;
            if ($request->hasfile('image')) {
                $name = $request->file('image')->getClientOriginalName();
                $request->file('image')->store('public/images'); 
                $task->image = $name;
            }
            $task->user_id = Auth::user()->id;
            $task->save();
            return redirect()->route('tasks.index')->with('success',"Başarıyla eklendi");
        }catch(\Exception $e){
            return back()->withInput()->with('error',$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
