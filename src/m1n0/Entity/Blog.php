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
     * @var \m1n0\Entity\User
     */
    private $author;
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
     * @param \m1n0\Entity\User $author
     * @param string $title
     * @param string $body
     */
    public function __construct(int $id, string $created, User $author, string $title, string $body)
    {
        $this->id = $id;
        $this->created = $created;
        $this->author = $author;
        $this->title = $title;
        $this->body = $body;
    }
}
