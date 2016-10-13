<?php

require_once __DIR__.'/../vendor/autoload.php';

use m1n0\BlogRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app = new Silex\Application();
$blogRepository = new BlogRepository();

$app->get('/hello/{name}', function ($name) use ($app) {
  return 'Hello ' . $app->escape($name);
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
        $post = $blogRepository->get($app->escape($id));
    }
    catch (\Symfony\Component\Routing\Exception\ResourceNotFoundException $e) {
        $app->abort(404, "Blog $id does not exist.");
    }
    catch (TypeError $e) {
        $app->abort(500, 'Blog ID must be an integer.');
    }

    return  "<h1>{$post['title']}</h1>".
            "<p>{$post['body']}</p>";
});

// Trying POST and printing the data.
$app->post('/feedback', function(Request $request) {
    return new Response('Your message: ' . $request->get('message'));
});

return $app;
