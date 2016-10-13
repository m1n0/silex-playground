<?php

namespace spec\m1n0;

use m1n0\BlogRepository;
use PhpSpec\ObjectBehavior;

class BlogRepositorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(BlogRepository::class);
    }

    function it_gets_correct_blog()
    {
        $this->get(0)->shouldReturn($this->testData[0]);
        $this->get(1)->shouldReturn($this->testData[1]);
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
