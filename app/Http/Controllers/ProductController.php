<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use DB;

class ProductController extends Controller
{
    public function addProduct(){

    	$categories=Category::where('publicationStatus','1')->get();
   
        return view('admin.product.addProduct',compact('categories'));
    }
    public function saveProduct( Request $request){
        $this->validate($request,[

        'productName'=>'required',
        'categoryId'=>'required',
        'productPrice'=>'required',
        'productQuantity'=>'required',
        'productDescription'=>'required',
        'productPicture'=>'required',
        'publicationStatus'=>'required'

        ]);

    	$productPic = $request->file('productPicture');
    	$name=$productPic->getClientOriginalName();
    	$uploadPath='uploadPic/';
    	$productPic->move($uploadPath,$name);
    	$imageUrl=$uploadPath.$name;
    	
     $product= new Product();

     $product->productName= $request->productName;
     $product->categoryId= $request->categoryId;
     $product->productPrice= $request->productPrice;
     $product->productQuantity= $request->productQuantity;
     $product->productDescription= $request->productDescription;
     $product->productPicture= $imageUrl;
     $product->publicationStatus= $request->publicationStatus;
     $product->save();

      // Product::create($request->all());
      return redirect('/add-product')->with('message','Product has been Added successfully');
    }
    public function manageProduct(){
    	
    	     $products = DB::table('products')
            ->join('categories', 'products.categoryId','=', 'categories.id')
            ->select('products.*', 'categories.categoryName')
            ->get();
      return view('admin.product.manageProduct',compact('products'));
    } 

    public function viewProduct($id){

    	     $products = DB::table('products')
            ->join('categories', 'products.categoryId','=', 'categories.id')
            ->select('products.*', 'categories.categoryName')
            ->where('products.id',$id)
            ->first();
            return view('admin.product.viewProduct',compact('products'));

    }

    public function editProduct($id){

         $products = DB::table('products')
            ->join('categories', 'products.categoryId','=', 'categories.id')
            ->select('products.*', 'categories.categoryName')
            ->where('products.id',$id)
            ->first();
        $categories=Category::all();
        return view('admin.product.editProduct',compact('products'),compact('categories'));
    }

    public function updateProduct(  Request $request){
      
         $product=Product::find($request->id);
         $product->productName=$request->productName;
         $product->categoryId=$request->categoryId;
         $product->productPrice=$request->productPrice;
         $product->productQuantity=$request->productQuantity;
         $product->productDescription=$request->productDescription;
         $product->productPicture="picture";
         $product->publicationStatus=$request->publicationStatus;
         $product->save();

         return redirect('/manage-product')->with('message','Your data is updated successfully');
    }

    public function deleteProduct($id)
    {
        $product=Product::find($id);
        $product->delete();
        return redirect('/manage-product')->with('message','Your data deleted successfully');

    }

}
