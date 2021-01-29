<div>
    <x-common.button.secondary wire:click="$toggle('showSidebar')"><x-common.icon.plus/> Import</x-common.button.secondary>
    <form action="#" wire:submit.prevent="import">
        <x-right-sidebar wire:model.defer="showSidebar" header="Import CSV" hidefooter>
            <div class="space-y-5">
                @include('partials.crud.sidebarform.import')
            </div>
        </x-right-sidebar>
    </form>
</div>
