
@extends('layout')

@section('title', 'Register | Student Management System')

@section('content')
<div class="page-shell">
    <div style="max-width:480px;margin:20px auto;background:white;padding:35px;border-radius:22px;box-shadow:0 20px 55px rgb(18 61 42 / 9%);">
        <div class="eyebrow">GET STARTED</div>
        <h1 style="color:#123d2a;margin-bottom:8px;">Create your account</h1>
        <p style="color:#61766a;margin-bottom:28px;">Register to manage student records.</p>

        @if ($errors->any())
            <div style="color:#a51d2d;background:#fff0f0;padding:12px;border-radius:8px;margin-bottom:18px;">
                @foreach ($errors->all() as $error)
                    <p style="margin:4px 0;">{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('register.submit') }}">
            @csrf

            <label for="name" style="display:block;margin-bottom:8px;font-weight:600;">Full name</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required
                style="width:100%;padding:13px;border:1px solid #dfebe3;border-radius:10px;margin-bottom:20px;">

            <label for="email" style="display:block;margin-bottom:8px;font-weight:600;">Email address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                style="width:100%;padding:13px;border:1px solid #dfebe3;border-radius:10px;margin-bottom:20px;">

            <label for="password" style="display:block;margin-bottom:8px;font-weight:600;">Password (minimum 8 characters)</label>
            <input id="password" type="password" name="password" required minlength="8"
                style="width:100%;padding:13px;border:1px solid #dfebe3;border-radius:10px;margin-bottom:20px;">

            <label for="password_confirmation" style="display:block;margin-bottom:8px;font-weight:600;">Confirm password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required minlength="8"
                style="width:100%;padding:13px;border:1px solid #dfebe3;border-radius:10px;margin-bottom:24px;">

            <button type="submit" class="button button-primary" style="width:100%;cursor:pointer;">
                Create account
            </button>
        </form>

        <p style="text-align:center;margin-top:24px;color:#61766a;">
            Already registered?
            <a href="{{ route('login') }}" style="color:#198754;font-weight:700;">Login</a>
        </p>
    </div>
</div>
@endsection
