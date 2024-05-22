<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Models\Account\User;
use App\Models\Content\Site\AboutUs;
use Database\Seeders\AboutUsSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AboutUsController extends Controller
{
    public function index(User $user)
    {
        $auth_user = auth()->user();
        if ($auth_user != null) {
            if ($auth_user->username == $user->username) {
                if ($user != null) {
                    if ($user->user_type == 2) {

                        $about = AboutUs::first();
                        if ($about === null) {
                            $default = new AboutUsSeeder();
                            $default->run();
                        }

                        $About = AboutUs::find(1);
                        return view('admin.content.about-us.index', compact('user', 'About'));
                    } else {
                        Auth::logout();
                        abort(404);
                    }
                } else {
                    return redirect()->route('home');
                }
            } else {
                Auth::logout();
                abort(404);
            }
        } else {
            return redirect()->route('home');
        }
    }

    public function edit(User $user, AboutUs $about)
    {
        $auth_user = auth()->user();
        if ($auth_user != null) {
            if ($auth_user->username == $user->username) {
                if ($user != null) {
                    if ($user->user_type == 2) {
                        return view('admin.content.about-us.edit', compact('user', 'about'));
                    } else {
                        Auth::logout();
                        abort(404);
                    }
                } else {
                    return redirect()->route('home');
                }
            } else {
                Auth::logout();
                abort(404);
            }
        } else {
            return redirect()->route('home');
        }
    }
    public function update(Request $request, User $user, AboutUs $about)
    { {

            $auth_user = auth()->user();
            if ($auth_user != null) {
                if ($auth_user->username == $user->username) {
                    if ($user != null) {
                        if ($user->user_type == 2) {

                            $inputs = $request->all();
                            $about->update($inputs);

                            return redirect()->route('admin.about.index', $user->username)
                                ->with('swal-success', 'عملیات با موفقیت انجام شد .');
                        } else {
                            Auth::logout();
                            abort(404);
                        }
                    } else {
                        return redirect()->route('home');
                    }
                } else {
                    Auth::logout();
                    abort(404);
                }
            } else {
                return redirect()->routel('home');
            }
        }
    }
}
