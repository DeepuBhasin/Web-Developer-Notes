<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use  App\Employee;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Employee::all();

        $data['emp'] = Employee::orderBy('name', 'DESC')->paginate(3);
        return view('Employee.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required', 'gender' => 'required', 'age' => 'required', 'designation' => 'required']);
        $emp = new Employee();
        $emp->name = $request->input('name');
        $emp->gender = $request->input('gender');
        $emp->age = $request->input('age');
        $emp->designation = $request->input('designation');
        $emp->save();
        return  redirect('/Index')->with('insertMessage', 'Data has been inserted Successfully');
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
        $emp = Employee::find($id);
        return view('Employee.edit')->with('emp', $emp);
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
        $emp = Employee::find($id);
        $emp->name = $request->input('name');
        $emp->gender = $request->input('gender');
        $emp->age = $request->input('age');
        $emp->designation = $request->input('designation');

        $this->validate($request, ['name' => 'required', 'gender' => 'required', 'age' => 'required', 'designation' => 'required']);

        $emp->save();
        return redirect('/Index')->with('insertMessage', 'Data Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emp = Employee::find($id);
        $emp->delete($id);
        return redirect('/Index')->with('insertMessage', 'Data Deleted successfully');
    }
}