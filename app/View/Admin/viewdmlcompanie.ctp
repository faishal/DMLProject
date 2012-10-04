<H1>DML Company Details </h1>
<a class="btn btn-primary" href="dmlcompanie"> Add New </a>
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
    <?php foreach($data as $dtrow){ ?>
    <table class="table  table-bordered">
        <tr>
                    <th>ID</th>
            <td><?php echo $dtrow['Dmlcompanie']['id']; ?></td>
            </tr>
                <tr>
<th>Name</th>
            <td><?php echo $dtrow['Dmlcompanie']['name']; ?></td>
            </tr>
                <tr>
                    <th>Address</th>
            <td><?php echo $dtrow['Dmlcompanie']['address']; ?></td>
            </tr>
                <tr>

        <th>City</th>
        
            <td><?php echo $dtrow['Dmlcompanie']['city']; ?></td>    
            </tr>
                <tr>

        <th>State</th>
       
            <td><?php echo $dtrow['Dmlcompanie']['state']; ?></td>    
            </tr>
                <tr>
                     <th>S.T. Tin No.</th>
        
            <td><?php echo $dtrow['Dmlcompanie']['st_tin_no']; ?></td>
            </tr>
                <tr>
                    <th>S.T. Date</th>
       
            <td><?php echo $dtrow['Dmlcompanie']['st_date']; ?></td>
            </tr>
                <tr>
                     <th>C.S.T. Tin No.</th>
            <td><?php echo $dtrow['Dmlcompanie']['cst_tin_no']; ?></td>
            </tr>
                <tr>
                      <th>C.S.T. Dates</th>
            <td><?php echo $dtrow['Dmlcompanie']['cst_date']; ?></td>
            </tr>
                <tr>
                         <th>C Person</th>
            <td><?php echo $dtrow['Dmlcompanie']['contact_person']; ?></td>
            </tr>
            </tr>
                <tr>
                      <th>Contacts</th>
            <td><?php echo $this->Service->getContactDetails($dtrow['Dmlcompanie']['id'],"c"); ?></td>
            </tr>
                <tr>
                      <th></th>
            <td><a href="dmlcompanie?id=<?php echo $dtrow['Dmlcompanie']['id']; ?>" class="btn btn-primary"> Edit </a></td>
            </tr>
                
        </tr>    
        </table>
   <?php } ?>



