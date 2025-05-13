@extends('layouts.auth')

@section('title', 'Register')

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

    .register-box {
        background-color: rgba(255, 255, 255, 0.8);
        border-radius: 20px;
        padding: 30px 35px;
        max-width: 430px;
        width: 100%;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        text-align: center;
    }

    .register-box h1 {
        color: #0b3822;
        font-size: 2.2rem;
        margin-bottom: 12px;
        font-weight: bold;
        text-align: center;
        position: relative;
        padding-bottom: 8px;
        transition: 0.5s;
        color: #0a2f1c;
    }

    .register-box img {
        width: 80px;
        display: block;
        margin: 0 auto 15px auto;
    }

    .form-control {
        border-radius: 10px;
        padding: 10px 15px;
        font-size: 1.2rem;
        border: 1px solid #ddd;
        margin-bottom: 8px;
        transition: all 0.3s ease;
        text-align: center;
    }
    .form-control::placeholder{
        font-size: 1.1rem;
        color: #666;
        opacity: 1;
    }

    .form-control:focus {
        border-color: #0b3822;
        box-shadow: 0 0 0 0.2rem rgba(11, 56, 34, 0.5);
    }

    .password-field {
        position: relative;
        width: 100%;
    }

    .password-field .form-control {
        padding-right: 40px; /* Make space for the icon */
    }

    .password-toggle {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #666;
        z-index: 10;
        background: transparent;
        border: none;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .password-toggle:hover {
        color: #0b3822;
    }

    .sign-up-btn {
        background-color: #0b3822;
        border: none;
        border-radius: 8px;
        padding: 10px 25px;
        font-size: 1rem;
        color: white;
        width: 100%;
        margin-top: 8px;
        transition: all 0.3s ease;
    }

    .sign-up-btn:hover {
        background-color: #0a2f1c;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .form-group {
        margin-bottom: 10px;
        text-align: left;
    }

    .form-group label {
        display: block;
        margin-bottom: 4px;
        color: #333;
        font-weight: 500;
        font-size: 1.2rem;
    }

    .login-link {
        text-align: center;
        margin-top: 20px;
    }

    .login-link a {
        color: #0b3822;
        text-decoration: none;
        font-size: 1rem;
    }

    .login-link a:hover {
        text-decoration: underline;
    }

    /* Tablet Responsive Design */
    @media screen and (max-width: 768px) {
        .register-box {
            max-width: 350px;
            padding: 25px;
            margin: 15px;
        }

        .register-box h1 {
            font-size: 1.8rem;
        }

        .register-box img {
            width: 80px;
        }

        .form-control {
            padding: 8px 12px;
            font-size: 0.9rem;
        }

        .sign-up-btn {
            padding: 8px 20px;
            font-size: 0.9rem;
        }
    }

    /* Mobile Responsive Design */
    @media screen and (max-width: 480px) {
        body {
            padding: 15px;
        }

        .register-box {
            max-width: 100%;
            padding: 20px;
            margin: 10px;
            border-radius: 12px;
        }

        .register-box h1 {
            font-size: 1.6rem;
            margin-bottom: 12px;
        }

        .register-box img {
            width: 70px;
            margin-bottom: 15px;
        }

        .form-control {
            padding: 7px 10px;
            font-size: 0.9rem;
            margin-bottom: 10px;
        }

        .form-group {
            margin-bottom: 12px;
        }

        .form-group label {
            font-size: 0.9rem;
            margin-bottom: 4px;
        }

        .sign-up-btn {
            padding: 8px 20px;
            font-size: 0.9rem;
        }

        .login-link {
            margin-top: 15px;
        }
    }

    /* Small Mobile Devices */
    @media screen and (max-width: 320px) {
        .register-box {
            padding: 15px;
        }

        .register-box h1 {
            font-size: 1.5rem;
        }

        .register-box img {
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
<div class="register-box">
    <h1>REGISTER</h1>
    <img src="{{ asset('assets/images/cmlogo.png') }}" alt="logo">
    <form action="{{ route('register.post') }}" method="POST">
        @csrf
        <div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name" required>
    @error('name')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" required>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" id="username" placeholder="Enter your School id" required>
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
        <button type="submit" class="sign-up-btn">Sign up</button>
        <div class="login-link">
            <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    // Password toggle functionality removed
</script>
@endsection
