<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Override;

#[Fillable(['title', 'completed_date', 'description'])]
class Todo extends Model
{
    #[Override]
    protected function casts(): array
    {
        return [
            'completed_date' => 'date',
        ];
    }
}
