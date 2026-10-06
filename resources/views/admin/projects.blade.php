@extends('admin.layout')

@section('title', 'Projects')

@section('content')
    <div class="admin-card">
        <div class="admin-card-header">
            <h2 class="admin-card-title">All Projects</h2>
            <a href="{{ route('admin.projects.create') }}" class="btn btn-primary" style="width: auto; padding: 10px 20px; font-size: 14px;">
                + Add Project
            </a>
        </div>
        <div class="admin-table-wrapper">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Role</th>
                        <th>Year</th>
                        <th>Client</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $project)
                        <tr>
                            <td><strong>{{ $project->title }}</strong></td>
                            <td>{{ $project->role }}</td>
                            <td>{{ $project->year }}</td>
                            <td>{{ $project->client }}</td>
                            <td>
                                <a href="{{ route('admin.projects.edit', $project) }}" class="admin-action-link">Edit</a>
                                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="admin-action-link" style="background: none; border: none; cursor: pointer; color: #ff6b6b; padding: 0; font-size: 13px; font-weight: 500;">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align: center; padding: 40px; color: var(--text-secondary);">
                                No projects yet
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($projects->hasPages())
            <div style="margin-top: 20px; display: flex; justify-content: center;">
                {{ $projects->links() }}
            </div>
        @endif
    </div>
@endsection
