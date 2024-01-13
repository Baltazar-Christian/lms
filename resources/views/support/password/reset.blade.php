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



                            <div class="form-group row mb-2">
                                <label for="password" class="col-md-4 col-form-label text-dark text-md-right">{{ __('Password') }}</label>

                                    <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                            </div>

                            <div class="form-group row mb-3">
                                <label for="password-confirm" class="col-md-4  text-dark col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                            </div>

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
@endsection
