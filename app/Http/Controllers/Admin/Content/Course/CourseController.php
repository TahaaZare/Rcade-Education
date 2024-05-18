<?php

namespace App\Http\Controllers\Admin\Content\Course;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\Course\StoreCourseRequest;
use App\Http\Requests\Admin\Content\Course\UpdateCourseRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Account\User;
use App\Models\Content\Course\Course;
use App\Models\Content\Course\CourseCategory;
use Hashids\Hashids;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function index(User $user)
    {
        $auth_user = auth()->user();
        if ($auth_user != null) {
            if ($auth_user->username == $user->username) {
                if ($user != null) {
                    if ($user->user_type == 2) {
                        $courses = Course::paginate(6);
                        return view('admin.content.course.index', compact('user', 'courses'));
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
                        $categories = CourseCategory::all();
                        $masters = User::where('status', 1)->where('user_type', 1)->get();
                        return view('admin.content.course.create', compact('user', 'categories', 'masters'));
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
    public function store(StoreCourseRequest $request, ImageService $imageService, User $user)
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
                                $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'courses');
                                $result = $imageService->save($request->file('image'));
                                if ($result === false) {
                                    return back()->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
                                }
                                $inputs['image'] = $result;
                            }

                            $inputs['create_by'] = $user->id;
                            $inputs['meta_keywords'] = $request->tags;
                            $inputs['meta_description'] = $request->description;

                            $course = Course::create($inputs);


                            $hashids = new Hashids('your_salt_here', 6); // 'your_salt_here' should be replaced with your preferred salt and 6 is the length of the short link
                            $short_link = $hashids->encode($course->id);

                            // Update the product with the short link
                            $course->update(['short_link' => $short_link]);

                            DB::commit();


                            return redirect()->route('admin.course.index', $user->username)
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
    public function edit(User $user, Course $course)
    {
        $auth_user = auth()->user();
        if ($auth_user != null) {
            if ($auth_user->username == $user->username) {
                if ($user != null) {
                    if ($user->user_type == 2) {
                        $categories = CourseCategory::all();
                        $masters = User::where('status', 1)->where('user_type', 1)->get();
                        return view('admin.content.course.edit', compact('user', 'categories','masters','course'));
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
    public function update(UpdateCourseRequest $request, ImageService $imageService, User $user, Course $course)
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
                                if (!empty($course->image)) {
                                    $imageService->deleteImage($course->image);
                                }
                                $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'courses');
                                $result = $imageService->save($request->file('image'));
                                if ($result === false) {
                                    return back()->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
                                }
                                $inputs['image'] = $result;
                            }

                            $inputs['create_by'] = $user->id;
                            $inputs['meta_keywords'] = $request->tags;
                            $inputs['meta_description'] = $request->description;

                            $course->update($inputs);

                            DB::commit();


                            return redirect()->route('admin.course.index', $user->username)
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

    public function delete(ImageService $imageService, User $user, Course $course)
    {
        $auth_user = auth()->user();
        if ($auth_user != null) {
            if ($auth_user->username == $user->username) {
                if ($user != null) {
                    if ($user->user_type == 2) {


                        if (!empty($course->image)) {
                            $imageService->deleteImage($course->image);
                        }

                        $course->delete();

                        return redirect()->route('admin.course.index', $user->username)
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
