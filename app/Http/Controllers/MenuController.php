<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index(){

    $menus = Menu::whereNull('menu_id')->get();
    return view('home')->with('menus',$menus);
    }
}
