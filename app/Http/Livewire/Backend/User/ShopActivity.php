<?php

namespace App\Http\Livewire\Backend\User;

use App\Models\Shop;
use App\Traits\SweetAlertResponse;
use Livewire\Component;
use function view;

class ShopActivity extends Component
{
    use SweetAlertResponse;
    public bool $visibility;
    public bool $open;
    public Shop $shop;

    public function mount($shop){
        $this->visibility = $shop->visibility;
        $this->open = $shop->open;
        $this->shop = $shop;
    }
    public function render()
    {
        return view('livewire.backend.user.shop-activity');
    }

    public function switchVisibility(){
        if ($this->visibility){
            auth()->user()->shop()->update(['visibility' => 1]);
            $this->sweetAlert2Success(__('web.visible_mode_enabled'));
        } else {
            auth()->user()->shop()->update(['visibility' => 0]);
            $this->sweetAlert2Error(__('web.invisible_mode_enabled'));
        }
    }

    public function switchOpen(){
        if ($this->open){
            auth()->user()->shop()->update(['open' => 1]);
            $this->sweetAlert2Success(__('web.shop_open'));
        } else {
            auth()->user()->shop()->update(['open' => 0]);
            $this->sweetAlert2Error(__('web.shop_closed'));
        }
    }
}
