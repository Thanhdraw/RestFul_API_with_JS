<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'customer_id', 'role_id');
    }
}
