@extends('layout/master')


@section('body')
		<h1>Hello World</h1>
		<?php print_r($mysubject);?>
		<?php print_r($subjectsmarks)?>
		<br/>
		this is the value of @{{$datavalue}} which is 
		{{ $datavalue }}
@endsection('body')