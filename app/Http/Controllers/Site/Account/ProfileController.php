<?php

namespace App\Http\Controllers\Site\Account;

use App\Http\Controllers\Controller;
use App\Models\Account\User;
use App\Models\Content\Blog\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function MyProfile(User $user)
    {
        $auth_user = auth()->user();
        if ($auth_user != null) {
            if ($auth_user->username == $user->username) {
                if ($user != null) {
                    if ($user->status == 1) {
                        if ($user->ban == 0) {
                            $user_blogs = Blog::where('user_id', $user->id)->where('create_by', $user->id)->get();
                            return view('site.account.profile', compact('user', 'user_blogs'));
                        } else {
                            Auth::logout();
                            return redirect()->route('home')
                                ->with('swal-warning', 'حساب شما مسدود شده است !');
                        }
                    } else {
                        Auth::logout();
                        return redirect()->route('home')
                            ->with('swal-warning', 'حساب شما غیر فعال میباشد !');
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

    public function UpdateBio(Request $request, User $user)
    {
        $auth_user = auth()->user();
        if ($auth_user != null) {
            if ($auth_user->username == $user->username) {
                if ($user != null) {
                    if ($user->status == 1) {
                        if ($user->ban == 0) {
                            $user->update([
                                'bio' => $request->bio
                            ]);
                            return back()->with('swal-success', 'عملیات با موفقیت انجام شد.');
                        } else {
                            Auth::logout();
                            return redirect()->route('home')
                                ->with('swal-warning', 'حساب شما مسدود شده است !');
                        }
                    } else {
                        Auth::logout();
                        return redirect()->route('home')
                            ->with('swal-warning', 'حساب شما غیر فعال میباشد !');
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
}
