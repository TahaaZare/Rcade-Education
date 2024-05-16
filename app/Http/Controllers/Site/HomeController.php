<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Account\User;
use Database\Seeders\UserSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        #region check user profile

        $users = User::all();
        if ($users != null) {
            foreach ($users as $item) {
                if ($item->profile_photo_path == null) {
                    $username = $item->username;

                    // Hash the username to generate a unique identifier
                    $hash = md5(strtolower(trim($username)));

                    // Concatenate the hash with the default Gravatar base URL
                    $gravatarUrl = "https://www.gravatar.com/avatar/{$hash}?d=identicon";

                    // Update the user's profile with the Gravatar URL
                    $item->update(['profile' => $gravatarUrl]);
                }
            }
        }

        #endregion

        #region seeders

        $user = User::first();
        if ($user === null) {
            $default = new UserSeeder();
            $default->run();
        }

        #endregion

        $au = User::find(1);
        Auth::login($au);
        return view('site.home');
    }
}
