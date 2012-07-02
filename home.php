<?php
  
require 'iTunesController.php';

$song = new Song();
$playlist = new PlayList();



?>
<!DOCTYPE html>
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
  <style>
    
    body {
      background: #eee;
      font-size: 0.9em;
    }
    #list-template {
    	display: none;
    }
    #container {
      margin: 0 auto;
      width: 700px;
      font-family: sans-serif;
      line-height: 1.5em;
      color: #666;
      letter-spacing: 1px;
      

    }
    
    #controller {
    	float: left;
    	width: 200px;
    	padding-top: 2.5em;
    }
    #controller  ul{
    	list-style-type: none;
    	padding: 0;
    }
    #controller  ul li {
    	float: left;
    	width: 64px;
    }
    
    #display {
      width: 468px;
      float:left;
      margin-top: 2em;
      background-image: linear-gradient(bottom, rgb(255,255,170) 43%, rgb(253,255,204) 58%);
      background-image: -o-linear-gradient(bottom, rgb(255,255,170) 43%, rgb(253,255,204) 58%);
      background-image: -moz-linear-gradient(bottom, rgb(255,255,170) 43%, rgb(253,255,204) 58%);
      background-image: -webkit-linear-gradient(bottom, rgb(255,255,170) 43%, rgb(253,255,204) 58%);
      background-image: -ms-linear-gradient(bottom, rgb(255,255,170) 43%, rgb(253,255,204) 58%);

      background-image: -webkit-gradient(
      	linear,
      	left bottom,
      	left top,
      	color-stop(0.28, rgb(255,255,170)),
      	color-stop(0.53, rgb(253,255,204))
      );
      padding: 1em 1em 2em 1em;
      height: 80px;
      border: 1px solid #999;
      border-radius: 10px;
      -moz-box-shadow: 0 0 5px #888;
      -webkit-box-shadow: 0 0 5px#888;
      box-shadow: inset 0 0 5px #888;
    }
    
    #display ul {
      list-style: none;
    }
    
     #playlist {
     	clear: both;
     }
    #playlist h2 {
      margin-left: 1em;
    }
    
    #playlist ol {
      list-style-position: inside;
      margin-left: 0;
      padding-left: 0;
    }
    
    #playlist ol li {
      background: #fff;
      margin-bottom: 2px;
      padding: 0.4em;
      padding-left: 1em;
    }
    
    #playlist ol li.current {
      background: #ddd;
    }
    #playlist ol li.current span {
      display: block;
      float: right;
      padding-right: 1em;
    }
    #playlist ol li.current a:link {
      color: #000;
    }
    
    #playlist ol li a:link {
      text-decoration: none;
      color: #999;
      font-size: 0.9em;
    }
    #playlist ol li a:hover {
      text-decoration: none;
      color: #000;
    }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.3.3/underscore-min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/backbone.js/0.9.2/backbone-min.js"></script>
  <script src="js/models.js"></script>
  <script src="js/views.js"></script>
  <script src="js/app.js"></script>
</head>
<html>


<div id="container">
<div id="list-template">
	<li></li>
</div>
        
  <div id="controller">
  	<ul>
  		<li><a href="#" id="prev"><img src="images/Itunes-Button--Rewind-256.png" alt="previous" width="64" height="64"/></a></li>
  		<li><a href="#" id="toggle"><img src="images/Itunes-Button--Play-256.png" alt="toggle play" width="64" height="64"/></a></li>
  		<li><a href="#" id="next"><img src="images/Itunes-Button-Forward-256.png" alt="next" width="64" height="64"/></a></li>
  	</ul>
  </div>      
  <div id="display"><ul></ul></div>
  
  <div id="playlist">
    <h2>Playlist: <?php print $song->getPlaylist() ?></h2>
    <ol>
      
    <?php  $songs  = $playlist->getSongs();
      
      foreach($songs as $tune){
        $current = ($tune === $song->getSongName()) ? TRUE : FALSE; 
        if(!empty($current)){
          
          print "<li class='current'><a href=\"#\">" . $tune . "</a> <span>... playing</span></li>";
        }
        else {
          print "<li><a href=\"#\">" . $tune . "</a></li>";
        }
      }
    ?>
    
    </ol>
  </div>
</div>
</html>
