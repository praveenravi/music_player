<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Praveen - Audio Player</title>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Bootstrap -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]  -->
 <style>
       

        .playing {
          font-weight: bold;
          background-color: #000;
        }
    </style>

<script src="audiojs/audio.min.js"></script>
 <script>
      $(function() { 
        // Setup the player to autoplay the next track
        var a = audiojs.createAll({
          trackEnded: function() {
            var next = $('ol li.playing').next();
            if (!next.length) next = $('ol li').first();
            next.addClass('playing').siblings().removeClass('playing');
           
            sourceUrl = $('a', next).attr('data-src');
            $("#audioElement").attr("src", sourceUrl);
            audio.load($('a', next).attr('data-src'));
            audio.play();
          }
        });
        
        // Load in the first track
        var audio = a[0];
            first = $('ol a').attr('data-src');
        $('ol li').first().addClass('playing');

        $("#audioElement").attr("src", first);
        audio.load(first);
        audio.play();

        // Load in a track on click
        $('ol li').click(function(e) {
          e.preventDefault();
          $(this).addClass('playing').siblings().removeClass('playing');
          sourceUrl = $('a', this).attr('data-src');
            $("#audioElement").attr("src", sourceUrl);
          audio.load($('a', this).attr('data-src'));
          audio.play();
        });
        // Keyboard shortcuts
        $(document).keydown(function(e) {
          var unicode = e.charCode ? e.charCode : e.keyCode;
             // right arrow
          if (unicode == 39) {
            var next = $('li.playing').next();
            if (!next.length) next = $('ol li').first();
            next.click();
            // back arrow
          } else if (unicode == 37) {
            var prev = $('li.playing').prev();
            if (!prev.length) prev = $('ol li').last();
            prev.click();
            // spacebar
          } else if (unicode == 32) { 
            audio.playPause();
          }
        })
      });
    </script>


  </head>
  <body>


    <div class="container">

    
        
        <div class="row">
      <div class="col-sm-8"> <audio id="audioElement"  preload></audio> </div>
      <div class="col-sm-4">
        

       
        <em>→</em> Next track &nbsp; &nbsp;
        <em>←</em> Previous track  &nbsp; &nbsp;
    <em>Space</em> Play/pause 
      

      </div>
    </div>  
       
 
  <div class="row">

     <div class="col-sm-12">    
    
      <div id="visualization"></div>
    </div>
    <div class="col-sm-12">
      <ol class="list-inline">
      <?php
      if ($handle = opendir('mp3')) {

          while (false !== ($entry = readdir($handle))) {

              if (strpos($entry,'.mp3') !== false) {

                 // echo "$entry\n";
                 
echo '<li><a href="#" data-src="mp3/'.$entry.'">'.$entry.'</a></li>';
                  
              }
          }

          closedir($handle);
      }

      ?>
      
      </ol>
    </div>
</div>


   
     




    </div> <!-- /container -->


    <!-- Include all compiled plugins (below), or include individual files as needed -->
   <!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>


<script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
    
     
 <script src="js/app.js"></script>

  </body>
</html>
