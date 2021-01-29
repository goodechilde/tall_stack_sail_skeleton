<div>
    <x-slot name="header">
        {{ __('Recipes') }}
    </x-slot>

    <div class="space-y-6">
        <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
            <div class="flex justify-between mb-4">
                <div class="w-2/4 flex space-x-4">
                    <x-common.form.text wire:model.debounce.500ms="filters.search" placeholder="Search recipe names" />
                    <x-common.button.link wire:click="toggleShowFilters">@if($showFilters) Hide @endif Advanced Search</x-common.button.link>
                </div>
                <div class="space-x-2 flex items-center">
                    <x-common.form.group borderless paddingless label="Per Page" for="difficulty">
                        <x-common.form.select
                            wire:model="perPage" id="perPage" name="perPage"
                        >
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <option value="40">40</option>
                                <option value="50">50</option>
                                <option value="75">75</option>
                                <option value="100">100</option>
                        </x-common.form.select>
                    </x-common.form.group>
                    <x-dropdown label="Bulk Actions">
                        <x-common.dropdown.item type="button" wire:click="exportSelected" class="flex items-center space-x-2"><x-common.icon.download class="text-cool-gray-400" />
                            <span>Export</span>
                        </x-common.dropdown.item>
                        <x-common.dropdown.item
                            type="button"
{{--                            onclick="confirm('Are you sure you wish to delete the selected items') || event.stopImmediatePropagation()"--}}
                            wire:click="$set('showDeleteModal', true)"
                            class="flex items-center space-x-2">
                            <x-common.icon.trash class="text-cool-gray-400" />
                            <span>Delete</span>
                        </x-common.dropdown.item>
                    </x-dropdown>
                    <livewire:import-transactions />
                    <x-common.button.primary wire:click="create"><x-common.icon.plus/> New</x-common.button.primary>
                </div>
            </div>
            <div>
                @if ($showFilters)
                    @include('partials.crud.filters.recipe')
                @endif
            </div>
            <div class="flex-col space-y-4">
                <x-table>
                    <x-slot name="head">
                        @include('partials.crud.header.recipe')
                    </x-slot>
                    <x-slot name="body">
                        @include('partials.crud.body.recipe')
                    </x-slot>
                </x-table>
                <div class="px-3">
                    {{ $recipes->links() }}
                </div>
            </div>
        </div>
    </div>

    <form action="#" wire:submit.prevent="deleteSelected">
        @include('partials.crud.modal.deleteConfirmation')
    </form>
    <form action="#" wire:submit.prevent="save">
        <x-right-sidebar wire:model.defer="editPublicShowSidebar" header="Recipe">
            <div class="space-y-5">
                @include('partials.crud.sidebarform.recipe')
            </div>
        </x-right-sidebar>
    </form>
</div>
