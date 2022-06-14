<?php

namespace App\Http\Livewire\Backend\Admin;

use App\Models\Shop;
use Livewire\Component;

class ShopTable extends Component
{
    public string $search = '';
    public bool $filter = false;
    public string $status = 'all';
    public int $length = 20;
    public int $count;
    public string $column = 'updated_at';
    public string $sort = 'desc';

    public function mount(){
        $this->count = Shop::count();
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        $this->length = $this->length > 0 ? $this->length : $this->length = 20;
        $shops = $this->search ? $this->shopSearch() :
            Shop::with([
                'seller',
                'translation' => fn($q) => $q->select('shop_id', 'title')
            ]);

        $shops = $shops->when($this->status != 'all', function ($q) {
               $q->where('status', $this->status);
           })->take($this->length)
            ->orderBy($this->column, $this->sort)
            ->get();

        return view('livewire.backend.admin.shop-table', compact('shops'));
    }


    public function shopSearch()
    {
        $search = $this->search;

        return Shop::with([
            'seller',
            'translation' => fn($q) => $q->select('shop_id', 'title')
        ])->when($this->status != 'all', function ($q) {
                $q->where('status', $this->status);
        })->whereHas('translation', function ($q) use($search) {
                $q->where('title', 'LIKE', "%$search%");
        })->orWhere('id', 'LIKE', "%$search%");
    }

    public function sortBy($column){
        $this->sort = $this->sort == 'asc'? 'desc' : 'asc';
        $this->column = $column ?? 'updated_at';
    }

    public function setFilter(){
        $this->filter = !$this->filter;
    }
}
