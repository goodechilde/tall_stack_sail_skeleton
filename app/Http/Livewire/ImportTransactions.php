<?php

namespace App\Http\Livewire;

use App\Csv;
use App\Models\Recipe;
use Illuminate\Support\Arr;
use Livewire\Component;
use Livewire\WithFileUploads;
use Validator;

class ImportTransactions extends Component
{
    use WithFileUploads;

    public bool $showSidebar = false;
    public $upload;
    public $columns;
    public array $fieldColumnMap = [
        'name' => '',
        'description' => '',
        'instructions' => '',
        'prep_time' => '',
        'cook_time' => '',
        'difficulty' => '',
    ];

    protected $rules = [
        'fieldColumnMap.name' => 'required',
        'fieldColumnMap.description' => 'required',
        'fieldColumnMap.instructions' => 'required',
        'fieldColumnMap.prep_time' => 'required',
        'fieldColumnMap.cook_time' => 'required',
        'fieldColumnMap.difficulty' => 'sometimes',
    ];

    protected $customAttributes = [
        'fieldColumnMap.name' => 'name',
        'fieldColumnMap.description' => 'description',
        'fieldColumnMap.instructions' => 'instructions',
        'fieldColumnMap.prep_time' => 'prep time',
        'fieldColumnMap.cook_time' => 'cook time',
        'fieldColumnMap.difficulty' => 'difficulty',
    ];

    public function updatingUpload($value)
    {
        Validator::make(
            ['upload' => $value],
            ['upload' => 'required|mimes:txt,csv']
        )->validate();
    }

    public function updatedUpload()
    {
        $this->columns = Csv::from($this->upload)->columns();
        $this->columns = Arr::where($this->columns, function ($value, $key) {
            if($value !== 'id' && $value !== 'user_id' && $value !== 'created_at' && $value !== 'deleted_at' && $value !== 'updated_at') return $value;
        });
        $this->guessWhichColumnsMapToWhichFields();
    }

    public function import()
    {
        $this->validate();

        $importCount = 0;

        Csv::from($this->upload)
            ->eachRow(function ($row) use (&$importCount) {
                Recipe::create(
                    $this->extractFieldsFromRow($row)
                );

                $importCount++;
            });

        $this->reset();

        $this->emit('refreshRecipes');

        $this->notify('Imported '.$importCount.' recipes!');
    }
    public function extractFieldsFromRow($row)
    {
        $attributes = collect($this->fieldColumnMap)
            ->filter()
            ->mapWithKeys(function($heading, $field) use ($row) {
                return [$field => $row[$heading]];
            })
            ->toArray();

        return $attributes + ['user_id' => auth()->user()->id];
    }

    public function guessWhichColumnsMapToWhichFields()
    {
        $guesses = [
            'name' => ['name', 'recipe_name', 'recipe name'],
            'description' => ['description', 'explanation','intro_copy','introduction'],
            'instructions' => ['instructions', 'directions'],
            'prep_time' => ['prep_time', 'prep time'],
            'cook_time' => ['cook_time', 'cook time'],
            'difficulty' => ['difficulty', 'how hard'],
        ];

        foreach ($this->columns as $column) {
            $match = collect($guesses)->search(fn($options) => in_array(strtolower($column), $options));

            if ($match) $this->fieldColumnMap[$match] = $column;
        }
    }

    public function clearFile()
    {
        $this->upload = null;
    }
}
