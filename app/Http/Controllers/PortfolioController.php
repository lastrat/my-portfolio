<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PortfolioController extends Controller
{
    public function index()
    {
        $locale = App::getLocale();
        $translations = include resource_path("lang/{$locale}/portfolio.php");
        
        $projects = [
            [
                'id' => 1,
                'slug' => 'ifptii',
                'title' => $locale === 'fr' ? 'IFPTII' : 'IFPTII',
                'description' => $locale === 'fr' 
                    ? 'Plateforme éducative pour les instituts de formation professionnelle.' 
                    : 'Educational platform for professional training institutes.',
                'role' => 'Full Stack Developer',
                'year' => '2025',
                'client' => 'IFPTII',
                'tech' => ['Laravel', 'React', 'MySQL', 'Bootstrap'],
                'image' => 'assets/images/projects/ifptii.jpg',
            ],
            [
                'id' => 2,
                'slug' => 'giluce',
                'title' => $locale === 'fr' ? 'Giluce' : 'Giluce',
                'description' => $locale === 'fr' 
                    ? 'Solution e-commerce pour produits d\'éclairage de luxe.' 
                    : 'E-commerce solution for luxury lighting products.',
                'role' => 'Lead Developer',
                'year' => '2024',
                'client' => 'Giluce',
                'tech' => ['Laravel', 'Next.js', 'Stripe', 'Tailwind'],
                'image' => 'assets/images/projects/giluce.jpg',
            ],
            [
                'id' => 3,
                'slug' => 'tresor-hotel',
                'title' => $locale === 'fr' ? 'Trésor Hotel' : 'Trésor Hotel',
                'description' => $locale === 'fr' 
                    ? 'Système de réservation et gestion hôtelière avec disponibilité en temps réel.' 
                    : 'Hotel booking and management system with real-time availability.',
                'role' => 'Full Stack Developer',
                'year' => '2024',
                'client' => 'Trésor Hotel',
                'tech' => ['Laravel', 'Vue.js', 'MySQL', 'Alpine.js'],
                'image' => 'assets/images/projects/tresor.jpg',
            ],
            [
                'id' => 4,
                'slug' => 'mirai',
                'title' => $locale === 'fr' ? 'Mirai' : 'Mirai',
                'description' => $locale === 'fr' 
                    ? 'Tableau de bord IA pour l\'analyse prédictive.' 
                    : 'AI-powered dashboard for predictive analytics.',
                'role' => 'Full Stack Developer',
                'year' => '2025',
                'client' => 'Mirai',
                'tech' => ['Laravel', 'React', 'Python', 'OpenAI'],
                'image' => 'assets/images/projects/mirai.jpg',
            ],
        ];

        $experiments = [
            [
                'id' => 1,
                'title' => $locale === 'fr' ? 'Expériences WebGL' : 'WebGL Experiments',
                'description' => $locale === 'fr' 
                    ? 'Exploration des possibilités du WebGL pour des expériences 3D immersives.' 
                    : 'Exploring WebGL possibilities for immersive 3D experiences.',
                'icon' => 'webgl',
            ],
            [
                'id' => 2,
                'title' => $locale === 'fr' ? '3D Interactif' : '3D Interactive',
                'description' => $locale === 'fr' 
                    ? 'Objets 3D interactifs réagissant aux mouvements de la souris.' 
                    : 'Interactive 3D objects reacting to mouse movements.',
                'icon' => '3d',
            ],
            [
                'id' => 3,
                'title' => $locale === 'fr' ? 'Intégration IA' : 'AI Integration',
                'description' => $locale === 'fr' 
                    ? 'Intégration d\'intelligence artificielle dans les interfaces web.' 
                    : 'Integrating artificial intelligence into web interfaces.',
                'icon' => 'ai',
            ],
            [
                'id' => 4,
                'title' => $locale === 'fr' ? 'Motion Design' : 'Motion Design',
                'description' => $locale === 'fr' 
                    ? 'Animations et micro-interactions pour des expériences fluides.' 
                    : 'Animations and micro-interactions for fluid experiences.',
                'icon' => 'motion',
            ],
            [
                'id' => 5,
                'title' => $locale === 'fr' ? 'UI Interactive' : 'Interactive UI',
                'description' => $locale === 'fr' 
                    ? 'Interfaces utilisateur innovantes et expériences uniques.' 
                    : 'Innovative user interfaces and unique experiences.',
                'icon' => 'interactive',
            ],
        ];

        $experience = [
            [
                'year' => '2024 - Présent',
                'title' => $locale === 'fr' ? 'Développeur Full Stack Senior' : 'Senior Full Stack Developer',
                'company' => 'Freelance',
                'description' => $locale === 'fr' 
                    ? 'Développement d\'applications web premium pour clients internationaux.' 
                    : 'Developing premium web applications for international clients.',
            ],
            [
                'year' => '2022 - 2024',
                'title' => $locale === 'fr' ? 'Développeur Full Stack' : 'Full Stack Developer',
                'company' => 'Agence Digitale',
                'description' => $locale === 'fr' 
                    ? 'Conception et développement de solutions e-commerce et plateformes web.' 
                    : 'Design and development of e-commerce solutions and web platforms.',
            ],
            [
                'year' => '2020 - 2022',
                'title' => $locale === 'fr' ? 'Développeur Web' : 'Web Developer',
                'company' => 'Startup Tech',
                'description' => $locale === 'fr' 
                    ? 'Développement frontend et backend pour applications SaaS.' 
                    : 'Frontend and backend development for SaaS applications.',
            ],
        ];

        $techStack = [
            ['name' => 'Laravel', 'category' => 'Backend'],
            ['name' => 'PHP', 'category' => 'Backend'],
            ['name' => 'MySQL', 'category' => 'Database'],
            ['name' => 'React', 'category' => 'Frontend'],
            ['name' => 'Next.js', 'category' => 'Frontend'],
            ['name' => 'Vue.js', 'category' => 'Frontend'],
            ['name' => 'JavaScript', 'category' => 'Language'],
            ['name' => 'Python', 'category' => 'Language'],
            ['name' => 'Tailwind CSS', 'category' => 'Styling'],
            ['name' => 'Bootstrap', 'category' => 'Styling'],
            ['name' => 'Three.js', 'category' => '3D'],
            ['name' => 'GSAP', 'category' => 'Animation'],
            ['name' => 'OpenAI API', 'category' => 'AI'],
            ['name' => 'Docker', 'category' => 'DevOps'],
        ];

        $stats = [
            ['value' => '5+', 'label' => $locale === 'fr' ? 'Années d\'expérience' : 'Years Experience'],
            ['value' => '20+', 'label' => $locale === 'fr' ? 'Projets réalisés' : 'Projects Completed'],
            ['value' => '15+', 'label' => $locale === 'fr' ? 'Technologies maîtrisées' : 'Technologies Mastered'],
            ['value' => '∞', 'label' => $locale === 'fr' ? 'Curiosité' : 'Curiosity'],
        ];

        return view('portfolio', compact(
            'translations', 'projects', 'experiments', 'experience', 'techStack', 'stats', 'locale'
        ));
    }

    public function switchLanguage($locale)
    {
        if (in_array($locale, ['en', 'fr'])) {
            session(['locale' => $locale]);
            App::setLocale($locale);
        }
        
        return back();
    }
}
