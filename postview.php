<form method="POST" action="">
    Search:
    <input type="text" name="query">
    
    <input type="submit" value="Search" name="sb">
    
</form>
<?php
if(isset($_POST['sb'])){
    
    $Q=$_POST['query'];
    ?>
    

                  
             <a href="https://www.google.com/search?tbm=isch&q=<?php echo $Q;?>" 
                              target="popup" 
                               onclick="window.open('https://www.google.com/search?tbm=isch&q=<?php echo $Q;?>','popup','width=500,height=700'); return false;">
                                 Click to See Results
                            </a>              
                            
                            
  <?php 
}

?>
