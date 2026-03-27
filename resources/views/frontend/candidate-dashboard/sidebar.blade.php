<div class="col-lg-3 col-md-4 col-sm-12">
    <div class="box-nav-tabs nav-tavs-profile mb-5">
        <ul class="nav" role="tablist">
            <li><a class="btn btn-border mb-20 active" href="{{ route('candidate.dashboard') }}"><i
                        class="fas fa-chart-bar fa-lg mr-9"></i> Dashboard</a></li>

            <li><a class="btn btn-border mb-20" href="{{ route('candidate.profile.index') }}"><i
                        class="fas fa-user fa-lg mr-9"></i> My Profile</a></li>

            <li><a class="btn btn-border mb-20" href="{{ route('generatecv.show', Auth::id()) }}"> <i
                        class="fas fa-file-alt fa-lg mr-2"></i>Generate CV</a></li>
            <li><a class="btn btn-border mb-20" href="{{ route('candidate.applied-jobs.index') }}"> <i
                        class="fas fa-check-circle fa-lg mr-2"></i> Applied Jobs</a></li>
            <li><a class="btn btn-border mb-20" href="{{ route('candidate.bookmarked-jobs.index') }}"> <i
                        class="fas fa-bookmark fa-lg mr-2"></i> Bookmarked</a>
            <li>


            <li>
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="btn btn-border mb-20"
                        onclick="event.preventDefault();
                this.closest('form').submit();"
                        href="{{ route('logout') }}"> <i class="fas fa-sign-out-alt fa-lg mr-2" style="color: red;"></i>
                        Logout</a>

                </form>
            </li>
        </ul>

    </div>
</div>
