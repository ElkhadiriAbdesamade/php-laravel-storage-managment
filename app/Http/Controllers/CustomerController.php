<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Mail\alertMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CustomerController extends Controller
{
    public function create()
    {
        return view('create_customer');
    }

    public function store(Request $request){
        $name=$request["name"];
        $email=$request["email"];
        $phone=$request["phone"];
        $address=$request["address"];

        $custs = Customer::where('email', '=', $email)->orWhere('phone', '=', $phone)->first();

        if(sizeof($custs)>0)
        {
            return redirect()->route("customers.index")->with('Error', 'You Can not Add Customers with the same Info  !!');
        }

        $customer = new Customer();
        $customer->name=$name;
        $customer->email=$email;
        $customer->phone=$phone;
        $customer->address=$address;

        $customer->save();

        /*Mail*/
        $adminmail = Auth::user()->email;
        Mail::to($adminmail)->send(new alertMail());
        /****/
        return redirect()->route("customers.index")->with('success', 'Customer saved!');
    }

    public function index(){
        $customers=Customer::all();
        return view('customers',['customers'=>$customers]);

    }

    public function edit($id_cust){
        $customer = Customer::findOrFail($id_cust);
        return view('edite_customer',[
            "customer"=>$customer
        ]);

    }

    public function update(Customer $customer,Request $request)
    {
        $customer->name = $request["name"];
        $customer->email = $request["email"];
        $customer->phone = $request["phone"];
        $customer->address = $request["address"];

        $custs = Customer::where('email', '=', $customer->email)->orWhere('phone', '=', $customer->phone)->first();

        if(sizeof($custs)>0)
        {
            return redirect()->route("customers.index")->with('Error', 'You Can not update Customers with the same Info  !!');
        }

        $customer->update();

        /*Mail*/
        $adminmail = Auth::user()->email;
        Mail::to($adminmail)->send(new alertMail());
        /****/

        return redirect()->route("customers.index")->with('success', 'Customer Updated!');
    }

    public function destroy($id_cust)
    {

        try {
            Customer::destroy($id_cust);


            /*Mail*/
            $adminmail = Auth::user()->email;
            Mail::to($adminmail)->send(new alertMail());
            /****/
            return redirect()->route("customers.index")->with('success', 'Customer Deleted!');

        }catch (\Exception $ex){
            return redirect()->route("customers.index")->with('Error', 'You Can not Delete this Customer !!');
        }



    }
}
