<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Repository\IProductRepository;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    public $product;

    public function __construct(IProductRepository $product)
    {
        $this->product = $product;
       
    }

    public function showproducts(Request $request)
    {
            $products = $this->product->getAllProducts();
            return View::make('product.index',compact('products'));
        
    }

    public function createProduct()
    {
        
        return View::make('product.create');
    }

    public function saveProduct(StoreProductRequest $request){
        $collection = $request->except(['_token', '_method']);


        $this->product->create($collection);


        return redirect()->route('admin.product_list');
    }

    public function getProduct($id)
    {
        
        $product = $this->product->getProductById($id);
        return View::make('product.edit', compact('product'));
    }

    public function updateProduct(UpdateProductRequest $request, $id)
    {
        $collection = $request->except(['_token', '_method']);
            

        $this->product->update($id, $collection);


        return redirect()->route('admin.product_list');
    }

    public function delete($id){
        $this->product->deleteProduct($id);

        return redirect()->back();
    }

}
