<?php 
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Student;
use App\NewTeacher;
use Illuminate\Http\Request;

Class HelloController extends Controller{
	
	// public function index(){
	// 	return view('hello');
	// }
	// public function newTest($fname,$lname,$age){
	// 	echo "Hello $fname $lname $age";
	// }
	// public function sendDataFunction(){
	// 	$subjects = ['Math','physics','Chemistry'];
	// 	$marks = [30,40,50];
	// 	// return view('hello')->with(['mysubject'=>$subjects,'subjectsMarks'=>$marks]);
	// 	$data = "This is another way to print the values of data";

	// 	return view('hello')->withmysubject($subjects)->withsubjectsmarks($marks)->withdatavalue($data);
	// }







	// to insert data in model then i am creating this thing 
		// public function index(){

		// 	$student = new NewTeacher(['sname'=>'xx','standard'=>'28']);

		// 	// $student->sname="Deepinder";
		// 	// $student->standerd=12;

		// 	$student->save();

		// 	// echo "value inserted";




		// 	// $teacher = new Teacher(['sname'=>'Simran','standard'=>'23']);
		// 	echo "value inserted";	


		// }






	// get request new Method 
		public function index(Request  $request){
			return dd($request->all());
		}



} 

?>