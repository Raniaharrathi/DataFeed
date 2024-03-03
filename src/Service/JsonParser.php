<?php

namespace App\Service;

use App\Interface\ParserInterface;
use Doctrine\ORM\EntityManagerInterface;

class JsonParser implements ParserInterface
{
    public function __construct(private readonly EntityManagerInterface $entityManager){
    }
    public function readFromFile(string $input,string $target):void
    {
        //TODO: Implement a function to parse Json files
    }
}
