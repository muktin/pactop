<?php

namespace App\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class CardType extends Model
{
    protected $fillable = [
        'name', 'type', 'status', 'created_by', 'updated_by'
       ]; 
}
