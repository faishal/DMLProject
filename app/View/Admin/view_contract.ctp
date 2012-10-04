<H1>Contract Details </h1>
<a class="btn btn-primary" href="contract"> Add New </a>
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

<table id="myTable" class="table" >
    
    <tr>
        
        <th>
            Id
        </th>
        <th>
            Broker Ref. No.
        </th>
        <th>
            Broker Name
        </th>
        <th>
            Contract Date
        </th>
        <th>
            Seller Party Name
        </th>
        <th>
            Bank Name
        </th>
        <th>
            Account No
        </th>
        <th>
            RTGS No
        </th>
        <th>
            Buyer Party Name
        </th>
        <th>
            Variety of Crop
        </th>
        <th>
            Quantity (bales)
        </th>
        <th>
            Rate
        </th>
        <th>
            Sales Against
        </th>
        <th>
            Passing Type
        </th>
        <th>
            Payment Condition
        </th>
        <th>
            Billing Name
        </th>
        <th>
            Delivery Condition
        </th>
        <th>
            Delivery From
        </th>
        <th>
            Commission
        </th>
        <th>
            Contract Type
        </th>
        <th>
            Packing Type
        </th>
        <th>
            Remarks
        </th>
        <th>
            Mic
        </th>
        <th>
            Length
        </th>
        <th>
            Strength
        </th>
        <th>
            Quality Remarks
        </th>
        <th>
            NOTE
        </th>
        <th>
            Contract Status
        </th>
        <th>
            
        </th>

    </tr>
  
    <?php
    foreach ($data as $dtRow) {
        ?>
        <tr>

            <td>
    <?php echo $dtRow["c"]["Id"]; ?>
            </td>
            <td>
                <?php echo $dtRow["c"]["brefno"]?>
            </td>
            <td>
    <?php echo $dtRow["b"]["bname"] . " , " . $dtRow["b"]["bcity"]; ?>
            </td>
            <td>
    <?php echo $dtRow["c"]["contract_date"]; ?>
            </td>
            <td>
    <?php echo $dtRow["s"]["snmae"] . " , " . $dtRow["s"]["scity"]; ?>
            </td>

            <td>
    <?php echo $dtRow["c"]["bank"]; ?>
            </td>
            <td>
                <?php echo $dtRow["c"]["account_no"]; ?>
            </td><td>
    
            </td>
            <td>
    <?php echo $dtRow["d"]["dname"] . " , " . $dtRow["d"]["dcity"]; ?>
            </td>

            <td>
                <?php echo $dtRow["c"]["crop_variety"]; ?>
            </td>
            <td>
                <?php echo $dtRow["c"]["quantity"]; ?>
            </td>
            <td>
                 <?php echo $dtRow["c"]["rate"]; ?>
            </td>
            <td>
                <?php echo $dtRow["sa"]["sa"] ; ?>
            </td>
            <td>
                 <?php echo $dtRow["p"]["p"] ; ?>
            </td>
            <td>
                <?php echo $dtRow["c"]["payment_condition"]; ?>
            </td>
            <td>
                 <?php echo $dtRow["c"]["billing_name"]; ?>
            </td>
            <td>
                 <?php echo $dtRow["c"]["delivery_condition"]; ?>
                
            </td>
            <td>
                   <?php echo $dtRow["sp"]["spname"] . " , " . $dtRow["sp"]["spcity"]; ?>
            </td>
            <td>
               <?php echo $dtRow["c"]["commission"]; ?>
            </td>
            <td>
                <?php echo $dtRow["ct"]["ct"]; ?>
                
            </td>
            <td>
               <?php echo $dtRow["c"]["packing_type"]; ?>
            </td>
            <td>
                <?php echo $dtRow["c"]["remarks"]; ?>
            </td>
            <td>
                <?php echo $dtRow["c"]["q_mic"]; ?>
            </td>
            <td>
                <?php echo $dtRow["c"]["q_length"]; ?>
            </td>
            <td>
                <?php echo $dtRow["c"]["q_strength"]; ?>           </td>
            <td>
                <?php echo $dtRow["c"]["q_remarks"]; ?>
            </td>
            <td>
                <?php echo $dtRow["c"]["note"]; ?>
            </td>
            <td>
                <?php echo $dtRow["st"]["st"]; ?>
            </td>
            <td>
                <a href="contract?id=<?php echo $dtRow["c"]["Id"];?>" > Edit </a>
            </td>
            

            
        </tr>
<?php } ?>

</table>
