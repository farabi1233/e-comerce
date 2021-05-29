@extends('layout')



@section('content')

<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index-2.html"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Login</li>
            </ol>
        </div>
    </nav>

    <div class="container mb-5">
        <div class="row">
            <div class="col-md-5">
                <div class="heading">
                    <h2 class="title">Login</h2>
                    <p>If you have an account with us, please log in.</p>
                </div><!-- End .heading -->

                <form method="POST" action="{{ route('login') }}">
                        @csrf

                        @if ($errors -> any())
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            @foreach ($errors->all() as $error)
                            <strong>{{$error}}</strong> 
                            @endforeach
                          
                        </div>

                        @endif 
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address" >
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password" placeholder="Password" required>



                    <div class="form-footer">
                        <button type="submit" name="submit" class="btn btn-primary">LOGIN</button>
                        <a href="#" class="forget-pass"> Forgot your password?</a>
                    </div><!-- End .form-footer -->
                </form>
            </div><!-- End .col-md-6 -->













            <div class="col-md-6">
                <div class="heading">
                    <h2 class="title">Create An Account</h2>
                    <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
                </div><!-- End .heading -->

                <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-6 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-6 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-6 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-6 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-6">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
            </div><!-- End .col-md-6 -->
        </div><!-- End .row -->
    </div><!-- End .container -->
</main><!-- End .main -->


@endsection