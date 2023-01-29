<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPageShow = in_array($request->per_page, Customer::PER_PAGE) ? $request->per_page : 'visi';
        if(!$request->s){
        
            
        // $customers = Customer::orderBy('surname')->orderBy('name')->where('id', '>', 0);
        $customers = Customer::where('id', '>', 0);

        
        $customers = match($request->sort ?? '') {
                'asc_name' => $customers->orderBy('name')->orderBy('surname'),
                'desc_name' => $customers->orderBy('name', 'desc')->orderBy('surname', 'desc'),
                'asc_surname' => $customers->orderBy('surname')->orderBy('name'),
                'desc_surname' => $customers->orderBy('surname', 'desc')->orderBy('name', 'desc'),
                'asc_balance' => $customers->orderBy('balance'),
                'desc_balance' => $customers->orderBy('balance', 'desc'),
                default => $customers->orderBy('surname')->orderBy('name')
            };

            
            if( $perPageShow == 'visi'){
                $customers = $customers->get();
            }else{
                $customers = $customers->paginate($perPageShow)->withQueryString();
            }
                     
        }
        else{
            $s = explode(' ', $request->s);

            if(count($s) == 1){
            $customers = Customer::where('name', 'like', '%'.$request->s.'%')
            ->orWhere('surname', 'like', '%'.$request->s.'%')
            ->get();

            }
            else{
                $customers = Customer::where('name', 'like', '%'.$s[0].'%'.$s[1].'%')
                ->orWhere('surname', 'like', '%'.$s[0].'%'.$s[1].'%')
                ->orWhere('name', 'like', '%'.$s[1].'%'.$s[0].'%')
                ->orWhere('surname', 'like', '%'.$s[1].'%'.$s[0].'%')
                ->get();
            }
        }
            

        // $customers = Customer::all()->sortBy('surname')->sortBy('name');
        return view('back.customers.index', [
            'customers' => $customers,
            'sortSelect' => Customer::SORT,
            'sortShow' => isset(Customer::SORT[$request->sort]) ? $request->sort : '',
            'perPageSelect' => Customer::PER_PAGE,
            // 'perPageShow' => in_array($request->per_page, Customer::PER_PAGE) ? $request->per_page : 'visi',
            'perPageShow' =>  $perPageShow,
            's' => $request->s ?? ''
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
            'personal_id' => 'required|integer|unique:customers,personal_id|regex:/^([3-6]{1})([0-9]{2})([0-1]{1})([0-9]{1})([0-3]{1})([0-9]{1})([0-9999]{4})$/'
            ],
            [
                'name.required' => 'Prašau įvesti vardą',
                'name.min' => 'Vardas turi būti mažiausiai iš 4 raidžių',
                'name.alpha' => 'Neteisingai įvestas vardas',
                'surname.required' => 'Prašau įvesti pavardę',
                'surname.min' => 'Pavardė turi būti mažiausiai iš 4 raidžių',
                'surname.alpha' => 'Neteisingai įvesta pavardė',
                'personal_id.required' => 'Prašau įvesti asmens kodą',
                'personal_id.regex' => 'Neteisingai įvestas asmens kodas',
                'personal_id.integer' => 'Asmens kodas turi būti sudarytas iš skaitmenų',
                'personal_id.unique' => 'Toks asmens kodas jau egzistuoja',

            ]);

             

             if ($validator->fails()) {
                $request->flash();
                return redirect()->back()->withErrors($validator);
            }


        $customer = new Customer;
        $customer->name = $request->name;
        $customer->surname = $request->surname;
        $customer->account_number = 'LT82'.' '. '7300'.' '.'0'.rand(0,9).rand(0,9).rand(0,9).' '.rand(0,9).rand(0,9).rand(0,9).rand(0,9).' '.rand(0,9).rand(0,9).rand(0,9).rand(0,9);;
        $customer->personal_id = $request->personal_id;
        $customer->balance = 0;

        $customer->save();
       

        return redirect()->route('customers-index')->with('ok', 'Sveikinu, sėkmingai sukūrėte naują sąskaitą');
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
            'name' => 'required|alpha|min:4',
            'surname' => 'required|alpha|min:4',
            'personal_id' => 'required|integer|regex:/^([3-6]{1})([0-9]{2})([0-1]{1})([0-9]{1})([0-3]{1})([0-9]{1})([0-9999]{4})$/'
            ],
            [
                 'name.required' => 'Prašau įvesti vardą',
                'name.min' => 'Vardas turi būti mažiausiai iš 4 raidžių',
                'name.alpha' => 'Neteisingai įvestas vardas',
                'surname.required' => 'Prašau įvesti pavardę',
                'surname.min' => 'Pavardė turi būti mažiausiai iš 4 raidžių',
                'surname.alpha' => 'Neteisingai įvesta pavardė',
                'personal_id.required' => 'Prašau įvesti asmens kodą',
                'personal_id.regex' => 'Neteisingai įvestas asmens kodas',
                'personal_id.integer' => 'Asmens kodas turi būti sudarytas iš skaitmenų',
                

            ]);

             $request->flash();

             if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }


        $customer->name = $request->name;
        $customer->surname = $request->surname;
        $customer->account_number = $request->account_number;
        $customer->personal_id = $request->personal_id;
        $customer->balance = $customer->balance;

        $customer->save();

        return redirect()->route('customers-index')->with('ok', 'Sąskaita sėkmingai redaguota');
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
            'balance' => 'numeric|min:0',
            ],
            [
                'balance.numeric' => 'Prašau įvesti skaičius',
                'balance.min' => 'Prašau įvesti teigiamus skaičius',
               
            ]);

             if ($validator->fails()) {
                $request->flash();
                return redirect()->back()->withErrors($validator);
            }

        $customer->balance = $customer->balance + $request->balance;
        $customer->save();
        return redirect()->back()->with('ok', 'Pinigai sėkmingai pridėti');
        
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
            'balance' => 'numeric|min:0',
            ],
            [
                'balance.numeric' => 'Prašau įvesti skaičius',
                'balance.min' => 'Prašau įvesti teigiamus skaičius',
               
            ]);

             $request->flash();

             if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }

        if ($customer->balance >= $request->balance){
            $customer->balance = $customer->balance - $request->balance;    
        $customer->save();
        return redirect()->back()->with('ok', 'Pinigai sėkmingai nuskaityti');
        }else{
        return redirect()->back()->with('not', 'Nepakanka lėšų');
        }    
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        if ($customer->balance == 0){
        $customer->delete();
        return redirect()->route('customers-index')->with('ok', 'Sąskaita sėkmingai ištrinta');
        }
         return redirect()->back()->with('not', 'Negalima ištrinti sąskaitos jei likutis didesnis nei 0');

    }
}
