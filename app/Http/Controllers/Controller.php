<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Thesis;
use App\Models\User;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getDashboard(Request $request){
        $users = User::get();
        $loggedUser = $request->user();
        $theses = Thesis::get();
        return view('dashboard', ['users' => $users, 'loggedUser'=> $loggedUser, 'theses' => $theses]);
    }
}
