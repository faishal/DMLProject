<H1>DML Company Details </h1>
<a class="btn btn-primary" href="viewdmlcompanie"> View All </a>
<a class="btn btn-primary" href="dmlcompanie"> Add New </a>
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

<form action="adddmlcompanie" method="post" >

<?php if(isset($data)) { ?>
    <input type="Hidden" name="data[Dmlcompanie][id]" value="<?php echo $data["Dmlcompanie"]["id"]; ?>" />
 <?php } ?>

    <table border="0">
            <tr>
                <td>Name:</td>
                <td><input type="text" name="data[Dmlcompanie][name]" value="<?php if(isset($data)) echo $data["Dmlcompanie"]["name"]; ?>" /></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td><textarea name="data[Dmlcompanie][address]" cols="30" ><?php if(isset($data))  echo $data["Dmlcompanie"]["address"]; ?></textarea></td>
            </tr>
            <tr>
                <td>City:</td>
                <td><input type="text" name="data[Dmlcompanie][city]" value="<?php if(isset($data))  echo $data["Dmlcompanie"]["city"]; ?>" /></td>
            </tr>
            <tr>
                <td>State:</td>
                <td><input type="text" name="data[Dmlcompanie][state]" value="<?php if(isset($data))  echo $data["Dmlcompanie"]["state"]; ?>" /></td>
            </tr>
            <tr>
                <td>CST Tin No.:</td>
                <td><input type="text" name="data[Dmlcompanie][cst_tin_no]" value="<?php if(isset($data))  echo $data["Dmlcompanie"]["cst_tin_no"]; ?>" /></td>
            </tr>
            <tr>
                <td>CST Date:</td>
                <td><input type="text" class="dt" name="data[Dmlcompanie][cst_date]" value="<?php if(isset($data))  echo $data["Dmlcompanie"]["cst_date"]; ?>" /></td>
            </tr>
            <tr>
                <td>ST/MVAT Tin No.:</td>
                <td><input type="text" name="data[Dmlcompanie][st_tin_no]" value="<?php if(isset($data))  echo $data["Dmlcompanie"]["st_tin_no"]; ?>" /></td>
            </tr>
            <tr>
                <td>ST/MVAT Date:</td>
                <td><input type="text" class="dt" name="data[Dmlcompanie][st_date]" value="<?php if(isset($data))  echo $data["Dmlcompanie"]["st_date"]; ?>" /></td>
            </tr>
<?php if(!isset($data)){ ?>
            <tr>
                <td>Mobile:</td>
                <td><input type="text" name="txtmobile"/></td>
            </tr>
            <tr>
                <td>Landline:</td>
                <td><input type="text" name="txtlandline"/></td>
            </tr>
            <tr>
                <td>Fax:</td>
                <td><input type="text" name="txtfax"/></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="text" name="txtemail"/></td>
            </tr>
<?php } ?>
            <tr>
                <td>Contact Person:</td>
                <td><input type="text" name="data[Dmlcompanie][contact_person]" value="<?php if(isset($data))  echo $data["Dmlcompanie"]["contact_person"]; ?>" /></td>
            </tr>
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
<a href="dmlcompanie?id=<?php echo $data["Dmlcompanie"]["id"]; ?>&q=<?php $kRow["Keyvalue"]["id"];?>" >Edit</a>
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
<input type="Hidden" name="data[Keyvalue][refid]" value="<?php echo $data["Dmlcompanie"]["id"]; ?>" />
<input type="Hidden" name="data[Keyvalue][type]" value="c" />

<input type="Submit" value="Insert" />
</td>
</tr>
</table>


</form>

<?php } ?>



