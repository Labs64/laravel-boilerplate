<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\UnauthorizedUserException;
use App\Http\Controllers\Controller;
use App\Models\Auth\User\User;
use App\Repositories\User\UserRepository;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    private $userRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->middleware('guest', ['except' => 'logout']);
        $this->userRepository = $userRepository;
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        /*
         * Remove the socialite session variable if exists
         */

        \Session::forget(config('access.socialite_session_name'));

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/');
    }

    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        $errors = [$this->username() => __('auth.failed')];

        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }

        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  mixed $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        $errors = [];

        if (config('auth.users.confirm_email') && !$user->confirmed) {
            $errors = [$this->username() => __('auth.notconfirmed', ['url' => route('confirm.send', [$user->email])])];
        }

        if (!$user->active) {
            $errors = [$this->username() => __('auth.active')];
        }

        if ($errors) {
            auth()->logout();  //logout

            return redirect()->back()
                ->withInput($request->only($this->username(), 'remember'))
                ->withErrors($errors);
        }

        $user->last_login = now();
        $user->save();

        return redirect()->intended($this->redirectPath());
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws GuzzleException
     */
    public function loginRemote(Request $request)
    {

        try{
            $credentials = request(['email', 'password']);

            $rememberMe = $request->remember_me ?? false;

            $result = $this->userRepository->userLogin($credentials, $rememberMe);

            $user = new User();
            $user->email = $request->email;
            $user->access_token = $result->token;
            $user->name = $result->name;

            $request->session()->put('authenticated',true);
            $request->session()->put('user', $user);

            return redirect()->intended($this->redirectPath());


        }  catch (UnauthorizedUserException $guzzleException){
            $request->session()->forget('authenticated');
            $request->session()->forget('user');

            return redirect()->back()
                ->withInput($request->only($this->username(), 'remember'))
                ->withErrors($guzzleException->getMessage());

        }



    }
}
