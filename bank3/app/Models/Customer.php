<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    const SORT = [
        'asc_name' => 'Name A-Z',
        'desc_name' => 'Name Z-A',
        'asc_surname' => 'Surname A-Z',
        'desc_surname' => 'Surname Z-A',
        'asc_balance' => 'Balance 0-9',
        'desc_balance' => 'Balance 9-0'

    ];
}
