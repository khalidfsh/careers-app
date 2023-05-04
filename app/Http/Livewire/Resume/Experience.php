<?php

namespace App\Http\Livewire\Resume;

use Livewire\Component;
use App\Models\Experience as ExperienceModel;

class Experience extends Component
{
    public $state = [];
    public $data = [];
    public $showModalManagerToggle = false;

    protected $rules = [
        'state.title' => 'required|min:3|max:255',
        'state.company' => 'required|min:3|max:255',
        'state.description' => 'nullable|min:3|max:1000',
        'state.start_date' => 'nullable|date',
        'state.end_date' => 'nullable|date',
        'state.is_current' => 'boolean',
    ];

   

    public function mount()
    {
        $this->state = [
            'title' => '',
            'company' => '',
            'description' => '',
            'start_date' => null,
            'end_date' => null,
            'is_current' => false,
        ];
        $this->validationAttributes = [
            'state.title' => __('resume.experience.title'),
            'state.company' => __('resume.experience.company'),
            'state.description' => __('resume.description'),
            'state.start_date' => __('resume.start_date'),
            'state.end_date' => __('resume.end_date'),
            'state.is_current' => __('resume.experience.is_current'),
        ];

        if (auth()->user()->resume) {
            $this->data = auth()->user()->resume->experiences->toArray() ?? [];
        } else {
            $this->data = [];
        }
    }

    public function showAddModalManager()
    {
        if (!auth()->user()->resume) {
            return redirect()->route('resume')->with(['flash.banner' => __('Fill out your general information first.'), 'flash.bannerStyle' => 'danger']);
        }
        $this->resetValidation();
        $this->resetErrorBag();
        $this->state = [
            'title' => '',
            'company' => '',
            'description' => '',
            'start_date' => null,
            'end_date' => null,
            'is_current' => false,
        ];

        $this->showModalManagerToggle = true;
    }

    public function showEditModalManager($index)
    {
        $this->resetValidation();
        $this->resetErrorBag();
        $this->state = $this->data[$index];
        $this->showModalManagerToggle = true;
    }
    public function save()
    {
        $this->validate();

        // If the state has an 'id', it's an update operation
        if (isset($this->state['id']) && !empty($this->state['id'])) {
            $experience = ExperienceModel::find($this->state['id']);
            //abort if resume_id != auth()->id()
            // abort_if($qualification->resume_id != $user_id, 403, 'Unauthorized action.');
            
            $experience->update($this->state);
        } else {
            // Otherwise, it's a create operation
            $experience = new ExperienceModel($this->state);
            auth()->user()->resume->qualifications()->save($experience);
        }

        //flash success
        return redirect()->route('resume')->with(['flash.banner' => __('Experience saved!')]);
        // $this->showModalManagerToggle = false;
    }

    //delete
    public function delete()
    {
        $experience = ExperienceModel::find($this->state['id']);
        $experience->delete();
        //flash success
        return redirect()->route('resume')->with(['flash.banner' => __('Experience deleted!')]);
    }

    public function render()
    {
        return view('resume.experience');
    }
}
