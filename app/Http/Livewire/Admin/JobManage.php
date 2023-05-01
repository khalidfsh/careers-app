<?php
namespace App\Http\Livewire\Admin;

use App\Models\Job;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class JobManage extends Component
{

    /**
     * The job component's state.
     *
     * @var array
     */
    public $state = [];
    public $jobId = null;
    public $isNew = true;

    public $qualifications = [];
    public $specializations = '';
    public $requirements = '';
    // every qualification has an experience value associated with it
    public $experiencePerQualifications = [];


    /**
     * 
     * The cmponent's dropdown lists
     */
    public $qualificationOptions = [];
    public $categoryOptions = [];
    public $jobTypeOptions = [];


    protected $rules = [
        'state.title' => 'required|string|min:3|max:255',
        'state.description' => 'required|string|min:3',
        'state.start_date' => 'required|date',
        'state.end_date' => 'required|date',
        'state.salary' => 'nullable|integer',
        'state.number_of_positions' => 'nullable|integer',
        'state.location' => 'nullable|string',
        'state.type' => 'nullable|string|in:full_time,part_time,remote,internship,volunteer',
        'state.category' => 'nullable|string',

        'qualifications' => 'required|array',
        'specializations' => 'required|string',
        'requirements' => 'nullable|string',


    ];

    /**
     * The cmponent's mount method.
     * 
     * @return void
     */
    public function mount()
    {
        $this->validationAttributes = [
            'state.title' => __('job.title'),
            'state.description' => __('job.description'),
            'state.qualifications' => __('job.qualifications'),
            'state.specializations' => __('job.specializations'),
            'state.experience_years_per_qualification' => __('job.experience_years'),
            'state.extra_requirements' => __('job.extra_requirements'),
            'state.start_date' => __('job.start_date'),
            'state.end_date' => __('job.end_date'),
            'state.salary' => __('job.salary'),
            'state.number_of_positions' => __('job.number_of_positions'),
            'state.location' => __('job.location'),
            'state.type' => __('job.type'),
            'state.category' => __('job.category'),

            'specializations' => __('job.specializations'),
            'qualifications' => __('job.qualifications'),
        ];

        // assign dropdown lists
        // load config('lists.qualification_types') and add Choose option...

        $this->qualificationOptions = config('lists.qualification_types');
        $this->categoryOptions = array_merge(['' => __('Choose')], config('lists.job_categories'));
        $this->jobTypeOptions = array_merge(['' => __('Choose')], config('lists.job_types'));



        // if we are editing a job, load the job's data
        if (isset($this->jobId)) {
            $this->state = Job::find($this->jobId);
            $this->qualifications = json_decode($this->state['qualifications']);
            $this->experiencePerQualifications = json_decode($this->state['experience_years_per_qualification'], true);
            $this->specializations = implode(', ', json_decode($this->state['specializations']));
            $this->requirements =  implode(', ', json_decode($this->state['extra_requirements']));
            $this->isNew = false;
        } else {
            $this->isNew = true;
            $this->qualifications = [
                'diploma',
            ];
            $this->experiencePerQualifications = [
                'diploma' => 0,
            ];
            foreach ($this->qualifications as $qualification) {
                $this->experiencePerQualifications[$qualification] = 0;
            }

        }
    }

    public function clearFields()
    {
        redirect()->route('admin.jobs.manage');
    }


    /**
     * Save the job (create, update).
     *
     * @return void
     */
    public function save()
    {
        // dd($this->state);
        // abort_unless(Auth::user()->is_admin, 403);

        $user_id = Auth::id(); // or use $user_id = auth()->id();

        // Validate the data


        // Convert the qualifications and experience_years_per_qualification to JSON
        // so that we can store them in the database
        $this->state['qualifications'] = json_encode(array_values($this->qualifications));
        $this->state['experience_years_per_qualification'] = json_encode($this->experiencePerQualifications);

        // The regular expression pattern to match both ',' and '،' as delimiters
        $this->state['specializations'] = json_encode(preg_split('/\s*(,|،)\s*/', $this->specializations, -1, PREG_SPLIT_NO_EMPTY));
        $this->state['extra_requirements'] = json_encode(preg_split('/\s*(,|،)\s*/', $this->requirements, -1, PREG_SPLIT_NO_EMPTY));
        // Assign the validated data to the job's state
        // $this->state = array_merge($this->state, $validatedData);
        // dd($this->state);

        $this->validate();
        // $validatedData = $this->validate($this->rules);


        // Check if the job already exists (i.e., it's an update)
        if (isset($this->state->id)) {
            // Set the last_modifier_user_id for the job
            $this->state['last_modifier_user_id'] = $user_id;
            $this->state->save();

        } else {
            // This is a new job, so set the creator_user_id
            $this->state['creator_user_id'] = $user_id;
            $this->state['last_modifier_user_id'] = $user_id;

            // dd($this->state);
            $this->state = Job::create($this->state);

        }

        // dd($this->state);
        // Display a success message
        $message = isset($this->state->id) ? __('Job updated') : __('Job saved');
        // flash Success
        session()->flash('message', 'Job saved successfully.');
        $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => $message]);

        // redirct to job
        return redirect()->route('jobs.show', $this->state);
    }

    /**
     * updated method for the qualifications property.
     * triggered when the qualifications property is updated
     *
     * @var array
     */
    public function updatedQualifications($qualifications)
    {
        $exPerQ = [];
        foreach ($this->qualifications as $qualification) {
            $exPerQ[$qualification] = $this->experiencePerQualifications[$qualification] ?? 0;
        }
        $this->experiencePerQualifications = $exPerQ;
    }


    /*********************************************** */
    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {

        return view('admin.job.manage');

    }
}