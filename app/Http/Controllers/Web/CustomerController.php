<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\StoreCustomerRequest;
use App\Http\Requests\Customer\UpdateCustomerRequest;
use App\Models\Customer;
use App\Services\CustomerService;
use Exception;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * @var CustomerService
     */
    protected CustomerService $customerService;

    /**
     * @param CustomerService $customerService
     */
    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            $customers = $this->customerService->orderByIdDesc(15, ['user']);

            // 
        } catch (Exception $excaption) {

            abort(502, $excaption->getMessage());
        }

        return view('customer')->with('customers', $customers);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        try {

            $this->customerService->createCustomer($request->all());

            // 
        } catch (Exception $excaption) {

            abort(502, $excaption->getMessage());
        }

        return redirect()->route('customers')->with('success', 'Successfully registered a new customer.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return view('customer.show')->with('customer', $customer);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('customer.edit')->with('customer', $customer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        try {

            $this->customerService->updateCustomer($customer, $request->all());

            // 
        } catch (Exception $excaption) {

            abort(502, $excaption->getMessage());
        }

        return back()->with('success', 'Successfully updated customer.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        try {

            $this->customerService->deleteCustomer($customer);

            // 
        } catch (Exception $excaption) {

            abort(502, $excaption->getMessage());
        }

        return redirect()->route('customers')->with('success', 'Successfully deleted customer.');
    }
}
