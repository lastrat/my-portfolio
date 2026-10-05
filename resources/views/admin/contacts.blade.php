@extends('admin.layout')

@section('title', 'Contacts')

@section('content')
    <div class="admin-card">
        <div class="admin-card-header">
            <h2 class="admin-card-title">All Messages</h2>
        </div>
        <div class="admin-table-wrapper">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($contacts as $contact)
                        <tr>
                            <td><strong>{{ $contact->name }}</strong></td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ Str::limit($contact->message, 60) }}</td>
                            <td>{{ $contact->created_at->format('M d, Y') }}</td>
                            <td>
                                @if($contact->is_read)
                                    <span class="admin-badge-success">Read</span>
                                @else
                                    <span class="admin-badge-warning">Unread</span>
                                @endif
                            </td>
                            <td>
                                <a href="#" class="admin-action-link">View</a>
                                <a href="#" class="admin-action-link" style="color: #ff6b6b;">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align: center; padding: 40px; color: var(--text-secondary);">
                                No messages yet
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($contacts->hasPages())
            <div style="margin-top: 20px; display: flex; justify-content: center;">
                {{ $contacts->links() }}
            </div>
        @endif
    </div>
@endsection
