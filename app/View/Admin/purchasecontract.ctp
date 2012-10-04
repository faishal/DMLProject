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

    function printDiv(divName) {
        $("input[type=text]").each(function(){
            $("#s"+this.id).html(this.value);
            this.style.display='none';
        });
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
  
        $("input[type=text]").each(function(){
            $("#s"+this.id).html("");
            this.style.display='inline'
        })
    
    }

</script>
<style>
    .tcenter td{
        text-align: center;
    }
    .tcenter th{
        text-align: center;
    }
    .tbldo {
        border-width: 1px;border-color:#000000;vertical-align: top

    }
</style>
<input type="button" class="btn btn-warning" value="Print" onclick="printDiv('divprint')"/>
<div id="divprint">
    <div style="text-align: center">
    <h2> Purchase Contract </h2>
    </div>
    <table width="100%">
        <tr> <Td>
                <table class="tbldo" width="100%">
                    <tr>
                        <td class="tbldo" colspan="2">
                            <table class="table table-condensed">
                                <tr>
                                    <th>BUYER</th>
                                    <Td width="50%"></td>
                                    <th>CONTRACT NO.</th>
                                    <td><?php echo $contract["Contract"]["id"] ?></td>

                                </tr>
                                <Tr>
                                    <td><img src="/img/dmllogo.png"  height="100"/> </td>

                                    <td>(Subject to Rajkot Jurisdiction)
                                        <br />
                                        <b> <?php echo $dmlcompanie["Dmlcompanie"]["name"]; ?></b>
                                        <br/>
                                        <?php echo $dmlcompanie["Dmlcompanie"]["address"]; ?> </td>
                                           <th>DATE</th> 
                                            
                                                <td><?php echo date("d-m-Y"); ?></td>
                                   
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="tbldo" colspan="2">
                            <Table class="table table-condensed">

                                <tr>
                                    <th>SELLER/SUPPLIER</th>
                                    <th>BROKER</th>
                                </tr>
                                <tr>
                                    <td><?php echo $sellerpartie["Sellerpartie"]["name"]; ?>

                                        <?php echo $sellerpartie["Sellerpartie"]["address"]; ?>

                                        <?php echo $sellerpartie["Sellerpartie"]["city"] . "," . $sellerpartie["Sellerpartie"]["state"]; ?>
                                    </td>
                                    <td><?php echo $broker["Broker"]["name"]; ?>
                                        <br>
                                        <b >BROKER REF NO.<b />
                                            <?php echo $broker["Broker"]["ref_no"]; ?>

                                    </td>
                                </tr>

                            </table>
                        </td>

                    </tr>
                    <tr>
                        <td class="tbldo" colspan="2">
                            <table class="table table-condensed">
                                <Tr>
                                    <th>MODE OF TRANSPORT</th>            
                                    <th>DELIVERY</th>
                                    <th>BROKERAGE</th>
                                </tr>
                                <Tr>
                                    <td>By Truck</td>
                                    <td><?php echo $contract["Contract"]["delivery_condition"] ?></td>
                                    <td><?php echo $contract["Contract"]["commission"] ?></td>
                                </tr>

                            </table>

                        </td>

                    </tr>


                    <tr>
                        <td class="tbldo" colspan="2">
                            <Table class="table table-condensed">
                                <Tr>
                                    <th>PAYMENT TERMS</th>            
                                    <th>ADDRESS OF DELIVERY</th>
                                </tr>
                                <Tr>
                                    <td><?php echo $contract["Contract"]["payment_condition"] ?></td>
                                    <td>As per Buyer's instructions</td>
                                </tr>
                            </table>
                        </td>

                    </tr>
                </table>

            </td>
        <tr>
            <td>
                <table class="table tcenter table-condensed">
                    <tr>
                        <th>Sr.No.</th>
                        <th>LOT NO.</th>
                        <th>PR NO.</th>
                        <th>QUANTITY(IN BALES)</th>
                        <th>PRICE</th>
                    </tr>
                    <tr>

                        <?php
                        $i = 1;
                        $tot = 0;
                        foreach ($bales as $dtRow) {
                            ?>

                        <tr>
                            <td>
                                <?php echo $i++; ?>
                            </td>
                            <td>
                                <?php echo $dtRow["balesdatas"]["lot_no"]; ?>
                            </td>
                            <td>
                                <?php echo $dtRow["balesdatas"]["pr_no"]; ?>

                            </td>
                            <td>
                                <?php
                                echo $dtRow["balesdatas"]["bales"];
                                $tot += $dtRow["balesdatas"]["bales"];
                                ?>
                            </td>
                            <td>

                            </td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <th align="right">TOTAL</th>
                        <td><?php echo $tot; ?></td>   
                        <td><?php echo $contract["Contract"]["rate"] ?></td>
                    </tr>

                </table>
            </td>
        </tr>

        <tr>
            <td>
                <table class="table table-condensed">
                    <tr>
                        <th style="width:115px;">Item</th>
                        <td><input type="text" name="txtitem" id="item"/><span id="sitem"></span></td>
                        <th style="width:82px;">Quality</th>
                        <td><input type="text" name="txtquality" id="stxtquality"/> <span id="stxtquality"></span></td>
                    </tr>
                    <tr>
                        <th>Passing Type</th>
                        <td><?php echo $passingtype["Passingtype"]["value"] ?></td>
                        <th>Passing Date</th>
                        <td><input type="text" name="txtdate" id="tdata"/> <span id="stdata"></span></td>
                    </tr>
                    <tr>
                        <th>Packing</th>
                        <td><?php echo $contract["Contract"]["packing_type"] ?></td>
                        <th>Mic</th>
                        <td><?php echo $contract["Contract"]["q_mic"] ?> </td>
                    </tr>

                    <tr>
                        <th>Sample Deduction</th>
                        <td><input type="text" name="txtsample" id="sample"/> <span id="ssample"> </span></td>
                        <th>Length</th>
                        <td><?php echo $contract["Contract"]["q_length"] ?></td>

                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="text" name="txtweighment" id="weighment"/><span id="sweighment"></span></td>
                        <th>Strength</th>
                        <td><?php echo $contract["Contract"]["q_strength"] ?></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
        <table class="table table-condensed">
            <tr>
                <th>Documents Required</th>
                <td></td>
                <th>Other Terms and Conditions</th>
            </tr>
            <tr>
                <td>1) Original Invoice <br/>
                    2) Original Weighment Slip of Loading Point <br/>
                    3) Bank details of the supplier <br/>
                </td>
                <td></td>
                <td>1) This contract is against </td>
            </tr>
            <tr>
                <td colspan="3">*** Kindly Sign & Stamp this contract for your approval and fax us the copy.</td>
            </tr>
            <tr>
                <th>Signature & Seal of Supplier</th>
                <th>Signature & Seal of Broker</th>
                <th>Signature & Seal of Buyer</th>
            </tr>
        </table>
            </td>
        </tr>
        
    </table>
</div>​