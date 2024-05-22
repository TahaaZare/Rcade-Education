<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Account\User;
use App\Models\Content\Blog\Blog;
use App\Models\Content\Course\Course;
use App\Models\Content\Course\CourseCategory;
use App\Models\Content\Site\Faq;
use Database\Seeders\UserSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
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

        #endregion

        $au = User::find(1);
        Auth::login($au);

        $faqs = Faq::where('status', 1)->take(4)->get();
        $blogs = Blog::where('status', 1)->orderBy('created_at', 'desc')->take(6)->get();
        $course_categories = CourseCategory::all();
        $courses = Course::all();
        return view('site.home', compact('faqs', 'blogs', 'course_categories', 'courses'));
    }
}
