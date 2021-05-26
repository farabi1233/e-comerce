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
            <div class="col-md-6">
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

                <form method="POST" action="{{route('customer_reg')}} " id="myForm" enctype="multipart/form-data">
                    @csrf
                    <input name="name" type="text" class="form-control" placeholder="First Name" required>

                    <h2 class="title mb-2">Login information</h2>
                    <input name="email" type="email" class="form-control" placeholder="Email Address" required>
                    <input name="password" type="password" class="form-control" placeholder="Password" required>
                    
                    <input name="mobile" type="text" class="form-control" placeholder="Mobile No" required>


                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="newsletter-signup">
                        <label class="custom-control-label" for="newsletter-signup">Sing up our Newsletter</label>
                    </div><!-- End .custom-checkbox -->

                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary">Create Account</button>
                    </div><!-- End .form-footer -->
                </form>
            </div><!-- End .col-md-6 -->
        </div><!-- End .row -->
    </div><!-- End .container -->
</main><!-- End .main -->


@endsection