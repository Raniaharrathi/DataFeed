<?php

namespace App\Adapters;
use Doctrine\ORM\EntityManagerInterface;

interface DbAdapterInterface
{
    public function __construct(EntityManagerInterface $entityManager);
    public function save($data);
}
