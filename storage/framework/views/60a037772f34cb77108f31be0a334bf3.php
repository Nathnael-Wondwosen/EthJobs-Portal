<section class="section-box futured_jobs mt-20">
    <div class="container">
        <div class="text-center">
            <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">Featured Jobs</h2>
            <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">Check out our latest
                featred job's</p>
            <div class="list-tabs mt-40">
                <ul class="nav nav-tabs" role="tablist">
                    <?php $__currentLoopData = $featuredCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a class="<?php echo e($loop->index === 0 ? 'active' : ''); ?>" id="nav-tab-job-<?php echo e($category->id); ?>"
                                href="#tab-job-<?php echo e($category->id); ?>" data-bs-toggle="tab" role="tab"
                                aria-controls="tab-job-<?php echo e($category->id); ?>"
                                aria-selected="true"><?php echo e($category->name); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </ul>
            </div>
        </div>
        <div class="mt-70">
            <div class="tab-content" id="myTabContent-1">
                <?php $__currentLoopData = $featuredCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="tab-pane fade show <?php echo e($loop->index === 0 ? 'active' : ''); ?>"
                        id="tab-job-<?php echo e($category->id); ?>" role="tabpanel" aria-labelledby="tab-job-<?php echo e($category->id); ?>">
                        <div class="row">
                            <?php
                                $featuredJobs = $category
                                    ->jobs()
                                    ->where('featured', 1)
                                    ->where(['status' => 'active'])
                                    ->where('deadline', '>=', date('Y-m-d'))
                                    ->latest()
                                    ->take(8)
                                    ->get();
                            ?>
                            <?php $__currentLoopData = $featuredJobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left"><span class="flash"></span>
                                            <div class="image-box"><img src="<?php echo e(asset($job->company?->logo)); ?>"
                                                    alt="joblist"></div>

                                        </div>
                                        <div class="card-block-info">
                                            <h6><a href="<?php echo e(route('jobs.show', $job->slug)); ?>"><?php echo e(Str::limit($job->title, 28, '...')); ?></a>
                                            </h6>
                                            <div class="mt-5"><span
                                                    class="card-briefcase"><?php echo e($job->jobType->name); ?></span><span
                                                    class="card-time"><span><?php echo e($job->created_at->diffForHumans()); ?></span></span>
                                            </div>
                                            <p><?php echo e(Str::limit(strip_tags($job->description), 100, '...')); ?></p>
                                            <div class="mt-30">
                                                <?php $__currentLoopData = $job->skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jobSkill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($loop->index <= 3): ?>
                                                        <a class="btn btn-grey-small mr-5 "
                                                            href="javascript:;"><?php echo e($jobSkill->skill->name); ?></a>
                                                    <?php elseif($loop->index == 7): ?>
                                                        <a class="btn btn-grey-small mr-5 "
                                                            href="javascript:;">More..</a>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                        <?php if($job->salary_mode === 'range'): ?>

                                        <span class="card-text-price"><?php echo e($job->min_salary); ?> - <?php echo e($job->max_salary); ?> <?php echo e(config('settings.site_default_currency')); ?></span>
                                        <?php else: ?>
                                        <span class="card-text-price"><?php echo e($job->custom_salary); ?></span>
                                        <?php endif; ?>
                                            <a href="<?php echo e(route('jobs.show', $job->slug)); ?>">
                                                <div class="btn btn-apply-now" >
                                                    View Post</div>
                                            </a>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\EthJobs-Portal\resources\views/frontend/home/sections/featured-job-section.blade.php ENDPATH**/ ?>