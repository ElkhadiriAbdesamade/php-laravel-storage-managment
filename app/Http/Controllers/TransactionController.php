<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Mail\alertMail;
use App\Product;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TransactionController extends Controller
{
    public function create()
    {
        $customers=Customer::all();
        $products=Product::all();
        return view('create_taransaction',['customers'=>$customers],['products'=>$products]);

    }

    public function store(Request $request){
        $id_customer=$request["customer"];
        $id_product=$request["product"];
        $qty_purchased=$request["qty_purchased"];
        $transaction_date=date("Y/m/d");

        if ($qty_purchased <0 ) {
            $messages = 'the Qty You want to purchase Must be More Than 0';
            return redirect()->route("transactions.index")->withErrors($messages);
        }

        if ($qty_purchased == 0)
        {
            $messages = 'the Qty You want to purchase Must be More Than 0';
            return redirect()->route("transactions.index")->withErrors($messages);
        }


        $transaction = new Transaction();
        $transaction->id_customer=$id_customer;
        $transaction->id_product=$id_product;
        $transaction->qty_purchased=intval($qty_purchased);
        $transaction->transaction_date=$transaction_date;

        $product = Product::findOrFail($id_product);



        if ($product->qty_stock < $qty_purchased)
        {

            $messages = 'the Qty You want to purchase is more Than what we have in Stock';
            return redirect()->route("transactions.index")->with('Error', $messages);

        }
        $product->qty_stock-=$qty_purchased;

        $product->update();


        $transaction->save();

        /*Mail*/
        $adminmail = Auth::user()->email;
        Mail::to($adminmail)->send(new alertMail());
        /****/
        return redirect()->route("transactions.index")->with('success', 'Transaction saved!');;
    }

    public function index(){

        $transactions=Transaction::with('customer','product')->get();
        // dd(compact('products'));
        return view('transactions',compact("transactions"));
    }



    public function destroy($id_trs)
    {
        Transaction::destroy($id_trs);

        /*Mail*/
        $adminmail = Auth::user()->email;
        Mail::to($adminmail)->send(new alertMail());
        /****/

        return redirect()->route("transactions.index")->with('success', 'Transaction Deleted!');;;

    }
}
