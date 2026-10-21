<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $translations['app_name'] ?? 'Gildas Rochinel' }} — {{ $translations['tagline'] ?? 'Fullstack Web Developer' }}</title>
    <meta name="description" content="{{ $translations['hero_subtitle'] ?? 'Fullstack Developer specialized in Laravel, React, CodeIgniter, and Django.' }}">
    
    <meta name="success-message" content="{{ $translations['email_sent'] ?? 'Message sent successfully!' }}">
    <meta name="error-message" content="{{ $translations['email_error'] ?? 'Error sending message.' }}">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @yield('styles')
</head>
<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="preloader-content">
            <div class="preloader-logo">GS</div>
            <div class="preloader-bar"></div>
        </div>
    </div>

    <!-- Custom Cursor -->
    <div class="cursor-dot"></div>
    <div class="cursor-outline"></div>

    <!-- Noise Overlay -->
    <div class="noise"></div>

    <!-- Navigation -->
    <nav class="navbar">
        <a href="#hero" class="nav-logo">GS</a>
        
        <div class="nav-controls">
            <button class="nav-btn" data-theme-btn="light" title="{{ $translations['light_mode'] ?? 'Light Mode' }}">
                <span>☀</span>
            </button>
            <button class="nav-btn" data-theme-btn="dark" title="{{ $translations['dark_mode'] ?? 'Dark Mode' }}">
                <span>☾</span>
            </button>
            <button class="nav-btn" data-theme-btn="desktop" title="{{ $translations['desktop_mode'] ?? 'Auto (Desktop)' }}">
            <svg xmlns="http://w3.org" viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <!-- Écran -->
                <rect x="2" y="3" width="20" height="13" rx="2"/>
                <!-- Pied -->
                <line x1="12" y1="16" x2="12" y2="21"/>
                <!-- Socle -->
                <line x1="8" y1="21" x2="16" y2="21"/>
            </svg>
            </button>
            <button class="nav-btn" onclick="window.location.href='{{ route('lang.switch', ['locale' => app()->getLocale() === 'fr' ? 'en' : 'fr']) }}'">
                {{ app()->getLocale() === 'fr' ? 'EN' : 'FR' }}
            </button>
        </div>

        <button class="menu-toggle" aria-label="Menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </nav>

    <!-- Mobile Menu -->
    <div class="mobile-menu">
        <a href="#hero">{{ $translations['work'] ?? 'Work' }}</a>
        <a href="#about">{{ $translations['about_me'] ?? 'About' }}</a>
        <a href="#experiments">{{ $translations['lab'] ?? 'Lab' }}</a>
        <a href="#contact">{{ $translations['contact_section'] ?? 'Contact' }}</a>
        <div class="mobile-menu-controls">
            <button class="nav-btn" data-theme-btn="light">☀ {{ $translations['light_mode'] ?? 'Light' }}</button>
            <button class="nav-btn" data-theme-btn="dark">☾ {{ $translations['dark_mode'] ?? 'Dark' }}</button>
            <button class="nav-btn" data-theme-btn="desktop">💻 {{ $translations['desktop_mode'] ?? 'Auto' }}</button>
            <button class="nav-btn" onclick="window.location.href='{{ route('lang.switch', ['locale' => app()->getLocale() === 'fr' ? 'en' : 'fr']) }}'">
                {{ app()->getLocale() === 'fr' ? 'EN' : 'FR' }}
            </button>
        </div>
    </div>

    <!-- Hero Section -->
    <section id="hero" class="hero">
        <canvas class="hero-canvas" id="particles"></canvas>
        
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <div class="hero-label">
                        {{ $translations['available_for_work'] ?? 'AVAILABLE FOR WORK' }}
                    </div>
                    
                    <h1 class="hero-title">
                        {{ $translations['hero_title'] ?? 'BUILDING DIGITAL EXPERIENCES.' }}
                    </h1>
                    
                    <p class="hero-subtitle">
                        {{ $translations['hero_subtitle'] ?? 'Full Stack Developer specialized in Laravel, React, and creative web experiences.' }}
                    </p>
                    
                    <div class="hero-cta">
                        <a href="#work" class="btn btn-primary magnetic">
                            {{ $translations['view_work'] ?? 'VIEW WORK' }} →
                        </a>
                        <a href="#contact" class="btn btn-outline magnetic">
                            {{ $translations['contact_me'] ?? 'CONTACT ME' }}
                        </a>
                    </div>

                    <div class="stats reveal">
                        <div class="stat-item">
                            <div class="stat-value">3+</div>
                            <div class="stat-label">{{ $translations['years_experience'] ?? 'Years Experience' }}</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">10+</div>
                            <div class="stat-label">{{ $translations['projects_completed'] ?? 'Projects' }}</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">15+</div>
                            <div class="stat-label">{{ $translations['technologies'] ?? 'Technologies' }}</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">100%</div>
                            <div class="stat-label">{{ $translations['curiosity'] ?? 'Passion' }}</div>
                        </div>
                    </div>
                </div>

                <div class="hero-image reveal reveal-delay-2">
                    <div class="hero-image-glow"></div>
                    <div class="hero-image-wrapper">
                        <img src="{{ asset('assets/images/wb.jpg') }}" alt="{{ $translations['app_name'] ?? 'Gildas Rochinel' }}">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Marquee -->
    <div class="marquee">
        <div class="marquee-content">
            <span class="marquee-item">Laravel</span>
            <span class="marquee-item">React</span>
            <span class="marquee-item">CodeIgniter</span>
            <span class="marquee-item">Django</span>
            <span class="marquee-item">PHP</span>
            <span class="marquee-item">JavaScript</span>
            <span class="marquee-item">Python</span>
            <span class="marquee-item">MySQL</span>
            <span class="marquee-item">Docker</span>
            <span class="marquee-item">Bootstrap</span>
            <span class="marquee-item">Tailwind</span>
            <span class="marquee-item">Git</span>
            <span class="marquee-item">Laravel</span>
            <span class="marquee-item">React</span>
            <span class="marquee-item">CodeIgniter</span>
            <span class="marquee-item">Django</span>
            <span class="marquee-item">PHP</span>
            <span class="marquee-item">JavaScript</span>
            <span class="marquee-item">Python</span>
            <span class="marquee-item">MySQL</span>
            <span class="marquee-item">Docker</span>
            <span class="marquee-item">Bootstrap</span>
            <span class="marquee-item">Tailwind</span>
            <span class="marquee-item">Git</span>
        </div>
    </div>

    <!-- Selected Work -->
    <section id="work">
        <div class="section-bg">
            <div class="bg-grid"></div>
            <div class="bg-glow bg-glow--1"></div>
            <div class="bg-glow bg-glow--2"></div>
        </div>
        <div class="container">
            <div class="section-header reveal">
                <span class="section-number">{{ $translations['section_01'] ?? '01' }}</span>
                <h2 class="section-title">{{ $translations['selected_work'] ?? 'Selected Work' }}</h2>
                <p class="section-description">{{ $translations['selected_work_desc'] ?? 'A selection of projects that define my approach.' }}</p>
            </div>

            @php
                $projectCategories = collect($projects)->pluck('category')->filter()->countBy()->sortKeys();
            @endphp

            @if($projectCategories->isNotEmpty())
                <div class="project-filters" id="projectFilters">
                    <button type="button" class="project-filter-btn is-active" data-filter="all">
                        All <span class="project-filter-count">{{ count($projects) }}</span>
                    </button>
                    @foreach($projectCategories as $catName => $catCount)
                        <button type="button" class="project-filter-btn" data-filter="{{ e($catName) }}">
                            {{ $catName }} <span class="project-filter-count">{{ $catCount }}</span>
                        </button>
                    @endforeach
                </div>
            @endif

            <div class="projects-3d-wrapper">
                <div class="projects-3d-carousel" id="projectsCarousel">
                    @foreach($projects as $project)
                    <div class="project-3d-card reveal" data-index="{{ $loop->index }}" data-category="{{ e($project['category'] ?? '') }}">
                        <div class="project-3d-card-inner">
                            <div class="project-3d-card-bg"></div>
                            <div class="project-3d-card-glow"></div>
                            
                            <div class="project-3d-image">
                                <img src="{{ $project['image'] ?? 'https://via.placeholder.com/800x500' }}"
                                     alt="{{ $project['title'] }}" 
                                     loading="lazy"
                                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="project-image-fallback" style="display: none;">
                                    {{ substr($project['title'], 0, 2) }}
                                </div>
                                <div class="project-3d-overlay"></div>
                            </div>

                            <div class="project-3d-content">
                                <div class="project-3d-header">
                                    <span class="project-3d-year">{{ $project['year'] }}</span>
                                    <span class="project-3d-role">{{ $project['role'] }}</span>
                                </div>

                                @if(!empty($project['category']))
                                    <div class="project-3d-category-row">
                                        <span class="project-3d-category">{{ $project['category'] }}</span>
                                    </div>
                                @endif
                                
                                <h3 class="project-3d-title">{{ $project['title'] }}</h3>
                                @php
                                    $desc = html_entity_decode($project['description'] ?? '', ENT_QUOTES | ENT_HTML5, 'UTF-8');
                                @endphp
                                <p class="project-3d-description project-description-short">{{ $desc }}</p>
                                <span class="desc-full" style="display:none">{{ $desc }}</span>
                                @if(strlen($desc) > 140)
                                    <button class="project-description-toggle" onclick="openDescModal(this)">
                                        {{ $translations['read_more'] ?? 'Read more' }}
                                    </button>
                                @endif
                                
                                <div class="project-3d-footer">
                                    <div class="project-3d-tech">
                                        @foreach($project['tech'] as $tech)
                                        <span class="project-3d-tech-tag">{{ $tech }}</span>
                                        @endforeach
                                    </div>
                                    <a href="{{ $project['link'] ?? '#' }}" class="project-3d-link" @if(!empty($project['link'])) target="_blank" rel="noopener" @endif>
                                        <span class="project-3d-link-text">{{ $translations['view_project'] ?? 'View Project' }}</span>
                                        <span class="project-3d-link-arrow">→</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="projects-3d-controls">
                    <button class="project-3d-nav project-3d-prev" id="projectPrev" aria-label="Previous">
                        <span>←</span>
                    </button>
                    <div class="project-3d-counter">
                        <span class="project-3d-current">01</span>
                        <span class="project-3d-separator">/</span>
                        <span class="project-3d-total">{{ str_pad(count($projects), 2, '0', STR_PAD_LEFT) }}</span>
                    </div>
                    <button class="project-3d-nav project-3d-next" id="projectNext" aria-label="Next">
                        <span>→</span>
                    </button>
                </div>
            </div>

            <!-- Full description modal -->
            <div id="desc-modal" class="desc-modal" style="display: none;">
                <div class="desc-modal-backdrop" onclick="closeDescModal()"></div>
                <div class="desc-modal-panel">
                    <button class="desc-modal-close" onclick="closeDescModal()">&times;</button>
                    <div class="desc-modal-body">
                        <div class="desc-modal-header">
                            <span class="desc-modal-label">{{ $translations['description'] ?? 'Description' }}</span>
                        </div>
                        <div class="desc-modal-content" id="desc-modal-content"></div>
                    </div>
                    <div class="desc-modal-actions">
                        <button class="desc-modal-btn desc-modal-btn-secondary" onclick="closeDescModal()">{{ $translations['close'] ?? 'Close' }}</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tech Stack -->
    <section id="tech">
        <div class="section-bg">
            <div class="bg-grid"></div>
            <div class="bg-glow bg-glow--1"></div>
        </div>
        <div class="container">
            <div class="section-header reveal">
                <span class="section-number">{{ $translations['section_02'] ?? '02' }}</span>
                <h2 class="section-title">{{ $translations['tech_stack'] ?? 'Tech Stack' }}</h2>
                <p class="section-description">{{ $translations['tech_stack_desc'] ?? 'The tools and technologies I use.' }}</p>
            </div>

            <div class="tech-categories">
                @php
                    $grouped = [];
                    foreach ($techStack as $tech) {
                        $grouped[$tech['category']][] = $tech;
                    }
                @endphp

                @foreach($grouped as $category => $items)
                <div class="tech-category reveal">
                    <h3 class="tech-category-title">{{ $category }}</h3>
                    <div class="tech-items">
                        @foreach($items as $tech)
                        <div class="tech-item" title="{{ $tech['name'] }}">
                            <div class="tech-icon">
                                {!! $tech['icon'] !!}
                            </div>
                            <span class="tech-name">{{ $tech['name'] }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Skills -->
    <section id="skills">
        <div class="section-bg">
            <div class="bg-grid"></div>
            <div class="bg-glow bg-glow--2"></div>
        </div>
        <div class="container">
            <div class="section-header reveal">
                <span class="section-number">{{ $translations['section_03'] ?? '03' }}</span>
                <h2 class="section-title">{{ $translations['skills'] ?? 'Skills' }}</h2>
                <p class="section-description">{{ $translations['skills_desc'] ?? 'My technical expertise.' }}</p>
            </div>

            <div class="skills-grid">
                @foreach($skills as $skill)
                <div class="skill-item reveal">
                    <div class="skill-icon">◆</div>
                    <p class="skill-text">{{ $skill }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Experience -->
    <section id="experience">
        <div class="container">
            <div class="section-header reveal">
                <span class="section-number">{{ $translations['section_04'] ?? '04' }}</span>
                <h2 class="section-title">{{ $translations['experience'] ?? 'Professional Experience' }}</h2>
                <p class="section-description">{{ $translations['experience_desc'] ?? 'My professional journey.' }}</p>
            </div>

            <div class="timeline">
                @foreach($experience as $item)
                <div class="timeline-item reveal">
                    <div class="timeline-year">{{ $item['year'] }}</div>
                    <h3 class="timeline-title">{{ $item['title'] }}</h3>
                    <div class="timeline-company">{{ $item['company'] }}</div>
                    <p class="timeline-description">{{ $item['description'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Education -->
    <section id="education">
        <div class="section-bg">
            <div class="bg-grid"></div>
            <div class="bg-glow bg-glow--1"></div>
        </div>
        <div class="container">
            <div class="section-header reveal">
                <span class="section-number">{{ $translations['section_05'] ?? '05' }}</span>
                <h2 class="section-title">{{ $translations['education'] ?? 'Education' }}</h2>
                <p class="section-description">{{ $translations['education_desc'] ?? 'My academic background.' }}</p>
            </div>

            <div class="education-layout">
                <div class="education-timeline-col">
                    <div class="timeline">
                        @foreach($education as $item)
                        <div class="timeline-item reveal">
                            <div class="timeline-year">{{ $item['year'] }}</div>
                            <h3 class="timeline-title">{{ $item['title'] }}</h3>
                            <div class="timeline-company">{{ $item['company'] }}</div>
                            @if($item['description'])
                            <p class="timeline-description">{{ $item['description'] }}</p>
                            @endif
                            @if(isset($item['location']))
                            <div class="timeline-location">
                                <span class="location-dot"></span>
                                {{ $item['location'] }}
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="education-globe-col reveal reveal-delay-1">
                    <div class="globe-container" id="globeContainer">
                        <canvas id="educationGlobe"></canvas>
                        <div class="globe-overlay">
                            <div class="globe-overlay-label">Earth</div>
                        </div>
                        <div class="globe-tooltip" id="globeTooltip"></div>
                    </div>
                    <script>
                        window.educationGlobeData = @json($education);
                        window.educationGlobeTexture = "{{ asset('assets/images/earth-blue-marble.jpg') }}";
                    </script>
                </div>
            </div>
        </div>
    </section>

    <!-- About -->
    <section id="about">
        <div class="container">
            <div class="section-header reveal">
                <span class="section-number">{{ $translations['section_06'] ?? '06' }}</span>
                <h2 class="section-title">{{ $translations['about'] ?? 'About Me' }}</h2>
            </div>

            <div class="about-content">
                <div class="about-image reveal">
                    <img src="{{ asset('assets/images/moi.png') }}" alt="{{ $translations['app_name'] ?? 'Gildas Rochinel' }}">
                </div>
                
                <div class="about-text reveal reveal-delay-1">
                    <p>{{ $translations['about_desc'] ?? 'Passionate fullstack web developer with expertise in Laravel, React, CodeIgniter, and Django.' }}</p>
                    
                    <div class="about-stats">
                        <div class="about-stat">
                            <div class="about-stat-value">3+</div>
                            <div class="about-stat-label">{{ $translations['years_experience'] ?? 'Years Experience' }}</div>
                        </div>
                        <div class="about-stat">
                            <div class="about-stat-value">10+</div>
                            <div class="about-stat-label">{{ $translations['projects_completed'] ?? 'Projects' }}</div>
                        </div>
                        <div class="about-stat">
                            <div class="about-stat-value">15+</div>
                            <div class="about-stat-label">{{ $translations['technologies'] ?? 'Technologies' }}</div>
                        </div>
                        <div class="about-stat">
                            <div class="about-stat-value">2</div>
                            <div class="about-stat-label">{{ $translations['curiosity'] ?? 'Languages' }}</div>
                        </div>
                    </div>

                    <div class="languages-list" style="margin-top: 24px;">
                        @foreach($languages as $lang)
                        <div class="language-item" style="padding: 12px 16px; background: var(--bg-card); border: 1px solid var(--border); border-radius: 8px; margin-bottom: 8px; font-family: var(--font-code); font-size: 13px; color: var(--text-secondary);">
                            {{ $lang }}
                        </div>
                        @endforeach
                    </div>

                    <a href="{{ asset('assets/CV.pdf') }}" target="_blank" class="btn btn-primary magnetic" style="margin-top: 32px;">
                        {{ $translations['download_cv'] ?? 'Download CV' }} ↓
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Experiments -->
    <section id="experiments">
        <div class="container">
            <div class="section-header reveal">
                <span class="section-number">{{ $translations['section_07'] ?? '07' }}</span>
                <h2 class="section-title">{{ $translations['experiments'] ?? 'Experiments' }}</h2>
                <p class="section-description">{{ $translations['experiments_desc'] ?? 'Exploring the boundaries of web technologies.' }}</p>
            </div>

            <div class="experiments-grid">
                <div class="experiment-card reveal">
                    <div class="experiment-icon">◈</div>
                    <h3 class="experiment-title">{{ $translations['experiment_webgl'] ?? 'WebGL Experiments' }}</h3>
                    <p class="experiment-description">{{ $translations['experiment_webgl_desc'] ?? 'Exploring WebGL possibilities for immersive 3D experiences.' }}</p>
                </div>
                <div class="experiment-card reveal">
                    <div class="experiment-icon">◉</div>
                    <h3 class="experiment-title">{{ $translations['experiment_3d'] ?? '3D Interactive' }}</h3>
                    <p class="experiment-description">{{ $translations['experiment_3d_desc'] ?? 'Interactive 3D objects reacting to mouse movements.' }}</p>
                </div>
                <div class="experiment-card reveal">
                    <div class="experiment-icon">◎</div>
                    <h3 class="experiment-title">{{ $translations['experiment_ai'] ?? 'AI Integration' }}</h3>
                    <p class="experiment-description">{{ $translations['experiment_ai_desc'] ?? 'Integrating artificial intelligence into web interfaces.' }}</p>
                </div>
                <div class="experiment-card reveal">
                    <div class="experiment-icon">⟐</div>
                    <h3 class="experiment-title">{{ $translations['experiment_motion'] ?? 'Motion Design' }}</h3>
                    <p class="experiment-description">{{ $translations['experiment_motion_desc'] ?? 'Animations and micro-interactions for fluid experiences.' }}</p>
                </div>
                <div class="experiment-card reveal">
                    <div class="experiment-icon">⬡</div>
                    <h3 class="experiment-title">{{ $translations['experiment_interactive'] ?? 'Interactive UI' }}</h3>
                    <p class="experiment-description">{{ $translations['experiment_interactive_desc'] ?? 'Innovative user interfaces and unique experiences.' }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact -->
    <section id="contact">
        <div class="section-bg">
            <div class="bg-grid"></div>
            <div class="bg-glow bg-glow--1"></div>
            <div class="bg-glow bg-glow--2"></div>
        </div>
        <div class="container">
            <div class="section-header reveal">
                <span class="section-number">{{ $translations['section_08'] ?? '08' }}</span>
                <h2 class="section-title">{{ $translations['contact'] ?? 'Contact' }}</h2>
                <p class="section-description">{{ $translations['contact_desc'] ?? 'Let\'s build something great together.' }}</p>
            </div>

            <div class="contact-content">
                <form id="contact-form" class="contact-form reveal" action="{{ route('contact.send') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="name" placeholder="{{ $translations['your_name'] ?? 'Your Name' }}" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="{{ $translations['your_email'] ?? 'Your Email' }}" required>
                    </div>
                    <div class="form-group">
                        <textarea name="message" placeholder="{{ $translations['your_message'] ?? 'Your Message' }}" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary magnetic">
                        {{ $translations['send_message'] ?? 'Send Message' }} →
                    </button>
                </form>

                <div class="contact-info reveal reveal-delay-1">
                    <div class="contact-info-item">
                        <div class="contact-info-icon"><svg xmlns="http://w3.org" viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="4" width="20" height="16" rx="2"></rect>
                            <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                            </svg>
                        </div>
                        <div class="contact-info-text">
                            <strong>Email</strong>
                            simosimogildas@gmail.com
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-info-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" height="32" fill="currentColor">
  <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
</svg></div>
                        <div class="contact-info-text">
                            <strong>Location</strong>
                            Moncton, Canada
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-info-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M2.45 14.97c1.07 3.44 3.95 6.09 7.53 6.82M2.05 10.98A9.996 9.996 0 0 1 12 2c5.18 0 9.44 3.94 9.95 8.98M14.01 21.8c3.57-.73 6.44-3.35 7.53-6.78"></path>
                            </svg>
                        </div>
                        <div class="contact-info-text">
                            <strong>Status</strong>
                            {{ $translations['available_for_work'] ?? 'Available for work' }}
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-info-icon">
                            <svg xmlns="http://w3.org" viewBox="0 0 512 512" width="32" height="32" fill="currentColor">
                                <!-- Icône inspirée du symbole de langue -->
                                <path d="M352 320c-22.6 0-41.2 7-59.1 18.7-48.8-29.2-82.4-78.6-94.6-136.7h47.6c6.6 0 12-5.4 12-12s-5.4-12-12-12H178.5c-3.1-13.6-7.8-26.6-13.9-38.8 33.7-27.1 76-43.2 121.4-43.2 1.3 0 2.6 0 3.9.1 6.6.5 12.3-4.5 12.8-11.2s-4.5-12.3-11.2-12.8c-1.8-.1-3.6-.2-5.5-.2-51.5 0-98.8 19.3-134.4 51.1C94 135.2 64 191.6 64 256c0 106 86 192 192 192 60.1 0 114.1-27.2 150.2-69.5 5.2-6.1 4.5-15.1-1.6-20.3-6.1-5.2-15.1-4.5-20.3 1.6C361.3 392.5 310.8 416 256 416c-88.4 0-160-71.6-160-160 0-51.7 23.9-97.8 61-127.3 12.2 25.4 20.3 52.8 23.9 81.3h-44c-6.6 0-12 5.4-12 12s5.4 12 12 12h38.2c6.1 36.9 25 69.3 53.9 91.1-15.6 15.6-36.9 25.9-60.6 25.9-7.3 0-13.3 6-13.3 13.3 0 7.3 6 13.3 13.3 13.3 32.5 0 61.9-14.8 81.4-38.3 18.5 15.3 42 24.5 67.5 24.5 57.9 0 105.1-47.2 105.1-105.1 0-57.9-47.2-105.1-105.1-105.1z"/>
                            </svg>

                        </div>
                        <div class="contact-info-text">
                            <strong>Languages</strong>
                            Français (Courant) • English (Intermediate)
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-text">
                {{ $translations['footer_text'] ?? '© 2026 Gildas Rochinel. All rights reserved.' }}
            </div>
            <div class="footer-social">
                <a href="#" aria-label="GitHub">GH</a>
                <a href="#" aria-label="LinkedIn">LI</a>
                <a href="#" aria-label="Twitter">TW</a>
                <a href="#" aria-label="Dribbble">DR</a>
            </div>
        </div>
    </footer>

    <!-- Back to Top -->
    <a href="#hero" class="back-to-top" aria-label="{{ $translations['back_to_top'] ?? 'Back to top' }}">
        ↑
    </a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    
    <script>
        function openDescModal(btn) {
            var modal = document.getElementById('desc-modal');
            var content = document.getElementById('desc-modal-content');
            var full = btn.closest('.project-3d-card').querySelector('.desc-full');
            content.textContent = full ? full.textContent : '';
            modal.style.display = 'block';
            document.body.style.overflow = 'hidden';
        }

        function closeDescModal() {
            var modal = document.getElementById('desc-modal');
            modal.style.display = 'none';
            document.body.style.overflow = '';
        }

        window.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') closeDescModal();
        });
    </script>
    
    @yield('scripts')
</body>
</html>
