<x-auth_layout>
    <div class="auth-fluid">
        <!--Auth fluid left content -->
        <div class="auth-fluid-form-box">
            <div class="align-items-center d-flex h-100">
                <div class="card-body">

                    <!-- Logo -->
                    <div class="auth-brand text-center text-lg-left">
                        <div class="auth-logo">
                            <a href="index.html" class="logo logo-dark text-center">
                                <span class="logo-lg">
                                    <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="22">
                                </span>
                            </a>

                            <a href="index.html" class="logo logo-light text-center">
                                <span class="logo-lg">
                                    <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="22">
                                </span>
                            </a>
                        </div>
                    </div>

                    <!-- title-->
                    <h4 class="mt-0">Sign In</h4>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <p class="text-muted mb-4">Enter your email address and password to access account.</p>

                    <!-- form -->
                    <form action="{{ route('users.authenticate') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="emailaddress">Email address</label>
                            <input class="form-control" type="email" id="emailaddress" name="email" placeholder="Enter your email">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <a href="auth-recoverpw-2.html" class="text-muted float-right"><small>Forgot your password?</small></a>
                            <label for="password">Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password">
                                <div class="input-group-append" data-password="false">
                                    <div class="input-group-text">
                                        <span class="password-eye"></span>
                                    </div>
                                </div>
                            </div>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-0 text-center">
                            <button class="btn btn-primary btn-block" type="submit">Log In </button>
                        </div>
                    </form>
                    <!-- end form-->
                <!-- Footer-->
                <footer class="footer footer-alt">
                    <p class="text-muted">Don't have an account? <a href="auth-register-2.html" class="text-muted ml-1"><b>Sign Up</b></a></p>
                </footer>

            </div> <!-- end .card-body -->
        </div> <!-- end .align-items-center.d-flex.h-100-->
    </div>
    <!-- end auth-fluid-form-box-->

    <!-- Auth fluid right content -->
    <div class="auth-fluid-right text-center">
        <div class="auth-user-testimonial">
            <h2 class="mb-3 text-white">Task Management System!</h2>
            <p class="lead"><i class="mdi mdi-format-quote-open"></i> Task Management System is a web application that allows you to manage your tasks and projects. It is a simple and easy to use application that allows you to manage your tasks and projects. <i class="mdi mdi-format-quote-close"></i>
            </p>
            <h5 class="text-white">
               Created By: Muhammad Huzaifa Gulzar
            </h5>
        </div> <!-- end auth-user-testimonial-->
    </div>
    <!-- end Auth fluid right content -->
</div>
<!-- end auth-fluid-->

    </div>
</x-auth_layout>
