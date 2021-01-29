<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Recipe;
use Livewire\Component;
use App\Http\Livewire\Datatables\WithSorting;
use App\Http\Livewire\Datatables\WithCachedRows;
use App\Http\Livewire\Datatables\WithBulkActions;
use App\Http\Livewire\Datatables\WithPerPagePagination;

class RecipesList extends Component
{
    use WithPerPagePagination, WithSorting, WithBulkActions, WithCachedRows;

    public bool $editPublicShowSidebar = false;
    public bool $showDeleteModal = false;
    public bool $showFilters = false;
    public Recipe $editing;
    public array $filters = [
        'difficulty' => '',
        'total_time-min' => null,
        'total_time-max' => null,
        'date-min' => null,
        'date-max' => null,
        'search' => ''
    ];

    protected $listeners = ['refreshRecipes' => '$refresh'];


    public function rules()
    {
        return [
            'editing.name' => 'required|string|min:3',
            'editing.description' => 'required|string',
            'editing.instructions' => 'required|string',
            'editing.difficulty' => 'required|in:' . collect(Recipe::DIFFICULTY)->keys()->implode(','),
            'editing.cook_time' => 'required|integer',
            'editing.prep_time' => 'required|integer',
            'editing.date_for_editing' => 'required|date',
        ];
    }

    public function mount() { $this->editing = $this->makeBlankModel(); }

    public function makeBlankModel() { return Recipe::make(['created_at' => now(), 'difficulty' => 'easy']); }

    public function getRowsQueryProperty()
    {
        $query = Recipe::query()
            ->when($this->filters['difficulty'], fn($query, $difficulty) => $query->where('difficulty', $difficulty))
            ->when($this->filters['total_time-min'], fn($query, $total_time_min) => $query->where('total_time', '>=', $total_time_min))
            ->when($this->filters['total_time-max'], fn($query, $total_time_max) => $query->where('total_time', '<=', $total_time_max))
            ->when($this->filters['date-min'], fn($query, $date_min) => $query->where('created_at', '>=', Carbon::parse($date_min)))
            ->when($this->filters['date-max'], fn($query, $date_max) => $query->where('created_at', '<=', Carbon::parse($date_max)))
            ->when($this->filters['search'], fn($query, $search) => $query->where('name', 'like', '%' . $search . '%'));

        return $this->applySorting($query);
    }
    public function getRowsProperty()
    {
        return $this->cache(function () {
            return $this->applyPagination($this->rowsQuery);
        });
    }

    public function resetFilters() { $this->reset('filters'); }

    public function updatedFilters() { $this->resetPage(); }

    public function save()
    {
        $this->validate();
        $this->editing->user_id = auth()->user()->id;
        $this->editing->total_time = $this->editing->prep_time + $this->editing->cook_time;
        $this->editing->save();
        $this->editPublicShowSidebar = false;

        $this->notify('Recipe saved!');
    }

    public function toggleShowFilters()
    {
        $this->useCachedRows();

        $this->showFilters = ! $this->showFilters;
    }

    public function create()
    {
        $this->useCachedRows();
        if ($this->editing->getKey()) $this->editing = $this->makeBlankModel();
        $this->editPublicShowSidebar = true;
    }

    public function edit(Recipe $recipe)
    {
        $this->useCachedRows();
        if ($this->editing->isNot($recipe)) $this->editing = $recipe;
        $this->editPublicShowSidebar = true;
    }

    public function deleteSelected()
    {
        $this->selectedRowsQuery->delete();
        $this->updatedSelected();
        $this->showDeleteModal = false;
    }

    public function exportSelected()
    {
        return response()->streamDownload(function(){
            echo $this->selectedRowsQuery->toCsv();
        }, 'recipes.csv');
    }

    public function render()
    {
        return view('livewire.recipes-list', [
                'recipes' => $this->rows
            ]
        );
    }

}
