<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Support\Facades\Hash;

use App\Catagory;
use App\Product;
use App\Photo;
use App\Sold;
use App\Contact;
use App\Order;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home')
               ->with('products', Product::all())
               ->with('catagories', Catagory::all())
               ->with('mails', Contact::all())
               ->with('solds', Sold::all())
               ->with('orders', Order::all());
    }
    public function password()
    {
        return view('admin.changepass');
    }
    public function changepassword(ChangePasswordRequest $request)
    {
        $hashedPassword = auth()->user()->getAuthPassword();
        $old = $request->current_password;
        $new = $request->new_password;

        if (!(Hash::check($old, $hashedPassword))) {
        session()->flash('error', 'your old password is not correct');
        return redirect()->back();
        }

        if (strcmp($old, $new) == 0) {
        session()->flash('error', 'your password can not match with old password');
        return redirect()->back();
        }

     auth()->user()->update(['password'=> Hash::make($new)]);

        session()->flash('success', 'password changed Successfully');
        return redirect()->back();
    }
}
