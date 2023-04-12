<?php

namespace App\Http\Livewire;

use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class JobManagement extends Component
{

    /**
     * The component's state.
     *
     * @var array
     */
    public $state = [];

    public $updating = false;

    public $validatedData;
    public $jobId;
    public $title;
    public $description;
    public $number_of_positions;
    public $qualification;
    public $required_specializations;
    public $required_experience_years;
    public $requirements;

    public function render()
    {
        return view('livewire.job-management');
    }

    public function mount($jobId = null)
    {
        if ($jobId) {
            $job = Job::findOrFail($jobId);
            $this->updating = true;

            $this->jobId = $job->id;
            $this->title = $job->title;
            $this->description = $job->description;
            $this->number_of_positions = $job->number_of_positions;
            $this->qualification = $job->qualification;
            $this->required_specializations = $job->required_specializations;
            $this->required_experience_years = $job->required_experience_years;
            $this->requirements = $job->requirements;
        }
    }

    public function submit()
    {
        $this->resetErrorBag();

        $validatedData = $this->validate([
            'state.title' => 'required|min:3|max:255',
            'state.description' => 'required|min:3',
            'state.number_of_positions' => 'required|integer|min:1',
            'state.qualification' => 'required|min:3|max:255',
            'state.required_specializations' => 'required|min:3|max:255',
            'state.required_experience_years' => 'required|integer|min:0',
            'state.requirements' => 'required|min:3',

            // 'state.location' => 'required|min:2|max:255',
            // 'state.salary' => 'required|numeric|min:0',
            // 'state.type' => 'required|in:full-time,part-time,contract',
            // 'state.category' => 'required|exists:categories,id',
            // 'state.start_date' => 'required|date|after_or_equal:today',
            // 'state.end_date' => 'nullable|date|after_or_equal:state.start_date',
        ]);

        $this->state['user_id'] = Auth::id();

        if ($this->updating) {
            $job = Job::findOrFail($this->jobId);
            $job->update($this->state);
        } else {
            Job::create($this->state);
        }

        session()->flash('message', $this->updating ? 'Job updated successfully.' : 'Job created successfully.');

        if ($this->updating) {
            return redirect()->route('job', $this->jobId);
        } else {
            return redirect()->route('jobs');
        }
    }
}