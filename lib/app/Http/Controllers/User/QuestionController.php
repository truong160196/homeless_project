<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class QuestionController extends Controller
{
     public function index()
    {
        return view('page.user.faq.index');
    }
}
