<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;

class TransactionController extends Controller
{


    // ! Create a new transaction
    public function store(Request $request)
    {
        try {
            // * Validasi Request
            $this->validate($request, [
                'quantity' => 'required|integer|min:1',
                'product_id' => 'required|exists:products,id',
            ]);


            // * Cari produk
            $product = Product::findOrFail($request->product_id);
            // * Dapatkan harga produk
            $price = $product->price;

            // * Hitung jumlah pembayaran
            $paymentAmount = $product->price * $request->quantity;

            // * Panggil API untuk membuat transaksi
            $response = Http::withHeaders([
                'X-API-KEY' => 'DATAUTAMA',
            ])->post('https://pay.saebo.id/test-dau/api/v1/transactions', [
                'quantity' => intval($request->quantity),
                'price' => intval($price),
                'payment_amount' => intval($paymentAmount),
            ]);
            // * Ambil data dari response
            $data = $response->json();

            if ($data['code'] === '20000') {
                // * Buat transaksi
                $transaction = Transaction::create([
                    'quantity' => $request->quantity,
                    'price' => $price,
                    'payment_amount' => $paymentAmount,
                    'product_id' => $product->id,
                    'reference_no' => $data['data']['reference_no'],
                ]);

                return response()->json([
                    'success' => true,
                    'message' => 'Transaction created successfully',
                    'data' => [
                        'reference_no' => $data['data']['reference_no'],
                        'quantity' => $transaction->quantity,
                        'price' => $transaction->price,
                        'payment_amount' => $transaction->payment_amount,
                    ]
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Transaction could not be created',
                    'data' => $data['message']
                ], 500);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Transaction could not be asdas',
                'data' => $th->getMessage()
            ], 500);
        }
    }

    // ! Get all transactions
    public function index()
    {
        try {
            $transactions = Transaction::paginate(10);
            return response()->json([
                'success' => true,
                'message' => 'Transactions fetched successfully',
                'data' => $transactions
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Transactions could not be fetched',
                'data' => $e->getMessage()
            ], 500);
        }
    }


    // ! Show a transaction by id
    public function show(Transaction $transaction)
    {
        try {
            return response()->json([
                'success' => true,
                'message' => 'Transaction fetched successfully',
                'data' => $transaction
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Transaction could not be fetched',
                'data' => $e->getMessage()
            ], 500);
        }
    }

    // ! Update a transaction by id
    public function update(Request $request, Transaction $transaction)
    {
        try {
            // Validate Request
            $validator = Validator::make($request->all(), [
                'quantity' => 'required|integer|min:1',
                'product_id' => 'required|exists:products,id',
            ]);

            // Check Validation
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'data' => $validator->errors()
                ], 400);
            }

            // Find the product
            $product = Product::findOrFail($request->product_id);

            // Calculate payment amount
            $paymentAmount = $product->price * $request->quantity;

            // Generate reference number (you can modify this as needed)
            $referenceNo = 'INV' . date('YmdHis') . rand(10000, 99999);

            // Update the transaction
            $transaction->update([
                'quantity' => $request->quantity,
                'price' => $product->price,
                'payment_amount' => $paymentAmount,
                'product_id' => $product->id,
                'reference_no' => $referenceNo,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Transaction updated successfully',
                'data' => [
                    'reference_no' => $referenceNo,
                    'quantity' => $transaction->quantity,
                    'price' => $transaction->price,
                    'payment_amount' => $transaction->payment_amount,
                ]
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Transaction could not be updated',
                'data' => $e->getMessage()
            ], 500);
        }
    }

    // ! Delete a transaction by id
    public function destroy(Transaction $transaction)
    {
        try {
            $transaction->delete();
            return response()->json([
                'success' => true,
                'message' => 'Transaction deleted successfully',
                'data' => $transaction
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Transaction could not be deleted',
                'data' => $e->getMessage()
            ], 500);
        }
    }
}
