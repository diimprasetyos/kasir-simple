<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::latest()->paginate(5);
        $products = Product::all();

        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        return view('transactions.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
              'price',
            'qty',
            'total',
            'date'
        ]);
    
        $product = Product::findOrFail($request->id);
    
        $transaction = new Transaction();
        $transaction->date = $request->date;
        $transaction->product_id = $product->id;
        $transaction->quantity = $request->quantity;
        $transaction->total = $product->price * $request->quantity; // You might want to calculate total based on quantity and price
        $transaction->save();
    
        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    // Other methods for show, edit, update, and destroy
}
