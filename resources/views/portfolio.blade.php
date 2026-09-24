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
                <span>💻</span>
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

            <div class="projects-3d-wrapper">
                <div class="projects-3d-carousel" id="projectsCarousel">
                    @foreach($projects as $project)
                    <div class="project-3d-card reveal" data-index="{{ $loop->index }}">
                        <div class="project-3d-card-inner">
                            <div class="project-3d-card-bg"></div>
                            <div class="project-3d-card-glow"></div>
                            
                            <div class="project-3d-image">
                                <img src="{{ asset($project['image'] ?? 'https://via.placeholder.com/800x500') }}" 
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
                                
                                <h3 class="project-3d-title">{{ $project['title'] }}</h3>
                                <p class="project-3d-description">{{ $project['description'] }}</p>
                                
                                <div class="project-3d-footer">
                                    <div class="project-3d-tech">
                                        @foreach($project['tech'] as $tech)
                                        <span class="project-3d-tech-tag">{{ $tech }}</span>
                                        @endforeach
                                    </div>
                                    <a href="#" class="project-3d-link">
                                        <span class="project-3d-link-text">View Project</span>
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

            <div class="tech-grid">
                @foreach($techStack as $tech)
                <div class="tech-item reveal">
                    <div class="tech-icon">{{ substr($tech['name'], 0, 2) }}</div>
                    <div class="tech-name">{{ $tech['name'] }}</div>
                    <div class="tech-category">{{ $tech['category'] }}</div>
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
                        <div class="globe" id="educationGlobe">
                            <div class="globe-sphere"></div>
                            
                            <svg class="globe-map" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <pattern id="continentDots" x="0" y="0" width="2.4" height="2.4" patternUnits="userSpaceOnUse">
                                        <circle cx="1.2" cy="1.2" r="0.52" fill="rgba(2, 194, 2, 0.8)"/>
                                    </pattern>
                                </defs>
                                
                                <g transform="translate(100, 100) scale(0.75)">
                                    <ellipse cx="0" cy="0" rx="96" ry="96" fill="none" stroke="rgba(255,255,255,0.05)" stroke-width="0.5"/>
                                    
                                    <g transform="rotate(-23.5)">
                                        <g fill="url(#continentDots)" stroke="rgba(2, 194, 2, 0.4)" stroke-width="0.6" stroke-linejoin="round">
                                            <!-- North America -->
                                            <path d="M -62,-18 L -63,-24 L -60,-20 L -58,-26 L -55,-22 L -52,-26 L -48,-24 L -45,-28 L -40,-32 L -36,-38 L -38,-42 L -42,-44 L -46,-42 L -50,-38 L -54,-36 L -58,-40 L -62,-36 L -64,-30 L -66,-22 Z"/>
                                            <path d="M -55,-20 L -52,-24 L -48,-22 L -44,-25 L -40,-28 L -38,-32 L -40,-36 L -44,-34 L -48,-30 L -52,-28 L -54,-24 Z"/>
                                            
                                            <!-- South America -->
                                            <path d="M -52,5 L -48,8 L -42,10 L -36,14 L -30,18 L -28,24 L -32,28 L -36,26 L -40,20 L -46,14 L -50,10 Z"/>
                                            <path d="M -48,8 L -44,12 L -38,16 L -32,20 L -30,24 L -34,26 L -38,22 L -44,16 L -48,12 Z"/>
                                            
                                            <!-- Europe -->
                                            <path d="M -22,-30 L -20,-33 L -16,-32 L -12,-35 L -10,-34 L -8,-38 L -6,-40 L -8,-44 L -12,-46 L -16,-44 L -18,-40 L -20,-36 L -22,-33 Z"/>
                                            <path d="M -18,-32 L -15,-35 L -12,-34 L -10,-37 L -12,-40 L -14,-38 L -16,-35 Z"/>
                                            
                                            <!-- Africa -->
                                            <path d="M -15,-32 L -10,-35 L -5,-35 L 0,-33 L 5,-35 L 10,-33 L 15,-30 L 18,-25 L 20,-18 L 18,-10 L 15,-2 L 10,4 L 5,8 L 0,10 L -5,8 L -10,4 L -12,-5 L -15,-15 Z"/>
                                            <path d="M -10,-32 L -5,-33 L 0,-31 L 5,-33 L 10,-30 L 12,-25 L 10,-18 L 8,-10 L 5,-4 L 0,0 L -5,-2 L -8,-10 L -10,-22 Z"/>
                                            
                                            <!-- Middle East -->
                                            <path d="M 5,-32 L 10,-30 L 15,-28 L 20,-25 L 22,-20 L 20,-15 L 15,-12 L 10,-14 L 6,-18 L 4,-24 L 4,-28 Z"/>
                                            
                                            <!-- Asia -->
                                            <path d="M -8,-44 L 0,-42 L 10,-38 L 20,-32 L 30,-28 L 40,-22 L 50,-16 L 55,-8 L 50,0 L 42,4 L 35,2 L 28,0 L 20,-5 L 12,-10 L 5,-18 L 0,-25 L -5,-35 Z"/>
                                            <path d="M 0,-40 L 8,-36 L 18,-30 L 28,-26 L 38,-20 L 46,-14 L 50,-8 L 46,-2 L 38,2 L 30,0 L 22,-4 L 14,-10 L 8,-18 L 2,-26 L -2,-34 Z"/>
                                            <path d="M -5,-38 L 2,-34 L 10,-28 L 18,-24 L 24,-20 L 28,-14 L 26,-8 L 20,-4 L 14,-8 L 8,-16 L 2,-24 L -2,-32 Z"/>
                                            
                                            <!-- Southeast Asia / Indonesia -->
                                            <path d="M 28,0 L 32,-4 L 36,-2 L 38,2 L 36,6 L 32,6 L 28,4 Z"/>
                                            <path d="M 32,2 L 36,0 L 40,2 L 42,6 L 40,10 L 36,10 L 32,8 Z"/>
                                            <path d="M 36,6 L 40,4 L 44,6 L 46,10 L 44,14 L 40,14 L 36,12 Z"/>
                                            
                                            <!-- Australia -->
                                            <path d="M 28,12 L 35,10 L 42,12 L 45,18 L 42,24 L 35,25 L 28,22 L 25,18 L 26,14 Z"/>
                                            <path d="M 30,12 L 36,11 L 42,13 L 44,18 L 42,22 L 36,23 L 30,20 L 28,16 Z"/>
                                            
                                            <!-- Greenland -->
                                            <path d="M -35,-52 L -30,-54 L -25,-52 L -22,-48 L -24,-44 L -28,-42 L -32,-44 L -34,-48 Z"/>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            
                            <div class="globe-dots">
                                @foreach($education as $item)
                                @if(isset($item['lat'], $item['lng']))
                                <div class="globe-dot" style="--lat: {{ $item['lat'] }}; --lng: {{ $item['lng'] }};" data-location="{{ $item['location'] ?? '' }}" data-title="{{ $item['title'] ?? '' }}">
                                    <span class="globe-dot-pulse"></span>
                                    <span class="globe-dot-label">{{ $item['location'] ?? '' }}</span>
                                </div>
                                @endif
                                @endforeach
                            </div>
                            <div class="globe-lines">
                                @for($i = 0; $i < count($education) - 1; $i++)
                                @if(isset($education[$i]['lat'], $education[$i]['lng'], $education[$i + 1]['lat'], $education[$i + 1]['lng']))
                                <div class="globe-line" style="--lat1: {{ $education[$i]['lat'] }}; --lng1: {{ $education[$i]['lng'] }}; --lat2: {{ $education[$i + 1]['lat'] }}; --lng2: {{ $education[$i + 1]['lng'] }};"></div>
                                @endif
                                @endfor
                            </div>
                        </div>
                        <div class="globe-glow"></div>
                    </div>
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
                <form id="contact-form" class="contact-form reveal" action="{{ route('portfolio') }}" method="POST">
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
                        <div class="contact-info-icon">✉</div>
                        <div class="contact-info-text">
                            <strong>Email</strong>
                            contact@gildasrochinel.dev
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-info-icon">📍</div>
                        <div class="contact-info-text">
                            <strong>Location</strong>
                            Yaoundé, Cameroun
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-info-icon">💼</div>
                        <div class="contact-info-text">
                            <strong>Status</strong>
                            {{ $translations['available_for_work'] ?? 'Available for work' }}
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-info-icon">🌐</div>
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
    
    @yield('scripts')
</body>
</html>
