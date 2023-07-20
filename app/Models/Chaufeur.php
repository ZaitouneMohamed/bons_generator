<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chaufeur extends Model
{
    use HasFactory;
    protected $fillable = [
        "full_name",
        "phone",
        "cin"
    ];
    public function Consomations()
    {
        return $this->hasMany(Consomation::class);
    }
}
