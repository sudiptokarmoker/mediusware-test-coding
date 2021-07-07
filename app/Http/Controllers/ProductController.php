<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $product = Product::all();

        //dd($product);
        return view('products.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $variants = Variant::all();
        return view('products.create', compact('variants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'sku' => 'required|max:255',
            'description' => 'max:65535',
            //'product_image' => 'mimes:jpeg,png,jpg,gif|max:6144',
        ]);
        /**
         * if fails on validation
         */
        if ($validator->fails()) {
            return self::return_response('validation error', false, ['error' => $validator->errors()->all()], 0, 400);
        }
        try {
            /**
             * Now create product
             */
            $productInsertState = Product::create([
                'title' => $request->title,
                'sku' => $request->sku,
                'description' => $request->description,
            ]);
            /**
             * store varient request value
             */
            if(isset($request->variant_lists_data) && count($request->variant_lists_data) > 0){
                foreach($request->variant_lists_data as $varient){
                    \App\Models\ProductVariant::create([
                        'variant' => $varient['varient_options_value'],
                        'variant_id' => $varient['varient_id'],
                        'product_id' => $productInsertState->id,
                    ]);
                }
            }
            /**
             * send response
             */
            return self::return_response('created product successfully', true, $productInsertState, 1, 200);
        } catch (\Exception $e) {
            return self::return_response('Exception occoured', false, ['error' => $e->getMessage()], 0, 417);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show($product)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $variants = Variant::all();
        return view('products.edit', compact('variants'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
