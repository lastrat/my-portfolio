@extends('admin.layout')

@section('title', 'Experiences')

@section('content')
    <div class="admin-card">
        <div class="admin-card-header">
            <h2 class="admin-card-title">All Experiences</h2>
            <a href="{{ route('admin.experiences.create') }}" class="btn btn-primary" style="width: auto; padding: 10px 20px; font-size: 14px;">
                + Add Experience
            </a>
        </div>
        <div class="admin-table-wrapper">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Company</th>
                        <th>Year</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($experiences as $experience)
                        <tr>
                            <td><strong>{{ $experience->title }}</strong></td>
                            <td>{{ $experience->company }}</td>
                            <td>{{ $experience->year }}</td>
                            <td>
                                <a href="{{ route('admin.experiences.edit', $experience) }}" class="admin-action-link">Edit</a>
                                <form action="{{ route('admin.experiences.destroy', $experience) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="admin-action-link" style="background: none; border: none; cursor: pointer; color: #ff6b6b; padding: 0; font-size: 13px; font-weight: 500;">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" style="text-align: center; padding: 40px; color: var(--text-secondary);">
                                No experiences yet
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($experiences->hasPages())
            <div style="margin-top: 20px; display: flex; justify-content: center;">
                {{ $experiences->links() }}
            </div>
        @endif
    </div>
@endsection
