

@extends('layouts.student')

@section('content')
     <!-- Hero -->
     <div class="bg-image" style="background-image: url('');">
        <div class="bg-primary-dark-op">
          <div class="content content-full text-center">
            <div class="my-3">
              <img class="img-avatar img-avatar-thumb" src="{{ asset('public/storage/'.Auth::user()->avatar.'') }}" alt="">
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
            <form action="{{ route('updateProfile') }}" method="POST" enctype="multipart/form-data" >
                @csrf
              <div class="row push">
                <div class="col-lg-12">
                  <p class="fs-sm text-muted">
                    Your account’s vital info. Your username will be publicly visible.
                  </p>
                </div>
                <div class="col-lg-12 col-xl-12">

                  <div class="mb-4">
                    <label class="form-label" for="one-profile-edit-name">Name</label>
                    <input type="text" class="form-control" id="one-profile-edit-name" name="one-profile-edit-name" placeholder="Enter your name.." value="{{ Auth::user()->name }}">
                  </div>
                  <div class="mb-4">
                    <label class="form-label" for="one-profile-edit-email">Email Address</label>
                    <input type="email" class="form-control" id="one-profile-edit-email" name="one-profile-edit-email" placeholder="Enter your email.." value="{{ Auth::user()->email }}">
                  </div>
                  <div class="mb-4">
                    <label class="form-label">Your Avatar</label>
                    <div class="mb-4 mx-auto">
                        <span class="text-muted fs-sm">
                            Please upload an image with the following conditions:
                            <ul>
                                <li>File type: jpeg, png, jpg, gif, webp</li>
                                <li>Maximum file size: 2MB (2048 KB)</li>
                            </ul>
                        </span>
                      <img class="img-avatar" src="{{ asset('public/storage/'.Auth::user()->avatar.'') }}" alt="Avatar">

                    </div>
                    <div class="mb-4">
                      <label for="one-profile-edit-avatar" class="form-label">Choose a new avatar</label>
                      <input class="form-control" name="avatar" type="file" id="one-profile-edit-avatar">
                    </div>
                  </div>
                  <div class="mb-4">
                    <button type="submit" class="btn btn-dark float-end">
                      Update Profile
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
              <form action="{{ route('changePassword') }}" method="POST" >
                  @csrf
                <div class="row push">
                  <div class="col-lg-12">
                    <p class="fs-sm text-muted">
                      Changing your sign in password is an easy way to keep your account secure.
                    </p>
                  </div>
                  <div class="col-lg-12 col-xl-12">
                  @if(session('error'))
                      <div class="alert alert-danger">
                          {{ session('error') }}
                      </div>
                  @endif

                    <div class="mb-4 col-12">
                      <label class="form-label" for="one-profile-edit-password-new">New Password</label>
                      <div class="input-group">

                          <input type="password" class="form-control form-control-lg form-control-alt" id="old-password" name="one-profile-edit-password" placeholder="Password">
                          <button class="btn btn btn-alt-info" type="button" id="toggle-old-password">
                              <i class="fas fa-eye"></i>
                          </button>
                      </div>
                  </div>


                    <div class="row">

                      <div class="mb-4 col-12">
                          <label class="form-label" for="one-profile-edit-password-new">New Password</label>
                          <div class="input-group">

                              <input type="password" class="form-control form-control-lg form-control-alt" id="signup-password" name="one-profile-edit-password-new" placeholder="Password">
                              <button class="btn btn btn-alt-info" type="button" id="toggle-signup-password">
                                  <i class="fas fa-eye"></i>
                              </button>
                          </div>
                      </div>

                      <div class="mb-4 col-12">
                          <label class="form-label" for="one-profile-edit-password-new-confirm">Confirm New Password</label>

                          <div class="input-group">


                              <input type="password" class="form-control form-control-lg form-control-alt" id="signup-password-confirm" name="one-profile-edit-password-new-confirm" placeholder="Confirm Password">
                              <button class="btn btn btn-alt-info" type="button" id="toggle-signup-password-confirm">
                                  <i class="fas fa-eye"></i>
                              </button>
                          </div>
                      </div>

                  </div>

                    <div class="mb-4">
                      <button type="submit" class="btn btn-dark float-end">
                        Change Password
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
