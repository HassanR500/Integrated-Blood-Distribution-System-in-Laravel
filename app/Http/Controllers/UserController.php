<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Stock;
use App\Models\Bloodrequests;
use App\Models\Donation;
use App\Models\Facilities;
use DB;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $facilities = Facilities::all();
        $pendingCount = Bloodrequests::where('status','Pending')->count();
        session(['pendingCount' => $pendingCount]);
        $list = DB::table('users')->get();
        return view('backend.admin.index',compact('list','pendingCount','facilities'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        $facilities = Facilities::all();
        $pendingCount = Bloodrequests::where('status','Pending')->count();
        session(['pendingCount' => $pendingCount]);
        return view('backend.admin.create',compact('pendingCount','facilities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'facility_serve' => 'required',
            'password' => 'required',
            'role' => 'required',
            'user_image' => 'image|mimes:jpeg,png,jpg,gif|max:4096',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->facility_serve = $request->input('facility_serve');
        $user->password = bcrypt($request->input('password'));
        $user->role = $request->input('role');

        // Handle image upload
        // Handle image upload
        if ($request->hasFile('user_image')) {
            $image = $request->file('user_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/profile_images', $imageName);
            $user->user_image = 'profile_images/' . $imageName;
        }


        $user->save();

        return redirect('admin')->with(['message' => 'User Added Successfully', 'user' => $user]);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $pendingCount = Bloodrequests::where('status','Pending')->count();
        session(['pendingCount' => $pendingCount]);
        $userEdit = User::find($id);
        $facilities = Facilities::all();
        return view('backend.admin.edit', compact('userEdit','pendingCount','facilities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'facility_serve' => 'required',
            'role' => 'required',
        ]);
        $userEdit = User::findOrFail($id);
        $userEdit->update($request->all());

        return redirect('admin')->with('message', 'User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = DB::table('users')->where('id', $id)->delete();
        if ($delete)
                            {
                                return Redirect()->route('user.index')->with('success','User Deleted successfully!');
                            }
             else
                  {
                    return Redirect()->route('user.index')->with('error','Something is Wrong!');
                  }
    }
}
