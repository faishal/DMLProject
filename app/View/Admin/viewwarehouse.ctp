<H1>Warehouse Details </h1>
<a class="btn btn-primary" href="warehouse"> Add New </a>
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
$(document).ready(function()
	{
             new Tablesort(document.getElementById('myTable'));
	
	}
);
</script>​
<table class="table" id="myTable">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Address</th>
        <th>City</th>
        <th>State</th>
        <th></th>
    </tr>

    <?php foreach($data as $dtrow){ ?>
        <tr>
            <td><?php echo $dtrow['Warehouse']['id']; ?></td>
            <td><?php echo $dtrow['Warehouse']['name']; ?></td>
            <td><?php echo $dtrow['Warehouse']['address']; ?></td>
            <td><?php echo $dtrow['Warehouse']['city']; ?></td>    
            <td><?php echo $dtrow['Warehouse']['state']; ?></td>
            <td><a href="warehouse?id=<?php echo $dtrow['Warehouse']['id']; ?>" > Edit </a></td>
        </tr>    
   <?php } ?>
</table>


