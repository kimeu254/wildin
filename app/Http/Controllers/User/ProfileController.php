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
    }

    public function index()
    {
        $profile = Auth::user()->username;
        return view('profile.profile', compact('profile'));
    }

    public function show($id)
    {
        $data = User::Where('id', $id)
            ->get();

        return json_encode($data);
    }

    public function update(Request $request, $id)
    {
        $edit = User::where('id', $id)
            ->update([
                'name' =>  $request->name,
                'username' =>  $request->username,
                'email' =>  $request->email,
                'phone' =>  $request->phone,
                'date_of_birth' =>  $request->date_of_birth,
                'profession' =>  $request->profession,
                'workplace' =>  $request->workplace,
                'education' =>  $request->education,
                'address' =>  $request->address,
                'bio' =>  $request->bio,
            ]);
        return response()->json($edit);
    }

    public function phpInfo()
    {
        phpinfo();
    }
}
