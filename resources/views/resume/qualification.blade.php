<div class="py-6">
    <x-action-section>
        <x-slot name="title">
            {{ __('resume.qualification_name') }}
        </x-slot>

        <x-slot name="description">
            {{ __('resume.qualification_description') }}
        </x-slot>

        {{-- user's qualifications list --}}
        <x-slot name="content">
            <div class="space-y-6">
                <div class="flex items-center justify-end ">
                    <x-button wire:click="showModalManager">
                        {{ __('Add') }}
                    </x-button>
                </div>

                
                <ul class="space-y-4">
                    @forelse($data as $index => $qualification)
                        <li class="flex items-center justify-between dark:text-white rounded-lg shadow-md">
                            <div class="ps-2 py-2">
                                <h5 class=" text-sm text-gray-600 dark:text-gray-400">
                                    {{ __('resume.qualification.types.'.$qualification['title_type']) }}
                                </h5>
                                <p class="text-sm">{{$qualification['title']}}</p>
                            </div>
                            <div class="text-sm text-gray-600 dark:text-gray-400">
                                {{ $qualification['institution']}}
                            </div>
                            <div class="text-sm text-gray-600 dark:text-gray-400">
                                @php
                                    $endDate = new DateTime($qualification['end_date']);
                                @endphp
                                {{$endDate->format('Y/m')}}
                            </div>
                            <div class=" me-2">
                                <button class="cursor-pointer ms-6 text-sm text-gray-400 underline" wire:click="">
                                    {{ __('Edit') }}
                                </button>
                                <button class="cursor-pointer ms-6 text-sm text-red-500" wire:click="delete({{ $index }})">
                                    {{ __('Delete') }}
                                </button>
                            </div>
                        </li>
                    @empty
                        <li class="dark:text-white">
                            {{ __('204') }}
                        </li>
                    @endforelse
                </ul>

            </div>
        </x-slot>

        <x-slot name="actions">
            
        </x-slot>

    </x-action-section>

    <!-- Create qualification dialog modal -->
    <x-dialog-modal wire:model="showModalManagerToggle">
        <x-slot name="title">
            {{ __('resume.qualification.create') }}
        </x-slot>

        <x-slot name="content">
            <form id="form-qualification" name="form-qualification">
                <div class="grid grid-cols-2  gap-6 ">
                    {{-- title --}}
                    <div class="col-span-6">
                        <x-label for="title" value="{{ __('resume.qualification.title') }}" />
                        {{-- dropdown of qualification types --}}
                        <x-select id="title_type"
                                    name="title_type"
                                    :options="$titleTypes"
                                    wire:model.defer="state.title_type"/>
                        <x-input id="title" type="text" class="ms-1 mt-1 block w-full" wire:model.defer="state.title" />
                        <x-input-error for="state.title" class="mt-2" />
                    </div>
                    {{-- institution --}}
                    <div class="col-span-6">
                        <x-label for="institution" value="{{ __('resume.qualification.institution') }}" />
                        <x-input id="institution" type="text" class="mt-1 block w-full" wire:model.defer="state.institution" />
                        <x-input-error for="state.institution" class="mt-2" />
                    </div>
                    {{-- start date --}}
                    <div class="col-span-6 sm:col-span-3">
                        <x-label for="start_date" value="{{ __('resume.qualification.start_date') }}" />
                        <x-input id="start_date" type="date" class="mt-1 block w-full" wire:model.defer="state.start_date" />
                        <x-input-error for="state.start_date" class="mt-2" />
                    </div>
                    {{-- end date --}}
                    <div class="col-span-6 sm:col-span-3">
                        <x-label for="end_date" value="{{ __('resume.qualification.end_date') }}" />
                        <x-input id="end_date" type="date" class="mt-1 block w-full" wire:model.defer="state.end_date" />
                        <x-input-error for="state.end_date" class="mt-2" />
                    </div>
                    {{-- grade --}}
                    <div class="col-span-6 sm:col-span-3">
                        <x-label for="grade" value="{{ __('resume.qualification.grade') }}" />
                        <x-input id="grade" type="number" step="0.01" class="mt-1 block w-full" wire:model.defer="state.grade" />
                        <x-input-error for="state.grade" class="mt-2" />
                    </div>
                </div>
            </form>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('showModalManagerToggle', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ms-3" wire:click="save()" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
