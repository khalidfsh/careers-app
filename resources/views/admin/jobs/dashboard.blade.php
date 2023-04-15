<div>
    <x-list-view searchModel="search"
        :data="$jobs">
        <x-slot name="actions">
            <div class="ms-2">
                <x-button wire:click="showCreateModalManager">
                    {{ __('job.create') }}
                </x-button>
                <x-button wire:click="">
                    {{ __('Import') }}
                </x-button>
                <x-button wire:click="">
                    {{ __('Export') }}
                </x-button>
            </div>
        </x-slot>
        {{-- <x-slot name="filters">
        </x-slot> --}}

        <x-slot name="data">
            @forelse($jobs as $job)
                <li class="py-4">
                    <div class="mb-4 rounded-lg bg-white p-4 shadow-md dark:bg-gray-800">
                        <h3 class="mb-2 text-lg font-semibold">
                            <a class="text-blue-500 hover:text-blue-700"
                                href="{{ route('job', $job) }}">{{ $job->title }}</a>
                        </h3>
                        <p>{{ Str::limit($job->description, 150) }}</p>
                    </div>
                </li>
            @empty
                <h3 class="mb-4text-lg mb-2 p-4 font-semibold text-gray-600 dark:text-gray-400">
                    {{ __('job.no_jobs') }}
                </h3>
            @endforelse
        </x-slot>
    </x-list-view>
    <!-- Form Modal -->
    <x-dialog-modal wire:model="showModalManagerToggle">
        <x-slot name="title">
            {{ isset($this->state->id) ? __('job.update') : __('job.create') }}
        </x-slot>

        <x-slot name="content">
            <form id="job-form"
                name="job-form">
                <div class="grid grid-cols-6 gap-6">
                    <!--title -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="title"
                            value="{{ __('job.title') }}" />
                        <x-input class="mt-1 block w-full"
                            id="title"
                            type="text"
                            wire:model.defer="state.title"
                            autocomplete="title" />
                        <x-input-error class="mt-2"
                            for="state.title" />
                    </div>
                    <!--description -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="description"
                            value="{{ __('job.description') }}" />
                        <x-input class="mt-1 block w-full"
                            id="description"
                            type="textarea"
                            rows="5"
                            wire:model.defer="state.description"
                            autocomplete="description" />
                        <x-input-error class="mt-2"
                            for="state.description" />
                    </div>
                    <!--number_of_positions -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="number_of_positions"
                            value="{{ __('job.number_of_positions') }}" />
                        <x-input class="mt-1 block w-full"
                            id="number_of_positions"
                            type="number"
                            wire:model.defer="state.number_of_positions" />
                        <x-input-error class="mt-2"
                            for="state.number_of_positions" />
                    </div>
                    <!--qualification -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-select id="qualification"
                            name="qualification"
                            :options="$titleTypes"
                            wire:model.defer="state.qualification" />
                        <x-input-error class="mt-2"
                            for="state.qualification" />
                    </div>
                    <!--required_specializations -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="required_specializations"
                            value="{{ __('job.required_specializations') }}" />
                        <x-input class="mt-1 block w-full"
                            id="required_specializations"
                            type="text"
                            wire:model.defer="state.required_specializations" />
                        <x-input-error class="mt-2"
                            for="state.required_specializations" />
                    </div>
                    <!--required_experience_years -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="required_experience_years"
                            value="{{ __('job.required_experience_years') }}" />
                        <x-input class="mt-1 block w-full"
                            id="required_experience_years"
                            type="number"
                            wire:model.defer="state.required_experience_years" />
                        <x-input-error class="mt-2"
                            for="state.required_experience_years" />
                    </div>
                    <!-- requirements -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="requirements"
                            value="{{ __('job.requirements') }}" />
                        <x-input class="mt-1 block w-full"
                            id="requirements"
                            type="text"
                            wire:model.defer="state.requirements" />
                        <x-input-error class="mt-2"
                            for="state.requirements" />
                    </div>
                </div>
            </form>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('showModalManagerToggle', false)"
                wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ms-2"
                wire:click="save"
                wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>


</div>
