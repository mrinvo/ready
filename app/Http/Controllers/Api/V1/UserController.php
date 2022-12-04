<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\UserRequest;
use App\Models\Debts;
use App\Models\Rule;
use App\Models\User;
use App\Models\Verfication;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $request){
        $fields = $request->validate([



            'phone' => 'required|exists:users,phone',


        ]);

        $user = User::where('phone',$fields['phone'])
        ->first();
        //check email


        //check password
        if(!$user){

            return response([
                'message' => 'بينات خاطئة'
            ],401);

        }

        $user->verified = 0;
        $user->save();

        $token = $user->createToken('myapptoken')->plainTextToken;
        $otp = $this->generateOtp($request->phone);

        if($otp){
            $otp_msg = 'تم ارسال كود التخقق الى هاتفك';
        }else{
            $otp_msg = 'no otp generated';
        }


        $response = [
            'message' => 'logged in successfuly',
            'user' => $user,
            'token' => $token,
            'otp_msg' => $otp_msg,
            'otp_code' => $otp->otp_code,

        ];

        return response($response,201);
    }

    public function Register(UserRequest $request){
        $request->verified = 0;

        $user = User::create($request->all());

        $token = $user->createToken('myapptoken')->plainTextToken;

        $otp = $this->generateOtp($request->phone);

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

    public function Regenerate(Request $request){

        $user = User::where('id',$request->user()->id)->first();
        $code = $this->generateOtp($user->phone);

        if($code){
            return response('otp regenerated successfuly');
        }
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

    public function rules(){
        $rules = Rule::find(1);

        $response = [
            'status' => true,
            'StatusCode' => 201,
            'message' => 'your rules and personal id key ',
            'data' => $rules,

        ];

        return response($response,201);
    }

    public function updaterules(Request $request){

        $request->validate([
            'key' => 'required|boolean',
            'rules' => 'required'

        ]);

        $data = Rule::find(1);

            $data->key = $request->key;
            $data->rules = $request->rules;



        $data->save();

        $response = [
            'status' => true,
            'StatusCode' => 201,
            'message' => 'your rules and personal id key are updated ',
            'data' => $data,

        ];

        return response($response,201);



    }

    public function updateprofile(Request $request){

        $request->validate([

            'name' => 'max:150',
            'email'=>'required|email:rfc,dns',
            'phone' => 'required|numeric',
            'personal_id' => 'numeric',

        ]);

        $data = User::find($request->user()->id);

            $data->name = $request->name;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->personal_id = $request->personal_id;



        $data->save();

        $response = [
            'status' => true,
            'StatusCode' => 201,
            'message' => 'your profile is updated ',
            'data' => $data,

        ];

        return response($response,201);



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

    public function profile(Request $request)
    {
        # code...

        $user = User::find($request->user()->id);
        $debt = Debts::where('user_id',$user->id)->get();

        $response = [
            'status' => true,
            'StatusCode' => 201,
            'message' => 'بينات الشخصية',
            'user' => $user,
            'debt' => $debt,

        ];

        return response($response,201);


    }





}
