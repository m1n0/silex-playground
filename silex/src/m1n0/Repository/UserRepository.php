<?php
/**
 * Created by PhpStorm.
 * User: m1n0
 * Date: 14/10/2016
 * Time: 16:17
 */

namespace m1n0\Repository;


use Doctrine\DBAL\Connection;
use m1n0\Entity\User;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

class UserRepository
{
    /**
     * @var \Doctrine\DBAL\Connection
     */
    private $db;

    /**
     * UserRepository constructor.
     * @param \Doctrine\DBAL\Connection $db
     */
    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    /**
     * Get User by user ID.
     *
     * @param int $id
     * @return User
     */
    public function getUserById(int $id)
    {
        $query = "Select * from users where id = ?";
        $result = $this->db->fetchAssoc($query, [$id]);

        if (!$result) {
            throw new ResourceNotFoundException("User with Id: $id not found.");
        }

        return new User($result['id'], $result['name'], $result['mail']);
    }

    /**
     * Get User by user name.
     *
     * @param string $name
     * @return \m1n0\Entity\User
     */
    public function getUserByName(string $name)
    {
        $query = "Select * from users where name = ?";
        $result = $this->db->fetchAssoc($query, [$name]);

        if (!$result) {
            throw new ResourceNotFoundException("User with name: $name not found.");
        }

        return new User($result['id'], $result['name'], $result['mail']);
    }

    /**
     * Get User by user mail.
     *
     * @param string $mail
     * @return \m1n0\Entity\User
     */
    public function getUserByMail(string $mail)
    {
        $query = "Select * from users where mail = ?";
        $result = $this->db->fetchAssoc($query, [$mail]);

        if (!$result) {
            throw new ResourceNotFoundException("User with mail: $mail not found.");
        }

        return new User($result['id'], $result['name'], $result['mail']);
    }
}
