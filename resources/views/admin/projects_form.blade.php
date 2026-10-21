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
                    <label class="form-label">Category</label>
                    @php
                        $categoryOptions = ['Website', 'Web Application', 'Mobile Application', 'AI', 'API / Backend', 'E-commerce', 'Design', 'Other'];
                        $currentCategory = old('category', $project->category);
                        if ($currentCategory && !in_array($currentCategory, $categoryOptions, true)) {
                            $categoryOptions[] = $currentCategory;
                        }
                    @endphp
                    <select name="category" class="form-input">
                        <option value="">— Select a category —</option>
                        @foreach($categoryOptions as $option)
                            <option value="{{ $option }}" @selected($currentCategory === $option)>{{ $option }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">Slug</label>
                    <input type="text" name="slug" class="form-input" value="{{ old('slug', $project->slug) }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" class="form-input" accept="image/*">
                    @if($project->image_url)
                        <img src="{{ $project->image_url }}" style="max-width: 200px; margin-top: 10px; border-radius: 8px; border: 1px solid var(--border);">
                    @endif
                </div>
            </div>

                <div class="form-group">
                    <label class="form-label">Project Link (URL)</label>
                    <input type="url" name="link" class="form-input" value="{{ old('link', $project->link) }}" placeholder="https://example.com">
                </div>

                <div class="form-group">
                    <label class="form-label">Technologies (comma separated)</label>
                    <input type="text" name="tech" class="form-input" value="{{ old('tech', $project->tech ? (is_string($project->tech) ? implode(', ', json_decode($project->tech, true) ?? []) : implode(', ', $project->tech)) : '') }}" required>
                </div>

            <div class="form-group">
                <label class="form-label">Description (FR)</label>
                <textarea name="description_fr" class="form-input" rows="4" required>{{ old('description_fr', $project->description_fr ?? $project->description) }}</textarea>
            </div>

            <div class="form-group">
                <label class="form-label">Description (EN)</label>
                <textarea name="description_en" class="form-input" rows="4" required>{{ old('description_en', $project->description_en ?? $project->description) }}</textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    {{ $project->exists ? 'Update Project' : 'Create Project' }}
                </button>
                <a href="{{ route('admin.projects') }}" class="btn btn-secondary">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
