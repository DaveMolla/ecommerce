<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;
use App\Notifications\newOrder;

use App\Catagory;
use App\Product;
use App\Photo;
use App\sold;
use App\Contact;
use App\Order;


class MainPageController extends Controller
{
    public function index()
    {
       
        return view('welcome')
        ->with('products', Product::searched()->paginate(10))
        ->with('pro', Product::paginate(5))
        ->with('catagories', Catagory::all())
        ->with('solds', Sold::all())
        ->with('photos', Photo::all());
    }

    public function detail(Product $id)
    {
        return view('detail')
        ->with('products', $id)
        ->with('produc', Product::all())
        ->with('catagories', Catagory::all())
        ->with('photos', Photo::all());
    }

    public function customerOrder(OrderRequest $request, $id)
    {
        $product = Product::where('id', $id)->firstOrFail();

        $product2 = Order::count();

        if ($request->quantity > $product->quantity) {
            session()->flash('error', 'Sory! We have only '.$product->quantity.' '.$product->name.' Left');
            return redirect(route('detail', $product->id));
        }

        $orderNo = $product2 + 1001;
            
           $ord = Order::create([

                'product_name'=>$product->name,
                'product_id'=>$product->id,
                'customer_fname'=>$request->firstName,
                'customer_lname'=>$request->lastName,
                'customer_phone'=>$request->phone,
                'product_quantity'=>$request->quantity,
                'order_number'=>$orderNo,
            ]);


            // $product->notify(new newOrder($product));


            session()->flash('success', 'You are successfully purchased, you can take it with in 24 hour your order Number is <span class="text-primary">'.$orderNo.'</span>  Please show this number when u take it, Thank You!');
            return redirect(route('detail', $product->id));
      
        
        
    }

    public function contact(ContactRequest $request)
    {
       $data = Contact::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->message,
        ]);

        // Mail::to('amandesalegnb@gmail.com')->send(new ContactFormMail($data));

        session()->flash('success', 'We received your message and Thank you!.');
        return redirect()->back();
    }

    public function catagory(Catagory $id)
    {
       
        return view('products')
        ->with('catagory', $id)
        ->with('catagories', Catagory::all())
        ->with('pro', Product::paginate(5))
        ->with('products', $id->products()->paginate(12));
    }

    public function all()
    {
       
        return view('products')
        ->with('catagories', Catagory::all())
        ->with('pro', Product::paginate(5))
        ->with('products', Product::searched()->paginate(30));
    }
    

}
