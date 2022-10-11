
<?php $__env->startSection('content'); ?>
<div class="modal fade" id="ajaxModel" aria-hidden="true">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Students</h2>

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
</form>
<?php $__env->stopSection(); ?>  



</form>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>"

<script>
$("#createNewStudent").click(function(){
   $('#ajaxModel') .modal(show);
});
</script>
})
<?php echo $__env->make('students.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crud\resources\views/students/create.blade.php ENDPATH**/ ?>