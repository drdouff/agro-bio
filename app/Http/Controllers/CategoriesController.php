<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

class CategoriesController extends Controller
{
    //

    public function addcategories(){
        return view('admin.add-categories');
    }

    public function sauvercategorie(Request $request){

        $this->validate($request, ['category_name' => 'required|unique:categories']);

        $categorie = new Category();

        $categorie->category_name = $request->get('category_name');

        $categorie->save();

        return redirect('/addcategories')->with('status', 'la categorie ' . $categorie -> category_name . ' a ete ajoutee avec succes');
    }

    public function categories(){

        $categories = Category::get();
        return view('admin.categories')->with('categories', $categories);
    }

    public function edit_categorie($id){
        $categorie = Category::find($id);

        return view('admin.editecategorie')->with('categorie', $categorie);
    }

    public function modifiercategorie(Request $request){
        $this->validate($request, ['category_name' => 'required|unique:categories']);

        $categorie = Category::find($request->input('id'));

        $categorie->category_name = $request->get('category_name');

        $categorie->update();

        return redirect('/categories')->with('status', 'la categorie ' . $categorie -> category_name . ' a ete modifiee avec succes');

    }

    public function supprimercategorie($id){
        $categorie = Category::find($id);

        $categorie->delete();

        return redirect('/categories')->with('status', 'la categorie ' . $categorie -> category_name . ' a ete supprimee avec succes');
    }
}
