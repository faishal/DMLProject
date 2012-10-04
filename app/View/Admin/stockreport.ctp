<H1>Warehouse Stock Report</h1>

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
<style>
    .c{
        background: lightgreen;
    }
    .d{
        background: lightpink;
    }
</style>
<form method="post" onsubmit="convertdata()" id="frmmain">
<table class="table">
    <tr><td>
            <table>
                <tr>
                    <td>Warehouse Name:</td>
                    <td>
                        <select name="data[Contract][warehouse_id]">
                            
                            <?php foreach ($warehouse as $dtrow) { ?>
                                <option value= "<?php echo $dtrow['Warehouse']['id']; ?>" <?php
                            if (isset($data)) {
                                if ($data["Warehousestock"]["warehouse_id"] == $dtrow['Warehouse']['id'])
                                    echo " Selected";
                            }
                                ?>> 
                                            <?php echo $dtrow['Warehouse']['name'] . " ," . $dtrow['Warehouse']['city']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Date:</td>
                    <td>
                        <table>
                            <tr>
                                <td>
                                    <input type="radio" name="data[Contract][dtchecked]" value="n" />
                                </td>
                                <td>
                                    Any
                                </td>
                                <td>
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <input type="radio" name="data[Contract][dtchecked]" value="y" checked="checked" />            
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
                
            </table>
        </td>
        <td>
            
        </td>
    </tr>
    <tr>
        <Td colspan="2">
            <input type="submit" value="Show Report" class="btn btn-primary"/> 
        </td>

    </tr>

</table>
</form>

<?php if(isset($cdata) && $cdata){ ?>
<script>
    $("#frmmain").toggle();
    $(document).ready(function()
	{
             new Tablesort(document.getElementById('myTable'));
	
	}
);
 </script>
 <input type="button" class="btn btn-primary" onclick='$("#frmmain").toggle();' value="Show/Hide Search Form" />

<Table class="table" id="myTable">
    <tr>
        <Th>
            Sr.No
        </th>
        <th>
            Type
        </th>
        <th>
            Bales
        </th>
        <th>
            Mic
        </th>
        <th>
            Entry Time
        </th>
        <th>
            View Bales
        </th>
        <th>
            Opening Stock
        </th>
        <th>
            Closing Stock
        </th>
            
    </tr>
    
    <?php $sr=1; foreach($cdata as $dtRow){?>
    <tr >
        <td>
            <?php echo $sr++; ?>
        </td>
        <td class="<?php echo $dtRow["a"]["type"];?>">
            <?php if($dtRow["a"]["type"]=="c")
                echo "Credit";
            else
                echo "Debit";
            ?>
        </td>
        <td>
           <?php echo $dtRow[0]["bales"]; ?>
        </td>
        <td>
           <?php echo $dtRow[0]["mic"]; ?>
        </td>
        <td>
            <?php echo $dtRow["a"]["date_time"]; ?>
        </td>
        <td>
            <a target="_blank" href="balesdata?id=<?php echo $dtRow[0]["cid"]?>&q=<?php echo $dtRow["a"]["bales_id"]?>"> View </a>
        </td>
        <td>
           <?php echo $openingstock; 
            
           if($dtRow["a"]["type"]=="c")
                $openingstock += $dtRow[0]["bales"];
            else
                $openingstock -= $dtRow[0]["bales"];
           ?>
            
        </td>
        <td>
            <?php echo $openingstock; ?>
        </td>
            
    </tr>    
    <?php }?>
</table>

<?php } ?>
