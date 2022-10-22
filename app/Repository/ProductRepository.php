<?php
namespace App\Repository;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;
use App\Repository\IProductRepository;

class ProductRepository implements IProductRepository
{   
    protected $Product = null;

    public function getAllProducts()
    {
        return Product::latest()->paginate();;
    }

    public function getProductById($id)
    {
        return Product::find($id);
    }

    public function create( $collection = [] )
    {   
        $product_imamge = $collection['image'];
        if($product_imamge){

            $prd_image = str_replace('public/', '', $product_imamge->store('public/product_images'));
         }
        
        $product = new Product;
        $product->prd_name = $collection['prd_name'];
        $product->amount = $collection['amount'];
        $product->dis_amount = $collection['dis_amount'];
        $product->description = $collection['description'];
        $product->image = $prd_image;
        $product->status = $collection['status'] == "Enabled" ? '1' :'0';
        
            return $product->save();

        
    }
    public function update($id , $collection = [])
    {
        $product =  Product::find($id);
        if(isset($collection['image'])){
            $product_image = $collection['image'];
            if ($product_image) {
                if (file_exists('storage/' . $product->image)) {
       
                   unlink('storage/' . $product->image);
                }
                
                $image = str_replace('public/', '', $product_image->store('public/product_image'));
                $product->image = $image;
             }
        }
            $product->prd_name = $collection['prd_name'];
            $product->amount = $collection['amount'];
            $product->dis_amount = $collection['dis_amount'];
            $product->description = $collection['description'];
            $product->status = $collection['status'] == "Enabled" ? '1' :'0';
        return $product->save();
    }

    public function deleteproduct($id)
    {
        $product = Product::find($id)->delete();

        return $product;
    }
}
