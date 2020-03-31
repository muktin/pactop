<?php

namespace App\admin;


use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Param extends Model
{
    protected $fillable = [
        'name', 'code', 'value', 'status', 'created_by', 'updated_by'
       ];
}
