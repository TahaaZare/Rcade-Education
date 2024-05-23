<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Models\Account\User;
use App\Models\Content\Site\MasterRules;
use Database\Seeders\MasterRulesSeed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasterRulseController extends Controller
{
    public function index(User $user)
    {
        $auth_user = auth()->user();
        if ($auth_user != null) {
            if ($auth_user->username == $user->username) {
                if ($user != null) {
                    if ($user->user_type == 2) {

                        $about = MasterRules::first();
                        if ($about === null) {
                            $default = new MasterRulesSeed();
                            $default->run();
                        }

                        $Rule = MasterRules::find(1);
                        return view('admin.content.master-rule.index', compact('user', 'Rule'));
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

    public function edit(User $user, MasterRules $rule)
    {
        $auth_user = auth()->user();
        if ($auth_user != null) {
            if ($auth_user->username == $user->username) {
                if ($user != null) {
                    if ($user->user_type == 2) {
                        return view('admin.content.master-rule.edit', compact('user', 'rule'));
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
    public function update(Request $request, User $user, MasterRules $rule)
    { {

            $auth_user = auth()->user();
            if ($auth_user != null) {
                if ($auth_user->username == $user->username) {
                    if ($user != null) {
                        if ($user->user_type == 2) {

                            $inputs = $request->all();
                            $rule->update($inputs);

                            return redirect()->route('admin.rule.index', $user->username)
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
