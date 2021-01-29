<divt>
    <x-slot name="header">
        {{ __('Recipes a single') }}
    </x-slot>

    <x-common.form.form-base formAction="save">
        <x-slot name="header">
            Recipe Information
        </x-slot>
        <x-slot name="body">
            Provide information for your new recipe.
        </x-slot>
        <div class="space-y-5">
            <div>
                <x-common.form.group class="space-x-10" label="Name" for="name" :error="$errors->first('recipe.name')" >
                    <x-common.form.text
                        wire:model.defer="recipe.name" id="name" name="name"
                        {{--                                    autocomplete="family-name"--}}
                        {{--                                    leading-add-on="http://"--}}
                    />
                </x-common.form.group>
            </div>
            <div>
                <x-common.form.group class="" label="Money" for="money" :error="$errors->first('recipe.money')">
                    <x-common.form.text-money-usd
                        wire:model.defer="recipe.money" id="money" name="money" placeholder="0.00"
                    />
                </x-common.form.group>
            </div>
            <div>
                <x-common.form.group class="" label="Email" for="email" :error="$errors->first('recipe.email')">
                    <x-common.form.text-email
                        wire:model.defer="recipe.email" id="email" name="email" placeholder="something@domain.com"
                    />
                </x-common.form.group>
            </div>
            <div>
                <x-common.form.group class="" label="Date" for="created_at"
                                     :error="$errors->first('recipe.created_at')">
                    <x-common.form.date-picker
                        wire:model.lazy="recipe.created_at" id="created_at" name="created_at" placeholder="01/01/2021"
                    />
                </x-common.form.group>
            </div>

            <div>
                <x-common.form.group class="" label="Description" for="description"
                                     :error="$errors->first('recipe.description')"
                                     help-text="Put a brief description about why you like this recipe.">
                    <x-common.form.richtextarea
                        wire:model.lazy="recipe.description" id="description" name="description"
                        :initialValue="$this->recipe->description"
                    />
                </x-common.form.group>
            </div>
        </div>
        <x-slot name="buttons">
            <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Cancel
            </button>
            <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Save
            </button>
        </x-slot>
    </x-common.form.form-base>
</divt>
