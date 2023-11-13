<?php
namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user', compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function user_create()
    {
        return view('admin.create-user');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:2', 'confirmed'],
        ]);
    }

    public function user_store(Request $request)
    {
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        $msg = "New User Created successful! ";
        return redirect('admin/user')->with('msg', $msg);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function user_show($id)
    {
        $user = User::find($id);
        return view('user.show', compact('user'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function user_edit($id)
    {
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function user_update(Request $request, $id)
    {
        $update = [
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>$request->password,
        ];
        User::where('id', $id)->update($update);
        $msg = "User Updated successful! ";
        return redirect('user')->with('msg', $msg);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        $msg = "User Deleted successful! ";
        return redirect('admin/user')->with('msg', $msg);
    }

    public function active($id)
    {
        $user = User::find($id);
        if($user->is_active==1):
            $update = [
                "is_active"=>0,
            ];
        else:
            $update = [
                "is_active"=>1,
            ];
        endif;
        User::where('id', $id)->update($update);
        $msg = "Change Active Successful! ";
        return redirect('admin/user')->with('msg', $msg);
    }
    public function admin($id)
    {
        $user = User::find($id);
        if($user->admin==1):
            $update = [
                "admin"=>0,
            ];
        else:
            $update = [
                "admin"=>1,
            ];
        endif;
        User::where('id', $id)->update($update);
        $msg = "Change Admin Successful! ";
        return redirect('admin/user')->with('msg', $msg);
    }

    public function superadmin($id)
    {
        $user = User::find($id);
        if($user->super_admin==1):
            $update = [
                "super_admin"=>0,
            ];
        else:
            $update = [
                "super_admin"=>1,
            ];
        endif;
        User::where('id', $id)->update($update);
        $msg = "Change Superadmin Successful! ";
        return redirect('admin/user')->with('msg', $msg);
    }
} 