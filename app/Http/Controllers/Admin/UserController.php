<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\CreateRequest;
use App\Http\Requests\Users\EditRequest;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the user.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userList = User::select(User::$selectedFields)->get();
        return view('admin.user.index', [
            'userList' => $userList
        ]);
    }

    /**
     * Show the form for creating a new reuser.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created reuser in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

     /*   $user = new User(
            $request->validated()
        );

        if($user->save()) {
            return redirect()->route('admin.user.index')
                ->with('success', __('messages.admin.users.create.success'));
        }

        return back()->with('error', __('messages.admin.users.create.fail'));
*/
    }

    /**
     * Display the specified reuser.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified reuser.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified reuser in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, User $user)
    {
        $user->update($request->validated());
        $user->is_admin = $request->get('is_admin', 0);

        if($user->save()) {
            return redirect()->route('admin.user.index')
                ->with('success', __('messages.admin.users.update.success'));

        }

        return back()->with('error', __('messages.admin.users.update.fail'));
    }

    /**
     * Remove the specified reuser from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->delete()){
            return redirect()->route('admin.user.index')
                ->with('success', __('messages.admin.users.destroy.success'));
        }
        else{
            return redirect()->route('admin.user.index')
                ->with('error', __('messages.admin.users.destroy.fail'));
        }
    }
}
