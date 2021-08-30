<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $table = "grades";

    protected $primaryKey = 'grade_id';
 
    protected $fillable = ['user_id','document_id','code','courses','scu','grade','grade_num'];
}
