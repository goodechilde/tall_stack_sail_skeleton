<x-jet-confirmation-modal wire:model.defer="showDeleteModal">
    <x-slot name="title">
        Delete
    </x-slot>

    <x-slot name="content">
        Are you sure you want to delete the selected items?
    </x-slot>

    <x-slot name="footer">
        <x-common.button.secondary wire:click="$set('showDeleteModal', false)">
            Nevermind
        </x-common.button.secondary>

        <x-common.button.primary type="submit">
            Delete
        </x-common.button.primary>
    </x-slot>
</x-jet-confirmation-modal>
