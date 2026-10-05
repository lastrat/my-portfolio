@extends('admin.layout')

@section('title', 'Education')

@section('content')
    <div class="admin-card">
        <div class="admin-card-header">
            <h2 class="admin-card-title">All Education</h2>
            <a href="{{ route('admin.education.create') }}" class="btn btn-primary" style="width: auto; padding: 10px 20px; font-size: 14px;">
                + Add Education
            </a>
        </div>
        <div class="admin-table-wrapper">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Company</th>
                        <th>Year</th>
                        <th>Location</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($education as $item)
                        <tr>
                            <td><strong>{{ $item->title }}</strong></td>
                            <td>{{ $item->company }}</td>
                            <td>{{ $item->year }}</td>
                            <td>{{ $item->location ?? 'N/A' }}</td>
                            <td>
                                <a href="{{ route('admin.education.edit', $item) }}" class="admin-action-link">Edit</a>
                                <form action="{{ route('admin.education.destroy', $item) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="admin-action-link" style="background: none; border: none; cursor: pointer; color: #ff6b6b; padding: 0; font-size: 13px; font-weight: 500;">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align: center; padding: 40px; color: var(--text-secondary);">
                                No education records yet
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
