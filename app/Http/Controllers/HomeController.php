<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Course;
use App\User;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function dashboard(){
        $number_of_users=User::count();
        $number_of_courses=Course::distinct()->get(['course_id'])->count();

        $number_of_coursewise_students= Course::select('name', DB::raw('count(*) as students'))->groupBy('name')->get();

        return view('admin/dashboard', [
            'number_of_users' => $number_of_users,
            'number_of_courses' => $number_of_courses,
            'number_of_coursewise_students' => $number_of_coursewise_students
        ]);
    }

    public function index()
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'https://api.coursera.org/api/courses.v1');
        $courses= json_decode($res->getBody()->getContents(), true);

        return view('home', ['courses' => $courses]);
    }

    public function saveCourse(Request $request){
        $input=$request->all();
        $input['user_id']=Auth::user()->id;
        $saveCourse=Course::create($input);

        if($saveCourse){
            return redirect('home')->with('success', 'saved successfully');
        }
        return redirect('home')->with('error', 'something went wrong');
    }

    public function viewCourses(){
        $user_id= Auth::user()->id;
        $courses=Course::where('user_id', $user_id)->get();
        return view('view-courses', ['courses' => $courses]);
    }
}
