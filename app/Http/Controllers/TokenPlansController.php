<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\token_plans;

class TokenPlansController extends Controller
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
 $user_details = Auth::user();
return view('pages.package')->with('user_details',$user_details);
}

public function createPackage(Request $request)
{
if($request['ticket-type'] =='standard-access')
{
  $price ='$50';
}else {
  $price ='$150';
}

  $items = token_plans::create([
  'packagename' => $request['ticket-type'],
  'username' => $request['your-name'],
  'email' => $request['your-email'],
  'price' => $price,

  ]);
  $message ='Post has been successfully added!';
    return redirect()->intended('payment')->with('status', $message);
}


public function payment()
{
return view('pages.payment');
}




}
