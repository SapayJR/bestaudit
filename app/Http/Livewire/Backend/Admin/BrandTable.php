<?php

namespace App\Http\Livewire\Backend\Admin;

use App\Models\Brand;
use App\Models\Language;
use Livewire\Component;

class BrandTable extends Component
{
    public $search;
    public $length = 20;
    public $count;
    public $tag = 'id';
    public $sort = 'desc';
    public $locale;


    public function mount(){
        $this->locale = Language::getLanguagesList()->where('default', 1)->pluck('locale');
        $this->count = Brand::count();
    }

    public function render()
    {
        $brands = $this->search
            ? $this->brandFilter()
            : Brand::with([
                'category.translation' => fn($q) => $q->where('locale', $this->locale)
            ])->orderBy($this->tag, $this->sort)->take($this->length)->get();

        return view('livewire.backend.admin.brand-table', compact('brands'));
    }

    public function brandFilter(){
        $search = $this->search;

        return Brand::with([
            'category.translation' => fn($q) => $q->where('locale', $this->locale)
        ])
            ->where('title', 'LIKE', "%$search%")
            ->orWhere('id', 'LIKE', "%$search%")
            ->take($this->length)
            ->orderBy($this->tag, $this->sort)
            ->get();
    }
}
