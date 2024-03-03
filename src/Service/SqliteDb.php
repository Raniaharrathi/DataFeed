<?php

namespace App\Service;

use App\Adapters\DbAdapterInterface;
use App\Entity\Item;
use Doctrine\ORM\EntityManagerInterface;
use App\Factory\ItemFactory;


class SqliteDb implements DbAdapterInterface
{
    public function __construct(private readonly EntityManagerInterface $entityManager){
    }

    /**
     * creates an Item and saves it in the Sqlite database
     */
    public function save($data)
    {
        $itemFactory = new ItemFactory();
        $item = $itemFactory->createItem($data);
        $this->entityManager->persist($item);             	      

    }
}
