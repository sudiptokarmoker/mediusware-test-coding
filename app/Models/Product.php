<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    protected $fillable = [
        'title', 'sku', 'description',
    ];
    public static function loadAllProduct()
    {
        $query = DB::table('products')
            ->orderByDesc('created_at')
            ->get();
        $result = [];
        if(count($query) > 0){
            foreach($query as $row){
                $result[] = [
                    'id' => $row->id,
                    'title' => $row->title,
                    'description' => $row->description,
                    'variant_data' => ''
                ];
            }
        }
    }
}
