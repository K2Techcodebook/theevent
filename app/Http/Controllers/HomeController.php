<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\items;
use App\Models\videos;
use App\Models\About;
use App\Models\Service;
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
    // $user =new videos;
             $data=$request->all();
              $rules=[
                 'name' => 'required',
                'video'          =>'mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts|max:100040|required'];
             $validator = Validator($data,$rules);
//dd($validator);
             if ($validator->fails()){
                 return redirect()
                             ->back()
                             ->withErrors($validator)
                             ->withInput();
             }else{


               $videoName = $request['name'].'.'.request()->video->getClientOriginalExtension();
                $videoPath = env('APP_URL').'/public/videos/'.$videoName;

                $file = $request->file('video');
                if(isset($videoName)) {
                 $filename = $videoName;
                    $old_filename= $videoName;
                 //  $filename = $request['username'] . '-' . $user->id . '.jpg';
                  // $old_filename = $old_name . '-' . $user->id . '.jpg';
                   $update = false;
                   if (Storage::disk('public')->has($old_filename)) {
                       $old_file = Storage::disk('public')->get($old_filename);
                       Storage::disk('public')->put($filename, $old_file);
                       $update = true;
                   }
                   if ($file) {
                       Storage::disk('public')->put($filename, File::get($file));
                   }
                   if ($update && $old_filename !== $filename) {
                       Storage::delete($old_filename);
                   }
                 }

                            $user['filename']       =$videoName;
                            $user['created_at']  =date('Y-m-d h:i:s');
                            $user['updated_at']  =date('Y-m-d h:i:s');
                            $user['url']  =$videoPath;
                            $user['extention']  =request()->video->getClientOriginalExtension();
                            $user['user_id']     =auth()->user()->id;
                           DB::table('videos')->insert($user);
                          $message ='Account has been successfully updated!';
                        return redirect()->back()->with('status', $message);
                    }
}

               public function postSummernoteeditor(Request $request)  {
                 $this->validate($request, [
                           'detail' => 'required',
                           'feature' => 'required',
                       ]);
                       $detail=$request->input('detail');
                 $feature=$request->input('feature');
                          if($request->input('ticket-type') == 'about'){

                            $user = About::updateOrCreate(['user_id' => auth()->user()->id],
                              ['title' => $feature,'user_id'=>auth()->user()->id, 'body' => $detail]);
                              $message ='Account has been successfully updated!';
                            return redirect()->back()->with('status', $message);
                          }
                          else {
                            $dom = new \DomDocument();
                            $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                            $images = $dom->getElementsByTagName('img');
                            foreach($images as $k => $img){
                                $data = $img->getAttribute('src');
                                list($type, $data) = explode(';', $data);
                                list(, $data)      = explode(',', $data);
                                $data = base64_decode($data);
                                $image_name= '/img/service/'.$feature.'.png';

                                $path = public_path() . $image_name;

                                file_put_contents($path, $data);

                                $img->removeAttribute('src');

                                $img->setAttribute('src', $image_name);
                            }
                            $user = Service::updateOrCreate(['title' => $feature],
                              ['title' => $feature,'user_id'=>auth()->user()->id, 'body' => $image_name]);
                            $detail = $dom->saveHTML();
                            $message ='Account has been successfully updated!';
                          return redirect()->back()->with('status', $message);
                          }



                                  // $dom = new \DomDocument();
                                  // $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                                  // $images = $dom->getElementsByTagName('img');
                                  // foreach($images as $k => $img){
                                  //     $data = $img->getAttribute('src');
                                  //     list($type, $data) = explode(';', $data);
                                  //     list(, $data)      = explode(',', $data);
                                  //     $data = base64_decode($data);
                                  //     $image_name= "/upload/" . time().$k.'.png';
                                  //
                                  //     $path = public_path() . $image_name;
                                  //
                                  //     file_put_contents($path, $data);
                                  //
                                  //     $img->removeAttribute('src');
                                  //
                                  //     $img->setAttribute('src', $image_name);
                                  // }
                                  // $detail = $dom->saveHTML();



                            //       $summernote = new About;
                            //
                            //       $summernote->body = $detail;
                            //         $summernote->user_id = auth()->user()->id;
                            // $summernote->title=$feature;
                            //
                            //       $summernote->save();



               }

               public function control(Request $request)
               {
                return view('pages.control');
               }
              public function welcomehome()
              {
                $data = About::all();
                $data2 = Service::all();
                return view('welcome', compact('data',$data,'data2',$data2));
              }


}
