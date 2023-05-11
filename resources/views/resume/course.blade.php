<div class="py-6">
    <x-action-section>
        <x-slot name="title">
            {{ __('resume.course_name') }}
        </x-slot>

        <x-slot name="description">
            {{ __('resume.course_description') }}
        </x-slot>

        <x-slot name="content">
            <div class="space-y-6">
                <div class="flex items-center justify-end">
                    <x-button wire:click="showAddModalManager">
                        {{ __('resume.course.create') }}
                    </x-button>
                </div>

                <div class="relative overflow-x-auto">
                    <table class="w-full table-auto">
                        @forelse($data as $index => $course)
                            <tr class="border-violet-950 border-b-2 dark:border-emerald-700">
                                <div class="">
                                    {{-- <div class --}}
                                    <th class="px-1 py-1 text-start" scope="row">
                                        <p class="text-sm text-gray-900 dark:text-gray-100">
                                            {{ $course['title'] }}</p>
                                    </th>
                                    <td class="px-1 py-1 text-xs text-gray-600 dark:text-gray-400">
                                        @if (!empty($course['start_date']))
                                            @php
                                                $startDate = new DateTime($course['start_date']);
                                            @endphp
                                            {{ $startDate->format('Y/m') }}
                                        @endif
                                    </td>
                                    <td class="px-1 py-1 text-xs text-gray-600 dark:text-gray-400">
                                        @if ($course['end_date'])
                                            @php
                                                $endDate = new DateTime($course['end_date']);
                                            @endphp
                                            {{ $endDate->format('Y/m') }}
                                        @endif
                                    </td>
                                    <td class="block py-4 text-end pe-2">
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
            {{ !isset($this->state['id']) ? __('resume.course.create') : __('resume.course.edit') }}
        </x-slot>

        <x-slot name="content">
            <form id="form-course" name="form-course">
                <div class="grid grid-cols-6 gap-3">
                    {{-- title --}}
                    <div class="col-span-6">
                        <x-label for="title" value="{{ __('resume.course.title') }}" />
                        <x-input class="mt-1 block w-full" id="title" type="text"
                            wire:model.defer="state.title" />
                        <x-input-error class="mt-2" for="state.title" />
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
</div>
