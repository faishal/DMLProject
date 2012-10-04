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
    
</script>​
<form method="post" action="" onsubmit="convertdata()" id="frmmain"> 
    <table class="table">
        <tr>
            <td>
                <table>
                    <tr>
                        <td>
                            Seller Party      
                        </td>
                        <td>
                            <select id="bsd" name="data[Contract][sellerparty_id]">
                                <option value="0">All</option>
                                <?php foreach ($seller as $dtrow) { ?>
                                    <option value= "<?php echo $dtrow['Sellerpartie']['id']; ?>"  <?php
                                if (isset($data)) {
                                    if ($data["Contract"]["sellerparty_id"] == $dtrow['Sellerpartie']['id'])
                                        echo " Selected";
                                }
                                    ?>> 
                                                <?php echo $dtrow['Sellerpartie']['name'] . " ," . $dtrow['Sellerpartie']['city']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>Contract Date:</td>
                        <td>
                            <table>
                                <tr>
                                    <td>
                                        <input type="radio" name="data[Contract][dtchecked]" value="n" checked="checked"/>
                                    </td>
                                    <td>
                                        Any
                                    </td>
                                    <td>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td>
                            <input type="radio" name="data[Contract][dtchecked]" value="y" />            
                                    </td>
                                    <td>
                                        From 
                                    </td>
                                    <td>
                              <input type="text" name="data[Contract][fcontract_date]" class="dt" >          
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td>
                            
                                    </td>
                                    <td>
                                        To
                                    </td>
                                    <td>
                              <input type="text" name="data[Contract][tcontract_date]" class="dt" value="" >
                                    </td>
                                    
                                </tr>
                            </table>
                            
                          </td>    
                    </tr>
                    <tr>
                        <td>Broker Name:</td>
                        <td>
                            <select  name="data[Contract][broker_id]" >
                                <option value="0">All</option>
                                <?php foreach ($broker as $dtrow) { ?>
                                    <option value= "<?php echo $dtrow['Broker']['id']; ?>"  <?php
                                if (isset($data)) {
                                    if ($data["Contract"]["broker_id"] == $dtrow['Broker']['id'])
                                        echo " Selected";
                                }
                                    ?> > 
                                                <?php echo $dtrow['Broker']['name'] . " ," . $dtrow['Broker']['city']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Buyer Party Name:</td>
                        <td>
                            <select name="data[Contract][dmlcompany_id]">
                                <option value="0">All</option>
                                <?php foreach ($dmlcompany as $dtrow) { ?>
                                    <option value= "<?php echo $dtrow['Dmlcompanie']['id']; ?>" <?php
                                if (isset($data)) {
                                    if ($data["Contract"]["dmlcompany_id"] == $dtrow['Dmlcompanie']['id'])
                                        echo " Selected";
                                }
                                    ?>> 
                                                <?php echo $dtrow['Dmlcompanie']['name'] . " ," . $dtrow['Dmlcompanie']['city']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Sales Against:</td>
                        <td>
                            <select name="data[Contract][salesagainst_id]">
                                <option value="0">All</option>
                                <?php foreach ($salesagainst as $dtrow) { ?>
                                    <option value= "<?php echo $dtrow['Salesagainst']['id']; ?>"  <?php
                                if (isset($data)) {
                                    if ($data["Contract"]["sellerparty_id"] == $dtrow['Sellerpartie']['id'])
                                        echo " Selected";
                                }
                                    ?>> 
                                                <?php echo $dtrow['Salesagainst']['value']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Passing Type:</td>
                        <td>
                            <select name="data[Contract][passingtype_id]">
                                <option value="0">All</option>
                                <?php foreach ($passingtype as $dtrow) { ?>
                                    <option value= " <?php echo $dtrow['Passingtype']['id']; ?>"  <?php
                                if (isset($data)) {
                                    if ($data["Contract"]["passingtype_id"] == $dtrow['Passingtype']['id'])
                                        echo " Selected";
                                }
                                    ?>> 
                                                <?php echo $dtrow['Passingtype']['value']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                </table>
            </td> 
            <td>
                <table>
                    <tr>

                        <td>Delivery From:</td>
                        <td>
                            <select name="data[Contract][deliveryfrom_id]">
                                <option value="0">All</option>
                                <?php foreach ($seller as $dtrow) { ?>
                                    <option value= "<?php echo $dtrow['Sellerpartie']['id']; ?>"  <?php
                                if (isset($data)) {
                                    if ($data["Contract"]["deliveryfrom_id"] == $dtrow['Sellerpartie']['id'])
                                        echo " Selected";
                                }
                                    ?>> 
                                                <?php echo $dtrow['Sellerpartie']['name'] . " ," . $dtrow['Sellerpartie']['city']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Contract Type:</td>
                        <td>
                            <select name="data[Contract][contracttype_id]">
                                <option value="0">All</option>
                                <?php foreach ($contracttype as $dtrow) { ?>
                                    <option value= " <?php echo $dtrow['Contracttype']['id']; ?>"   <?php
                                if (isset($data)) {
                                    if ($data["Contract"]["contracttype_id"] == $dtrow['Contracttype']['id'])
                                        echo " Selected";
                                }
                                    ?>> 
                                                <?php echo $dtrow['Contracttype']['value']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Contract Status:</td>
                        <td>
                            <select name="data[Contract][status_id]">
                                <option value="0">All</option>
                                <?php foreach ($contractstatus as $dtrow) { ?>
                                    <option value= " <?php echo $dtrow['Contractstatu']['id']; ?> "  <?php
                                if (isset($data)) {
                                    if ($data["Contract"]["status_id"] == $dtrow['Contractstatu']['id'])
                                        echo " Selected";
                                }
                                    ?>> 
                                                <?php echo $dtrow['Contractstatu']['value']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Mic:</td>
                        <td>
                            <table>
                                <tr>
                                    <td>
                                        From
                                    </td>
                                    <td>
                                        <input type="text" name="data[Contract][fq_mic]"></td>    
                                    
                                </tr>
                                <tr>
                                    <td>
                                        To
                                    </td>
                                    <td>
                                        <input type="text" name="data[Contract][tq_mic]"></td>    
                                    
                                </tr>
                            </table>
                        </td>
                            
                    </tr>
                    <tr>
                        <td>Length:</td>
                        <td>
                          <table>
                                <tr>
                                    <td>
                                        From
                                    </td>
                                    <td>
                                        <input type="text" name="data[Contract][fq_length]"></td>    
                                    
                                </tr>
                                <tr>
                                    <td>
                                        To
                                    </td>
                                    <td>
                                        <input type="text" name="data[Contract][tq_length]"></td>    
                                    
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>Strength:</td>
                        <td>  <table>
                                <tr>
                                    <td>
                                        From
                                    </td>
                                    <td>
                                        <input type="text" name="data[Contract][fq_strength]"></td>    
                                    
                                </tr>
                                <tr>
                                    <td>
                                        To
                                    </td>
                                    <td>
                                        <input type="text" name="data[Contract][tq_strength]"></td>    
                                    
                                </tr>
                            </table>
                        </td></td>    
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <Td colspan="2">
                <input type="submit" value="Search Contract" class="btn btn-primary"/> 
            </td>
                        
        </tr>
    </table>
    
</form>

<?php if(isset($cdata) && $cdata){
    ?>
<script>
    $("#frmmain").toggle();
    $(document).ready(function()
	{
             new Tablesort(document.getElementById('myTable'));
	
	}
);
 </script>
 <input type="button" class="btn btn-primary" onclick='$("#frmmain").toggle();' value="Show/Hide Search Form" />
 
<table id="myTable" class="table table-striped table-bordered table-condensed">
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
    foreach ($cdata as $dtRow) {
        ?>
        <tr>

            <td>
                <?php echo $dtRow["c"]["Id"]; ?>
            </td>
            <td>
                <?php echo $dtRow["c"]["brefno"] ?>
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

                <?php $rate = $dtRow["c"]["rate"]; ?>;


            </td>
            <td>
                <?php echo $dtRow["sa"]["sa"]; ?>
            </td>
            <td>
                <?php echo $dtRow["p"]["p"]; ?>
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
                <a href="contract?id=<?php echo $dtRow["c"]["Id"]; ?>" > Edit </a>
            </td>



        </tr>
    <?php } ?>

</table>
<?php
}
?>