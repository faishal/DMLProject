<H1>Seller Party Details </h1>
<a class="btn btn-primary" href="sellerpartie"> Add New </a>
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
        <th>Contact Person</th>
        <th></th>
    </tr>

    <?php foreach($data as $dtrow){ ?>
        <tr>
            <td><?php echo $dtrow['Sellerpartie']['id']; ?></td>
            <td><?php echo $dtrow['Sellerpartie']['name']; ?></td>
            <td><?php echo $dtrow['Sellerpartie']['address']; ?></td>
            <td><?php echo $dtrow['Sellerpartie']['city']; ?></td>    
            <td><?php echo $dtrow['Sellerpartie']['state']; ?></td>
            <td><?php echo $dtrow['Sellerpartie']['contact_person']; ?></td>
            <td><a href="sellerpartie?id=<?php echo $dtrow['Sellerpartie']['id']; ?>" > Edit </a></td>
        </tr>    
   <?php } ?>
</table>


