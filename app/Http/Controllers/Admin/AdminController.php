<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Tech;
use App\Models\Skill;
use App\Models\Contact;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'projects' => Project::count(),
            'experiences' => Experience::count(),
            'education' => Education::count(),
            'techs' => Tech::count(),
            'skills' => Skill::count(),
            'contacts' => Contact::count(),
            'unread_contacts' => Contact::where('is_read', false)->count(),
        ];

        $recentContacts = Contact::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentContacts'));
    }

    public function loginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }

    // Projects CRUD
    public function projects()
    {
        $projects = Project::latest()->paginate(10);
        return view('admin.projects', compact('projects'));
    }

    public function createProject()
    {
        return view('admin.projects_form', ['project' => new Project()]);
    }

    public function storeProject(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description_fr' => 'required|string',
            'description_en' => 'required|string',
            'role' => 'required|string|max:255',
            'year' => 'required|string|max:20',
            'client' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
            'tech' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'link' => 'nullable|url|max:2048',
            'slug' => 'required|string|max:255|unique:projects,slug',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        $validated['tech'] = explode(',', $validated['tech']);
        $validated['tech'] = json_encode(array_map('trim', $validated['tech']));
        $validated['description'] = $validated['description_fr'];

        Project::create($validated);

        return redirect()->route('admin.projects')->with('success', 'Project created successfully.');
    }

    public function editProject(Project $project)
    {
        return view('admin.projects_form', compact('project'));
    }

    public function updateProject(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description_fr' => 'required|string',
            'description_en' => 'required|string',
            'role' => 'required|string|max:255',
            'year' => 'required|string|max:20',
            'client' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
            'tech' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:8048',
            'link' => 'nullable|url|max:2048',
            'slug' => 'required|string|max:255|unique:projects,slug,' . $project->id,
        ]);

        if ($request->hasFile('image')) {
            $oldImage = $project->image;
            $validated['image'] = $request->file('image')->store('projects', 'public');

            if ($oldImage && str_starts_with($oldImage, 'projects/')) {
                Storage::disk('public')->delete($oldImage);
            }
        }

        $validated['tech'] = explode(',', $validated['tech']);
        $validated['tech'] = json_encode(array_map('trim', $validated['tech']));
        $validated['description'] = $validated['description_fr'];

        $project->update($validated);

        return redirect()->route('admin.projects')->with('success', 'Project updated successfully.');
    }

    public function destroyProject(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects')->with('success', 'Project deleted successfully.');
    }

    // Experiences CRUD
    public function experiences()
    {
        $experiences = Experience::latest()->paginate(10);
        return view('admin.experiences', compact('experiences'));
    }

    public function createExperience()
    {
        return view('admin.experiences_form', ['experience' => new Experience()]);
    }

    public function storeExperience(Request $request)
    {
        $validated = $request->validate([
            'year' => 'required|string|max:50',
            'title_fr' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'description_fr' => 'nullable|string',
            'description_en' => 'nullable|string',
        ]);

        $validated['title'] = $validated['title_fr'];
        $validated['description'] = $validated['description_fr'];

        Experience::create($validated);

        return redirect()->route('admin.experiences')->with('success', 'Experience created successfully.');
    }

    public function editExperience(Experience $experience)
    {
        return view('admin.experiences_form', compact('experience'));
    }

    public function updateExperience(Request $request, Experience $experience)
    {
        $validated = $request->validate([
            'year' => 'required|string|max:50',
            'title_fr' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'description_fr' => 'nullable|string',
            'description_en' => 'nullable|string',
        ]);

        $validated['title'] = $validated['title_fr'];
        $validated['description'] = $validated['description_fr'];

        $experience->update($validated);

        return redirect()->route('admin.experiences')->with('success', 'Experience updated successfully.');
    }

    public function destroyExperience(Experience $experience)
    {
        $experience->delete();

        return redirect()->route('admin.experiences')->with('success', 'Experience deleted successfully.');
    }

    // Education CRUD
    public function education()
    {
        $education = Education::latest()->paginate(10);
        return view('admin.education', compact('education'));
    }

    public function createEducation()
    {
        return view('admin.education_form', ['education' => new Education()]);
    }

    public function storeEducation(Request $request)
    {
        $validated = $request->validate([
            'year' => 'required|string|max:50',
            'title_fr' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'description_fr' => 'nullable|string',
            'description_en' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'lat' => 'nullable|numeric',
            'lng' => 'nullable|numeric',
        ]);

        $validated['title'] = $validated['title_fr'];
        $validated['description'] = $validated['description_fr'];

        Education::create($validated);

        return redirect()->route('admin.education')->with('success', 'Education created successfully.');
    }

    public function editEducation(Education $education)
    {
        return view('admin.education_form', compact('education'));
    }

    public function updateEducation(Request $request, Education $education)
    {
        $validated = $request->validate([
            'year' => 'required|string|max:50',
            'title_fr' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'description_fr' => 'nullable|string',
            'description_en' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'lat' => 'nullable|numeric',
            'lng' => 'nullable|numeric',
        ]);

        $validated['title'] = $validated['title_fr'];
        $validated['description'] = $validated['description_fr'];

        $education->update($validated);

        return redirect()->route('admin.education')->with('success', 'Education updated successfully.');
    }

    public function destroyEducation(Education $education)
    {
        $education->delete();

        return redirect()->route('admin.education')->with('success', 'Education deleted successfully.');
    }

    // Tech CRUD
    public function tech()
    {
        $techs = Tech::latest()->paginate(10);
        return view('admin.tech', compact('techs'));
    }

    public function createTech()
    {
        return view('admin.tech_form', ['tech' => new Tech()]);
    }

    public function storeTech(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:100',
            'category' => 'required|string|max:255',
            'icon' => 'nullable|string',
        ]);

        Tech::create($validated);

        return redirect()->route('admin.tech')->with('success', 'Technology created successfully.');
    }

    public function editTech(Tech $tech)
    {
        return view('admin.tech_form', compact('tech'));
    }

    public function updateTech(Request $request, Tech $tech)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:100',
            'category' => 'required|string|max:255',
            'icon' => 'nullable|string',
        ]);

        $tech->update($validated);

        return redirect()->route('admin.tech')->with('success', 'Technology updated successfully.');
    }

    public function destroyTech(Tech $tech)
    {
        $tech->delete();

        return redirect()->route('admin.tech')->with('success', 'Technology deleted successfully.');
    }

    // Contacts
    public function contacts()
    {
        $contacts = Contact::latest()->paginate(20);
        return view('admin.contacts', compact('contacts'));
    }

    // Skills CRUD
    public function skills()
    {
        $skills = Skill::orderBy('id')->paginate(20);
        return view('admin.skills', compact('skills'));
    }

    public function createSkill()
    {
        return view('admin.skills_form', ['skill' => new Skill()]);
    }

    public function storeSkill(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'title_fr' => 'nullable|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'description_fr' => 'nullable|string',
            'description_en' => 'nullable|string',
        ]);

        $validated['title_fr'] = $validated['title_fr'] ?: $validated['title'];
        $validated['title_en'] = $validated['title_en'] ?: $validated['title'];
        $validated['description'] = $validated['description_fr'];

        Skill::create($validated);

        return redirect()->route('admin.skills')->with('success', 'Skill created successfully.');
    }

    public function editSkill(Skill $skill)
    {
        return view('admin.skills_form', compact('skill'));
    }

    public function updateSkill(Request $request, Skill $skill)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'title_fr' => 'nullable|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'description_fr' => 'nullable|string',
            'description_en' => 'nullable|string',
        ]);

        $validated['title_fr'] = $validated['title_fr'] ?: $validated['title'];
        $validated['title_en'] = $validated['title_en'] ?: $validated['title'];
        $validated['description'] = $validated['description_fr'];

        $skill->update($validated);

        return redirect()->route('admin.skills')->with('success', 'Skill updated successfully.');
    }

    public function destroySkill(Skill $skill)
    {
        $skill->delete();

        return redirect()->route('admin.skills')->with('success', 'Skill deleted successfully.');
    }

    public function markContactAsRead(Contact $contact)
    {
        if (! $contact->is_read) {
            $contact->update(['is_read' => true]);
        }

        if (request()->expectsJson()) {
            return response()->json(['success' => true]);
        }

        return redirect()->route('admin.contacts')->with('success', 'Message marked as read.');
    }

    public function destroyContact(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('admin.contacts')->with('success', 'Contact deleted successfully.');
    }
}

