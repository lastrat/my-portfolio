@extends('admin.layout')

@section('title', $skill->exists ? 'Edit Skill' : 'New Skill')

@section('content')
    <div class="admin-card">
        <div class="admin-card-header">
            <h2 class="admin-card-title">{{ $skill->exists ? 'Edit Skill' : 'New Skill' }}</h2>
        </div>

        <form method="POST" action="{{ $skill->exists ? route('admin.skills.update', $skill) : route('admin.skills.store') }}">
            @csrf
            @if($skill->exists)
                @method('PUT')
            @endif

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div class="form-group">
                    <label class="form-label">Category (FR)</label>
                    <input type="text" name="title_fr" class="form-input" value="{{ old('title_fr', $skill->title_fr ?: $skill->title) }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Category (EN)</label>
                    <input type="text" name="title_en" class="form-input" value="{{ old('title_en', $skill->title_en ?: $skill->title) }}" required>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Tools / Technologies (comma separated)</label>
                <input type="text" name="company" class="form-input" value="{{ old('company', $skill->company) }}" placeholder="Laravel, React, SEO technique">
            </div>

            <div class="form-group">
                <label class="form-label">Description (FR)</label>
                <textarea name="description_fr" class="form-input" rows="3">{{ old('description_fr', $skill->description_fr ?: $skill->description) }}</textarea>
            </div>

            <div class="form-group">
                <label class="form-label">Description (EN)</label>
                <textarea name="description_en" class="form-input" rows="3">{{ old('description_en', $skill->description_en) }}</textarea>
            </div>

            <input type="hidden" name="title" value="{{ old('title', $skill->title ?: 'Skill') }}">

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    {{ $skill->exists ? 'Update Skill' : 'Create Skill' }}
                </button>
                <a href="{{ route('admin.skills') }}" class="btn btn-secondary">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
