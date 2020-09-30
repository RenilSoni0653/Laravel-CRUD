<?php

namespace App\Http\Controllers;

use App\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = product::all();
        return view('about')->with('alldata', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
         //dd($request);
        $product = new product();
        $product->name = $request['name'];
        $product->description = $request['description'];
        $product->save();

        return redirect('about')->with('message', 'data inserted!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = product::find($id);
        // dd($product);

        return view('editview')->with('value',$product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $saved = product::where('id','=',$request->id)
        ->update(['name' => $request->name, 'description'=>$request->description]);

        if($saved){
            return redirect('about');
        }
        elseif(!$saved){
            return redirect('about')->with('message','Data not saved');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = product::where('id','=',$id)->delete();

         return redirect('about');
    }
}

// $this->validate($request,[
        //     'name' => 'required|string|max:100',
        //     'description' => 'required|string|max:100',
        // ]);
