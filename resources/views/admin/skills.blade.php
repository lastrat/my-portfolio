@extends('admin.layout')

@section('title', 'Skills')

@section('content')
    <div class="admin-card">
        <div class="admin-card-header">
            <h2 class="admin-card-title">All Skills</h2>
            <a href="{{ route('admin.skills.create') }}" class="btn btn-primary" style="width: auto; padding: 10px 20px; font-size: 14px;">
                + Add Skill
            </a>
        </div>
        <div class="admin-table-wrapper">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Category (FR)</th>
                        <th>Category (EN)</th>
                        <th>Tools</th>
                        <th>Description (FR)</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($skills as $skill)
                        <tr>
                            <td><strong>{{ $skill->title_fr ?: $skill->title }}</strong></td>
                            <td>{{ $skill->title_en ?: '—' }}</td>
                            <td style="max-width: 260px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $skill->company }}</td>
                            <td style="max-width: 260px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ Str::limit($skill->description_fr ?: $skill->description, 60) }}</td>
                            <td>
                                <a href="{{ route('admin.skills.edit', $skill) }}" class="admin-action-link">Edit</a>
                                <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="admin-action-link" style="background: none; border: none; cursor: pointer; color: #ff6b6b; padding: 0; font-size: 13px; font-weight: 500;">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align: center; padding: 40px; color: var(--text-secondary);">
                                No skills yet
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($skills->hasPages())
            <div style="margin-top: 20px; display: flex; justify-content: center;">
                {{ $skills->links() }}
            </div>
        @endif
    </div>
@endsection
