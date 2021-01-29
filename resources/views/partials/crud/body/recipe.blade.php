@if($selectPage)
<x-common.table.row wire:key="row-message" class="bg-cool-gray-200">
    <x-common.table.cell colspan="10">
        @unless($selectAll)
            <div>
                <span>You selected <strong>{{ $recipes->count() }} recipes</strong>, do you want to select all
                    <strong>{{ $recipes->total() }} recipes</strong>?</span>
                <x-common.button.link wire:click="selectAll" class="ml-1 text-blue-800 focus:text-red-800">Select All
                </x-common.button.link>
            </div>
        @else
            You have selected <strong>all {{ $recipes->total() }} recipes</strong>.
        @endif
    </x-common.table.cell>
</x-common.table.row>
@endif
<div>
{{--    <x-common.notification header="Recipe saved!" />--}}
</div>
@forelse($recipes as $recipe)
    <x-common.table.row wire.loading.class.delay="opacity-50" wire:key="{{ $recipe->id }}">
        <x-common.table.cell class="pr-0">
            <x-common.form.checkbox wire:model="selected" value="{{ $recipe->id }}" />
        </x-common.table.cell>
        <x-common.table.cell>
            <a href="{{ route('recipes.show', ['recipe' => $recipe->id]) }}"
               class="group inline-flex space-x-2 truncate text-sm">
                <x-common.icon.sparkles class="text-gray-700"/>
                <p class="text-gray-700 truncate">
                    {{ $recipe->name }}
                </p>
            </a>
        </x-common.table.cell>
        <x-common.table.cell>
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-{{ $recipe->difficulty_color }}-100 text-{{ $recipe->difficulty_color }}-800 capitalize">
                {{ $recipe->difficulty }}
            </span>
        </x-common.table.cell>
        <x-common.table.cell>{{ $recipe->total_time_calculated }} mins</x-common.table.cell>
        <x-common.table.cell>{{ $recipe->created_at->format('m/d/y') }}</x-common.table.cell>
        <x-common.table.cell>
            <x-common.button.link wire:click="edit({{ $recipe->id }})">Edit</x-common.button.link>
        </x-common.table.cell>
    </x-common.table.row>
@empty
    <x-common.table.row wire.loading.class.delay="opacity-50">
        <x-common.table.cell colspan="6">
            <div class="flex justify-center item-center">
                <span class="text-blue-400 text-xl py-8 font-medium">
                    There are no recipes for your search...
                </span>
            </div>
        </x-common.table.cell>
    </x-common.table.row>
@endforelse
