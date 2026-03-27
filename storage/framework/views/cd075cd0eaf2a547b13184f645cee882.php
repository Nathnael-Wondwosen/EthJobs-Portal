<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                        class="fas fa-search"></i></a></li>
        </ul>

    </form>
    <ul class="navbar-nav navbar-right">

        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="<?php echo e(asset(auth()->guard('admin')->user()->image)); ?>" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi, <?php echo e(auth()->guard('admin')->user()->name); ?></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">

                <a href="<?php echo e(route('admin.profile.index')); ?>" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>
                <a href="<?php echo e(route('admin.site-settings.index')); ?>" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Settings
                </a>
                <div class="dropdown-divider"></div>
                <form method="POST" action="<?php echo e(route('admin.logout')); ?>">
                    <?php echo csrf_field(); ?>

                    <a href="<?php echo e(route('admin.logout')); ?>"
                        onclick="event.preventDefault();
                    this.closest('form').submit();"
                        class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </form>

            </div>
        </li>
    </ul>
</nav>

<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="dashboard">EthJobs</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?php echo e(url('/')); ?>">EJ</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>

            <li class="<?php echo e(setSidebarActive(['admin.dashboard'])); ?>">
                <a href="<?php echo e(route('admin.dashboard')); ?>" class="nav-link"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
            <li class="menu-header">Settings</li>
            <!-- <?php if(canAccess(['order index'])): ?>
            <li class="<?php echo e(setSidebarActive(['admin.orders.*'])); ?>"><a class="nav-link" href="<?php echo e(route('admin.orders.index')); ?>"><i class="fas fa-cart-plus"></i> <span>Orders</span></a></li>
            <?php endif; ?> -->
            <?php if(canAccess(['job category create', 'job category update', 'job category delete'])): ?>
            <li class="<?php echo e(setSidebarActive(['admin.job-categories.*'])); ?>"><a class="nav-link" href="<?php echo e(route('admin.job-categories.index')); ?>"><i class="fas fa-list"></i> <span>Job Category</span></a></li>
            <?php endif; ?>

            <?php if(canAccess(['job create', 'job update', 'job delete'])): ?>
            <li class="<?php echo e(setSidebarActive(['admin.jobs.*'])); ?>"><a class="nav-link" href="<?php echo e(route('admin.jobs.index')); ?>"><i class="fas fa-briefcase"></i> <span>Job Post</span></a></li>
            <?php endif; ?>

            <?php if(canAccess(['job role'])): ?>
            <li class="<?php echo e(setSidebarActive(['admin.job-roles.*'])); ?>"><a class="nav-link" href="<?php echo e(route('admin.job-roles.index')); ?>"><i class="fas fa-user-md"></i> <span>Job Roles</span></a></li>
            <?php endif; ?>

            <?php if(canAccess(['job attributes'])): ?>

            <li class="dropdown <?php echo e(setSidebarActive(
                ['admin.industry-types.*',
                'admin.organization-types.*',
                'admin.languages.*',
                'admin.professions.*',
                'admin.skills.*',
                'admin.educations.*',
                'admin.job-types.*',
                'admin.salary-types.*',
                'admin.tags.*',
                'admin.job-experiences.*'] )); ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Attributes</span></a>
                <ul class="dropdown-menu">
                    <li class="<?php echo e(setSidebarActive(['admin.industry-types.*'])); ?>"><a class="nav-link" href="<?php echo e(route('admin.industry-types.index')); ?>">Industry Type</a></li>
                    <li class="<?php echo e(setSidebarActive(['admin.organization-types.*'])); ?>"><a class="nav-link" href="<?php echo e(route('admin.organization-types.index')); ?>">Organization Type</a></li>

                    <li class="<?php echo e(setSidebarActive(['admin.languages.*'])); ?>"><a class="nav-link" href="<?php echo e(route('admin.languages.index')); ?>">Languages</a></li>

                    <li class="<?php echo e(setSidebarActive(['admin.professions.*'])); ?>"><a class="nav-link" href="<?php echo e(route('admin.professions.index')); ?>">Professions</a></li>

                    <li class="<?php echo e(setSidebarActive(['admin.skills.*'])); ?>"><a class="nav-link" href="<?php echo e(route('admin.skills.index')); ?>">Skills</a></li>
                    <li class="<?php echo e(setSidebarActive(['admin.educations.*'])); ?>"><a class="nav-link" href="<?php echo e(route('admin.educations.index')); ?>">Educations</a></li>
                    <li class="<?php echo e(setSidebarActive(['admin.job-types.*'])); ?>"><a class="nav-link" href="<?php echo e(route('admin.job-types.index')); ?>">Job Types</a></li>
                    <li class="<?php echo e(setSidebarActive(['admin.salary-types.*'])); ?>"><a class="nav-link" href="<?php echo e(route('admin.salary-types.index')); ?>">Salary Types</a></li>
                    <li class="<?php echo e(setSidebarActive(['admin.tags.*'])); ?>"><a class="nav-link" href="<?php echo e(route('admin.tags.index')); ?>">Tags</a></li>
                    <li class="<?php echo e(setSidebarActive(['admin.job-experiences.*'])); ?>"><a class="nav-link" href="<?php echo e(route('admin.job-experiences.index')); ?>">Experiences</a></li>
                </ul>
            </li>
            <?php endif; ?>

            <?php if(canAccess(['job locations'])): ?>
            <li class="dropdown <?php echo e(setSidebarActive(['admin.countries.*', 'admin.states.*', 'admin.cities.*'])); ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-map"></i>
                    <span>Locations</span></a>
                <ul class="dropdown-menu">
                    <li class="<?php echo e(setSidebarActive(['admin.countries.*'])); ?>"><a class="nav-link" href="<?php echo e(route('admin.countries.index')); ?>">Cities</a></li>
                    <li class="<?php echo e(setSidebarActive(['admin.states.*'])); ?>"><a class="nav-link" href="<?php echo e(route('admin.states.index')); ?>">Sub-Cities</a></li>
                    <li class="<?php echo e(setSidebarActive(['admin.cities.*'])); ?>"><a class="nav-link" href="<?php echo e(route('admin.cities.index')); ?>">Streets</a></li>


                </ul>
            </li>
            <?php endif; ?>

            <?php if(canAccess(['sections'])): ?>
            <li class="dropdown <?php echo e(setSidebarActive([
                'admin.hero.index',
                'admin.why-choose-us.index',
                'admin.learn-more.*',
                'admin.counter.*',
                'admin.job-location.*',
                'admin.reviews.*',
                ])); ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-puzzle-piece"></i>
                    <span>Sections</span></a>
                <ul class="dropdown-menu">
                    <li class="<?php echo e(setSidebarActive(['admin.hero.index'])); ?>"><a class="nav-link" href="<?php echo e(route('admin.hero.index')); ?>">Hero</a></li>
                    <li class="<?php echo e(setSidebarActive(['admin.why-choose-us.*'])); ?>"><a class="nav-link" href="<?php echo e(route('admin.why-choose-us.index')); ?>">Why Choose Us</a></li>
                    <li class="<?php echo e(setSidebarActive(['admin.learn-more.*'])); ?>"><a class="nav-link" href="<?php echo e(route('admin.learn-more.index')); ?>">Learn More</a></li>
                    <li class="<?php echo e(setSidebarActive(['admin.counter.*'])); ?>"><a class="nav-link" href="<?php echo e(route('admin.counter.index')); ?>">Counter</a></li>
                    <li class="<?php echo e(setSidebarActive(['admin.job-location.*'])); ?>"><a class="nav-link" href="<?php echo e(route('admin.job-location.index')); ?>">Job Locations</a></li>
                    <li class="<?php echo e(setSidebarActive(['admin.reviews.*'])); ?>"><a class="nav-link" href="<?php echo e(route('admin.reviews.index')); ?>">Developers</a></li>
                </ul>
            </li>
            <?php endif; ?>

            <?php if(canAccess(['site pages'])): ?>
            <li class="dropdown <?php echo e(setSidebarActive(['admin.about-us.*', 'admin.page-builder.*'])); ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-file"></i>
                    <span>Pages</span></a>
                <ul class="dropdown-menu">
                    <li class="<?php echo e(setSidebarActive(['admin.about-us.*'])); ?>"><a class="nav-link" href="<?php echo e(route('admin.about-us.index')); ?>">About us</a></li>
                    <li class="<?php echo e(setSidebarActive(['admin.page-builder.*'])); ?>"><a class="nav-link" href="<?php echo e(route('admin.page-builder.index')); ?>">Page Builder</a></li>

                </ul>
            </li>
            <?php endif; ?>

            <?php if(canAccess(['site footer'])): ?>
            <li class="dropdown <?php echo e(setSidebarActive(['admin.footer.*', 'admin.social-icon.*'])); ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-shoe-prints"></i>
                    <span>Footer</span></a>
                <ul class="dropdown-menu">
                    <li class="<?php echo e(setSidebarActive(['admin.footer.*'])); ?>"><a class="nav-link" href="<?php echo e(route('admin.footer.index')); ?>">Footer Details</a></li>

                    <li class="<?php echo e(setSidebarActive(['admin.social-icon.*'])); ?>"><a class="nav-link" href="<?php echo e(route('admin.social-icon.index')); ?>">Social Icons</a></li>
                </ul>
            </li>
            <?php endif; ?>

            <?php if(canAccess(['blogs'])): ?>
            <li class="<?php echo e(setSidebarActive(['admin.blogs.*'])); ?>"><a class="nav-link" href="<?php echo e(route('admin.blogs.index')); ?>"><i class="fab fa-blogger-b"></i> <span>Blogs</span></a></li>
            <?php endif; ?>
            <!-- <?php if(canAccess(['price plan'])): ?>
            <li class="<?php echo e(setSidebarActive(['admin.plans.*'])); ?>"><a class="nav-link" href="<?php echo e(route('admin.plans.index')); ?>"><i class="fas fa-box"></i> <span>Price Plan</span></a></li>
            <?php endif; ?> -->

            <?php if(canAccess(['news letter'])): ?>
            <li class="<?php echo e(setSidebarActive(['admin.newsletter.*'])); ?>"><a class="nav-link" href="<?php echo e(route('admin.newsletter.index')); ?>"><i class="fas fa-mail-bulk"></i> <span>Newsletter</span></a></li>
            <?php endif; ?>

           

            <?php if(canAccess(['access management'])): ?>
            <li class="dropdown <?php echo e(setSidebarActive(['admin.role-user.*', 'admin.role.*'])); ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user-shield"></i>
                    <span>Access Management</span></a>
                <ul class="dropdown-menu">
                    <li class="<?php echo e(setSidebarActive(['admin.role-user.*'])); ?>"><a class="nav-link" href="<?php echo e(route('admin.role-user.index')); ?>">Role Users</a></li>
                    <li class="<?php echo e(setSidebarActive(['admin.role.*'])); ?>"><a class="nav-link" href="<?php echo e(route('admin.role.index')); ?>">Roles</a></li>
                </ul>
            </li>
            <?php endif; ?>

            <!-- <?php if(canAccess(['payment settings'])): ?>
            <li class="<?php echo e(setSidebarActive(['admin.payment-settings.index'])); ?>"><a class="nav-link" href="<?php echo e(route('admin.payment-settings.index')); ?>"><i class="fas fa-wrench"></i> <span>Payment Settings</span></a></li>
            <?php endif; ?> -->
            <?php if(canAccess(['AI-Support'])): ?>
            <li class="<?php echo e(setSidebarActive(['admin.support.*'])); ?>">  <a class="nav-link" href="<?php echo e(route('admin.support.info')); ?>"><i class="fas fa-robot"></i><span>AI-Support</span></a></li>
            <?php endif; ?>

            <?php if(canAccess(['site settings'])): ?>

            <li class="<?php echo e(setSidebarActive(['admin.payment-settings.index'])); ?>"><a class="nav-link" href="<?php echo e(route('admin.site-settings.index')); ?>"><i class="fas fa-cog"></i> <span>Site Settings</span></a></li>
                <?php endif; ?>

           <li class="<?php echo e(setSidebarActive(['admin.users.index'])); ?>"><a class="nav-link" href="<?php echo e(route('admin.users.index')); ?>"><i class="fas fa-users"></i> <span> Users</span></a></li>
            <?php if(canAccess(['database clear'])): ?>
            
        
            <li class="<?php echo e(setSidebarActive(['admin.clear-database.index'])); ?>"><a class="nav-link" href="<?php echo e(route('admin.clear-database.index')); ?>"><i class="fas fa-database"></i> <span>Manage Database</span></a></li>
            <?php endif; ?>

             
        </ul>
    </aside>
</div>
<?php /**PATH C:\xampp\htdocs\EthJobs-Portal\resources\views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>