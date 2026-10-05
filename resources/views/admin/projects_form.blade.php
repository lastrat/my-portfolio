@extends('admin.layout')

@section('title', $project->exists ? 'Edit Project' : 'New Project')

@section('content')
    <div class="admin-card">
        <div class="admin-card-header">
            <h2 class="admin-card-title">{{ $project->exists ? 'Edit Project' : 'New Project' }}</h2>
        </div>

        <form method="POST" action="{{ $project->exists ? route('admin.projects.update', $project) : route('admin.projects.store') }}" enctype="multipart/form-data">
            @csrf
            @if($project->exists)
                @method('PUT')
            @endif

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div class="form-group">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-input" value="{{ old('title', $project->title) }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Role</label>
                    <input type="text" name="role" class="form-input" value="{{ old('role', $project->role) }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Year</label>
                    <input type="text" name="year" class="form-input" value="{{ old('year', $project->year) }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Client</label>
                    <input type="text" name="client" class="form-input" value="{{ old('client', $project->client) }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Slug</label>
                    <input type="text" name="slug" class="form-input" value="{{ old('slug', $project->slug) }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" class="form-input" accept="image/*">
                    @if($project->image)
                        <img src="{{ asset($project->image) }}" style="max-width: 200px; margin-top: 10px; border-radius: 8px; border: 1px solid var(--border);">
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Technologies (comma separated)</label>
                <input type="text" name="tech" class="form-input" value="{{ old('tech', $project->tech ? implode(', ', json_decode($project->tech, true) ?? []) : '') }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-input" rows="6" required>{{ old('description', $project->description) }}</textarea>
            </div>

            <div style="display: flex; gap: 12px;">
                <button type="submit" class="btn btn-primary">
                    {{ $project->exists ? 'Update Project' : 'Create Project' }}
                </button>
                <a href="{{ route('admin.projects') }}" class="btn" style="background: var(--bg-card); border: 1px solid var(--border); color: var(--text-primary);">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
