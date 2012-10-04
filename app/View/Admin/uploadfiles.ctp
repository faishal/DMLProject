    <H1>Bales Files </h1>
    <a class="btn btn-primary" href="balesdata?id=<?php echo $_GET["id"]?>&q=<?php echo $_GET["q"]?>"> Back To Bales </a>
    
    <div id = "alert_placeholder"></div>
    <script>

    bootstrap_alert = function() {}
    bootstrap_alert.warning = function(message) {
                $('#alert_placeholder').html('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><span>'+message+'</span></div>')
            }
    <?php 
    if(isset($insertFlag)){

                echo "bootstrap_alert.warning('$insertFlag')";
    } ?>


    </script>​
<?php if(isset($cdata) && $cdata) {?>
    
    <table class="table">
        <tr>
            <th>
                Sr.No
            </th>
            <th>
                Note
            </th>
            <th>
                Download
            </th>
            
        </tr>
        <?php $sr=0; foreach($cdata as $dtRow){?>
        <tr>
            <td>
        <?php echo $sr++; ?>
            </td>
            <td>
                <?php echo $dtRow["Uploadfile"]["note"]; ?>
            </td>
            <td>
                <a href="<?php echo $dtRow['Uploadfile']['downlink']; ?>" target="_blank" >Dowload</a> 
            </td>
            
        </tr>    
        <?php }?>
    </table>
<?php } ?>
    
    
    <form action="uploadfiles?id=<?php echo $_GET["id"]?>&q=<?php echo $_GET["q"]?>" method="post" enctype="multipart/form-data">
        
                    File : <input type="file" name="photo" size="25" />
                                  
                    
                    Note : <input type="text" name="data[Uploadfile][note]"  />
                    <input type="submit" name="submit" value="Submit" class="btn btn-primary"/>
     </form>



