<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\EcomCategory;

class Category extends Component
{
    public $name, $slug;
    public $categorys, $sl=1;
    public $editName, $selectId;

    protected $rules = [
        'name' => 'required|max:25',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function addCategory(){
        $this->validate();
        $this->slug = strtolower(str_replace(" ", "-",$this->name));
        $category = new EcomCategory;
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->save();

        $this->name = '';
        $this->mount();
    }

    public function updateCategory(){
        $category = EcomCategory::find($this->selectId);
        $category->name = $this->editName;
        $category->save();
        $this->mount();
    }

    public function deleteCategory(){
        EcomCategory::find($this->selectId)->delete();
        $this->mount();
    }

    public function selectCategory($id){
        $category = EcomCategory::find($id);
        $this->editName = $category->name;
        $this->selectId = $category->id;
    }

    public function mount(){
        $category = EcomCategory::all();
        $this->categorys = $category;

    }

    public function render()
    {
        return view('livewire.category');
    }
}
