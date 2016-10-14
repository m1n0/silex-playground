<?php
/**
 * Created by PhpStorm.
 * User: m1n0
 * Date: 13/10/2016
 * Time: 15:08
 */

namespace m1n0\Entity;


class Blog
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $created;
    /**
     * @var int
     */
    private $user;
    /**
     * @var string
     */
    private $title;
    /**
     * @var string
     */
    private $body;

    /**
     * Blog constructor.
     * @param int $id
     * @param string $created
     * @param int $user
     * @param string $title
     * @param string $body
     */
    public function __construct(int $id, string $created, int $user, string $title, string $body)
    {
        $this->id = $id;
        $this->created = $created;
        $this->user = $user;
        $this->title = $title;
        $this->body = $body;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getCreated(): string
    {
        return $this->created;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user;
    }

    public function getUser(): User
    {
        // Todo: Implement getter after User is prepared.
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }


}
