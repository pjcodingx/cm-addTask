@extends('layouts.auth')

@section('title', 'Login')

@section('style')
<style>
    body {  
        height: 100vh;
        margin: 0;
        background: linear-gradient(rgba(11, 56, 34, 0.7), rgba(0,0,0,0.7)), url('{{ asset('assets/images/cm.jpg') }}') no-repeat center center;
        background-size: cover;
        font-family: 'Georgia', sans-serif;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .login-box {
        background-color: rgba(255, 255, 255, 0.8);
        border-radius: 20px;
        padding: 40px;
        max-width: 450px;
        width: 100%;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        text-align: center;
    }

    .login-box h1 {
        color: #0b3822;
        font-size: 2.5rem;
        margin-bottom: 20px;
        font-weight: bold;
        text-align: center;
        position: relative;
        padding-bottom: 15px;
        transition: 0.5s;
        color: #0a2f1c;
    }

    .login-box img {
        width: 120px;
        display: block;
        margin: 0 auto 30px auto;
    }

    .form-control {
        border-radius: 10px;
        padding: 12px 20px;
        font-size: 1.4rem;
        border: 1px solid #ddd;
        margin-bottom: 15px;
        transition: all 0.3s ease;
        text-align: center;
    }

    .form-control:focus {
        border-color: #0b3822;
        box-shadow: 0 0 0 0.2rem rgba(11, 56, 34, 0.25);
    }

    .sign-in-btn {
        background-color: #0b3822;
        border: none;
        border-radius: 10px;
        padding: 12px 30px;
        font-size: 1.1rem;
        color: white;
        width: 100%;
        margin-top: 10px;
        transition: all 0.3s ease;
    }

    .sign-in-btn:hover {
        background-color: #0a2f1c;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .form-group {
        margin-bottom: 20px;
        text-align: left;
    }

    .form-control::placeholder {
            font-size: 1.2rem;  
            color: #666;        
            opacity: 1;         
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: #333;
        font-weight: 500;
        font-size: 1.3rem;
    }

    .forgot-password {
        text-align: right;
        margin-top: 10px;
    }

    .forgot-password a {
        color: #0b3822;
        text-decoration: none;
        font-size: 0.9rem;
    }

    .forgot-password a:hover {
        text-decoration: underline;
    }

    /* For register design */

    .register-link {
        text-align: center;
        margin-top: 20px;
    }

    .register-link p {
        color: #333;
        font-size: 1rem;
        margin: 0;
    }

    .register-link a {
        color: #0b3822;
        text-decoration: none;
        font-weight: 500;
    }

    .register-link a:hover {
        text-decoration: underline;
    }

    /* Tablet Responsive Design */
    @media screen and (max-width: 768px) {
        .login-box {
            max-width: 400px;
            padding: 30px;
            margin: 20px;
        }

        .login-box h1 {
            font-size: 2.2rem;
        }

        .login-box img {
            width: 100px;
        }

        .form-control {
            padding: 10px 15px;
            font-size: 1rem;
        }

        .form-control::placeholder {
            font-size: 1.2rem;  /* Increase placeholder font size */
            color: #666;        /* Optional: adjust placeholder color */
            opacity: 1;         /* Ensure full opacity */
        }

        .sign-in-btn {
            padding: 10px 25px;
            font-size: 1rem;
        }
    }

    /* Mobile Responsive Design */
    @media screen and (max-width: 480px) {
        body {
            padding: 15px;
        }

        .login-box {
            max-width: 100%;
            padding: 20px;
            margin: 10px;
            border-radius: 15px;
        }

        .login-box h1 {
            font-size: 1.8rem;
            margin-bottom: 15px;
        }

        .login-box img {
            width: 80px;
            margin-bottom: 20px;
        }

        .form-control {
            padding: 8px 12px;
            font-size: 1rem;
            margin-bottom: 12px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-size: 1.2rem;
            margin-bottom: 5px;
        }

        .sign-in-btn {
            padding: 8px 20px;
            font-size: 0.95rem;
        }

        .forgot-password {
            margin-top: 8px;
        }

        .forgot-password a {
            font-size: 0.8rem;
        }

        .register-link {
            margin-top: 15px;
        }
        
        .register-link p {
            font-size: 0.9rem;
        }
    }

    /* Small Mobile Devices */
    @media screen and (max-width: 320px) {
        .login-box {
            padding: 15px;
        }

        .login-box h1 {
            font-size: 1.5rem;
        }

        .login-box img {
            width: 70px;
        }

        .form-control {
            padding: 6px 10px;
            font-size: 0.85rem;
        }
    }
</style>
@endsection

@section('content')
<div class="login-box">
    <h1>LOGIN</h1>
    <img src="{{ asset('assets/images/cmlogo.png') }}" alt="logo">
    <form action="{{ route('login.post')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" id="username" placeholder="School ID" required>
            @error('username')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required>
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="forgot-password">
            <a href="#">Forgot Password?</a>
        </div>

        @if(session()->has('success'))
                <div class="alert alert-success">
                    {{session()->get('success')}}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{session('error')}}
                </div>
            @endif
        <button type="submit" class="sign-in-btn">Sign in</button>
        
        <!-- for register -->
        <div class="register-link">
            <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
        </div>
    </form>
</div>
@endsection
