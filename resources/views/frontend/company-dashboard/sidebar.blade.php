<div class="col-lg-3 col-md-4 col-sm-12">
    <div class="box-nav-tabs nav-tavs-profile mb-5">
        <ul class="nav" role="tablist">
            <li><a class="btn btn-border mb-20 active" href="{{ route('company.dashboard') }}"> <i
                        class="fas fa-chart-bar fa-lg mr-9"></i> Dashboard</a>
            </li>
            <li><a class="btn btn-border mb-20" href="{{ route('company.profile') }}"><i
                        class="fas fa-user fa-lg mr-9"></i> My Profile</a></li>
            <li>
            <li><a class="btn btn-border mb-20" href="{{ route('company.jobs.index') }}"><i
                        class="fas fa-briefcase fa-lg mr-2"></i> Jobs</a>
            </li>
            <li><a class="btn btn-border mb-20" href="/candidates"> <i class="fas fa-user-tie fa-lg mr-2"></i> Job
                    Seekers</a></li>
            <!-- <li><a class="btn btn-border mb-20" href="{{ route('company.orders.index') }}">Orders</a></li> -->

            <!-- Authentication -->
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="btn btn-border mb-20"
                        onclick="event.preventDefault();
                this.closest('form').submit();"
                        href="{{ route('logout') }}"> <i class="fas fa-sign-out-alt fa-lg mr-2"
                            style="color: red;"></i>Logout</a>

                </form>
            </li>
        </ul>

    </div>
</div>
