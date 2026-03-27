<?php $__env->startSection('contents'); ?>

<section class="section-box mt-75">
    <div class="breacrumb-cover">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-12">
            <h2 class="mb-20">Employers</h2>
            <ul class="breadcrumbs">
              <li><a class="home-icon" href="<?php echo e(url('/')); ?>">Home</a></li>
              <li>employers</li>
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
          <div class="content-page company_page">

            <div class="row text-center">
                <?php $__empty_1 = true; $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="card-grid-1 hover-up wow animate__animated animate__fadeIn">
                      <div class="image-box"><a href="<?php echo e(route('companies.show', $company->slug)); ?>"><img src="<?php echo e(asset($company->logo)); ?>"
                            alt="joblist"></a></div>
                      <div class="info-text mt-10">
                        <h5 class="font-bold"><a href="<?php echo e(route('companies.show', $company->slug)); ?>"><?php echo e($company->name); ?></a></h5>

                        <span class="card-location"><?php echo e(formatLocation($company->companyCountry->name, $company->companyState->name)); ?></span>
                        <div class="mt-30"><a class="btn btn-grey-big" href="<?php echo e(route('companies.show', $company->slug)); ?>"><span><?php echo e($company->jobs_count); ?></span><span> Jobs Open</span></a></div>
                      </div>
                    </div>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <h5>Sorry No Data Found! 😥</h5>
                <?php endif; ?>


            </div>
          </div>

          <div class="paginations">
            <ul class="pager">
                <?php if($companies->hasPages()): ?>
                    <?php echo e($companies->withQueryString()->links()); ?>

                <?php endif; ?>
            </ul>
        </div>
        </div>
        <div class="col-lg-3 col-md-12 col-sm-12 col-12">
          <div class="sidebar-shadow none-shadow mb-30">
            <div class="sidebar-filters">
              <div class="filter-block head-border mb-30">
                <h5>Advance Filter <a class="link-reset" href="#">Reset</a></h5>
              </div>

                <form action="<?php echo e(route('companies.index')); ?>" method="GET">
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

                <form action="">
                    <div class="filter-block mb-20">
                        <h5 class="medium-heading mb-15">Industry</h5>
                        <div class="form-group">
                          <ul class="list-checkbox">
                            <li class="active">
                                <label class="d-flex">
                                  <input type="radio" name="industry" class="x-radio" value=""><span class="text-small">All</span>
                                </label>
                            </li>
                            <?php $__currentLoopData = $industryTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="active">
                              <label class="d-flex">
                                <input type="radio" <?php if($type->slug == request()->industry): echo 'checked'; endif; ?> name="industry" class="x-radio" value="<?php echo e($type->slug); ?>"><span class="text-small"><?php echo e($type->name); ?></span><span class="number-item"><?php echo e($type->companies_count); ?></span>
                              </label>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                          </ul>
                        </div>
                      </div>

                      <div class="filter-block mb-20">
                        <h5 class="medium-heading mb-15">Organization</h5>
                        <div class="form-group">
                          <ul class="list-checkbox">
                            <li>
                                <label class="d-flex">
                                    <input type="radio" name="organization" class="x-radio" value=""><span class="text-small">All</span>
                                  </label>
                            </li>
                            <?php $__currentLoopData = $organizations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $organization): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <label class="d-flex">
                                    <input type="radio" <?php if($organization->slug == request()->organization): echo 'checked'; endif; ?> name="organization" class="x-radio" value="<?php echo e($organization->slug); ?>"><span class="text-small"><?php echo e($organization->name); ?></span><span class="number-item"><?php echo e($organization->companies_count); ?></span>
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
    })
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\EthJobs-Portal\resources\views/frontend/pages/company-index.blade.php ENDPATH**/ ?>