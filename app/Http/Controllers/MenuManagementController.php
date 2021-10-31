<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuManagementController extends Controller
{
    public function index()
    {
        $menus = Menu::paginate(8);
        return View('menuManagement')->with('menus', $menus);
    }
    public function create(Request $request)
    {
        Menu::create([
            'name' => $request->name,
            'menu_id' => $request->id == 0 ? null : $request->id,
        ]);
        return response(['message' => 'menu created'], 201);
    }
    public function update()
    {
    }
    public function delete()
    {
    }
}
