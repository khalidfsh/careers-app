<?php
namespace App\Http\Livewire\Admin;

use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    /**
     * Filter and sort options.
     */
    public $search = '';
    public $sortBy = 'created_at';
    public $sortAsc = true;
    public $perPage = 10;
    public $filters = [];
    


    public $categoryOptions = [];
    public $catagory = '';
    public $jobId = '';
    /**
     * The component's validation rules.
     *
     * @var array
     */
    protected $rules = [
        'user.name' => '',
        'user.email' => '',
        'user.is_admin' => '',

        'perPage' => 'sometimes|integer|min:1|max:100',
        'sortDirection' => 'sometimes|in:asc,desc',
    ];

    public function mount()
    {
        $this->validationAttributes = [
            'user.name' => __('Name'),
            'user.email' => __('Email'),
        ];

        $this->categoryOptions = array_merge(['' => __('Select Department...')], config('lists.job_categories'));
    }

    public function sortBy( $field ) {

        if ( $field == $this->sortBy ) {
            $this->sortAsc = !$this->sortAsc;
        }

        $this->sortBy = $field;

    }


    public function render()
    {
        $users = User::query()
            ->where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orderBy($this->sortBy, $this->sortAsc ? 'ASC' : 'DESC')
            ->paginate($this->perPage);

        // get job where has $catgory
        // only get id and name convert to id => name map
        if($this->catagory)
            $jobs = Job::where('category', $this->catagory)->get(['id', 'title']); 
        else
            $jobs = Job::all(['id', 'title']);
        
        // convert to id => name map 
        $jobs = $jobs->mapWithKeys(function ($item) {
            return [$item['id'] => $item['title']];
        });
        $jobs->prepend(__('Select Job...'), '');

        return view('admin.users.dashboard', [
            'users' => $users,
            'jobs' => $jobs,
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function updatingCatagory()
    {
        $this->jobId = '';
        $this->resetPage();
    }
}