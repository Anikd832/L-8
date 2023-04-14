<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\UserRequest $form
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $form)
    {

        try {
            $create = User::create($form->formData());
            if ($create) {
                return redirect('users')
                    ->with('success', "Data submit successfully");
            }
        } catch (\Exception $e) {
            return $e;
        }
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
        $user = User::whereId($id)->first();
        if (!$user) {
            return redirect('users');
        }
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UserRequest $form
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $form, $id)
    {
        try {
            $update = User::whereId($id)
                ->update($form->formData());
            if (!$update) {
                return back()->with('error', "User update failed !");
            }
            return redirect('users')
                ->with('success', "User update successfully");
        } catch (\Exception $e) {
            return back()->withError($e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = User::find($id);
            if ($user->delete()) {
                return redirect('users')->with('success', "Data Delete successfully");
            }
            return redirect('users');
        } catch (\Exception $e) {
            return $e;
        }
    }
}
