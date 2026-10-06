@extends('admin.layout')

@section('title', 'Tech Stack')

@section('content')
    <div class="admin-card">
        <div class="admin-card-header">
            <h2 class="admin-card-title">All Technologies</h2>
            <a href="{{ route('admin.tech.create') }}" class="btn btn-primary" style="width: auto; padding: 10px 20px; font-size: 14px;">
                + Add Technology
            </a>
        </div>
        <div class="admin-table-wrapper">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($techs as $tech)
                        <tr>
                            <td><strong>{{ $tech->name }}</strong></td>
                            <td>{{ $tech->category }}</td>
                            <td>
                                <a href="{{ route('admin.tech.edit', $tech) }}" class="admin-action-link">Edit</a>
                                <form action="{{ route('admin.tech.destroy', $tech) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="admin-action-link" style="background: none; border: none; cursor: pointer; color: #ff6b6b; padding: 0; font-size: 13px; font-weight: 500;">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" style="text-align: center; padding: 40px; color: var(--text-secondary);">
                                No technologies yet
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($techs->hasPages())
            <div style="margin-top: 20px; display: flex; justify-content: center;">
                {{ $techs->links() }}
            </div>
        @endif
    </div>
@endsection
