<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Photo;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\UserEditRequest;




class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        // dd($user);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        $roles = Role::pluck('name', 'id');
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
     {  
     
    //    $input = $request->all();

    //     if($request->file('photo_id')) {
    //         return "photo exist";
    //      
    $request->validated();
    

    if($file = $request->file('photo_id')) 
    {
        // $newImageName = time(). $file->getClientOriginalExtension();
        $newImageName = time().'-'.$request->name . '.'.$request->photo_id->extension();

        $file->move(public_path('images'), $newImageName);
        $photo = Photo::create(['file'=> $newImageName]);
        $photo = $photo->id;
    } else {
        $newImageName = 'noimage.jpg'; 
    } 
       
      if(trim($password = '')) {
          $user = $request->except('password');
      } else {
        $users = User::create([
            'name' => $request->input('name'),
            'role_id' => $request->input('role_id'),
            'is_active' => $request->input('is_active'),
            'email' => $request->input('email'),
            // 'password' => $request->input('password'),
           'password' => bcrypt($request->input('password')),
            'photo_id' => $photo,  
    
        ]);
      }

   
       
    return redirect('/admin/users')->with('success', 'User Created Successfully');
     
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
        $roles = Role::pluck('name', 'id');
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        $request->validated();
        if($file = $request->file('photo_id')) 
        {
            // $newImageName = time(). $file->getClientOriginalExtension();
            $newImageName = time().'-'.$request->name . '.'.$request->photo_id->extension();
    
            $file->move(public_path('images'), $newImageName);
            $photo = Photo::create(['file'=> $newImageName]);
           // $photo = $photo->id;
        } else {
            $newImageName = 'noimage.jpg'; 
        } 
        if(trim($password = '')) {
            $user = $request->except('password');
        } else {
        
        $user = User::where('id', $id)
              ->update([
            'name' => $request->input('name'),
            'role_id' => $request->input('role_id'),
            'is_active' => $request->input('is_active'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            // 'password' => $request->input('password'),
          //  'photo_id' => $photo,  
        ]);
    }
            return redirect('/admin/users')->with('success', 'User Updated Successfully');
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $user = User::findOrFail($id);
        unlink(public_path() .  $user->photo->file);
        $user->delete();
        return redirect('/admin/users')->with('success', 'The User has been Deleted');
    }
}
