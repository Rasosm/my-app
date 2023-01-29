<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    const SORT = [
        'asc_surname' => 'Pavardė A-Z',
        'desc_surname' => 'Pavardė Z-A',
        'asc_name' => 'Vardas A-Z',
        'desc_name' => 'Vardas Z-A',
        'asc_balance' => 'Likutis 0-9',
        'desc_balance' => 'Likutis 9-0'

    ];

    const PER_PAGE = [
        'visi', 4, 8, 24, 48
    ];
}
