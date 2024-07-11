<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Provider extends Model
{

    use HasFactory;
    protected $fillable = [
        "name",
        "phone_number",
        "email"
    ];

    public static $rules = [
        "name" => "required",
        "phone_number" => "nullable",
        "email" => "required"
    ];
}
