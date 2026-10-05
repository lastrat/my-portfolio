@extends('admin.layout')

@section('title', $tech->exists ? 'Edit Technology' : 'New Technology')

@section('content')
    <div class="admin-card">
        <div class="admin-card-header">
            <h2 class="admin-card-title">{{ $tech->exists ? 'Edit Technology' : 'New Technology' }}</h2>
        </div>

        <form method="POST" action="{{ $tech->exists ? route('admin.tech.update', $tech) : route('admin.tech.store') }}">
            @csrf
            @if($tech->exists)
                @method('PUT')
            @endif

            <div class="form-group">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-input" value="{{ old('name', $tech->name) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Category</label>
                <input type="text" name="category" class="form-input" value="{{ old('category', $tech->category) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Icon SVG (optional)</label>
                <textarea name="icon" class="form-input" rows="6">{{ old('icon', $tech->icon) }}</textarea>
            </div>

            <div style="display: flex; gap: 12px;">
                <button type="submit" class="btn btn-primary">
                    {{ $tech->exists ? 'Update Technology' : 'Create Technology' }}
                </button>
                <a href="{{ route('admin.tech') }}" class="btn" style="background: var(--bg-card); border: 1px solid var(--border); color: var(--text-primary);">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
