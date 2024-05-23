<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Account\User;
use App\Models\Content\Blog\Blog;
use App\Models\Content\Course\Course;
use App\Models\Content\Course\CourseCategory;
use App\Models\Content\Site\AboutUs;
use App\Models\Content\Site\Faq;
use App\Models\Content\Site\MasterRules;
use Database\Seeders\AboutUsSeeder;
use Database\Seeders\MasterRulesSeed;
use Database\Seeders\UserSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        $auth_user = auth()->user();
        if ($auth_user != null) {
            if ($auth_user->username == null) {
                return redirect()->route('select-username', $auth_user)
                    ->with('swal-success', 'ثبت نام شما با موفقیت انجام شد , لطفا نام کاربری خود را وارد کنید');
            }
        }

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

        $about = AboutUs::first();
        if ($about === null) {
            $default = new AboutUsSeeder();
            $default->run();
        }

        #endregion



        $faqs = Faq::where('status', 1)->take(4)->get();
        $blogs = Blog::where('status', 1)->orderBy('created_at', 'desc')->take(6)->get();
        $course_categories = CourseCategory::all();
        $courses = Course::where('status', 1)->take(9)->get();
        return view('site.home', compact('faqs', 'blogs', 'course_categories', 'courses'));
    }

    public function MasterRules()
    {
        $rule = MasterRules::first();
        if ($rule === null) {
            $default = new MasterRulesSeed();
            $default->run();
        }

        $rule = MasterRules::find(1);
        return view('site.content.master-rules', compact('rule'));
    }

    public function AboutUs()
    {
        $about = AboutUs::first();
        if ($about === null) {
            $default = new AboutUsSeeder();
            $default->run();
        }

        $about = AboutUs::find(1);
        return view('site.content.about-us', compact('about'));
    }

    #region blog section

    public function Blogs()
    {
        $blogs = Blog::where('status', 1)->where('slug', '!=', null)->paginate(6);
        return view('site.content.blog.blogs', compact('blogs'));
    }
    public function ShowBlog(Blog $blog)
    {
        if ($blog->status != 0 && $blog->slug != null) {
            $other_blogs = Blog::where('status', 1)
                ->where('id', '!=', $blog->id) // Exclude the main blog
                ->inRandomOrder()
                ->take(2)
                ->get();
            return view('site.content.blog.show-blog', compact('blog', 'other_blogs'));
        } else {
            return redirect()->route('blogs')->with('swal-warning', 'مقاله ایی یافت نشــد !');
        }
    }

    #endregion

    #region course section


    public function Courses()
    {
        $courses = Course::where('status', 1)->where('slug', '!=', null)->paginate(9);
        return view('site.content.course.courses', compact('courses'));
    }

    public function ShowCourse(Course $course)
    {
        if ($course->status == 1 && $course->slug != null) {
            return view('site.content.course.show-course', compact('course'));
        } else {
            return redirect()->route('courses')->with('swal-warning', 'دوره ایی یافت نشــد !');
        }
    }

    #endregion
}
