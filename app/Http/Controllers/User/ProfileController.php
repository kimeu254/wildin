<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('optimizeImages');
    }

    public function show()
    {
        $user = Auth::user();
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update([
                'name' =>  $request->name,
                'date_of_birth' =>  $request->date_of_birth,
                'profession' =>  $request->profession,
                'workplace' =>  $request->workplace,
                'education' =>  $request->education,
                'address' =>  $request->address,
                'bio' =>  $request->bio,
            ]);
        return response()->json($user);
    }

    public function updateCover(Request $request, $id)
    {
        $user = User::find($id);
        if($request->file != ''){        
            $path = storage_path('app/public/covers/');
  
            //code for remove old file
            if($user->cover_img != ''  && $user->cover_img != null){
                 $file_old = $path.$user->cover_img;
                 unlink($file_old);
            }
  
            //upload new file
            $file = $request->file;
            $filename = $file->getClientOriginalName();
            $file->move($path, $filename);
       }

       $data = ['cover_img' => $filename];

       //for update in table
       $user->update($data);

       return response()->json($user);
    }

    public function updateProfilePic(Request $request, $id)
    {
        $user = User::find($id);
        if($request->file != ''){        
            $path = storage_path('app/public/profiles/');
  
            //code for remove old file
            if($user->profile_img != ''  && $user->profile_img != null){
                 $file_old = $path.$user->profile_img;
                 unlink($file_old);
            }
  
            //upload new file
            $file = $request->file;
            $filename = $file->getClientOriginalName();
            $file->move($path, $filename);
       }

       $data = ['profile_img' => $filename];

       //for update in table
       $user->update($data);

       return response()->json($user);
    }

    public function destroyCover($id)
    {
        $user = User::find($id);
        $path = storage_path('app/public/covers/');
        if ($user->cover_img != ''  && $user->cover_img != null) {
            $file_remove = $path.$user->cover_img;
            unlink($file_remove);
        }
        $user->cover_img = null;
        $user->save();
        return response()->json($user);
    }

    public function destroyProfilePic($id)
    {
        $user = User::find($id);
        $path = storage_path('app/public/profiles/');
        if ($user->profile_img != ''  && $user->profile_img != null) {
            $file_remove = $path.$user->profile_img;
            unlink($file_remove);
        }
        $user->profile_img = null;
        $user->save();
        return response()->json($user);
    }

    public function phpInfo()
    {
        phpinfo();
    }
}
