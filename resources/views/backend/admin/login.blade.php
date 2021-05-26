@extends('backend.layouts.master_blank')
@section('content')
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                </div>



                                @if(Session::has('error_message'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ Session::get('error_message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            @foreach ($errors->all() as $error)
                            <strong>{{$error}}</strong> <br>
                            @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                                <form class="form-horizontal m-t-20" id="loginform" method="POST" action="{{ route('admin.login') }}">@csrf

                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>


                                    </div>
                                    <div class="input-group mb-2">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                                        </div>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">


                                    </div>

                                    <div class="d-flex justify-content-center mt-3 login_container">
                                        <button type="submit" name="button" class="btn login_btn">Login</button>
                                    </div>
                                </form>
                                <div id="recoverform">
                    <div class="text-center mb-3">
                        <span class="text-white">Enter your e-mail address below and we will send you instructions how to recover a password.</span>
                    </div>
                    <div class="row m-t-20 mb-3">
                        <!-- Form --> 
                        <div class="col-12 mb-3" >
                            <!-- email -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-danger text-white" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="email" id="recover_email" name="recover_email" class="form-control form-control-lg" placeholder="Email Address" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <!-- pwd -->
                            <div class="row m-t-1 border-top border-secondary ">
                                <div class="col-12 mt-4">
                                    <a class="btn btn-success" href="#" id="to-login" name="action">Back To Login</a>
                                    <button id="recover" class="recover btn btn-info float-right" type="button" name="action">Recover</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                </div>

                
            </div>
            

        </div>

    </div>

</div>

@endsection