<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Wishlist;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class WishlistCount extends Component
{
    public $wishListCount;

    public function checkWishListCount(){
        if (Auth::check()) {
            return $this->wishListCount = Wishlist::where('user_id',auth()->user()->id)->count();
        }else{
            return $this->wishListCount = 0;
        }

    }
    protected $listeners = ['wishListCountUpdate' => 'checkWishListCount'];
    public function render()
    {
        $this->wishListCount = $this->checkWishListCount();
        return view('livewire.frontend.wishlist-count',[
            'wishListCount'=> $this->wishListCount,
        ]);
    }
}
