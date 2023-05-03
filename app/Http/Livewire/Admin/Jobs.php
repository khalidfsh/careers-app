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
    public $search = '';
    public $sortBy = 'created_at';
    public $sortAsc = true;
    public $perPage = 10;
    public $onlyActive = true;
    // public $startDate = now()->toDateString();
    // public $endDate = now()->toDateString();

    public $catagory = '';
    public $qualification = '';
    public $jobType = '';



    /**
     * The component's validation rules.
     *
     * @var array
     */


    /**
     * 
     * The cmponent's dropdown lists
     */
    public $categoryOptions = [];
    public $qualificationOptions;

    public $jobTypeOptions = [];


    /**
     * The cmponent's mount method.
     * 
     * @return void
     */
    public function mount()
    {
        $this->categoryOptions = array_merge(['' => __('Select Department...')], config('lists.job_categories'));
        $this->qualificationOptions = array_merge(['' => __('Select Qualification...')], config('lists.qualification_types'));
        $this->jobTypeOptions = array_merge(['' => __('Select Type...')], config('lists.job_types'));


    }

    public function sortBy($field)
    {
        if ($field == $this->sortBy) {
            $this->sortAsc = !$this->sortAsc;
        }
        $this->sortBy = $field;
    }

    // public function updatingSearch()
    // {
    //     $this->resetPage();
    // }




    /*********************************************** */
    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $jobs = Job::when($this->onlyActive, function ($query) {
            return $query->whereDate('start_date', '<=', now())
                ->whereDate('end_date', '>=', now());
        })->when($this->catagory, function ($query) {
            return $query->where('category', $this->catagory);
        })->when($this->qualification, function ($query) {
            return $query->whereJsonContains('qualifications', $this->qualification);
        })->when($this->jobType, function ($query) {
            return $query->where('type', 'like', $this->jobType);
        })->when($this->search, function ($query) {
            return $query->where('title', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%')
                ->orWhere('location', 'like', '%' . $this->search . '%')
                ->orWhere('type', 'like', '%' . $this->search . '%');

        })->orderBy($this->sortBy, $this->sortAsc ? 'ASC' : 'DESC')->paginate($this->perPage);

        return view('admin.jobs.dashboard', [
            'jobs' => $jobs,
        ]);

    }
}