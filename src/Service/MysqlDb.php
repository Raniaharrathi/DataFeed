<?php

namespace App\Service;

use App\Adapters\DbAdapterInterface;
use Doctrine\ORM\EntityManagerInterface;


class MysqlDb implements DbAdapterInterface
{
    public function __construct(EntityManagerInterface $entityManager){}
    public function save($data): void
    {
        //TODO : Implement save function for Mysql
    }
}
