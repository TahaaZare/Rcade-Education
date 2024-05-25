<?php

namespace App\Http\Controllers\Admin\Content\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\Blog\StoreBlogRequest;
use App\Http\Requests\Admin\Content\Blog\UpdateBlogRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Account\User;
use App\Models\Content\Blog\Blog;
use App\Models\Content\Blog\BlogCategory;
use Hashids\Hashids;
use Illuminate\Support\Str;
use Cryptommer\Smsir\Smsir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function index(User $user)
    {
        $auth_user = auth()->user();
        if ($auth_user != null) {
            if ($auth_user->username == $user->username) {
                if ($user != null) {
                    if ($user->user_type == 2) {
                        $blogs = Blog::paginate(6);
                        return view('admin.content.blog.index', compact('user', 'blogs'));
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
                        $categories = BlogCategory::all();
                        return view('admin.content.blog.create', compact('user', 'categories'));
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
    public function store(StoreBlogRequest $request, ImageService $imageService, User $user)
    {
        $auth_user = auth()->user();
        if ($auth_user != null) {
            if ($auth_user->username == $user->username) {
                if ($user != null) {
                    if ($user->user_type == 2) {

                        DB::beginTransaction();

                        try {

                            $inputs = $request->all();
                            if ($request->hasFile('image')) {
                                $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'blogs');
                                $result = $imageService->save($request->file('image'));
                                if ($result === false) {
                                    return back()->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
                                }
                                $inputs['image'] = $result;
                            }

                            $inputs['user_id'] = $user->id;
                            $inputs['create_by'] = $user->id;
                            $inputs['meta_description'] = "meta_description";



                            $blog = Blog::create($inputs);

                            $hashids = new Hashids('your_salt_here', 6); // 'your_salt_here' should be replaced with your preferred salt and 6 is the length of the short link
                            $short_link = $hashids->encode($blog->id);

                            // Update the product with the short link
                            $blog->update(['slug' => $short_link]);

                            DB::commit();


                            return redirect()->route('admin.blog.index', $user->username)
                                ->with('swal-success', 'عملیات با موفقیت انجام شد .');
                        } catch (\Exception $e) {
                            DB::rollback();

                            return "Transaction failed. Error: " . $e->getMessage();
                        }
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
    public function edit(User $user, Blog $blog)
    {
        $auth_user = auth()->user();
        if ($auth_user != null) {
            if ($auth_user->username == $user->username) {
                if ($user != null) {
                    if ($user->user_type == 2) {
                        $categories = BlogCategory::all();
                        $old_status = $blog->status;
                        return view(
                            'admin.content.blog.edit',
                            compact('user', 'blog', 'categories',  'old_status')
                        );
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
    public function update(UpdateBlogRequest $request, ImageService $imageService, User $user, Blog $blog)
    {

        $auth_user = auth()->user();
        if ($auth_user != null) {
            if ($auth_user->username == $user->username) {
                if ($user != null) {
                    if ($user->user_type == 2) {

                        DB::beginTransaction();

                        try {

                            $send_notifications = 0;

                            if ($request->old_status == 0) {
                                if ($request->status == 1) {
                                    $send_notifications = 1;
                                } elseif ($request->status == 2) {
                                    $send_notifications = 2;
                                } else {
                                    $send_notifications = 0;
                                }
                            } elseif ($request->old_status == 1) {
                                if ($request->status == 2) {
                                    $send_notifications = 2;
                                }
                            } elseif ($request->old_status == 2) {
                                if ($request->status == 1) {
                                    $send_notifications = 1;
                                }
                            }

                            $inputs = $request->all();

                            if ($request->hasFile('image')) {
                                if (!empty($blog->image)) {
                                    $imageService->deleteImage($blog->image);
                                }
                                $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'blogs');
                                $result = $imageService->save($request->file('image'));
                                if ($result === false) {
                                    return back()->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
                                }
                                $inputs['image'] = $result;
                            }

                            $blog->update($inputs);


                            DB::commit();


                            if ($send_notifications == 1) {
                                $name = "USER";
                                $find_mobile = User::find($blog->user_id);
                                $value = $find_mobile->mobile;

                                $name3 = "SLUG";
                                $value3 = "$blog->slug";

                                $send = smsir::Send();

                                $parameter = new \Cryptommer\Smsir\Objects\Parameters($name, $value);
                                $parameter3 = new \Cryptommer\Smsir\Objects\Parameters($name3, $value3);
                                $parameters = array($parameter, $parameter3);


                                $send->Verify($find_mobile->mobile, 577998, $parameters);
                            } elseif ($send_notifications == 2) {
                                $name = "USER";
                                $find_mobile = User::find($blog->user_id);

                                $value = $find_mobile->mobile;

                                $name2 = "USERNAME";

                                $value2 =  $find_mobile->username;
                                $send = smsir::Send();

                                $parameter = new \Cryptommer\Smsir\Objects\Parameters($name, $value);
                                $parameter2 = new \Cryptommer\Smsir\Objects\Parameters($name2, $value2);
                                $parameters = array($parameter, $parameter2);


                                $send->Verify($find_mobile->mobile, 332724, $parameters);
                            }


                            return redirect()->route('admin.blog.index', $user->username)
                                ->with('swal-success', 'عملیات با موفقیت انجام شد .');
                        } catch (\Exception $e) {
                            DB::rollback();

                            return "Transaction failed. Error: " . $e->getMessage();
                        }
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
    public function delete(ImageService $imageService, User $user, Blog $blog)
    {
        $auth_user = auth()->user();
        if ($auth_user != null) {
            if ($auth_user->username == $user->username) {
                if ($user != null) {
                    if ($user->user_type == 2) {


                        if (!empty($blog->image)) {
                            $imageService->deleteImage($blog->image);
                        }

                        $blog->delete();

                        return redirect()->route('admin.blog.index', $user->username)
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
