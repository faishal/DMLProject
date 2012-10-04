<div id = "alert_placeholder"></div>
<script>

    bootstrap_alert = function() {}
    bootstrap_alert.warning = function(message) {
        $('#alert_placeholder').html('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><span>'+message+'</span></div>')
    }
<?php
if (isset($insertFlag)) {

    echo "bootstrap_alert.warning('$insertFlag')";
}
?>
    $(document).ready(function(){
$(".ch").click(function(){
    convertdata();
    window.location= "dailyreport?q=" + $("#dt").val();
})
})
</script>​

<table class="table">
    <tr>
        <td>Report Date:</td>
        <td><input type="text" class="dt" id="dt" /></td>
        <td> <input type="button" class="btn btn-primary ch" value="change"/></td>
        
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <th>Todays bales</th>
        <td></td>
        <th>Bales till date</th>
        <th>Average price till date</th>
    </tr>
    <tr>
        <td></td>
        <td><?php echo $tbales[0][0]["bales"]; ?></td>
        <td></td>
        <td><?php echo $sbales[0][0]["bales"]; ?></td>
        <td><?php echo $aamnt[0][0]["bales"]; ?></td>
        
    </tr>
    <tr>
        <th colspan="5">Bales Status</th>
    </tr>
    <?php foreach($balestatus as $dtRow){ ?>
    
    <tr>
        <td><?php echo $dtRow["s"]["title"]; ?> </td>
        <td><?php echo $dtRow[0]["count"]; ?> </td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <?php } ?>
    
       
</table>
<table class="table">
    <tr>
        <th>Warehouse Stock</th>
        <th>Opening Bales</th>
        <th>Bales Added</th>
        <th>Arrival Party Name</th>
        <th>Bales Removed</th>
        <th>Stuffing Invoice</th>
        <th>Closing Bales</th>
    </tr>
    <?php $gTotal= 0; foreach($stockData as $dtRow) {
        
        ?>
     <tr>
        <td><?php echo $dtRow["v"]["city"]; ?></td>
        <td><?php echo $dtRow[0]["oc"] - $dtRow[0]["od"] ; ?></td>
        <td><?php echo $dtRow[0]["tc"] ; ?></td>
        <td></td>
        <td><?php echo $dtRow[0]["td"]; ?></td>
        <td></td>
        <td><?php echo ($dtRow[0]["oc"] - $dtRow[0]["od"]) + ($dtRow[0]["tc"] - $dtRow[0]["td"]) ; ?></td>
    </tr>
    <?php
    } ?>
   
    
</table>