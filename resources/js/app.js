document.addEventListener('DOMContentLoaded', () => {
    // ===== PRELOADER =====
    const preloader = document.getElementById('preloader');
    window.addEventListener('load', () => {
        setTimeout(() => {
            preloader.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }, 1800);
    });

    // ===== CUSTOM CURSOR =====
    const cursorDot = document.querySelector('.cursor-dot');
    const cursorOutline = document.querySelector('.cursor-outline');
    let mouseX = 0, mouseY = 0;
    let outlineX = 0, outlineY = 0;

    if (window.matchMedia('(pointer: fine)').matches && window.innerWidth > 768) {
        document.addEventListener('mousemove', (e) => {
            mouseX = e.clientX;
            mouseY = e.clientY;
            cursorDot.style.left = mouseX + 'px';
            cursorDot.style.top = mouseY + 'px';
        });

        function animateCursor() {
            outlineX += (mouseX - outlineX) * 0.15;
            outlineY += (mouseY - outlineY) * 0.15;
            cursorOutline.style.left = outlineX + 'px';
            cursorOutline.style.top = outlineY + 'px';
            requestAnimationFrame(animateCursor);
        }
        animateCursor();

        // Cursor hover states
        const hoverElements = document.querySelectorAll('a, button, .btn, .project-card, .experiment-card, .tech-item');
        hoverElements.forEach(el => {
            el.addEventListener('mouseenter', () => {
                cursorOutline.classList.add('hover');
            });
            el.addEventListener('mouseleave', () => {
                cursorOutline.classList.remove('hover');
            });
        });

        // View cursor on project cards
        document.querySelectorAll('.project-card').forEach(card => {
            card.addEventListener('mouseenter', () => {
                cursorOutline.classList.add('view');
                cursorOutline.classList.remove('hover');
            });
            card.addEventListener('mouseleave', () => {
                cursorOutline.classList.remove('view');
            });
        });

        // Link cursor
        document.querySelectorAll('a').forEach(link => {
            link.addEventListener('mouseenter', () => {
                cursorOutline.classList.add('link');
                cursorOutline.classList.remove('hover', 'view');
            });
            link.addEventListener('mouseleave', () => {
                cursorOutline.classList.remove('link');
            });
        });
    }

    // ===== NAVBAR SCROLL =====
    const navbar = document.querySelector('.navbar');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // ===== MOBILE MENU =====
    const menuToggle = document.querySelector('.menu-toggle');
    const mobileMenu = document.querySelector('.mobile-menu');
    
    if (menuToggle) {
        menuToggle.addEventListener('click', () => {
            menuToggle.classList.toggle('active');
            mobileMenu.classList.toggle('active');
            document.body.classList.toggle('menu-open');
        });

        mobileMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                menuToggle.classList.remove('active');
                mobileMenu.classList.remove('active');
                document.body.classList.remove('menu-open');
            });
        });
    }

    // ===== THEME MANAGEMENT =====
    const themeButtons = document.querySelectorAll('[data-theme-btn]');
    const html = document.documentElement;

    function getSystemTheme() {
        return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
    }

    function setTheme(theme) {
        if (theme === 'desktop') {
            const systemTheme = getSystemTheme();
            html.setAttribute('data-theme', systemTheme);
            localStorage.setItem('theme', 'desktop');
        } else {
            html.setAttribute('data-theme', theme);
            localStorage.setItem('theme', theme);
        }
        updateThemeButtons(theme);
    }

    function updateThemeButtons(activeTheme) {
        themeButtons.forEach(btn => {
            btn.classList.toggle('active', btn.dataset.themeBtn === activeTheme);
        });
    }

    themeButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            setTheme(btn.dataset.themeBtn);
        });
    });

    // Initialize theme
    const savedTheme = localStorage.getItem('theme') || 'desktop';
    setTheme(savedTheme);

    // Listen for system theme changes
    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
        if (localStorage.getItem('theme') === 'desktop') {
            setTheme('desktop');
        }
    });

    // ===== SCROLL REVEAL =====
    const revealElements = document.querySelectorAll('.reveal');
    
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    });

    revealElements.forEach(el => revealObserver.observe(el));

    // ===== SMOOTH SCROLL =====
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // ===== BACK TO TOP =====
    const backToTop = document.querySelector('.back-to-top');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 500) {
            backToTop.classList.add('visible');
        } else {
            backToTop.classList.remove('visible');
        }
    });

    // ===== TEXT SCRAMBLE EFFECT =====
    class TextScramble {
        constructor(el) {
            this.el = el;
            this.chars = '!<>-_\\/[]{}—=+*^?#________';
            this.update = this.update.bind(this);
        }
        setText(newText) {
            const oldText = this.el.innerText;
            const length = Math.max(oldText.length, newText.length);
            const promise = new Promise(resolve => this.resolve = resolve);
            this.queue = [];
            for (let i = 0; i < length; i++) {
                const from = oldText[i] || '';
                const to = newText[i] || '';
                const start = Math.floor(Math.random() * 40);
                const end = start + Math.floor(Math.random() * 40);
                this.queue.push({ from, to, start, end });
            }
            cancelAnimationFrame(this.frameRequest);
            this.frame = 0;
            this.update();
            return promise;
        }
        update() {
            let output = '', complete = 0;
            for (let i = 0, n = this.queue.length; i < n; i++) {
                let { from, to, start, end, char } = this.queue[i];
                if (this.frame >= end) {
                    complete++;
                    output += to;
                } else if (this.frame >= start) {
                    if (!char || Math.random() < 0.28) {
                        char = this.randomChar();
                        this.queue[i].char = char;
                    }
                    output += `<span style="color: var(--accent-green)">${char}</span>`;
                } else {
                    output += from;
                }
            }
            this.el.innerHTML = output;
            if (complete === this.queue.length) {
                this.resolve();
            } else {
                this.frameRequest = requestAnimationFrame(this.update);
                this.frame++;
            }
        }
        randomChar() {
            return this.chars[Math.floor(Math.random() * this.chars.length)];
        }
    }

    // Apply scramble to hero title on load
    const heroTitle = document.querySelector('.hero-title');
    if (heroTitle) {
        const scramble = new TextScramble(heroTitle);
        const originalText = heroTitle.innerText;
        setTimeout(() => {
            scramble.setText(originalText);
        }, 2000);
    }

    // ===== MAGNETIC BUTTONS =====
    document.querySelectorAll('.btn').forEach(btn => {
        btn.addEventListener('mousemove', (e) => {
            const rect = btn.getBoundingClientRect();
            const x = e.clientX - rect.left - rect.width / 2;
            const y = e.clientY - rect.top - rect.height / 2;
            btn.style.transform = `translate(${x * 0.2}px, ${y * 0.2}px)`;
        });
        btn.addEventListener('mouseleave', () => {
            btn.style.transform = 'translate(0, 0)';
        });
    });

    // ===== PARALLAX =====
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        const heroImage = document.querySelector('.hero-image-wrapper');
        if (heroImage) {
            heroImage.style.transform = `translateY(${scrolled * 0.1}px)`;
        }
    });

    // ===== FORM HANDLING =====
    const contactForm = document.getElementById('contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = new FormData(contactForm);
            
            try {
                const response = await fetch(contactForm.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
                        'Accept': 'application/json',
                    },
                    body: formData,
                });
                
                if (response.ok) {
                    alert(document.querySelector('meta[name="success-message"]')?.content || 'Message sent!');
                    contactForm.reset();
                } else {
                    alert(document.querySelector('meta[name="error-message"]')?.content || 'Error sending message.');
                }
            } catch (error) {
                alert(document.querySelector('meta[name="error-message"]')?.content || 'Error sending message.');
            }
        });
    }

    // ===== COUNTER ANIMATION =====
    const counters = document.querySelectorAll('.stat-value');
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const target = entry.target;
                const text = target.innerText;
                const hasPlus = text.includes('+');
                const hasInfinity = text.includes('∞');
                const num = parseInt(text.replace(/[^0-9]/g, ''));
                
                if (!hasInfinity && !isNaN(num)) {
                    let current = 0;
                    const increment = num / 50;
                    const timer = setInterval(() => {
                        current += increment;
                        if (current >= num) {
                            target.innerText = text;
                            clearInterval(timer);
                        } else {
                            target.innerText = Math.floor(current) + (hasPlus ? '+' : '');
                        }
                    }, 30);
                }
                counterObserver.unobserve(target);
            }
        });
    }, { threshold: 0.5 });

    // ===== PARTICLE SYSTEM =====
    const canvas = document.getElementById('particles');
    if (canvas) {
        const ctx = canvas.getContext('2d');
        let particles = [];
        let animationId;

        function resizeCanvas() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        }
        resizeCanvas();
        window.addEventListener('resize', resizeCanvas);

        class Particle {
            constructor() {
                this.x = Math.random() * canvas.width;
                this.y = Math.random() * canvas.height;
                this.size = Math.random() * 2 + 0.5;
                this.speedX = (Math.random() - 0.5) * 0.5;
                this.speedY = (Math.random() - 0.5) * 0.5;
                this.opacity = Math.random() * 0.5 + 0.2;
            }
            update() {
                this.x += this.speedX;
                this.y += this.speedY;
                if (this.x > canvas.width) this.x = 0;
                if (this.x < 0) this.x = canvas.width;
                if (this.y > canvas.height) this.y = 0;
                if (this.y < 0) this.y = canvas.height;
            }
            draw() {
                ctx.fillStyle = `rgba(2, 194, 2, ${this.opacity})`;
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                ctx.fill();
            }
        }

        function initParticles() {
            particles = [];
            const numParticles = Math.min(100, Math.floor((canvas.width * canvas.height) / 15000));
            for (let i = 0; i < numParticles; i++) {
                particles.push(new Particle());
            }
        }
        initParticles();

        function connectParticles() {
            for (let i = 0; i < particles.length; i++) {
                for (let j = i + 1; j < particles.length; j++) {
                    const dx = particles[i].x - particles[j].x;
                    const dy = particles[i].y - particles[j].y;
                    const distance = Math.sqrt(dx * dx + dy * dy);
                    if (distance < 120) {
                        ctx.strokeStyle = `rgba(2, 194, 2, ${0.1 * (1 - distance / 120)})`;
                        ctx.lineWidth = 0.5;
                        ctx.beginPath();
                        ctx.moveTo(particles[i].x, particles[i].y);
                        ctx.lineTo(particles[j].x, particles[j].y);
                        ctx.stroke();
                    }
                }
            }
        }

        function animateParticles() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            particles.forEach(particle => {
                particle.update();
                particle.draw();
            });
            connectParticles();
            animationId = requestAnimationFrame(animateParticles);
        }
        animateParticles();

        // Mouse interaction
        let mouseX = 0, mouseY = 0;
        canvas.addEventListener('mousemove', (e) => {
            mouseX = e.clientX;
            mouseY = e.clientY;
            particles.forEach(particle => {
                const dx = mouseX - particle.x;
                const dy = mouseY - particle.y;
                const distance = Math.sqrt(dx * dx + dy * dy);
                if (distance < 150) {
                    particle.x -= dx * 0.02;
                    particle.y -= dy * 0.02;
                }
            });
        });
    }

    counters.forEach(counter => counterObserver.observe(counter));

    // ===== 3D PROJECTS CAROUSEL =====
    const carousel = document.getElementById('projectsCarousel');
    if (carousel) {
        const cards = carousel.querySelectorAll('.project-3d-card');
        const prevBtn = document.getElementById('projectPrev');
        const nextBtn = document.getElementById('projectNext');
        const currentCounter = document.querySelector('.project-3d-current');
        let currentIndex = 0;
        const totalCards = cards.length;

        function updateCarousel() {
            cards.forEach((card, index) => {
                card.classList.remove('active', 'prev', 'next');
                
                if (index === currentIndex) {
                    card.classList.add('active');
                } else if (index === currentIndex - 1) {
                    card.classList.add('prev');
                } else if (index === currentIndex + 1) {
                    card.classList.add('next');
                }
            });

            if (currentCounter) {
                currentCounter.textContent = String(currentIndex + 1).padStart(2, '0');
            }

            const cardWidth = cards[0].offsetWidth + 40;
            const offset = -currentIndex * cardWidth + (carousel.parentElement.offsetWidth - cards[0].offsetWidth) / 2;
            carousel.style.transform = `translateX(${offset}px)`;
        }

        function nextSlide() {
            currentIndex = (currentIndex + 1) % totalCards;
            updateCarousel();
        }

        function prevSlide() {
            currentIndex = (currentIndex - 1 + totalCards) % totalCards;
            updateCarousel();
        }

        if (nextBtn) nextBtn.addEventListener('click', nextSlide);
        if (prevBtn) prevBtn.addEventListener('click', prevSlide);

        carousel.addEventListener('wheel', (e) => {
            if (Math.abs(e.deltaX) > Math.abs(e.deltaY)) {
                e.preventDefault();
                if (e.deltaX > 30) nextSlide();
                else if (e.deltaX < -30) prevSlide();
            } else if (e.deltaY > 30) {
                e.preventDefault();
                nextSlide();
            } else if (e.deltaY < -30) {
                e.preventDefault();
                prevSlide();
            }
        }, { passive: false });

        let touchStartX = 0;
        carousel.addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
        });

        carousel.addEventListener('touchend', (e) => {
            const touchEndX = e.changedTouches[0].screenX;
            const diff = touchStartX - touchEndX;
            if (Math.abs(diff) > 50) {
                if (diff > 0) nextSlide();
                else prevSlide();
            }
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowRight') nextSlide();
            else if (e.key === 'ArrowLeft') prevSlide();
        });

        cards.forEach((card, index) => {
            card.addEventListener('click', () => {
                if (index !== currentIndex) {
                    currentIndex = index;
                    updateCarousel();
                }
            });
        });

        cards.forEach(card => {
            card.addEventListener('mousemove', (e) => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                const centerX = rect.width / 2;
                const centerY = rect.height / 2;
                const rotateX = (y - centerY) / centerY * -8;
                const rotateY = (x - centerX) / centerX * 8;
                
                card.style.transform = `rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
            });

            card.addEventListener('mouseleave', () => {
                card.style.transform = '';
            });
        });

        window.addEventListener('resize', updateCarousel);
        updateCarousel();
    }
});
