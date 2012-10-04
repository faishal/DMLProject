<?php
/* /app/views/helpers/link.php (using other helpers) */
class ServiceHelper extends AppHelper {
 var $helpers = array('Html');
 function getContactDetails($id, $type="c", $email=false){
       
        $this->Keyvalue =ClassRegistry::init("Keyvalue");
        $dt= $this->Keyvalue->find("all", array("conditions"=>array("type"=>$type ,"refid" => $id))); 

        $mob="";
        $lnd="";
        $fax="";
        $eml="";
        
        foreach($dt as $dtRow){
           switch($dtRow["Keyvalue"]["key"]){
               case "m" :
                   if($mob!="")
                       $mob.=",";
                   $mob .= $dtRow["Keyvalue"]["value"]."(M)";
                   break ;
               case "e" :
                   if($eml!="")
                       $eml.=",";
                   $eml .= $dtRow["Keyvalue"]["value"];
                   break ;
               case "l" :
                   if($lnd!="")
                       $lnd.=",";
                   $lnd .= $dtRow["Keyvalue"]["value"]."(L)";
                   break ;
               case "f" :
                   if($fax!="")
                       $fax.=",";
                   $fax .= $dtRow["Keyvalue"]["value"]."(F)";
                   break ;
                                     
           }
           
        } 
        echo $mob;
        if($mob!="")
            echo ",";
        echo $lnd;
        if($lnd !="")
            echo ",";
        echo $fax;
    }
    
}
?>
