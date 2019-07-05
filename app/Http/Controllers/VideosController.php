<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\User;
use DB;
use App\Models\videos;
use Illuminate\Http\Request;

class VideosController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $id=auth()->user()->id;
      $user = User::find($id);
   $data = $user->videos()->get();

      // var_dump($data);
      //$data = videos::all();
      return view('pages.deleteVideo', compact('data',$data,"user", $user));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\videos  $videos
     * @return \Illuminate\Http\Response
     */
    public function show(videos $videos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\videos  $videos
     * @return \Illuminate\Http\Response
     */
    public function edit(videos $videos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\videos  $videos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, videos $videos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\videos  $videos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      $data = videos::FindOrFail($id);

      $destinationPath =storage_path().'/app/public/videos/'.$data->filename;
             try{

                 $data->delete();
                 $bug = 0;
             }
             catch(\Exception $e){
                 $bug = $e->errorInfo[1];
             }
             if($bug==0){
                 unlink($destinationPath);
                 $message ='Account has been successfully updated!';
               return redirect()->back()->with('status', $message);
             }else{
               $message ='Account has been unsuccessfully Deleted!';
             return redirect()->back()->with('status', $message);
             }
    }
}
