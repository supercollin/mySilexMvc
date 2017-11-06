<?php

namespace App\Ordinateur\Repository;

use App\Ordinateur\Entity\Ordinateur;
use Doctrine\DBAL\Connection;

/**
 * User repository.
 */
class OrdinateurRepository
{
    /**
     * @var \Doctrine\DBAL\Connection
     */
    protected $db;

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

   /**
    * Returns a collection of users.
    *
    * @param int $limit
    *   The number of users to return.
    * @param int $offset
    *   The number of users to skip.
    * @param array $orderBy
    *   Optionally, the order by info, in the $column => $direction format.
    *
    * @return array A collection of users, keyed by user id.
    */
   public function getAll($userId)
   {
       $queryBuilder = $this->db->createQueryBuilder();
       $queryBuilder
           ->select('o.*')
           ->from('ordinateur', 'o')
          ->where('o.utilisateur = ?')
          ->setParameter(0,$userId);

       $statement = $queryBuilder->execute();
       $ordinateursData = $statement->fetchAll();
       foreach ($ordinateursData as $ordinateurData) {
           $ordinateurEntityList[$ordinateurData['id']] = new Ordinateur($ordinateurData['id'], $ordinateurData['utilisateur'], $ordinateurData['bureau']);
       }

       return $ordinateurEntityList;
   }

   /**
    * Returns an User object.
    *
    * @param $id
    *   The id of the user to return.
    *
    * @return array A collection of users, keyed by user id.
    */
   public function getById($id)
   {
       $queryBuilder = $this->db->createQueryBuilder();
       $queryBuilder
           ->select('o.*')
           ->from('ordinateur', 'o')
           ->where('id = ?')
           ->setParameter(0, $id);
       $statement = $queryBuilder->execute();
       $ordinateurData = $statement->fetchAll();

       return new Ordinateur($ordinateurData[0]['id'], $ordinateurData[0]['utilisateur'], $ordinateurData[0]['bureau']);
   }

    public function delete($id)
    {
        $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
          ->delete('ordinateur')
          ->where('id = :id')
          ->setParameter(':id', $id);

        $statement = $queryBuilder->execute();
    }

    public function update($parameters)
    {
        $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
          ->update('ordinateur')
          ->where('id = :id')
          ->setParameter(':id', $parameters['id']);

        if ($parameters['utilisateur']) {
            $queryBuilder
              ->set('utilisateur', ':utilisateur')
              ->setParameter(':utilisateur', $parameters['utilisateur']);
        }

        if ($parameters['bureau']) {
            $queryBuilder
            ->set('bureau', ':bureau')
            ->setParameter(':bureau', $parameters['bureau']);
        }

        $statement = $queryBuilder->execute();
    }

    public function insert($parameters)
    {
        $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
          ->insert('ordinateur')
          ->values(
              array(
                'utilisateur' => ':utilisateur',
                'bureau' => ':bureau',
              )
          )
          ->setParameter(':utilisateur', $parameters['utilisateur'])
          ->setParameter(':bureau', $parameters['bureau']);
        $statement = $queryBuilder->execute();
    }
}
