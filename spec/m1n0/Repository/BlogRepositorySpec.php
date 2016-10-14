<?php

namespace spec\m1n0\Repository;

use Doctrine\DBAL\Connection;
use m1n0\Repository\BlogRepository;
use PhpSpec\ObjectBehavior;

class BlogRepositorySpec extends ObjectBehavior
{
    function let(Connection $db) {
        $this->beConstructedWith($db);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(BlogRepository::class);
    }

    function it_returns_blog_given_blog_id(Connection $db)
    {
        // Prepare data and mocks.
        $sql = "SELECT * FROM posts WHERE id = ?";

        $testResult = new \stdClass();
        $testResult->title = 'Using Silex';
        $testResult->body = 'Lorem Ipsum';
        $db->fetchAssoc($sql, [0])->willReturn($testResult);

        $testResult->title = 'Learning Silex';
        $testResult->body = 'Dolor sit amet';
        $db->fetchAssoc($sql, [1])->willReturn($testResult);

        // Act.
        $this->get(0)->shouldReturn($testResult);
        $this->get(1)->shouldReturn($testResult);
    }

    function it_throws_not_found()
    {
        $this->shouldThrow('\Symfony\Component\Routing\Exception\ResourceNotFoundException')->during('get', [100]);
    }

    function it_throws_invalid_argument()
    {
        $this->shouldThrow('\TypeError')->during('get', ['something']);
    }

}
