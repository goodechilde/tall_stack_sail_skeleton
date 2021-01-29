<?php

namespace App\Http\Livewire;

use App\Models\Recipe;
use Livewire\Component;

class RecipeSingle extends Component
{
    public Recipe $recipe;

    protected array $rules = [
      'recipe.name' => 'required|string|min:4',
      'recipe.description' => 'required|string',
      'recipe.created_at' => 'required',
    ];


    public function render()
    {
        return view('livewire.recipe-single');
    }

    public function save()
    {
        $this->validate();
        $this->recipe->user_id = auth()->user()->id;
        $this->recipe->update();

        $this->notify('Recipe saved!');
    }
}
