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

                <div class="relative overflow-x-auto">
                    <table class="w-full table-auto">
                        @forelse($data as $index => $qualification)
                            <tr class="pb-4 border-b border-emerald-500">
                                <div class="">
                                {{-- <div class --}}
                                    <th scope="row" class="text-start px-2 py-2">
                                        <div class="  text-xs text-gray-600 dark:text-gray-400">
                                            {{ __('resume.qualification.types.'.$qualification['title_type']) }}
                                        </div>
                                        <p class="text-sm text-gray-900 dark:text-gray-100">{{$qualification['title']}}</p>
                                    </th>
                                    <td class="px-2 pt-2 text-sm text-gray-600 dark:text-gray-400">
                                        {{ $qualification['institution']}}
                                    </td>
                                    <td class="px-2 pt-2 text-xs text-gray-600 dark:text-gray-400">
                                        @php
                                            $endDate = new DateTime($qualification['end_date']);
                                        @endphp
                                        {{$endDate->format('Y/m')}}
                                    </td>
                                    <td class="block py-4 text-left pe-2">
                                        <button class="cursor-pointer text-m text-blue-700 underline" wire:click="">
                                            {{ __('Edit') }}
                                        </button>
                                        <button class="ms-2 cursor-pointer text-m text-red-500" wire:click="delete({{ $index }})">
                                            {{ __('Delete') }}
                                        </button>
                                    </td>
                                </div>
                            </tr>
                        @empty
                            <div class="dark:text-white">
                                {{ __('204') }}
                            </div>
                        @endforelse
                    </table>
                </div>

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
                <div class="grid grid-cols-6 gap-3 ">
                    {{-- title --}}
                    <div class="col-span-6">
                        <x-label for="title" value="{{ __('resume.qualification.title') }}" />
                        {{-- dropdown of qualification types --}}
                        <div class="inline-flex w-full">

                            <x-select   clss="border-r-2"
                                        id="title_type"
                                        name="title_type"
                                        :options="$titleTypes"
                                        wire:model.defer="state.title_type"/>
                            <x-input id="title" type="text" class="block w-full" wire:model.defer="state.title" />
                        </div>
                        <x-input-error for="state.title" class="mt-2" />


                    </div>
                    {{-- institution --}}
                    <div class="col-span-6">
                        <x-label for="institution" value="{{ __('resume.qualification.institution') }}" />
                        <x-input id="institution" type="text" class="mt-1 block w-full" wire:model.defer="state.institution" />
                        <x-input-error for="state.institution" class="mt-2" />
                    </div>
                    {{-- start date --}}
                    <div class="col-span-3">
                        <x-label for="start_date" value="{{ __('resume.qualification.start_date') }}" />
                        <x-input id="start_date" type="date" class="mt-1 block w-full" wire:model.defer="state.start_date" />
                        <x-input-error for="state.start_date" class="mt-2" />
                    </div>
                    {{-- end date --}}
                    <div class="col-span-3">
                        <x-label for="end_date" value="{{ __('resume.qualification.end_date') }}" />
                        <x-input id="end_date" type="date" class="mt-1 block w-full" wire:model.defer="state.end_date" />
                        <x-input-error for="state.end_date" class="mt-2" />
                    </div>
                    {{-- grade --}}
                    <div class="col-span-3 col-start-3">
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
