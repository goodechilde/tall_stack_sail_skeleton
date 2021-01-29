<div class="bg-cool-gray-200 p-4 rounded shadow-inner flex relative mb-4">

    <div class="w-1/2 pr-2 space-y-4">
        <x-common.form.group inline label="Difficulty" for="filter-difficulty">
            <x-common.form.select wire:model.lazy="filters.difficulty" id="filter-difficulty" name="filter-difficulty">
                <option value="" disabled>Select difficulty...</option>
                @foreach(\App\Models\Recipe::DIFFICULTY as $value => $description)
                    <option value="{{ $value }}">{{ $description }}</option>
                @endforeach
            </x-common.form.select>
        </x-common.form.group>

        <x-common.form.group inline for="filter-total_time-min" label="Minimum Time" class="w-3/5">
            <x-common.form.text-minutes wire:model.lazy="filters.total_time-min" id="filter-total_time-min"/>
        </x-common.form.group>
        <x-common.form.group inline for="filter-total_time-max" label="Maximum Time" class="w-3/5">
            <x-common.form.text-minutes wire:model.lazy="filters.total_time-max" id="filter-total_time-max"/>
        </x-common.form.group>
    </div>

    <div class="w-1/2 pl-2 space-y-4">
        <div>
            <x-common.form.group inline for="filter-date-min" label="Minimum Date" class="w-3/5">
                <x-common.form.date-picker wire:model.lazy="filters.date-min" id="filter-date-min"
                                           placeholder="MM/DD/YYYY"/>
            </x-common.form.group>
        </div>

        <div>
            <x-common.form.group inline for="filter-date-max" label="Maximum Date" class="w-3/5">
                <x-common.form.date-picker
                        wire:model.lazy="filters.date-max" id="filter-date-max" placeholder="MM/DD/YYYY"/>
            </x-common.form.group>
        </div>
        <x-common.button.link wire:click="resetFilters" class="absolute right-0 bottom-0 p-4 mt-4">Reset Filters
        </x-common.button.link>
    </div>

</div>
