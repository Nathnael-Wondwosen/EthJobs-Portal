<section class="section-box subscription_box mt-100">
    <div class="container">
        <div class="box-newsletter">
            <div class="newsletter_textarea">
                <div class="row">
                    <div class="col-lg-6">
                        <h2 class="text-md-newsletter">Subscribe our newsletter</h2>
                    </div>
                    <div class="col-lg-6">
                        <div class="box-form-newsletter">
                            <form class="form-newsletter">
                                <?php echo csrf_field(); ?>
                                <input class="input-newsletter" type="text" value=""
                                    placeholder="Enter your email here" name="email">
                                <button type="submit" class="btn btn-default font-heading newsletter-btn">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="footer pt-165">
    <div class="container">
        <div class="row justify-content-between">
            <?php
                $footerDetails = \App\Models\Footer::first();
                $footerIcons = \App\Models\SocialIcon::all();
                $footerOne = \Menu::getByName('Footer Menu One');
                $footerTwo = \Menu::getByName('Footer Menu Two');
                $footerThree = \Menu::getByName('Footer Menu Three');
                $footerFour = \Menu::getByName('Footer Menu Four');
            ?>

            <div class="footer-col-1 col-md-3 col-sm-12">
                <a class="footer_logo" href="#">
                    <img alt="joblist" src="<?php echo e($footerDetails?->logo); ?>">
                </a>
                <div class="mt-20 mb-20 font-xs color-text-paragraph-2"><?php echo e($footerDetails?->details); ?></div>
                <div class="footer-social">
                    <?php $__currentLoopData = $footerIcons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $icon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a class="icon-socials icon-facebook" href="<?php echo e($icon->url); ?>"><i class="<?php echo e($icon->icon); ?>"></i></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>

            <div class="footer-col-2 col-md-2 col-xs-6">
                <h6 class="mb-20">Resources</h6>
                <ul class="menu-footer">
                    <?php $__currentLoopData = $footerOne; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e($menu['link']); ?>"><?php echo e($menu['label']); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </ul>
            </div>
            <!-- <div class="footer-col-3 col-md-2 col-xs-6">
                <h6 class="mb-20">Community</h6>
                <ul class="menu-footer">
                    <?php $__currentLoopData = $footerTwo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a href="<?php echo e($menu['link']); ?>"><?php echo e($menu['label']); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div> -->
            <div class="footer-col-4 col-md-2 col-xs-6">
                <h6 class="mb-20"  style="color:wight">Quick links</h6>
                <ul class="menu-footer">
                <li><a href="/jobs">Job list</a></li>
                <li><a href="/companies">Employers</a></li>
                <li><a href="/page/career-hint">Tips</a></li>
                    <!-- <?php $__currentLoopData = $footerThree; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a href="<?php echo e($menu['link']); ?>"><?php echo e($menu['label']); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> -->
                </ul>
            </div>
            <div class="footer-col-5 col-md-2 col-xs-6">
                <h6 class="mb-20">More</h6>
                <ul class="menu-footer">
                    <?php $__currentLoopData = $footerFour; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a href="<?php echo e($menu['link']); ?>"><?php echo e($menu['label']); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
        <div class="footer-bottom mt-50">
            <div class="row">
                <div class="col-md-6"><span class="font-xs color-text-paragraph"><?php echo e($footerDetails?->copyright); ?></span></div>

            </div>
        </div>
    </div>
</footer>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function(){
            $('.form-newsletter').on('submit', function(e) {
                e.preventDefault();
                let formData = $(this).serialize();
                let button = $('.newsletter-btn');
                $.ajax({
                    method: 'POST',
                    url: '<?php echo e(route("newsletter.store")); ?>',
                    data: formData,
                    beforeSend: function() {
                        button.text('processing...');
                        button.prop('disabled', true);
                    },
                    success: function(response) {
                        button.text("Subscribe")
                        button.prop('disabled', false);
                        $(".form-newsletter").trigger('reset');
                        notyf.success(response.message);
                    },
                    error: function(xhr, status, error) {
                        let erorrs = xhr.responseJSON.errors;
                        console.log(xhr)
                        $.each(erorrs, function(index, value) {
                            notyf.error(value[0]);
                        });
                        button.text("Subscribe");
                        button.prop('disabled', false);
                    }
                })
            })
        })
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\EthJobs-Portal\resources\views/frontend/layouts/footer.blade.php ENDPATH**/ ?>