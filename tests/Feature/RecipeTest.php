<?php

namespace Tests\Feature;

use App\Http\Livewire\Recipes;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class RecipeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function can_see_livewire_recipe_component_on_recipe_page()
    {
        $this->actingAs($user = User::factory()->create());
        Livewire::test(Recipes::class)
            ->assertSuccessful()
            ->assertSee('Personal Information')
        ;
    }

    /** @test */
    function can_create_recipe()
    {
        $this->actingAs($user = User::factory()->create());
        Livewire::test(Recipes::class)
            ->set('recipe.name', 'My new recipe')
            ->set('recipe.description', 'This is an amazing description you have here. It would be ashamed to see anything happen to it')
            ->call('save');

        ;
    }

}
