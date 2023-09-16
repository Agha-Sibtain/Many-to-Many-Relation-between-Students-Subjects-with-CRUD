<?php

namespace App\Http\Controllers;

use App\Models\Subjects;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $subject = Subjects::orderBy('id','desc')->paginate(10);
        return view('subjects.index', compact('subject'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('subjects.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        
        Subjects::create($request->post());

        return redirect()->route('subjects.index')->with('success','Subject has been created successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Subjects  $Subjects
    * @return \Illuminate\Http\Response
    */
    public function show(Subjects $subject)
    {
        return view('subjects.show',compact('subject'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Subjects $Subjects
    * @return \Illuminate\Http\Response
    */
    public function edit(Subjects $subject)
    {
        return view('subjects.edit',compact('subject'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Subjects  $Subjects
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Subjects $subject)
    {
        $request->validate([
            'name' => 'required',
        ]);
        
        $subject->fill($request->post())->save();

        return redirect()->route('subjects.index')->with('success','Subject Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Subjects $Subjects
    * @return \Illuminate\Http\Response
    */
    public function destroy(Subjects $subject)
    {
        $subject->delete();
        return redirect()->route('subjects.index')->with('success','Subject has been deleted successfully');
    }
}