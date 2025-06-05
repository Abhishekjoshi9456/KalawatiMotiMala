<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class EditProductImages extends Component
{
    public $productImage = [];

    public $productId;


    public function mount($productId)
    {
        $this->productId = $productId;

        $this->productImage = DB::table('product_image')
            ->where('ref_id', $this->productId)
            ->pluck('product_img')
            ->toArray();
    }

    public function removeImage($index)
    {
        // Get the image name to delete
        $imageName = $this->productImage[$index];

        // Remove from database
        DB::table('product_image')->where(['product_img'=> $imageName, 'ref_id' => $this->productId])->delete();

        // Optional: Remove file from storage
        // $imagePath = public_path('storage/ProductImages/' . $imageName);
        // if (file_exists($imagePath)) {
        //     @unlink($imagePath);
        // }

        // Remove from the array
        unset($this->productImage[$index]);
        $this->productImage = array_values($this->productImage); // reindex array
    }

    public function render()
    {

        return view('livewire.edit-product-images');
    }
}
