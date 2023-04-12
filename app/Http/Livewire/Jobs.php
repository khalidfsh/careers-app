<?php

namespace App\Http\Livewire;


use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;

class Jobs extends Component
{
    use WithPagination;

    public $sortBy = 'created_at';
    public $sortDirection = 'desc';
    public $perPage = 10;
    public $search = '';
    public $filters = [];
    // public $startDate = now()->toDateString();
    // public $endDate = now()->toDateString();

    public $job;

    public function mount()
    {

    }

    public function render()
    {
        $jobs = Job::when($this->search, function ($query) {
            $query->where('title', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%')
                ->orWhere('qualification', 'like', '%' . $this->search . '%')
                ->orWhere('required_specializations', 'like', '%' . $this->search . '%')
                ->orWhere('requirements', 'like', '%' . $this->search . '%');

        })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);

        return view('jobs.component', [
            'jobs' => $jobs,
        ]);

    }

    public function updatingSearch()
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
    // return redirect()->route('jobs.show', $this->jobId);
}