<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $fillable = ['first_name', 'last_name', 'company', 'email', 'phone', 'created_at', 'updated_at', 'password', 'created_by_id', 'updated_by_id'];
}
