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
        'state.nationality' => 'required|min:3|max:255',
        'state.date_of_birth' => 'required|date',
        'state.address' => 'required|min:3|max:255',
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
            'phone_code' => '',
            'phone' => '',
            'nationality' => '',
            'date_of_birth' => '',
            'address' => '',
        ];

        $this->phoneCodes = [
            '966' => '🇸🇦+966',
        ];
    }

        /**
        * Update the component's state.
        *
        * @return void
        */
        public function update()
        {
            $this->validate();
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
