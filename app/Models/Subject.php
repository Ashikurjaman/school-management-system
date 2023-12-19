<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Subject extends Model
{
    protected $table = 'subjects';

    protected $fillable = [
        'name',
        'status'

    ];


    static function subData(){
        $return =  self::select('subjects.*','users.name as created_by_name')
        ->join('users','users.id','subjects.created_by')->where('subjects.void','=',1)->where('subjects.status','=',1);


        if(!empty( Request::get('name'))){

            $return = $return->where('subjects.name','like','%'.Request::get('name').'%');

        }
        if(!empty( Request::get('date'))){

            $return = $return->whereDate('subjects.created_at','=',Request::get('date'));

        }
        $return = $return->paginate(10);



        return $return;
    }

    static function subjectEditData($id){
        return self::find($id);

    }
}
