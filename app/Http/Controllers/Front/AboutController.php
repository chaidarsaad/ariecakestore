<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Setting;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        $data = Setting::first();
        return view('front.about', [
            'data' => $data,
            'questions' => $questions,
        ]);
    }
}
