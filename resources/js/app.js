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

    // ===== GLOBE INTERACTION =====
    const initGlobe = async () => {
        const globeCanvas = document.getElementById('educationGlobe');
        if (!globeCanvas) return;

        const container = document.getElementById('globeContainer');
        const tooltip = document.getElementById('globeTooltip');
        const educationData = window.educationGlobeData || [];

        const THREE = await import('three');

        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(45, 2, 0.1, 1000);
        camera.position.z = 3.5;

        const renderer = new THREE.WebGLRenderer({ canvas: globeCanvas, antialias: true, alpha: true });
        renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
        renderer.setClearColor(0x000000, 0);
        renderer.outputColorSpace = 'srgb';

        const group = new THREE.Group();
        scene.add(group);

        const textureLoader = new THREE.TextureLoader();
        const earthTexture = textureLoader.load(window.educationGlobeTexture, () => {
            globeMaterial.needsUpdate = true;
            console.log('Earth texture loaded');
        }, undefined, (err) => {
            console.error('Failed to load earth texture', err);
        });
        earthTexture.colorSpace = 'srgb';

        const globeGeometry = new THREE.SphereGeometry(1, 64, 64);
        const globeMaterial = new THREE.MeshStandardMaterial({
            map: earthTexture,
            color: 0xffffff,
            roughness: 0.75,
            metalness: 0.05,
        });
        const globeMesh = new THREE.Mesh(globeGeometry, globeMaterial);
        group.add(globeMesh);

        const atmosphereGeometry = new THREE.SphereGeometry(1.02, 64, 64);
        const atmosphereMaterial = new THREE.ShaderMaterial({
            vertexShader: `
                varying vec3 vNormal;
                void main() {
                    vNormal = normalize(normalMatrix * normal);
                    gl_Position = projectionMatrix * modelViewMatrix * vec4(position, 1.0);
                }
            `,
            fragmentShader: `
                varying vec3 vNormal;
                void main() {
                    float intensity = pow(0.7 - dot(vNormal, vec3(0.0, 0.0, 1.0)), 2.5);
                    gl_FragColor = vec4(0.2, 0.8, 1.0, 1.0) * intensity * 0.6;
                }
            `,
            blending: THREE.AdditiveBlending,
            side: THREE.BackSide,
            transparent: true,
        });
        const atmosphere = new THREE.Mesh(atmosphereGeometry, atmosphereMaterial);
        group.add(atmosphere);

        const ambientLight = new THREE.AmbientLight(0xffffff, 1.2);
        scene.add(ambientLight);
        const directionalLight = new THREE.DirectionalLight(0xffffff, 2.0);
        directionalLight.position.set(5, 3, 5);
        scene.add(directionalLight);

        function latLngToVector3(lat, lng, radius) {
            const phi = (90 - lat) * (Math.PI / 180);
            const theta = (lng + 180) * (Math.PI / 180);
            const x = -(radius * Math.sin(phi) * Math.cos(theta));
            const z = radius * Math.sin(phi) * Math.sin(theta);
            const y = radius * Math.cos(phi);
            return new THREE.Vector3(x, y, z);
        }

        const markersGroup = new THREE.Group();
        group.add(markersGroup);
        const markerMeshes = [];

        educationData.forEach(item => {
            if (item.lat !== undefined && item.lng !== undefined) {
                const pos = latLngToVector3(item.lat, item.lng, 1.01);
                const dotGeometry = new THREE.SphereGeometry(0.018, 16, 16);
                const dotMaterial = new THREE.MeshBasicMaterial({ color: 0x02c202 });
                const dot = new THREE.Mesh(dotGeometry, dotMaterial);
                dot.position.copy(pos);
                dot.userData = { location: item.location, title: item.title };
                markersGroup.add(dot);
                markerMeshes.push(dot);

                const ringGeometry = new THREE.RingGeometry(0.022, 0.028, 32);
                const ringMaterial = new THREE.MeshBasicMaterial({ color: 0x02c202, side: THREE.DoubleSide, transparent: true, opacity: 0.6 });
                const ring = new THREE.Mesh(ringGeometry, ringMaterial);
                ring.position.copy(pos);
                ring.lookAt(new THREE.Vector3(0, 0, 0));
                ring.userData = { isPulse: true };
                markersGroup.add(ring);
            }
        });

        const validItems = educationData.filter(item => item.lat !== undefined && item.lng !== undefined);
        const linesGroup = new THREE.Group();
        group.add(linesGroup);
        const lineMaterial = new THREE.LineBasicMaterial({ color: 0x02c202, transparent: true, opacity: 0.7 });

        for (let i = 0; i < validItems.length - 1; i++) {
            const start = latLngToVector3(validItems[i].lat, validItems[i].lng, 1.015);
            const end = latLngToVector3(validItems[i + 1].lat, validItems[i + 1].lng, 1.015);
            const mid = start.clone().add(end).multiplyScalar(0.5);
            mid.normalize().multiplyScalar(1.08);
            const curve = new THREE.QuadraticBezierCurve3(start, mid, end);
            const points = curve.getPoints(32);
            const geometry = new THREE.BufferGeometry().setFromPoints(points);
            const line = new THREE.Line(geometry, lineMaterial);
            linesGroup.add(line);
        }

        let targetRotationY = 0;
        let targetRotationX = 0;
        let currentRotationY = 0;
        let currentRotationX = 0;
        let isDragging = false;
        let previousMousePosition = { x: 0, y: 0 };
        let autoRotate = true;
        let autoRotateSpeed = 0.002;

        function resizeRenderer() {
            const width = container.clientWidth;
            const height = container.clientHeight;
            renderer.setSize(width, height, false);
            camera.aspect = width / height;
            camera.updateProjectionMatrix();
        }
        resizeRenderer();
        window.addEventListener('resize', resizeRenderer);

        globeCanvas.addEventListener('mousedown', (e) => {
            isDragging = true;
            previousMousePosition = { x: e.clientX, y: e.clientY };
            autoRotate = false;
        });

        document.addEventListener('mousemove', (e) => {
            if (!isDragging) return;
            const deltaMove = {
                x: e.clientX - previousMousePosition.x,
                y: e.clientY - previousMousePosition.y,
            };
            targetRotationY += deltaMove.x * 0.005;
            targetRotationX += deltaMove.y * 0.005;
            targetRotationX = Math.max(-Math.PI / 2, Math.min(Math.PI / 2, targetRotationX));
            previousMousePosition = { x: e.clientX, y: e.clientY };
        });

        document.addEventListener('mouseup', () => {
            if (isDragging) {
                isDragging = false;
                setTimeout(() => {
                    if (!isDragging) autoRotate = true;
                }, 2000);
            }
        });

        globeCanvas.addEventListener('touchstart', (e) => {
            if (e.touches.length === 1) {
                isDragging = true;
                previousMousePosition = { x: e.touches[0].clientX, y: e.touches[0].clientY };
                autoRotate = false;
            }
        }, { passive: true });

        globeCanvas.addEventListener('touchmove', (e) => {
            if (!isDragging || e.touches.length !== 1) return;
            const deltaMove = {
                x: e.touches[0].clientX - previousMousePosition.x,
                y: e.touches[0].clientY - previousMousePosition.y,
            };
            targetRotationY += deltaMove.x * 0.008;
            targetRotationX += deltaMove.y * 0.008;
            targetRotationX = Math.max(-Math.PI / 2, Math.min(Math.PI / 2, targetRotationX));
            previousMousePosition = { x: e.touches[0].clientX, y: e.touches[0].clientY };
        }, { passive: true });

        globeCanvas.addEventListener('touchend', () => {
            isDragging = false;
            setTimeout(() => {
                if (!isDragging) autoRotate = true;
            }, 2000);
        });

        const raycaster = new THREE.Raycaster();
        const mouse = new THREE.Vector2();

        function showTooltip(screenPos, text) {
            tooltip.textContent = text;
            tooltip.style.left = screenPos.x + 'px';
            tooltip.style.top = screenPos.y + 'px';
            tooltip.classList.add('visible');
        }

        function hideTooltip() {
            tooltip.classList.remove('visible');
        }

        globeCanvas.addEventListener('mousemove', (e) => {
            const rect = globeCanvas.getBoundingClientRect();
            mouse.x = ((e.clientX - rect.left) / rect.width) * 2 - 1;
            mouse.y = -((e.clientY - rect.top) / rect.height) * 2 + 1;

            raycaster.setFromCamera(mouse, camera);
            const intersects = raycaster.intersectObjects(markerMeshes);

            if (intersects.length > 0) {
                const data = intersects[0].object.userData;
                if (data && data.location) {
                    showTooltip({ x: e.clientX - rect.left, y: e.clientY - rect.top }, data.location);
                }
                globeCanvas.style.cursor = 'pointer';
            } else {
                hideTooltip();
                globeCanvas.style.cursor = isDragging ? 'grabbing' : 'grab';
            }
        });

        globeCanvas.addEventListener('mouseleave', hideTooltip);

        function animate() {
            requestAnimationFrame(animate);

            if (autoRotate) {
                targetRotationY += autoRotateSpeed;
            }

            currentRotationY += (targetRotationY - currentRotationY) * 0.08;
            currentRotationX += (targetRotationX - currentRotationX) * 0.08;

            group.rotation.y = currentRotationY;
            group.rotation.x = currentRotationX;

            const time = Date.now() * 0.002;
            markersGroup.children.forEach(child => {
                if (child.userData && child.userData.isPulse) {
                    const scale = 1 + Math.sin(time) * 0.3;
                    child.scale.set(scale, scale, scale);
                    child.material.opacity = 0.3 + Math.sin(time) * 0.3;
                }
            });

            renderer.render(scene, camera);
        }
        animate();
    };

    initGlobe();
});
