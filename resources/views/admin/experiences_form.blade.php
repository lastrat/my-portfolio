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
                <label class="form-label">Title (FR)</label>
                <input type="text" name="title_fr" class="form-input" value="{{ old('title_fr', $experience->title_fr ?? $experience->title) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Title (EN)</label>
                <input type="text" name="title_en" class="form-input" value="{{ old('title_en', $experience->title_en ?? $experience->title) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Description (FR)</label>
                <textarea name="description_fr" class="form-input" rows="4">{{ old('description_fr', $experience->description_fr ?? $experience->description) }}</textarea>
            </div>

            <div class="form-group">
                <label class="form-label">Description (EN)</label>
                <textarea name="description_en" class="form-input" rows="4">{{ old('description_en', $experience->description_en ?? $experience->description) }}</textarea>
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
