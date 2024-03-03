<?php

namespace App\Interface;
use Doctrine\ORM\EntityManagerInterface;

interface ParserInterface
{
    public function __construct(EntityManagerInterface $entityManager);
    public function readFromFile(string $input, string $target);
}
