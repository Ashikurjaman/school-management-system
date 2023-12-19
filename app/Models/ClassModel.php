<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class ClassModel extends Model
{

    protected $table = 'class';
    protected $fillable = [
        'name',
        'status'

    ];


    static function classGetData(){
        $return =  self::select('class.*','users.name as created_by_name')
        ->join('users','users.id','class.created_by')->where('class.void','=',1)->where('class.status','=',1);


        if(!empty( Request::get('name'))){

            $return = $return->where('class.name','like','%'.Request::get('name').'%');

        }
        if(!empty( Request::get('date'))){

            $return = $return->whereDate('class.created_at','=',Request::get('date'));

        }
        $return = $return->paginate(10);



        return $return;

    }

    static function userEditData($id){
        return self::find($id);
    }

}
