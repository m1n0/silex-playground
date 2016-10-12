<?php

require_once __DIR__.'/../vendor/autoload.php';

use m1n0\BlogRepository;

$app = new Silex\Application();
$blogRepository = new BlogRepository();

$app->get('/hello/{name}', function ($name) use ($app) {
  return 'Hello '.$app->escape($name);
});

// Blog listing.
$app->get('/blog', function () use ($blogRepository) {
    $output = '';
    foreach ($blogRepository->getIndex() as $post) {
        $output .= $post['title'];
        $output .= '<br />';
    }

    return $output;
});

// Blog detail.
$app->get('/blog/{id}', function (Silex\Application $app, $id) use ($blogRepository) {
    try {
        $post = $blogRepository->get($id);
    }
    catch (\Symfony\Component\Routing\Exception\ResourceNotFoundException $e) {
        $app->abort(404, "Post $id does not exist.");
    }

    return  "<h1>{$post['title']}</h1>".
            "<p>{$post['body']}</p>";
});

return $app;
