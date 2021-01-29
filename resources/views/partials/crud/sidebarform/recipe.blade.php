<x-common.form.group class="col-span-6 sm:col-span-6" label="Name" for="name" :error="$errors->first('editing.name')">
    <x-common.form.text
            wire:model.lazy="editing.name" id="name" name="name"
    />
</x-common.form.group>
<x-common.form.group class="col-span-6 sm:col-span-6" label="Difficulty" for="difficulty"
                     :error="$errors->first('editing.difficulty')">
    <x-common.form.select
            wire:model.lazy="editing.difficulty" id="difficulty" name="difficulty"
    >
        @foreach(\App\Models\Recipe::DIFFICULTY as $value => $description)
            <option value="{{ $value }}">{{ $description }}</option>
        @endforeach
    </x-common.form.select>
</x-common.form.group>

<x-common.form.group class="col-span-6 sm:col-span-6" label="Description" for="description"
                     :error="$errors->first('editing.description')"
                     help-text="Put a brief description about why you like this recipe.">
    <x-common.form.textarea
            wire:model.lazy="editing.description" id="description" name="description"
            :initialValue="$editing->description" rows="6"
    />
</x-common.form.group>
<x-common.form.group class="col-span-6 sm:col-span-6" label="Instructions" for="instructions"
                     :error="$errors->first('editing.instructions')" help-text="How do you create this thing?">
    <x-common.form.textarea
            wire:model.lazy="editing.instructions" id="instructions" name="instructions"
            :initialValue="$editing->description" rows="6"
    />
</x-common.form.group>

<x-common.form.group class="col-span-3 sm:col-span-3" label="Prep Time" for="prep_time"
                     :error="$errors->first('editing.prep_time')">
    <x-common.form.text-minutes
            wire:model.lazy="editing.prep_time" id="prep_time" name="prep_time"
    />
</x-common.form.group>

<x-common.form.group class="col-span-3 sm:col-span-3" label="Cook Time" for="cook_time"
                     :error="$errors->first('editing.cook_time')">
    <x-common.form.text-minutes
            wire:model.lazy="editing.cook_time" id="cook_time" name="cook_time"
    />
</x-common.form.group>
<x-common.form.group class="col-span-6 sm:col-span-6" label="Created" for="date_for_editing"
                     :error="$errors->first('editing.date_for_editing')">
    <x-common.form.date-picker
            wire:model.lazy="editing.date_for_editing" id="date_for_editing" name="date_for_editing"
            placeholder="01/01/2021"
    />
</x-common.form.group>
{{--                @php--}}
{{--                    dd($recipe)--}}
{{--                @endphp--}}
