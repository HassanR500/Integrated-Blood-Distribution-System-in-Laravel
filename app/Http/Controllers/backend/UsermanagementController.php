<?php

namespace App\Http\Controllers\backend;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bloodrequests;
use App\Models\User;
use App\Models\Facilities;
use DB;

class UsermanagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function UserList(Request $request)
    {
        $pendingCount = Bloodrequests::where('status','Pending')->count();
        session(['pendingCount' => $pendingCount]);
        $list = DB::table('users')->get();
        return view('backend.user.list_user',compact('list','pendingCount'));
    }


public function UserAdd()
{

        $pendingCount = Bloodrequests::where('status','Pending')->count();
        session(['pendingCount' => $pendingCount]);

$all = DB::table('users')->get();
return view('backend.user.add_user',compact('all','pendingCount'));
}



    public function UserInsert(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'facility_serve' => 'required',
            'role' => 'required',
            'user_image' => 'required',
            'password' => 'required'
        ]);
$data = array();
$data['role'] = $request->role;

$insert = DB::table('users')->insert($data);

if ($insert)
{

                return Redirect()->route('user.index')->with('success','User created successfully!');

        }
else
        {
        $notification=array
        (
        'messege'=>'error ',
        'alert-type'=>'error'
        );
        return Redirect()->route('User.index')->with($notification);
        }



}

      public function UserEdit ($id)
    {

        $pendingCount = Bloodrequests::where('status','Pending')->count();
        session(['pendingCount' => $pendingCount]);
        $edit=DB::table('users')
             ->where('id',$id)
             ->first();
        return view('backend.user.edit_User', compact('edit','pendingCount'));
    }

        public function UserUpdate(Request $request,$id)
    {

        DB::table('users')->where('id', $id)->first();
        $data = array();
        $data['name'] = $request->name;
        $data['role'] = $request->role;
        $update = DB::table('users')->where('id', $id)->update($data);

        if ($update)
    {

            return Redirect()->route('user.index')->with('success','User Updated successfully!');
    }
        else
    {

        return Redirect()->route('user.index')->with('error','Something is Wrong!');
    }

    }

public function UserDelete ($id)
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
