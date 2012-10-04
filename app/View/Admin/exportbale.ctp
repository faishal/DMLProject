<H1>Export Bales Details </h1>
<a class="btn btn-primary" href="viewexportbale?id=<?php echo $_GET["id"]; ?>"> View All </a>
<a class="btn btn-primary" href="exportbale?id=<?php echo $_GET["id"]; ?>"> Add New </a>
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
<table class="table table-striped table-bordered table-condensed">
    <tr>
        <th>ID</th>
        <th>Buyer Party</th>
        <th>Broker</th>
        <th>Rate per candy</th>
        <th>Transporter</th>
        <th></th>
    </tr>
    <?php
    foreach ($ecdata as $dtRow) {
        ?>
    <tr>
        <td>
                <?php echo $dtRow["ec"]["Id"]; ?>
            </td>
            <td>
                <?php echo $dtRow["s"]["sname"] ?>
            </td>
            <td>
                <?php echo $dtRow["b"]["bname"] ?>
            </td>
            <td>
                <?php echo $dtRow["ec"]["ratepercandy"] ?>
            </td>
            <td>
                <?php echo $dtRow["t"]["tname"] ?>
            </td>
            <td>
                <a href="exportcontract?id=<?php echo $dtRow["ec"]["Id"]; ?>" > Edit </a>
            </td>
    </tr>
     <?php } ?>
</table>


<form  action="addexportbale?id=<?php echo $_GET["id"]; ?>" method="post"  >
    <?php if (isset($data)) { ?>
        <input type="Hidden" name="data[Exportbale][id]" value="<?php echo $data["Exportbale"]["id"]; ?>" />
        <input type="Hidden" name="data[Exportbale][exportcontract_id]" value="<?php echo $data["Exportbale"]["exportcontract_id"]; ?>" />
    <?php } else { ?>
        <input type="Hidden" name="data[Exportbale][exportcontract_id]" value="<?php echo $_GET["id"]; ?>" />

    <?php } ?>

        <table>
            <tr>
                <td>Invoice No.:</td>
                <td><input type="text" name="data[Exportbale][invoice_no]" value="<?php if (isset($data)) echo $data["Exportbale"]["invoice_no"]; ?>" /></td>
            </tr>
            <tr>
                <td>Lorry No.:</td>
                <td><input type="text" name="data[Exportbale][lorry_no]" value="<?php if (isset($data)) echo $data["Exportbale"]["lorry_no"]; ?>" /></td>
            </tr>
            <tr>
                <td>LR No.:</td>
                <td><input type="text" name="data[Exportbale][lr_no]" value="<?php if (isset($data)) echo $data["Exportbale"]["lr_no"]; ?>" /></td>
            </tr>
            <tr>
                <td>Fright:</td>
                <td><input type="text" name="data[Exportbale][fright]" value="<?php if (isset($data)) echo $data["Exportbale"]["fright"]; ?>" /></td>
            </tr>
            <tr>
                <td>Amount:</td>
                <td><input type="text" name="data[Exportbale][amount]" value="<?php if (isset($data)) echo $data["Exportbale"]["amount"]; ?>" /></td>
            </tr>
            <tr>
                <td>Weight:</td>
                <td><input type="text" name="data[Exportbale][weight]" value="<?php if (isset($data)) echo $data["Exportbale"]["weight"]; ?>" /></td>
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