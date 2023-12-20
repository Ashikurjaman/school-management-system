<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectClassModel extends Model
{
    use HasFactory;

    protected $table = 'class_subject';

    static function classGetData(){
        return self::get();
    }
}
