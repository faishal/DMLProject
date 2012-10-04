<H1>Bales Detail </h1>
<a class="btn btn-primary" href="balesdata?id=<?php echo $_GET["id"]; ?>"> Add New </a>
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

$(document).ready(function()
	{
             new Tablesort(document.getElementById('myTable'));
	
	}
);
</script>
<table id="myTable" class="table table-bordered table-condensed table-striped">
    <tr>
        <th>
            
        </th>
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
            Purchase Order
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

    <?php 
    $blData= array();
    foreach ($data as $dtRow) {
        ?>
        <tr>
            <td>
            <a href="/admin/warehousestock?id=<?php echo $dtRow["b"]["id"]; ?>" target="_blank" > Stock </a>
        </td>
            <td>
                <?php echo $dtRow["b"]["id"]; ?>
            </td>
            <td>
                <?php
                if ( isset($dtRow["b"]["do_no"]) && $dtRow["b"]["do_no"]!="") {
                    echo $dtRow["b"]["do_no"];
                    if(isset($blData["d".$dtRow["b"]["do_no"]])){
                        $blData["d".$dtRow["b"]["do_no"]][1].= "," . $dtRow["b"]["id"];
                        
                    }else{
                        $blData["d".$dtRow["b"]["do_no"]][1]=$dtRow["b"]["id"];
                        $blData["d".$dtRow["b"]["do_no"]][0]= $dtRow["b"]["do_no"];
                    }
                } else {
                    ?>
                    <input class="dono" type="checkbox"  value="<?php echo $dtRow["b"]["id"]; ?>" />
                    <?php
                }
                ?>

            </td>
            <td>
    <?php echo $dtRow["b"]["do_date"]; ?>

            </td>
            <td>
        <input class="pono" type="checkbox"  value="<?php echo $dtRow["b"]["id"]; ?>" />

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
            <td>
                <a href="balesdata?id=<?php echo $_GET["id"]; ?>&q=<?php echo $dtRow["b"]["id"]; ?>" > Edit </a>
            </td>
        </tr>

    <?php }
    ?>
    <tr>
        <th>
            
        </th>
        <th>

        </th>
        <th>
            <input type="button" value="Genrate DO" class="btn btn-warning" id="gdono"/>
        </th>
        <th>
            
        </th>
        
        <th>
                <input type="button" value="Genrate PO" class="btn btn-info" id="gpono"/>
        </th>
        
        <th>
            
        </th>
        <th>
            
        </th>
        <th>
            
        </th>
        <th>
            
        </th>
        <th>
            
        </th>
        <th>
            
        </th>
        <th>
            
        </th>
        <th>
            
        </th>
        <th>
            
        </th>
        <th>
            
        </th>
        <th>
            
        </th>
        <th>
            
        </th>
        <th>
            
        </th>
        <th>
            
        </th>
        <th>
            
        </th>
        <th>
            
        </th>
        <th>
            
        </th>
        <th>
            
        </th>
        <th>
            
        </th>
        <th>
            
        </th>
        <th>
            
        </th>
        <th>
            
        </th>
        <th>
            
        </th>
        <th>
            
        </th>
        <th>
            
        </th>
        <th>
            
        </th>
        <th>

        </th>
    </tr>
</table>
<table class="table" width="400">
   <tr>
       <td> </td>
        <th> DO_NO</th>
        <th> </th>
        <th> </th>
     </tr>
<?php 
   
foreach ($blData as $bl){
    ?>
    <tr>
        <td> </td>
        <td> <?php echo $bl[0]; ?>  </td>
        <td> <a href="dispatchorder?s=<?php echo $bl[0]; ?>&id=<?php echo $bl[1]; ?>" class="btn btn-primary" > Print</a> </td>
        <td> <a href="viewbalesdata?id=<?php echo $_GET["id"] ?>&d=<?php echo $bl[0]; ?>" class="btn btn-warning" > Cancel</a></td>
        
    </tr>
    <?php
}

?>
</table>

<script>
    
    $("#gdono").click(function(){
        var urlS="";
        var sep="";
        $("input:checked").each(function(){ 
            if(this.className==="dono"){
                urlS += sep + this.value;
                sep= ","
            }
  
        })   
        if(urlS===""){
            alert("Please Select atleast 1 Bales to Genrate DO")
        }else {
            var r=confirm("Are you sure you want to genrate do for bales ids : " + urlS);
            if (r==true){
            window.location = "/admin/dispatchorder?id=" + urlS
            }
                
            
        }

    });
    $("#gpono").click(function(){
        var urlS="";
        var sep="";
        $("input:checked").each(function(){ 
            if(this.className==="pono"){
                urlS += sep + this.value;
                sep= ","
            }
  
        })   
        if(urlS===""){
            alert("Please Select atleast 1 Bales to Genrate PO")
        }else {
            var r=confirm("Are you sure you want to genrate PO for bales ids : " + urlS);
            if (r==true){
                window.location = "/admin/purchasecontract?id=" + urlS
            
            
            }
                
            
        }

    });
    
</script>

