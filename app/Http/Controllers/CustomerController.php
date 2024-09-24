<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $tickets = Ticket::where('user_id', auth()->id())->get();
        return view('pages.customer.dashboard', compact('tickets'));
    }
}
