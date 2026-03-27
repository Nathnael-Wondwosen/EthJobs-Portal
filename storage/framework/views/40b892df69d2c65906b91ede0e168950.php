<section class="section-box mt-80">
    <div class="container">
        <div class="text-center">
            <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">Jobs by Location</h2>
            <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">Find your favourite jobs and get the benefits for yourself</p>
        </div>
    </div>
    <div class="container">
        <div class="row mt-50">
            <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xl-3 col-lg-3 col-md-5 col-sm-12 col-12">
                    <div class="card-image-top hover-up">
                        <a href="<?php echo e(route('companies.index', ['country' => $location->country_id])); ?>">
                            <div class="image" style="background-image: url(<?php echo e(asset($location->image)); ?>);">
                                <span class="lbl-hot"><?php echo e($location->status); ?></span>
                            </div>
                        </a>
                        <div class="informations">
                            <?php if($location->country !== null): ?>
                                <a href="<?php echo e(route('companies.index', ['country' => $location->country_id])); ?>">
                                    <h5><?php echo e($location->country->name); ?></h5>
                                </a>
                                <div class="row">
                                    <div class="col-lg-6 col-6">
                                        <span class="text-14 color-text-paragraph-2">
                                            <?php echo e($location->country->companies->count()); ?> companies
                                        </span>
                                    </div>
                                    <div class="col-lg-6 col-6 text-end">
                                        <span class="color-text-paragraph-2 text-14"></span>
                                    </div>
                                </div>
                            <?php else: ?>
                                <h5>Unknown Country</h5>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section><?php /**PATH C:\xampp\htdocs\EthJobs-Portal\resources\views/frontend/home/sections/job-by-location-section.blade.php ENDPATH**/ ?>