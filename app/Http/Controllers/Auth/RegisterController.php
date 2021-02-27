<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\GeneralMail;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
     */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        $messages = [
            'username' => 'This username has already been taken.',
        ];

        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'secondname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'gender' => ['required', 'string'],
            'role' => ['string'],
            'phonenumber' => ['required', 'string', 'unique:users'],
            'username' => ['required', 'string', 'max:255', 'unique:users', 'alpha_dash'],
            'nationality' => ['required', 'string'],
            'address' => ['required', 'string'],
            'postalcode' => ['required', 'string'],
            'referred' => ['string'],
        ], $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $lastUser = User::orderBy('id', 'DESC')->first();
        $newID = $lastUser->id + 1;
        $newGeneratedID = 1009000 + $newID; // 100900X
        $user = User::create([
            'firstname' => $data['firstname'],
            'secondname' => $data['secondname'],
            'name' => $data['firstname'] . " " . $data['secondname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'gender' => $data['gender'],
            'phonenumber' => $data['phonenumber'],
            'username' => $data['username'],
            'nationality' => $data['nationality'],
            'address' => $data['address'],
            'postalcode' => $data['postalcode'],
            'role' => "customer",
            'referred' => $data['referred'],
            'client_id' => $newGeneratedID,
        ]);

        $content = "We are pleased to inform you that the new user is register with this email " . $data['email'];
        $username = $data['username'];
        $action = "New Client Registered!!!";
        Mail::to("admin@fxindigo.com")->send(new GeneralMail($content, $username, $action, $action));

        return $user;
    }
}
