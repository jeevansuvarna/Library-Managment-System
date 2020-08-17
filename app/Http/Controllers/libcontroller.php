<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\library;
use App\people;
use Session;
use File;
use Illuminate\Routing\Redirector;

class libcontroller extends Controller
{
    public function add_book(Request $req)
    { 
        if(!Session::has('adminkey'))
        return redirect('/login_error');
    $genre=""; $copies=0; $edition=1; $summary="";
    if($req->input('genre')!="") $genre=$req->input('genre');
    if($req->input('copies')!="") $copies=$req->input('copies');
    if($req->input('ed')!="") $edition=$req->input('ed');
    if($req->input('description')!="") $summary=$req->input('description');
     if(library::where('book_name','=',$req->input('name'))->where('Author_name','=',$req->input('author'))->where('edition','=',$edition)->where('genre','=',$genre)->exists())
       {
         $id=library::where('book_name','=',$req->input('name'))->where('Author_name','=',$req->input('author'))->where('edition','=',$edition)->where('genre','=',$genre)->value('id');
         $c = library::where('id','=',$id)->first()->copies;
         $copies=$copies+$c;
         $image=$req->file('image');
         if($image!="")
         {
            $name=$image->getClientOriginalExtension();
              $name="book".$id.".".$name;
              $update=library::where('id','=',$id)->update(['copies'=>$copies, 'image'=>$name]);
         }
         else
            $update=library::where('id','=',$id)->update(['copies'=>$copies]);
        
        if($update==true)
        {
            if($image!="")
            {
                $destinationPath='assets/book_images';
              $image->move($destinationPath,$name);
            }
            echo"<script>
            alert('Insertion successful.');
            window.location.href='/adminpage';
            </script>";
        }
        else
        {
            $req->flash();
            echo"<script>
            alert('Insertion failed. Please try again');
            window.location.href='/adminpage';
            </script>";
        }
    } 
    else
    {    
        $image=$req->file('image');
        $book_name=$req->input('name');
        $book=new library(); 
        $book->book_name=$book_name;
        $book->Author_name=$req->input('author');   
        $book->edition=$edition; 
        $book->genre=$genre; 
        $book->summary=$summary; 
        $book->copies=$copies; 
        $book->image="no-image";
        if($book->save())
        {
            $id=library::where('book_name','=',$book_name)->where('image','=','no-image')->value('id');
            if($image!=""){
              $name=$image->getClientOriginalExtension();
              $name="book".$id.".".$name;
              $destinationPath='assets/book_images';
              $image->move($destinationPath,$name);
              $update=library::where('id','=',$id)->update(['image'=>$name]);
            }
            else{
                $update=library::where('id','=',$id)->update(['image'=>' ']);
            }
            echo"<script>
                alert('Book added successfully.');
                window.location.href='/adminpage';
            </script>
            ";
        } 
        else{
             $req->flash();
        echo"<script>
            alert('Insertion failed. Please try again later.');
            window.location.href='/adminpage';
            </script>"; }
    }
  }

public function describe($id)
{
        if(!Session::has('userkey'))
        return redirect('/login_error');
        $res=library:: where('id','=',$id)->get();
        return view('describe',compact('res'));
}

public function borrow(Request $req)
{
if(!Session::has('userkey'))
        return redirect('/login_error');
$n=Session::get('userkey');
if(people::where('name','=',$n)->where('book1',0)->exists())
{
$update=people::where('name','=',$n)->update(['book1'=>$req->input('id')]); 
$c = library::where('id',$req->input('id'))->first()->copies;
$c=$c-1;
$update1=library::where('id','=',$req->input('id'))->update(['copies'=>$c]);
$d=date("Y-m-d"); 
$update2=people::where('name','=',$n)->update(['issue1'=>$d]); 
$r= date('Y-m-d', strtotime($d. ' + 15 days'));
$update3=people::where('name','=',$n)->update(['return1'=>$r]); 
echo"<script>
alert('Success! You must return book within 15.');
    window.location.href='/books';
</script>
"; 
}
 else if(people::where('name','=',$n)->where('book2',0)->exists())
{
$update=people::where('name','=',$n)->update(['book2'=>$req->input('id')]); 
$c = library::where('id',$req->input('id'))->first()->copies;
$c=$c-1;
$update1=library::where('id','=',$req->input('id'))->update(['copies'=>$c]); 
$d=date("Y-m-d"); 
$update2=people::where('name','=',$n)->update(['issue2'=>$d]); 
$r= date('Y-m-d', strtotime($d. ' + 15 days'));
$update3=people::where('name','=',$n)->update(['return2'=>$r]); 
echo"<script>
alert('Success! You must return book within 15 days.');
    window.location.href='/books';
    </script>
    "; 
}
else  {
echo"<script>
alert('You are allowed to borrow only two books. Please return any book/s in order borrow new one.');
    window.location.href='/books';
    </script>
    "; 
}
}

public function return1( $user_id,$book1_id)
{
    if(!Session::has('adminkey'))
        return redirect('/login_error');
$c = library::where('id','=',$book1_id)->first()->copies;
$c=$c+1;
$update1=library::where('id','=',$book1_id)->update(['copies'=>$c]);
$update2=people::where('id','=',$user_id)->update(['book1'=>0,'issue1'=>"",'return1'=>""]); 
if($update1 && $update2)
echo"<script>
alert('Book returned successfully.');
    window.location.href='/userdetails';
    </script>
    "; 
else
    echo"<script>
alert('Book returned successfully.');
    window.location.href='/userdetails';
    </script>
    "; 
}

public function return2( $user_id,$book2_id)
{
    if(!Session::has('adminkey'))
        return redirect('/login_error');
$c = library::where('id','=',$book2_id)->first()->copies;
$c=$c+1;
$update1=library::where('id','=',$book2_id)->update(['copies'=>$c]);
$update2=people::where('id','=',$user_id)->update(['book2'=>0,'issue2'=>"",'return2'=>""]); 
if($update1 && $update2)
echo"<script>
alert('Book returned successfully.');
    window.location.href='/userdetails';
    </script>
    "; 
else
    echo"<script>
alert('Book returned successfully.');
    window.location.href='/userdetails';
    </script>
    "; 
}

public function edit($id)

    {
        if(!Session::has('adminkey'))
            return redirect('/login_error');
        $res=library::where('id','=',$id)->get();
        return view('admin/edit',compact('res'));
    }

public function update_book(Request $req)
{
    if(!Session::has('adminkey'))
        return redirect('/login_error');
    $id=$req->input('id');
    $genre=library::where('id','=',$id)->value('genre');
    if($req->input('genre')!="")
        $genre=$req->input('genre');
    $summary=library::where('id','=',$id)->value('summary');
    if($req->input('description')!="")
        $summary=$req->input('description');
    $edition=library::where('id','=',$id)->value('edition');
    if($req->input('ed')!="")
        $edition=$req->input('ed');
    $copies=library::where('id','=',$id)->value('copies');
    if($req->input('copies')!="")
        $copies=$req->input('copies');
    $image=$req->file('image');
    $update=library::where('id','=',$id)->update(['genre'=>$genre, 'summary'=>$summary,'edition'=>$edition,'copies'=>$copies,'image'=>' ']);
    if($update)
        {
            if($image!=""){
            $name=$image->getClientOriginalExtension();
            $name="book".$id.".".$name;
            $destinationPath='assets/book_images';
            $image->move($destinationPath,$name);
            $update=library::where('id','=',$id)->update(['image'=>$name]);
        }
            echo"<script>
                alert('Update successful.');
                window.location.href='/bookdetails';
            </script>
            ";
        } 
        echo"<script>
            alert('Unable to update details. Please try again later.');
            window.location.href='/bookdetails';
            </script>";

}

public function delete_book(Request $req)
{
    if(!Session::has('adminkey'))
        return redirect('/login_error');
    $id=$req->input('id');
    $name=library::where('id','=',$id)->value('book_name');
    $file_name=library::where('id','=',$id)->value('image');
    $delete=library::where('id','=',$id)->delete();
      if($delete==true)
      {
          $destinationPath='assets/book_images/';
          if($file_name!=" "){
          File::delete($destinationPath.$file_name);}
          Session::forget('userkey');
          echo "<script>
            alert('Book removed successfully.');
            window.location.href='/bookdetails';
            </script>
          ";
        }
        else
          echo "<script>
            alert('Failed to remove the book. Please retry later.');
            window.location.href='/bookdetails';
            </script>
          ";
}
}
