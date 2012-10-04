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
        <h2> DML Exim Pvt. Ltd. </h2>
    </div>
    <table class="tbldo" width="100%">
        <tr>
            <td class="tbldo" colspan="2">
                <table class="table table-condensed">
                    <tr>
                        <th colspan="2">DISPATCH ORDER</th>
                        
                        <th>DO NO.</th>
                        <td><?php echo $dono; ?></td>

                    </tr>
                    <tr>
                        <td>&nbsp;</td>

                        <td>&nbsp;</td>
                        <th>D.O. DATE:</th> 

                        <td><?php echo date("d-m-Y"); ?></td>

                    </tr>

                </table>
            </td>
        </tr>
        <tr>
            <td class="tbldo" colspan="2">
                <table class="table table-condensed">
                    <tr>
                        <th width="50%">TO,</th>


                        <th>DELIVERY ADDRESS:</th>
                    </tr>
                    <TR>
                        <td>
                            <?php echo $sellerpartie["Sellerpartie"]["name"]; ?>
                            <br/><?php echo $sellerpartie["Sellerpartie"]["city"] . "," . $sellerpartie["Sellerpartie"]["state"]; ?>
                            <br/>CONTACT PERSON:<?php echo $sellerpartie["Sellerpartie"]["contact_person"]; ?>
                            <br/>CONTACT DETAILS:<?php echo $this->Service->getContactDetails($sellerpartie["Sellerpartie"]["id"], "s"); ?>
                        </td>

                        <td>
                            <?php echo $dmlcompanie["Dmlcompanie"]["name"]; ?>
                            <br/><?php echo $dmlcompanie["Dmlcompanie"]["address"]; ?>
                            <br/>CONTACT PERSON:<?php echo $dmlcompanie["Dmlcompanie"]["contact_person"]; ?>
                            <br/>CONTACT DETAILS:<?php echo $condtl; ?>
                        </td>
                    </TR>
                </table>
            </td>    
        </tr>
        <tr>
            <td class="tbldo" colspan="2">
                <table class="table table-condensed">
                    <Tr>
                        <th width="50%">TRANSPORTER:</th>            

                        <th>BROKER:</th>
                    </tr>
                    <Tr>

                        <td>
                            <?php echo $transporter["Transporter"]["name"]; ?>
                            <br/>CONTACT DETAILS:<?php echo $this->Service->getContactDetails($transporter["Transporter"]["id"], "t"); ?>
                        </td>
                        <td>
                            <?php echo $broker["Broker"]["name"]; ?>
                            <br/>CONTACT PERSON:<?php echo $broker["Broker"]["contact_person"]; ?>
                            <br/>CONTACT DETAILS:<?php echo $this->Service->getContactDetails($broker["Broker"]["id"], "b"); ?>
                        </td>
                    </tr>

                </table>

            </td>

        </tr>
        <tr>
            <td colspan="2">
                <table class="table tcenter table-condensed">
                    <tr>
                        <th>SR.NO.</th>
                        <th>DESCRIPTION</th>
                        <th>LOT NO.</th>
                        <th>PR.NO.</th>
                        <th>NO. OF BALES</th>
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
                                INDIAN RAW COTTON S-6

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
                        </tr>
                    <?php } ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>TOTAL:</td>
                        <td><?php echo $tot; ?></td>
                    </tr>


                </table>
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <table class="table table-condensed">
                    <tr>
                        <th width="50%">Terms and Conditions:</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>
                            <table class="table table-condensed">
                                <tr>
                                    <td>S.T.Tin No.:</td>
                                    <td><?php echo $dmlcompanie["Dmlcompanie"]["st_tin_no"]; ?></td>
                                    <td>Date:</td>
                                    <td><?php echo $dmlcompanie["Dmlcompanie"]["st_date"]; ?></td>
                                </tr>
                                <tr>
                                    <td>C.S.T.Tin No.:</td>
                                    <td><?php echo $dmlcompanie["Dmlcompanie"]["cst_tin_no"]; ?></td>
                                    <td>Date:</td>
                                    <td><?php echo $dmlcompanie["Dmlcompanie"]["cst_date"]; ?></td>
                                </tr>
                            </table>
                        </td>
                        <td>
                            <table class="table table-condensed">
                                <tr>
                                    <td>
                                        1) Double Weighbridge is must.
                                        <br/>
                                        2) Please send bill fax copy after loading or email at Nirav@dmlakhani.com

                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
            
                        <td colspan="2">
                <table>
                <tr>
                       <th>INVOICE AGAINST:</th>
                        <td><?php echo $salesagainst["Salesagainst"]["value"]; ?>
                            
                        </td>
                        </tr>
                </table>
                
                
            </td>
            
                    
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <table>
                <tr>
            <th style="vertical-align: text-top">AUTHORIZED BY:</th>
            <td>td
                OFFICE ADDRESS:
                <br/>
                902/903 Embassy Tower,<br/>
                Opp Jubilee Garden, Jawahar Road,<br/>
                Rajkot-1, Gujarat, India<br/>
                Tel: 0281-2222991/2/3 &nbsp; Direct: 0281-2237645<br/>
                Fax: 0281-2229643/2230505
            </td>        
                </tr>
                </table>
                
                
            </td>
            
        </tr>


    </table>
</div>