<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\CompletedTradition;

class UserInfoController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index(){
        $completedTraditions = CompletedTradition::get();
        return view('userInfo',[
            'completedTraditions' => $completedTraditions
        ]);

    }

    
}
