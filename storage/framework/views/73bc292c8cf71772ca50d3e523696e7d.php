

<?php $__env->startSection('content'); ?>
    <h2 class="title-bar" style="padding-bottom: 100px !important;"><?php echo e($page_title ?? __("Role Upgrade Requests")); ?></h2>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <?php if(session('error')): ?>
        <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
    <?php endif; ?>

    <div class="custom-table-container" style="background-color: white !important; padding: 20px;">
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
                                <div class="action-buttons">
                                    <a href="<?php echo e(route('user.admin.roleUpgradeApprove', $request->id)); ?>" class="btn btn-success btn-sm"><?php echo e(__("Approve")); ?></a>
                                    <a href="<?php echo e(route('user.admin.roleUpgradeDecline', $request->id)); ?>" class="btn btn-danger btn-sm"><?php echo e(__("Decline")); ?></a>
                                </div>
                            <?php else: ?>
                                <span><?php echo e(__("No actions available")); ?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

    <style>
        .custom-table-container {
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .custom-table th, .custom-table td {
            vertical-align: middle;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .btn {
            border-radius: 20px;
            padding: 5px 15px;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("Layout::admin.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\dell\Desktop\Vip_travel\Vip_Travel_Project\resources\views/admin/role_requests/index.blade.php ENDPATH**/ ?>