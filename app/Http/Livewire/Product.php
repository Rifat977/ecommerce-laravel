<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\EcomProduct;
use App\Models\EcomCategory;
use Livewire\WithFileUploads;

class Product extends Component
{
    use WithFileUploads;

    public $productName, $categoryId, $sku, $image, $regularPrice, $price, $stock=0, $description;
    public $selectId, $selectproductName, $selectcategory, $selectcategoryId, $selectsku, $selectimage, $selectnewImage=null, $selectregularPrice, $selectprice, $selectstock=0, $selectdescription;
    public $sl=1;
    public $products, $categorys;

    protected $rules = [
        'productName' => 'required|max:255',
        'categoryId' => 'required',
        'sku' => 'required|max:255',
        'image' => 'required',
        'regularPrice' => 'required',
        'price' => 'required',
        'stock' => 'required',
        'description' => 'required|max:1000',

    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function addProduct(){
        $this->validate();
        $file = $this->image->store('photos');
        $product = new EcomProduct;
        $product->productName = $this->productName;
        $product->categoryId = $this->categoryId;
        $product->sku = $this->sku;
        $product->image = $file;
        $product->regularPrice = $this->regularPrice;
        $product->price = $this->price;
        $product->stock = $this->stock;
        $product->description = $this->description;
        $product->save();

        $this->mount();

        $this->productName = null;
        $this->categoryId = null;
        $this->sku = null;
        $this->image = null;
        $this->regularPrice = null;
        $this->price = null;
        $this->stock = 0;
        $this->description = null;
    }

    public function selectSingleProduct($id){
        $item = EcomProduct::find($id);
        $this->selectId = $item->id;
        $this->selectproductName = $item->productName;
        $this->selectcategory = $item->Category->name;
        $this->selectcategoryId = $item->categoryId;
        $this->selectsku = $item->sku;
        $this->selectregularPrice = $item->regularPrice;
        $this->selectprice = $item->price;
        $this->selectimage = $item->image;
        $this->selectstock = $item->stock;
        $this->selectdescription = $item->description;
    }

    public function updateProduct(){
        if(!$this->selectnewImage==null){
            $file = $this->selectnewImage->store('photos');
            if (file_exists('storage/'.$this->selectimage)) {
                unlink('storage/'.$this->selectimage);
            }  
        }
        $product = EcomProduct::find($this->selectId);
        $product->productName = $this->selectproductName;
        $product->categoryId = $this->selectcategoryId;
        $product->sku = $this->selectsku;
        if(!$this->selectnewImage==null){
            $product->image = $file;
        }
        $product->regularPrice = $this->selectregularPrice;
        $product->price = $this->selectprice;
        $product->stock = $this->selectstock;
        $product->description = $this->selectdescription;
        $product->save();
        $this->mount();
        $this->selectSingleProduct($this->selectId);
    }

    public function deleteProduct(){
        unlink('storage/'.$this->selectimage);
        EcomProduct::find($this->selectId)->delete();
        $this->mount();
    }

    public function mount(){
        $this->products = EcomProduct::all();
        $this->categorys = EcomCategory::all();
    }

    public function render()
    {
        return view('livewire.product');
    }
}
