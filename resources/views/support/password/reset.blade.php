<!-- resources/views/admin/password/reset.blade.php -->

@extends('layouts.support')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        <h5> <i class="fa fa-key text-warning"></i> {{ $user->name }} {{ __('Reset Password') }}</h5>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('support.password.update', $user) }}">
                            @csrf


                            <div class="mb-4 col-12">
                                <div class="input-group">
                                    <input type="password" class="form-control form-control-lg form-control-alt" id="signup-password" name="password" placeholder="Password">
                                    <button class="btn btn btn-alt-info" type="button" id="toggle-signup-password">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="mb-4 col-12">
                                <div class="input-group">
                                    <input type="password" class="form-control form-control-lg form-control-alt" id="signup-password-confirm" name="password_confirmation" placeholder="Confirm Password">
                                    <button class="btn btn btn-alt-info" type="button" id="toggle-signup-password-confirm">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>

                            {{-- <div class="form-group row mb-2">
                                <label for="password" class="col-md-4 col-form-label text-dark text-md-right">{{ __('Password') }}</label>

                                    <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                            </div>

                            <div class="form-group row mb-3">
                                <label for="password-confirm" class="col-md-4  text-dark col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                            </div> --}}

                            <div class="form-group row mb-0">
                                <div class="col-md-6"></div>
                                <div class="col-md-6  float-end">
                                    <button type="submit" class="btn btn-dark float-end">
                                        {{ __('Reset Password') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('assets/js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            function togglePasswordVisibility(passwordInput, toggleButton) {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                toggleButton.querySelector('i').classList.toggle('fa-eye-slash');
            }

            const signupPasswordInput = document.getElementById('signup-password');
            const toggleSignupPasswordButton = document.getElementById('toggle-signup-password');

            toggleSignupPasswordButton.addEventListener('click', function () {
                togglePasswordVisibility(signupPasswordInput, this);
            });

            const signupPasswordConfirmInput = document.getElementById('signup-password-confirm');
            const toggleSignupPasswordConfirmButton = document.getElementById('toggle-signup-password-confirm');

            toggleSignupPasswordConfirmButton.addEventListener('click', function () {
                togglePasswordVisibility(signupPasswordConfirmInput, this);
            });
        });
    </script>
@endsection
