<H1>Contract Details </h1>
<a class="btn btn-primary" href="viewContract"> View All </a>
<a class="btn btn-primary" href="Contract"> Add New </a>
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
        <a class="btn btn-primary" href="balesdata?id=<?php echo $data['Contract']['id']; ?>"> Add New Bales </a>
        <a class="btn btn-primary" href="viewbalesdata?id=<?php echo $data['Contract']['id']; ?>"> View Bales </a>
        <?php
    }
    ?>
        
<form action="addcontract" method="post" onsubmit="convertdata()">
    <?php
    if (isset($data)) {
        ?>
        <input type="hidden" value="<?php echo $data['Contract']['id']; ?>" name="data[Contract][id]" />
        <?php
    }
    ?>
    <Table>
        <tr>
            <td>

                <table border="0">
                    <tr>
                        <td>Broker Reference No.:</td>
                        <td>
                            <input type="text" name="data[Contract][b_ref_no]" value="<?php
                                if (isset($data)) {
                                    echo $data["Contract"]["b_ref_no"];
                                }
                                ?>">
                        </td>
                    </tr>
                    <Script>
                    

                    function changeBname(objx){
                        document.getElementById('billname').value=$.trim($("#bsd option[value='"+objx.value +"']").text());
                        

                    }
                    </script>
                    <tr>
                        <td>Broker Name:</td>
                        <td>
                            <select  name="data[Contract][broker_id]" >
                                <?php foreach ($broker as $dtrow) { ?>
                                    <option value= "<?php echo $dtrow['Broker']['id']; ?>"  <?php
                                if (isset($data)) {
                                    if ($data["Contract"]["broker_id"] == $dtrow['Broker']['id'])
                                        echo " Selected";
                                }
                                    ?> > 
                                                <?php echo $dtrow['Broker']['name'] . " ," . $dtrow['Broker']['city']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Contract Date:</td>
                        <td><input type="text" name="data[Contract][contract_date]" class="dt" value="<?php
                                if (isset($data)) {
                                    echo $data["Contract"]["contract_date"];
                                }
                                ?>" ></td>    
                    </tr>
                    <tr>
                        <td>Seller Party Name:</td>
                        <td>
                            <select id="bsd" name="data[Contract][sellerparty_id]" onchange="changeBname(this);">
                              
                                <?php foreach ($seller as $dtrow) { ?>
                                    <option value= "<?php echo $dtrow['Sellerpartie']['id']; ?>"  <?php
                                if (isset($data)) {
                                    if ($data["Contract"]["sellerparty_id"] == $dtrow['Sellerpartie']['id'])
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
                        <td>Bank Name:</td>
                        <td><input type="text" name="data[Contract][bank]" value="<?php
                                if (isset($data)) {
                                    echo $data["Contract"]["bank"];
                                }
                                ?>"></td>    
                    </tr>
                    <tr>
                        <td>Account No.:</td>
                        <td><input type="text" name="data[Contract][account_no]" value="<?php
                                   if (isset($data)) {
                                       echo $data["Contract"]["account_no"];
                                   }
                                ?>"></td>    
                    </tr>
                    <tr>
                        <td>RTGS No.:</td>
                        <td><input type="text" name="data[Contract][rtgs_no]" value="<?php
                                   if (isset($data)) {
                                       echo $data["Contract"]["rtgs_no"];
                                   }
                                ?>"></td>    
                    </tr>
                    <tr>
                        <td>Buyer Party Name:</td>
                        <td>
                            <select name="data[Contract][dmlcompany_id]">
                                <?php foreach ($dmlcompany as $dtrow) { ?>
                                    <option value= "<?php echo $dtrow['Dmlcompanie']['id']; ?>" <?php
                                if (isset($data)) {
                                    if ($data["Contract"]["dmlcompany_id"] == $dtrow['Dmlcompanie']['id'])
                                        echo " Selected";
                                }
                                    ?>> 
                                                <?php echo $dtrow['Dmlcompanie']['name'] . " ," . $dtrow['Dmlcompanie']['city']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Variety of Crop:</td>
                        <td><input type="text" name="data[Contract][crop_variety]" value="<?php
                                if (isset($data)) {
                                    echo $data["Contract"]["crop_variety"];
                                }
                                ?>"></td>    
                    </tr>
                    <tr>
                        <td>Quantity (bales):</td>
                        <td><input type="text" name="data[Contract][quantity]" value="<?php
                                   if (isset($data)) {
                                       echo $data["Contract"]["quantity"];
                                   }
                                ?>"></td>    
                    </tr>
                    <tr>
                        <td>Rate:</td>
                        <td><input type="text" name="data[Contract][rate]" value="<?php
                                   if (isset($data)) {
                                       echo $data["Contract"]["rate"];
                                   }
                                ?>"></td>    
                    </tr>
                </table>
            </td>
            <Td width="50">
                &nbsp;
            </td>
            <td>
                <table>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Sales Against:</td>
                        <td>
                            <select name="data[Contract][salesagainst_id]">
                                <?php foreach ($salesagainst as $dtrow) { ?>
                                    <option value= "<?php echo $dtrow['Salesagainst']['id']; ?>"  <?php
                                if (isset($data)) {
                                    if ($data["Contract"]["sellerparty_id"] == $dtrow['Sellerpartie']['id'])
                                        echo " Selected";
                                }
                                    ?>> 
                                                <?php echo $dtrow['Salesagainst']['value']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Passing Type:</td>
                        <td>
                            <select name="data[Contract][passingtype_id]">
                                <?php foreach ($passingtype as $dtrow) { ?>
                                    <option value= " <?php echo $dtrow['Passingtype']['id']; ?>"  <?php
                                if (isset($data)) {
                                    if ($data["Contract"]["passingtype_id"] == $dtrow['Passingtype']['id'])
                                        echo " Selected";
                                }
                                    ?>> 
                                                <?php echo $dtrow['Passingtype']['value']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Payment Condition:</td>
                        <td><input type="text" name="data[Contract][payment_condition]" value="<?php
                                if (isset($data)) {
                                    echo $data["Contract"]["payment_condition"];
                                }
                                ?>"></td>    
                    </tr>
                    <tr>
                        <td>Billing Name:</td>
                        <td><input type="text" id="billname" name="data[Contract][billing_name]" value="<?php
                                   if (isset($data)) {
                                       echo $data["Contract"]["billing_name"];
                                   }
                                ?>"></td>    
                    </tr>
                    <tr>
                        <td>Delivery Condition:</td>
                        <td><input type="text" name="data[Contract][delivery_condition]" value="<?php
                                   if (isset($data)) {
                                       echo $data["Contract"]["delivery_condition"];
                                   }
                                ?>"></td>    
                    </tr>
                    <tr>
                        <td>Delivery From:</td>
                        <td>
                            <select name="data[Contract][deliveryfrom_id]">
                                <?php foreach ($seller as $dtrow) { ?>
                                    <option value= "<?php echo $dtrow['Sellerpartie']['id']; ?>"  <?php
                                if (isset($data)) {
                                    if ($data["Contract"]["deliveryfrom_id"] == $dtrow['Sellerpartie']['id'])
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
                        <td>Commission:</td>
                        <td><input type="text" name="data[Contract][commission]" value="<?php
                                if (isset($data)) {
                                    echo $data["Contract"]["commission"];
                                }
                                ?>"></td>    
                    </tr>
                    <tr>
                        <td>Contract Type:</td>
                        <td>
                            <select name="data[Contract][contracttype_id]">
                                <?php foreach ($contracttype as $dtrow) { ?>
                                    <option value= " <?php echo $dtrow['Contracttype']['id']; ?>"   <?php
                                if (isset($data)) {
                                    if ($data["Contract"]["contracttype_id"] == $dtrow['Contracttype']['id'])
                                        echo " Selected";
                                }
                                    ?>> 
                                                <?php echo $dtrow['Contracttype']['value']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Packing Type:</td>
                        <td><input type="text" name="data[Contract][packing_type]" value="<?php
                                if (isset($data)) {
                                    echo $data["Contract"]["packing_type"];
                                }
                                ?>"></td>    
                    </tr>
                    <tr>
                        <td>Remarks:</td>
                        <td><textarea name="data[Contract][remarks]"><?php
                                   if (isset($data)) {
                                       echo $data["Contract"]["remarks"];
                                   }
                                ?></textarea></td>    
                    </tr>
                    
                    
                </table>
            </td>
        </tr>
    </table>

    <hr/> 
    <h3>QUALITY</h3>
    <hr/>
    <table>
        <tr>
            <td>Mic:</td>
            <td><input type="text" name="data[Contract][q_mic]" value="<?php
                                if (isset($data)) {
                                    echo $data["Contract"]["q_mic"];
                                }
                                ?>"></td>    
        </tr>
        <tr>
            <td>Length:</td>
            <td><input type="text" name="data[Contract][q_length]" value="<?php
                       if (isset($data)) {
                           echo $data["Contract"]["q_length"];
                       }
                                ?>"></td>    
        </tr>
        <tr>
            <td>Strength:</td>
            <td><input type="text" name="data[Contract][q_strength]"value="<?php
                       if (isset($data)) {
                           echo $data["Contract"]["q_strength"];
                       }
                                ?>"></td>    
        </tr>
        <tr>
            <td>Quality Remarks:</td>
            <td><textarea name="data[Contract][q_remarks]" value=""><?php
                       if (isset($data)) {
                           echo $data["Contract"]["q_remarks"];
                       }
                                ?></textarea></td>    
        </tr>
    </table>
    <hr/> 

    <hr/>
    <table>
        <tr>
            <td>NOTE:</td>
            <td><textarea name="data[Contract][note]" ><?php
                    if (isset($data)) {
                        echo $data["Contract"]["note"];
                    }
                                ?></textarea></td>    
        </tr>
        <tr>
            <td>Contract Status:</td>
            <td>
                <select name="data[Contract][status_id]">
                    <?php foreach ($contractstatus as $dtrow) { ?>
                        <option value= " <?php echo $dtrow['Contractstatu']['id']; ?> "  <?php
                    if (isset($data)) {
                        if ($data["Contract"]["status_id"] == $dtrow['Contractstatu']['id'])
                            echo " Selected";
                    }
                        ?>> 
                                    <?php echo $dtrow['Contractstatu']['value']; ?>
                        </option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td align="left"><input id="submit" type="submit" name="btnsubmit" class="btn btn-inverse" value="<?php
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

<Script>

document.getElementById('billname').value='<?php if($seller[0]){
                                    echo $seller[0]['Sellerpartie']['name'];
                                } ?>'
</script>