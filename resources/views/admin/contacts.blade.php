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
                            <td style="max-width: 260px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                {{ Str::limit($contact->message, 60) }}
                            </td>
                            <td>{{ $contact->created_at->format('M d, Y') }}</td>
                            <td>
                                @if($contact->is_read)
                                    <span class="admin-badge-success">Read</span>
                                @else
                                    <span class="admin-badge-warning">Unread</span>
                                @endif
                            </td>
                            <td>
                                <a href="#" class="admin-action-link view-contact"
                                   data-id="{{ $contact->id }}"
                                   data-name="{{ e($contact->name) }}"
                                   data-email="{{ e($contact->email) }}"
                                   data-msg="{{ e($contact->message) }}"
                                   data-date="{{ $contact->created_at->format('M d, Y \\H\\i:s') }}"
                                   onclick="event.preventDefault(); openContact(this);">
                                    View
                                </a>
                                <a href="#" class="admin-action-link" style="color: #ff6b6b;" onclick="event.preventDefault(); deleteContact({{ $contact->id }});">
                                    Delete
                                </a>
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

    <!-- Message popup -->
    <div id="contact-modal" class="contact-modal" style="display: none;">
        <div class="contact-modal-backdrop" onclick="closeContact()"></div>
        <div class="contact-modal-panel">
            <button class="contact-modal-close" onclick="closeContact()">&times;</button>
            <div class="contact-modal-body">
                <div class="contact-modal-header">
                    <span class="contact-modal-label">Message de</span>
                    <strong id="modal-contact-name" class="contact-modal-name"></strong>
                </div>
                <div class="contact-modal-meta">
                    <span class="contact-modal-item">
                        <span class="contact-modal-key">Email</span>
                        <span id="modal-contact-email"></span>
                    </span>
                    <span class="contact-modal-item">
                        <span class="contact-modal-key">Date</span>
                        <span id="modal-contact-date"></span>
                    </span>
                </div>
                <div class="contact-modal-divider"></div>
                <div class="contact-modal-content">
                    <p id="modal-contact-message"></p>
                </div>
                <div class="contact-modal-actions">
                    <button class="contact-modal-btn contact-modal-btn-secondary" onclick="closeContact()">Close</button>
                    <a id="modal-contact-reply" class="contact-modal-btn contact-modal-btn-primary" target="_blank" rel="noopener">Reply</a>
                </div>
            </div>
        </div>
    </div>

    <style>
        .contact-modal {
            position: fixed;
            inset: 0;
            z-index: 2000;
            font-family: var(--font-body);
        }

        .contact-modal-backdrop {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.45);
            backdrop-filter: blur(4px);
        }

        .contact-modal-panel {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0.92);
            width: 100%;
            max-width: 520px;
            max-height: 82vh;
            overflow-y: auto;
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 16px;
            box-shadow: 0 25px 80px rgba(0, 0, 0, 0.5);
            animation: contactModalIn 0.28s cubic-bezier(0.16, 1, 0.3, 1);
            display: flex;
            flex-direction: column;
        }

        @keyframes contactModalIn {
            from { opacity: 0; transform: translate(-50%, -40%) scale(0.9); }
            to { opacity: 1; transform: translate(-50%, -50%) scale(0.92); }
        }

        .contact-modal-close {
            position: absolute;
            top: 14px;
            right: 14px;
            width: 32px;
            height: 32px;
            border: none;
            background: transparent;
            color: var(--text-secondary);
            font-size: 24px;
            line-height: 1;
            border-radius: 8px;
            cursor: pointer;
            transition: var(--transition-fast);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .contact-modal-close:hover {
            color: var(--text-primary);
            background: rgba(255, 255, 255, 0.05);
        }

        .contact-modal-body {
            padding: 26px 28px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .contact-modal-header {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 16px;
        }

        .contact-modal-label {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--text-secondary);
            font-family: var(--font-code);
        }

        .contact-modal-name {
            font-size: 17px;
            font-weight: 600;
            color: var(--text-primary);
        }

        .contact-modal-meta {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
            margin-bottom: 16px;
            padding-bottom: 12px;
            border-bottom: 1px solid var(--border);
        }

        .contact-modal-item {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .contact-modal-key {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--text-secondary);
            font-family: var(--font-code);
        }

        .contact-modal-item > span:last-child {
            font-size: 14px;
            color: var(--text-primary);
            word-break: break-word;
        }

        .contact-modal-divider {
            height: 1px;
            background: var(--border);
            margin: 16px 0;
        }

        .contact-modal-content p {
            font-size: 15px;
            line-height: 1.7;
            color: var(--text-primary);
            white-space: pre-wrap;
            word-break: break-word;
            margin: 0;
        }

        .contact-modal-actions {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
            padding-top: 16px;
            margin-top: auto;
            border-top: 1px solid var(--border);
        }

        .contact-modal-btn {
            padding: 10px 20px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            font-family: var(--font-body);
            cursor: pointer;
            border: none;
            transition: var(--transition-fast);
        }

        .contact-modal-btn-secondary {
            background: transparent;
            color: var(--text-primary);
            border: 1px solid var(--border);
        }

        .contact-modal-btn-secondary:hover {
            border-color: var(--accent-green);
            color: var(--accent-green);
        }

        .contact-modal-btn-primary {
            background: var(--accent-gradient);
            color: var(--bg-primary);
        }

        .contact-modal-btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 28px rgba(2, 194, 2, 0.3);
        }

        @media (max-width: 560px) {
            .contact-modal-panel {
                width: 92%;
                max-height: 88vh;
            }
            .contact-modal-body {
                padding: 20px 22px;
            }
        }
    </style>

    <script>
        function openContact(link) {
            var modal = document.getElementById('contact-modal');
            var nameEl = document.getElementById('modal-contact-name');
            var emailEl = document.getElementById('modal-contact-email');
            var dateEl = document.getElementById('modal-contact-date');
            var messageEl = document.getElementById('modal-contact-message');
            var replyEl = document.getElementById('modal-contact-reply');

            nameEl.textContent = link.dataset.name;
            emailEl.textContent = link.dataset.email;
            dateEl.textContent = link.dataset.date;
            messageEl.textContent = link.dataset.msg;

            replyEl.href = 'mailto:' + link.dataset.email;
            replyEl.style.display = link.dataset.email ? 'inline-flex' : 'none';

            modal.style.display = 'block';
            document.body.style.overflow = 'hidden';
        }

        function closeContact() {
            var modal = document.getElementById('contact-modal');
            modal.style.display = 'none';
            document.body.style.overflow = '';
        }

        function deleteContact(id) {
            if (!confirm('Are you sure you want to delete this message?')) return;
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = '{{ route('admin.contacts.destroy', 0) }}'.replace(/\/0$/, '/' + id);
            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = '_token';
            input.value = '{{ csrf_token() }}';
            form.appendChild(input);
            var method = document.createElement('input');
            method.type = 'hidden';
            method.name = '_method';
            method.value = 'DELETE';
            form.appendChild(method);
            document.body.appendChild(form);
            form.submit();
        }

        window.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') closeContact();
        });
    </script>
</div>
@endsection
