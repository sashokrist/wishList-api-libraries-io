<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    use HasFactory;

    protected $table = 'lists';

    protected $fillable = ['name', 'description'];

    public function libraries()
    {
        return $this->belongsToMany(Library::class)->withTimestamps();
    }
}
