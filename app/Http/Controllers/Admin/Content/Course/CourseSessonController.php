<?php

namespace App\Http\Controllers\Admin\Content\Course;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\Course\Sesson\StoreSessonAdminRequest;
use App\Http\Requests\Admin\Content\Course\Sesson\UpdateSessonAdminRequest;
use App\Models\Account\User;
use App\Models\Content\Course\Course;
use App\Models\Content\Course\CourseSesson;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CourseSessonController extends Controller
{
    public function index(User $user, Course $course)
    {
        $auth_user = auth()->user();
        if ($auth_user != null) {
            if ($auth_user->username == $user->username) {
                if ($user != null) {
                    if ($user->user_type == 2) {
                        $sessons = CourseSesson::paginate(6);
                        return view('admin.content.course.sesson.index', compact('user','course', 'sessons'));
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
    public function create(User $user,Course $course)
    {
        $auth_user = auth()->user();
        if ($auth_user != null) {
            if ($auth_user->username == $user->username) {
                if ($user != null) {
                    if ($user->user_type == 2) {
                        return view('admin.content.course.sesson.create', compact('user','course'));
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
    public function store(StoreSessonAdminRequest $request, User $user,Course $course)
    {
        $auth_user = auth()->user();
        if ($auth_user != null) {
            if ($auth_user->username == $user->username) {
                if ($user != null) {
                    if ($user->user_type == 2) {
                        DB::beginTransaction();

                        try {

                            $inputs = $request->all();
                            $inputs['course_id'] = $course->id;
                            $course_sesson = CourseSesson::create($inputs);

                            DB::commit();


                            return redirect()->route('admin.course-sesson.index', [$user->username,$course])
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
    public function edit(User $user,Course $course, CourseSesson $sesson)
    {
        $auth_user = auth()->user();
        if ($auth_user != null) {
            if ($auth_user->username == $user->username) {
                if ($user != null) {
                    if ($user->user_type == 2) {
                        return view('admin.content.course.sesson.edit', compact('user','course', 'sesson'));
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
    public function update(UpdateSessonAdminRequest $request,  User $user,Course $course, CourseSesson $sesson)
    {

        $auth_user = auth()->user();
        if ($auth_user != null) {
            if ($auth_user->username == $user->username) {
                if ($user != null) {
                    if ($user->user_type == 2) {


                        DB::beginTransaction();

                        try {

                            $inputs = $request->all();

                            $sesson->update($inputs);

                            DB::commit();

                            return redirect()->route('admin.course-sesson.index', [$user->username,$course])
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
}
