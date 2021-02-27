<?php

namespace App\Http\Controllers;

use App\balance;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth' => 'verified']);
        //$this->middleware(['auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $email = Auth::user()->email;
    
        $id = Auth::user()->id;
        $balance = new balance;
        $balance->user_id = $id;
        $balance->amount = "0";
        $balance->save();
        
        
        $user = User::where(['email' => $email])->first();
        if ($user->role == 'admin' || $user->role == 'employee' ) {
            return redirect('admin/dashboard');
        } elseif ($user->role == 'tester') {
            return redirect('tester/dashboard');
        }{
            $balance = balance::where('user_id', Auth::id())->first();
            if (empty($balance)) {
                $amount = 0;
            } else {
                $amount = $balance->amount;
            }
            return view('customer.index', compact('amount'));
        }
    }
}
