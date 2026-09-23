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
                'slug' => 'mmsart-recovery',
                'title' => $locale === 'fr' ? 'Mmsart Recovery' : 'Mmsart Recovery',
                'description' => $locale === 'fr' 
                    ? 'Plateforme de recouvrement de créances avec module d\'IA interactif et Voice Chat pour automatiser les relances clients. Architecture fullstack Laravel/JS avec authentification sécurisée RBAC et API RESTful.' 
                    : 'Debt recovery platform with interactive AI module and Voice Chat to automate client follow-ups. Fullstack Laravel/JS architecture with secure RBAC authentication and RESTful API.',
                'role' => 'Développeur Fullstack',
                'year' => '2024',
                'client' => 'Ghostroar Digitale',
                'tech' => ['Laravel', 'JavaScript', 'MySQL', 'Docker', 'AI'],
                'image' => 'assets/images/projects/mmsart.jpg',
            ],
            [
                'id' => 2,
                'slug' => 'tresor-hotel',
                'title' => $locale === 'fr' ? 'Trésor Hotel' : 'Trésor Hotel',
                'description' => $locale === 'fr' 
                    ? 'ERP hôtier complet avec Laravel : réservation, facturation, suivi financier. Tableaux de bord interactifs KPIs avec jQuery et Bootstrap. Optimisation SQL pour haute disponibilité.' 
                    : 'Complete hotel ERP with Laravel: booking, billing, financial tracking. Interactive KPI dashboards with jQuery and Bootstrap. SQL optimization for high availability.',
                'role' => 'Développeur Fullstack',
                'year' => '2024',
                'client' => 'Ghostroar Digitale',
                'tech' => ['Laravel', 'jQuery', 'Bootstrap', 'MySQL'],
                'image' => 'assets/images/projects/tresor.jpg',
            ],
            [
                'id' => 3,
                'slug' => 'bcc',
                'title' => $locale === 'fr' ? 'BCC Business Plan' : 'BCC Business Plan',
                'description' => $locale === 'fr' 
                    ? 'Solution SaaS d\'aide à la création et suivi automatisé de business plans. Algorithmes de calculs financiers, exportation dynamique PDF/Word et optimisation UI/UX.' 
                    : 'SaaS solution for creating and tracking business plans. Financial calculation algorithms, dynamic PDF/Word export, and UI/UX optimization.',
                'role' => 'Développeur Fullstack',
                'year' => '2024',
                'client' => 'Ghostroar Digitale',
                'tech' => ['Laravel', 'JavaScript', 'MySQL', 'PDF Export'],
                'image' => 'assets/images/projects/bcc.jpg',
            ],
            [
                'id' => 4,
                'slug' => 'ifptii',
                'title' => $locale === 'fr' ? 'IFPTII E-learning' : 'IFPTII E-learning',
                'description' => $locale === 'fr' 
                    ? 'LMS moderne avec Laravel : espaces étudiants, enseignants et administrateurs. Suivi de formation, téléversement de contenus, évaluations en ligne et génération dynamique d\'attestations PDF.' 
                    : 'Modern LMS with Laravel: student, teacher, and admin spaces. Training tracking, content upload, online assessments, and dynamic PDF certificate generation.',
                'role' => 'Développeur Fullstack',
                'year' => '2023',
                'client' => 'Ghostroar Digitale',
                'tech' => ['Laravel', 'Bootstrap', 'MySQL', 'PDF'],
                'image' => 'assets/images/projects/ifptii.jpg',
            ],
            [
                'id' => 5,
                'slug' => 'zukulu',
                'title' => $locale === 'fr' ? 'Zukulu Gestion Scolaire' : 'Zukulu School Management',
                'description' => $locale === 'fr' 
                    ? 'Plateforme de gestion d\'établissements sous CodeIgniter : inscriptions, scolarités, notes, bulletins. Algorithme de planification d\'emplois du temps et optimisation MySQL.' 
                    : 'School management platform built with CodeIgniter: registrations, tuition, grades, report cards. Timetable planning algorithm and MySQL optimization.',
                'role' => 'Développeur Web',
                'year' => '2023',
                'client' => 'Ghostroar Digitale',
                'tech' => ['CodeIgniter', 'PHP', 'MySQL', 'jQuery'],
                'image' => 'assets/images/projects/zukulu.jpg',
            ],
            [
                'id' => 6,
                'slug' => 't2fc',
                'title' => $locale === 'fr' ? 'T2FC Agropastorale' : 'T2FC Agropastoral',
                'description' => $locale === 'fr' 
                    ? 'Application web de suivi des exploitations agricoles, production en temps réel et stocks. Module de comptabilité analytique, alertes de réapprovisionnement et optimisation des coûts.' 
                    : 'Web application for farm monitoring, real-time production, and inventory. Cost optimization, replenishment alerts, and analytical accounting module.',
                'role' => 'Développeur Web',
                'year' => '2023',
                'client' => 'Ghostroar Digitale',
                'tech' => ['PHP', 'MySQL', 'JavaScript', 'Bootstrap'],
                'image' => 'assets/images/projects/t2fc.jpg',
            ],
        ];

        $experience = [
            [
                'year' => '2023 - Présent',
                'title' => $locale === 'fr' ? 'Développeur Web Fullstack' : 'Fullstack Web Developer',
                'company' => 'Ghostroar Digitale',
                'description' => $locale === 'fr' 
                    ? 'Conception, développement, optimisation et déploiement d\'applications web sur mesure pour divers secteurs : recouvrement de créances avec IA, ERP hôtelier, SaaS business plan, plateformes e-learning, gestion scolaire et suivi agropastoral.' 
                    : 'Design, development, optimization, and deployment of custom web applications across multiple sectors: debt recovery with AI, hotel ERP, business plan SaaS, e-learning platforms, school management, and agropastoral tracking.',
            ],
        ];

        $education = [
            [
                'year' => '2021 - 2024',
                'title' => $locale === 'fr' ? 'Licence en Génie Logiciel' : 'Bachelor\'s Degree in Software Engineering',
                'company' => $locale === 'fr' ? 'Institut Africain d\'Informatique (IAI), Yaoundé, Cameroun' : 'African Institute of Computer Science (IAI), Yaoundé, Cameroon',
                'description' => $locale === 'fr' 
                    ? 'Formation approfondie en génie logiciel, bases de données, algorithmique et développement d\'applications. Équivalence canadienne : Bachelor\'s Degree.' 
                    : 'In-depth training in software engineering, databases, algorithms, and application development. Canadian equivalence: Bachelor\'s Degree.',
            ],
            [
                'year' => '2021',
                'title' => $locale === 'fr' ? 'Baccalauréat' : 'High School Diploma',
                'company' => $locale === 'fr' ? 'Lycée Bilingue de Yaoundé' : 'Bilingual High School of Yaoundé',
                'description' => '',
            ],
        ];

        $techStack = [
            ['name' => 'PHP', 'category' => 'Langage'],
            ['name' => 'JavaScript', 'category' => 'Langage'],
            ['name' => 'Python', 'category' => 'Langage'],
            ['name' => 'HTML5', 'category' => 'Langage'],
            ['name' => 'CSS3', 'category' => 'Langage'],
            ['name' => 'Laravel', 'category' => 'Framework'],
            ['name' => 'React', 'category' => 'Framework'],
            ['name' => 'CodeIgniter', 'category' => 'Framework'],
            ['name' => 'Django', 'category' => 'Framework'],
            ['name' => 'Bootstrap', 'category' => 'Styling'],
            ['name' => 'Tailwind CSS', 'category' => 'Styling'],
            ['name' => 'jQuery', 'category' => 'Library'],
            ['name' => 'MySQL', 'category' => 'Database'],
            ['name' => 'Docker', 'category' => 'DevOps'],
            ['name' => 'Git', 'category' => 'Outils'],
            ['name' => 'GitHub', 'category' => 'Outils'],
            ['name' => 'WordPress', 'category' => 'CMS'],
            ['name' => 'Agile', 'category' => 'Méthodologie'],
            ['name' => 'UML', 'category' => 'Méthodologie'],
            ['name' => 'Linux', 'category' => 'Cloud'],
        ];

        $skills = [
            $locale === 'fr' ? 'Langages : PHP, JavaScript, HTML5, CSS3, Python' : 'Languages: PHP, JavaScript, HTML5, CSS3, Python',
            $locale === 'fr' ? 'Frameworks : Laravel, React, CodeIgniter, Django, jQuery, Bootstrap, Tailwind CSS' : 'Frameworks: Laravel, React, CodeIgniter, Django, jQuery, Bootstrap, Tailwind CSS',
            $locale === 'fr' ? 'CMS & Outils : WordPress, Git, GitHub, MySQL, Google Sheets' : 'CMS & Tools: WordPress, Git, GitHub, MySQL, Google Sheets',
            $locale === 'fr' ? 'Méthodologies : Agile/Scrum, UML, Linux, Docker' : 'Methodologies: Agile/Scrum, UML, Linux, Docker',
        ];

        $stats = [
            ['value' => '3+', 'label' => $locale === 'fr' ? 'Années d\'expérience' : 'Years Experience'],
            ['value' => '10+', 'label' => $locale === 'fr' ? 'Projets réalisés' : 'Projects Completed'],
            ['value' => '15+', 'label' => $locale === 'fr' ? 'Technologies maîtrisées' : 'Technologies Mastered'],
            ['value' => '100%', 'label' => $locale === 'fr' ? 'Passion' : 'Passion'],
        ];

        $languages = [
            $locale === 'fr' ? 'Français : Courant' : 'French: Fluent',
            $locale === 'fr' ? 'Anglais : Intermédiaire' : 'English: Intermediate',
        ];

        return view('portfolio', compact(
            'translations', 'projects', 'experience', 'education', 'techStack', 'skills', 'stats', 'languages', 'locale'
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
