

<?php $__env->startSection('content'); ?>
    <h2 class="title-bar" style="padding-bottom: 100px !important;"><?php echo e($page_title ?? __("Role Upgrade Requests")); ?></h2>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <?php if(session('error')): ?>
        <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
    <?php endif; ?>

    <div class="custom-table-container" style="background-color: white !important ; padding-top: 20px 10px 10px 20px !important;">
        <table class="table custom-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo e(__("Name")); ?></th>
                    <th><?php echo e(__("Email")); ?></th>
                    <th><?php echo e(__("Requested Role")); ?></th>
                    <th><?php echo e(__("Agency Name")); ?></th>
                    <th><?php echo e(__("IATA/Office ID")); ?></th>
                    <th><?php echo e(__("Date Request")); ?></th>
                    <th><?php echo e(__("Status")); ?></th>
                    <th><?php echo e(__("Actions")); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $roleRequests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($index + 1); ?></td>
                        <td><?php echo e($request->user->name); ?></td>
                        <td><?php echo e($request->user->email); ?></td>
                        <td><?php echo e($request->type); ?></td>
                        <td><?php echo e($request->agency_name); ?></td>
                        <td><?php echo e($request->iata_office_id); ?></td>
                        <td><?php echo e($request->created_at->format('m/d/Y')); ?></td>
                        <td>
                            <?php if($request->status == 'pending'): ?>
                                <span class="badge badge-warning"><?php echo e(__("Pending")); ?></span>
                            <?php elseif($request->status == 'approved'): ?>
                                <span class="badge badge-success"><?php echo e(__("Approved")); ?></span>
                            <?php elseif($request->status == 'declined'): ?>
                                <span class="badge badge-danger"><?php echo e(__("Declined")); ?></span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($request->status == 'pending'): ?>
                                <a href="<?php echo e(route('user.admin.roleUpgradeApprove', $request->id)); ?>" class="btn btn-success"><?php echo e(__("Approve")); ?></a>
                                <a href="<?php echo e(route('user.admin.roleUpgradeDecline', $request->id)); ?>" class="btn btn-danger"><?php echo e(__("Decline")); ?></a>
                            <?php else: ?>
                                <span><?php echo e(__("No actions available")); ?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make("Layout::admin.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\dell\Downloads\-booking-core-v3.6.1\BookingCore.3.6.1\resources\views/admin/role_requests/index.blade.php ENDPATH**/ ?>