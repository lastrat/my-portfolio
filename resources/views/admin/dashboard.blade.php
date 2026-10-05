@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
    <div class="admin-stats-grid">
        <div class="admin-stat-card">
            <div class="admin-stat-header">
                <div class="admin-stat-icon">💼</div>
                <div class="admin-stat-trend">+2 this month</div>
            </div>
            <div class="admin-stat-value">{{ $stats['projects'] }}</div>
            <div class="admin-stat-label">Projects</div>
        </div>

        <div class="admin-stat-card">
            <div class="admin-stat-header">
                <div class="admin-stat-icon">💼</div>
                <div class="admin-stat-trend">Active</div>
            </div>
            <div class="admin-stat-value">{{ $stats['experiences'] }}</div>
            <div class="admin-stat-label">Experiences</div>
        </div>

        <div class="admin-stat-card">
            <div class="admin-stat-header">
                <div class="admin-stat-icon">🎓</div>
                <div class="admin-stat-trend">Updated</div>
            </div>
            <div class="admin-stat-value">{{ $stats['education'] }}</div>
            <div class="admin-stat-label">Education</div>
        </div>

        <div class="admin-stat-card">
            <div class="admin-stat-header">
                <div class="admin-stat-icon">⚡</div>
                <div class="admin-stat-trend">Growing</div>
            </div>
            <div class="admin-stat-value">{{ $stats['techs'] }}</div>
            <div class="admin-stat-label">Technologies</div>
        </div>

        <div class="admin-stat-card">
            <div class="admin-stat-header">
                <div class="admin-stat-icon">✉️</div>
                @if($stats['unread_contacts'] > 0)
                    <div class="admin-stat-trend" style="color: var(--accent-green);">{{ $stats['unread_contacts'] }} unread</div>
                @else
                    <div class="admin-stat-trend">All read</div>
                @endif
            </div>
            <div class="admin-stat-value">{{ $stats['contacts'] }}</div>
            <div class="admin-stat-label">Total Contacts</div>
        </div>

        <div class="admin-stat-card">
            <div class="admin-stat-header">
                <div class="admin-stat-icon">🎯</div>
                <div class="admin-stat-trend">Excellent</div>
            </div>
            <div class="admin-stat-value">100%</div>
            <div class="admin-stat-label">Profile Complete</div>
        </div>
    </div>

    <div class="admin-grid">
        <div class="admin-card">
            <div class="admin-card-header">
                <h2 class="admin-card-title">Recent Contacts</h2>
                <a href="{{ route('admin.contacts') }}" class="admin-card-action">View All →</a>
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
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentContacts as $contact)
                            <tr>
                                <td><strong>{{ $contact->name }}</strong></td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ Str::limit($contact->message, 50) }}</td>
                                <td>{{ $contact->created_at->format('M d, Y') }}</td>
                                <td>
                                    @if($contact->is_read)
                                        <span class="admin-badge-success">Read</span>
                                    @else
                                        <span class="admin-badge-warning">Unread</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" style="text-align: center; padding: 50px; color: var(--text-secondary);">
                                    No contacts yet
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="admin-card">
            <div class="admin-card-header">
                <h2 class="admin-card-title">Quick Actions</h2>
            </div>
            <div class="admin-quick-actions">
                <a href="{{ route('admin.projects') }}" class="admin-quick-action">
                    <span class="admin-quick-action-icon">➕</span>
                    <span>Add Project</span>
                </a>
                <a href="{{ route('admin.experiences') }}" class="admin-quick-action">
                    <span class="admin-quick-action-icon">➕</span>
                    <span>Add Experience</span>
                </a>
                <a href="{{ route('admin.education') }}" class="admin-quick-action">
                    <span class="admin-quick-action-icon">➕</span>
                    <span>Add Education</span>
                </a>
                <a href="{{ route('admin.contacts') }}" class="admin-quick-action">
                    <span class="admin-quick-action-icon">✉️</span>
                    <span>View Messages</span>
                </a>
            </div>
        </div>
    </div>
@endsection
