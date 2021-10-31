<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Carbon\Carbon;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use App\Models\User;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);


        Fortify::registerView(function (){
          return view('auth.register');
        });

        Fortify::loginView(function (){
            return view('auth.login');
        });

        Fortify::authenticateUsing(function (Request $request) {
            $user = User::where('email', $request->email)->first();
            if ($user &&
                Hash::check($request->password, $user->password))

            {

                $user_id = $user->id;
                $current_date = Carbon::now();
                $day = Carbon::parse($current_date)->format('l');
                DB::table('days')->insert([
                    'user_id' => $user_id,
                    'name' => $day
                ]);
                $request->session()->flash('success', 'Gebruiker is ingelogd');

                return $user;
            }
        });

        Fortify::resetPasswordView(function ($request){
            return view('auth.reset-password', ['request' => $request]);
        });

        Fortify::requestPasswordResetLinkView(function (){
            return view('auth.forgot-password');
        });

        Fortify::verifyEmailView(function (){
            return view('auth.verify-email');
        });

        RateLimiter::for('login', function (Request $request) {
            return Limit::perMinute(5)->by($request->email.$request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }
}
