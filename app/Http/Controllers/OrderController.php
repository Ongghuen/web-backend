<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Product;

class OrderController extends Controller
{
    public function index(Request $request){
        $keyword = $request->keyword;

        $order = Transaction::with(['users', 'products'])
                    ->where('status', $keyword)
                    ->orWhereHas('users', function($query) use($keyword){
                        $query->where('name', 'LIKE', '%'.$keyword.'%');
                    })
                    ->orWhere('total_harga', $keyword)
                    ->orWhere('tgl_transaksi', $keyword)
                    ->orWhere('tgl_transaksi', $keyword)
                    ->sortable()
                    ->paginate(15);
        return view('dashboard.order', ['orderList' => $order]);
    }
}
