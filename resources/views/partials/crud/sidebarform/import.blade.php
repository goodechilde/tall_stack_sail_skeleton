@unless ($upload)
    <div class="py-12 flex flex-col items-center justify-center ">
        <div class="flex items-center space-x-2 text-xl">
            <x-common.icon.upload class="text-cool-gray-400 h-8 w-8" />
            <x-common.form.file-upload wire:model="upload" id="upload">
                <span class="text-cool-gray-500 font-bold">CSV File</span>
            </x-common.form.file-upload>
        </div>
        @error('upload') <div class="mt-3 text-red-500 text-sm">{{ $message ?? '' }}</div> @enderror
    </div>
@else
    <div>
        <x-common.form.group for="name" label="Name" :error="$errors->first('fieldColumnMap.name')">
            <x-common.form.select wire:model="fieldColumnMap.name" id="title">
                <option value="" disabled>Select Column...</option>
                @foreach ($columns as $column)
                    <option>{{ $column }}</option>
                @endforeach
            </x-common.form.select>
        </x-common.form.group>

        <x-common.form.group for="description" label="Description" :error="$errors->first('fieldColumnMap.description')">
            <x-common.form.select wire:model="fieldColumnMap.description" id="title">
                <option value="" disabled>Select Column...</option>
                @foreach ($columns as $column)
                    <option>{{ $column }}</option>
                @endforeach
            </x-common.form.select>
        </x-common.form.group>

        <x-common.form.group for="instructions" label="Instructions" :error="$errors->first('fieldColumnMap.instructions')">
            <x-common.form.select wire:model="fieldColumnMap.instructions" id="title">
                <option value="" disabled>Select Column...</option>
                @foreach ($columns as $column)
                    <option>{{ $column }}</option>
                @endforeach
            </x-common.form.select>
        </x-common.form.group>

        <x-common.form.group for="prep_time" label="Prep Time" :error="$errors->first('fieldColumnMap.prep_time')">
            <x-common.form.select wire:model="fieldColumnMap.prep_time" id="title">
                <option value="" disabled>Select Column...</option>
                @foreach ($columns as $column)
                    <option>{{ $column }}</option>
                @endforeach
            </x-common.form.select>
        </x-common.form.group>

        <x-common.form.group for="cook_time" label="Cook Time" :error="$errors->first('fieldColumnMap.cook_time')">
            <x-common.form.select wire:model="fieldColumnMap.cook_time" id="title">
                <option value="" disabled>Select Column...</option>
                @foreach ($columns as $column)
                    <option>{{ $column }}</option>
                @endforeach
            </x-common.form.select>
        </x-common.form.group>

        <x-common.form.group for="difficulty" label="Difficulty" :error="$errors->first('fieldColumnMap.difficulty')">
            <x-common.form.select wire:model="fieldColumnMap.difficulty" id="title">
                <option value="" disabled>Select Column...</option>
                @foreach ($columns as $column)
                    <option>{{ $column }}</option>
                @endforeach
            </x-common.form.select>
        </x-common.form.group>

        <x-common.form.group for="difficulty" label="" :error="$errors->first('fieldColumnMap.difficulty')">
            <x-common.button.secondary wire:click="clearFile">Reset File Upload</x-common.button.secondary>
            <x-common.button.primary type="submit">Submit</x-common.button.primary>
        </x-common.form.group>
    </div>
@endif
