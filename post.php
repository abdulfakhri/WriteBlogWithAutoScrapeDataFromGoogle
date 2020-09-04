<?php
include 'nav.php';
include 'connection.php';

if(isset($_POST["post"])){
    
        $subject  =mysqli_real_escape_string($conn,$_POST['subject']);
        $title   =mysqli_real_escape_string($conn,$_POST['a_name']);
        $content =mysqli_real_escape_string($conn,$_POST['article_content']);
        $img  =$_POST['diagram'];
        

        $sql ="INSERT INTO post(subject,article_name,article_content,img) VALUES('$subject','$title','$content','$img')";
       
        if (mysqli_query($conn, $sql)) {
       // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
         echo "Note Is Recorded!";
        header('Refresh: 0.001; url=/index.php');
		
	
     } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    echo "Message Is Not Sent For Some Technical Problems, Try Later";
     }

        
}
?>
<style>
* {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column1 {
  float: left;
  text-align:left;
  width: 70%;
  padding: 10px;
  height: 80%; /* Should be removed. Only for demonstration */
}
.column2 {
  float: left;
  width: 30%;
  padding: 10px;
  height: 80%; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
  }
}
</style>
<!--<script type="text/javascript" src="tinymce/tinymce.min.js"></script>-->
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">
        // tinymce.init({
        //     selector: "#article_content"
        // });

bkLib.onDomLoaded(function() {
  new nicEditor().panelInstance('article_content');

});
    </script>

<div class="row">
  <div class="column1" style="background-color:#fff;">
    <form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">


<!-- Form Name -->


<!-- Text input-->
<div class="form-group col-md-10">
  <label class="" for="a_name">Subject</label>

  <input id="subject" name="subject" type="text" placeholder="Subject" class="form-control input-md"  value="<?php if (isset($_POST['subject'])) {echo $_POST['subject'];}
?>" required>

 <input id="diagram" name="diagram" type="text" placeholder="Image" class="form-control input-md"  value="">
    <p class="text-danger"><?php echo $errors['article_name'] ?></p>

</div>
<div class="form-group col-md-10">
  <label class="" for="a_name">Note Title

  <input id="a_name" name="a_name" type="text" placeholder="Enter Title For Your Article" class="form-control input-md"  value="<?php if (isset($_POST['a_name'])) {echo $_POST['a_name'];}
?>" required>
    <p class="text-danger"><?php echo $errors['article_name'] ?></p>

</div>


<div class="form-group col-md-10" >
  <label class="" for="article_content">Note</label>

    <textarea contenteditable="" spellcheck="true" class="form-control" id="article_content" name="article_content" rows="20"><?php if (isset($_POST['article_content'])) {echo $_POST['article_content'];}?></textarea>
    <p class="text-danger"><?php echo $errors['article_content'] ?></p>

</div>

<!-- Button -->
<div class="form-group col-md-10">
  <label class="control-label" for="submit"></label>

    <button id="submit" name="post" type="submit" class="btn btn-success">Noted</button>
    <p class="text-danger"><?php echo $errors['form'] ?></p>

</div>


</form>
  </div>
  <div class="column2" style="background-color:#fff;">
   <iframe src="sg.php" width="100%" height="700px" style="border:1px solid black;">
</iframe>
  </div>
</div>




<?php include 'footer.php';?>