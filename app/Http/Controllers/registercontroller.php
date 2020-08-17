<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\people;
use App\admin;
use Session;

class registercontroller extends Controller
{
  
    public function admin_register(Request $req)
    {
      if(!Session::has('adminkey'))
    return redirect('/login_error');
      $name=Session::get('adminkey');
      $req->flash();
      $res=admin::where('name','=',$req->input('adminname'))->get();
     if(count($res)>0)
    {
                echo "
                <script>
                    alert('Admin already exists! Please use another admin name.');
                    window.location='/add_admin';
                </script>";

  }
  else
  {
      if(admin::where('name','=',$name)->where('password','=',$req->input('pass2'))->exists())
      {
        $add=new admin();
        $add->name=$req->input('adminname');
        $add->password=$req->input('pass1');
        $add->phone=$req->input('phone');
        if($add->save())
          echo "<script>
            alert('New admin registered successfully.');
            window.location.href='/adminpage';
            </script>
          ";
        else
          echo "<script>
            alert('Failed to add admin. Please retry.');
            window.location.href='/adminpage';
            </script>
          ";
      }
      else
      {
        echo"<script>
        alert('Please enter yours correct current password as a reason of authuntication.');
        window.location.href='/add_admin';
        </script>
        ";
      }

    }
  }

  public function user_register(Request $req)
  { 
  $req->flash();
  $res=people::where('name','=',$req->input('name'))->get();
  if(count($res)>0)
  {
                echo "
                <script>
                    alert('Username already exists! Please use another username.');
                    window.location='/user_register';
                </script>";

  }
  else
  {
  $user=new people();
  $user->name=$req->input('name');
  $user->email=$req->input('email');   
  $user->password=$req->input('pass'); 
  $user->phone=$req->input('phone'); 
  $user->book1=0; 
  $user->book2=0;
  $user->issue1="";
  $user->issue2="";
  $user->return1="";
  $user->return2="";
  if($user->save())
  {
    echo"<script>
    alert('Registration successful.');
    window.location.href='/userlogin';
    </script>
    ";
  }  
  else
    echo"<script>
    alert('Registration failed! Please retry.');
    window.location.href='login';
    </script>";
  }
}
}