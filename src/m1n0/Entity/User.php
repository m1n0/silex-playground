<?php
/**
 * Created by PhpStorm.
 * User: m1n0
 * Date: 13/10/2016
 * Time: 15:10
 */

namespace m1n0\Entity;


class User
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $username;
    /**
     * @var string
     */
    private $email;


    /**
     * User constructor.
     * @param int $id
     * @param string $username
     * @param string $email
     */
    public function __construct(int $id, string $username, string $email)
    {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
    }
}
