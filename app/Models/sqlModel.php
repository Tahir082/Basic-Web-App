<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sqlModel extends Model
{
    protected $table = 'sql_models';
    protected $fillable = ['date','trade_code','high','low','open','close','volume'];
}
