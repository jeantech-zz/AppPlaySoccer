<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['name','level','group'];

    public function teamGroup(): HasMany
    {
        return $this->hasMany(TeamGroup::class);
    }
}
