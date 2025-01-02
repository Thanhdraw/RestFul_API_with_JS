<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $fillable = ['name'];
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    // Quan hệ nhiều-nhiều với Customer
    public function customers()
    {
        return $this->belongsToMany(Customer::class, 'role_id', 'customer_id');
    }
}
