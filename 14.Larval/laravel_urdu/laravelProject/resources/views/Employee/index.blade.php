<a href="{{url('/create')}}">Create</a>

@if(session('insertMessage'))
<h1>{{session('insertMessage')}}</h1>
@endif



<h1>Hello Index page</h1>
@foreach($data['emp'] as $e)
Id : {{$e['id']}}
Name : {{$e['name']}}
Age : {{$e['age']}}
Description : {{$e['descripton']}}
<a href="{{url('/edit')}}/{{$e['id']}}">Edit</a>
<form action="{{url('/delete',$e->id)}}" method="post">
    {{csrf_field()}}
    <input type="submit" value="Delete">
</form>
<br />
@endforeach