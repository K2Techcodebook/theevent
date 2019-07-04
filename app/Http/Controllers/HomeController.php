<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\items;
use App\User;
use DB;
use App\Http\Requests\VideoUploadRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

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

public function Update_video(Request $request){
             $data=$request->all();
              $rules=[
                 'name' => 'required',
                'video'          =>'mimes:jpeg,jpg,mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts,zip,pdf|max:100040|required'];
             $validator = Validator($data,$rules);
//dd($validator);
             if ($validator->fails()){
                 return redirect()
                             ->back()
                             ->withErrors($validator)
                             ->withInput();
             }else{

                        $video=$data['video'];
                        $input = time().'.'.$video->getClientOriginalExtension();
                        $destinationPath = 'uploads/videos';
                        $video->move($destinationPath, $input);

                            $user['video']       =$input;
                            $user['created_at']  =date('Y-m-d h:i:s');
                            $user['updated_at']  =date('Y-m-d h:i:s');
                            $user['user_id']     =session('user_id');
                          //  DB::table('user_videos')->insert($user);
                           return redirect()->back()->with('status','upload_success');
                    }
}

// public function Update_video(Request $request)
// {
//
//   return $request->file('video');
//   //  // Coming soon...
//   //  $product = Product::create($request->all());
//   //  // foreach ($request->photos as $photo) {
// // dd($request->file('video'));
// // dd(Input::file('image'));
//     // $uniqueFileName = uniqid() . '.' . $request->file('video')->getClientOriginalExtension();
//     // Storage::disk('local')->put('videos', $request->file('video'));
//
//     // ProductsPhoto::create([
//     //     'product_id' => $product->id,
//     //     'filename' => $uniqueFileName
//     // ]);
//
// // return redirect()->back()->with('status','Upload successful!');
//     }


}
