<?php

namespace App\Http\Livewire\Resume;

use Livewire\Component;
use App\Models\Qualification as QualificationModel;

class Qualification extends Component
{

     /**
     * The component's state.
     *
     * @var array
     */
    public $state = [];
    public $data = [];

    public $showModalManagerToggle = false;

    public $titleTypeOptions = [];

     /**
     * Prepare the component.
     *
     * @return void
     */
    protected $rules = [
        'state.title' => 'required|min:3|max:255',
        'state.degree' => 'required|min:3|max:255',
        'state.institution' => 'required|min:3|max:255',
        'state.start_date' => 'nullable|date',
        'state.end_date' => 'required|date',
        'state.grade' => 'required|numeric',
    ];



    public function mount()
    { 
        $this->titleTypeOptions = [
            '' => __('resume.qualification.select'),
            'high_school' => __('resume.qualification.types.high_school'),
            'diploma' => __('resume.qualification.types.diploma'),
            'bachelor' => __('resume.qualification.types.bachelor'),
            'master' => __('resume.qualification.types.master'),
            'phd' => __('resume.qualification.types.phd'),
        ];
        $this->state = [
            'title' => '',
            'degree' => '',
            'institution' => '',
            'start_date' => null,
            'end_date' => null,
            'grade' => '',
        ];
        $this->validationAttributes = [
            'state.title' => __('resume.qualification.title'),
            'state.degree' => __('resume.qualification.title_type'),
            'state.institution' => __('resume.qualification.institution'),
            'state.start_date' => __('resume.start_date'),
            'state.end_date' => __('resume.end_date'),
            'state.grade' => __('resume.qualification.grade'),
        ];
        // check if user has resume
        if (auth()->user()->resume) {
            // Load the authenticated user's qualifications
            $this->data = auth()->user()->resume->qualifications->toArray() ?? [];
        } else {
            $this->data = [];
        }
        
        // $this->data = [
        //     [
        //         'title' => 'applied science',
        //         'title_type' => 'high_school',
        //         'institution' => 'Hail School',
        //         'start_date' => '2010-01-01',
        //         'end_date' => '2013-01-01',
        //         'grade' => '3.5',
        //     ],
        //     [
        //         'title' => 'Computer Science',
        //         'title_type' => 'bachelor',
        //         'institution' => 'Hail University',
        //         'start_date' => '2013-01-01',
        //         'end_date' => '2017-01-01',
        //         'grade' => '3.5',
        //     ],
        //     [
        //         'title' => 'Computer AI',
        //         'title_type' => 'master',
        //         'institution' => 'Hail University',
        //         'start_date' => '2017-01-01',
        //         'end_date' => '2019-01-01',
        //         'grade' => '3.5',
        //     ],
        //     [
        //         'title' => 'المحرفات الذكية في اللغة العربية',
        //         'title_type' => 'phd',
        //         'institution' => 'Hail University',
        //         'start_date' => '2019-01-01',
        //         'end_date' => '2021-01-01',
        //         'grade' => '3.5',
        //     ]
        // ];
    }
    
    public function showAddModalManager()
    {
        $this->resetErrorBag();
        $this->state = [
            'title' => '',
            'degree' => '',
            'institution' => '',
            'start_date' => null,
            'end_date' => null,
            'grade' => '',
        ];
        $this->showModalManagerToggle = true;
    }
    public function showEditModalManager($index)
    {
        $this->resetErrorBag();
        $this->state = $this->data[$index];
        $this->showModalManagerToggle = true;
    }
    // save
    public function save()
    {
        $user_id = auth()->id();

        $this->validate();
        // add to this->data

        // If the state has an 'id', it's an update operation
        if (isset($this->state['id']) && !empty($this->state['id'])) {
            $qualification = QualificationModel::find($this->state['id']);
            //abort if resume_id != auth()->id()
            abort_if($qualification->resume_id != $user_id, 403, 'Unauthorized action.');

            
            $qualification->update($this->state);
        } else {
            // Otherwise, it's a create operation
            $qualification = new QualificationModel($this->state);
            auth()->user()->resume->qualifications()->save($qualification);
        }

        
        // $this->showModalManagerToggle = false;
        return redirect()->route('resume')->with(['flash.banner' => __('Qualification saved!')]);

    }
    // delete
    public function delete()
    {
        $user_id = auth()->id();
        $qualification = QualificationModel::find($this->state['id']);

        //abort if resume_id != auth()->id()
        abort_if($qualification->resume_id != $user_id, 403, 'Unauthorized action.');

        $qualification->delete();

        return redirect()->route('resume')->with(['flash.banner' => __('Qualification deleted!')]);

        // // Refresh the data
        // $this->data = auth()->user()->resume->qualifications->toArray();
        
    }


    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        //render data
        $this->data = collect($this->data)->sortByDesc('end_date')->values()->all();
        return view('resume.qualification', [
            'data' => $this->data,
        ]);
    }


}