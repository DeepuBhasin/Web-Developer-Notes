<h1>Edit Page</h1>
<form action="{{url('/update',$emp->id)}}" method="POST">
    {{csrf_field()}}
    <input type="text" name="name" id="" placeholder="Enter Name" value="{{$emp['name']}}"><br />
    <select name="gender" id="">
        <option value="">Seletc Gender</option>
        <option value="male" @if($emp->gender=='male') selected @endif>Male</option>
        <option value="female" @if($emp->gender=='female') selected @endif >Female</option>
    </select><br />
    <input type="number" name="age" id="" placeholder="Enter Age" value="{{$emp['age']}}"><br />
    <input type="text" name="designation" id="" placeholder="Enter Designation" value="{{$emp->designation}}"><br />
    <input type="submit" value="Submit">


</form>