<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Exception;
use Illuminate\Http\Response;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $customerList = Customer::all();
        return view('admin.customer.index', compact('customerList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CustomerRequest $request
     * @return void
     */
    public function store(CustomerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Customer $customer
     * @return void
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Customer $customer
     * @return void
     */
    public function edit(Customer $customer)
    {
        $customerList = Customer::all();
        return view('admin.customer.index', compact('customer', 'customerList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CustomerRequest $request
     * @param Customer $customer
     * @return void
     */
    public function update(CustomerRequest $request, Customer $customer)
    {
        $customer->update($request->all());
        return redirect()->route('customer.index')->with('success', trans('Saved successfully'));;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Customer $customer
     * @return void
     * @throws Exception
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customer.index')->with('success', trans('Deleted successfully'));
    }
}
