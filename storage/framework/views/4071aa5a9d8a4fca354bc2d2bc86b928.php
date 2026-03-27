<section class="section-box category_section mt-35">
    <div class="section-box wow animate__animated animate__fadeIn">
      <div class="container">
        <div class="text-center">
          <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">Popular Job Categories</h2>
          <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp"><?php echo e($jobCount); ?> Total job published</p>
        </div>
        <div class="box-swiper mt-50">
          <div class="swiper-container swiper-group-5 swiper">
            <div class="swiper-wrapper pb-70 pt-5">
                <?php $__currentLoopData = $popularJobCategories->chunk(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pair): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="swiper-slide hover-up">
                    <?php $__currentLoopData = $pair; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('jobs.index', ['category' => $category->slug])); ?>">
                      <div class="item-logo">
                        <div class="image-left">
                          <i class="<?php echo e($category->icon); ?>"></i>
                        </div>
                        <div class="text-info-right">
                          <h4><?php echo e(Str::limit($category->name, 20, '...')); ?></h4>
                          <p class="font-xs"><?php echo e($category->jobs_count); ?><span> Jobs Available</span></p>
                        </div>
                      </div>
                    </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



            </div>
          </div>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>
      </div>
    </div>
  </section>
<?php /**PATH C:\xampp\htdocs\EthJobs-Portal\resources\views/frontend/home/sections/category-section.blade.php ENDPATH**/ ?>