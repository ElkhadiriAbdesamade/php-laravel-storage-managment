<?php

namespace App\Http\Controllers;

use App\categorie;
use App\product;
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\Mail;
use \App\Mail\alertMail;

class productController extends Controller
{


    public function create()
    {
        $categories=Categorie::all();
        $suppliers=Supplier::all();
        return view('create_product',['categories'=>$categories],['suppliers'=>$suppliers]);

    }

    public function store(Request $request){
        $name=$request["name"];
        $desc=$request["desc"];
        $qty=$request["qty"];
        $price=$request["price"];
        $catg=$request["catg"];
        $supp=$request["supp"];

        $prds = Product::all()->where('name', '=', $name);

        if(sizeof($prds)>0)
        {
            return redirect()->route("products.index")->with('Error', 'You Can not Add Products with the same Name  !!');
        }

        $product = new Product();
        $product->name=$name;
        $product->descreption=$desc;
        $product->qty_stock=$qty;
        $product->price=$price;
        $product->id_categorie=$catg;
        $product->id_supplier=$supp;


        if($request->hasFile('image')){

                $file = $request["image"];
                $destination = 'images/product'.'/';
                $ext= $file->getClientOriginalExtension();
                $filename = time().".".$ext;
                $file->move($destination, $filename);
                $product->image=$filename;
                echo "uploaded successfully";

        }else{
            //return $request;
            $product->image='';
        }

        $product->save();

        /*Mail*/
        $adminmail = Auth::user()->email;
        Mail::to($adminmail)->send(new alertMail());
        /****/


        return redirect()->route("products.index")->with('success', 'Product saved!');
    }

    public function index(){
        $products=Product::with('categorie','supplier')->get();
       // dd(compact('products'));
        return view('products',compact("products"));
    }

    public function edit($id_prd){
        $product = Product::findOrFail($id_prd);
        $categories=Categorie::all();
        $suppliers=Supplier::all();
        return view('edite_product',["product"=>$product,'categories'=>$categories,'suppliers'=>$suppliers]);

    }

    public function update($id_prd,Request $request)
    {

        $product = Product::findOrFail($id_prd);
        $product->name = \request()->input("name");
        $product->descreption = \request()->input("desc");
        $product->qty_stock = \request()->input("qty");
        $product->price = \request()->input("price");
        $product->id_categorie = \request()->input("catg");;
        $product->id_supplier = \request()->input("supp");;

        $prds = Product::all()->where('name', '=', $product->name);

        if(sizeof($prds)>0)
        {
            return redirect()->route("products.index")->with('Error', 'You Can not update Products with the same Name  !!');
        }

        if($request->hasFile('image')){

            $file = $request["image"];
            $destination = 'images/product'.'/';
            $ext= $file->getClientOriginalExtension();
            $filename = time().".".$ext;
            $file->move($destination, $filename);
            $product->image=$filename;
            echo "uploaded successfully";

        }else{
            //return $request;
            $product->image='';
        }

        $product->update();

        /*Mail*/
        $adminmail = Auth::user()->email;
        Mail::to($adminmail)->send(new alertMail());
        /****/

        return redirect()->route("products.index")->with('success', 'Product Updated!');

    }

    public function destroy($id_prd)
    {

        try {
            Product::destroy($id_prd);

            /*Mail*/
            $adminmail = Auth::user()->email;
            Mail::to($adminmail)->send(new alertMail());
            /****/

            return redirect()->route("products.index")->with('success', 'Product Deleted!');

        }catch (\Exception $ex){
            return redirect()->route("products.index")->with('Error', 'You Can not Delete this Product !!');
        }



    }
}
