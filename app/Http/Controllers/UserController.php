<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    function register(Request $req)
    {
        $user= new User;
        $user->firstname=$req->input('firstname');
        $user->middlename=$req->input('middlename');
        $user->lastname=$req->input('lastname');
        $user->email=$req->input('email');
        $user->password=Hash::make($req->input('password'));

        $user->gender=$req->input('gender');
        $user->birthmonth=$req->input('birthmonth');
        $user->birthday=$req->input('birthday');
        $user->birthyear=$req->input('birthyear');
        
        $user->phone=$req->input('phone');
        $user->address=$req->input('address'); 

        $user->image=$req->file('image')->store('usersimage');

        $user->save();

        return response() -> json([
            'status'=>200,
            'message'=>'User Added Successfully',
        ]);
    }

    function login(Request $req)
    {
        $user= User::where('email',$req->email)->first();
        if(!$user || !Hash::check($req->password,$user->password))
        {
            return response()->json(["error"=>"Email or password is not matched"],400);;
        }
        return response()->json(["user"=> $user],200);;
    } 


    
    function list()
    {

        return User::all();
    }


    function delete($id)
    {
        $result = User::where('id', $id)->delete();
        if ($result)
        {
            return ["result " => "product has been deleted"];
        }
        else{
            return ["result " => "Operation Failed"];
        } 
    }



    function edit($id)
    {
        $user = User::find($id);

        return response()-> json([
            'status'=>200,
            'student'=>$user
        ]);
    }




        function profile($id)
        {
            $user = User::find($id);

            return response()-> json([
                'status'=>200,
                'student'=>$user
            ]);
        }




        

        function update(Request $req, $id)
        {
 
        
            $user= User::find($id);
            if($user){
            $user->firstname=$req->input('firstname');
            $user->lastname=$req->input('lastname');
            $user->middlename=$req->input('middlename');
            $user->email=$req->input('email');
            $user->password=Hash::make($req->input('password'));
            $user->gender=$req->input('gender');
            $user->birthmonth=$req->input('birthmonth');
            $user->birthday=$req->input('birthday');
            $user->birthyear=$req->input('birthyear');
            $user->phone=$req->input('phone');
            $user->address=$req->input('address');
            $user->update();
        
                
                return response()->json(
                    [
                        'status'=> 200,
                        'message' => "Profile Updated Successfully",
                    ]
                    );
                    
                }
                
         
}





    
}
