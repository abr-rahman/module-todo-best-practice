<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    protected $table = ('task');
    protected $dates = ['deleted_at'];
    protected static function newFactory()
    {
        return \Modules\Blog\Database\factories\TaskFactory::new();
    }
}
