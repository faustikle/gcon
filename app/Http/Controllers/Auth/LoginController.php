<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * @var string
     */
    protected $redirectTo = '/painel';

    /**
     * LoginController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect(route('login'));
    }

    /**
     * @param Request $request
     * @param $user
     */
    protected function authenticated(Request $request, $user)
    {
        $user->ultimo_acesso = Carbon::now();
        $user->save();
    }
}
