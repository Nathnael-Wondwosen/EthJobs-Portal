

<?php $__env->startSection('contents'); ?>
    <section class="section">
        <div class="section-header">
            <h1>Users</h1>
        </div>

        <div class="section-body">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All Users</h4>
                        <div class="card-header-form">
                            <form action="<?php echo e(route('admin.users.index')); ?>" method="GET">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search" name="search" value="<?php echo e(request('search')); ?>">
                                    <div class="input-group-btn">
                                        <button type="submit" style="height: 40px;" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <a href="<?php echo e(route('admin.users.create')); ?>" class="btn btn-primary"> <i class="fas fa-plus-circle"></i> Create new</a>
                    </div>
                    <div class="card-body p-0">
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th style="width: 10%">Action</th>
            </tr>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($user->name); ?></td>
                        <td><?php echo e($user->email); ?></td>
                        <td>
                            <?php if($user->role === 'company'): ?>
                                Employer
                            <?php elseif($user->role === 'candidate'): ?>
                                Job Seeker
                            <?php else: ?>
                                <?php echo e($user->role); ?>

                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?php echo e(route('admin.users.edit', $user->id)); ?>" class="btn-sm btn btn-primary"><i class="fas fa-edit"></i></a>
                            <a href="<?php echo e(route('admin.users.destroy', $user->id)); ?>" class="btn-sm btn btn-danger delete-item"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="4" class="text-center">No result found!</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div><div class="card-footer text-right">
                        <nav class="d-inline-block">
                            
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\EthJobs-Portal\resources\views/admin/users/index.blade.php ENDPATH**/ ?>