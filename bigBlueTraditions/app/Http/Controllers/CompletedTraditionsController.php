<?php

namespace App\Http\Controllers;

use App\Models\CompletedTradition;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tradition;


class CompletedTraditionsController extends Controller
{

    public function __construct(){
        $this->middleware(['auth']);
    }
    
    public function index(){
        return view('traditions.index');
    }

    public function store(Request $request){
        $this->validate($request, [
            'body' => 'required'
        ]);
 
        $request->user()->completedTraditions()->create([
            'body' => $request->body,
            'tradition_id' => $request->tradition
        ]);

        $traditionRow = Tradition::find($request->tradition);
        $points = $traditionRow->points;

        $user = User::where('id', '=', $request->user()->id)->first();
        $user->points += $points;
        $user->save();
        return redirect('userInfo');
    }
}
