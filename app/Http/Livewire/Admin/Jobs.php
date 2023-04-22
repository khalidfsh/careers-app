<?php
namespace App\Http\Livewire\Admin;

use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Jobs extends Component
{
    use WithPagination;

    /**
     * Filter and sort options.
     */
    public $sortBy = 'created_at';
    public $sortDirection = 'desc';
    public $perPage = 10;
    public $search = '';
    public $filters = [];
    // public $startDate = now()->toDateString();
    // public $endDate = now()->toDateString();


    /**
     * The component's validation rules.
     *
     * @var array
     */


    /**
     * 
     * The cmponent's dropdown lists
     */
    public $qualificationTypes = [];
    public $categories = [];
    public $jobTypes = [];

    /**
     * The cmponent's mount method.
     * 
     * @return void
     */
    public function mount()
    {
        // assign dropdown lists
        // $this->qualificationTypes = config('lists.qualification_types');
        // $this->categories = config('lists.job_categories');
        // $this->jobTypes = config('lists.job_types');
        // $this->qualificationOptions = config('lists.qualification_types');
        // $this->experienceOptions = array_combine(range(0, 12), range(0, 12));

        // $this->selectedQualifications = [
        //     'high_school' => 1,
        //     'diploma' => 3,
        // ];

        // $this->validationAttributes = [
        //     'state.title' => __('job.title'),
        //     'state.description' => __('job.description'),
        //     'state.qualifications' => __('job.qualifications'),
        //     'state.specializations' => __('job.specializations'),
        //     'state.experience_years_per_qualification' => __('job.experience_years_per_qualification'),
        //     'state.extra_requirements' => __('job.extra_requirements'),
        //     'state.start_date' => __('job.start_date'),
        //     'state.end_date' => __('job.end_date'),
        //     'state.salary' => __('job.salary'),
        //     'state.number_of_positions' => __('job.number_of_positions'),
        //     'state.location' => __('job.location'),
        //     'state.type' => __('job.type'),
        //     'state.category' => __('job.category'),
        // ];
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

    /*********************************************** */
    /*************** Job Manager Modal ***************/
    /*********************************************** */

    /**
    //  * Show the create job modal.
    //  *
    //  * @return void
    //  */
    // public function showCreateModal()
    // {
    //     // $this->reset(['state']);
    //     $this->showManagerModal = true;
    // }
    // /**
    //  * Show the edit job modal.
    //  *
    //  * @param  \App\Models\Job  $job
    //  * @return void
    //  */
    // public function showEditModal(Job $job)
    // {
    //     $this->state = $job;
    //     $this->showManagerModal = true;
    // }

    // // TODO: implement the excel import feature
    // /**
    //  * Import jobs from an excel file.
    //  *
    //  * @return void
    //  */
    // public function import()
    // {
    //     $this->validate([
    //         'import_file' => 'required|mimes:xlsx,xls,csv',
    //     ]);
    //     $file = $this->import_file->store('temp');
    //     $this->import_file = null;
    //     $this->dispatchBrowserEvent('imported', ['file' => $file]);
    // }
    // //TODO: implement the excel export feature
    // /**
    //  * Export jobs to an excel file.
    //  *
    //  * @return void
    //  */
    // public function export()
    // {
    //     $this->dispatchBrowserEvent('exported');
    // }


    /*********************************************** */
    /********* Qualification Experience Pairs ********/
    /*********************************************** */

    /**
     * toggle the qualification dropdown.
     * 
     * @return void
     */
    // public function toggleQualificationDropdown()
    // {
    //     $this->showQualificationDropdown = !$this->showQualificationDropdown;
    // }
    /**
     * Show the experience years for the hovered qualification.
     *
     * @param  string  $qualification
     * @return void
     */
    // public function showQualificExperienceYears($qualification)
    // {
    //     $this->hoveredQualification = $qualification;
    // }
    /**
     * Update the qualification experience pair.
     *
     * @param  string  $qualification
     * @param  int  $experienceYears
     * @return void
     */
    // public function saveQualificExperiencePair($qualification, $experienceYears)
    // {
    //     $this->qualificationExperiencePairs[$qualification] = $experienceYears;
    //     $this->showQualificationDropdown = false;
    //     $this->hoveredQualification = null;
    // }


    /*********************************************** */
    /****************** Job Manager *****************/
    /*********************************************** */

    /**
     * Save the job (create, update).
     *
     * @return void
     */
    // public function save()
    // {
    //     dd($this->state);
    //     // abort_unless(Auth::user()->is_admin, 403);

    //     $user_id = Auth::id(); // or use $user_id = auth()->id();

    //     // Validate the data
    //     $validatedData = $this->validate($this->rules);

    //     // Convert the qualifications and experience_years_per_qualification to JSON
    //     // so that we can store them in the database
    //     $validatedData['qualifications'] = json_encode(array_keys($this->qualificationExperiencePairs));
    //     $validatedData['experience_years_per_qualification'] = json_encode($this->qualificationExperiencePairs);

    //     // Check if the job already exists (i.e., it's an update)
    //     if (isset($this->state->id)) {
    //         // Set the last_modifier_user_id for the job
    //         $this->state->last_modifier_user_id = $user_id;
    //     } else {
    //         // This is a new job, so set the creator_user_id
    //         $this->state->creator_user_id = $user_id;
    //     }

    //     // Save the job using the save() method
    //     $this->state->save();

    //     // Display a success message
    //     $message = isset($this->state->id) ? __('Job updated') : __('Job saved');
    //     $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => $message]);

    // Close the modal
    //     $this->showManagerModal = false;
    // }

    /**
     * clear the job manager modal.
     * 
     * @return void
     */
    // public function clear()
    // {
    //     $this->reset(['state', 'showManagerModal', 'qualificationExperiencePairs']);
    // }


    /*********************************************** */
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
                ->orWhere('location', 'like', '%' . $this->search . '%')
                ->orWhere('type', 'like', '%' . $this->search . '%');


        })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);

        return view('admin.jobs.dashboard', [
            'jobs' => $jobs,
        ]);

    }
}