<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        SEOMeta::setTitle('Users');
        $users=User::query()->orderBy('id','asc')->paginate(10);
        return view('adminn.users.all',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::allows('crud',auth()->user())){
            SEOMeta::setTitle('Create User');
            return view('adminn.users.create');


        }else{
            return abort(403);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validdata=$request->validate([
            'name'=>'required',
            'password'=>['required','min:8'],
            'email'=>['required',Rule::unique('users','email')],
        ]);
        $validdata['password']=Hash::make($request['password']);
        $user=User::create($validdata);
        if (!is_null($request['verified'])){
            $user->markEmailAsVerified();
        }
        return redirect(route('users.index'));

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
    public function edit(User $user)
    {
        if (Gate::allows('edit',$user)){
            SEOMeta::setTitle('Edit User');
            return view('adminn.users.edit',compact('user'));
        }else{
            return abort(403);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

            $validdata=$request->validate([
                'name'=>'required',
                'email'=>['required',Rule::unique('users','email')->ignore($user['id'])],
            ]);

            if (!is_null($request['password'])){
                $validdata['password']=Hash::make($request['password']);
            }
            $user->update($validdata);

            if (!is_null($request['verified'])){
                $user->markEmailAsVerified();
            }else{
                $user->forceFill([
                    'email_verified_at'=>null
                ])->save();
            }
            return redirect(route('users.index'));


        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->comments()->delete();
        $user->articles()->delete();
        $user->delete();
        return back();
        //
    }
}
