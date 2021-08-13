<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Sections;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function index()
    {
        $sections = Sections::all();
        $products = products::all();
        return view('products.products', compact('sections', 'products'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $request->validate(
            [
                'Product_name' => 'required|unique:products|max:255',
            ],
            [
                'Product_name.required' => 'يرجي ادخال اسم المنتج',
                'Product_name.unique'   => 'اسم المنتج مسجل مسبقا',
            ]
        );
        Products::create([
            'Product_name' => $request->Product_name,
            'section_id'   => $request->section_id,
            'description'  => $request->description,
        ]);
        session()->flash('Add', 'تم اضافة المنتج بنجاح ');
        return redirect('/products');
    }


    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $products)
    {

        // $id = $request->id;
        $id = sections::where('section_name', $request->section_name)->first()->id;

        $this->validate($request, [

            'Product_name' => 'required|max:255|unique:sections,section_name,'.$id,
            'description'  => 'required',
        ],[

            'Product_name.required' =>'يرجي ادخال اسم المنتج',
            'Product_name.unique'   =>'اسم المنتج مسجل مسبقا',
            'description.required'  =>'يرجي ادخال البيان',

        ]);


        $Products = Products::findOrFail($request->pro_id);

        $Products->update([
            'Product_name' => $request->Product_name,
            'description' => $request->description,
            'section_id' => $id,
        ]);

        session()->flash('Edit', 'تم تعديل المنتج بنجاح');
        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products, Request $request)
    {
        $Products = Products::findOrFail($request->pro_id);
        $Products->delete();
        session()->flash('delete', 'تم حذف المنتج بنجاح');
        return redirect('/products');
    }
}
