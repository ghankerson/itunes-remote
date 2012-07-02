<?php
require 'iTunesController.php';
require 'Slim/Slim.php';
  
$app = new Slim(array(
  'log.enable' => true,
  'log.path' => './logs',
  'log.level' => 4,
));
  

$app->get('/', function(){
  $song = new Song();
  echo 'Hello';
});
$app->get('/getSong', function(){
  $song = new Song();
  $this_song = array(
    'name' => $song->getSongName(),
    'artist' => $song->getArtist(),
    'album' => $song->getAlbum(),
  );
  
  echo json_encode($this_song);
});

$song = new Song();
//$playlist = new PlayList();

$app->run();

?>
