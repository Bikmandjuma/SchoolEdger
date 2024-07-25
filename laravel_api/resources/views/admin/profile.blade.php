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
                    <button class="nav-link {{ session('activeTab') == 'profile-edit' ? 'active' : '' }}" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile & Info</button>
                  </li>
                  <li class="nav-item">
                    <button class="nav-link {{ session('activeTab') == 'profile-change-password' ? 'active' : '' }}" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                  </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade {{ session('activeTab') == 'profile-overview' ? 'show active' : '' }} profile-overview" id="profile-overview">
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

                <div class="tab-pane fade {{ session('activeTab') == 'profile-edit' ? 'show active' : '' }} pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="{{ URL::to('/') }}/adminPanel/assets/img/{{ auth()->guard('admin')->user()->image }}" alt="Profile">
                        <div class="pt-2">
                          <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                          <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image" data-bs-toggle="modal" data-bs-target="#deleteProfileModal"><i class="bi bi-trash"></i></a>
                        </div>
                      </div>
                    </div>

                <form method="POST" action="{{ route('editInfo',auth()->guard('admin')->user()->id) }}">
                    @csrf
                    <div class="row mb-3">
                      <label for="firstname" class="col-md-4 col-lg-3 col-form-label">Firstname</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="firstname" type="text" class="form-control" id="firstname" value="{{ auth()->guard('admin')->user()->firstname }}">
                      </div>
                    </div>
                    
                    <div class="row mb-3">
                      <label for="Lastname" class="col-md-4 col-lg-3 col-form-label">Lastname</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="lastname" type="text" class="form-control" id="Lastname" value="{{ auth()->guard('admin')->user()->lastname }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Gender" class="col-md-4 col-lg-3 col-form-label">Gender</label>
                      <div class="col-md-8 col-lg-9">
                        
                        <select name="gender" type="text" class="form-control">
                            @if(auth()->guard('admin')->user()->gender == 'male')
                                <option value="{{ auth()->guard('admin')->user()->gender }}">{{ auth()->guard('admin')->user()->gender }}</option>
                                <option value="female">female</option>
                            @else
                                <option value="{{ auth()->guard('admin')->user()->gender }}">{{ auth()->guard('admin')->user()->gender }}</option>
                                <option value="male">male</option>
                            @endif
                        </select>

                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone" type="text" class="form-control" id="Phone" value="{{ auth()->guard('admin')->user()->phone }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="Email" value="{{ auth()->guard('admin')->user()->email }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="dob" class="col-md-4 col-lg-3 col-form-label">Dirth of birth</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="dob" type="text" class="form-control" id="dob" value="{{ auth()->guard('admin')->user()->dob }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Username" class="col-md-4 col-lg-3 col-form-label">Username</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="username" type="text" class="form-control" id="Username" value="{{ auth()->guard('admin')->user()->username }}">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">
                          Save Changes
                      </button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="new_password" type="password" class="form-control" id="newPassword" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="new_password_confirmation" type="password" class="form-control" id="renewPassword" required>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

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