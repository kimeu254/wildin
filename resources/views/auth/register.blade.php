@extends('layouts.app')

@section('content')
<div class="form-wrapper">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="logo">
                    <img src="../../dist/images/logo-colorful.png" alt="logo">
                </div>
                <div class="text-center my-5">
                    <p class="text-muted">You can create a free account now</p>
                </div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group">
                        <label for="fullname">Name</label>
                        <div class="form-icon-wrapper">
                            <input id="name" type="text" placeholder="Enter Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            <i class="form-icon-left mdi mdi-account"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fullname">Username</label>
                        <div class="form-icon-wrapper">
                            <input id="username" placeholder="Enter Username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            <i class="form-icon-left mdi mdi-account"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fullname">Phone</label>
                        <div class="form-icon-wrapper">
                            <input id="phone" type="text" placeholder="Enter Phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span> 
                                @enderror
                                
                            <i class="form-icon-left mdi mdi-phone"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fullname">Birthday</label>
                        <div class="form-icon-wrapper">
                            <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth') }}" required autocomplete="date_of_birth" autofocus>

                                @error('date_of_birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <i class="form-icon-left mdi mdi-cake"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <div class="form-icon-wrapper">
                            <input id="email" type="email" placeholder="Enter email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                            <i class="form-icon-left mdi mdi-email"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="form-icon-wrapper">
                            <input id="password" type="password" placeholder="Enter password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            <i class="form-icon-left mdi mdi-lock"></i>
                            <a href="#" class="form-icon-right password-show-hide" title="Hide or show password">
                                <i class="mdi mdi-eye"></i>
                            </a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password-repeat">Retype password</label>
                        <div class="form-icon-wrapper">
                            <input id="password-confirm" type="password" placeholder="Enter password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            <i class="form-icon-left mdi mdi-lock"></i>
                            <a href="#" class="form-icon-right password-show-hide" title="Hide or show password">
                                <i class="mdi mdi-eye"></i>
                            </a>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Sign Up</button>
                    </div>
                    <p class="text-center">Do you already have an account? <a href="{{ route('login') }}">Sign in</a>.</p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
