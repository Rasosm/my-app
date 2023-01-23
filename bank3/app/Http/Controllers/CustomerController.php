<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all()->sortBy('surname');
        return view('back.customers.index', [
            'customers' => $customers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = new Customer;
        $customer->name = $request->name;
        $customer->surname = $request->surname;
        $customer->account_number = $request->account_number;
        $customer->personal_id = $request->personal_id;
        $customer->balance = $request->balance;

        $customer->save();

        return redirect()->route('customers-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
         return view('back.customers.edit', [
            'customer' => $customer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $customer->name = $request->name;
        $customer->surname = $request->surname;
        $customer->account_number = $request->account_number;
        $customer->personal_id = $request->personal_id;
        $customer->balance = $request->balance;

        $customer->save();

        return redirect()->route('customers-index');
    }
public function add(Customer $customer)
    {
         return view('back.customers.add', [
            'customer' => $customer
        ]);
    }

    public function updateAdd(Request $request, Customer $customer)
    {
        $customer->balance = $customer->balance + $request->balance;
        $customer->save();
        // return redirect()->route('customers-index');
        return view('back.customers.add', [
            'customer' => $customer
        ]);
    }

    public function transfer(Customer $customer)
    {
         return view('back.customers.transfer', [
            'customer' => $customer
        ]);
    }

    public function updateTransfer(Request $request, Customer $customer)
    {
        $customer->balance = $customer->balance - $request->balance;
        $customer->save();
        return redirect()->route('customers-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
         $customer->delete();
        return redirect()->route('customers-index');
    }
}
