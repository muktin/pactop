<?php

namespace App\admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class WorkflowStatus extends Model
{
    //table name specify
    protected $table = 'workflow_status';

    protected $fillable = [
        'status_name', 'code', 'status', 'created_by', 'updated_by'
       ];
}
