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

    /**
     * Get all Blogs.
     *
     * @return mixed
     */
    public function getIndex()
    {
        return $this->testData;
    }

    /**
     * Get Blog by Id.
     *
     * @param int $id
     * @return array
     */
    public function get(int $id)
    {
        $sql = "SELECT * FROM posts WHERE id = ?";
        $post = $this->db->fetchAssoc($sql, [$id]);

        if (!$post) {
            throw new ResourceNotFoundException("Blog with ID: $id not found");
        }

        return $post;
    }
}
