<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\items;
use App\User;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

return view('home');
  }

  //update user profile
  public function updateProfile (Request $request)
  {
      $this->validate($request, [
        'first_name' => ['required', 'string'],
        'last_name' => ['required', 'string'],
        'country' => ['required', 'string'],
        'state' => ['required', 'string'],
      ]);




   $user= Auth::user();
   $user->first_name = $request->input('first_name');
   $user->last_name = $request->input('last_name');
   $user->state = $request->input('state');
   $user->country = $request->input('country');
   $user->save();

   return redirect()->back()->with('success','Success! Profile updated');
}



//get user details
  public function profile ()
  {
    $user_details = Auth::user();
    return view('pages.profile')->with('user_details',$user_details);
  }

//get all category items for nav menu
public function load_items($name,$id)
{
      $items = items::where('category_id','=',$id)->get();

 return view('pages.viewitems', compact('items',$items,'name'));
}


public function verifyUser()
{
  $data = user::where('is_permission','=','0')->get();

return view('pages.verifyUser', compact('data',$data));
}

public function activateUser($id)
{
$is_permission=3;
DB::update('update users set is_permission = ? where id = ?',[$is_permission,$id]);
$message ='Post has been successfully added!';
return redirect()->back()->with('status', $message);
}

public function videoUpload()
{
  return view('pages.videoUpload');
}


}
