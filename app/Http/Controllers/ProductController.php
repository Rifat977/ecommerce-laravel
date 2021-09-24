<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EcomProduct;
use App\Http\Resources\EcomProductResource;
use App\Http\Resources\EcomProductCollection;

class ProductController extends Controller
{
    
    public function index()
    {
        $product = EcomProduct::all();
        return EcomProductCollection::collection($product);
    }

   
    public function create()
    {
        //
    }

  
    public function store(Request $request)
    {
        //
    }

   
    public function show($id)
    {
        return new EcomProductResource(EcomProduct::find($id));
    }

    public function showByCategory($id)
    {
        $product = EcomProduct::where('categoryId',$id)->get();
        return EcomProductCollection::collection($product);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
