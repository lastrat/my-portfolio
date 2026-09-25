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
                'image' => 'assets/images/projects/tresor.png',
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
                'image' => 'assets/images/projects/ifptii2.png',
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
                'image' => 'assets/images/projects/zukulu.png',
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
                'company' => $locale === 'fr' ? 'Institut Africain d\'Informatique (IAI)' : 'African Institute of Computer Science (IAI)',
                'description' => $locale === 'fr' 
                    ? 'Formation approfondie en génie logiciel, bases de données, algorithmique et développement d\'applications. Équivalence canadienne : Bachelor\'s Degree.' 
                    : 'In-depth training in software engineering, databases, algorithms, and application development. Canadian equivalence: Bachelor\'s Degree.',
                'location' => $locale === 'fr' ? 'Yaoundé, Cameroun' : 'Yaoundé, Cameroon',
                'lat' => 3.848,
                'lng' => 11.502,
            ],
            [
                'year' => '2021',
                'title' => $locale === 'fr' ? 'Baccalauréat' : 'High School Diploma',
                'company' => $locale === 'fr' ? 'Lycée Bilingue de Yaoundé' : 'Bilingual High School of Yaoundé',
                'description' => $locale === 'fr' ? 'Baccalauréat série C, spécialité mathématiques et physique.' : 'High School Diploma, Science track.',
                'location' => $locale === 'fr' ? 'Ngousso Éleveur, Yaoundé' : 'Ngousso Éleveur, Yaoundé',
                'lat' => 46.835,
                'lng' => -64.515,
            ],
        ];

        $techStack = [
            ['name' => 'PHP', 'category' => 'Langage', 'icon' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 18.09c-1.36 0-2.38-.48-3.05-1.43-.67-.95-.85-2.26-.5-3.9.12-.59.42-1.56.9-2.9.45-1.28.88-2.56 1.29-3.83.41-1.27.63-1.89.66-1.87.04.02.08 1.14.08 2.55 0 1.41-.04 2.5-.08 2.55-.03.02-.25.6-.66 1.87-.41 1.27-.84 2.55-1.29 3.83-.48 1.34-.78 2.31-.9 2.9-.35 1.64-.17 2.95.5 3.9.67.95 1.69 1.43 3.05 1.43z"/></svg>'],
            ['name' => 'JavaScript', 'category' => 'Langage', 'icon' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M3 3h18v18H3V3zm16.525 13.707c-.131-.821-.666-1.511-2.252-2.155-.552-.259-1.165-.438-1.349-.854-.068-.248-.078-.382-.034-.529.113-.484.687-.629 1.137-.495.293.09.563.315.732.676.775-.507.775-.507 1.316-.844-.203-.314-.304-.451-.439-.586-.473-.528-1.103-.798-2.126-.775l-.528.067c-.507.124-.991.395-1.283.754-.855 1.261-.609 3.764.363 4.524.949.723 2.363.878 2.542 1.468l.005.003c.018.112.022.257-.003.399-.203 1.153-.848 1.773-1.701 1.958-.276.062-.422-.081-.465-.295l-.015-.095c-.016-.108.017-.214.061-.313.093-.202.336-.351.471-.449.238-.161.514-.259.872-.341.628-.145 1.154-.213 1.561-.241-.082-.106-.151-.228-.203-.364-.249-.622-.376-1.359-.376-2.2 0-1.924.752-3.678 2.231-4.893.988-.826 2.117-1.259 3.282-1.259.331 0 .658.037.976.108-.252-.753-.622-1.386-1.107-1.887z"/></svg>'],
            ['name' => 'Python', 'category' => 'Langage', 'icon' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2c-1.5 0-2.75.5-3.75 1.5S6.75 6 6.75 8.25c0 .5.05 1 .15 1.5H4.5v5.25h3.15c.15.75.35 1.5.6 2.25.45 1.25 1.1 2.15 1.9 2.7.8.55 1.75.85 2.85.85 1.25 0 2.35-.4 3.3-1.2.95-.8 1.55-1.95 1.8-3.45h2.15c-.35 2.2-1.45 3.95-3.3 5.25-1.85 1.3-4.15 1.95-6.9 1.95-2.35 0-4.45-.5-6.3-1.5-1.85-1-3.3-2.35-4.35-4.05C.5 15.25-.05 13.15-.05 10.75 0 8.45.55 6.35 1.75 4.4 2.95 2.45 4.65 1 6.9.35c2.25-.65 4.15-.3 5.7 1.05 1.55 1.35 2.35 3.35 2.4 5.95 0 .5 0 1.25-.15 2.25H9.5v-.75c0-1.1.1-2 .35-2.75.25-.75.65-1.35 1.2-1.8.55-.45 1.25-.7 2.05-.7 1.25 0 2.15.5 2.7 1.5.55 1 .65 2.35.3 4.05-.25 1.25-.7 2.35-1.35 3.3.7.65 1.55 1.15 2.55 1.5-.1-.75-.3-1.55-.6-2.4-.9-2.55-1.35-4.15-1.35-4.8 0-.75.15-1.35.45-1.8.3-.45.75-.7 1.35-.7z"/></svg>'],
            ['name' => 'HTML5', 'category' => 'Langage', 'icon' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M1.5 0h21l-1.91 21.563L11.977 24l-8.564-2.438L1.5 0zm17.09 4.413L5.41 4.41l.213 2.622 10.125.002-.255 2.716h-6.64l.24 2.573h6.182l-.366 3.523-2.91.804-2.956-.81-.188-2.11h-2.61l.29 3.855L12 19.288l5.373-1.54L18.59 4.414z"/></svg>'],
            ['name' => 'CSS3', 'category' => 'Langage', 'icon' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M1.5 0h21l-1.91 21.563L11.977 24l-8.564-2.438L1.5 0zm17.09 4.413L5.41 4.41l.213 2.622 10.125.002-.255 2.716h-6.64l.24 2.573h6.182l-.366 3.523-2.91.804-2.956-.81-.188-2.11h-2.61l.29 3.855L12 19.288l5.373-1.54L18.59 4.414z"/></svg>'],
            ['name' => 'Laravel', 'category' => 'Framework', 'icon' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M23.642 5.467c-.08-.18-.18-.34-.3-.47a3.12 3.12 0 00-.44-.39c-.18-.14-.38-.26-.6-.36-.22-.1-.46-.18-.7-.24-.24-.06-.5-.1-.76-.1-.26 0-.52.04-.76.1-.24.06-.48.14-.7.24-.22.1-.42.22-.6.36-.18.14-.34.3-.44.39-.12.13-.22.29-.3.47-.08.18-.12.38-.12.58v9.66c0 .2.04.4.12.58.08.18.18.34.3.47.1.13.26.25.44.39.18.14.38.26.6.36.22.1.46.18.7.24.24.06.5.1.76.1.26 0 .52-.04.76-.1.24-.06.48-.14.7-.24.22-.1.42-.22.6-.36.18-.14.34-.3.44-.39.12-.13.22-.29.3-.47.08-.18.12-.38.12-.58V6.05c0-.2-.04-.4-.12-.58zM12 1.5C6.2 1.5 1.5 6.2 1.5 12S6.2 22.5 12 22.5 22.5 17.8 22.5 12 17.8 1.5 12 1.5zm0 1.8c5.1 0 9.2 4.1 9.2 9.2s-4.1 9.2-9.2 9.2-9.2-4.1-9.2-9.2 4.1-9.2 9.2-9.2z"/></svg>'],
            ['name' => 'React', 'category' => 'Framework', 'icon' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 13.5a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"/><path d="M12 21.35c-1.5 0-2.75-.5-3.75-1.5-1-1-1.5-2.25-1.5-3.75 0-.5.05-1 .15-1.5H4.5v-1.5h2.4c.15-.75.35-1.5.6-2.25C7.15 9.65 6.5 8.25 6.05 7c-.35-1.05-.55-1.95-.6-2.7h-1.5v-1.5h1.5c0-1.5.35-2.7 1.05-3.6C7.5 1.05 8.7.5 10.2.5h3.6c1.5 0 2.7.55 3.6 1.65.7.9 1.05 2.1 1.05 3.6h1.5v1.5h-1.5c-.05.75-.25 1.65-.6 2.7-.45 1.25-1.1 2.65-1.95 4.2-.25.75-.45 1.5-.6 2.25h2.4v1.5h-2.4c-.1.5-.15 1-.15 1.5 0 1.5-.5 2.75-1.5 3.75-1 1-2.25 1.5-3.75 1.5z"/></svg>'],
            ['name' => 'CodeIgniter', 'category' => 'Framework', 'icon' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>'],
            ['name' => 'Django', 'category' => 'Framework', 'icon' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/></svg>'],
            ['name' => 'Bootstrap', 'category' => 'Styling', 'icon' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>'],
            ['name' => 'Tailwind CSS', 'category' => 'Styling', 'icon' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M12.001 4.8c-3.2 0-5.2 1.6-6 4.8 1.2-1.6 2.6-2.2 4.2-1.8.913.228 1.565.89 2.288 1.624C13.666 10.618 15.027 12 18.001 12c3.2 0 5.2-1.6 6-4.8-1.2 1.6-2.6 2.2-4.2 1.8-.913-.228-1.565-.89-2.288-1.624C16.337 6.182 14.976 4.8 12.001 4.8zm-6 7.2c-3.2 0-5.2 1.6-6 4.8 1.2-1.6 2.6-2.2 4.2-1.8.913.228 1.565.89 2.288 1.624 1.177 1.194 2.538 2.576 5.512 2.576 3.2 0 5.2-1.6 6-4.8-1.2 1.6-2.6 2.2-4.2 1.8-.913-.228-1.565-.89-2.288-1.624C10.337 13.382 8.976 12 5.999 12z"/></svg>'],
            ['name' => 'jQuery', 'category' => 'Library', 'icon' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M12.002 0C5.374 0 0 5.373 0 12.002 0 18.628 5.374 24 12.002 24 18.628 24 24 18.628 24 12.002 24 5.373 18.628 0 12.002 0zm-.001 3.6c4.2 0 7.8 2.1 9.9 5.4-1.5-1.5-3.6-2.4-5.7-2.4-2.7 0-5.1 1.5-6.3 3.6-.3-.3-.6-.6-.9-.9-1.5-1.5-2.4-3.3-2.4-5.7 0-.6.05-1.2.15-1.8.7.1 1.4.2 2.1.2zm3.3 1.8c.6.6 1.2 1.3 1.5 2.1.6-.1 1.3-.2 1.9-.2-.2-1.1-.7-2.1-1.4-2.9-.4-.4-.9-.7-1.5-.9-.1.3-.2.6-.2.9h-.3zM12 6.3c-.6 0-1.2.1-1.8.3.3 1.2.9 2.3 1.8 3.1.3-1.2.9-2.3 1.8-3.1-.6-.2-1.2-.3-1.8-.3zm-3.3.6c-.6.3-1.1.7-1.6 1.2-.3.3-.6.7-.8 1.1 1.2.3 2.4.3 3.6 0-.3-.4-.7-.8-1.2-1.1-.5-.4-1-.7-1.6-.9-.1-.2-.2-.3-.2-.5h.1-.3zm8.4 1.5c.3.1.5.3.8.5.1.1.2.2.2.3 1.2 1.8 1.8 3.9 1.8 6.1 0 .6-.1 1.2-.2 1.8-.7.1-1.4.2-2.1.2-1.5 0-2.9-.4-4.1-1.1-.1-.6-.1-1.2-.1-1.8 0-3.6 1.5-6.9 4-9.3.1.3.3.6.5.9.7.8 1.5 1.5 2.4 2.1.1-.3.3-.6.5-.9.3-.3.7-.5 1.1-.7.1-.1.2-.2.3-.2.1-.1.2-.1.3-.2.3-.2.6-.4.9-.6.1-.1.2-.1.3-.2.3-.2.5-.4.8-.6.1-.1.2-.1.3-.2.3-.2.5-.3.8-.5.1-.1.2-.1.3-.2.2-.1.4-.2.6-.3.1-.1.2-.1.3-.2.2-.1.4-.2.5-.3.1-.1.2-.1.3-.2.2-.1.3-.2.5-.3.1-.1.2-.1.3-.2.2-.1.3-.2.4-.2.1-.1.2-.1.3-.2.2-.1.3-.1.4-.2.1-.1.2-.1.3-.2.1-.1.2-.1.3-.2.2-.1.3-.1.4-.2.1-.1.2-.1.3-.2.1 0 .2-.1.3-.1.2-.1.3-.1.4-.1.1 0 .2-.1.3-.1.2 0 .3-.1.4-.1.1 0 .2-.1.3-.1.2 0 .3-.1.4-.1.1 0 .2 0 .3-.1.2 0 .3 0 .4-.1.1 0 .2 0 .3 0 .2 0 .3 0 .4.05.1 0 .2.05.3.05.2.05.3.05.4.1.1.05.2.05.3.1.2.05.3.1.4.15.1.05.2.1.3.1.2.1.3.15.4.2.1.05.2.1.3.15.2.1.3.2.4.25.1.1.2.1.3.2.2.1.3.2.4.3.1.1.2.15.3.2.2.15.3.25.4.35.1.1.2.15.3.2.2.15.3.25.4.4.1.1.2.2.3.25.2.15.3.3.4.45.1.15.2.25.3.35.2.2.3.35.4.55.1.15.2.3.3.45.2.25.3.45.4.7.1.2.2.4.3.6.2.3.3.55.4.85.1.25.2.5.3.8.15.35.25.7.35 1.05.1.35.2.75.25 1.15.05.35.1.75.1 1.15 0 .4-.05.8-.15 1.2-.1.4-.25.8-.45 1.15-.2.35-.45.7-.75.95-.3.25-.65.5-1.05.65-.4.15-.85.25-1.3.25-.4 0-.85-.05-1.3-.2-.45-.15-.85-.35-1.2-.65-.35-.3-.65-.65-.9-1.05-.25-.4-.45-.85-.55-1.35-.1-.5-.15-1.05-.1-1.6.05-.5.2-1 .45-1.45.25-.45.6-.85 1.05-1.15.45-.3.95-.5 1.5-.55.55-.05 1.05 0 1.5.15-.5-.45-1.1-.8-1.75-1.05z"/></svg>'],
            ['name' => 'MySQL', 'category' => 'Database', 'icon' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M12.002 0C5.374 0 0 5.373 0 12.002 0 18.628 5.374 24 12.002 24 18.628 24 24 18.628 24 12.002 24 5.373 18.628 0 12.002 0zm3.328 17.968c-.1.1-.2.1-.3.1-.1 0-.2 0-.3-.1-.1-.1-.1-.2-.1-.3v-.1c0-.1 0-.2.1-.3.1-.1.2-.1.3-.1.1 0 .2 0 .3.1.1.1.1.2.1.3v.1c0 .1 0 .2-.1.3zm1.2-1.7c-.1.1-.2.1-.3.1-.1 0-.2 0-.3-.1-.1-.1-.1-.2-.1-.3v-.1c0-.1 0-.2.1-.3.1-.1.2-.1.3-.1.1 0 .2 0 .3.1.1.1.1.2.1.3v.1c0 .1 0 .2-.1.3zm1.2-1.7c-.1.1-.2.1-.3.1-.1 0-.2 0-.3-.1-.1-.1-.1-.2-.1-.3v-.1c0-.1 0-.2.1-.3.1-.1.2-.1.3-.1.1 0 .2 0 .3.1.1.1.1.2.1.3v.1c0 .1 0 .2-.1.3zM17 13.5c-.1.1-.2.1-.3.1-.1 0-.2 0-.3-.1-.1-.1-.1-.2-.1-.3v-.1c0-.1 0-.2.1-.3.1-.1.2-.1.3-.1.1 0 .2 0 .3.1.1.1.1.2.1.3v.1c0 .1 0 .2-.1.3zm1.2-1.7c-.1.1-.2.1-.3.1-.1 0-.2 0-.3-.1-.1-.1-.1-.2-.1-.3v-.1c0-.1 0-.2.1-.3.1-.1.2-.1.3-.1.1 0 .2 0 .3.1.1.1.1.2.1.3v.1c0 .1 0 .2-.1.3z"/></svg>'],
            ['name' => 'Docker', 'category' => 'DevOps', 'icon' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M13.98 11.28h1.88v1.88h-1.88v-1.88zm-3.08 0h1.88v1.88H10.9v-1.88zm-3.08 0h1.88v1.88H7.82v-1.88zm-3.08 0h1.88v1.88H4.74v-1.88zM15.08 8.28h1.88v1.88h-1.88V8.28zm-3.08 0h1.88v1.88H12V8.28zm-3.08 0h1.88v1.88H8.92V8.28zm-3.08 0h1.88v1.88H5.84V8.28zm11.08 5.08h1.88v1.88h-1.88v-1.88zm-3.08 0h1.88v1.88h-1.88v-1.88zm-3.08 0h1.88v1.88H12v-1.88zm-3.08 0h1.88v1.88H8.92v-1.88z"/></svg>'],
            ['name' => 'Git', 'category' => 'Outils', 'icon' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M23.546 10.93L13.067.452c-.604-.603-1.582-.603-2.188 0L8.708 2.627l2.76 2.76c.645-.215 1.387-.084 1.892.445.505.53.75 1.254.62 1.948-.06.325-.178.636-.35.917 1.263-.17 2.366-.598 3.262-1.248 2.077-1.46 3.22-3.5 3.22-5.665 0-.468-.04-.93-.12-1.377zM9.9 4.09L7.14 1.33 1.354 7.116c-.604.603-.604 1.582 0 2.188l2.76 2.76-2.76 2.76c-.604.603-.604 1.582 0 2.188l5.546 5.546c.604.603 1.582.603 2.188 0l5.546-5.546c.604-.603.604-1.582 0-2.188l-2.76-2.76 2.76-2.76c.604-.603.604-1.582 0-2.188L11.09 4.09c-.603-.604-1.582-.604-2.188 0z"/></svg>'],
            ['name' => 'GitHub', 'category' => 'Outils', 'icon' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78.015-.795 1.125-.015 1.92 1.035 2.19 1.47 1.29 2.175 3.345 1.56 4.17 1.185.135-.93.525-1.56.96-1.92-3.36-.375-6.9-1.68-6.9-7.47 0-1.65.585-3 1.545-4.05-.15-.375-.67-1.89.15-3.93 0 0 1.26-.405 4.125 1.545 1.2-.33 2.47-.495 3.75-.495s2.55.165 3.75.495c2.865-1.95 4.125-1.545 4.125-1.545.82 2.04.3 3.555.15 3.93.96 1.05 1.545 2.4 1.545 4.05 0 5.805-3.555 7.095-6.9 7.47.54.465 1.005 1.365 1.005 2.76 0 1.995-.015 3.6-.015 4.095 0 .42.225.915.84.765C20.565 21.795 24 17.31 24 12c0-6.63-5.37-12-12-12z"/></svg>'],
            ['name' => 'WordPress', 'category' => 'CMS', 'icon' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/></svg>'],
            ['name' => 'Agile', 'category' => 'Méthodologie', 'icon' => '<svg viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="10"/></svg>'],
            ['name' => 'UML', 'category' => 'Méthodologie', 'icon' => '<svg viewBox="0 0 24 24" fill="currentColor"><rect x="3" y="3" width="18" height="18" rx="2"/></svg>'],
            ['name' => 'Linux', 'category' => 'Cloud', 'icon' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M12.002 2C6.48 2 2 6.48 2 12.002 0 18.628 5.374 24 12.002 24 18.628 24 24 18.628 24 12.002 24 5.373 18.628 0 12.002 0zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/></svg>'],
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
