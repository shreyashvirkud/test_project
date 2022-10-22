<?php
namespace App\Repository;

interface IProductRepository 
{
    public function getAllProducts();

    public function getProductById($id);

    public function create($collection = []);

    public function update( $id, $collection = [] );

    public function deleteProduct($id);
}
