<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users =  User::with("gender")->paginate(10);

        return view("multiauth::admin.dashboard.users.index",compact("users"));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user = User::find($id);
        $genders = Gender::all();
        return view("multiauth::admin.dashboard.users.edit",compact("user","genders"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)


    {
//        return $request;

        $request->validate([
            "name"=>"required",
            "email"=>"required|email",
            "gender_id"=>"required",
        ]);

        $user =User::find($id);
        $user->name =$request->name;
        $user->email =$request->email;
        $user->gender_id =$request->gender_id;
        if ($files = request()->file('avatar')){
            $destinationPath = public_path('/images/'); // upload path
            // Upload Orginal Image
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $user->avatar =  "images/".$profileImage;
            if (File::exists(auth("admin")->user()->avatar)) {
                //File::delete($image_path);
                unlink(auth("admin")->user()->avatar);
            }
        }
        if($request->status){
            $user->status =$request->status;

        }else{
            $user->status =false;

        }
        if($request->email_verified_at){
            $user->email_verified_at =Carbon::today();

        }
        $user->update();

        return redirect()->back()->with("message","You have successfully update ".$user->name. " details.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user =   User::find($id);
        $user->delete();
        return redirect()->back()->with("message","You have successfully delete ".$user->name. " details.");


    }
}
