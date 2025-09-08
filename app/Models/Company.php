<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /** @use HasFactory<\Database\Factories\CompanyFactory> */
    use HasFactory;
    

    protected $fillable = ['name','reg_number','address','phone','notes'];

    public function clients()
    {
        return $this->hasMany(Client::class);
    }
}
