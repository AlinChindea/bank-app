<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAccountRequest;
use App\Http\Requests\UpdateAccountRequest;
use App\Models\Account;
use App\Models\Customer;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Customer $customer)
    {
        $accounts = $customer->accounts;

        if ($accounts->isEmpty()) {
            return response()->json(['message' => 'No account. Create one now.']);
        }

        return response()->json($accounts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAccountRequest $request, Customer $customer)
    {
        // Store the credentials if request is valid
        $account = $customer->accounts()->create($request->validated());

        // Return a JSON response
        return response()->json($account);
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer, Account $account)
    {
        // ? make sure the customer checking this is the one who owns the account
        // $account = $account->load('customer');

        return response()->json(['account' => $account, 'customer' => $customer]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAccountRequest $request, Account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        //
    }
}
