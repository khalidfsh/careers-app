<?php

namespace App\Http\Livewire\Resume;

use Livewire\Component;
use App\Models\Qualification as QualificationModel;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;


class Qualification extends Component
{

    use WithFileUploads;

    /**
     * The component's state.
     *
     * @var array
     */
    public $state = [];
    public $document = '';

    public $data = [];

    public $showModalManagerToggle = false;

    public $titleTypeOptions = [];

    /**
     * Prepare the component.
     *
     * @return void
     */
    protected $rules = [
        'state.title' => 'required|min:3|max:255',
        'state.degree' => 'required|min:3|max:255',
        'state.institution' => 'required|min:3|max:255',
        'state.start_date' => 'nullable|date',
        'state.end_date' => 'required|date',
        'state.grade' => 'required|numeric',

        'document' => 'file|mimes:png,jpeg,jpg,pdf|max:2048',
    ];



    public function mount()
    {
        $this->titleTypeOptions = [
            '' => __('resume.qualification.select'),
            'high_school' => __('resume.qualification.types.high_school'),
            'diploma' => __('resume.qualification.types.diploma'),
            'bachelor' => __('resume.qualification.types.bachelor'),
            'master' => __('resume.qualification.types.master'),
            'phd' => __('resume.qualification.types.phd'),
        ];
        $this->state = [
            'title' => '',
            'degree' => '',
            'institution' => '',
            'start_date' => null,
            'end_date' => null,
            'grade' => '',
            'document_path' => '',
        ];
        $this->validationAttributes = [
            'state.title' => __('resume.qualification.title'),
            'state.degree' => __('resume.qualification.title_type'),
            'state.institution' => __('resume.qualification.institution'),
            'state.start_date' => __('resume.start_date'),
            'state.end_date' => __('resume.end_date'),
            'state.grade' => __('resume.qualification.grade'),
            'document' => __('Document'),
        ];
        // check if user has resume
        if (auth()->user()->resume) {
            // Load the authenticated user's qualifications
            $this->data = auth()->user()->resume->qualifications->toArray() ?? [];
        } else {
            $this->data = [];
        }
    }

    public function showAddModalManager()
    {
        if (!auth()->user()->resume) {
            return redirect()->route('resume')->with(['flash.banner' => __('Fill out your general information first.'), 'flash.bannerStyle' => 'danger']);
        }
        $this->resetErrorBag();
        $this->state = [
            'title' => '',
            'degree' => '',
            'institution' => '',
            'start_date' => null,
            'end_date' => null,
            'grade' => '',
            'document_path' => '',
        ];
        $this->reset(['document']);
        $this->showModalManagerToggle = true;
    }
    public function showEditModalManager($index)
    {
        $this->resetErrorBag();
        $this->state = $this->data[$index];
        $this->showModalManagerToggle = true;
    }
    // save
    public function save()
    {
        $user_id = auth()->id();

        $this->validate();

        // Store the uploaded file and get its path
        $documentPath = $this->document ? $this->document->store("user_{$user_id}/documents", 'private_uploads') : null;
        // Save the file path in the database (only if a new file is uploaded)
        if ($documentPath) {
            $this->state['document_path'] = basename($documentPath);
        } else {
            unset($this->state['document_path']);
        }


        // If the state has an 'id', it's an update operation
        if (isset($this->state['id']) && !empty($this->state['id'])) {
            $qualification = QualificationModel::find($this->state['id']);
            //abort if resume_id != auth()->id()
            abort_if($qualification->resume_id != $user_id, 403, 'Unauthorized action.');


            $qualification->update($this->state);
        } else {
            // Otherwise, it's a create operation
            $qualification = new QualificationModel($this->state);
            auth()->user()->resume->qualifications()->save($qualification);
        }


        // $this->showModalManagerToggle = false;
        return redirect()->route('resume')->with(['flash.banner' => __('Qualification saved!')]);

    }
    // delete
    public function delete()
    {
        $user_id = auth()->id();
        $qualification = QualificationModel::find($this->state['id']);

        //abort if resume_id != auth()->id()
        abort_if($qualification->resume_id != $user_id, 403, 'Unauthorized action.');

        // Delete the file from the filesystem
        if ($qualification->document_path) {
            $full_document_path = "user_{$user_id}/documents/{$qualification->document_path}";
            Storage::disk('private_uploads')->delete($full_document_path);
        }

        $qualification->delete();

        return redirect()->route('resume')->with(['flash.banner' => __('Qualification deleted!')]);
    }

    public function updatingShowModalManagerToggle()
    {
        $this->resetErrorBag();
        $this->reset(['document']);
        // dd($this);
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