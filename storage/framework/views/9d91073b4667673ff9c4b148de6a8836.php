
<?php $__env->startSection('content'); ?>
    <h2 class="title-bar">
        <?php echo e(__("Manage Coupon")); ?>

        <?php if(Auth::user()->hasPermission('coupon_create') && empty($recovery)): ?>
            <a href="<?php echo e(route("coupon.vendor.create")); ?>" class="btn-change-password"><?php echo e(__("Add Coupon")); ?></a>
        <?php endif; ?>
    </h2>
    <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if($rows->total() > 0): ?>
        <div class="bravo-list-item">
            <div class="bravo-pagination">
                <span class="count-string"><?php echo e(__("Showing :from - :to of :total coupon",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()])); ?></span>
                <?php echo e($rows->appends(request()->query())->links()); ?>

            </div>
            <div class="list-item">
                <div class="booking-history-manager">
                    <div class="tab-content">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-booking-history mb-0">
                                <thead>
                                <tr>
                                    <th> <?php echo e(__('Code')); ?></th>
                                    <th> <?php echo e(__('Name')); ?></th>
                                    <th> <?php echo e(__('Amount')); ?></th>
                                    <th> <?php echo e(__('Discount Type')); ?></th>
                                    <th> <?php echo e(__('End Date')); ?></th>
                                    <th width="100px"> <?php echo e(__('Status')); ?></th>
                                    <th width="100px"> <?php echo e(__("Action")); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="<?php echo e($row->status); ?>">
                                            <td class="title">
                                                <strong><?php echo e($row->code); ?></strong>
                                            </td>
                                            <td><?php echo e($row->name); ?></td>
                                            <td><?php echo e($row->amount); ?></td>
                                            <td><?php echo e($row->discount_type == 'percent' ? __("Percent") : __("Amount")); ?></td>
                                            <td><?php echo e(($row->end_date)); ?></td>
                                            <td><span class="badge badge-<?php echo e($row->status); ?>"><?php echo e($row->status); ?></span></td>
                                            <td>
                                                <a href="<?php echo e(route('coupon.vendor.edit',['id'=>$row->id])); ?>" class="btn btn-xs btn-primary btn-info-booking mt-1"><i class="fa fa-edit"></i> <?php echo e(__('Edit')); ?></a>
                                                <a href="<?php echo e(route('coupon.vendor.delete',['id'=>$row->id])); ?>" class="btn btn-xs btn-secondary btn-info-booking mt-1"><i class="fa fa-remove"></i> <?php echo e(__('Delete')); ?></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bravo-pagination">
                <span class="count-string"><?php echo e(__("Showing :from - :to of :total coupon",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()])); ?></span>
                <?php echo e($rows->appends(request()->query())->links()); ?>

            </div>
        </div>
    <?php else: ?>
        <?php echo e(__("No Coupon")); ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\dell\Downloads\-booking-core-v3.6.1\BookingCore.3.6.1\themes/Base/Coupon/Views/frontend/vendor/index.blade.php ENDPATH**/ ?>