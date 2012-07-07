<?php
require 'iTunesController.php';

$song = new Song();
$playlist = new PlayList();
?>
<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
    <style>
        @import url('style.css');
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

<?php
$songs = $playlist->getSongs();

foreach ($songs as $tune) {
    $current = ($tune === $song->getSongName()) ? TRUE : FALSE;
    if (!empty($current)) {

        print "<li class='current'><a href=\"#\">" . $tune . "</a> <span>... playing</span></li>";
    } else {
        print "<li><a href=\"#\">" . $tune . "</a></li>";
    }
}
?>

            </ol>
        </div>
    </div>
</html>
