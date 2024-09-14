

<?php $__env->startSection('content'); ?>
    <h2 class="my-4"><?php echo e(__('Agency List')); ?> </h2>
    
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <!-- Button to show the add agency form -->
    <button id="show-add-agency-button" class="btn btn-outline-dark mb-3" onclick="toggleAddForm()"><?php echo e(__('Add Agency')); ?></button>

    <!-- Inline form for adding a new agency, hidden by default -->
    <div id="add-agency-form" style="display:none; background-color: white; padding: 20px; border: 1px solid #ddd; border-radius: 4px; margin-bottom: 20px;">
        <h4><?php echo e(__('Add New Agency')); ?></h4>
        <form action="<?php echo e(route('admin.agencies.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label for="name" class="form-label"><?php echo e(__('Agency Name:')); ?></label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div>
                <button type="submit" class="btn btn-dark"><?php echo e(__('Add Agency')); ?></button>
                <button type="button" class="btn btn-outline-secondary" onclick="toggleAddForm()">Cancel</button>
            </div>
        </form>
    </div>

    <hr>

    <h4><?php echo e(__('Existing Agencies')); ?></h4>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr style="background-color: #f9f9f9;">
                    <th>#</th>
                    <th><?php echo e(__('Name')); ?></th>
                    <th><?php echo e(__('Actions')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $agencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td>
                            <!-- Normal display mode -->
                            <span id="name-display-<?php echo e($agency->id); ?>"><?php echo e($agency->name); ?></span>

                            <!-- Edit mode form -->
                            <form id="edit-form-<?php echo e($agency->id); ?>" action="<?php echo e(route('admin.agencies.update', $agency)); ?>" method="POST" style="display:none;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <input type="text" name="name" value="<?php echo e($agency->name); ?>" class="form-control form-control-sm" required>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-dark btn-sm"><?php echo e(__('Save')); ?></button>
                                    <button type="button" class="btn btn-outline-secondary btn-sm" onclick="cancelEdit(<?php echo e($agency->id); ?>)"><?php echo e(__('Cancel')); ?></button>
                                </div>
                            </form>
                        </td>
                        <td>
                            <button class="btn btn-outline-dark btn-sm" onclick="toggleEdit(<?php echo e($agency->id); ?>)"><?php echo e(__('Edit')); ?></button>
                            <form action="<?php echo e(route('admin.agencies.destroy', $agency)); ?>" method="POST" style="display:inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-outline-dark btn-sm" onclick="return confirm('Are you sure?')"><?php echo e(__('Delete')); ?></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

    <script>
        function toggleAddForm() {
            var form = document.getElementById('add-agency-form');
            var button = document.getElementById('show-add-agency-button');

            if (form.style.display === 'none' || form.style.display === '') {
                form.style.display = 'block';
                button.style.display = 'none';
            } else {
                form.style.display = 'none';
                button.style.display = 'inline';
            }
        }

        function toggleEdit(id) {
            document.getElementById('name-display-' + id).style.display = 'none';
            document.getElementById('edit-form-' + id).style.display = 'block';
        }

        function cancelEdit(id) {
            document.getElementById('name-display-' + id).style.display = 'block';
            document.getElementById('edit-form-' + id).style.display = 'none';
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layout::admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\dell\Desktop\Vip_travel\Vip_Travel_Project\resources\views/admin/agencies/index.blade.php ENDPATH**/ ?>