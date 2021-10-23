<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Produit;
use Illuminate\Support\Facades\Storage;

class ProduitsController extends Controller
{
    //

    public function addproduit(){
        $categories = Category::get()->pluck('category_name', 'category_name');
        return view('admin.add-produit')->with('categories', $categories);
    }

    public function sauverproduit(Request $request){
        $this->validate($request, ['product_name' => 'required|unique:produits',
                                   'product_price' => 'required',
                                   'product_category' => 'required',
                                   'product_image' => 'image|nullable|max:1999',]);
        if($request->hasFile('product_image')){
            //1 : get file name with ext
            $fileNameWithExt = $request->file('product_image')->getClientOriginalName();
            //2 : get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //3 : get just file extension
            $extension = $request->file('product_image')->getClientOriginalExtension();
            //4 : file name to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //uploader image
            $path = $request->file('product_image')->storeAs('public/product_image', $fileNameToStore);

        }
        else{
            $fileNameToStore = 'noimage.jpg';
        }

        $produit = new Produit();

        $produit->product_name = $request->input('product_name');
        $produit->product_price = $request->input('product_price');
        $produit->product_category = $request->input('product_category');
        $produit->product_image = $fileNameToStore;
        $produit->status = 1;

        $produit->save();

        return redirect('/addproduit')->with('status', 'le produit '.$produit->product_name.' a bien ete ajoute !');

    }

    public function produits(){

        $produits = Produit::get();
        return view('admin.produits')->with('produits', $produits);
    }

    public function edit_produit($id){
        $produit = Produit::find($id);

        $categories = Category::get()->pluck('category_name', 'category_name');

        return view('admin.editeproduit')->with('produit', $produit)->with('categories', $categories);
    }

    public function modifierproduit(Request $request){
        $this->validate($request, [
            'product_name' => 'required',
            'product_price' => 'required',
            'product_category' => 'required',
            'product_image' => 'image|nullable|max:1999',]);

        $produit = Produit::find($request->input('id'));
        $produit->product_name = $request->input('product_name');
        $produit->product_price = $request->input('product_price');
        $produit->product_category = $request->input('product_category');

        if($request->hasFile('product_image')){
            //1 : get file name with ext
            $fileNameWithExt = $request->file('product_image')->getClientOriginalName();
            //2 : get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //3 : get just file extension
            $extension = $request->file('product_image')->getClientOriginalExtension();
            //4 : file name to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //uploader image
            $path = $request->file('product_image')->storeAs('public/product_image', $fileNameToStore);

        }

        if($produit->product_image != 'noimage.jpg'){
            Storage::delete('public/product_image/'.$produit->product_image);
        }

        $produit->product_image = $fileNameToStore;

        $produit->update();

        return redirect('/produits')->with('status', 'le produit '.$produit->product_name.' a bien ete modifie !');
    }

    public function suprimerproduit($id){
        $produit = Produit::find($id);

        if($produit->product_image != 'noimage.jpg'){
            Storage::delete('public/product_image/'.$produit->product_image);
        }

        $produit->delete();

        return redirect('/produits')->with('status', 'le produit ' . $produit -> product_name . ' a ete supprimee avec succes');
    }

    public function active_produit($id){
        $produit = Produit::find($id);

        $produit-> status = 1;

        $produit->update();

        return redirect('/produits')->with('status', 'le produit ' . $produit -> product_name . ' a ete Active  avec succes');
    }

    public function desactiver_produit($id){
        $produit = Produit::find($id);

        $produit-> status = 0;

        $produit->update();

        return redirect('/produits')->with('status', 'le produit ' . $produit -> product_name . ' a ete Desactiver  avec succes');
    }

}
