<H1>Warehouse Details </h1>
<a class="btn btn-primary" href="viewwarehouse"> View All </a>
<a class="btn btn-primary" href="warehouse"> Add New </a>
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

<form  action="addWarehouse" method="post"  >
<?php if(isset($data)) { ?>
    <input type="Hidden" name="data[Warehouse][id]" value="<?php echo $data["Warehouse"]["id"]; ?>" />
 <?php } ?>


    <table border="0">
            
            <tr>
                <td>Name:</td>
                <td><input type="text" name="data[Warehouse][name]" value="<?php if(isset($data))  echo $data["Warehouse"]["name"]; ?>" /></td>
            </tr>
            <tr>
                <td>Address:</td>
                    <td><textarea name="data[Warehouse][address]" cols="30" > <?php if(isset($data))  echo $data["Warehouse"]["address"]; ?></textarea></td>
            </tr>
            <tr>
                <td>City:</td>
                <td><input type="text" name="data[Warehouse][city]" value="<?php if(isset($data))  echo $data["Warehouse"]["city"]; ?>" /></td>
            </tr>
            <tr>
                <td>State:</td>
                <td><input type="text" name="data[Warehouse][state]" value="<?php if(isset($data))  echo $data["Warehouse"]["state"]; ?>" /></td>
            </tr>
<?php if(!isset($data)){ ?>
            <tr>
                <td>Mobile:</td>
                <td><input type="text" name="txtmobile"></td>
            </tr>
            <tr>
                <td>Landline:</td>
                <td><input type="text" name="txtlandline"></td>
            </tr>
            <tr>
                <td>Fax:</td>
                <td><input type="text" name="txtfax"></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="text" name="txtemail"></td>
            </tr>
<?php } ?>
            <tr>
                <td></td>
                
                <td align="left"><input type="submit" name="btnsubmit" class="btn btn-inverse" value="<?php if(isset($data)){ echo 'Update';} else {echo 'Insert';} ?>" ></td>
            </tr>
        </table>
    </form>
<?php if(isset($data)){ ?>
<table class="table">
<tr>

<th>
Type
</th>
<th>
Value
</th>
<th>
Working?
</th>
<th>

    </th>
</tr>
<?php if(isset($keyval)){ ?>
<?php foreach($keyval as $kRow){ ?>
<tr>
<td>
<?php 
if($kRow["Keyvalue"]["key"]=="e"){
echo "Email";
} else if($kRow["Keyvalue"]["key"]=="m"){
echo "Mobile";
} else if($kRow["Keyvalue"]["key"]=="l"){
echo "Landline";
} else if($kRow["Keyvalue"]["key"]=="f"){
echo "Fax";
} else{
    echo "Other";
}

?>

</td>
<td>
<?php echo $kRow["Keyvalue"]["value"] ; ?>
</td>
<td>
<?php if($kRow["Keyvalue"]["flag"]) {
    echo "Not";
} else {
echo "Yes";
}?>

</td>
<td>
<a href="warehouse?id=<?php echo $data["Warehouse"]["id"]; ?>&q=<?php $kRow["Keyvalue"]["id"];?>" >Edit</a>
</td>


</tr>

<?php } ?>
<?php } ?>

</table>

<form action="addKeyValue" method="post">
    <table>
    <tr>
<td>
Type
</td>
<td>
<select name='data[Keyvalue][key]' >
<option value='e'> Email </option>
<option value='l'> LandLine </option>
<option value='m'> Mobile </option>
<option value='f'> Fax </option>
</select>
</td>
</tr>
<tr>
<td>
Value
</td>
<td>
<input type="Text" name="data[Keyvalue][value]" />

</td>
</tr>
<tr>
<td>

</td>
<td>
<input type="Hidden" name="data[Keyvalue][refid]" value="<?php echo $data["Warehouse"]["id"]; ?>" />
<input type="Hidden" name="data[Keyvalue][type]" value="w" />

<input type="Submit" value="Insert" />
</td>
</tr>
</table>


</form>

<?php } ?>



