<?php

namespace App\Http\Livewire\Resume;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Skill extends Component
{
    public $skill = '';
    public $language = '';
    public $languageLevel = 0;
    public $skills = [];
    public $languages = [];


    /**
     * 
     * The cmponent's dropdown lists
     */
    public $languageOptions = [];
    public $languageLevelOptions = [];


    // protected $rules = [
    //     'skill' => 'required|min:3|max:255',
    //     'language.language' => 'nullable|date',
    //     'state.end_date' => 'nullable|date',
    // ];



    public function mount()
    {
        $this->validationAttributes = [
            'skill' => __('resume.skill'),
        ];

        $this->languageOptions = array_merge(['' => __('Select language') . '...'], config('lists.languages'));
        $this->languageLevelOptions = array_merge([0 => __('Select level') . '...'], config('lists.language_levels'));

        if (auth()->user()->resume) {
            $this->skills = json_decode(auth()->user()->resume['skills']) ?? [];
            $this->languages = json_decode(auth()->user()->resume['languages'], true) ?? [];
        } else {
            $this->skills = [];
            $this->languages = [];
        }
    }

    public function addSkill()
    {
        $this->validate([
            'skill' => 'required|min:2|max:50',
        ]);

        if (!in_array($this->skill, $this->skills)) {
            $this->skills[] = $this->skill;
            auth()->user()->resume->update(['skills' => json_encode($this->skills)]);

            // $skill = $this->skill;

            // // Update the JSON column in the database
            // DB::statement('UPDATE resumes SET skills = JSON_ARRAY_APPEND(skills, "$", ?) WHERE user_id = ?', [$skill, auth()->id()]);

            // Update the local skills array for the Livewire component
            $this->skills = json_decode(auth()->user()->resume['skills']) ?? [];
        }
        $this->skill = '';

    }

    public function removeSkill($index)
    {
        if (isset($this->skills[$index])) {
            // Remove the skill from the JSON column in the database
            DB::statement('UPDATE resumes SET skills = JSON_REMOVE(skills, ?) WHERE user_id = ?', ['$[' . $index . ']', auth()->id()]);
        }


        // Update the local skills array for the Livewire component
        $this->skills = json_decode(auth()->user()->resume['skills']) ?? [];
    }

    public function addLanguage()
    {
        $this->validate([
            'language' => 'required|in:' . implode(',', array_keys($this->languageOptions)),
            'languageLevel' => 'required|integer|min:1|max:6',
        ]);
        // dd($this->language, $this->languageLevel, $this->languages);
        // Check if the language is not empty and is not already in the list
        if ($this->language && !isset($this->languages[$this->language])) {
            $this->languages[$this->language] = $this->languageLevel;
            auth()->user()->resume->update(['languages' => json_encode($this->languages)]);
        }

        $this->language = '';
        $this->languageLevel = 0;
    }

    public function removeLanguage($language)
    {
        unset($this->languages[$language]);
        auth()->user()->resume->update(['languages' => json_encode($this->languages)]);
    }

    public function render()
    {
        return view('resume.skill', [
            'skills' => $this->skills,
            'languages' => $this->languages,
        ]);
    }
}