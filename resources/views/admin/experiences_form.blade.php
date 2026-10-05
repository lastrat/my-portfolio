@extends('admin.layout')

@section('title', $experience->exists ? 'Edit Experience' : 'New Experience')

@section('content')
    <div class="admin-card">
        <div class="admin-card-header">
            <h2 class="admin-card-title">{{ $experience->exists ? 'Edit Experience' : 'New Experience' }}</h2>
        </div>

        <form method="POST" action="{{ $experience->exists ? route('admin.experiences.update', $experience) : route('admin.experiences.store') }}">
            @csrf
            @if($experience->exists)
                @method('PUT')
            @endif

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div class="form-group">
                    <label class="form-label">Year</label>
                    <input type="text" name="year" class="form-input" value="{{ old('year', $experience->year) }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Company</label>
                    <input type="text" name="company" class="form-input" value="{{ old('company', $experience->company) }}" required>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-input" value="{{ old('title', $experience->title) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-input" rows="6">{{ old('description', $experience->description) }}</textarea>
            </div>

            <div style="display: flex; gap: 12px;">
                <button type="submit" class="btn btn-primary">
                    {{ $experience->exists ? 'Update Experience' : 'Create Experience' }}
                </button>
                <a href="{{ route('admin.experiences') }}" class="btn" style="background: var(--bg-card); border: 1px solid var(--border); color: var(--text-primary);">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
