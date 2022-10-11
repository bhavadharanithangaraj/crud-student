@extends('students.layout')
@section('content')

<!-- pop up for (create new student) modal!-->
<div class="modal fade" id="addstudent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h3>Add New Students</h3>

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



<!--body ,tables,buttons !-->
 <div class="pull-left">
        <h2>Student Crud</h2>
</div>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
        <button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#addstudent">
  Add Students
  
</button>     
   </div>
</div>

</div> 
@if($message=Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif


<table id="datatable"class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Course</th>
        <th>Fee</th>
        <th width = "280px">Action</th>
</tr>
@foreach($students as $student)
<tr>
    <td>{{++$i}}</td>
    <td>{{$student->studname}}</td>
    <td>{{$student->course}}</td>
    <td>{{$student->fee}}</td>
    <td>
        <form action="{{ route('students.destroy',$student->id) }}" method="POST">
            <a href="#" class="btn btn-info" href="{{ route('students.show',$student->id) }}">Show</a>
            <a href="{{ route('students.edit',$student->id) }}"class="btn btn-primary edit"  >Edit</a>
        @csrf
        @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </td>
</tr>
@endforeach
</table>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>"

<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>"
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        var table= $('#datatable').DataTable();
        // start edit record
        table.on('click','edit',function () {

            $tr =$(this).closest('tr')
            if ($($tr).hasClass('child')){
            $tr= $tr.prev('.parent');
            }

            var data = table.row($tr).data();
            console.log(data);

            $('#studname').val(data[1]);
            $('#course').val(data[2]);
            $('#fee').val(data[3]);

            $('#editform').attr('action','/students' +data[0]);
            $('#editstudent').modal('show');
        });
    
        });
</script>

<script>
    $(document).ready(function() {
        $('.servideletebtn').click(function (e) {
            e.preventDefault();
            swal({
               title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
              dangerMode: true,
                })
               .then((willDelete) => {
                if (willDelete) {
               swal("Poof! Your imaginary file has been deleted!", {
               icon: "success",
               });
                    }
               });
                 
});
});
    
    
</script>