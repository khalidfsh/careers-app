<?php

namespace App\Http\Livewire\Resume;

use Livewire\Component;
use App\Models\Course as CourseModel;

class Course extends Component
{
    public $state = [];
    public $data = [];
    public $showModalManagerToggle = false;

    protected $rules = [
        'state.title' => 'required|min:3|max:255',
        'state.start_date' => 'nullable|date',
        'state.end_date' => 'nullable|date',
    ];

   

    public function mount()
    {
        $this->state = [
            'title' => '',
            'start_date' => null,
            'end_date' => null,
        ];
        $this->validationAttributes = [
            'state.title' => __('resume.course.title'),
            'state.start_date' => __('resume.start_date'),
            'state.end_date' => __('resume.end_date'),
        ];

        if (auth()->user()->resume) {
            $this->data = auth()->user()->resume->courses->toArray() ?? [];
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
            'start_date' => null,
            'end_date' => null,
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
            $course = CourseModel::find($this->state['id']);
            //abort if resume_id != auth()->id()
            // abort_if($qualification->resume_id != $user_id, 403, 'Unauthorized action.');
            
            $course->update($this->state);
        } else {
            // Otherwise, it's a create operation
            $course = new CourseModel($this->state);
            auth()->user()->resume->courses()->save($course);
        }

        //flash success
        return redirect()->route('resume')->with(['flash.banner' => __('Course saved!')]);
        // $this->showModalManagerToggle = false;
    }

    //delete
    public function delete()
    {
        $course = CourseModel::find($this->state['id']);
        $course->delete();
        //flash success
        return redirect()->route('resume')->with(['flash.banner' => __('Course deleted!')]);
    }

    public function render()
    {
        return view('resume.course');
    }
}
