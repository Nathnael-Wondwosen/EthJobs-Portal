<div class="bg-homepage1" style="background-image: url('<?php echo e(asset($hero?->background_image)); ?>')"></div>

<section class="section-box mt-100 mb-100 banner_section">
    <div class="container">
      <div class="banner-hero hero-1">
        <div class="banner-inner">
          <div class="row align-items-center">
            <div class="col-xl-4 col-lg-12 d-none d-xl-block col-md-6">
              <div class="banner-imgs mt-40">
                <div class="block-1"><img class="img-responsive" alt="joblist"
                    src="<?php echo e(asset($hero?->image)); ?>"></div>
              </div>
            </div>
            <div class="col-xl-8 col-lg-12">
              <div class="block-banner">
                <h1 class="heading-banner wow animate__animated animate__fadeInUp"><?php echo e($hero?->title); ?></h1>
                <div class="banner-description mt-20 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                  <?php echo e($hero?->sub_title); ?>

                </div>
                <div class="form-find mt-40 wow animate__animated animate__fadeIn" data-wow-delay=".2s">
                  <form action="<?php echo e(route('jobs.index')); ?>" method="GET">
                    <div class="box-industry">
                      <select class="form-input mr-10 select-active input-industry" name="category">
                        <option value="">Industry</option>
                        <?php $__currentLoopData = $jobCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->slug); ?>"><?php echo e($category->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                      </select>
                    </div>
                    <select class="form-input mr-10 select-active" name="country">
                      <option value="">Location</option>
                      <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($country->id); ?>"><?php echo e($country->name); ?></option>

                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <input class="form-input input-keysearch mr-10" type="text" name="search" placeholder="Your keyword... ">
                    <button class="btn btn-default btn-find font-sm">Search</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php /**PATH C:\xampp\htdocs\EthJobs-Portal\resources\views/frontend/home/sections/hero-section.blade.php ENDPATH**/ ?>