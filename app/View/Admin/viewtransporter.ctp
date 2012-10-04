<H1>Transporter Details </h1>
<a class="btn btn-primary" href="transporter"> Add New </a>
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
       
    </tr>

    <?php foreach($data as $dtrow){ ?>
        <tr>
            <td><?php echo $dtrow['Transporter']['id']; ?></td>
            <td><?php echo $dtrow['Transporter']['name']; ?></td>
            <td><?php echo $dtrow['Transporter']['address']; ?></td>
            <td><?php echo $dtrow['Transporter']['city']; ?></td>    
            <td><?php echo $dtrow['Transporter']['state']; ?></td>
            
            <td><a href="transporter?id=<?php echo $dtrow['Transporter']['id']; ?>" > Edit </a></td>
        </tr>    
   <?php } ?>
</table>


