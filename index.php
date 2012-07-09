<?php
require 'Slim/Slim.php';  
require 'iTunesController.php'; 

  
$app = new Slim(array(
  'log.enable' => true,
  'log.path' => './logs',
  'log.level' => 4,
));
  

$app->get('/', function(){
  echo 'Click <a href="home.php"> here to get started</a>';
});

$app->get('/song', function(){
  $song = new Song();
  echo $song->getSongInfo();
});

$app->get('/playpause', function(){
  $controller = new iTunesController();
  $controller->playpause();
});


$app->get('/next', function(){
  $controller = new iTunesController();
  $controller->next();
});

$app->get('/prev', function(){
  $controller = new iTunesController();
  $controller->prev();
});

$app->get('/getallplaylists', function(){
  $controller = new iTunesController();
  echo $controller->getAllPlayLists();
});

$app->get('/getcurrentplaylist', function(){
  $playlist = new PlayList();
  echo $playlist->getSongs();
});


$app->run();

?>