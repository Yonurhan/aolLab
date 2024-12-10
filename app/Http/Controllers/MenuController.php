<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

class MenuController extends Controller
{
    public function index(){
        $viewMakanan = Menu::orderBy("food_name","desc")->simplePaginate(3);
        return view("homepage",compact("viewMakanan"));
    }

    public function fileUpload(){
        return view('addmenu');
    }

    public function menu(){
        $viewMakanan = Menu::orderBy("food_name","desc")->paginate(6);
        return view("menuitems",compact("viewMakanan"));
    }

    public function search(Request $request)
    {
        $viewMakanan = Menu::where("food_name","LIKE","%$request->search%")->paginate(6);

        return view('menuitems',compact("viewMakanan"));
    }

    public function index_add(){
        $viewMenu = Menu::orderBy("item_type","desc")->paginate(10);
        return view("addmenu",compact("viewMenu"));
    }

    public function add(Request $request){
        $validateData = $request->validate([
            'item_type' => 'required|string|max:255',
            'food_name' => 'required|string|max:255',
            'description' => 'required|string|max:50',
            'image_path' => 'required|file|image|max:5000',
        ]);
        // dd($validateData);
       
            $extFile = $request->image_path->getClientOriginalExtension();
            $name = $request->input('food_name');
            $fileName = $name.'.'.$extFile;
            $path = $request->image_path->storeAs('storage', $fileName, 'public');
            $validateData['image_path'] = $path;
        

        $validateData['date'] = Carbon::now()->format('Y-m-d');

        Menu::create($validateData);
        return redirect('/add-menu')->with('success', 'Menu is added successfully!');
    }

    public function edit(Request $request, $id)
    {
        $viewMenu = Menu::find($id);
        return view('updatemenu',compact('viewMenu'))
    }

    public function update(Request $request, $id){
        $validateData = $request->validate([
            'item_type' => 'required|string|max:255',
            'food_name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'image_path' => 'nullable|file|image',
        ]); 
        
        $menu = Menu::find($id);

        if ($request->hasFile('file')) {
            $extFile = $request->file->getClientOriginalExtension();
            $name = $request->input('food_name');
            $fileName = $name.'.'.$extFile;
            $path = $request->file->storeAs('storage', $fileName, 'public');
            $menu->image_path = $path;
        }
        
        $menu->item_type = $validateData['item_type'];
        $menu->food_name = $validateData['food_name'];
        $menu->description = $validateData['description'];
        $menu->save();

        return redirect('/add-menu')->with('success', 'Menu is updated successfully');

    }
}
