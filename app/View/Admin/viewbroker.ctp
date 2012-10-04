<H1>Broker Detail </h1>
<a class="btn btn-primary" href="broker"> Add New </a>
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



        <?php foreach($data  as $dtrow){ ?>
            <table class="table  table-bordered">
  
</tr>
<tr>
<td width="100">
  Name
</td>

<td>
<?php echo $dtrow['Broker']['name']; ?>
</td>
</tr>
<tr>
<td>
  Address
</td>
   <td>
<?php echo $dtrow['Broker']['address']; ?>
</td>
</tr>
<tr>
<td>
  City
</td>
   <td>
<?php echo $dtrow['Broker']['city']; ?>
</td>
</tr>
<tr>
<td>
  State
</td>
   <td>
<?php echo $dtrow['Broker']['state']; ?>
</td>
</tr>
<tr>
<td>
  C Person
</td>
<td>
<?php echo $dtrow['Broker']['contact_person']; ?>
</td>
</tr>
<tr>
  <td>
  Contacts
</td>
  <td>

<?php echo $this->Service->getContactDetails($dtrow['Broker']['id'],"b"); ?>
</td>
</tr>
<tr>
<td>
  Update
</td>
<td>
    <a href="broker?id=<?php echo $dtrow['Broker']['id']; ?>" class="btn btn-primary"> Edit </a>
</td>

</tr>
        
        </table>
    <?php } ?>
     
