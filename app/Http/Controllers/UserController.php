<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\TotalSalary;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $totalSalaries = TotalSalary::all()->pluck('money', 'user_id');
        return view('user.users', compact('users', 'totalSalaries'));
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        $totalSalary = TotalSalary::where('user_id', $id)->first();
        return view('user.edit', compact('user', 'totalSalary'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:8|confirmed',
            'profile_photo_path' => 'nullable|string',
            'code_mentor_id' => 'nullable|integer',
            'user_role_id' => 'required|integer',
            'referral_code' => 'nullable|string',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }
        $user->profile_photo_path = $request->input('profile_photo_path');
        $user->code_mentor_id = $request->input('code_mentor_id');
        $user->user_role_id = $request->input('user_role_id');
        $user->referral_code = $request->input('referral_code');
        $user->save();

        $totalSalary = TotalSalary::firstOrCreate(['user_id' => $id]);
        $totalSalary->money = $request->input('money');
        $totalSalary->save();

        return redirect()->route('user.index')->with('success', 'User успешно обновлен!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User успешно удален!');
    }
}
