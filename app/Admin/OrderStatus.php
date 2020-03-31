<?php

namespace App\admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    //table name specify
    protected $table = 'order_status'; 

    protected $fillable = [
        'status_name', 'code', 'status', 'created_by', 'updated_by'
       ];
}
