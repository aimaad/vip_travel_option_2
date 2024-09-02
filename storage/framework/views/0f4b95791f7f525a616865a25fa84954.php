

<?php $__env->startSection('content'); ?>

    <h2 class="title-bar">
        <?php echo e($role_name === 'Agent de voyage' ? __("Become an Agent") : __("Become a Distributor")); ?>

    </h2>

    
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
     
     <?php if(session('alert')): ?>
     <div class="alert alert-danger">
         <?php echo e(session('alert')); ?>

     </div>
 <?php endif; ?>

    
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <?php if(session('info')): ?>
        <div class="alert alert-info">
            <?php echo e(session('info')); ?>

        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('user.changeRole')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="role_name" value="<?php echo e($role_name); ?>">
        
        <div class="form-group">
            <label for="agency_name">Nom d'agence (obligatoire):</label>
            <select id="agency_name" name="agency_name" class="form-control select2 agency-select" required>
                <option value=""></option>
                <?php $__currentLoopData = $agencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($agency); ?>"><?php echo e($agency); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <option value="other">Other (please specify below)</option>
            </select>
        </div>
    
        <div class="form-group" id="other-agency-field" style="display:none;">
            <label for="other_agency_name">Ecrire votre nom d'agence:</label>
            <input type="text" id="other_agency_name" name="other_agency_name" class="form-control">
        </div>
    
        <div class="form-group">
            <label for="iata_office_id">IATA OU Office Id (non obligatoire):</label>
            <input type="text" id="iata_office_id" name="iata_office_id" class="form-control">
        </div>
    
        <button type="submit" class="btn btn-primary"><?php echo e($role_name === 'Agent de voyage' ? __("Become an Agent") : __("Become a Distributor")); ?></button>
    </form>
    
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
     $('select#agency_name').on('change', function() {
    if ($(this).val() === 'other') {
        $('#other-agency-field').show();
        $('#other_agency_name').prop('required', true);
    } else {
        $('#other-agency-field').hide();
        $('#other_agency_name').prop('required', false);
    }
});

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\dell\Downloads\-booking-core-v3.6.1\BookingCore.3.6.1\resources\views/user/change_role.blade.php ENDPATH**/ ?>