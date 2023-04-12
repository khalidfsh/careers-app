<?php

namespace App\Http\Livewire\Resume;

use Livewire\Component;

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

    public $titleTypes = [];

     /**
     * Prepare the component.
     *
     * @return void
     */
    protected $rules = [
        'state.title' => 'required|min:3|max:255',
        'state.title_type' => 'required|min:3|max:255',
        'state.institution' => 'required|min:3|max:255',
        'state.start_date' => 'nullable|date',
        'state.end_date' => 'required|date',
        'state.grade' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
    ];



    public function mount()
    { 
        $this->titleTypes = [
            'select' => __('resume.qualification.select'),
            'high_school' => __('resume.qualification.types.high_school'),
            'diploma' => __('resume.qualification.types.diploma'),
            'bachelor' => __('resume.qualification.types.bachelor'),
            'master' => __('resume.qualification.types.master'),
            'phd' => __('resume.qualification.types.phd'),
        ];
        $this->state = [
            'title' => '',
            'title_type' => '',
            'institution' => '',
            'start_date' => '',
            'end_date' => '',
            'grade' => '',
        ];
        $this->validationAttributes = [
            'state.title' => __('resume.qualification.title'),
            'state.title_type' => __('resume.qualification.title_type'),
            'state.institution' => __('resume.qualification.institution'),
            'state.start_date' => __('resume.qualification.start_date'),
            'state.end_date' => __('resume.qualification.end_date'),
            'state.grade' => __('resume.qualification.grade'),
        ];
        $this->data = [
            [
                'title' => 'applied science',
                'title_type' => 'high_school',
                'institution' => 'Hail School',
                'start_date' => '2010-01-01',
                'end_date' => '2013-01-01',
                'grade' => '3.5',
            ],
            [
                'title' => 'Computer Science',
                'title_type' => 'bachelor',
                'institution' => 'Hail University',
                'start_date' => '2013-01-01',
                'end_date' => '2017-01-01',
                'grade' => '3.5',
            ],
            [
                'title' => 'Computer AI',
                'title_type' => 'master',
                'institution' => 'Hail University',
                'start_date' => '2017-01-01',
                'end_date' => '2019-01-01',
                'grade' => '3.5',
            ],
            [
                'title' => 'المحرفات الذكية في اللغة العربية',
                'title_type' => 'phd',
                'institution' => 'Hail University',
                'start_date' => '2019-01-01',
                'end_date' => '2021-01-01',
                'grade' => '3.5',
            ]
        ];
    }
    
    public function showModalManager()
    {
        $this->showModalManagerToggle = true;
    }
    // save
    public function save()
    {
        $validatedData = $this->validate($this->rules);
        // add to this->data

        $this->data[] = $validatedData['state'];
        // print data
        // dd($this->data);

        
        $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => __('Saved!')]);
        $this->showModalManagerToggle = false;
        // return redirect()->route('user-resume');
    }
    // delete
    public function delete($index)
    {
        unset($this->data[$index]);
        $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => __('Deleted!')]);
        
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