<?php

namespace App\Http\Controllers;
use App\Catagory;
use App\Product;
use App\Photo;
use App\Contact;
use App\Order;
use App\Sold;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index')
        ->with('products', Product::all())
        ->with('catagories', Catagory::all())
        ->with('photos', Photo::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create')->with('catagories', Catagory::all());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {

        if ($request->price < $request->discount) {
            session()->flash('error', 'Product discount can not be greater than product price');
            return redirect(route('product.create'));
        }
      

       $product = Product::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'discount'=>$request->discount,
            'quantity'=>$request->quantity,
            'priority'=>$request->priority,
            'description'=>$request->description,
            
        ]);

        if ($request->catagory) {
            foreach ($request->catagory as $value) {
                $product->catagories()->attach($value);
            }
            
        }
        if ($request->file('images')) {

            foreach ($request->file('images') as $image) {
                $postImage = new Photo;
                $name = time()."_product_".$image->getClientOriginalName();
                $name = str_replace(' ', '_', $name);
                $image->move('img/products/',$name );
                $postImage->product_id = $product->id;
                $product->photos()->create(['photo_path'=>$name]);
            }

        }
        session()->flash('success', 'Product created successfully');

        return redirect(route('product.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.show')
        ->with('products', $product)
        ->with('catagories', Catagory::all())
        ->with('photos', Photo::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.create')
        ->with('products', $product)
        ->with('catagories', Catagory::all())
        ->with('photos', Photo::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(ProductUpdateRequest $request, $id)
    {
        $data = $request->only(['name','price','discount','quantity','priority','description']);
        $product = Product::where('id', $id)->firstOrFail();

        if ($file = $request->file('images')) {
            
            foreach ($product->photos as $value) {
                if(file_exists(public_path().'/img/products/'.$value->photo_path)){
                    unlink(public_path().'/img/products/'.$value->photo_path);
                }
                
            }
            $product->photos()->delete();

            foreach ($request->file('images') as $image) {
                
                $postImage = new Photo;
                $name = time()."_product_".$image->getClientOriginalName();
                $name = str_replace(' ', '_', $name);
                $image->move('img/products/',$name );
                $postImage->product_id = $product->id;
               $product->photos()->create(['photo_path'=>$name]);

                
            }

        }

        if ($request->catagory) {
                $product->catagories()->sync($request->catagory);
            
        }

        $product->update($data);

        session()->flash('success', 'Product Updated successfully');
       
        return redirect(route('product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {

      $order = Order::all()->where('product_id', $product->id)->where('is_sold', 0);

        if ($order->count() > 0) {

            session()->flash('error','Product can not be deleted, because there is an order by this product, please complete that first');

        return redirect()->back();
        }
        
      $sold = Sold::where('product_id', $product->id);
      $sold->delete();

            foreach ($product->photos as $value) {

                if(file_exists(public_path().'/img/products/'.$value->photo_path)){
                    unlink(public_path().'/img/products/'.$value->photo_path);
                }
                
            }



        $product->delete();
        return redirect(route('product.index'));
    }

    public function mail()
    {
        return view('admin.mail')
        ->with('mails', Contact::all());
    }

    
}
