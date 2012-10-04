<H1>Warehouse Stock MIC Report</h1>

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
            Warehouses
        </th>
        
    </tr>
    
    <?php $sr=1; foreach($cdata as $dtRow){?>
    <tr >
        <td>
            <?php echo $sr++; ?>
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
            <?php echo $dtRow[0]["w"]; ?>
        </td>
        
            
    </tr>    
    <?php }?>
</table>

<?php } ?>

