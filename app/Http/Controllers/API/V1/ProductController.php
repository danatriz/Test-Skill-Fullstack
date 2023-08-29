<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    // ! Get all products
    public function index()
    {
        try {
            $products = Product::paginate(10);
            return response()->json([
                'success' => true,
                'message' => 'Products fetched successfully',
                'data' => $products
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Products could not be fetched',
                'data' => $e->getMessage()
            ], 500);
        }
    }

    // ! Create a new product
    public function store(Request $request)
    {
        try {
            // * Validate Request
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'price' => 'required|numeric|min:0',
                'stock' => 'required|integer|min:0',
                'description' => 'required|string',
            ]);

            // * Check Validation
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors()
                ], 422);
            }

            // * Create Product
            $product = Product::create([
                'name' => $request->name,
                'price' => $request->price,
                'stock' => $request->stock,
                'description' => $request->description,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Product created successfully',
                'data' => $product
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Product could not be created',
                'data' => $e->getMessage()
            ], 500);
        }
    }


    // ! Get a single product
    public function show(Product $product)
    {
        try {
            return response()->json([
                'success' => true,
                'message' => 'Product fetched successfully',
                'data' => $product
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Product could not be fetched',
                'data' => $e->getMessage()
            ], 500);
        }
    }

    // ! Update a product
    public function update(Request $request, Product $product)
    {
        try {
            // * Validate Request
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'price' => 'required|numeric|min:0',
                'stock' => 'required|integer|min:0',
                'description' => 'required|string',
            ]);

            // * Check Validation
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors()
                ], 422);
            }

            // * Update Product
            $product->update([
                'name' => $request->name,
                'price' => $request->price,
                'stock' => $request->stock,
                'description' => $request->description,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Product updated successfully',
                'data' => $product
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Product could not be updated',
                'data' => $e->getMessage()
            ], 500);
        }
    }

    // ! Delete a product
    public function destroy(Product $product)
    {
        try {
            $product->delete();
            return response()->json([
                'success' => true,
                'message' => 'Product deleted successfully',
                'data' => $product
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Product could not be deleted',
                'data' => $e->getMessage()
            ], 500);
        }
    }
}
