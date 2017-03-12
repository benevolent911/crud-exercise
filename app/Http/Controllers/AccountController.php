<?php

namespace RioLibrary\Http\Controllers;

use Illuminate\Http\Request;
use RioLibrary\User;
use RioLibrary\Book;

class AccountController extends Controller
{
    public function login()
    {                
        $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required|alpha_num'
        ]);
        if (!auth()->attempt(['email' => request('email'), 'password' => request('password')])) {
            session()->flash('error', 'Invalid login. Please re-enter email and password.');
            return redirect()->back()->withErrors('Invalid login. Please re-enter email and password.');
        }
        if (auth()->user()->role == 'user') {
            session()->put('totalBooksBorrowed', auth()->user()->books()->count());
            return redirect()->route('home');
        }
        return redirect()->route('admin');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('home');
    }

    public function register()
    {
        if(!auth()->check()){
            return view('register.index');
        } else {
            return redirect()->back();
        }
    }

    public function registerUser()
    {
        $this->validate(request(), [
            'name' => 'required|max:50',
            'password' => 'required|alpha_num|confirmed|min:5',
            'email' => 'required|email'
        ]);
        $user = User::create(['name' => ucwords(request('name')),'email' => request('email'),'password' => bcrypt(request('password'))]);
        auth()->login($user);
        session()->put('totalBooksBorrowed', auth()->user()->books()->count());
        return redirect()->route('home');
    }

    public function autocomplete(Book $book, $searchFilter)
    {
        $autoComplete = $book->where('borrowed', '0')->distinct()->pluck($searchFilter)->toArray();
        return $autoComplete;
    }
}
