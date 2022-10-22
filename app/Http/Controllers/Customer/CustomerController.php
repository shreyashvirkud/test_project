<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Support\Facades\View;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    function create(Request $request){
       

        //Validate Inputs
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|email|unique:customers,email',
            'contact_no'=>'required|digits:10|unique:customers,contact_no',
            'password'=>'required|min:5|max:30|confirmed',
            // 'cpassword'=>'required|min:5|max:30|same:password'
        ]);


        $customer = new Customer();
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->contact_no = $request->contact_no;
        $customer->password = Hash::make($request->password);
        $customer->users_password = $request->password;
        $save = $customer->save();

        if( $save ){
            return redirect()->back()->with('success','You are now registered successfully');
        }else{
            return redirect()->back()->with('fail','Something went wrong, failed to register');
        }
  }

  function check(Request $request)
    {
        // dd($request);
        //Validate Inputs
        $request->validate([
            'email' => 'required|email|exists:customers,email',
            'password' => 'required|min:5|max:30'
        ], [
            'email.exists' => 'This email is not exists in Customers table'
        ]);

        $creds = $request->only('email', 'password');

        if (Auth::guard('customer')->attempt($creds)) {
            
            return redirect()->route('home');
        } else {
            return redirect()->route('login')->with('fail', 'Incorrect Credentials');
        }
    }

    public function products(){
        $products = Product::latest()->paginate(5);
        return view::make('customer.products',compact('products'));
    }

    public function showcustomers(){
        $customers = Customer::all();
        return view::make('customer.list',compact('customers'));

    }

    function logout(Request $request){
        $request->session()->flush();
    Auth::guard('web')->logout();
    return redirect('/');
}
}
