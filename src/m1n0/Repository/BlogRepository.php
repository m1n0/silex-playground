<?php

namespace m1n0\Repository;

use Symfony\Component\Routing\Exception\ResourceNotFoundException;

/**
 * Blog repository.
 */
class BlogRepository
{
  public $testData = [
    [
      'date'      => '2011-03-29',
      'author'    => 'igorw',
      'title'     => 'Using Silex',
      'body'      => '...',
    ],
    [
      'date'      => '2016-10-12',
      'author'    => 'm1n0',
      'title'     => 'Learning Silex',
      'body'      => 'Lorem Ipsum...',
    ],
  ];

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
