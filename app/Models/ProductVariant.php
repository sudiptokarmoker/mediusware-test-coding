<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductVariant extends Model
{
    protected $table = 'product_variants';
    protected $fillable = [
        'variant',
        'variant_id',
        'product_id'
    ];

    public static function returnProductVariantData($product_id){
        //$query = DB::table('product_variants')
    }
}
