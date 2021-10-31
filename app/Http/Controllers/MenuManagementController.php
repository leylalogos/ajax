<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuManagementController extends Controller
{
    public function index()
    {
        $menus = Menu::paginate(8);
        $all = Menu::all();
        return View('menuManagement')->with('menus', $menus)->with('all', $all);
    }
    public function create(Request $request)
    {
        Menu::create([
            'name' => $request->name,
            'menu_id' => $request->id == 0 ? null : $request->id,
        ]);
        return response(['message' => 'menu created'], 201);
    }
    public function update(Request $request)
    {
        Menu::find($request->id)->update([
            "name" => $request->name,
            "menu_id" => $request->parent_id == 0 ? null : $request->parent_id,
        ]);
        return response(['message' => 'menu updated'], 200);

    }
    public function delete()
    {
    }
}
