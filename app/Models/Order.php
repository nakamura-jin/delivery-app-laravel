<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Order extends Model
{
    use HasFactory;

    protected $casts = ['menu_list' => 'json'];

    protected $guarded = ['id'];

    public function user() {
        return $this->hasOne(User::class);
    }
}
