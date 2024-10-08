



<?php $__env->startSection('content'); ?>
    <h2>Edit Agency</h2>
    
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('admin.agencies.update', $agency)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="form-group">
            <label for="name">Agency Name:</label>
            <input type="text" name="name" class="form-control" value="<?php echo e(old('name', $agency->name)); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Agency</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("Layout::admin.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\dell\Downloads\-booking-core-v3.6.1\BookingCore.3.6.1\resources\views/admin/agencies/edit.blade.php ENDPATH**/ ?>