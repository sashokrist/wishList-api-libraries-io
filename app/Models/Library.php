<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'url'];

    public function wishLists()
    {
        return $this->belongsToMany(WishList::class)->withTimestamps();
    }
}
