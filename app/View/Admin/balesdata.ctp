<H1>Bales Details </h1>
<a class="btn btn-primary" href="viewbalesdata?id=<?php echo $_GET["id"]; ?>"> View All </a>
<a class="btn btn-primary" href="balesdata?id=<?php echo $_GET["id"]; ?>"> Add New </a>
<div id = "alert_placeholder"></div>
<script>

    bootstrap_alert = function() {}
    bootstrap_alert.warning = function(message) {
        $('#alert_placeholder').html('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><span>'+message+'</span></div>')
    }
<?php
$rate = 0;
if (isset($insertFlag)) {

    echo "bootstrap_alert.warning('$insertFlag')";
}
?>
var pendingbales=<?php echo $pendingbales; ?>;
<?php
if(isset($data)){
    
    echo "pendingbales  +=".$data["Balesdata"]["bales"];
}
?>

function checkbales(){
    if($("#bls").val()!= ""){
        if(isNaN($("#bls").val())){
            alert("Please Enter valid Bales")
        }else 
        {

            if(parseFloat($("#bls").val())>pendingbales){
                alert("too many bales,Remaining Bales are only:" + pendingbales)        
            }else if (parseFloat($("#bls").val())<=0) {
alert("Invalid Bales")
            } else{
                return true;
            }

        }
    }else {
        alert("Please Enter Bales")
    }

return false;
}
</script>​

<?php
if (isset($data) && isset($cdata)) {
    ?>
    <a class="btn btn-primary" href="labreport?id=<?php echo $_GET['id'] ; ?>&q=<?php echo $data['Balesdata']['id'] ?>  "> Add New Lab Report </a>
    <a class="btn btn-primary" href="viewlabreport?id=<?php echo $_GET['id']; ?>&q=<?php echo $data['Balesdata']['id'] ?> "> View Lab Report </a>
    <a class="btn btn-primary" href="uploadfiles?id=<?php echo $_GET['id']; ?>&q=<?php echo $data['Balesdata']['id'] ?> "> View/upload Files </a>
    <?php
}
?>


<table class="table table-striped table-bordered table-condensed">
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


