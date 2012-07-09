<?php
class iTunesController {
  
  
  public function play() {
    exec("osascript -e 'tell application \"iTunes\" to play'");
  }
  
  public function pause() {
    exec("osascript -e 'tell application \"iTunes\" to pause'");
  }
  
  public function playpause() {
    exec("osascript -e 'tell application \"iTunes\" to playpause'");
  }
  
  public function next() {
    exec("osascript -e 'tell application \"iTunes\" to next track'");
  }
  
  public function prev() {
    exec("osascript -e 'tell application \"iTunes\" to previous track'");
  }
  
  public function quieter() {
    exec("osascript -e 'tell app \"iTunes\" to set sound volume to sound volume - 5'");
  }
  
  public function louder() {
    exec("osascript -e 'tell app \"iTunes\" to set sound volume to sound volume + 5'");
  }
  
  public function getAllPlayLists() {
    $tmpstrs  = exec("osascript -e 'tell app \"iTunes\" to get name of every playlist'");
    $tmpstrs = explode(",", $tmpstrs);
    $newstrs = array();
    foreach($tmpstrs  as $tmpstr){
      $newstrs[] = array("name" => $tmpstr);

    }
    return json_encode($newstrs);
  }
  
  public function changePlaylist($playlist_name){
    
  }
}

class PlayList {
  protected $songs = array();
  protected $tmpstr;
  public function __construct() {
    $tmpstr  = exec("osascript -e 'tell application \"iTunes\" to get name of every track of current playlist'");
    $this->songs = explode(",", $tmpstr);
  }
  
  public function getSongs(){
    $newarr = array();
    foreach( $this->songs as $song ) {
      $newarr[] = array( 'name' => $song );
    }
    return json_encode($newarr);
  }
  
}

class Song {
  protected $artist;
  protected $name;
  protected $album;
  protected $songInfo;
  protected $playlist;
  protected $time;
  
  function __construct() {
    $this->name = exec("osascript -e 'tell application \"iTunes\" to get name of the current track as string'");
    $this->artist = exec("osascript -e 'tell application \"iTunes\" to get artist of the current track as string'");
    $this->album = exec("osascript -e 'tell application \"iTunes\" to get album of the current track as string'");
    $this->time = exec("osascript -e 'tell application \"iTunes\" to get time of the current track as string'");
    $this->playlist = exec("osascript -e 'tell application \"iTunes\" to get the name of current playlist as string'");
  }
  
  public function getSongInfo(){
    $json =  array(
      'name' => $this->name,
      'artist' => $this->artist,
      'album' => $this->album,
      'time' => $this->time,
      'playlist' => $this->playlist,
    );
    return json_encode($json);
  }
  public function getSongName(){
    return $this->name;
  }
  
  public function getArtist(){
    return $this->artist;
  }
  
  public function getAlbum(){
    return $this->album;
  }
  
  public function getTime(){
    return $this->time;
  }
  
  public function getPlaylist(){
    return $this->playlist;
  }
  
  

}

?>