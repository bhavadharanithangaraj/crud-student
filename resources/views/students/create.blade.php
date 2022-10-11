@extends('students.layout')
@section('content')
<!-- you want to make create new button page separetly without pop you can del that pop up code in the index.blade 
and conncet this code into the button of add students!-->
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Students</h2>

        </div>
        <div class="pull-right">
            <a class="btn btn-primary"href="{{ route('students.index') }}">Back</a>
        </div>
    </div>
</div>
@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong>There were some problems with your input.<br><br>
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul> 
</div>
@endif
<form action="{{ route('students.store') }}" method="POST">
    @csrf
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>StudentName:</strong>
            <input type="text" name="studname" class="form-control"placeholder="studname">
        </div>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Course</strong>
            <input type="text" name="course" class="form-control"placeholder="course">
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Fee</strong>
            <input type="text" name="fee" class="form-control"placeholder="fee">
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Sumbit</button>
</div>
</div>
</div>
</div>
</div>
</form>
@endsection  




<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>"

<script>
$("#createNewStudent").click(function(){
   $('#ajaxModel') .modal(show);
});
</script>
})