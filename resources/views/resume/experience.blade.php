<div class="py-6">
    <x-action-section>
        <x-slot name="title">
            {{ __('resume.experince_name') }}
        </x-slot>

        <x-slot name="description">
            {{ __('resume.experince_description') }}
        </x-slot>

        <x-slot name="content">
            <div class="space-y-6">
                <div class="flex items-center justify-end">
                    <x-button wire:click="showAddModalManager">
                        {{ __('resume.experience.create') }}
                    </x-button>
                </div>

                <div class="relative overflow-x-auto">
                    <table class="w-full table-auto">
                        @forelse($data as $index => $experience)
                            <tr class="border-violet-950 border-b-2 dark:border-emerald-700">
                                <div class="">
                                    {{-- <div class --}}
                                    <th class="px-1 py-1 text-start" scope="row">
                                        <div class="text-xs text-gray-600 dark:text-gray-400">
                                            {{ $experience['company'] }}
                                        </div>
                                        <p class="text-sm text-gray-900 dark:text-gray-100">
                                            {{ $experience['title'] }}</p>
                                    </th>
                                    <td class="px-1 py-1 text-xs text-gray-600 dark:text-gray-400">
                                        @if (!empty($experience['start_date']))
                                            @php
                                                $startDate = new DateTime($experience['start_date']);
                                            @endphp
                                            {{ $startDate->format('Y/m') }}
                                        @endif
                                    </td>
                                    <td class="px-1 py-1 text-xs text-gray-600 dark:text-gray-400">
                                        @if ($experience['is_current'])
                                            {{ __('Present') }}
                                        @elseif ($experience['end_date'])
                                            @php
                                                $endDate = new DateTime($experience['end_date']);
                                            @endphp
                                            {{ $endDate->format('Y/m') }}
                                        @endif
                                    </td>
                                    <td class="block py-4 text-left pe-2">
                                        <button class="text-m cursor-pointer text-blue-700 underline dark:text-blue-400"
                                            wire:click="showEditModalManager({{ $index }})">
                                            {{ __('Edit') }}
                                        </button>
                                    </td>
                                </div>
                            </tr>
                        @empty
                            <div class="dark:text-white text-center">
                                {{ __('http-statuses.204') }}
                            </div>
                        @endforelse
                    </table>
                </div>

            </div>
        </x-slot>
        <x-slot name="actions">

        </x-slot>

    </x-action-section>

    <!-- Add/Edit Modal -->
    <x-dialog-modal wire:model="showModalManagerToggle">
        <x-slot name="title">
            {{ !isset($this->state['id']) ? __('resume.experience.create') : __('resume.experience.edit') }}
        </x-slot>

        <x-slot name="content">
            <form id="form-experience" name="form-experience">
                <div class="grid grid-cols-6 gap-3">
                    {{-- title --}}
                    <div class="col-span-6">
                        <x-label for="title" value="{{ __('resume.experience.title') }}" />
                        <x-input class="mt-1 block w-full" id="title" type="text"
                            wire:model.defer="state.title" />
                        <x-input-error class="mt-2" for="state.title" />
                    </div>
                    {{-- company --}}
                    <div class="col-span-6">
                        <x-label for="company" value="{{ __('resume.experience.company') }}" />
                        <x-input class="mt-1 block w-full" id="company" type="text"
                            wire:model.defer="state.company" />
                        <x-input-error class="mt-2" for="state.company" />
                    </div>
                    {{-- description --}}
                    <div class="col-span-6">
                        <x-label for="description" value="{{ __('resume.description') }}" />
                        <x-input type="textarea" rows="2" class="mt-1 block w-full" id="description"
                            wire:model.defer="state.description">
                        </x-input>
                        <x-input-error class="mt-2" for="state.description" />
                    </div>
                    {{-- start date --}}
                    <div class="col-span-3">
                        <x-label for="start_date" value="{{ __('resume.start_date') }}" />
                        <x-input class="mt-1 block w-full" id="start_date" type="date"
                            wire:model.defer="state.start_date" />
                        <x-input-error class="mt-2" for="state.start_date" />
                    </div>
                    {{-- end date --}}
                    <div class="col-span-3">
                        <x-label for="end_date" value="{{ __('resume.end_date') }}" />
                        <x-input class="mt-1 block w-full" id="end_date" type="date"
                            wire:model.defer="state.end_date" />
                        <x-input-error class="mt-2" for="state.end_date" />
                    </div>
                    {{-- is current --}}
                    <div class="col-span-3 inline-flex items-center gap-1 ">
                        <x-checkbox id="is_current" wire:model.defer="state.is_current" />
                        <x-label for="is_current" value="{{ __('resume.experience.is_current') }}" />
                        <x-input-error class="mt-2" for="state.is_current" />
                    </div>
                </div>
            </form>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('showModalManagerToggle', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>
            @if (isset($this->state['id']) && !empty($this->state['id']))
                <x-button class="ms-3 bg-red-700 text-white" wire:click="delete()" wire:loading.attr="disabled">
                    {{ __('Delete') }}
                </x-button>
            @endif
            {{-- divider --}}
            <div class="flex-grow"></div>
            {{-- save --}}
            <x-button class="" wire:click="save()" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>
    <!-- Experience List -->
    {{-- <div class="mt-4">
            <ul>
                @foreach ($data as $experience)
                    <li class="mb-4">
                        <h4 class="font-semibold text-lg">{{ $experience['title'] }} @ {{ $experience['company'] }}
                        </h4>
                        <p>{{ $experience['description'] }}</p>
                        <p>{{ $experience['start_date']->format('M Y') }} -
                            @if ($experience['is_current'])
                                {{ __('Present') }}
                            @else
                                {{ $experience['end_date']->format('M Y') }}
                            @endif
                        </p>
                        <div class="flex space-x-2">
                            <button wire:click="showEditModalManager({{ $experience['id'] }})"
                                class="bg-blue-500 text-white px-4 py-2 rounded">Edit</button>
                            <button wire:click="delete({{ $experience['id'] }})"
                                class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                        </div>
                    </li>
                @endforeach
            </ul> --}}
</div>
