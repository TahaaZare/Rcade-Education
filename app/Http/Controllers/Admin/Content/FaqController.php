<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\Faq\StoreFaqRequest;
use App\Http\Requests\Admin\Content\Faq\UpdateFaqRequest;
use App\Models\Account\User;
use App\Models\Content\Site\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FaqController extends Controller
{
    public function index(User $user)
    {
        $auth_user = auth()->user();
        if ($auth_user != null) {
            if ($auth_user->username == $user->username) {
                if ($user != null) {
                    if ($user->user_type == 2) {
                        $faqs = Faq::paginate(6);
                        return view('admin.content.faq.index', compact('user', 'faqs'));
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
    public function create(User $user)
    {
        $auth_user = auth()->user();
        if ($auth_user != null) {
            if ($auth_user->username == $user->username) {
                if ($user != null) {
                    if ($user->user_type == 2) {
                        $faqs = Faq::all();
                        return view('admin.content.faq.create', compact('user', 'faqs'));
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
    public function store(StoreFaqRequest $request, User $user)
    {
        $auth_user = auth()->user();
        if ($auth_user != null) {
            if ($auth_user->username == $user->username) {
                if ($user != null) {
                    if ($user->user_type == 2) {

                        $inputs = $request->all();
                        $inputs['create_by'] = $user->id;
                        $faq = Faq::create($inputs);

                        return redirect()->route('admin.faq.index', $user->username)
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
    public function edit(User $user, Faq $faq)
    {
        $auth_user = auth()->user();
        if ($auth_user != null) {
            if ($auth_user->username == $user->username) {
                if ($user != null) {
                    if ($user->user_type == 2) {
                        $faqs = Faq::all();
                        return view('admin.content.faq.edit', compact('user', 'faq'));
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
    public function update(UpdateFaqRequest $request, User $user, Faq $faq)
    { {

            $auth_user = auth()->user();
            if ($auth_user != null) {
                if ($auth_user->username == $user->username) {
                    if ($user != null) {
                        if ($user->user_type == 2) {

                            $inputs = $request->all();
                            $inputs['create_by'] = $user->id;
                            $faq->update($inputs);

                            return redirect()->route('admin.faq.index', $user->username)
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
    public function delete(User $user, Faq $faq)
    {
        $auth_user = auth()->user();
        if ($auth_user != null) {
            if ($auth_user->username == $user->username) {
                if ($user != null) {
                    if ($user->user_type == 2) {

                        $faq->delete();

                        return redirect()->route('admin.faq.index', $user->username)
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
