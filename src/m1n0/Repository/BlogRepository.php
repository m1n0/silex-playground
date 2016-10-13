<?php

namespace m1n0\Repository;

use Doctrine\DBAL\Connection;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

/**
 * Blog repository.
 */
class BlogRepository
{
    /**
     * @var \Doctrine\DBAL\Connection
     */
    private $db;

    /**
     * BlogRepository constructor.
     * @param \Doctrine\DBAL\Connection $db
     */
    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    function getIndex()
  {
      return $this->testData;
  }

  function get(int $index)
  {
      if (!isset($this->testData[$index])) {
          throw new ResourceNotFoundException("Blog with ID: $index not found");
      }

      return $this->testData[$index];
  }

}
