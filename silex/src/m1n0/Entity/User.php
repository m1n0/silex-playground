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
    private $name;
    /**
     * @var string
     */
    private $mail;


    /**
     * User constructor.
     * @param int    $id
     * @param string $name
     * @param string $mail
     */
    public function __construct(int $id, string $name, string $mail)
    {
        $this->id = $id;
        $this->name = $name;
        $this->mail = $mail;
    }
}