<form  action="addbalesdata?id=<?php echo $_GET["id"]; ?>" method="post" onsubmit="return checkbales()" >
    <?php if (isset($data)) { ?>
        <input type="Hidden" name="data[Balesdata][id]" value="<?php echo $data["Balesdata"]["id"]; ?>" />
        <input type="Hidden" name="data[Balesdata][contract_id]" value="<?php echo $data["Balesdata"]["contract_id"]; ?>" />
    <?php } else { ?>
        <input type="Hidden" name="data[Balesdata][contract_id]" value="<?php echo $_GET["id"]; ?>" />

    <?php } ?>


    <table> 

        <tr>
            <td>
                <table class="table table-striped table-bordered table-condensed">
                    <tr>
                        <td>DO No.:</td>
                        <td><input type="text" name="data[Balesdata][do_no]" value="<?php if (isset($data)) echo $data["Balesdata"]["do_no"]; ?>" /></td>
                    </tr>
                    <tr>
                        <td>DO Date:</td>
                        <td><input type="text" class="dt" name="data[Balesdata][do_date]" value="<?php if (isset($data)) echo $data["Balesdata"]["do_date"]; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Invoice No.:</td>
                        <td><input type="text" name="data[Balesdata][invoice_no]" value="<?php if (isset($data)) echo $data["Balesdata"]["invoice_no"]; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Loading Date:</td>
                        <td><input type="text" class="dt" name="data[Balesdata][loading_date]" value="<?php if (isset($data)) echo $data["Balesdata"]["loading_date"]; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Arrival Date:</td>
                        <td><input type="text" class="dt" name="data[Balesdata][arrival_date]" value="<?php if (isset($data)) echo $data["Balesdata"]["arrival_date"]; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Transporter:</td>
                        <td>
                            <select name="data[Balesdata][transporter_id]">
                                <?php foreach ($transporter as $dtrow) { ?>
                                    <option value= "<?php echo $dtrow['Transporter']['id']; ?>" <?php
                                if (isset($data)) {
                                    if ($data["Balesdata"]["transporter_id"] == $dtrow['Transporter']['id'])
                                        echo " Selected";
                                }
                                    ?>> 
                                                <?php echo $dtrow['Transporter']['name'] . " ," . $dtrow['Transporter']['city']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Truck No.:</td>
                        <td><input type="text" name="data[Balesdata][truck_no]" value="<?php if (isset($data)) echo $data["Balesdata"]["truck_no"]; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Bales:</td>
                        <td><input id="bls" type="text" name="data[Balesdata][bales]" value="<?php if (isset($data)) echo $data["Balesdata"]["bales"]; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Lot No.:</td>
                        <td><input type="text" name="data[Balesdata][lot_no]" value="<?php if (isset($data)) echo $data["Balesdata"]["lot_no"]; ?>" /></td>
                    </tr>
                    <tr>
                        <td>PR No.:</td>
                        <td><input type="text" name="data[Balesdata][pr_no]" value="<?php if (isset($data)) echo $data["Balesdata"]["pr_no"]; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Gross Weight:</td>
                        <td><input class='gwt' id="grosswt" type="text" name="data[Balesdata][gross_wt]" value="<?php if (isset($data)) echo $data["Balesdata"]["gross_wt"]; else echo "0"; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Tare:</td>
                        <td><input class='gwt' id="tare" type="text" name="data[Balesdata][tare]" value="<?php if (isset($data)) echo $data["Balesdata"]["tare"]; else echo "0"; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Net Weight:</td>
                        <td><input type="text" id='gwt' readonly="readonly" name="data[Balesdata][net_wt]" value="<?php if (isset($data)) echo $data["Balesdata"]["net_wt"]; else echo "0"; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Container Weight:</td>
                        <td><input type="text" name="data[Balesdata][container_wt]" value="<?php if (isset($data)) echo $data["Balesdata"]["container_wt"]; ?>" /></td>
                    </tr>

                </table>    

            </td>

            <Td width="50">
                &nbsp;
            </td>
            <td valign="top">
                <table class="table table-striped table-bordered table-condensed">
                    <tr>
                        <td>Fright:</td>
                        <td><input type="text" name="data[Balesdata][fright]" value="<?php if (isset($data)) echo $data["Balesdata"]["fright"]; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Warehouse:</td>
                        <td>
                            <select name="data[Balesdata][warehouse_id]">
                                <?php foreach ($warehouse as $dtrow) { ?>
                                    <option value= "<?php echo $dtrow['Warehouse']['id']; ?>" <?php
                                if (isset($data)) {
                                    if ($data["Balesdata"]["warehouse_id"] == $dtrow['Warehouse']['id'])
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
                        <td>Bales Status:</td>
                        <td>
                            <select name="data[Balesdata][balesstatus_id]">
                                <?php foreach ($balesstatus as $dtrow) { ?>
                                    <option value= "<?php echo $dtrow['Balesstatu']['id']; ?>" <?php
                                if (isset($data)) {
                                    if ($data["Balesdata"]["balesstatus_id"] == $dtrow['Balesstatu']['id'])
                                        echo " Selected";
                                }
                                    ?> > 
                                                <?php echo $dtrow['Balesstatu']['value']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Passing Date:</td>
                        <td><input type="text" class="dt" name="data[Balesdata][passing_date]" value="<?php if (isset($data)) echo $data["Balesdata"]["passing_date"]; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Sample Deduct:</td>
                        <td><input type="text" name="data[Balesdata][sample_deduct]" value="<?php if (isset($data)) echo $data["Balesdata"]["sample_deduct"]; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Rate per kg:</td>
                        <td><input type="text" id="rpkg" readonly="readonly" name="data[Balesdata][rate_kg]" value="<?php if (isset($data)) echo $data["Balesdata"]["rate_kg"]; else echo $rate / 335.6185; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Bill Amount:</td>
                        <td><input id='ba' type="text" readonly="readonly" name="data[Balesdata][bill_amt]" value="<?php if (isset($data)) echo $data["Balesdata"]["bill_amt"]; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Bill Date:</td>
                        <td><input type="text" class="dt" name="data[Balesdata][bill_date]" value="<?php if (isset($data)) echo $data["Balesdata"]["bill_date"]; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Party Weight 1:</td>
                        <td><input type="text" name="data[Balesdata][party_wt1]" value="<?php if (isset($data)) echo $data["Balesdata"]["party_wt1"]; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Party Weight 2:</td>
                        <td><input type="text" name="data[Balesdata][party_wt2]" value="<?php if (isset($data)) echo $data["Balesdata"]["party_wt2"]; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Weighment Slip:</td>
                        <td><input type="text" id="ws" name="data[Balesdata][weighmentslip_wt]" value="<?php if (isset($data)) echo $data["Balesdata"]["weighmentslip_wt"]; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Shortage:</td>
                        <td><input type="text" id="srtg" name="data[Balesdata][shortage]" readonly="readonly" value="<?php if (isset($data)) echo $data["Balesdata"]["shortage"]; ?>" /></td>
                    </tr>
                    <tr>
                        <td>LR No.:</td>
                        <td><input type="text" name="data[Balesdata][lr_no]" value="<?php if (isset($data)) echo $data["Balesdata"]["lr_no"]; ?>" /></td>
                    </tr>
                    <tr>
                        <td>LR Date.:</td>
                        <td><input type="text" class="dt" name="data[Balesdata][lr_date]" value="<?php if (isset($data)) echo $data["Balesdata"]["lr_date"]; ?>" /></td>
                    </tr>
                </table>   
            </td>
        </tr>


        <tr>
            <td></td>
            <td align="left"><input type="submit" id="btnsbmt" name="btnsubmit" class="btn btn-inverse" value="<?php
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

<script>
    var d = new Date();
    var curr_date = d.getDate();
    var curr_month = d.getMonth() + 1; //Months are zero based
    var curr_year = d.getFullYear();
    function caculatewt(){
        if(isNaN(document.getElementById("grosswt").value) || isNaN(document.getElementById("tare").value)){
            document.getElementById("gwt").value=0;

        }else{
            document.getElementById("gwt").value=parseFloat(document.getElementById("grosswt").value) - parseFloat(document.getElementById("tare").value); 
            document.getElementById("ba").value= parseFloat(document.getElementById("gwt").value) * parseFloat(document.getElementById("rpkg").value); 

        }

    }

    function calshortage(){
        if(isNaN(document.getElementById("ws").value) || isNaN(document.getElementById("grosswt").value)){
            document.getElementById("srtg").value=0;

        }else{
            document.getElementById("srtg").value=parseFloat(document.getElementById("ws").value) - parseFloat(document.getElementById("grosswt").value); 

        }
    }

            $(document).ready(function() {
              
        $(".gwt").bind('keyup', function() {   if(isNaN(this.value)){
                alert("Enter Numeric");
                this.value="";
                this.focus();

            } else {
                caculatewt();
            }



        } );
        $("#ws").bind('keyup', function() {   if(isNaN(this.value)){
                alert("Enter Numeric");
                this.value="";
                this.focus();

            } else {
                calshortage();
            }


        } );

    });
</script>
