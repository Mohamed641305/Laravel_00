@extends('layouts.app')

@section('content')
    <style>
        body {
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            min-height: 100vh;
            overflow: hidden;
            /* يمنع الـ scroll */
        }

        .register-card {
            border: none;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0, 0, 0, .15);
            max-height: 90vh;
        }

        .register-left {
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            color: white;
            padding: 40px 30px;
            /* تصغير padding */
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .register-right {
            padding: 30px;
            /* تصغير الفورم */
            background: #fff;
            overflow: hidden;
        }

        .brand-icon {
            width: 75px;
            height: 75px;
            background: rgba(255, 255, 255, .15);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            margin-bottom: 15px;
        }

        .form-control {
            height: 42px;
            /* أصغر */
            border-radius: 10px;
            font-size: 14px;
        }

        .btn-register {
            height: 45px;
            border-radius: 10px;
            font-weight: 600;
        }

        .register-title {
            font-weight: 700;
            font-size: 20px;
            margin-bottom: 15px;
        }

        .form-label {
            font-size: 13px;
            margin-bottom: 3px;
        }

        .mb-3 {
            margin-bottom: 10px !important;
        }

        @media(max-width:768px) {
            .register-left {
                display: none;
            }
        }
    </style>

    <div class="container">
        <div class="row justify-content-center align-items-center" style="min-height:100vh;">

            <div class="col-lg-9">

                <div class="register-card card">



                    <div class="row g-0">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Left Side -->
                        <div class="col-lg-5 register-left">

                            <div class="brand-icon">
                                <i class="fas fa-user-plus"></i>
                            </div>

                            <h3 class="fw-bold">Create Account 🚀</h3>

                            <p class="mb-0 opacity-75" style="font-size:14px;">
                                Join us and start managing your system easily.
                            </p>

                        </div>

                        <!-- Right Side -->
                        <div class="col-lg-7 register-right">

                            <h4 class="text-center register-title">
                                Register
                            </h4>

                            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                @csrf

                                <!-- Name -->
                                <div class="mb-3">
                                    <label class="form-label">Full Name</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>

                                <!-- Email -->
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>

                                <!-- Password -->
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" required>
                                </div>

                                <!-- Confirm -->
                                <div class="mb-3">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" name="password_confirmation" required>
                                </div>

                                <!-- Phone -->
                                <div class="mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="text" class="form-control" name="phone_number" required>
                                </div>

                                <!-- Address -->
                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control" name="address" required>
                                </div>

                                <!-- Button -->
                                <button type="submit" class="btn btn-primary btn-register w-100">
                                    <i class="fas fa-user-plus me-2"></i>
                                    Create Account
                                </button>

                            </form>

                            <div class="mt-2 text-center">
                                <a href="{{ route('login') }}" class="text-decoration-none" style="font-size:13px;">
                                    Already have account? Login
                                </a>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>
@endsection
