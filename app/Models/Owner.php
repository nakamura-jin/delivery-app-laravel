<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;

class Owner extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        // 'password',
        'role_id',
        'uid'
    ];

    public function role()
    {
        return $this->hasOne(Role::class);
    }
}
