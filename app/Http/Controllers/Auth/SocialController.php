<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\Services\SocialInterface;
use Cart;
use Sentinel;
use Socialite;
use Auth;
use App\Http\Controllers\Controller;

class SocialController extends Controller
{
    protected $repository;

    public function __construct(SocialInterface $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Handle Social login request
     * @return response
     */
    public function redirectToProvider($social)
    {
        return Socialite::driver($social)->redirect();
    }

    /**
     * @param $social
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handleProviderCallback($social)
    {

        try {
            $user = $this->repository->createOrGetUser($social);

            Auth::login($user, true);

            Cart::destroy();

            Cart::instance('compare')->destroy();

            return redirect()->route('home_page')->with('success', trans('common.login.success'));
        } catch (\Exception $e) {
            return back();
        }

    }
}

