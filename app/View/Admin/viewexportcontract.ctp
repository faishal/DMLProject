<H1>Export Contract Details </h1>
<a class="btn btn-primary" href="exportcontract"> Add New </a>
<div id = "alert_placeholder"></div>
<script>

    bootstrap_alert = function() {}
    bootstrap_alert.warning = function(message) {
        $('#alert_placeholder').html('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><span>'+message+'</span></div>')
    }
<?php
if ($insertFlag) {

    echo "bootstrap_alert.warning('$insertFlag')";
}
?>
$(document).ready(function()
	{
             new Tablesort(document.getElementById('myTable'));
		
	}
);
	
</script>​

<table class="table" id="myTable">
    <tr>
        <th>ID</th>
        <th>Buyer Party</th>
        <th>Broker</th>
        <th>Rate per candy</th>
        <th>Transporter</th>
        <th></th>
    </tr>
    <?php
    foreach ($data as $dtRow) {
        ?>
        <tr>

            <td>
            <?php echo $dtRow["ec"]["Id"]; ?>
            </td>
            <td>
            <?php echo $dtRow["s"]["sname"] . " , " . $dtRow["s"]["scity"]; ?>    
            </td>
            <td>
            <?php echo $dtRow["b"]["bname"] . " , " . $dtRow["b"]["bcity"]; ?>    
            </td>
            <td>
            <?php echo $dtRow["ec"]["ratepercandy"];  ?>    
            </td>
            <td>
            <?php echo $dtRow["t"]["tname"] . " , " . $dtRow["t"]["tcity"]; ?>    
            </td>
            <td>
                <a href="exportcontract?id=<?php echo $dtRow["ec"]["Id"];?>" > Edit </a>
            </td>
        </tr>
<?php } ?>
</table>