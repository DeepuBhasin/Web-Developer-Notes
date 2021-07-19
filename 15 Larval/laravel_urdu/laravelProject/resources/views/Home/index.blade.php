@extends('layouts/master')

@section('content')
<h1>Index Page</h1>
<form action="{{url('data')}}" method="post">
    <input type="text" class="form-control" name="name" id="" placeholder="Enter First Name  ">
    <br /><br />
    {{csrf_field()}}
    <input type="email" class="form-control" name="email" id="" placeholder="Enter Email  ">
    <select name="gender" id="" class="form-control">
        <option value="">Select Gender</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
    </select>
    <input type="submit" value="Submit" class="btn btn-success">
    <input type="reset" value="Clear" class="btn btn-danger ">
</form>
@endsection