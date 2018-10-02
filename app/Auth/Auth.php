<?php

namespace App\Auth;

use App\Models\User;
use App\Models\Admin;

class Auth {

    public $adminName;


    public function user(){
        // returns the user details
          return User::find($_SESSION['user']);


        }

        public function admindetails(){
            return Admin::find($_SESSION['admin']);
        }
        public function Allusers(){
            return count(User::where('id','>','0'));
        }

    public function check(){

 return isset($_SESSION['user']);
//  returns true or false
    }

    public function admincheck()
    {
return isset($_SESSION['admin']);
    }


    public function averify($email,$password){
// returns the first row and returns true
        $admin = Admin::where('email',$email)->first();

   if($admin){

        if(password_verify($password,$admin->password)){

            $_SESSION['admin'] = $admin->id;

       return true;
              } else return false;

        }
        return false;
    }



    public function verify($email,$password){
// returns the first row and returns true
        $user = User::where('email',$email)->first();

   if($user){

        if(password_verify($password,$user->password)){

            $_SESSION['user'] = $user->id;

       return true;
              } else return false;

        }
        return false;
    }

    public function logout(){
        // logout users
        unset($_SESSION['user']);
        unset($_SESSION['errors']);

    }

    public function adminlogout(){
        unset($_SESSION['admin']);
    }

}


