<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminCustomerController extends Controller
{
    /**
     * =========================================
     * HALAMAN CUSTOMER ADMIN
     * =========================================
     */
    public function index()
    {
        $customers = User::latest()->get();

        $totalCustomer = $customers->count();

        return view('admin.customer', compact(
            'customers',
            'totalCustomer'
        ));
    }
}