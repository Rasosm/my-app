<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make(
            $request->all(),
            [
            'name' => 'required|alpha|min:4',
            'surname' => 'required|alpha|min:4',
            'personal_id' => 'required|numeric',

            ],
            [
                'name.required' => 'Prašau įvesti vardą',
                'name.min' => 'Vardas turi būti mažiausiai iš 4 raidžių',
                'name.alpha' => 'Neteisingai įvestas vardas',
                'surname.required' => 'Prašau įvesti pavardę',
                'surname.min' => 'Pavardė turi būti mažiausiai iš 4 raidžių',
                'surname.alpha' => 'Neteisingai įvesta pavardė',
                'personal_id.required' => 'Prašau įvesti asmens kodą',
                'personal_id.size' => 'Neteisingai įvestas asmens kodas',
                'personal_id.numeric' => 'Asmens kodas turi būti sudarytas iš skaitmenų',

            ]);

             $request->flash();

             if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }


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
        $validator = Validator::make(
            $request->all(),
            [
            'name' => 'required|string|min:4',
            'surname' => 'required|string|min:4',
            'personal_id' => 'required|numeric',

            ],
            [
                'name.required' => 'Prašau įvesti vardą',
                'name.min' => 'Vardas turi būti mažiausiai iš 4 raidžių',
                'name.string' => 'Neteisingai įvestas vardas',
                'surname.required' => 'Prašau įvesti pavardę',
                'surname.min' => 'Pavardė turi būti mažiausiai iš 4 raidžių',
                'surname.string' => 'Neteisingai įvesta pavardė',
                'personal_id.required' => 'Prašau įvesti asmens kodą',
                // 'personal_id.size' => 'Neteisingai įvestas asmens kodas',
                'personal_id.numeric' => 'Asmens kodas turi būti sudarytas iš skaitmenų',

            ]);

             $request->flash();

             if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }


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
         $validator = Validator::make(
            $request->all(),
            [
            'balance' => 'numeric',
            ],
            [
                'balance.numeric' => 'Prašau įvesti skaičius',
               
            ]);

             $request->flash();

             if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }

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
        $validator = Validator::make(
            $request->all(),
            [
            'balance' => 'numeric',
            ],
            [
                'balance.numeric' => 'Prašau įvesti skaičius',
               
            ]);

             $request->flash();

             if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }

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
