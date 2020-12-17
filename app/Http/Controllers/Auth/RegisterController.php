<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/';

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
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'nomer_hp' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'confirmed', 'min:10'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // dd($data);
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->nomer_hp = $data['nomer_hp'];
        $user->tanggal_lahir = $data['tanggal_lahir'];
        $user->save();
        $user->assignRole('customer');
        return $user;
        // return User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'nomer_hp' => $data['nomer_hp'],
        //     'tanggal_lahir' => $data['tanggal_lahir'],
        //     'password' => Hash::make($data['password']),
        // ]);
    }
}
