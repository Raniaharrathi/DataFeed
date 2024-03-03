<?php

namespace App\Service;

use App\Interface\ParserInterface;
use App\Adapters\DbAdapterInterface;
use Doctrine\ORM\EntityManagerInterface;



class XMLParser implements ParserInterface
{
    public function __construct(private readonly EntityManagerInterface $entityManager){
    }
    public function readFromFile(string $input, string $target): void
    {
      
        $databaseAdapter = $this->getTarget($target);
        
        if (file_exists($input)) {
            $feed = simplexml_load_file($input);
            
            foreach ($feed->children() as $record) {
                $databaseAdapter->save($record);
            }

            //flush only once outside of the loop for efficiency
            $this->entityManager->flush();
           
        } else {
            throw new \Exception('Failed to open xml file.');
        }
        
    }
    public function getTarget(string $target): DbAdapterInterface {
        return match($target){
            'sqlite' => new SqliteDb($this->entityManager),
            'mysql' => new MysqlDb($this->entityManager),
        };
    }

}
