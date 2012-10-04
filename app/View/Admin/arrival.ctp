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


</script>
<style>
    
</style>
<input type="button" class="btn btn-warning" value="Print" onclick="printDiv('divprint')"/>
<div id="divprint">

<table class="table">
    <tr>
        <th colspan="4" align="center">D.M.L. Exim Pvt. Ltd.</th>
        
    </tr>
    <tr>
        <td>Arrival Details No.</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>Commodity:</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>Contract No.:</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>Contract Rate:</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>Payment Condition:</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>Agent Name:</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>Received Date:</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>Party Name:</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>Bill No.:</td>
        <td></td>
        <td>Bill Date:</td>
        <td></td>
    </tr>
        <tr>
        <td>Delivery at:</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
        <tr>
        <td>Quantity:</td>
        <td></td>
        <td>Bages:</td>
        <td></td>
    </tr>
    <tr>
        <td>Party Station Wt1:</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
        <tr>
        <td>Weight Shortage:</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>Kanta Kasar and Bardan Claim:</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>Bardan Damaged:</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>Total Moisture Claim :</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>Truck No./Container No.:</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>Others:</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>
    <table class="table">
        <tr>
            <td>Prepared By:</td>
            <td>&nbsp;</td>
            <td>Total Debit Note:</td>
            <td></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Authorized Signatory</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
    </table>
</div>