<?php $__env->startSection('contents'); ?>
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Job's</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="<?php echo e(url('/')); ?>">Home</a></li>
                            <li>Job's</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box mt-120">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-9 col-md-12 col-sm-12 col-12 float-right">
                    <div class="content-page">

                        <div class="row display-list">
                            <?php $__empty_1 = true; $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="col-xl-12 col-md-4">
                                    <div class="card-grid-2 hover-up"><span class="flash"></span>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="card-grid-2-image-left">
                                                    <div class="image-box"><img src="<?php echo e(asset($job->company->logo)); ?>"
                                                            alt="joblist"></div>
                                                    <div class="right-info"><a class="name-job"
                                                            href="<?php echo e(route('companies.show', $job->company->slug)); ?>"><?php echo e($job->company->name); ?></a><span
                                                            class="location-small"><?php echo e(formatLocation($job->company->companyCountry->name, $job->company?->companyState?->name)); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 text-start text-md-end pr-60 col-md-6 col-sm-12">
                                                <div class="pl-15 mb-15 mt-30">
                                                    <?php if($job->featured): ?>
                                                    <a class="btn btn-grey-small mr-5 featured" href="javascript:;">Featured</a>
                                                    <?php endif; ?>
                                                    <?php if($job->highlight): ?>
                                                    <a class="btn btn-grey-small mr-5 highlight" href="javascript:;">Highlight</a>
                                                    <?php endif; ?>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="card-block-info">
                                            <h4><a href="<?php echo e(route('jobs.show', $job->slug)); ?>"><?php echo e($job->title); ?></a></h4>
                                            <div class="mt-5">
                                                    <span
                                                    class="card-briefcase"><?php echo e($job->jobType->name); ?></span>
                                                    <span class="card-briefcase"><?php echo e($job->jobExperience?->name); ?></span>
                                                    <span
                                                    class="card-time"><span><?php echo e($job->created_at->diffForHumans()); ?></span></span>
                                            </div>
                                            
                                                <div class="mb-15 mt-30">
                                                    <?php $__currentLoopData = $job->skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jobSkill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($loop->index <= 6): ?>
                                                        <a class="btn btn-grey-small mr-5 job-skill" href="javascript:;"><?php echo e($jobSkill->skill->name); ?></a>
                                                    <?php elseif($loop->index == 7): ?>
                                                    <a class="btn btn-grey-small mr-5 job-skill" href="javascript:;">More..</a>
                                                    <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>

                                            <div class="card-2-bottom mt-20">
                                                <div class="row">
                                                    <?php if($job->salary_mode === 'range'): ?>
                                                    <div class="col-lg-7 col-7"><span
                                                        class="card-text-price">
                                                        <?php echo e($job->min_salary); ?> - <?php echo e($job->max_salary); ?> <?php echo e(config('settings.site_default_currency')); ?>

                                                    </span><span
                                                        class="text-muted"></span>
                                                    </div>
                                                    <?php else: ?>
                                                    <div class="col-lg-7 col-7"><span
                                                        class="card-text-price">
                                                        <?php echo e($job->custom_salary); ?>

                                                    </span><span
                                                        class="text-muted"></span>
                                                    </div>
                                                    <?php endif; ?>
                                                    <?php
                                                        $bookmarkedIds = \App\Models\JobBookmark::where('candidate_id', auth()?->user()?->candidateProfile?->id)->pluck('job_id')->toArray();

                                                    ?>

                                                    <div class="col-lg-5 col-5 text-end">
                                                        <div class="btn bookmark-btn job-bookmark" data-id="<?php echo e($job->id); ?>">

                                                            <?php if(in_array($job->id, $bookmarkedIds)): ?>
                                                            <i class="fas fa-bookmark"></i>
                                                            <?php else: ?>
                                                            <i class="far fa-bookmark"></i>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <h5 class="text-center">Sorry No Data Found! 😥</h5>
                            <?php endif; ?>

                        </div>
                    </div>

                    <div class="paginations">
                        <ul class="pager">
                            <?php if($jobs->hasPages()): ?>
                                <?php echo e($jobs->withQueryString()->links()); ?>

                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="sidebar-shadow none-shadow mb-30">
                        <div class="sidebar-filters">
                            <div class="filter-block head-border mb-30">
                                <h5>Advance Filter <a class="link-reset" href="jobs">Reset</a></h5>
                            </div>
                            <form action="<?php echo e(route('jobs.index')); ?>" method="GET">
                            <div class="filter-block mb-20">
                                <div class="form-group ">
                                    <input type="text" value="<?php echo e(request()?->search); ?>" class="form-control" name="search" placeholder="Search">
                                </div>
                            </div>
                            <div class="filter-block mb-20">
                                <div class="form-group select-style">
                                    <select name="country" class="form-control country form-icons select-active">
                                        <option value="">City</option>
                                        <option value="">All</option>
                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php if(request()?->country == $country->id): echo 'selected'; endif; ?> value="<?php echo e($country->id); ?>"><?php echo e($country->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </select>
                                </div>
                            </div>
                            <div class="filter-block mb-20">
                                <div class="form-group select-style">
                                    <select name="state" class="form-control state form-icons select-active">
                                        <?php if($selectedStates): ?>
                                            <option value="">All</option>
                                            <?php $__currentLoopData = $selectedStates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php if($state->id == request()->state): echo 'selected'; endif; ?> value="<?php echo e($state->id); ?>" ><?php echo e($state->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <option value="" >Sub-city</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="filter-block mb-20">
                                <div class="form-group select-style">
                                    <select name="city" class="form-control city form-icons select-active">
                                        <?php if($selectedCites): ?>
                                            <option value="">All</option>

                                            <?php $__currentLoopData = $selectedCites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php if($city->id == request()->city): echo 'selected'; endif; ?> value="<?php echo e($city->id); ?>" ><?php echo e($city->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <option value="">street</option>
                                        <?php endif; ?>
                                    </select>
                                    <button class="submit btn btn-default mt-10 rounded-1 w-100"
                                        type="submit">Search</button>
                                </div>
                            </div>
                            </form>

                            <form action="<?php echo e(route('jobs.index')); ?>" method="GET">
                                <div class="filter-block mb-20">
                                <h5 class="medium-heading mb-15">Categoires</h5>
                                <div class="form-group">
                                    <ul class="list-checkbox">
                                        <?php $__currentLoopData = $jobCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox" name="category[]" value="<?php echo e($category->slug); ?>"><span class="text-small"><?php echo e($category->name); ?></span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item"><?php echo e($category->jobs_count); ?></span>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </ul>
                                </div>
                            </div>
                            <div class="filter-block mb-20">
                                <h5 class="medium-heading mb-25">Salary Range</h5>
                                <div class="list-checkbox pb-20">
                                    <div class="row position-relative mt-10 mb-20">
                                        <div class="col-sm-12 box-slider-range">
                                            <div id="slider-range"></div>
                                        </div>
                                        <div class="box-input-money">
                                            <input class="input-disabled form-control min-value-money" type="text"
                                                name="min-value-money" disabled="disabled" value="">
                                            <input class="form-control min-value" type="hidden" name="min_salary"
                                                value="">
                                        </div>
                                    </div>
                                    <div class="box-number-money">
                                        <div class="row mt-30">
                                            <div class="col-sm-6 col-6"><span class="font-sm color-brand-1"><?php echo e(config('settings.site_currency_icon')); ?>0</span>
                                            </div>
                                            <div class="col-sm-6 col-6 text-end"><span
                                                    class="font-sm color-brand-1"><?php echo e(config('settings.site_currency_icon')); ?>100000</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="filter-block mb-20">
                                <h5 class="medium-heading mb-15">Job type</h5>
                                <div class="form-group">
                                    <ul class="list-checkbox">
                                        <?php $__currentLoopData = $jobTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jobType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <label class="cb-container">
                                                <input type="checkbox" name="jobtype[]" value="<?php echo e($jobType->slug); ?>"><span class="text-small"><?php echo e($jobType->name); ?></span><span
                                                    class="checkmark"></span>
                                            </label>
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </ul>
                                </div>
                            </div>
                            <button class="submit btn btn-default mt-10 rounded-1 w-100"
                                        type="submit">Search</button>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    $(document).ready(function() {
        $('.country').on('change', function() {
            let country_id = $(this).val();
            // remove all previous cities
            $('.city').html("");

            $.ajax({
                mehtod: 'GET',
                url: '<?php echo e(route("get-states", ":id")); ?>'.replace(":id", country_id),
                data: {},
                success: function(response) {
                    let html = '';

                    $.each(response, function(index, value) {
                        html += `<option value="${value.id}" >${value.name}</option>`
                    });

                    html = `<option value="" >Choose</option>` + html;

                    $('.state').html(html);
                },
                error: function(xhr, status, error) {}
            })
        })

        // get cities
        $('.state').on('change', function() {
            let state_id = $(this).val();

            $.ajax({
                mehtod: 'GET',
                url: '<?php echo e(route("get-cities", ":id")); ?>'.replace(":id", state_id),
                data: {},
                success: function(response) {
                    let html = '';

                    $.each(response, function(index, value) {
                        html += `<option value="${value.id}" >${value.name}</option>`
                    });

                    html = `<option value="" >Choose</option>` + html;

                    $('.city').html(html);
                },
                error: function(xhr, status, error) {}
            })
        })

        $('.job-bookmark').on('click', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        $.ajax({
            method: 'GET',
            url: '<?php echo e(route("job.bookmark", ":id")); ?>'.replace(":id", id),
            data: {},
            success: function(response) {
                //fas fa-bookmark
                $('.job-bookmark').each(function() {
                    let elementId = $(this).data('id');

                    if(elementId == response.id) {
                        $(this).find('i').addClass('fas fa-bookmark');
                    }
                })
                notyf.success(response.message)
            },
            error: function(xhr, status, error) {
                let erorrs = xhr.responseJSON.errors;
                $.each(erorrs, function(index, value) {
                    notyf.error(value[index]);
                });
            }
        })
    })
    })
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\EthJobs-Portal\resources\views/frontend/pages/jobs-index.blade.php ENDPATH**/ ?>