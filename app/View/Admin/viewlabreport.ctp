<H1>Lab Report Details </h1>
<a class="btn btn-primary" href="labreport?id=<?php echo $_GET['id'];?>&q=<?php echo $_GET['q']; ?>"> Add New </a>
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
<table class="table">
    <tr>
        <th>ID</th>
        <th>Bales Id</th>
        <th>Mic</th>
        <th>Length</th>
        <th>Strength</th>
        <th>C.G.</th>
        <th>Test Report No.</th>
        <th>Test Report Date</th>
        <th>Download</th>
        <th>Note</th>
        <th></th>
        <th></th>
    </tr>

    <?php foreach($data as $dtrow){ ?>
        <tr>
            <td><?php echo $dtrow['l']['id']; ?></td>
            <td><?php echo $dtrow['l']['bales_id']; ?></td>
            <td><?php echo $dtrow['l']['mic']; ?></td>
            <td><?php echo $dtrow['l']['length']; ?></td>    
            <td><?php echo $dtrow['l']['strength']; ?></td>
            <td><?php echo $dtrow['l']['cg']; ?></td>
            <td><?php echo $dtrow['l']['testreport_no']; ?></td>
            <td><?php echo $dtrow['l']['testreport_date']; ?></td>
            <td><?php if(isset($dtrow['l']['downlink'])) { ?> <a href="<?php echo $dtrow['l']['downlink']; ?>" target="_blank" >Dowload </a> <?php }?></td>
            
            <td><?php echo $dtrow['l']['note']; ?></td>
                       
            <td><a href="labreport?id=<?php echo $_GET['id'];?>&q=<?php echo $_GET['q']; ?>&r=<?php echo $dtrow['l']['id']; ?>" > Edit </a></td>
            <td>
                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                    Labreport: <input type="file" name="photo" size="25" />
                    <input type="submit" name="submit" value="Submit" />
                    <input type="hidden" name="labrid" value="<?php echo $dtrow['l']['id']; ?>" />
                    
                </form>
            </td>
        </tr>    
   <?php } ?>
</table>


