<?php

namespace App\Http\Livewire\Resume;

use Livewire\Component;

class GeneralForm extends Component
{

     /**
     * The component's state.
     *
     * @var array
     */
    public $state = [];

     /**
     * Prepare the component.
     *
     * @return void
     */
    protected $rules = [
        'state.full_name' => 'required|min:3|max:255',
        'state.phone' => 'required|min:3|max:255',
        'state.phone_code' => 'required|min:3|max:255',
        'state.is_married' => 'required|boolean',
        'state.gender' => 'required|in:male,female',
        'state.nationality' => 'required|min:3|max:255',
        'state.date_of_birth' => 'required|date',
        'state.address' => 'required|min:1|max:10',
    ];


    /**
     * Mount the component.
     *
     * @return void
     */
    public function mount()
    {
        $this->state = [
            'full_name' => '',
            'phone_code' => '966',
            'phone' => '',
            'nationality' => 'saudi',
            'gender' => 'male',
            'is_married' => false,
            'date_of_birth' => '',
            'address' => '',
        ];

        $this->validationAttributes = [
            'state.full_name' => __('resume.full_name'),
            'state.phone' => __('resume.phone'),
            'state.phone_code' => __('resume.phone_code'),
            'state.nationality' => __('resume.nationality'),
            'gender' => __('resume.gender'),
            'is_married' => __('resume.is_married'),
            'state.date_of_birth' => __('resume.date_of_birth'),
            'state.address' => __('resume.address'),
        ];

        $this->phoneCodes = [
            '966' => '🇸🇦 +966',
        ];
        $this->nationalities = [
            'saudi' => __("Saudi"),
            'non-saudi' => __("None Saudi"),
        ];
        $this->genders = [
            'male' => __("Male"),
            'female' => _("Female")
        ];
        $this->isMarried = [
            false => __("Single"),
            true => _("Married")
        ];
    }

    /**
    * Update the component's state.
    *
    * @return void
    */
    public function save()
    {
        // dd($this->state);
        $this->validate($this->rules);
        dd($this->state);
        $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => __('Resume updated!')]);

        // return redirect()->route('resume.dashboard');
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {

        return view('resume.general-form');
    }


}
