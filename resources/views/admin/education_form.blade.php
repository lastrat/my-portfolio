@extends('admin.layout')

@section('title', $education->exists ? 'Edit Education' : 'New Education')

@section('content')
    <div class="admin-card">
        <div class="admin-card-header">
            <h2 class="admin-card-title">{{ $education->exists ? 'Edit Education' : 'New Education' }}</h2>
        </div>

        <form method="POST" action="{{ $education->exists ? route('admin.education.update', $education) : route('admin.education.store') }}">
            @csrf
            @if($education->exists)
                @method('PUT')
            @endif

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div class="form-group">
                    <label class="form-label">Year</label>
                    <input type="text" name="year" class="form-input" value="{{ old('year', $education->year) }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Company / School</label>
                    <input type="text" name="company" class="form-input" value="{{ old('company', $education->company) }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Title (FR)</label>
                    <input type="text" name="title_fr" class="form-input" value="{{ old('title_fr', $education->title_fr ?? $education->title) }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Title (EN)</label>
                    <input type="text" name="title_en" class="form-input" value="{{ old('title_en', $education->title_en ?? $education->title) }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Location</label>
                    <input type="text" name="location" class="form-input" value="{{ old('location', $education->location) }}">
                </div>

                <div class="form-group">
                    <label class="form-label">Latitude</label>
                    <input type="number" step="any" name="lat" class="form-input" value="{{ old('lat', $education->lat) }}">
                </div>

                <div class="form-group">
                    <label class="form-label">Longitude</label>
                    <input type="number" step="any" name="lng" class="form-input" value="{{ old('lng', $education->lng) }}">
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Description (FR)</label>
                <textarea name="description_fr" class="form-input" rows="4">{{ old('description_fr', $education->description_fr ?? $education->description) }}</textarea>
            </div>

            <div class="form-group">
                <label class="form-label">Description (EN)</label>
                <textarea name="description_en" class="form-input" rows="4">{{ old('description_en', $education->description_en ?? $education->description) }}</textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    {{ $education->exists ? 'Update Education' : 'Create Education' }}
                </button>
                <a href="{{ route('admin.education') }}" class="btn btn-secondary">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
