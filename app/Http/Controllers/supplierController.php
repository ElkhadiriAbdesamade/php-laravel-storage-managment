<?php

namespace App\Http\Controllers;

use App\Mail\alertMail;
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class supplierController extends Controller
{
    public function create()
    {
        return view('create_supplier');
    }

    public function store(Request $request){
        $name=$request["name"];
        $email=$request["email"];
        $phone=$request["phone"];
        $address=$request["address"];

        $suppls = Supplier::where('email', '=', $email)->orWhere('phone', '=', $phone)->first();

        if(sizeof($suppls)>0)
        {
            return redirect()->route("suppliers.index")->with('Error', 'You Can not Add Suppliers with the same Info  !!');
        }

        $supplier = new Supplier();
        $supplier->name=$name;
        $supplier->email=$email;
        $supplier->phone=$phone;
        $supplier->address=$address;

        $supplier->save();

        /*Mail*/
        $adminmail = Auth::user()->email;
        Mail::to($adminmail)->send(new alertMail());
        /****/
        return redirect()->route("suppliers.index")->with('success', 'supplier saved!');
    }

    public function index(){
        $suppliers=Supplier::all();
        return view('suppliers',['suppliers'=>$suppliers]);

    }

    public function edit($id_supp){
        $supplier = Supplier::findOrFail($id_supp);
        return view('edite_supplier',[
            "supplier"=>$supplier
        ]);

    }

    public function update(Supplier $supplier,Request $request)
    {
        $supplier->name = $request["name"];
        $supplier->email = $request["email"];
        $supplier->phone = $request["phone"];
        $supplier->address = $request["address"];

        $suppls = Supplier::where('email', '=',  $supplier->email )->orWhere('phone', '=', $supplier->phone)->first();

        if(sizeof($suppls)>0)
        {
            return redirect()->route("suppliers.index")->with('Error', 'You Can not update Suppliers with the same Info  !!');
        }


        $supplier->update();


        /*Mail*/
        $adminmail = Auth::user()->email;
        Mail::to($adminmail)->send(new alertMail());
        /****/
        return redirect()->route("suppliers.index")->with('success', 'supplier Updated!');
    }

    public function destroy($id_supp)
    {


        try {
            Supplier::destroy($id_supp);
            /*Mail*/
            $adminmail = Auth::user()->email;
            Mail::to($adminmail)->send(new alertMail());
            /****/
            return redirect()->route("suppliers.index")->with('success', 'supplier Deleted!');

        }catch (\Exception $ex){
            return redirect()->route("suppliers.index")->with('Error', 'You Can not Delete this supplier !!');
        }




    }
}
