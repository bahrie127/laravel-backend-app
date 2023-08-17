@extends('layouts.auth')

@section('title', 'Reset Password')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="card card-primary">
        <div class="card-header">
            <h4>Reset Password</h4>
        </div>

        <div class="card-body">
            <p class="text-muted">We will send a link to reset your password</p>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <div class="form-group">
                    <input type="text" name="token" value="{{ $request->token }}" hidden>
                    <label for="email">Email</label>
                    <input id="email" type="email"
                        class="form-control @error('email')
                        is-invalid
                    @enderror"
                        name="email" tabindex="1" autofocus value="{{ $request->email }}" readonly>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">New Password</label>
                    <input id="password" type="password"
                        class="form-control @error('password')
                    is-invalid
                    @enderror"
                        name="password" tabindex="2">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password-confirm">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        tabindex="2">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        Reset Password
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/jquery.pwstrength/jquery.pwstrength.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/auth-register.js') }}"></script>
@endpush
