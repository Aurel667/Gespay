<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Ajouter un utilisateur';
        $user = Auth::user();
        return view('admin.addUser', [
            'title' => $title,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request, User $current)
    {
        $current->name = $request->name;
        $current->surname = $request->surname;
        $current->email = $request->email;
        $current->password = Hash::make($request->password);
        $current->role = $request->role;
        $current->save();
        return redirect()->route('admin.dashboard');
    }
    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email|min:5',
            'password' => 'required|min:8'
        ]);
        if(Auth::attempt($credentials)){
            $user = Auth::user();
            $request->session()->regenerate();
            if($user->role == 'admin'){
                return redirect()->route('admin.dashboard');
            }
            else if($user->role == 'accountant'){
                return redirect()->route('accountant.dashboard');
            }
            else if($user->role == 'supervisor'){
                return redirect()->route('supervisor.dashboard');
            }
        }
        else{
            return redirect()->back()->with('message', 'Vos identifiants ne correspondent pas');
        }
    }

    public function adminDashboard(){
        $title = 'Dashboard';
        $users = User::where('email', '!=', Auth::user()->email)->get();
        return view('admin.dashboard', [
            'users' => $users,
            'title' => $title,
        ]);
    }
    public function accountantDashboard(){
        $title = 'Dashboard';
        return view('accountant.dashboard', [
            'title' => $title,
            'students' => Student::all()
        ]);
    }

    public function supervisorDashboard(){
        $title = 'Dashboard';
        return view('supervisor.dashboard', [
            'title' => $title,
            'students' => Student::all()
        ]);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
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
    public function edit(User $user)
    {
        return view('admin.editUser', [
            'title' => 'Modifier utilisateur',
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        if($request->password != null && $request->password != ""){
            $user->password = Hash::make($request->password);
        }
        $user->role = $request->role;
        $user->save();
        return redirect()->route('admin.dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back();
    }
}
