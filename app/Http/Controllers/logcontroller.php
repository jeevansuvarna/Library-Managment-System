<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\people;
use App\admin;
use App\library;
use Session;
use File;
use Carbon\Carbon;
use Illuminate\Routing\Redirector;

class logcontroller extends Controller{

  public function verify_user_login(Request $req)
  {
    if(people::where('name','=',$req->input('name'))->where('password','=',$req->input('pass'))->exists())
    { 
      Session::put('userkey',$req->input('name'));
      return redirect('/userpage');
    }
    else
      echo"<script>
        alert('Invalid login details.');
        window.location.href='/userlogin';
        </script>
        ";
  }


  public function verify_admin_login(Request $req)
  {
    if(admin::where('name',$req->input('name'))->where('password',$req->input('pass'))->exists())
    {  
      Session::put('adminkey',$req->input('name'));
      return redirect('/adminpage');
  }
  else
    echo"<script>
    alert('Invalid admin login details.');
    window.location.href='/adminlogin';
    </script>
    ";
  }


  public function adminlogout()
  {
     if(!Session::has('adminkey')) return redirect('/login_error');
        Session::forget('adminkey');
        echo "
            <script>
            alert('Successfully logged out.');
            window.location='/home';
            </script>";
  }

  public function update_admin_password(Request $req)
  {
    if(!Session::has('adminkey'))
        return redirect('/login_error');
    $name=Session::get('adminkey');
    if(admin::where('password',$req->input('cpass'))->where('name',$name)->exists())
    {

      if(strcmp($req->input('cpass'),$req->input('pass'))==0)
      {
        echo "<script>
          alert('New password should be different from old password !');
          window.location.href='/change_adminpassword';
          </script>
        ";
      }
      else
      {
        $update=admin::where('name','=',$name)->update(['password'=>$req->input('pass')]);
        if($update==true)
          echo "<script>
            alert('Password successfully changed.');
            window.location.href='/adminpage';
            </script>
          ";
        else
          echo "<script>
            alert('Failed to change the password. Please retry.');
            window.location.href='/change_adminpassword';
            </script>
          ";
      }
    }
    else
    {
         echo "<script>
         alert('Invalid current password.');
          window.location.href='/change_adminpassword';
          </script>
        ";
    }
  }

  public function delete_admin()
  {
     if(!Session::has('adminkey'))
        return redirect('/login_error');
     $name=Session::get('adminkey');
     $admincount=admin::all()->count();
     if($admincount > 1)
     {
        $delete=admin::where('name','=',$name)->delete();
        if($delete==true)
        {
          Session::forget('adminkey');
          echo "<script>
            alert('Account deleted successfully.');
            window.location.href='/home';
            </script>
          ";
        }
        else
          echo "<script>
            alert('Failed to delete your account. Please retry.');
            window.location.href='/adminpage';
            </script>
          ";
     }
     else
     {
      echo "<script>
            alert('You cannot delete your account because you are the only admin of library management. Please add other authorised admin before deleting your account.');
            window.location.href='/adminpage';
            </script>
          ";
     }
  }

  public function userlogout()
  {
     if(!Session::has('userkey')) return redirect('/login_error');
        Session::forget('userkey');
        echo "
            <script>
            alert('Successfully logged out.');
            window.location='/home';
            </script>";
  }

  public function update_user_password(Request $req)
  {
    if(!Session::has('userkey'))
        return redirect('/login_error');
    $name=Session::get('userkey');
    if(people::where('password',$req->input('cpass'))->where('name',$name)->exists())
    {

      if(strcmp($req->input('cpass'),$req->input('pass'))==0)
      {
        echo "<script>
          alert('New password should be different from old password !');
          window.location.href='/change_userpassword';
          </script>
        ";
      }
      else
      {
        $update=people::where('name','=',$name)->update(['password'=>$req->input('pass')]);
        if($update==true)
          echo "<script>
            alert('Password successfully changed.');
            window.location.href='/userpage';
            </script>
          ";
        else
          echo "<script>
            alert('Failed to change the password. Please retry.');
            window.location.href='/change_userpassword';
            </script>
          ";
      }
    }
    else
    {
         echo "<script>
         alert('Invalid current password.');
          window.location.href='/change_userpassword';
          </script>
        ";
    }
  }

  public function showprofile()
  {
    if(!Session::has('userkey'))
        return redirect('/login_error');
    else
    {
    $n=Session::get('userkey');
    $res=people::where('name','=',$n)->get();
    $id1=people::where('name','=',$n)->value('book1');
    $id2=people::where('name','=',$n)->value('book2');
    $b1="";
    $b2="";
    $b1=library::where('id','=',$id1)->get();
    $b2=library::where('id','=',$id2)->get();
    $book1=library::where('id','=',$id1)->value('book_name');
    $book2=library::where('id','=',$id2)->value('book_name');
    $now=Carbon::now();
    if($book1!=""){
       $date1=people::where('name','=',$n)->value('return1');
       $date1=Carbon::parse($date1);
        if($now->greaterThan($date1))   $s1=1; else $s1=0;
        $due1=$now->diffInDays($date1);
    }
    if($book2!=""){
    $date2=people::where('name','=',$n)->value('return2');
    $date2=Carbon::parse($date2);
    if($now->greaterThan($date2)) $s2=1; else $s2=0;
    $due2=$now->diffInDays($date2);}
    return view('/profile',compact('res','b1','b2','book1','book2','s1','s2','due1','due2'));
    }
  }

  public function delete_user()
  {
     if(!Session::has('userkey'))
        return redirect('/login_error');
       $name=Session::get('userkey');
       if(!people::where('name','=',$name)->where('book1','=',0)->where('book2','=',0)->exists())
       {
        echo "<script>
            alert('You are having borrowed books with you. You are not allowed to delete account unless books are returned. Please return the books and then delete your account.');
            window.location.href='/userpage';
            </script>
          ";
       }else{
       $file_name=people::where('name','=',$name)->value('image');
      $delete=people::where('name','=',$name)->delete();
      if($delete==true)
      {
          $destinationPath='assets/profile_images/';
          File::delete($destinationPath.$file_name);
          Session::forget('userkey');
          echo "<script>
            alert('Account deleted successfully.');
            window.location.href='/home';
            </script>
          ";
        }
        else
          echo "<script>
            alert('Failed to delete your account. Please retry.');
            window.location.href='/userpagepage';
            </script>
          ";
        }
  }

  public function upload(Request $req)
  {
    if(!Session::has('userkey'))
        return redirect('/login_error');
    $image=$req->file('image');
    $user=Session::get('userkey');
    if($image!=""){
    $name=$image->getClientOriginalExtension();
    $id=people::where('name','=',$user)->value('id');
    $name=$user.$id.".".$name;}
    else
      $name="";
    $file_name=people::where('name','=',$user)->value('image');
    $update=people::where('name','=',$user)->update(['image'=>$name]);
    if($update==true)
        {
            $destinationPath='assets/profile_images';
          if($image!="")  {
               $image->move($destinationPath,$name);
               echo"<script>
            alert('Profile photo uploaded successfully.');
            window.location.href='/profile';
            </script>";}
             else{
                File::delete($destinationPath.'/'.$file_name);
                echo"<script>
            alert('Profile photo removed.');
            window.location.href='/profile';
            </script>";
             }
            
        }
        else
        {
            echo"<script>
            alert('Unable to update photo. Please try again later.');
            window.location.href='/profile';
            </script>";
        }
  }


}