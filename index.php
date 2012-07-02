<?php
require 'Slim/Slim.php';  
require 'iTunesController.php'; 

  
$app = new Slim(array(
  'log.enable' => true,
  'log.path' => './logs',
  'log.level' => 4,
));
  

$app->get('/', function(){
  echo 'hello';
});

$app->get('/song', function(){
  $song = new Song();
  echo $song->getSongInfo();
});

$app->get('/playpause', function(){
  $controller = new iTunesController();
  $controller->playpause();
});


$app->run();

?>