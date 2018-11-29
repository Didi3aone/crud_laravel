<?php

namespace App\Http\Controllers;

use App\Studens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use function Psy\debug;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $students = Studens::orderBy('id')->get();
	    // print_r($students);
        return view('students.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
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
	    Studens::create($data);

	    Session::flash('message', $data['name'] . ' added successfully');
	    return redirect('/students');
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
    	$student = Studens::find($id);
        return view('students/edit', ['student' => $student]);
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
        $student = Studens::find($id);
        $data = $request->all();
        $student->update($data);

	    Session::flash('message', $student['name'] . ' updated successfully');
        return redirect('/students');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	    $student = Studens::find($id);
	    $student->destroy($id);

	    Session::flash('message', $student['name'] . ' deleted successfully');
	    return redirect('/students');
    }
}
