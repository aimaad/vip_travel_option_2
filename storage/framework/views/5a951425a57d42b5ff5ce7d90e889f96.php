
<?php $__env->startSection('content'); ?>
    <h2 class="title-bar">
        <?php echo e(__("Settings")); ?>

        <a href="<?php echo e(route('user.change_password')); ?>" class="btn-change-password"><?php echo e(__("Change Password")); ?></a>
    </h2>
    <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <form action="<?php echo e(route('user.profile.update')); ?>" method="post" enctype="multipart/form-data" class="input-has-icon">
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col-md-6">
                <div class="form-title">
                    <strong><?php echo e(__("Personal Information")); ?></strong>
                </div>
                
                <!-- Civilite -->
                <div class="form-group">
                    <label><?php echo e(__("Civilité")); ?></label>
                    <div>
                        <label><input type="radio" name="civilite" value="M" <?php echo e(old('civilite', $dataUser->civilite) == 'M' ? 'checked' : ''); ?>> M</label>
                        <label><input type="radio" name="civilite" value="Mme" <?php echo e(old('civilite', $dataUser->civilite) == 'Mme' ? 'checked' : ''); ?>> Mme</label>
                        <label><input type="radio" name="civilite" value="Ms" <?php echo e(old('civilite', $dataUser->civilite) == 'Ms' ? 'checked' : ''); ?>> Ms</label>
                    </div>
                </div>

                <!-- First Name -->
                <div class="form-group">
                    <label><?php echo e(__("First Name")); ?></label>
                    <input type="text" value="<?php echo e(old('first_name',$dataUser->first_name)); ?>" name="first_name" placeholder="<?php echo e(__("First Name")); ?>" class="form-control">
                    <i class="fa fa-user input-icon"></i>
                </div>

                <!-- Last Name -->
                <div class="form-group">
                    <label><?php echo e(__("Last Name")); ?></label>
                    <input type="text" value="<?php echo e(old('last_name',$dataUser->last_name)); ?>" name="last_name" placeholder="<?php echo e(__("Last Name")); ?>" class="form-control">
                    <i class="fa fa-user input-icon"></i>
                </div>

                <!-- Date of Birth -->
                <div class="form-group">
                    <label><?php echo e(__("Date of Birth")); ?></label>
                    <input type="text" value="<?php echo e(old('birthday',$dataUser->birthday? display_date($dataUser->birthday) :'')); ?>" name="birthday" placeholder="<?php echo e(__("Date of Birth")); ?>" class="form-control date-picker">
                    <i class="fa fa-calendar input-icon"></i>
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label><?php echo e(__("E-mail")); ?></label>
                    <input type="text" name="email" value="<?php echo e(old('email',$dataUser->email)); ?>" placeholder="<?php echo e(__("E-mail")); ?>" class="form-control">
                    <i class="fa fa-envelope input-icon"></i>
                </div>

                <!-- Phone Number -->
                <div class="form-group">
                    <label><?php echo e(__("Phone Number")); ?></label>
                    <input type="text" value="<?php echo e(old('phone',$dataUser->phone)); ?>" name="phone" placeholder="<?php echo e(__("Phone Number")); ?>" class="form-control">
                    <i class="fa fa-phone input-icon"></i>
                </div>

                <!-- City -->
                <div class="form-group">
                    <label><?php echo e(__("City")); ?></label>
                    <select name="city" class="form-control">
                        <option value=""><?php echo e(__('-- Select City --')); ?></option>
                        <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php if((old('city',$dataUser->city ?? '')) == $city): ?> selected <?php endif; ?> value="<?php echo e($city); ?>"><?php echo e($city); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
 <!-- Avatar Upload -->
 <div class="form-group">
    <label><?php echo e(__("Avatar")); ?></label>
    <div class="upload-btn-wrapper">
        <div class="input-group">
            <span class="input-group-btn">
                <span class="btn btn-default btn-file">
                    <?php echo e(__("Browse")); ?>… <input type="file" name="avatar">
                </span>
            </span>
            <input type="text" data-error="<?php echo e(__("Error upload...")); ?>" data-loading="<?php echo e(__("Loading...")); ?>" class="form-control text-view" readonly value="<?php echo e(get_file_url( old('avatar_id',$dataUser->avatar_id) ) ?? $dataUser->getAvatarUrl()?? __("No Image")); ?>">
        </div>
        <input type="hidden" class="form-control" name="avatar_id" value="<?php echo e(old('avatar_id',$dataUser->avatar_id)?? ""); ?>">
        <img class="image-demo" src="<?php echo e(get_file_url( old('avatar_id',$dataUser->avatar_id) ) ??  $dataUser->getAvatarUrl() ?? ""); ?>"/>
    </div>
</div>

                <div class="col-md-12">
                    <hr>
                    <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> <?php echo e(__('Save Changes')); ?></button>
                </div>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\dell\Desktop\Vip_travel\Vip_Travel_Project\themes/Base/User/Views/frontend/profile.blade.php ENDPATH**/ ?>