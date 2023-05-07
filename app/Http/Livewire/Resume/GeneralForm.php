<?php

namespace App\Http\Livewire\Resume;

use Livewire\Component;
use App\Models\Resume;

class GeneralForm extends Component
{

    /**
     * The component's state.
     *
     * @var array
     */
    public $state = [];
    public $address = '';

    /**
     * Prepare the component.
     *
     * @return void
     */
    protected $rules = [
        'state.full_name' => 'required|min:3|max:255',
        'state.national_id' => 'required|digits_between:10,12',
        'state.phone' => 'required|digits:9',
        'state.phone_code' => 'required|digits_between:1,5',
        'state.is_saudi' => 'required|boolean',
        'state.nationality' => 'nullable|min:3|max:255',
        'state.is_single' => 'required|boolean',
        'state.is_male' => 'required|boolean',
        'state.birth_date' => 'required|date',

        'address' => 'required|string|min:3|max:255',
    ];


    /**
     * Mount the component.
     *
     * @return void
     */
    public function mount()
    {
        $this->validationAttributes = [
            'state.full_name' => __('resume.full_name'),
            'state.national_id' => __('resume.national_id'),
            'state.phone' => __('resume.phone'),
            'state.phone_code' => __('resume.phone_code'),
            'state.is_saudi' => __('resume.nationality'),
            'state.is_male' => __('resume.gender'),
            'state.is_single' => __('resume.is_single'),
            'state.birth_date' => __('resume.date_of_birth'),
            'address' => __('resume.address'),
        ];

        // $this->phoneCodes = [
        //     '966' => '🇸🇦 +966',
        // ];
        // $this->isSaudiOptions = [
        //     1 => __("Saudi"),
        //     0 => __("None Saudi"),
        // ];
        // $this->isMaleOptions = [
        //     1 => __("Male"),
        //     0 => __("Female")
        // ];
        // $this->isSingleOptions = [
        //     1 => __("Single"),
        //     0 => __("Married")
        // ];

        // if user has resume
        if (auth()->user()->resume) {
            $this->state = auth()->user()->resume->toArray();
            $this->address = implode(', ', json_decode($this->state['address']));
        } else {
            // starter
            $this->state = [
                'full_name' => '',
                'phone_code' => '966',
                'phone' => '',
                'is_saudi' => 1,
                'nationality' => '',
                'is_male' => 1,
                'is_single' => 1,
                'birth_date' => '',
                'address' => '',
            ];
        }
    }

    /**
     * Update the component's state.
     *
     * @return void
     */
    public function save()
    {
        $this->validate();

        // $this->state['user_id'] = auth()->id();
        $this->state['address'] = json_encode(preg_split('/\s*(,|،)\s*/', $this->address, -1, PREG_SPLIT_NO_EMPTY));

        // Retrieve the authenticated user's resume, or create a new one if it doesn't exist
        $resume = Resume::firstOrNew(['user_id' => auth()->id()]);

        // Update the resume with the new data
        $resume->fill($this->state);

        // Set the relationship between the User and the Resume using associate method only for new resumes
        if (!$resume->exists) {
            $resume->user()->associate(auth()->user());
        }

        // Save the resume
        $resume->save();
        // emit saved
        $this->emit('saved');
        // return redirect()->route('resume');
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