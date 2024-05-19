<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class HomeController extends Controller
{
    public function redirect(Request $request)
    {
        return auth()->user()->usertype==0 ? view('user.Home',['doctors'=>doctor::all()]) : view('admin.Home');
    }
    public function index()
    {
        if(auth()->check()){
            return redirect('Home');
        }else{
        return view('user.Home', ['doctors'=>doctor::all()]);
    }
}
}
