<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title ='Data Customer';
        $itemCustomer = User::where('role', 'member')->paginate(20);
        return view('customer.index', compact('title', 'itemCustomer'))->with('no', 1);
    }

    public function cari(Request $request) 
    {
        $title = 'Cari Customer';
        $cari = $request->key;
        $itemCustomer = User::where('role', 'member')
                            ->where('name', 'LIKE', '%'.$cari.'%')
                            ->orWhere('email', 'LIKE', '%'.$cari.'%')
                            ->orWhere('telepon', 'LIKE', '%'.$cari.'%')
                            ->orWhere('status', 'LIKE', '%'.$cari.'%')
                            ->paginate(20);
                            
        return view('customer.index', compact('title', 'cari', 'itemCustomer'))->with('no', 1);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Edit Customer';
        return view('customer.edit', compact('title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
