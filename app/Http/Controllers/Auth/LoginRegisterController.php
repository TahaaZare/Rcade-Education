<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginConfrimRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Account\Otp;
use App\Models\Account\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cryptommer\Smsir\Smsir;
use Illuminate\Support\Str;

class LoginRegisterController extends Controller
{
    public function loginForm()
    {
        $user = auth()->user();
        if ($user == null) {
            return view('site.auth.login-form');
        }
        return redirect('/');
    }
    public function loginRegister(LoginRequest $request)
    {
        $user = auth()->user();
        if ($user == null) {
            $inputs = $request->all();

            $inputs['id'] = convertArabicToEnglish(convertPersianToEnglish($request->id));

            //check id is email or not
            if (filter_var($inputs['id'], FILTER_VALIDATE_EMAIL)) {
                $type = 1; // 1 => email
            } elseif (preg_match('/^(\+98|98|0)9\d{9}$/', $inputs['id'])) {
                $type = 0; // 0 => mobile;

                // all mobile numbers are in on format 9** *** ***
                $inputs['id'] = ltrim($inputs['id'], '0');
                $inputs['id'] = substr($inputs['id'], 0, 2) === '98' ? substr($inputs['id'], 2) : $inputs['id'];
                $inputs['id'] = str_replace('+98', '', $inputs['id']);

                $user = User::where('mobile', $inputs['id'])->first();

                if ($user == null) {
                    $newUser['mobile'] = $inputs['id'];

                    $new_user = User::create(
                        [
                            'mobile' => $newUser['mobile'],
                            'status' => 1
                        ]
                    );


                    $otpCode = rand(1111, 9999);
                    $token = Str::random(60);
                    $otpInputs = [
                        'token' => $token,
                        'user_id' => $new_user->id,
                        'otp_code' => $otpCode,
                        'login_id' => $inputs['id'],
                        'type' => $type,
                    ];

                    Otp::create($otpInputs);
                    if ($type === 1) {
                        return redirect()->back()->with('swal-warning', 'لطفا شماره تماس خود را وارد کنید');
                    }
                    $name = "CODE";
                    $value = "$otpCode";
                    $send = smsir::Send();

                    $parameter = new \Cryptommer\Smsir\Objects\Parameters($name, $value);
                    $parameters = array($parameter);

                    $send->Verify($new_user->mobile, 100000, $parameters);


                    return redirect()->route('auth.login-confirm-form', $token);
                } else {
                    if ($user->status == 0) {
                        return back()->with('swal-warning', 'حساب شما غیرفعال میباشد !');
                    }
                    if ($user->ban == 1) {
                        return back()->with('swal-warning', 'حساب کاربری شما مسدود میباشد  !');
                    }
                }
            } else {
                $errorText = 'شناسه ورودی شما نه شماره موبایل است نه ایمیل';
                return redirect()->route('loginForm')->withErrors(['id' => $errorText]);
            }



            $otpCode = rand(1111, 9999);
            $token = Str::random(60);
            $otpInputs = [
                'token' => $token,
                'user_id' => $user->id,
                'otp_code' => $otpCode,
                'login_id' => $inputs['id'],
                'type' => $type,
            ];

            Otp::create($otpInputs);
            if ($type === 1) {
                return redirect()->back()->with('swal-warning', 'لطفا شماره تماس خود را وارد کنید');
            }
            $name = "CODE";
            $value = "$otpCode";
            $send = smsir::Send();

            $parameter = new \Cryptommer\Smsir\Objects\Parameters($name, $value);
            $parameters = array($parameter);

            $send->Verify($user->mobile, 100000, $parameters);


            return redirect()->route('auth.login-confirm-form', $token);
        }
        return redirect('/');
    }
    public function loginConfirmForm($token)
    {
        $user = auth()->user();
        if ($user == null) {

            $otp = Otp::where('token', $token)->first();
            if (empty($otp)) {
                return redirect()->route('loginForm')->withErrors(['id' => 'آدرس وارد شده نامعتبر میباشد']);
            }

            return view('site.auth.login-confirm', compact('token', 'otp'));
        }
        return redirect('/');
    }
    public function loginConfirm($token, LoginConfrimRequest $request)
    {
        $user = auth()->user();
        if ($user == null) {
            $inputs = $request->all();

            $otp = Otp::where('token', $token)->where('used', 0)->where('created_at', '>=', Carbon::now()->subMinute(5)->toDateTimeString())->first();
            if (empty($otp)) {
                return redirect()->route('loginForm', $token)->withErrors(['id' => 'آدرس وارد شده نامعتبر میباشد']);
            }

            //if otp not match
            if ($otp->otp_code !== $inputs['otp']) {
                return redirect()->route('auth.login-confirm', $token)->withErrors(['otp' => 'کد وارد شده صحیح نمیباشد']);
            }

            // if everything is ok :
            $otp->update(['used' => 1]);
            $user = $otp->user()->first();

            Auth::login($user);
            if ($user->username != null) {
                return redirect()->route('user.profile', $user->username)
                    ->with('swal-success', 'خوش آمدید');
            } else {
                return redirect()->route('select-username', $user)
                    ->with('swal-success', 'ثبت نام شما با موفقیت انجام شد , لطفا نام کاربری خود را وارد کنید');
            }
        }
        return redirect('/');
    }
    public function loginResendOtp($token)
    {
        $user = auth()->user();
        if ($user == null) {
            $otp = Otp::where('token', $token)->where('created_at', '<=', Carbon::now()->subMinutes(5)->toDateTimeString())->first();

            if (empty($otp)) {
                return redirect()->route('loginForm', $token)->withErrors(['id' => 'ادرس وارد شده نامعتبر است']);
            }

            $user = $otp->user()->first();
            //create otp code
            $otpCode = rand(111111, 999999);
            $token = Str::random(60);
            $otpInputs = [
                'token' => $token,
                'user_id' => $user->id,
                'otp_code' => $otpCode,
                'login_id' => $otp->login_id,
                'type' => $otp->type,
            ];

            Otp::create($otpInputs);

            if ($otp->type === 1) {
                return redirect()->back()->with('swal-warning', 'لطفا شماره تماس خود را وارد کنید');
            }

            $name = "CODE";
            $value = "$otpCode";
            $send = smsir::Send();


            $parameter = new \Cryptommer\Smsir\Objects\Parameters($name, $value);
            $parameters = array($parameter);

            $send->Verify($user->mobile, 100000, $parameters);

            return redirect()->route('auth.login-confirm-form', $token);
        }
        return redirect('/');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('loginForm');
    }
}
