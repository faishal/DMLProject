<H1>Export Bales Detail </h1>
<a class="btn btn-primary" href="exportbale?id=<?php echo $_GET["id"]; ?>"> Add New </a>
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
$(document).ready(function()
	{
             new Tablesort(document.getElementById('myTable'));
		
	}
);
	
</script>​
<table id="myTable">
    <tr>
        <th>ID</th>
        <th>Export Contract ID</th>
        <th>Invoice No.</th>
        <th>Lorry No.</th>
        <th>LR No.</th>
        <th>Fright</th>
        <th>Amount</th>
        <th>Weight</th>
        <th></th>
    </tr>
    
    <?php foreach ($data as $dtRow) {
        ?>
        <tr>
            <td>
                <?php echo $dtRow["eb"]["id"]; ?>
            </td>
            <td>
                <?php echo $dtRow["eb"]["exportcontract_id"]; ?>
            </td>
            <td>
                <?php echo $dtRow["eb"]["invoice_no"]; ?>
            </td>
            <td>
                <?php echo $dtRow["eb"]["lorry_no"]; ?>
            </td>
            <td>
                <?php echo $dtRow["eb"]["lr_no"]; ?>
            </td>
            <td>
                <?php echo $dtRow["eb"]["fright"]; ?>
            </td>
            <td>
                <?php echo $dtRow["eb"]["amount"]; ?>
            </td>
            <td>
                <?php echo $dtRow["eb"]["weight"]; ?>
            </td>
            <td>
                <a href="exportbale?id=<?php echo $_GET["id"]; ?>&q=<?php echo $dtRow["eb"]["id"]; ?>" > Edit </a>
            </td>
        </tr>

    <?php }
    ?>

</table>
