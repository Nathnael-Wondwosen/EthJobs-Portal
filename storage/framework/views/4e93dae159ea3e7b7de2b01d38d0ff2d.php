<?php $__env->startSection('contents'); ?>
<!-- Hero Section Start -->
<?php echo $__env->make('frontend.home.sections.hero-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Hero Section End -->

<div class="mt-100"></div>
<!-- Category Section Start -->
<?php echo $__env->make('frontend.home.sections.category-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Category Section End -->

<!-- Featured Job Section Start -->
<?php echo $__env->make('frontend.home.sections.featured-job-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Featured Job Section End -->

<!-- Why Choose Us Section Start -->
<?php echo $__env->make('frontend.home.sections.why-choose-us-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Why Choose Us Section End -->

<!-- Learn More Section Start -->
<?php echo $__env->make('frontend.home.sections.learn-more-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Learn More Section End -->

<!-- Counter Section Start -->
<?php echo $__env->make('frontend.home.sections.counter-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Counter Section End -->

<!-- Top Recruiters Section Start -->
<?php echo $__env->make('frontend.home.sections.top-recruiters-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Top Recruiters Section End -->

<!-- Price Plan Section Start -->
<!-- <?php if(auth()->user()?->role != 'candidate'): ?>
<?php echo $__env->make('frontend.home.sections.price-plan-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?> -->
<!-- Price Plan Section End -->

<!-- Job By Location Section Start -->
<?php echo $__env->make('frontend.home.sections.job-by-location-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Job By Location Section End -->

<!-- Blog Section Start -->
<?php echo $__env->make('frontend.home.sections.blog-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Blog Section Start -->

<!-- Review Section Start -->
<?php echo $__env->make('frontend.home.sections.developers-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Review Section End -->



<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\EthJobs-Portal\resources\views/frontend/home/index.blade.php ENDPATH**/ ?>