<?php
namespace App\Http\Livewire\Admin;

use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
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
    public $onlyStaff = false;
    public $onlyActive = false;



    public $categoryOptions = [];
    public $catagory = '';
    public $jobId = -1;
    /**
     * The component's validation rules.
     *
     * @var array
     */
    // protected $rules = [
    //     'user.name' => '',
    //     'user.email' => '',
    //     'user.role' => '',

    // ];

    public function mount()
    {
        $this->categoryOptions = array_merge(['' => __('Select Department...')], config('lists.job_categories'));
    }

    public function sortBy($field)
    {

        if ($field == $this->sortBy) {
            $this->sortAsc = !$this->sortAsc;
        }

        $this->sortBy = $field;

    }

    public function assignAdminRole(User $user)
    {
        abort_if(Gate::denies('manage_roles'), 403);
        if ($user->role_id > 8) {
            return;
        }
        $user->promoteToAdmin();
        // redirect with success massage

        return redirect()->route('admin.users')->with(['flash.banner' => __('User role updated.')]);

    }

    public function assignViewerRole(User $user)
    {
        abort_if(Gate::denies('manage_roles'), 403);
        if ($user->role_id === 5 || $user->role_id == 9) {
            return;
        }
        $user->promoteToViewer();
        
        // redirect with success massage
        return redirect()->route('admin.users')->with(['flash.banner' => __('User role updated.')]);
    }
    public function clearRole($id)
    {
        abort_if(Gate::denies('manage_roles'), 403);
        $user = User::find($id);
        if ($user->role_id == 9) {
            return;
        }
        $user->role_id = 1;
        $user->save();
        
        // redirect with success massage
        return redirect()->route('admin.users')->with(['flash.banner' => __('User role cleared.')]);
    }


    public function render()
    {
        $users = User::when($this->jobId, function ($query) {
            // return $this->jobId == -1 ?
            //     $query->whereNull('job_id') :
            //     $query->where('job_id', $this->jobId);
        })
            ->when($this->search, function ($query) {
                return $query->where(function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->onlyStaff, function ($query) {
                return $query->where('role_id', '>', 2);
            })
            ->when($this->onlyActive, function ($query) {
                // $user->email_verified_at not null
                return $query->whereNotNull('email_verified_at');

            })
            ->orderBy($this->sortBy, $this->sortAsc ? 'ASC' : 'DESC')
            ->paginate($this->perPage);

        // get job where has $catgory
        // only get id and name convert to id => name map
        if ($this->catagory)
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
// public function updatingOnlyStaff()
// {
//     $this->resetPage();
// }
}