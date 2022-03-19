<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MoneyTransaction;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $allCustomers = User::all();
        return view('index', compact('allCustomers'));
    }

    public function customerDetail($id)
    {
        $customerData = User::find($id);
        $allCustomers = User::all();
        return view('customerDetail', compact('customerData', 'allCustomers'));
    }

    public function transactionProcess(Request $request)
    {
        $moneyTransaction = new MoneyTransaction;
        
        $moneyTransaction->customer_from = $request->cus_from_id;
        $moneyTransaction->customer_to = $request->cus_to_id;
        $moneyTransaction->amount = $request->amount_val;
        $moneyTransaction->transaction_number = mt_rand(1000000000, 9999999999);
        
        $moneyTransaction->save();
        
        //update send customer balance
        $customer_from = User::where('id', $request->cus_from_id)->first();
        //return $customer_from->balance;
        if($customer_from) {
            $customer_from->balance = $customer_from->balance - $request->amount_val;
            $customer_from->save();
        }

        //update Recieve customer balance
        $customer_to = User::where('id', $request->cus_to_id)->first();
        if($customer_to) {
            $customer_to->balance = $customer_to->balance + $request->amount_val;
            $customer_to->save();
        }

        return redirect()->route('index');
    }
}
