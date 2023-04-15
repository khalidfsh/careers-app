<?php

namespace App\Http\Livewire\Admin;

use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Jobs extends Component
{
    use WithPagination;

    public $sortBy = 'created_at';
    public $sortDirection = 'desc';
    public $perPage = 10;
    public $search = '';
    public $filters = [];
    public $titleTypes = [];
    // public $startDate = now()->toDateString();
    // public $endDate = now()->toDateString();

    public $state;

    public $showModalManagerToggle = false;

    protected $rules = [
        'state.title' => 'required|min:3|max:255',
        'state.description' => 'required|min:3',
        'state.number_of_positions' => 'required|integer|min:1',
        'state.qualification' => 'required|min:3',
        'state.required_specializations' => 'required|min:3',
        'state.required_experience_years' => 'required|integer|min:0',
        'state.requirements' => 'required|min:3',

        // 'state.location' => 'required|min:2|max:255',
        // 'state.salary' => 'required|numeric|min:0',
        // 'state.type' => 'required|in:full-time,part-time,contract',
        // 'state.category' => 'required|exists:categories,id',
        // 'state.start_date' => 'required|date|after_or_equal:today',
        // 'state.end_date' => 'nullable|date|after_or_equal:state.start_date',
    ];

    public function mount()
    {
        // $this->validationAttributes = [
        //     'job.title' => __('job.title'),
        //     'job.description' => __('job.description'),
        //     'job.number_of_positions' => __('job.number_of_positions'),
        //     'job.qualification' => __('job.qualification'),
        //     'job.required_specializations' => __('job.required_specializations'),
        //     'job.required_experience_years' => __('job.required_experience_years'),
        //     'job.requirements' => __('job.requirements'),
        // ];
        $this->titleTypes = [
            'select' => __('resume.qualification.select'),
            'high_school' => __('resume.qualification.types.high_school'),
            'diploma' => __('resume.qualification.types.diploma'),
            'bachelor' => __('resume.qualification.types.bachelor'),
            'master' => __('resume.qualification.types.master'),
            'phd' => __('resume.qualification.types.phd'),
        ];
        $this->validationAttributes = [
            'state.title' => __('job.title'),
            'state.description' => __('job.description'),
            'state.number_of_positions' => __('job.number_of_positions'),
            'state.qualification' => __('job.qualification'),
            'state.required_specializations' => __('job.required_specializations'),
            'state.required_experience_years' => __('job.required_experience_years'),
            'state.requirements' => __('job.requirements'),
        ];
    }

    

    public function updatingQueryParams()
    {
        $this->resetPage();
    }
    public function sortBy($field)
    {

        if ($field == $this->sortBy) {
            $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
        }
        $this->sortBy = $field;
    }

    public function showCreateModalManager()
    {
        // $this->reset(['state']);
        $this->showModalManagerToggle = true;
    }

    public function showEditModalManager(Job $job)
    {
        $this->state = $job;
        $this->showModalManagerToggle = true;
    }


    public function save()
    {
        $user_id = Auth::id(); // or use $user_id = auth()->id();
        // abort_unless(Auth::user()->is_admin, 403);
        
        if (isset($this->state->id)) {
            $validatedData = $this->validate($this->rules);
            // unset($this->job['']);
            $this->state->save();
            $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => __('Job updated')]);

        } else {
            $validatedData = $this->validate($this->rules);
            $validatedData['state']['user_id'] = Auth::user()->id;
            // $validatedData['slug'] = str_slug($validatedData['title']);
            // $validatedData['status'] = 'active';
            // $validatedData['start_date'] = now()->toDateString();
            // $validatedData['end_date'] = now()->addDays(30)->toDateString();
            //save 
            Job::create($validatedData['state']);
            //create 
            $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => __('Job saved')]);

        }

        $this->showModalManagerToggle = false;
    }


    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $jobs = Job::when($this->search, function ($query) {
            $query->where('title', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%')
                ->orWhere('qualification', 'like', '%' . $this->search . '%')
                ->orWhere('required_specializations', 'like', '%' . $this->search . '%')
                ->orWhere('requirements', 'like', '%' . $this->search . '%');

        })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);

        return view('admin.jobs.dashboard', [
            'jobs' => $jobs,
        ]);

    }
}
