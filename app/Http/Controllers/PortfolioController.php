<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\Project;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Tech;
use App\Models\Skill;
use App\Models\Contact;

class PortfolioController extends Controller
{
    public function index()
    {
        $locale = App::getLocale();
        $translations = include resource_path("lang/{$locale}/portfolio.php");
        
        $projects = Project::all()->map(function ($project) use ($locale) {
            return [
                'id' => $project->id,
                'slug' => $project->slug,
                'title' => $project->title,
                'description' => $locale === 'fr' ? ($project->description_fr ?? $project->description) : ($project->description_en ?? $project->description),
                'role' => $project->role,
                'year' => $project->year,
                'client' => $project->client,
                'category' => $project->category,
                'tech' => is_array($project->tech) ? $project->tech : (json_decode($project->tech, true) ?: []),
                'image' => $project->image_url,
                'link' => $project->link,
            ];
        })->toArray();

        $experience = Experience::all()->map(function ($item) use ($locale) {
            return [
                'year' => $item->year,
                'title' => $locale === 'fr' ? ($item->title_fr ?? $item->title) : ($item->title_en ?? $item->title),
                'company' => $item->company,
                'description' => $locale === 'fr' ? ($item->description_fr ?? $item->description) : ($item->description_en ?? $item->description),
            ];
        })->toArray();

        $education = Education::all()->map(function ($item) use ($locale) {
            return [
                'year' => $item->year,
                'title' => $locale === 'fr' ? ($item->title_fr ?? $item->title) : ($item->title_en ?? $item->title),
                'company' => $item->company,
                'description' => $locale === 'fr' ? ($item->description_fr ?? $item->description) : ($item->description_en ?? $item->description),
                'location' => $item->location,
                'lat' => $item->lat,
                'lng' => $item->lng,
            ];
        })->toArray();

        $techStack = Tech::all()->map(function ($tech) use ($locale) {
            return [
                'name' => $tech->name,
                'category' => $tech->category,
                'icon' => $tech->icon,
            ];
        })->toArray();

        $skills = Skill::all()->map(function ($skill) use ($locale) {
            return $skill->title . ' : ' . $skill->company;
        })->toArray();

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

    public function sendContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        Contact::create($validated);

        return response()->json(['success' => true]);
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
