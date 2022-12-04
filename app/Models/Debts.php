<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;


class Debts extends Model
{
    use HasFactory,HasApiTokens;
    protected $fillable = ['finance_type','finance_name','finance_main_amount','benifits_amount','total_amount','notes','user_id'];
    public static function govcount(){
        $gov = Debts::where('finance_type','حكومي')->get();
        return count($gov);
    }
    public static function personcount(){
        $person = Debts::where('finance_type','أشخاص')->get();
        return count($person);
    }
    public static function bankcount(){
        $bank = Debts::where('finance_type','بنوك')->get();
        return count($bank);
    }
    public static function comcount(){
        $bank = Debts::where('finance_type','تجارية')->get();
        return count($bank);
    }

    public static function check($id){
        $user = Debts::where('user_id',$id)->latest()->first();

        if($user){
            return 1;
        }else{
            return 0;
        }

    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
