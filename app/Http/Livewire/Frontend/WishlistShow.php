<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Wishlist;

class WishlistShow extends Component
{

    public function removeWishListItem(int $wishlistId){
        $wishlist = Wishlist::where('user_id', auth()->user()->id)->where('id',$wishlistId)->delete();

        $this->emit('wishListCountUpdate');

        $this->dispatchBrowserEvent('message',[
            'text'=> 'Wishlist Deleted Successfully',
            'type'=>'success',
            'status'=>200,
        ]);
    }
    public function render()
    {
        $wishlists = Wishlist::where('user_id',auth()->user()->id)->get();
        return view('livewire.frontend.wishlist-show',[
            'wishlists'=>$wishlists,
        ]);
    }
}
