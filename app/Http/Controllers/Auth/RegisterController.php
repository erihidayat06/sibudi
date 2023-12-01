<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
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
    protected $redirectTo = RouteServiceProvider::REGIS;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
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
            'kecamatan' => ['required', 'string', 'max:255'],
            'desa' => ['required', 'string', 'max:255'],
            'id_desa' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        foreach (app('kecamatan') as $kec) {
            if ($data['kecamatan'] == $kec['id']) {
                $data['kecamatan'] = $kec['name'];
            }
        }

        $user = User::create([
            'kecamatan' => $data['kecamatan'],
            'desa' => $data['desa'],
            'id_desa' => $data['id_desa'],
            'password' => Hash::make($data['password']),
        ]);

        // Jangan melakukan login otomatis setelah registrasi
        // Auth::login($user);

        return $user;

        // foreach (app('kecamatan') as $kec) {
        //     if ($data['kecamatan'] == $kec['id']) {
        //         $data['kecamatan'] = $kec['name'];
        //     }
        // }

        // return User::create([
        //     'kecamatan' => $data['kecamatan'],
        //     'desa' => $data['desa'],
        //     'id_desa' => $data['id_desa'],
        //     'password' => Hash::make($data['password']),
        // ]);
    }


    public function destroy(User $user)
    {

        $user->delete();

        return redirect()->back();
    }
}
