<?php

namespace App\Http\Controllers;

use App\categorie;
use App\Mail\alertMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use mysql_xdevapi\Exception;

class CategorieController extends Controller
{
    public function create()
    {
        return view('create_categorie');
    }

    public function store(Request $request){

        $request->validate([
            'name'=>'required',
        ]);

        $name=$request["name"];

        $catgs = Categorie::all()->where('name', '=', $name);

        if(sizeof($catgs)>0)
        {
            return redirect()->route("categories.index")->with('Error', 'You Can not Add Categoies with the same Name  !!');
        }

        $categorie = new Categorie();
        $categorie->name=$name;

        /*Mail*/
        $adminmail = Auth::user()->email;
        Mail::to($adminmail)->send(new alertMail());
        /****/



        $categorie->save();
        return redirect('/categories')->with('success', 'Categorie saved!');

        //return redirect()->route("categories.index")->with('success', 'categorie saved!');
    }

    public function index(){
        $categories=Categorie::all();
        return view('categories',['categories'=>$categories]);
    }

    public function edit($id_catg){
        $categorie = Categorie::findOrFail($id_catg);
        return view('edite_categorie',[
            "categorie"=>$categorie
        ]);

    }

    public function update($id_catg)
    {
        $categorie = Categorie::findOrFail($id_catg);
        $categorie->name = \request()->input("name");

        $catgs = Categorie::all()->where('name', '=', $categorie->name);

        if(sizeof($catgs)>0)
        {
            return redirect()->route("categories.index")->with('Error', 'You Can not update Categoies with the same Name  !!');
        }

        $categorie->update();

        /*Mail*/
        $adminmail = Auth::user()->email;
        Mail::to($adminmail)->send(new alertMail());
        /****/

        return redirect()->route("categories.index")->with('success', 'Categorie Updated!');;

    }

    public function destroy($id_catg)
    {
        try {
            Categorie::destroy($id_catg);
            /*Mail*/
            $adminmail = Auth::user()->email;
            Mail::to($adminmail)->send(new alertMail());
            /****/
            return redirect()->route("categories.index")->with('success', 'Categorie Deleted!');

        }catch (\Exception $ex){
            return redirect()->route("categories.index")->with('Error', 'You Can not Delete this Categorie !!');
        }






    }
}
