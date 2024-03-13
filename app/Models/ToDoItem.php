<?php

namespace App\Models;

use App\Enum\ToDoItemStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToDoItem extends Model
{
    use HasFactory;

    protected $table = 'to_do_items';

    public function status(): Attribute
    {
        return Attribute::make(
            set: fn (ToDoItemStatus $status) => $status->name,
        );
    }

    public function toDo()
    {
        return $this->belongsTo(ToDo::class);
    }
}
