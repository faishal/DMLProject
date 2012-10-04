<H1>Warehouse Stock Details </h1>

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
<?php if(isset($stock) && $stock) { ?>
<table class="table">
    <tr>
        <th>
         Id 
        </th>
        <th>
        Warehouse
        </th>
        <th>
        EntTime
        </th>
        <th>
        Type
        </th>
    </tr>
    
    <?php foreach($stock as $dtRow){
        ?>
    <tr>
        <td>
         <?php echo $dtRow["Warehousestock"]["id"]; ?>   
        </td>
        <td>
         <?php echo $wrName; ?>      
        </td>
       
        <td>
         <?php echo $dtRow["Warehousestock"]["date_time"]; ?>      
        </td>
        <td>
         <?php echo $dtRow["Warehousestock"]["type"]; ?>      
        </td>
    </tr>
    
    <?php
    } ?>
</table>
<?php } ?>
<form  action="addWarehousestock?id=<?php echo $_GET["id"]; ?>" method="post"  onsubmit="convertdata()" >
<?php if(isset($data)) { ?>
    <input type="Hidden" name="data[Warehousestock][id]" value="<?php echo $data["Warehousestock"]["id"]; ?>" />
 <?php } ?>


    <table border="0">
            
            <tr>
                <td>Warehouse Name:</td>
                <td>
                    <select name="data[Warehousestock][warehouse_id]">
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
                <td>Bales ID:</td>
                <td><input type="text" id='gwt' readonly="readonly"  name="data[Warehousestock][bales_id]" value="<?php if(isset($_GET["id"])) echo $_GET["id"]; else{ if(isset($data))  echo $data["Warehousestock"]["bales_id"];} ?>" /></td>
            </tr>
            <tr>
                <td>Date:</td>
                <td><input type="text" class="dt" name="data[Warehousestock][date_time]" value="<?php if (isset($data)) echo $data["Warehousestock"]["date_time"]; ?>" /></td>
            </tr>
            <tr>
                <td>Operation Type:</td>
                <td>
                    <select name="data[Warehousestock][type]">
                        <option value="c">Credit</option>
                        <option value="d">Debit</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                
                <td align="left"><input type="submit" name="btnsubmit" class="btn btn-inverse" value="<?php if(isset($data)){ echo 'Update';} else {echo 'Insert';} ?>" ></td>
            </tr>20-9-2012
        </table>
    </form>
