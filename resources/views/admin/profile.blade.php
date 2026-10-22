@extends('admin.layout')

@section('title', 'My Account')

@section('content')
    <div class="admin-card">
        <div class="admin-card-header">
            <h2 class="admin-card-title">Personal Information</h2>
        </div>

        @if($errors->any())
            <div class="alert" style="background: rgba(255, 0, 0, 0.1); border-color: rgba(255, 0, 0, 0.3); color: #ff6b6b;">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.profile.update') }}">
            @csrf
            @method('PUT')

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div class="form-group">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-input" value="{{ old('name', $user->name) }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-input" value="{{ old('email', $user->email) }}" required>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Role</label>
                <input type="text" class="form-input" value="{{ $user->role }}" disabled style="opacity: 0.6; cursor: not-allowed;">
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    Save changes
                </button>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                    Cancel
                </a>
            </div>
        </form>
    </div>

    <div class="admin-card" style="margin-top: 24px;">
        <div class="admin-card-header">
            <h2 class="admin-card-title">Change Password</h2>
        </div>

        <form method="POST" action="{{ route('admin.profile.update') }}">
            @csrf
            @method('PUT')

            <input type="hidden" name="name" value="{{ $user->name }}">
            <input type="hidden" name="email" value="{{ $user->email }}">

            <div class="form-group">
                <label class="form-label">Current Password</label>
                <input type="password" name="current_password" class="form-input" placeholder="••••••••" autocomplete="current-password">
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div class="form-group">
                    <label class="form-label">New Password</label>
                    <input type="password" name="password" class="form-input" placeholder="Minimum 8 characters" autocomplete="new-password">
                </div>

                <div class="form-group">
                    <label class="form-label">Confirm New Password</label>
                    <input type="password" name="password_confirmation" class="form-input" placeholder="Repeat the new password" autocomplete="new-password">
                </div>
            </div>

            <p style="margin-bottom: 20px; font-size: 12px; color: var(--text-secondary); font-family: var(--font-code);">
                Leave the fields empty to keep your current password.
            </p>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    Update password
                </button>
            </div>
        </form>
    </div>
@endsection
