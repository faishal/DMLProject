<H1>Lab Report Details </h1>
<a class="btn btn-primary" href="viewlabreport?id=<?php echo $_GET['id']; ?>&q=<?php echo $_GET['q']; ?>"> View All </a>
<a class="btn btn-primary" href="labreport?id=<?php echo $_GET['id']; ?>&q=<?php echo $_GET['q']; ?>"> Add New </a>
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


</script>​

<table class="table table-bordered table-condensed table-striped">
    <tr>
        <th>
            Id
        </th>
        <th>
            DO No
        </th>
        <th>
            DO Date
        </th>
        <th>
            Invoice No.
        </th>
        <th>
            Loading Date
        </th>
        <th>
            Arrival Date
        </th>
        <th>
            Transporter
        </th>
        <th>
            Truck No
        </th>
        <th>
            Bales
        </th>
        <th>
            Lot No
        </th>
        <th>
            PR No
        </th>
        <th>
            Gross Weight
        </th>
        <th>
            Tare
        </th>
        <th>
            Net Weight
        </th>
        <th>
            Container Weight
        </th>
        <th>
            Fright
        </th>
        <th>
            Warehouse
        </th>
        <th>
            Bales Status
        </th>
        <th>
            Passing Date
        </th>
        <th>
            Sample Deduct
        </th>
        <th>
            Rate per kg
        </th>
        <th>
            Bill Amount
        </th>
        <th>
            Bill Date
        </th>
        <th>
            Party Weight 1
        </th>
        <th>
            Party Weight 2
        </th>
        <th>
            Weighment Slip
        </th>
        <th>
            Shortage
        </th>
        <th>
            LR No.
        </th>
        <th>
            LR Date
        </th>
        <th>

        </th>
    </tr>

    <?php foreach ($bdata as $dtRow) {
        ?>
        <tr>
            <td>
                <?php echo $dtRow["b"]["id"]; ?>
            </td>
            <td>
                <?php echo $dtRow["b"]["do_no"]; ?>
            </td>
            <td>
                <?php echo $dtRow["b"]["do_date"]; ?>

            </td>
            <td>
                <?php echo $dtRow["b"]["invoice_no"]; ?>

            </td>
            <td>
                <?php echo $dtRow["b"]["loading_date"]; ?>

            </td>
            <td>
                <?php echo $dtRow["b"]["arrival_date"]; ?>

            </td>
            <td>
                <?php echo $dtRow["t"]["name"] . " , " . $dtRow["t"]["city"]; ?>
            </td>
            <td>
                <?php echo $dtRow["b"]["truck_no"]; ?>

            </td>
            <td>
                <?php echo $dtRow["b"]["bales"]; ?>
            </td>
            <td>
                <?php echo $dtRow["b"]["lot_no"]; ?>
            </td>
            <td>
                <?php echo $dtRow["b"]["pr_no"]; ?>
            </td>
            <td>
                <?php echo $dtRow["b"]["gross_wt"]; ?>

            </td>
            <td>
                <?php echo $dtRow["b"]["tare"]; ?>
            </td>
            <td>
                <?php echo $dtRow["b"]["net_wt"]; ?>
            </td>
            <td>
                <?php echo $dtRow["b"]["container_wt"]; ?>
            </td>
            <td>
                <?php echo $dtRow["b"]["fright"]; ?>

            </td>
            <td>
                <?php echo $dtRow["w"]["name"] . " , " . $dtRow["w"]["city"]; ?>
            </td>
            <td>
                <?php echo $dtRow["bs"]["value"]; ?>
            </td>
            <td>
                <?php echo $dtRow["b"]["passing_date"]; ?>
            </td>
            <td>
                <?php echo $dtRow["b"]["sample_deduct"]; ?>
            </td>
            <td>
                <?php echo $dtRow["b"]["rate_kg"]; ?>
            </td>
            <td>
                <?php echo $dtRow["b"]["bill_amt"]; ?>
            </td>
            <td>
                <?php echo $dtRow["b"]["bill_date"]; ?>
            </td>
            <td>
                <?php echo $dtRow["b"]["party_wt1"]; ?>
            </td>
            <td>
                <?php echo $dtRow["b"]["party_wt2"]; ?>
            </td>
            <td>
                <?php echo $dtRow["b"]["weighmentslip_wt"]; ?> 
            </td>
            <td>
                <?php echo $dtRow["b"]["shortage"]; ?> 
            </td>
            <td>
                <?php echo $dtRow["b"]["lr_no"]; ?> 
            </td>
            <td>
                <?php echo $dtRow["b"]["lr_date"]; ?> 
            </td>
        </tr>

    <?php }
    ?>
</table>


<form  action="addlabreport?id=<?php echo $_GET['id'];?>&q=<?php echo $_GET['q']; ?>" method="post"  >
    <?php if (isset($data)) { ?>
        <input type="Hidden" name="data[Labreport][id]" value="<?php echo $data["Labreport"]["id"]; ?>" />
        <input type="Hidden" name="data[Labreport][bales_id]" value="<?php echo $data["Labreport"]["bales_id"]; ?>" />
    <?php } else { ?>
        <input type="Hidden" name="data[Labreport][bales_id]" value="<?php echo $_GET["q"]; ?>" />

    <?php } ?>

    <table class="table table-striped table-bordered table-condensed">
        <tr>
            <td>Mic:</td>
            <td><input type="text" name="data[Labreport][mic]" value="<?php if (isset($data)) echo $data["Labreport"]["mic"]; ?>" /></td>
        </tr>
        <tr>
            <td>Length:</td>
            <td><input type="text" name="data[Labreport][length]" value="<?php if (isset($data)) echo $data["Labreport"]["length"]; ?>" /></td>
        </tr>
        <tr>
            <td>Strength:</td>
            <td><input type="text" name="data[Labreport][strength]" value="<?php if (isset($data)) echo $data["Labreport"]["strength"]; ?>" /></td>
        </tr>
        <tr>
            <td>C.G.:</td>
            <td><input type="text" name="data[Labreport][cg]" value="<?php if (isset($data)) echo $data["Labreport"]["cg"]; ?>" /></td>
        </tr>
        <tr>
            <td>Test Report No.:</td>
            <td><input type="text" name="data[Labreport][testreport_no]" value="<?php if (isset($data)) echo $data["Labreport"]["testreport_no"]; ?>" /></td>
        </tr>
        <tr>
            <td>Test Report Date:</td>
            <td><input type="text" class="dt" name="data[Labreport][testreport_date]" value="<?php if (isset($data)) echo $data["Labreport"]["testreport_date"]; ?>" /></td>
        </tr>
        <tr>
            <td>Note:</td>
            <td><TEXTAREA name="data[Labreport][note]"><?php if (isset($data)) echo $data["Labreport"]["note"]; ?></TEXTAREA></td>
        </tr>
        <tr>
            <td></td>

            <td align="left"><input type="submit" name="btnsubmit" class="btn btn-inverse" value="<?php if (isset($data)) {
        echo 'Update';
    } else {
        echo 'Insert';
    } ?>" ></td>
        </tr>
    </table>

</form>

