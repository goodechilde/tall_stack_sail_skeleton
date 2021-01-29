<?php

namespace App\Http\Livewire\Datatables;

trait WithBulkActions
{

    public bool $selectPage = false;
    public bool $selectAll = false;
    public $selected = [];

    public function renderingWithBulkActions(): void
    {
        if ($this->selectAll) $this->selectPageRows();
    }

    public function updatedSelected(): void
    {
        $this->selectAll = false;
        $this->selectPage = false;
    }

    public function updatedSelectPage($value)
    {
        if($value) return $this->selectPageRows();

        $this->selectAll = false;
        $this->selected = [];
    }

    public function selectAll()
    {
        $this->selectAll = true;
    }

    public function getSelectedRowsQueryProperty()
    {
        return (clone $this->rowsQuery)
            ->unless($this->selectAll, fn($query) => $query->whereKey($this->selected));
    }

    public function selectPageRows(): void
    {
        $this->selected = $this->rows->pluck('id')->map(fn($id) => (string) $id);
    }
}
