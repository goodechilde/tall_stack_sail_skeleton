<x-common.table.header class="pr-0 w-8"><x-common.form.checkbox wire:model="selectPage"/></x-common.table.header>
<x-common.table.header sortable multiColumn wire:click="sortBy('name')" :direction="$sorts['name'] ?? null"
                       class="w-1/3">Recipe Name
</x-common.table.header>
<x-common.table.header sortable multiColumn wire:click="sortBy('difficulty')"
                       :direction="$sorts['difficulty'] ?? null">Difficulty
</x-common.table.header>
<x-common.table.header sortable multiColumn wire:click="sortBy('total_time')"
                       :direction="$sorts['total_time'] ?? null">Total Time
</x-common.table.header>
<x-common.table.header sortable multiColumn wire:click="sortBy('created_at')"
                       :direction="$sorts['created_at'] ?? null">Created
</x-common.table.header>
<x-common.table.header></x-common.table.header>
