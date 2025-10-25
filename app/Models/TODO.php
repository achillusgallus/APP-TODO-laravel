<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TODO extends Model
{
    //
    protected $fillable = ['task', 'completed'];

public function user()
{
    return $this->belongsTo(User::class);
}
}
