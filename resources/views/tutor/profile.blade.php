

@extends('layouts.tutor')

@section('content')
     <!-- Hero -->
     <div class="bg-image" style="background-image: url('assets/media/photos/photo10@2x.jpg');">
        <div class="bg-primary-dark-op">
          <div class="content content-full text-center">
            <div class="my-3">
              <img class="img-avatar img-avatar-thumb" src="assets/media/avatars/avatar13.jpg" alt="">
            </div>
            {{-- <h1 class="h2 text-white mb-0">Edit Account</h1> --}}
            <h2 class="h4 fw-normal text-white-75">
              {{ Auth::user()->name }}
            </h2>
            {{-- <a class="btn btn-alt-secondary" href="be_pages_generic_profile.html">
              <i class="fa fa-fw fa-arrow-left text-danger"></i> Back to Profile
            </a> --}}
          </div>
        </div>
      </div>
      <!-- END Hero -->

      <!-- Page Content -->
      <div class="content ">
        <!-- User Profile -->
        <div class="block block-rounded">
          <div class="block-header block-header-default">
            <h3 class="block-title">User Profile</h3>
          </div>
          <div class="block-content">
            <form action="be_pages_projects_edit.html" method="POST" enctype="multipart/form-data" onsubmit="return false;">
              <div class="row push">
                <div class="col-lg-4">
                  <p class="fs-sm text-muted">
                    Your account’s vital info. Your username will be publicly visible.
                  </p>
                </div>
                <div class="col-lg-8 col-xl-5">
                  <div class="mb-4">
                    <label class="form-label" for="one-profile-edit-username">Username</label>
                    <input type="text" class="form-control" id="one-profile-edit-username" name="one-profile-edit-username" placeholder="Enter your username.." value="john.parker">
                  </div>
                  <div class="mb-4">
                    <label class="form-label" for="one-profile-edit-name">Name</label>
                    <input type="text" class="form-control" id="one-profile-edit-name" name="one-profile-edit-name" placeholder="Enter your name.." value="John Parker">
                  </div>
                  <div class="mb-4">
                    <label class="form-label" for="one-profile-edit-email">Email Address</label>
                    <input type="email" class="form-control" id="one-profile-edit-email" name="one-profile-edit-email" placeholder="Enter your email.." value="john.parker@example.com">
                  </div>
                  <div class="mb-4">
                    <label class="form-label">Your Avatar</label>
                    <div class="mb-4">
                      <img class="img-avatar" src="assets/media/avatars/avatar13.jpg" alt="">
                    </div>
                    <div class="mb-4">
                      <label for="one-profile-edit-avatar" class="form-label">Choose a new avatar</label>
                      <input class="form-control" type="file" id="one-profile-edit-avatar">
                    </div>
                  </div>
                  <div class="mb-4">
                    <button type="submit" class="btn btn-alt-primary">
                      Update
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- END User Profile -->

        <!-- Change Password -->
        <div class="block block-rounded">
          <div class="block-header block-header-default">
            <h3 class="block-title">Change Password</h3>
          </div>
          <div class="block-content">
            <form action="be_pages_projects_edit.html" method="POST" onsubmit="return false;">
              <div class="row push">
                <div class="col-lg-4">
                  <p class="fs-sm text-muted">
                    Changing your sign in password is an easy way to keep your account secure.
                  </p>
                </div>
                <div class="col-lg-8 col-xl-5">
                  <div class="mb-4">
                    <label class="form-label" for="one-profile-edit-password">Current Password</label>
                    <input type="password" class="form-control" id="one-profile-edit-password" name="one-profile-edit-password">
                  </div>
                  <div class="row mb-4">
                    <div class="col-12">
                      <label class="form-label" for="one-profile-edit-password-new">New Password</label>
                      <input type="password" class="form-control" id="one-profile-edit-password-new" name="one-profile-edit-password-new">
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col-12">
                      <label class="form-label" for="one-profile-edit-password-new-confirm">Confirm New Password</label>
                      <input type="password" class="form-control" id="one-profile-edit-password-new-confirm" name="one-profile-edit-password-new-confirm">
                    </div>
                  </div>
                  <div class="mb-4">
                    <button type="submit" class="btn btn-alt-primary">
                      Update
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- END Change Password -->



      </div>
      @endsection
