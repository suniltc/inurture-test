<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Course;

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
        return view('admin/dashboard');
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
}
