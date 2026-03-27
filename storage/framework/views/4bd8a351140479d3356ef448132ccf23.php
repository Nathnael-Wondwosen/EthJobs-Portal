<?php $__env->startSection('contents'); ?>
<section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>
    <?php if(canAccess(['dashboard analytics'])): ?>
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="fas fa-child"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h3>Welcome</h3>
            </div>
            <!-- <div class="card-body">
             <?php echo e(config('settings.site_currency_icon')); ?> <?php echo e($totalEarnings); ?>

            </div> -->
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="fas fa-users"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Candidates</h4>
            </div>
            <div class="card-body">
              <?php echo e($totalCandidates); ?>

            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="fas fa-users"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Companies</h4>
            </div>
            <div class="card-body">
              <?php echo e($totalCompanies); ?>

            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            <i class="fas fa-circle"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Jobs</h4>
            </div>
            <div class="card-body">
              <?php echo e($totalJobs); ?>

            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-info">
            <i class="fas fa-briefcase"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Active Jobs</h4>
            </div>
            <div class="card-body">
              <?php echo e($activeJobs); ?>

            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="fas fa-briefcase"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Expired Jobs</h4>
            </div>
            <div class="card-body">
              <?php echo e($expiredJobs); ?>

            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="fas fa-briefcase"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Pending Jobs</h4>
            </div>
            <div class="card-body">
              <?php echo e($pendingJobs); ?>

            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="fab fa-blogger-b"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Blogs</h4>
            </div>
            <div class="card-body">
              <?php echo e($totalBlogs); ?>

            </div>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>

    <?php if(canAccess(['dashboard pending posts'])): ?>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Pending Jobs</h4>
                <div class="card-header-form">
                    <form action="<?php echo e(route('admin.jobs.index')); ?>" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" name="search" value="<?php echo e(request('search')); ?>">
                            <div class="input-group-btn">
                                <button type="submit" style="height: 40px;" class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <th>Job</th>
                            <th>Category/Role</th>
                            <th>Salary</th>
                            <th>Deadline</th>
                            <th>Status</th>
                            <th>Approve</th>

                            <th style="width: 10%">Action</th>
                        </tr>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td>
                                    <div class="d-flex">
                                        <div class="mr-2">
                                            <img style="width:50px;height:50px;object-fit:cover" src="<?php echo e(asset($job->company->logo)); ?>" alt="">
                                        </div>
                                        <div>
                                            <b><?php echo e($job->title); ?></b>
                                            <br>
                                            <span><?php echo e($job->company->name); ?> - <?php echo e($job->jobType->name); ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <b><?php echo e($job->category?->name); ?></b>
                                        <br>
                                        <span><?php echo e($job->jobRole->name); ?></span>
                                    </div>
                                </td>
                                <td>
                                    <?php if($job->salary_mode === 'range'): ?>
                                        <b><?php echo e($job->min_salary); ?> - <?php echo e($job->max_salary); ?> <?php echo e(config('settings.site_default_currency')); ?></b>
                                        <br>
                                        <span><?php echo e($job->salaryType->name); ?></span>
                                    <?php else: ?>
                                    <b><?php echo e($job->custom_salary); ?></b>
                                    <br>
                                    <span><?php echo e($job->salaryType->name); ?></span>

                                    <?php endif; ?>
                                </td>
                                <td><?php echo e(formatDate($job->deadline)); ?></td>
                                <td>
                                    <?php if($job->status === 'pending'): ?>
                                    <span class="badge bg-warning text-dark">Peinding</span>
                                    <?php elseif($job->deadline > date('Y-m-d')): ?>
                                        <span class="badge bg-primary text-dark">Active</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger text-dark">Expired</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label class="custom-switch mt-2">
                                          <input <?php if($job->status === 'active'): echo 'checked'; endif; ?> type="checkbox" data-id="<?php echo e($job->id); ?>" name="custom-switch-checkbox" class="custom-switch-input post_status">
                                          <span class="custom-switch-indicator"></span>
                                        </label>
                                      </div>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('admin.jobs.edit', $job->id)); ?>" class="btn-sm btn btn-primary"><i class="fas fa-edit"></i></a>
                                    <a href="<?php echo e(route('admin.jobs.destroy', $job->id)); ?>" class="btn-sm btn btn-danger delete-item"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="7" class="text-center">No result found!</td>
                            </tr>
                        <?php endif; ?>

                    </tbody>

                    </table>
                </div>
            </div>
            <div class="card-footer text-right">
                <nav class="d-inline-block">
                    <?php if($jobs->hasPages()): ?>
                        <?php echo e($jobs->withQueryString()->links()); ?>

                    <?php endif; ?>
                </nav>
            </div>
        </div>
    </div>
    <?php endif; ?>

  </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            $('.post_status').on('change', function(){
                let id = $(this).data('id');

                $.ajax({
                    method: 'POST',
                    url: '<?php echo e(route("admin.job-status.update", ":id")); ?>'.replace(":id", id),
                    data: {_token:"<?php echo e(csrf_token()); ?>"},
                    success: function(response) {
                        if(response.message == 'success') {
                            window.location.reload();
                        }
                    },
                    error: function(xhr, status, error) {

                    }
                });
            })
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\EthJobs-Portal\resources\views/admin/dashboard/index.blade.php ENDPATH**/ ?>