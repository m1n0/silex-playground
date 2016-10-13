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
      'created'   => '1476364162',
      'author'    => 'igorw',
      'title'     => 'Using Silex',
      'body'      => '...',
    ],
    [
      'created'   => '1476104961',
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
