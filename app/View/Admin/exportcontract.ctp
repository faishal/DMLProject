<H1>Export Contract Details </h1>
<a class="btn btn-primary" href="viewexportcontract"> View All </a>
<a class="btn btn-primary" href="Exportcontract"> Add New </a>
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
<?php
    if (isset($data)) {
        ?>
        <a class="btn btn-primary" href="exportbale?id=<?php echo $data['Exportcontract']['id']; ?>"> Add New Export Bales </a>
        <a class="btn btn-primary" href="viewexportbale?id=<?php echo $data['Exportcontract']['id']; ?>"> View Export Bales </a>
        <?php
    }
    ?>
<form action="addexportcontract" method="post">
    <?php
    if (isset($data)) {
        ?>
        <input type="hidden" value="<?php echo $data['Exportcontract']['id']; ?>" name="data[Exportcontract][id]" />
        <?php
    }
    ?>
        <table>
            <tr>
                <td>
                    Buyer Party:
                </td>
                <td>
                    <select name="data[Exportcontract][sellerparty_id]">
                                <?php foreach ($seller as $dtrow) { ?>
                                    <option value= "<?php echo $dtrow['Sellerpartie']['id']; ?>"  <?php
                                if (isset($data)) {
                                    if ($data["Exportcontract"]["sellerparty_id"] == $dtrow['Sellerpartie']['id'])
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
                <td>Broker Name:</td>
                        <td>
                            <select name="data[Exportcontract][broker_id]">
                                <?php foreach ($broker as $dtrow) { ?>
                                    <option value= "<?php echo $dtrow['Broker']['id']; ?>"  <?php
                                if (isset($data)) {
                                    if ($data["Exportcontract"]["broker_id"] == $dtrow['Broker']['id'])
                                        echo " Selected";
                                }
                                    ?> > 
                                                <?php echo $dtrow['Broker']['name'] . " ," . $dtrow['Broker']['city']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </td>
                    
                </td>
            </tr>
            <tr>
                <td>Rate per Candy:</td>
                <td><input type="text" name="data[Exportcontract][ratepercandy]" value="<?php
                                if (isset($data)) {
                                    echo $data["Exportcontract"]["ratepercandy"];
                                }
                                ?>"></td>
            </tr>
            <tr>
                <td>Transporter:</td>
                        <td>
                            <select name="data[Exportcontract][transporter_id]">
                                <?php foreach ($transporter as $dtrow) { ?>
                                    <option value= "<?php echo $dtrow['Transporter']['id']; ?>" <?php
                                if (isset($data)) {
                                    if ($data["Exportcontract"]["transporter_id"] == $dtrow['Transporter']['id'])
                                        echo " Selected";
                                }
                                    ?>> 
                                                <?php echo $dtrow['Transporter']['name'] . " ," . $dtrow['Transporter']['city']; ?>
                                    </option>
                                <?php } ?>
                            </td>
            </tr>
            <tr>
            <td></td>
            <td align="left"><input type="submit" name="btnsubmit" class="btn btn-inverse" value="<?php
                                    if (isset($data)) {
                                        echo "Update";
                                    } else {
                                        echo "Insert";
                                    }
                                    ?>"
                                    ></td>
        </tr>
        </table>    
</form>
        
