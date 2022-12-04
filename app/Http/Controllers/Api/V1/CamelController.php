<?php

namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Verfication;
use Illuminate\Support\Carbon;


use Illuminate\Http\Request;

class CamelController extends Controller
{
    //
    public function Register(Request $request){

        $request->validate([
            'phone' => 'required',
        ]);

        $driver = User::where('phone',$request->phone)->where('user_type',2)->first();
        if($driver){
            $otp = $this->generateOtp($driver->phone);
        }else{
            $user = User::create([

                'phone' => $request->phone,
                'user_type' => 2,

            ]);

            $token = $user->createToken('myapptoken')->plainTextToken;

            $otp = $this->generateOtp($request->phone);


        }


        if($otp){
            $otp_msg = 'تم ارسال كود التخقق الى هاتفك';
        }else{
            $otp_msg = 'no otp generated';
        }


        $response = [

            'Message' => 'registerd successfuly',
            'otp message' => $otp_msg,
            'data'=> $user,
            'token' => $token,

            'otp code' => $otp->otp_code,


        ];


        return response($response,201);


    }
    public function generateOtp($phone){
        $user = User::where('phone',$phone)->first();
        $code = Verfication::where('user_id',$user->id)->latest()->first();

        $current_time =Carbon::now();

        if($code && $current_time->isBefore($code->expire_ate)){

            return $code;

        }


        return Verfication::create([
            'user_id' => $user->id,
            'otp_code' => rand(0000, 9999),
            'expire_at' => Carbon::now()->addMinutes(10),
        ]);
    }
    public function verify(Request $request){

        $request->validate([
            'otp' => 'required|exists:verfications,otp_code'
        ]);


        $otp = Verfication::where('user_id',$request->user()->id)->where('otp_code',$request->otp)->latest()->first();
        $now = Carbon::now()->addHours(2);

        // if($otp && $now->isAfter($otp->expire_at)){

        //     return response('otp is not valid',422);

        // }

        if($otp){
            $user = User::where('id',$request->user()->id)->first();
            $user->verified = 1;
            $user->save();



            $response = [

                'Message' => 'تم التحقق من هاتفك بنجاح',
            ];

            return response($response,201);
        }else{
            return response(' رقم تحقق خاطئ',422);
        }





    }
    public function name(Request $request){
        $request->validate([
            'name' => 'required',
        ]);


        $user = User::find($request->user()->id);

        $user->update([
            'name' => $request->name,
        ]);

        return response('data stored',201);

    }
    public function logout(Request $request){
        $request->validate([
            'destroy' => 'required|boolean',
        ]);
        if($request->destroy == 0){
            auth()->user()->tokens()->delete();






            return [
                'messege' =>'Logged out'
            ];

        }else{
            auth()->user()->tokens()->delete();
            User::find($request->user()->id)->delete();


            return [
                'messege' =>'user deleted'
            ];


        }

    }
}
