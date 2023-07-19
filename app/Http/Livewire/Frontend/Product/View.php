<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Cart;
use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class View extends Component
{
    public $category,$product,$prodColorSelectedQuantity, $quantityCount = 1,$productColorId;

    public function colorSelected($productColorId){
        $this->productColorId = $productColorId;
        $productColor = $this->product->productColors->where('id',$productColorId)->first();
        $this->prodColorSelectedQuantity = $productColor->color_quantity;

        if ($this->prodColorSelectedQuantity == 0) {
            $this->prodColorSelectedQuantity = 'outOfStock';
        }

    }


    public function mount($category,$product){
        $this->category = $category;
        $this->product = $product;
    }



    public function addToWishlist($productId){


        if (Auth::check()) {
            if (Wishlist::where('user_id',auth()->user()->id)->where('product_id',$productId)->exists()) {
                session()->flash('message','Already Added To Wishlist');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Already Added To Wishlist',
                    'type' => 'warning',
                    'status' => 409
                ]);
                return false;
            }else{
                Wishlist::create([
                    'user_id'=> auth()->user()->id,
                    'product_id'=> $productId,
                ]);
                $this->emit('wishListCountUpdate');
                session()->flash('message','Wishlist Added Successfully');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Wishlist Added Successfully',
                    'type' => 'success',
                    'status' => 200
                ]);
            }
        }else{

            session()->flash('message','Please Login To Continue');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Please Login To Continue',
                    'type' => 'info',
                    'status' => 401
                ]);
                return false;
        }

    }

    public function incrementQuantity(){
        if ($this->quantityCount < 10) {
            $this->quantityCount++;
        }
    }
    public function decrementQuantity(){
        if ($this->quantityCount > 1) {
            $this->quantityCount--;
        }
    }

    public function addToCart(int $productId){


        if (Auth::check()) {
            if ($this->product->where('id',$productId)->where('status',0)->exists()) {

                // check for product color quantity and add to cart

                if ($this->product->productColors->count() > 1) {

                    if ($this->prodColorSelectedQuantity != NULL) {
                        if (Cart::where('user_id',auth()->user()->id)
                                ->where('product_id',$productId)
                                ->where('product_color_id',$this->productColorId)
                                ->exists())
                        {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Product Already Added',
                                'type' => 'warning',
                                'status' => 401
                            ]);
                        }
                        else
                        {

                            $product_color = $this->product->productColors->where('id',$this->productColorId)->first();
                            if ($product_color->color_quantity > 0) {

                                if (Cart::where('id',auth()->user()->id)->where('product_id',$productId)->exists()) {
                                    # code...
                                } else {
                                    # code...
                                }

                                if ($product_color->color_quantity > $this->quantityCount) {
                                    // Insert Product to Count
                                    Cart::insert([
                                        'user_id'=> auth()->user()->id,
                                        'product_id'=> $productId,
                                        'product_color_id'=> $this->productColorId,
                                        'quantity'=> $this->quantityCount,
                                    ]);
                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'Product Added To Cart',
                                        'type' => 'Success',
                                        'status' => 401
                                    ]);

                                }
                                else
                                {
                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'Only'.$product_color->color_quantity.' Quantity available',
                                        'type' => 'warning',
                                        'status' => 409
                                    ]);

                                }

                            }
                            else
                            {
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Out Of Stock',
                                    'type' => 'warning',
                                    'status' => 409
                                ]);
                            }
                        }




                    }
                    else
                    {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Select your product Color',
                            'type' => 'warning',
                            'status' => 409
                        ]);
                    }

                }
                else
                {
                    if (Cart::where('user_id',auth()->user()->id)->where('product_id',$productId)->exists()) {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Product Already Added',
                            'type' => 'warning',
                            'status' => 401
                        ]);
                    }
                    else
                    {
                        if ($this->product->quantity > 0) {

                            if ($this->product->quantity > $this->quantityCount) {
                                // Insert Product to Cart
                                Cart::insert([
                                    'user_id'=> auth()->user()->id,
                                    'product_id'=> $productId,
                                    'quantity'=> $this->quantityCount,
                                ]);
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Product Added To Cart',
                                    'type' => 'Success',
                                    'status' => 401
                                ]);


                            }
                            else
                            {
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Only'.$this->product->quantity.'Quantity Available!',
                                    'type' => 'warning',
                                    'status' => 409
                                ]);
                            }


                    }
                    else
                    {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Out Of Stock',
                            'type' => 'warning',
                            'status' => 409
                        ]);
                    }
                    }
                }



            }
            else
            {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Product Does Not Exist',
                    'type' => 'warning',
                    'status' => 404
                ]);
            }

        }
        else
        {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please Login to Continue',
                'type' => 'warning',
                'status' => 409
            ]);
        }
    }

    public function render()
    {
        return view('livewire.frontend.product.view',[
            'category'=>$this->category,
            'product'=>$this->product,
        ]);
    }
}
