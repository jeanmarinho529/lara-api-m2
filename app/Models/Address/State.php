<?php

namespace App\Models\Address;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'states';

    protected $fillable = [
        'name',
        'uf'
    ];

}
