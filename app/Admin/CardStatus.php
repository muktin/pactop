<?php

namespace App\admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class CardStatus extends Model
{
    //table name specify
    protected $table = 'card_status';

    // Filable columns specify
    protected $fillable = [
        'status_name', 'code', 'status', 'created_by', 'updated_by'
       ];
}
