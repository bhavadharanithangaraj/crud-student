
<?php $__env->startSection('content'); ?>

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
            <a class="btn btn-primary"href="<?php echo e(route('students.index')); ?>">Back</a>
        </div>
    </div>
</div>
<?php if($errors->any()): ?>
<div class="alert alert-danger">
    <strong>Whoops!</strong>There were some problems with your input.<br><br>
    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul> 
</div>
<?php endif; ?>
<form action="<?php echo e(route('students.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
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
<?php $__env->stopSection(); ?>  



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
<?php if($message=Session::get('success')): ?>
<div class="alert alert-success">
    <p><?php echo e($message); ?></p>
</div>
<?php endif; ?>


<table id="datatable"class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Course</th>
        <th>Fee</th>
        <th width = "280px">Action</th>
</tr>
<?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td><?php echo e(++$i); ?></td>
    <td><?php echo e($student->studname); ?></td>
    <td><?php echo e($student->course); ?></td>
    <td><?php echo e($student->fee); ?></td>
    <td>
        <form action="<?php echo e(route('students.destroy',$student->id)); ?>" method="POST">
            <a href="#" class="btn btn-info" href="<?php echo e(route('students.show',$student->id)); ?>">Show</a>
            <a href="<?php echo e(route('students.edit',$student->id)); ?>"class="btn btn-primary edit"  >Edit</a>
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php echo $__env->make('students.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crud\resources\views/students/index.blade.php ENDPATH**/ ?>