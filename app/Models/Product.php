<?php

namespace App\Models;

use App\Traits\HasLiveStatus;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasLiveStatus;
}
