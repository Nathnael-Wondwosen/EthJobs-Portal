<section class="section-box overflow-visible mt-100 mb-100">
    <div class="container">
      <div class="row align-items-center justify-content-between">
        <div class="col-lg-6 col-sm-12">
          <div class="content-job-inner"><span class="color-text-mutted text-32"><?php echo e($learnMore?->title); ?> </span>
            <h2 class="text-52 wow animate__animated animate__fadeInUp"><?php echo e($learnMore?->main_title); ?></h2>
            <div class="mt-40 pr-50 text-md-lh28 wow animate__animated animate__fadeInUp"><?php echo e($learnMore?->sub_title); ?></div>
            <div class="mt-40">
              <div class="wow animate__animated animate__fadeInUp"><a class="btn btn-default"
                  href="jobs">Search Jobs</a>
                  <?php if($learnMore?->url): ?>
                    <a class="btn btn-link" href="<?php echo e($learnMore?->url); ?>">Learn More</a>
                  <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5 col-sm-12">
          <div class="box-image-job">
            <figure class="wow animate__animated animate__fadeIn">
              <img alt="joblist" src="<?php echo e(asset($learnMore?->image)); ?>" style="height: 540px; object-fit:cover">
            </figure>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php /**PATH C:\xampp\htdocs\EthJobs-Portal\resources\views/frontend/home/sections/learn-more-section.blade.php ENDPATH**/ ?>