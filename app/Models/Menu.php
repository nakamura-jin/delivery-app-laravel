<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Tag;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'discription', 'tag_id', 'price', 'image'];

    public function tag()
    {
        return $this->hasOne(Tag::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'cart_id', 'menu_id', 'user_id', 'order_id');
    }
}
