<?php

namespace App\Http\Controllers\Admin\Content\Course;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\Course\StoreCourseCategoryRequest;
use App\Http\Requests\Admin\Content\Course\UpdateCourseCategoryRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Account\User;
use App\Models\Content\Course\CourseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CourseCategoryController extends Controller
{
    public function index(User $user)
    {
        $auth_user = auth()->user();
        if ($auth_user != null) {
            if ($auth_user->username == $user->username) {
                if ($user != null) {
                    if ($user->user_type == 2) {
                        $categories = CourseCategory::paginate(6);
                        return view('admin.content.course.category.index', compact('user', 'categories'));
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
                        return view('admin.content.course.category.create', compact('user'));
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
    public function store(StoreCourseCategoryRequest $request, ImageService $imageService, User $user)
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
                                $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'course-categories');
                                $result = $imageService->save($request->file('image'));
                                if ($result === false) {
                                    return back()->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
                                }
                                $inputs['image'] = $result;
                            }

                            $inputs['user_id'] = $user->id;

                            $category = CourseCategory::create($inputs);

                            DB::commit();


                            return redirect()->route('admin.course-category.index', $user->username)
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
    public function edit(User $user, CourseCategory $category)
    {
        $auth_user = auth()->user();
        if ($auth_user != null) {
            if ($auth_user->username == $user->username) {
                if ($user != null) {
                    if ($user->user_type == 2) {
                        return view('admin.content.course.category.edit', compact('user', 'category'));
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
    public function update(UpdateCourseCategoryRequest $request, ImageService $imageService, User $user, CourseCategory $category)
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
                                if (!empty($category->image)) {
                                    $imageService->deleteImage($category->image);
                                }
                                $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'course-categories');
                                $result = $imageService->save($request->file('image'));
                                if ($result === false) {
                                    return back()->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
                                }
                                $inputs['image'] = $result;
                            }

                            $inputs['user_id'] = $user->id;

                            $category->update($inputs);

                            DB::commit();


                            return redirect()->route('admin.course-category.index', $user->username)
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
    public function delete(User $user, CourseCategory $category)
    {
        $auth_user = auth()->user();
        if ($auth_user != null) {
            if ($auth_user->username == $user->username) {
                if ($user != null) {
                    if ($user->user_type == 2) {

                        $category->delete();

                        return redirect()->route('admin.course-category.index', $user->username)
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
