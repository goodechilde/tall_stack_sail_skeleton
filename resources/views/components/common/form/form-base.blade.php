<div class="space-y-6">
    <form wire:submit.prevent="save">
        <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Recipe Information</h3>
                    <p class="mt-1 text-sm text-gray-500">
                        Provide information for your new recipe.
                    </p>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                        <div class="grid grid-cols-6 gap-6">
                            <x-common.form.group class="col-span-6 sm:col-span-6" label="Name" for="name" :error="$errors->first('recipe.name')" >
                                <x-common.form.text
                                    wire:model.defer="recipe.name" id="name" name="name"
{{--                                    autocomplete="family-name"--}}
{{--                                    leading-add-on="http://"--}}
                                />
                            </x-common.form.group>
                            <x-common.form.group class="col-span-6 sm:col-span-6" label="Money" for="money" :error="$errors->first('recipe.money')" >
                                <x-common.form.text-money-usd
                                    wire:model.defer="recipe.money" id="money" name="money" placeholder="0.00"
                                />
                            </x-common.form.group>
                            <x-common.form.group class="col-span-6 sm:col-span-6" label="Email" for="email" :error="$errors->first('recipe.email')" >
                                <x-common.form.text-email
                                    wire:model.defer="recipe.email" id="email" name="email" placeholder="something@domain.com"
                                />
                            </x-common.form.group>
                            <x-common.form.group class="col-span-6 sm:col-span-6" label="Date" for="created_at" :error="$errors->first('recipe.created_at')" >
                                <x-common.form.date-picker
                                    wire:model.lazy="recipe.created_at" id="created_at" name="created_at" placeholder="01/01/2021"
                                />
                            </x-common.form.group>

                            <x-common.form.group class="col-span-6 sm:col-span-6" label="Description" for="description" :error="$errors->first('recipe.description')" help-text="Put a brief description about why you like this recipe.">
                                <x-common.form.richtextarea
                                    wire:model.lazy="recipe.description" id="description" name="description" :initialValue="$this->recipe->description"
                                />
                            </x-common.form.group>
                        </div>
                </div>
            </div>
        </div>
        <div class="flex justify-end pt-3">
            <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Cancel
            </button>
            <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Save
            </button>
        </div>
    </form>
</div>
