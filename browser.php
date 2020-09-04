<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style>
@import="style.css";
</style>
</head>

<body>
<?php
if($_POST){

$url=$_POST['url'];



}
?>
<script language="javascript">

function w(){  window.open('$url');  }

</script>


<div class="box">
    <form method="post" action="index.php">
        Address: <input type="text" name="url" id="url" class="input_text" />
        <input type="submit" value="submit" class="button">
    </form>
</div>

<div class="url">



</div>
</body>
</html>