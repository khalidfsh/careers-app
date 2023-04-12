<x-dialog-modal wire:model="showModalManagerToggle">
    <x-slot name="title">
        {{ isset( $this->job->id ) ? __('job.update') : __('job.create') }}
    </x-slot>

    <x-slot name="content">
        <form id="job-form" name="job-form">
            <div class="grid grid-cols-6 gap-6">
                <!--title -->
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="job.title" value="{{ __('job.title') }}" />
                    <x-input id="job.title" type="text" class="mt-1 block w-full" wire:model.defer="job.title" autocomplete="title" />
                    <x-input-error for="job.title" class="mt-2" />
                </div>
                <!--description -->
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="description" value="{{ __('job.description') }}" />
                    <x-input id="description" type="textarea" rows="5" class="mt-1 block w-full" wire:model.defer="state.description" autocomplete="description" />
                    <x-input-error for="state.description" class="mt-2" />
                </div>
                <!--number_of_positions -->
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="number_of_positions" value="{{ __('job.number_of_positions') }}" />
                    <x-input id="number_of_positions" type="number" class="mt-1 block w-full" wire:model.defer="state.number_of_positions" />
                    <x-input-error for="state.number_of_positions" class="mt-2" />
                </div>
                <!--qualification -->               
                <div class="col-span-6 sm:col-span-4">
                    <x-select id="qualification"
                            name="qualification"
                            :options="$titleTypes"
                            wire:model.defer="state.qualification"/>
                    <x-input-error for="state.qualification" class="mt-2" />
                </div>
                <!--required_specializations -->
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="required_specializations" value="{{ __('job.required_specializations') }}" />
                    <x-input id="required_specializations" type="text" class="mt-1 block w-full" wire:model.defer="state.required_specializations" />
                    <x-input-error for="state.required_specializations" class="mt-2" />
                </div>
                <!--required_experience_years -->
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="required_experience_years" value="{{ __('job.required_experience_years') }}" />
                    <x-input id="required_experience_years" type="number" class="mt-1 block w-full" wire:model.defer="state.required_experience_years" />
                    <x-input-error for="state.required_experience_years" class="mt-2" />
                </div>
                <!-- requirements -->
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="requirements" value="{{ __('job.requirements') }}" />
                    <x-input id="requirements" type="text" class="mt-1 block w-full" wire:model.defer="state.requirements" />
                    <x-input-error for="state.requirements" class="mt-2" />
                </div>
            </div>
        </form>
    </x-slot>

    <x-slot name="footer">
        <x-secondary-button wire:click="$set('showModalManagerToggle', false)" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-secondary-button>

        <x-button class="ms-2" wire:click="save" wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-dialog-modal>