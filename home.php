<!DOCTYPE html>
<html lang="en">
<title>Learning</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<style>
body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
.w3-quarter img{margin-bottom: -6px; cursor: pointer}
.w3-quarter img:hover{opacity: 0.6; transition: 0.3s}
</style>

<body class="w3-light-grey">

<?php
include 'header.php';

//including the database connection file

$databaseHost = 'localhost';
$databaseName = 'ironxpxj_edu';
$databaseUsername = 'ironxpxj_admin';
$databasePassword = '!@#123qweasdzxc';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
	
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
      
}

$id=$_GET['id'];
  
//fetching data in descending order (lastest entry first)
$result2 = mysqli_query($mysqli, "SELECT article_id,article_name,article_content,img,DATE_FORMAT(date,'%d %b, %Y') as dates from post");


?>

<nav class="w3-sidebar w3-bar-block w3-white w3-animate-right w3-top w3-text-black w3-large" style="z-index:3;width:250px;font-weight:bold;display:none;right:0;" id="mySidebar">
    
   <button   class="w3-bar-item w3-button w3-center w3-padding-16" style="width:auto;"><a href="login.php">Login</a></button>
    
    <a href="javascript:void()" onclick="w3_close()" class="w3-bar-item w3-button w3-padding-32">CLOSE</a> 
     <div class="table-responsive text-nowrap">
           
           
               
                        <table class="table table-striped">
                        <tbody>
                            
                           <?php
		                  while($res2 = mysqli_fetch_array($result2)) {
		                      
		                  echo "<tr>";
                               ?>
		                  
		                  <td><a href="http://blog.irontin.com/index3.php?id=<?php echo $res2['article_id'];?>" onclick="w3_close()" class="w3-bar-item w3-button w3-center w3-padding-16"><?php echo $res2['article_name'];?></a></td>
		                 <?php
		                 
		                   echo "</tr>";
		                 
		                  }
                          ?>
                        </tbody>
                       
                    </table>   
                   
                    
                 
            
		   </div>
</nav>
<?php
include 'header.php';

//including the database connection file

$databaseHost = 'localhost';
$databaseName = 'ironxpxj_edu';
$databaseUsername = 'ironxpxj_admin';
$databasePassword = '!@#123qweasdzxc';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
	
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
      
}

$id=$_GET['id'];
  
//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT article_name,article_content,img,DATE_FORMAT(date,'%d %b, %Y') as dates from post WHERE article_id='$id'");

while($res = mysqli_fetch_array($result)) {
$title=$res['article_name'];
?>
<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-white w3-xlarge w3-padding-16">
  <span class="w3-left w3-padding"><?php echo $title; ?></span>
  <a href="javascript:void(0)" class="w3-right w3-button w3-white" onclick="w3_open()">☰</a>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/materialize/0.95.1/css/materialize.min.css">
<!-- !PAGE CONTENT! -->
<div class="w3-main w3-content" style="max-width:1600px;margin-top:83px">
  
  
    
<center>
     
          
           
                             
               
                        <table class="table table-striped">
                                

                         <thead>
                            
                                    <tr>

                                  
                                   
                                  
                                  
                                   <th>Content</th>
                                   <th>Read</th>
                                  <th>Image</th>
                                  <th>Video</th>
                                   
                                   
                                  
                                 
                                 </tr>
                            
                              </thead>
                        
                        
                        
                        <tbody>
                            
                           <?php
		                  
		                      
		                  echo "<tr>";
                               
		              
		                  ?>
		                  <td>
                             
                          
                            
                            <a href="https://www.google.com/search?tbm=isch&q=<?php echo $res['article_name'];?>" 
                              target="popup" 
                               onclick="window.open('https://www.google.com/search?tbm=isch&q=<?php echo $res['article_name'];?> Diagram','popup','width=800,height=600'); return false;">
                                 See The Image
                            </a>
                            
                            </td>
		                  <?php
		                 
		                  echo "<td>".$res['article_content']."</td>";
		                  
		                  ?>
		                  
		                  <td>
		                      <div class="container">

                           <form class="col s8 offset-s2">
    <div class="row">
      <label>Choose voice</label>
      <select id="voices"></select>
    </div>
    <div class="row">
      <div class="col s6">
        <label>Rate</label>
        <p class="range-field">
          <input type="range" id="rate" min="1" max="100" value="10" />
        </p>
      </div>
      <div class="col s6">
        <label>Pitch</label>
        <p class="range-field">
          <input type="range" id="pitch" min="0" max="2" value="1" />
        </p>
      </div>
      <div class="col s12">
        <p>N.B. Rate and Pitch only work with native voice.</p>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s12">
        <textarea id="message" class="materialize-textarea" value="Hi">
            <?php echo $res['article_content'];?>
        </textarea>
        <label>Write message</label>
      </div>
    </div>
    <a href="#" id="speak" class="waves-effect waves-light btn">Read The Lesson</a>
  </form>  
                             </div>

                              <div id="modal1" class="modal">
  <h4>Speech Synthesis not supported</h4>
  <p>Your browser does not support speech synthesis.</p>
  <p>We recommend you use Google Chrome.</p>
  <div class="action-bar">
    <a href="#" class="waves-effect waves-green btn-flat modal-action modal-close">Close</a>
  </div>
</div>
		                  </td>
		                  
		                  <div class="col-md-3 pull-right">
                           
                            
                            
                          
                            <td>  
                            <a href="https://www.google.com/search?tbm=vid&tbs=dur:1,hq:h,cc:1,qdr:y&q=<?php echo $res['article_name'];?>" 
                              target="popup" 
                               onclick="window.open('https://www.google.com/search?tbm=vid&tbs=dur:1,hq:h,cc:1,qdr:y&q=<?php echo $res['article_name'];?>','popup','width=800,height=600'); return false;">
                                 Watch The Video
                            </a>
                            </td>
                           
                          </div>
		                 
		                  
		                  <?php
		                  
		                 
		                 
		                 echo "</tr>";
		                 
		                  }
                          ?>
                        </tbody>
                       
                       </table>   
                   
		   </div>
		   
</center>
   
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/materialize/0.95.1/js/materialize.min.js"></script>

<script>
    
    $(function(){
  if ('speechSynthesis' in window) {
    speechSynthesis.onvoiceschanged = function() {
      var $voicelist = $('#voices');

      if($voicelist.find('option').length == 0) {
        speechSynthesis.getVoices().forEach(function(voice, index) {
          var $option = $('<option>')
          .val(index)
          .html(voice.name + (voice.default ? ' (default)' :''));

          $voicelist.append($option);
        });

        $voicelist.material_select();
      }
    }

    $('#speak').click(function(){
      var text = $('#message').val();
      var msg = new SpeechSynthesisUtterance();
      var voices = window.speechSynthesis.getVoices();
      msg.voice = voices[$('#voices').val()];
      msg.rate = $('#rate').val() / 10;
      msg.pitch = $('#pitch').val();
      msg.text = text;

      msg.onend = function(e) {
        console.log('Finished in ' + event.elapsedTime + ' seconds.');
      };

      speechSynthesis.speak(msg);
    })
  } else {
    $('#modal1').openModal();
  }
});
</script>
 
 

 

<!-- End page content -->
</div>

<script>
// Script to open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}

// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}

</script>


</body>
</html>
