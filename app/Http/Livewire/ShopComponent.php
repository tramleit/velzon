<?php

namespace App\Http\Livewire;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
use App\Models\Category;

class ShopComponent extends Component
{
    public $sorting;
    public $pagesize;
    public $minPrice;
    public $maxPrice;


    use WithPagination;

    public function mount()
    {
        $this->sorting="default";
        $this->pagesize=12;

        $this->minPrice = 1;
        $this->maxPrice = 1000;
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item added in Cart');
        return redirect()->route('product.cart');
    }

    public function render()
    {
        if ($this->sorting=="date") {
            $products=Product::whereBetween('regular_price', [$this->minPrice, $this->maxPrice])->orderBy('created_At', 'DESC')->paginate($this->pagesize);
        }
        elseif ($this->sorting=="price") {
            $products=Product::whereBetween('regular_price', [$this->minPrice, $this->maxPrice])->orderBy('regular_price', 'ASC')->paginate($this->pagesize);
        }
        elseif ($this->sorting=="price-desc") {
            $products=Product::whereBetween('regular_price', [$this->minPrice, $this->maxPrice])->orderBy('regular_price', 'DESC')->paginate($this->pagesize);
        }
        else {
            $products=Product::whereBetween('regular_price', [$this->minPrice, $this->maxPrice])->paginate($this->pagesize);
        }
        $categories = Category::all();
        // dd($categories);
        // dd($products->take(2));
        return view('livewire.shop-component', ['products' => $products, 'categories'=>$categories])->layout('layouts.base');
    }
}
