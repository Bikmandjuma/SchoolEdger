@extends('admin.cover')
@section('content')
    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>

        <div class="row">
          <div class="col-xl-4"></div>
            <div class="col-xl-4">

              @if(session('profile_deleted'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert align-items-center justify-content-center">
                    {{ session('profile_deleted') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif

              @if(session('data-udated'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert align-items-center justify-content-center">
                    {{ session('data-udated') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
            </div>
          <div class="col-xl-4"></div>
        </div>  

      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="{{ URL::to('/') }}/adminPanel/assets/img/{{ auth()->guard('admin')->user()->image }}" alt="Profile" class="rounded-circle">
              <h2>{{ auth()->guard('admin')->user()->firstname }}&nbsp;{{ auth()->guard('admin')->user()->lastname }}</h2>
              <h3>Admin</h3>
              <!--div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div-->
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                  <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                  </li>
                  <li class="nav-item">
                    <button class="nav-link" onclick="window.location.href='{{ route('myInformation') }}'">Edit Profile & Info</button>
                  </li>
                  <li class="nav-item">
                    <button class="nav-link" onclick="window.location.href='{{ route('show.password') }}'">Change Password</button>
                  </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8">{{ auth()->guard('admin')->user()->firstname }}&nbsp;{{ auth()->guard('admin')->user()->lastname }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Gender</div>
                    <div class="col-lg-9 col-md-8">{{ auth()->guard('admin')->user()->gender }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8">{{ auth()->guard('admin')->user()->phone }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{ auth()->guard('admin')->user()->email }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Date of birth</div>
                    <div class="col-lg-9 col-md-8">{{ auth()->guard('admin')->user()->dob }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Username</div>
                    <div class="col-lg-9 col-md-8">{{ auth()->guard('admin')->user()->username }}</div>
                  </div>

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

            <div class="modal fade" id="deleteProfileModal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header align-items-center justify-content-center">
                      <h5 class="modal-title align-items-center justify-content-center">Delete my profile</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body align-items-center justify-content-center">
                      Are you sure , do you want to delete your profile ?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="window.location.href='{{ route('AdminDeleteProfile',auth()->guard('admin')->user()->id) }}'">Yes</button>
                      <button class="btn btn-danger" class="btn-close" data-bs-dismiss="modal" aria-label="Close">Not now</button>
                    </div>
                  </div>
                </div>
              </div><!-- End Vertically centered Modal-->

@endsection
