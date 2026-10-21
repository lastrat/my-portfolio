@extends('admin.layout')

@section('title', $tech->exists ? 'Edit Technology' : 'New Technology')

@section('content')
    <div class="admin-card">
        <div class="admin-card-header">
            <h2 class="admin-card-title">{{ $tech->exists ? 'Edit Technology' : 'New Technology' }}</h2>
        </div>

        <form method="POST" action="{{ $tech->exists ? route('admin.tech.update', $tech) : route('admin.tech.store') }}">
            @csrf
            @if($tech->exists)
                @method('PUT')
            @endif

            <div class="form-group">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-input" value="{{ old('name', $tech->name) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Category</label>
                <input type="text" name="category" class="form-input" value="{{ old('category', $tech->category) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Brand Logo (Simple Icons slug)</label>
                <div style="display: flex; gap: 12px; align-items: flex-start;">
                    <div style="flex: 1;">
                        <input type="text" name="slug" id="techSlug" class="form-input"
                               value="{{ old('slug', $tech->slug) }}"
                               list="techSlugList"
                               placeholder="laravel, react, php..."
                               autocomplete="off">
                        <datalist id="techSlugList">
                            @foreach([
                                'php', 'javascript', 'typescript', 'python', 'html5', 'css', 'sass', 'laravel', 'react', 'vue',
                                'angular', 'svelte', 'nextdotjs', 'nodejs', 'nodedotjs', 'django', 'codeigniter', 'bootstrap',
                                'tailwindcss', 'jquery', 'mysql', 'postgresql', 'mongodb', 'redis', 'docker', 'kubernetes',
                                'git', 'github', 'gitlab', 'linux', 'ubuntu', 'wordpress', 'figma', 'notion', 'googleanalytics',
                                'googlecloud', 'vuedotjs', 'express', 'nginx', 'xml', 'markdown', 'jest', 'vitest'
                            ] as $knownSlug)
                                <option value="{{ $knownSlug }}"></option>
                            @endforeach
                        </datalist>
                        <p style="margin-top: 8px; font-size: 12px; color: var(--text-secondary); font-family: var(--font-code);">
                            Slug de la logo sur simpleicons.org — laissez vide pour utiliser l'icon SVG ci-dessous.
                        </p>
                    </div>
                    <div class="tech-logo-preview" id="techLogoPreview">
                        <img id="techLogoPreviewImg" src="" alt="" style="display: none; width: 34px; height: 34px;">
                        <span id="techLogoPreviewEmpty">—</span>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary" id="fetchTechLogo" style="margin-top: 12px;">
                    Fetch brand logo
                </button>
            </div>

            <div class="form-group">
                <label class="form-label">Icon SVG (optional)</label>
                <textarea name="icon" id="techIconSvg" class="form-input" rows="6">{{ old('icon', $tech->icon) }}</textarea>
                <p style="margin-top: 8px; font-size: 12px; color: var(--text-secondary); font-family: var(--font-code);">
                    SVG inline utilisé si aucun slug n'est renseigné.
                </p>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    {{ $tech->exists ? 'Update Technology' : 'Create Technology' }}
                </button>
                <a href="{{ route('admin.tech') }}" class="btn btn-secondary">
                    Cancel
                </a>
            </div>
        </form>
    </div>

    <style>
        .tech-logo-preview {
            flex: none;
            width: 58px;
            height: 58px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--bg-secondary);
            border: 1px solid var(--border);
            border-radius: 12px;
            color: var(--text-secondary);
            font-family: var(--font-code);
            font-size: 12px;
            overflow: hidden;
        }

        .tech-logo-preview img {
            object-fit: contain;
        }
    </style>

    <script>
        (function () {
            var slugInput = document.getElementById('techSlug');
            var previewImg = document.getElementById('techLogoPreviewImg');
            var previewEmpty = document.getElementById('techLogoPreviewEmpty');
            var fetchBtn = document.getElementById('fetchTechLogo');
            var iconArea = document.getElementById('techIconSvg');

            function updatePreview() {
                var slug = (slugInput.value || '').trim().toLowerCase();

                if (!slug) {
                    previewImg.style.display = 'none';
                    previewImg.removeAttribute('src');
                    previewEmpty.style.display = '';
                    return;
                }

                // Local copy first, CDN fallback for any slug
                previewImg.onerror = function () {
                    previewImg.onerror = null;
                    previewImg.src = 'https://cdn.simpleicons.org/' + slug;
                };
                previewImg.src = '{{ asset('assets/tech') }}/' + slug + '.svg';
                previewImg.style.display = '';
                previewEmpty.style.display = 'none';
            }

            slugInput.addEventListener('input', updatePreview);

            fetchBtn.addEventListener('click', function () {
                var slug = (slugInput.value || '').trim().toLowerCase();
                if (!slug) {
                    alert('Enter a slug first (example: laravel)');
                    return;
                }

                fetchBtn.textContent = 'Fetching...';

                fetch('https://cdn.simpleicons.org/' + slug)
                    .then(function (response) {
                        if (!response.ok) throw new Error('Logo not found for "' + slug + '"');
                        return response.text();
                    })
                    .then(function (svg) {
                        iconArea.value = svg;
                        updatePreview();
                        fetchBtn.textContent = 'Logo fetched';
                        setTimeout(function () { fetchBtn.textContent = 'Fetch brand logo'; }, 1800);
                    })
                    .catch(function (error) {
                        alert(error.message);
                        fetchBtn.textContent = 'Fetch brand logo';
                    });
            });

            updatePreview();
        })();
    </script>
@endsection
