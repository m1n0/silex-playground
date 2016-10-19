<?php

namespace spec\m1n0\Repository;

use Doctrine\DBAL\Connection;
use m1n0\Entity\User;
use m1n0\Repository\UserRepository;
use PhpSpec\ObjectBehavior;

class UserRepositorySpec extends ObjectBehavior
{
    function let(Connection $db)
    {
        $this->beConstructedWith($db);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(UserRepository::class);
    }

    function it_returns_user_given_existing_id(Connection $db)
    {
        // Prepare data and mocks.
        $query = "Select * from users where id = ?";

        $result = ['id' => 1, 'name' => 'admin', 'mail' => 'admin@example.com'];
        $testResultUser = new User($result['id'], $result['name'], $result['mail']);
        $db->fetchAssoc($query, [1])->willReturn($result);

        // Act.
        $this->getUserById(1)->shouldBeLike($testResultUser);
    }
}
