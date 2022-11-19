<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catagory;
use App\Product;
use App\Photo;
use App\Order;
use App\Contact;
use App\sold;

class SoldController extends Controller
{
    public function sold()
    {
        return view('admin.sold')->with('products', Product::all())->with('solds', Sold::all());
    }

    public function soldUpdate(Request $request, $id)
    {
        $product = Product::where('id', $id)->firstOrFail();

     if ($product->quantity >= $request->soldquantity) {
        $quan =  $product->quantity;
        $proname =  $product->name;
  
          $data = $request->soldquantity;
          
          $new = $quan-$data;
  
          $product->update([
              'quantity' => $new
              ]
          );
  
          $product2 = Sold::where('product_id', $id)->first();
  
  
          if ($product2) {
              $uppro = $product2->sold_product;
              $tot = $uppro + $data;
              $product->solds()->update(['sold_product'=>$tot]);
  
              session()->flash('success', $data.' '. $proname.' solded successfully');
              
              return redirect(route('product.index'));
  
          }else{
              $soldProduct = new Sold;
              $soldProduct->product_id =$product->id;
              $product->solds()->create(['sold_product'=>$data]);
              session()->flash('success', $data.' '. $proname.' solded successfully');
              return redirect(route('product.index'));
          }
     }
     session()->flash('error', 'We don\'t have '.$request->soldquantity.' '.$product->name);
              return redirect(route('product.index'));

    }

    public function soldclear($id)
    {
        $product2 = Sold::where('product_id', $id)->first();
        $product2->update(['sold_product'=>0]);

        session()->flash('success',' cleared successfully');
        return redirect(route('sold'));
    }



    public function order()
    {
        return view('admin.order')->with('orders', Order::all());
    }

    public function orderDone(Request $request, $id)
    {
        $order = Order::where('id', $id)->firstOrFail();
        $order->update(['is_sold'=>1]);

        $order->product_id;

        $product = Product::where('id', $order->product_id)->firstOrFail();

      $quan =  $product->quantity;

        $data = $order->product_quantity;
        
        $new = $quan-$data;

        $product->update([
            'quantity' => $new
            ]
        );

        $order->update(['is_sold'=>1]);

        $product2 = Sold::where('product_id', $order->product_id)->first();


        if ($product2) {
            $uppro = $product2->sold_product;
            $tot = $uppro + $data;
            $product->solds()->update(['sold_product'=>$tot]);

            return redirect(route('order'));

        }else{
            $soldProduct = new Sold;
            $soldProduct->product_id =$product->id;
            $product->solds()->create(['sold_product'=>$data]);
            return redirect(route('order'));
        }
    }

    public function orderdelete($id)
    {
        $order = Order::findOrFail($id);
      $order->delete();
      return redirect(route('order'));
    }

    public function viewmail($id)
    {
        $mail = Contact::where('id', $id)->firstOrFail();
        return view('admin.viewmail')->with('usermail', $mail);
    }

}
