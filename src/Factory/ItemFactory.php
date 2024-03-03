<?php

namespace App\Factory;

use App\Entity\Item;


class ItemFactory
{
    /**
     * creates a new Item from the $data 
     * @return Item
     */ 
   public function createItem($data): Item
    {
        $item = new Item(); 
        $item->setId((int)$data->entity_id);
        $item->setCategoryName((string)$data->CategoryName);
        $item->setSku($data->sku);
        $item->setName($data->name);
        $item->setDescription($data->description);
        $item->setShortdesc($data->shortdesc);
        $item->setPrice($data->price);
        $item->setLink($data->link);
        $item->setImage($data->image);
        $item->setBrand($data->Brand);
        $item->setRating((int)$data->Rating);
        $item->setCaffeineType($data->CaffeineType);
        $item->setCount((int)$data->Count);
        if(isset($data->Flavored)) {
            $flavored = match(strval($data->Flavored)){
                'Yes' => true,
                'No' => false,
                default => null
            };
            $item->setFlavored($flavored);
        }
        
        if(isset($data->Seasonal)) {
            $seasonal = match(strval($data->Seasonal)){
                'Yes' => true,
                'No' => false,
                default => null
            };
            $item->setSeasonal($seasonal);
        }
        $InStock = match(strval($data->Instock)){
            'Yes' => true,
            'No' => false,
            default => null
        };
        $item->setInStock($InStock);
        $item->setFacebook((int)$data->Facebook);
        $item->setIsKCup((int)$data->IsKCup);

        return $item;
    }
}
