
<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Product</h2> 
        </div>
        <div class="pull-right">
            <a class="btn btn-primary"href="<?php echo e(route('students.index')); ?>">Back</a>
        </div>
    </div>
</div>
<?php if($errors->any()): ?>
<div class=" alert alert-danger">
    <strong>Whoops!</strong>There were some problems with your input<br><br>
    <ul>
      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <li><?php echo e($error); ?></li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
</div>
<?php endif; ?>
 <form action="<?php echo e(route('students.update',$student->id)); ?>" method="POST">
     <?php echo csrf_field(); ?>
     <?php echo method_field('PUT'); ?>
     <div class="col-xs-12-sm-12 col-md-12">
         <div class="form-group">
             <strong>StudName</strong>
             <input type="text" name="studname" value="<?php echo e($student->studname); ?>"
             class="form-control" placeholder="Name">

         </div>
     </div>
     <div class="col-xs-12 col-sm-12-md-12">
         <div class="form-group">
             <strong>Course:</strong>
             <input type="text" name="course" value="<?php echo e($student->course); ?>"
             class="form-control" placeholder="Course">

         </div>
     </div>

     <div class="col-xs-12 col-sm-12-md-12">
     <div class="form-group">
             <strong>Fee</strong>
             <input type="text" name="fee" value="<?php echo e($student->fee); ?>"
             class="form-control" placeholder="Fee">

         </div>
     </div>
  
     <div class="col-xs-12 col-sm-12-md-12 text-center">
         <button type="submit" class="btn btn-primary">Sumbit</button>
</div>
</div>
 </form>
<?php $__env->stopSection(); ?>

    
</div>


<?php echo $__env->make('students.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crud\resources\views/students/edit.blade.php ENDPATH**/ ?>