<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $tickets = Ticket::all();
        return view('pages.admin.dashboard', compact('tickets'));
    }
}
