<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipe extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    protected $appends = ['date_for_editing'];

    const DIFFICULTY =[
        'easy' => 'Easy, you can boil water right?',
        'normal' => 'Normal... you got this!',
        'medium' => 'A bit more complex',
        'hard' => 'This is a hard one',
        'master' => 'Master Chef Experience',
        ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getCarbonCreatedAt()
    {
        return Carbon::createFromTimeString($this->created_at);
    }

    public function getDateForEditingAttribute()
    {
        return $this->created_at->format('m/d/Y');
    }

    public function setDateForEditingAttribute($value)
    {
        $this->created_at = Carbon::parse($value);
    }

    public function getDifficultyColorAttribute()
    {
        return [
                'easy' => 'fuchsia',
                'normal' => 'indigo',
                'medium' => 'cyan',
                'hard' => 'lime',
                'master' => 'amber',
            ][$this->difficulty] ?? 'cool-gray';
    }

    public function getTotalTimeCalculatedAttribute()
    {
//        $this->total_time = $this->prep_time + $this->cook_time;
        return $this->total_time ?: $this->prep_time + $this->cook_time;

    }

}
