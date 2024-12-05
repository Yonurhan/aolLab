<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class MenuController extends Controller
{
    public function index(){
        $viewMakanan = Menu::orderBy("food_name","desc")->simplePaginate(3);
        return view("homepage",compact("viewMakanan"));
    }

    public function menu(){
        $viewMakanan = Menu::orderBy("food_name","desc")->paginate(3);
        return view("menuitems",compact("viewMakanan"));
    }

    public function search(Request $request)
    {
        $viewMakanan = Menu::where("food_name","LIKE","%$request->search%")->paginate(3);

        return view('menuitems',compact("viewMakanan"));
    }
}
