<?php

App::uses('AppController', 'Controller');

class AdminController extends AppController {

    /**
     * Controller name
     *
     * @var string
     */
    public $name = 'Admin';
    public $uses = array('Dblog', 'Broker', 'Sellerpartie', 'Keyvalue', 'Sellerpartie', 'Contract', 'Passingtype', 'Salesagainst', 'Contracttype', 'Contractstatu', 'Warehouse', 'Transporter', 'Balesstatu', 'Dmlcompanie', 'Balesdata', 'Labreport', 'Uniqueid', 'Warehousestock', 'Exportbale', 'Exportcontract','Uploadfile');
    public $helper = array("service");

    /**
     * This controller does not use a model
     *
     * @var array
     */
    /**
     * Displays a view
     *
     * @param mixed What page to display
     * @return void
     */

    /**
     *
     * @param type $data
     * @param type $tbName 
     */
    function _entLogs($data, $tbName = NULL) {
        App::import('Model', 'Dblog');
        $dt = array();
        $dt["Dblog"]["username"] = $this->getUsername();
        $dt["Dblog"]["cdata"] = json_encode($data);
        $dt["Dblog"]["tablename"] = $tbName;
        $this->Dblog->save($dt);
    }

    function index() {
        $this->render("broker");
    }

    function addbroker() {
        App::import('Model', 'Broker');
        if (isset($_POST["data"])) {
            $data = $_POST["data"];
            $data["Broker"]["username"] = $this->getUsername();
            if ($this->Broker->save($data)) {
                $mId = $this->Broker->getLastInsertID();

                $this->_entLogs($data, "Broker");

                $keyValue = array();
                $i = 0;
                if (isset($_POST["txtmobile"])) {
                    $keyValue["Keyvalue"][$i]["id"] = NULL;
                    $keyValue["Keyvalue"][$i]["refid"] = $mId;
                    $keyValue["Keyvalue"][$i]["type"] = "b";
                    $keyValue["Keyvalue"][$i]["key"] = "m";
                    $keyValue["Keyvalue"][$i]["value"] = $_POST["txtmobile"];
                    $keyValue["Keyvalue"][$i]["username"] = $this->getUsername();
                    $i++;
                }

                if (isset($_POST["txtlandline"])) {
                    $keyValue["Keyvalue"][$i]["id"] = NULL;
                    $keyValue["Keyvalue"][$i]["refid"] = $mId;
                    $keyValue["Keyvalue"][$i]["type"] = "b";

                    $keyValue["Keyvalue"][$i]["key"] = "l";
                    $keyValue["Keyvalue"][$i]["value"] = $_POST["txtlandline"];
                    $keyValue["Keyvalue"][$i]["username"] = $this->getUsername();
                    $i++;
                }

                if (isset($_POST["txtfax"])) {
                    $keyValue["Keyvalue"][$i]["username"] = $this->getUsername();
                    $keyValue["Keyvalue"][$i]["id"] = NULL;
                    $keyValue["Keyvalue"][$i]["refid"] = $mId;
                    $keyValue["Keyvalue"][$i]["type"] = "b";

                    $keyValue["Keyvalue"][$i]["key"] = "f";
                    $keyValue["Keyvalue"][$i]["value"] = $_POST["txtfax"];
                    $i++;
                }

                if (isset($_POST["txtemail"])) {
                    $keyValue["Keyvalue"][$i]["username"] = $this->getUsername();
                    $keyValue["Keyvalue"][$i]["id"] = NULL;
                    $keyValue["Keyvalue"][$i]["refid"] = $mId;
                    $keyValue["Keyvalue"][$i]["type"] = "b";
                    $keyValue["Keyvalue"][$i]["key"] = "e";
                    $keyValue["Keyvalue"][$i]["value"] = $_POST["txtemail"];
                    $i++;
                }
                if ($i > 0) {
                    $this->Keyvalue->saveAll($keyValue["Keyvalue"]);
                    $this->_entLogs($keyValue, "Keyvalue");
                }

                $this->set("insertFlag", "Data inserted Sucessfully");
            } else {
                $this->set("insertFlag", "Data is Not Inserted");
            }
        }
        $this->render("broker");
    }

    function getUsername() {
        return $this->Session->read("Auth.User.username");
    }

    function viewBroker() {
        $this->set("data", $this->Broker->find("all"));
    }

    function broker() {

        if (isset($_GET["id"])) {
            App::import('Model', 'Broker');
            $this->set("data", $this->Broker->find("first", array("conditions" => array("id" => $_GET["id"]))));

            $this->set("keyval", $this->Keyvalue->find("all", array("conditions" => array("refid" => $_GET["id"], 'type' => 'b'))));
        }
    }

    function addwarehouse() {
        App::import('Model', 'Warehouse');
        if (isset($_POST["data"])) {
            $data = $_POST["data"];
            $data["Warehouse"]["username"] = $this->getUsername();
            if ($this->Warehouse->save($data)) {
                $this->_entLogs($data, "Warehouse");
                $mId = $this->Warehouse->getLastInsertID();
                $keyValue = array();
                $i = 0;
                if (isset($_POST["txtmobile"])) {
                    $keyValue["Keyvalue"][$i]["id"] = NULL;
                    $keyValue["Keyvalue"][$i]["refid"] = $mId;
                    $keyValue["Keyvalue"][$i]["type"] = "w";
                    $keyValue["Keyvalue"][$i]["key"] = "m";
                    $keyValue["Keyvalue"][$i]["value"] = $_POST["txtmobile"];
                    $keyValue["Keyvalue"][$i]["username"] = $this->getUsername();
                    $i++;
                }

                if (isset($_POST["txtlandline"])) {
                    $keyValue["Keyvalue"][$i]["id"] = NULL;
                    $keyValue["Keyvalue"][$i]["username"] = $this->getUsername();
                    $keyValue["Keyvalue"][$i]["refid"] = $mId;
                    $keyValue["Keyvalue"][$i]["type"] = "w";

                    $keyValue["Keyvalue"][$i]["key"] = "l";
                    $keyValue["Keyvalue"][$i]["value"] = $_POST["txtlandline"];
                    $i++;
                }

                if (isset($_POST["txtfax"])) {
                    $keyValue["Keyvalue"][$i]["id"] = NULL;
                    $keyValue["Keyvalue"][$i]["refid"] = $mId;
                    $keyValue["Keyvalue"][$i]["username"] = $this->getUsername();
                    $keyValue["Keyvalue"][$i]["type"] = "w";

                    $keyValue["Keyvalue"][$i]["key"] = "f";
                    $keyValue["Keyvalue"][$i]["value"] = $_POST["txtfax"];
                    $i++;
                }

                if (isset($_POST["txtemail"])) {
                    $keyValue["Keyvalue"][$i]["id"] = NULL;
                    $keyValue["Keyvalue"][$i]["refid"] = $mId;
                    $keyValue["Keyvalue"][$i]["username"] = $this->getUsername();
                    $keyValue["Keyvalue"][$i]["type"] = "w";
                    $keyValue["Keyvalue"][$i]["key"] = "e";
                    $keyValue["Keyvalue"][$i]["value"] = $_POST["txtemail"];
                    $i++;
                }
                if ($i > 0) {
                    $this->Keyvalue->saveAll($keyValue["Keyvalue"]);
                    $this->_entLogs($keyValue, "Keyvalue");
                }

                $this->set("insertFlag", "Data inserted Sucessfully");
            } else {
                $this->set("insertFlag", "Data is Not Inserted");
            }
        }
        $this->render("warehouse");
    }

    function viewwarehouse() {
        $this->set("data", $this->Warehouse->find("all"));
    }

    function warehouse() {

        if (isset($_GET["id"])) {
            App::import('Model', 'Warehouse');
            $this->set("data", $this->Warehouse->find("first", array("conditions" => array("id" => $_GET["id"]))));
            $this->set("keyval", $this->Keyvalue->find("all", array("conditions" => array("refid" => $_GET["id"], 'type' => 'w'))));
        }
    }

    function addKeyValue() {
        App::import('Model', 'Keyvalue');
        if (isset($_POST["data"])) {
            $data = $_POST["data"];
            $data["Keyvalue"]["username"] = $this->getUsername();
            $this->Keyvalue->save($data);
            $this->_entLogs($data, "Keyvalue");
            switch ($data["Keyvalue"]["type"]) {
                case "b":
                    $this->redirect("broker?id=" . $data["Keyvalue"]["refid"]);
                    break;
                case "s":
                    $this->redirect("sellerpartie?id=" . $data["Keyvalue"]["refid"]);
                    break;
                case "c":
                    $this->redirect("dmlcompanie?id=" . $data["Keyvalue"]["refid"]);
                    break;
                case "w":
                    $this->redirect("warehouse?id=" . $data["Keyvalue"]["refid"]);
                    break;
                case "t":
                    $this->redirect("transporter?id=" . $data["Keyvalue"]["refid"]);
                    break;
            }
        }
    }

    function addsellerpartie() {
        App::import('Model', 'Sellerpartie');
        App::import('Model', 'Keyvalue');
        if (isset($_POST["data"])) {
            $data = $_POST["data"];
            $data["Sellerpartie"]["username"] = $this->getUsername();
            if ($this->Sellerpartie->save($data)) {
                $this->_entLogs($data, "Sellerpartie");
                $mId = $this->Sellerpartie->getLastInsertID();
                $keyValue = array();
                $i = 0;
                if (isset($_POST["txtmobile"])) {
                    $keyValue["Keyvalue"][$i]["id"] = NULL;
                    $keyValue["Keyvalue"][$i]["refid"] = $mId;
                    $keyValue["Keyvalue"][$i]["type"] = "s";
                    $keyValue["Keyvalue"][$i]["key"] = "m";
                    $keyValue["Keyvalue"][$i]["value"] = $_POST["txtmobile"];
                    $keyValue["Keyvalue"][$i]["username"] = $this->getUsername();
                    $i++;
                }

                if (isset($_POST["txtlandline"])) {
                    $keyValue["Keyvalue"][$i]["id"] = NULL;
                    $keyValue["Keyvalue"][$i]["refid"] = $mId;
                    $keyValue["Keyvalue"][$i]["username"] = $this->getUsername();
                    $keyValue["Keyvalue"][$i]["type"] = "s";

                    $keyValue["Keyvalue"][$i]["key"] = "l";
                    $keyValue["Keyvalue"][$i]["value"] = $_POST["txtlandline"];
                    $i++;
                }

                if (isset($_POST["txtfax"])) {
                    $keyValue["Keyvalue"][$i]["id"] = NULL;
                    $keyValue["Keyvalue"][$i]["username"] = $this->getUsername();
                    $keyValue["Keyvalue"][$i]["refid"] = $mId;
                    $keyValue["Keyvalue"][$i]["type"] = "s";

                    $keyValue["Keyvalue"][$i]["key"] = "f";
                    $keyValue["Keyvalue"][$i]["value"] = $_POST["txtfax"];
                    $i++;
                }

                if (isset($_POST["txtemail"])) {
                    $keyValue["Keyvalue"][$i]["id"] = NULL;
                    $keyValue["Keyvalue"][$i]["refid"] = $mId;
                    $keyValue["Keyvalue"][$i]["username"] = $this->getUsername();
                    $keyValue["Keyvalue"][$i]["type"] = "s";
                    $keyValue["Keyvalue"][$i]["key"] = "e";
                    $keyValue["Keyvalue"][$i]["value"] = $_POST["txtemail"];
                    $i++;
                }
                if ($i > 0) {
                    $this->Keyvalue->saveAll($keyValue["Keyvalue"]);
                    $this->_entLogs($keyValue, "Keyvalue");
                }

                $this->set("insertFlag", "Data inserted Sucessfully");
            } else {
                $this->set("insertFlag", "Data is Not Inserted");
            }
        }
        $this->render("sellerpartie");
    }

    function sellerpartie() {
        if (isset($_GET["id"])) {
            App::import('Model', 'Sellerpartie');
            $this->set("data", $this->Sellerpartie->find("first", array("conditions" => array("id" => $_GET["id"]))));

            $this->set("keyval", $this->Keyvalue->find("all", array("conditions" => array("refid" => $_GET["id"], 'type' => 's'))));
        }
    }

    function viewsellerpartie() {
        $this->set("data", $this->Sellerpartie->find("all"));
    }

    function addtransporter() {
        App::import('Model', 'Transporter');
        App::import('Model', 'Keyvalue');
        if (isset($_POST["data"])) {
            $data = $_POST["data"];
            $data["Transporter"]["username"] = $this->getUsername();

            if ($this->Transporter->save($data)) {
                $this->_entLogs($data, "Transporter");
                $mId = $this->Transporter->getLastInsertID();
                $keyValue = array();

                $i = 0;


                if (isset($_POST["txtmobile"])) {
                    $keyValue["Keyvalue"][$i]["id"] = NULL;
                    $keyValue["Keyvalue"][$i]["refid"] = $mId;
                    $keyValue["Keyvalue"][$i]["type"] = "t";
                    $keyValue["Keyvalue"][$i]["key"] = "m";
                    $keyValue["Keyvalue"][$i]["username"] = $this->getUsername();
                    $keyValue["Keyvalue"][$i]["value"] = $_POST["txtmobile"];
                    $i++;
                }

                if (isset($_POST["txtlandline"])) {
                    $keyValue["Keyvalue"][$i]["id"] = NULL;
                    $keyValue["Keyvalue"][$i]["refid"] = $mId;
                    $keyValue["Keyvalue"][$i]["username"] = $this->getUsername();
                    $keyValue["Keyvalue"][$i]["type"] = "t";

                    $keyValue["Keyvalue"][$i]["key"] = "l";
                    $keyValue["Keyvalue"][$i]["value"] = $_POST["txtlandline"];
                    $i++;
                }

                if (isset($_POST["txtfax"])) {
                    $keyValue["Keyvalue"][$i]["id"] = NULL;
                    $keyValue["Keyvalue"][$i]["username"] = $this->getUsername();
                    $keyValue["Keyvalue"][$i]["refid"] = $mId;
                    $keyValue["Keyvalue"][$i]["type"] = "t";

                    $keyValue["Keyvalue"][$i]["key"] = "f";
                    $keyValue["Keyvalue"][$i]["value"] = $_POST["txtfax"];
                    $i++;
                }

                if (isset($_POST["txtemail"])) {
                    $keyValue["Keyvalue"][$i]["id"] = NULL;
                    $keyValue["Keyvalue"][$i]["refid"] = $mId;
                    $keyValue["Keyvalue"][$i]["username"] = $this->getUsername();
                    $keyValue["Keyvalue"][$i]["type"] = "t";
                    $keyValue["Keyvalue"][$i]["key"] = "e";
                    $keyValue["Keyvalue"][$i]["value"] = $_POST["txtemail"];
                    $i++;
                }
                if ($i > 0) {
                    $this->Keyvalue->saveAll($keyValue["Keyvalue"]);
                    $this->_entLogs($keyValue, "Keyvalue");
                }

                $this->set("insertFlag", "Data inserted Sucessfully");
            } else {
                $this->set("insertFlag", "Data is Not Inserted");
            }
        }
        $this->render("transporter");
    }

    function transporter() {
        if (isset($_GET["id"])) {
            App::import('Model', 'Transporter');
            $this->set("data", $this->Transporter->find("first", array("conditions" => array("id" => $_GET["id"]))));

            $this->set("keyval", $this->Keyvalue->find("all", array("conditions" => array("refid" => $_GET["id"], 'type' => 't'))));
        }
    }

    function viewtransporter() {
        $this->set("data", $this->Transporter->find("all"));
    }

    function adddmlcompanie() {
        App::import('Model', 'Dmlcompanie');
        if (isset($_POST["data"])) {
            $data = $_POST["data"];
            $data["Dmlcompanie"]["username"] = $this->getUsername();
            if ($this->Dmlcompanie->save($data)) {
                $this->_entLogs($data, "Dmlcompanie");
                $mId = $this->Dmlcompanie->getLastInsertID();
                $keyValue = array();

                $i = 0;


                if (isset($_POST["txtmobile"])) {
                    $keyValue["Keyvalue"][$i]["id"] = NULL;
                    $keyValue["Keyvalue"][$i]["refid"] = $mId;
                    $keyValue["Keyvalue"][$i]["type"] = "c";
                    $keyValue["Keyvalue"][$i]["key"] = "m";
                    $keyValue["Keyvalue"][$i]["value"] = $_POST["txtmobile"];
                    $i++;
                }

                if (isset($_POST["txtlandline"])) {
                    $keyValue["Keyvalue"][$i]["id"] = NULL;
                    $keyValue["Keyvalue"][$i]["refid"] = $mId;
                    $keyValue["Keyvalue"][$i]["type"] = "c";
                    $keyValue["Keyvalue"][$i]["username"] = $this->getUsername();

                    $keyValue["Keyvalue"][$i]["key"] = "l";
                    $keyValue["Keyvalue"][$i]["value"] = $_POST["txtlandline"];
                    $i++;
                }

                if (isset($_POST["txtfax"])) {
                    $keyValue["Keyvalue"][$i]["id"] = NULL;
                    $keyValue["Keyvalue"][$i]["refid"] = $mId;
                    $keyValue["Keyvalue"][$i]["type"] = "c";
                    $keyValue["Keyvalue"][$i]["username"] = $this->getUsername();
                    $keyValue["Keyvalue"][$i]["key"] = "f";
                    $keyValue["Keyvalue"][$i]["value"] = $_POST["txtfax"];
                    $i++;
                }

                if (isset($_POST["txtemail"])) {
                    $keyValue["Keyvalue"][$i]["id"] = NULL;
                    $keyValue["Keyvalue"][$i]["refid"] = $mId;
                    $keyValue["Keyvalue"][$i]["type"] = "c";
                    $keyValue["Keyvalue"][$i]["username"] = $this->getUsername();
                    $keyValue["Keyvalue"][$i]["key"] = "e";
                    $keyValue["Keyvalue"][$i]["value"] = $_POST["txtemail"];
                    $i++;
                }
                if ($i > 0) {
                    $this->Keyvalue->saveAll($keyValue["Keyvalue"]);
                    $this->_entLogs($keyValue, "Keyvalue");
                }


                $this->set("insertFlag", "Data inserted Sucessfully");
            } else {
                $this->set("insertFlag", "Data is Not Inserted");
            }
        }
        $this->render("dmlcompanie");
    }

    function viewdmlcompanie() {
        $this->set("data", $this->Dmlcompanie->find("all"));
    }

    function dmlcompanie() {
        if (isset($_GET["id"])) {
            App::import('Model', 'Dmlcompanie');
            $this->set("data", $this->Dmlcompanie->find("first", array("conditions" => array("id" => $_GET["id"]))));

            $this->set("keyval", $this->Keyvalue->find("all", array("conditions" => array("refid" => $_GET["id"], 'type' => 'c'))));
        }
    }

    function addcontract() {
        App::import('Model', 'Contract');
        if (isset($_POST["data"])) {
            $data = $_POST["data"];
            $data["Contract"]["username"] = $this->getUsername();
            if ($this->Contract->save($data)) {
                $this->_entLogs($data, "Contract");

                $this->set("insertFlag", "Data inserted Sucessfully");
            } else {
                $this->set("insertFlag", "Data is Not Inserted");
            }
        }
        $this->set("broker", $this->Broker->find("all"));
        $this->set("seller", $this->Sellerpartie->find("all"));
        $this->set("dmlcompany", $this->Dmlcompanie->find("all"));
        $this->set("salesagainst", $this->Salesagainst->find("all"));
        $this->set("passingtype", $this->Passingtype->find("all"));
        $this->set("contracttype", $this->Contracttype->find("all"));
        $this->set("contractstatus", $this->Contractstatu->find("all"));
        $this->render("contract");
    }

    function contract() {
        $this->set("broker", $this->Broker->find("all"));
        $this->set("seller", $this->Sellerpartie->find("all"));
        $this->set("dmlcompany", $this->Dmlcompanie->find("all"));
        $this->set("salesagainst", $this->Salesagainst->find("all"));
        $this->set("passingtype", $this->Passingtype->find("all"));
        $this->set("contracttype", $this->Contracttype->find("all"));
        $this->set("contractstatus", $this->Contractstatu->find("all"));
        if (isset($_GET["id"]))
            $this->set("data", $this->Contract->find("first", array("conditions" => array("id" => $_GET["id"]))));
    }

    function addbalesdata() {
        App::import('Model', 'Balesdata');
        if (isset($_POST["data"])) {
            $data = $_POST["data"];
            $data["Balesdata"]["username"] = $this->getUsername();
            if ($this->Balesdata->save($data)) {
                $this->_entLogs($data, "Balesdata");
                $this->set("insertFlag", "Data inserted Sucessfully");
            } else {
                $this->set("insertFlag", "Data is Not Inserted");
            }
        }
        App::import('Model', 'Balesdata');
        $this->set("transporter", $this->Transporter->find("all"));
        $this->set("warehouse", $this->Warehouse->find("all"));
        $this->set("balesstatus", $this->Balesstatu->find("all"));
        $this->set("pendingbales", $this->getContractBales($_GET["id"]));
        App::import('Model', 'Contract');
        $this->set("cdata", $this->Contract->query("select c.id as 'Id', c.b_ref_no as 'brefno', b.name as 'bname',b.city as 'bcity',s.name as 'snmae',s.city as 'scity',c.contract_date,c.bank, c.account_no, c.rtgs_no, d.name as 'dname',d.city as 'dcity', c.crop_variety, c.quantity, c.rate, sa.value as 'sa', p.value as 'p', c.payment_condition, c.billing_name, c.delivery_condition,sp.name as 'spname',sp.city as 'spcity', c.commission, ct.value as 'ct', c.packing_type, c.remarks, c.q_mic, c.q_length, c.q_strength,c.q_remarks, c.note, st.value as 'st'  from contracts c,brokers b,sellerparties s ,salesagainsts sa,passingtypes p,dmlcompanies d , sellerparties sp,contracttypes ct,statustypes st  where c.broker_id = b.id  and  c.sellerparty_id=s.id and c.dmlcompany_id=d.id and sa.id=c.salesagainst_id and p.id=c.passingtype_id and sp.id=c.deliveryfrom_id and ct.id=c.contracttype_id and st.id= c.status_id and c.id='" . $_GET["id"] . "'"));
        if (isset($_GET["q"])) {
            $this->set("data", $this->Balesdata->find("first", array("conditions" => array("id" => $_GET["q"]))));
        }
        $this->render("balesdata");
    }

    function addexportbale() {
        App::import('Model', 'Exportbale');
        if (isset($_POST["data"])) {
            $data = $_POST["data"];
            $data["Exportbale"]["username"] = $this->getUsername();
            if ($this->Exportbale->save($data)) {
                $this->_entLogs($data, "Exportbale");
                $this->set("insertFlag", "Data inserted Sucessfully");
            } else {
                $this->set("insertFlag", "Data is Not Inserted");
            }
        }
        App::import('Model', 'Exportbale');
        $this->set("transporter", $this->Transporter->find("all"));
        $this->set("broker", $this->Broker->find("all"));
        $this->set("sellerpartie", $this->Sellerpartie->find("all"));
        App::import('Model', 'Exportcontract');
        $this->set("ecdata", $this->Exportcontract->query("select ec.id as 'Id', s.name as 'sname', b.name as 'bname', ec.ratepercandy, t.name as 'tname' from exportcontracts ec, sellerparties s, brokers b, transporters t where ec.sellerparty_id=s.id and ec.broker_id=b.id and ec.transporter_id=t.id and ec.id=" . $_GET["id"]));
        if (isset($_GET["q"])) {
            $this->set("data", $this->Exportbale->find("first", array("conditions" => array("id" => $_GET["q"]))));
        }
        $this->render("exportbale");
    }

    function exportbale() {
        App::import('Model', 'Exportbale');
        $this->set("transporter", $this->Transporter->find("all"));
        $this->set("broker", $this->Broker->find("all"));
        $this->set("sellerpartie", $this->Sellerpartie->find("all"));
        App::import('Model', 'Exportcontract');
        $this->set("ecdata", $this->Exportcontract->query("select ec.id as 'Id', s.name as 'sname', b.name as 'bname', ec.ratepercandy, t.name as 'tname' from exportcontracts ec, sellerparties s, brokers b, transporters t where ec.sellerparty_id=s.id and ec.broker_id=b.id and ec.transporter_id=t.id and ec.id=" . $_GET["id"]));
        if (isset($_GET["q"])) {
            $this->set("data", $this->Exportbale->find("first", array("conditions" => array("id" => $_GET["q"]))));
        }
    }

    function viewContract() {
        App::import('Model', 'Contract');
        $this->set("data", $this->Contract->query("select c.id as 'Id',c.b_ref_no as 'brefno', b.name as 'bname',b.city as 'bcity',s.name as 'snmae',s.city as 'scity',c.contract_date,c.bank, c.account_no, c.rtgs_no, d.name as 'dname',d.city as 'dcity', c.crop_variety, c.quantity, c.rate, sa.value as 'sa', p.value as 'p', c.payment_condition, c.billing_name, c.delivery_condition,sp.name as 'spname',sp.city as 'spcity', c.commission, ct.value as 'ct', c.packing_type, c.remarks, c.q_mic, c.q_length, c.q_strength,c.q_remarks, c.note, st.value as 'st'  from contracts c,brokers b,sellerparties s ,salesagainsts sa,passingtypes p,dmlcompanies d , sellerparties sp,contracttypes ct,statustypes st  where c.broker_id = b.id  and  c.sellerparty_id=s.id and c.dmlcompany_id=d.id and sa.id=c.salesagainst_id and p.id=c.passingtype_id and sp.id=c.deliveryfrom_id and ct.id=c.contracttype_id and st.id= c.status_id order by c.contract_date"));
    }

    function balesdata() {
        App::import('Model', 'Balesdata');
        $this->set("transporter", $this->Transporter->find("all"));
        $this->set("warehouse", $this->Warehouse->find("all"));
        $this->set("balesstatus", $this->Balesstatu->find("all"));
        $this->set("pendingbales", $this->getContractBales($_GET["id"]));
        App::import('Model', 'Contract');
        $this->set("cdata", $this->Contract->query("select c.id as 'Id',c.b_ref_no as 'brefno',b.name as 'bname',b.city as 'bcity',s.name as 'snmae',s.city as 'scity',c.contract_date,c.bank, c.account_no, c.rtgs_no, d.name as 'dname',d.city as 'dcity', c.crop_variety, c.quantity, c.rate, sa.value as 'sa', p.value as 'p', c.payment_condition, c.billing_name, c.delivery_condition,sp.name as 'spname',sp.city as 'spcity', c.commission, ct.value as 'ct', c.packing_type, c.remarks, c.q_mic, c.q_length, c.q_strength,c.q_remarks, c.note, st.value as 'st'  from contracts c,brokers b,sellerparties s ,salesagainsts sa,passingtypes p,dmlcompanies d , sellerparties sp,contracttypes ct,statustypes st  where c.broker_id = b.id  and  c.sellerparty_id=s.id and c.dmlcompany_id=d.id and sa.id=c.salesagainst_id and p.id=c.passingtype_id and sp.id=c.deliveryfrom_id and ct.id=c.contracttype_id and st.id= c.status_id and c.id='" . $_GET["id"] . "'"));
        if (isset($_GET["q"])) {
            $this->set("data", $this->Balesdata->find("first", array("conditions" => array("id" => $_GET["q"]))));
        }
    }

    function getContractBales($contactId) {
        $cb = $this->Contract->query("select quantity from contracts where id='$contactId'");
        $t = 0;
        if ($cb) {
            $t = $cb[0]["contracts"]["quantity"];
        }
        $cd = $this->Contract->query("select sum(bales) as sum from balesdatas where contract_id='$contactId'");
        if ($cd) {
            $t -= $cd[0][0]["sum"];
        }
        return $t;
    }

    function viewbalesdata() {
        if (isset($_GET["d"])) {
            $dtArr = split(",", $_GET["d"]);

            $tmp = $this->Balesdata->query("update balesdatas set do_no=NULL  where do_no=" . $_GET["d"] . ";");
        }

        App::import('Model', 'Balesdata');
        $this->set("data", $this->Balesdata->query("select b.id, b.contract_id, b.do_no, b.do_date, b.invoice_no, b.loading_date, b.arrival_date, t.name,t.city, b.truck_no, b.bales, b.lot_no, b.pr_no, b.gross_wt, b.tare, b.net_wt, b.container_wt,b.fright, w.name,w.city,bs.value, b.passing_date, b.sample_deduct, b.rate_kg, b.bill_amt, b.bill_date, b.party_wt1, b.party_wt2, b.weighmentslip_wt, b.shortage, b.lr_no, b.lr_date FROM balesdatas b, warehouses w, transporters t, balesstatus bs  WHERE b.contract_id='" . $_GET["id"] . "' and b.warehouse_id=w.id  and b.balesstatus_id=bs.id and b.transporter_id=t.id;"));
    }

    function viewexportbale() {
        App::import('Model', 'Exportbale');
        $this->set("data", $this->Exportbale->query("select eb.id, eb.exportcontract_id, eb.invoice_no, eb.lorry_no, eb.lr_no, eb.fright, eb.amount, eb.weight from exportbales eb where eb.exportcontract_id =" . $_GET["id"]));
    }

    function warehousestock() {
        App::import('Model', 'Warehousestock');
        $wr = $this->Warehouse->find("all");

        $this->set("warehouse", $wr);

        $stock = $this->Warehousestock->find("all", array("conditions" => array("bales_id" => $_GET["id"])));

        if ($stock) {
            foreach ($wr as $w) {
                if ($w["Warehouse"]["id"] == $stock[0]["Warehousestock"]["warehouse_id"]) {
                    $this->set("wrName", $w['Warehouse']['name'] . " ," . $w['Warehouse']['city']);
                }
            }
            $this->set("stock", $stock);
        }
    }

    function addwarehousestock() {
        App::import('Model', 'Warehousestock');

        if (isset($_POST["data"])) {
            $data = $_POST["data"];
            $tmp = $this->Warehousestock->find("first", array("conditions" => array("bales_id" => $data["Warehousestock"]["bales_id"], "type" => $data["Warehousestock"]["type"])));
            if (!$tmp) {
                $this->Warehousestock->save($data);
                $this->set("insertFlag", "Data inserted Sucessfully");
            } else {
                $this->set("insertFlag", "Data insertion Failed");
            }
        }
        $wr = $this->Warehouse->find("all");

        $this->set("warehouse", $wr);

        $stock = $this->Warehousestock->find("all", array("conditions" => array("bales_id" => $_GET["id"])));

        if ($stock) {
            foreach ($wr as $w) {
                if ($w["Warehouse"]["id"] == $stock[0]["Warehousestock"]["warehouse_id"]) {
                    $this->set("wrName", $w['Warehouse']['name'] . " ," . $w['Warehouse']['city']);
                }
            }
            $this->set("stock", $stock);
        }
        $this->render("warehousestock");
    }

    function viewwarehousestock() {
        
    }

    function addexportcontract() {
        App::import('Model', 'Exportcontract');

        if (isset($_POST["data"])) {
            $data = $_POST["data"];
            $data["Exportcontract"]["username"] = $this->getUsername();
            if ($this->Exportcontract->save($data)) {
                $this->_entLogs($data, "Exportcontract");

                $this->set("insertFlag", "Data inserted Sucessfully");
            } else {
                $this->set("insertFlag", "Data is Not Inserted");
            }
        }

        $this->set("transporter", $this->Transporter->find("all"));
        $this->set("broker", $this->Broker->find("all"));
        $this->set("seller", $this->Sellerpartie->find("all"));
        $this->render("exportcontract");
    }

    function exportcontract() {
        App::import('Model', 'Exportcontract');
        $this->set("transporter", $this->Transporter->find("all"));
        $this->set("broker", $this->Broker->find("all"));
        $this->set("seller", $this->Sellerpartie->find("all"));
        if (isset($_GET["id"]))
            $this->set("data", $this->Exportcontract->find("first", array("conditions" => array("id" => $_GET["id"]))));
    }

    function viewExportcontract() {
        App::import('Model', 'Exportcontract');
        $this->set("data", $this->Exportcontract->query("select ec.id as 'Id', s.name as 'sname', s.city as 'scity', b.name as 'bname', b.city as 'bcity', ec.ratepercandy, t.name as 'tname', t.city as 'tcity' from exportcontracts ec, sellerparties s, brokers b, transporters t where ec.sellerparty_id=s.id and ec.broker_id=b.id and ec.transporter_id=t.id"));
    }

    function purchasecontract() {
        App::import('Model', 'Balesdata');
        App::import('Model', 'Transporter');
        App::import('Model', 'Contract');
        App::import('Model', 'Dmlcompanie');
        App::import('Model', 'Sellerpartie');
        App::import('Model', 'Salesagainst');
        App::import('Model', 'Warehouse');
        App::import('Model', 'Broker');



        $poId = $this->_getUid();
        $this->set("pono", $this->_getUid());

        $dtArr = split(",", $_GET["id"]);

        //update 

        $bales = $this->Balesdata->query("select * from balesdatas where id in (" . $_GET["id"] . ")");
        $this->set("bales", $bales);

        $this->set("transporter", $this->Transporter->find("first", array("conditions" => array("id" => $bales[0]["balesdatas"]["transporter_id"]))));

        $contract = $this->Contract->find("first", array("conditions" => array("id" => $bales[0]["balesdatas"]["contract_id"])));
        $this->set("contract", $contract);

        $this->set("dmlcompanie", $this->Dmlcompanie->find("first", array("conditions" => array("id" => $contract["Contract"]["dmlcompany_id"]))));
        $this->set("condtl", $this->getContactDetails($contract["Contract"]["dmlcompany_id"]));
        $this->set("sellerpartie", $this->Sellerpartie->find("first", array("conditions" => array("id" => $contract["Contract"]["sellerparty_id"]))));
        $this->set("salesagainst", $this->Salesagainst->find("first", array("conditions" => array("id" => $contract["Contract"]["salesagainst_id"]))));
        $this->set("warehouse", $this->Warehouse->find("first", array("conditions" => array("id" => $bales[0]["balesdatas"]["warehouse_id"]))));
        $this->set("broker", $this->Broker->find("first", array("conditions" => array("id" => $contract["Contract"]["broker_id"]))));
        $this->set("passingtype", $this->Passingtype->find("first", array("conditions" => array("id" => $contract["Contract"]["passingtype_id"]))));
    }

    function arrival() {
        
    }

    function dispatchorder() {

        App::import('Model', 'Balesdata');
        App::import('Model', 'Transporter');
        App::import('Model', 'Contract');
        App::import('Model', 'Dmlcompanie');
        App::import('Model', 'Sellerpartie');
        App::import('Model', 'Salesagainst');
        App::import('Model', 'Warehouse');
        App::import('Model', 'Broker');



        $dtArr = split(",", $_GET["id"]);
        if (!isset($_GET["s"])) {
            $doId = $this->_getUid();
            $this->set("dono", $doId);
            foreach ($dtArr as $dt) {

                $tmp = $this->Balesdata->query("update balesdatas set do_no='" . $doId . "',do_date=now()  where id in (" . $_GET["id"] . ") and (do_no is NULL or do_no = '')");
                if ($tmp)
                    $this->_incUid();
            }
        }else {
            $this->set("dono", $_GET["s"]);
        }
        //update 

        $bales = $this->Balesdata->query("select * from balesdatas where id in (" . $_GET["id"] . ")");
        $this->set("bales", $bales);

        $this->set("transporter", $this->Transporter->find("first", array("conditions" => array("id" => $bales[0]["balesdatas"]["transporter_id"]))));

        $contract = $this->Contract->find("first", array("conditions" => array("id" => $bales[0]["balesdatas"]["contract_id"])));
        $this->set("contract", $contract);

        $this->set("dmlcompanie", $this->Dmlcompanie->find("first", array("conditions" => array("id" => $contract["Contract"]["dmlcompany_id"]))));
        $this->set("condtl", $this->getContactDetails($contract["Contract"]["dmlcompany_id"]));
        $this->set("sellerpartie", $this->Sellerpartie->find("first", array("conditions" => array("id" => $contract["Contract"]["sellerparty_id"]))));
        $this->set("salesagainst", $this->Salesagainst->find("first", array("conditions" => array("id" => $contract["Contract"]["salesagainst_id"]))));
        $this->set("warehouse", $this->Warehouse->find("first", array("conditions" => array("id" => $bales[0]["balesdatas"]["warehouse_id"]))));
        $this->set("broker", $this->Broker->find("first", array("conditions" => array("id" => $contract["Contract"]["broker_id"]))));
    }

    /**
     *     * 
     * @param type $id
     * @param type $type 
     *  c for dmlcompanies
     */
    function getContactDetails($id, $type = "c", $email = false) {
        App::import('Model', 'Keyvalue');
        $dt = $this->Keyvalue->find("all", array("conditions" => array("type" => $type, "refid" => $id)));

        $mob = "";
        $lnd = "";
        $fax = "";
        $eml = "";

        foreach ($dt as $dtRow) {
            switch ($dtRow["Keyvalue"]["key"]) {
                case "m" :
                    if ($mob != "")
                        $mob.=",";
                    $mob .= $dtRow["Keyvalue"]["value"] . "(M)";
                    break;
                case "e" :
                    if ($eml != "")
                        $eml.=",";
                    $eml .= $dtRow["Keyvalue"]["value"];
                    break;
                case "l" :
                    if ($lnd != "")
                        $lnd.=",";
                    $lnd .= $dtRow["Keyvalue"]["value"] . "(L)";
                    break;
                case "f" :
                    if ($fax != "")
                        $fax.=",";
                    $fax .= $dtRow["Keyvalue"]["value"] . "(F)";
                    break;
            }
        }
        return $mob . "," . $lnd . "," . $fax;
    }

//
//    function purchasecontract() {
//        $id = $_GET["id"];
//        App::import('Model', 'Contract');
//        $this->set("contract", $this->Contract->find("first", array("conditions" => array("id" => $id))));
//    }

    function dailyreport() {
        App::import('Model', 'Balesdata');

        if (isset($_GET["q"]))
            $q = "'" . $_GET["q"] . "'";
        else
            $q = "CURDATE()";

        $this->set("tbales", $this->Balesdata->query("select sum(bales) as bales from balesdatas where datediff(enttime," . $q . ")=0 "));

        $this->set("sbales", $this->Balesdata->query("select sum(bales) as bales from balesdatas"));
        $this->set("aamnt", $this->Balesdata->query("select avg(rate_kg) as bales from balesdatas"));
        $this->set("balestatus", $this->Balesdata->query("select s.value as title,count(b.bales)  as count from balesstatus s left outer join balesdatas b on s.id=b.balesstatus_id group by s.value"));

        $this->set("stockData", $this->Balesdata->query("select distinct v.city, ( select sum(bales) from balesdatas  where id in (select  bales_id from warehousestocks b where  b.warehouse_id in (select id from warehouses  where city=v.city) and type='c' and datediff(enttime," . $q . ") < 0  )) as oc ,( select sum(bales) from balesdatas  where id in (select  bales_id from warehousestocks b where  b.warehouse_id in (select id from warehouses  where city=v.city) and type='d' and datediff(enttime," . $q . ") < 0 )) as od, ( select sum(bales) from balesdatas  where id in (select  bales_id from warehousestocks b where  b.warehouse_id in (select id from warehouses  where city=v.city) and type='c' and datediff(enttime," . $q . ") =0  )) as tc,( select sum(bales) from balesdatas  where id in (select  bales_id from warehousestocks b where  b.warehouse_id in (select id from warehouses  where city=v.city) and type='d' and datediff(enttime," . $q . ") =0 ))  as td from warehouses v"));
    }

    function addlabreport() {
        App::import('Model', 'Labreport');
        $data = $_POST["data"];
        $data["Labreport"]["username"] = $this->getUsername();

        if ($this->Labreport->save($data)) {
            $this->_entLogs($data, "Labreport");
            $this->set("insertFlag", "Data inserted Sucessfully");
        } else {
            $this->set("insertFlag", "Data is Not Inserted");
        }
        $this->set("bdata", $this->Balesdata->query("select b.id, b.contract_id, b.do_no, b.do_date, b.invoice_no, b.loading_date, b.arrival_date, t.name,t.city, b.truck_no, b.bales, b.lot_no, b.pr_no, b.gross_wt, b.tare, b.net_wt, b.container_wt,b.fright, w.name,w.city,bs.value, b.passing_date, b.sample_deduct, b.rate_kg, b.bill_amt, b.bill_date, b.party_wt1, b.party_wt2, b.weighmentslip_wt, b.shortage, b.lr_no, b.lr_date FROM balesdatas b, warehouses w, transporters t, balesstatus bs  WHERE b.id='" . $_GET["q"] . "' and b.warehouse_id=w.id  and b.balesstatus_id=bs.id and b.transporter_id=t.id;"));

        $this->render("labreport");
    }

    function labreport() {
        App::import('Model', 'Labreport');
        App::import('Model', 'Balesdata');
        $this->set("bdata", $this->Balesdata->query("select b.id, b.contract_id, b.do_no, b.do_date, b.invoice_no, b.loading_date, b.arrival_date, t.name,t.city, b.truck_no, b.bales, b.lot_no, b.pr_no, b.gross_wt, b.tare, b.net_wt, b.container_wt,b.fright, w.name,w.city,bs.value, b.passing_date, b.sample_deduct, b.rate_kg, b.bill_amt, b.bill_date, b.party_wt1, b.party_wt2, b.weighmentslip_wt, b.shortage, b.lr_no, b.lr_date FROM balesdatas b, warehouses w, transporters t, balesstatus bs  WHERE b.id='" . $_GET["q"] . "' and b.warehouse_id=w.id  and b.balesstatus_id=bs.id and b.transporter_id=t.id;"));
        if (isset($_GET["r"])) {
            $this->set("data", $this->Labreport->find("first", array("conditions" => array("id" => $_GET["r"]))));
        }
    }

    function viewlabreport() {
        App::import('Model', 'Labreport');


        if ($_FILES && $_FILES['photo']['name']) {
            //if no errors...
            $valid_file = true;
            if (!$_FILES['photo']['error']) {
                //now is the time to modify the future file name and validate the file

                $new_file_name = strtolower($_FILES['photo']['tmp_name']); //rename file



                $new_file_name = "labrepor_" . $_POST["labrid"] . "_" . substr($_FILES['photo']['name'], strpos($_FILES['photo']['name'], "."));

                if ($_FILES['photo']['size'] > (1024000)) { //can't be larger than 1 MB
                    $valid_file = false;
                    $message = 'Oops!  Your file\'s size is to large.';
                }

                //if the file has passed the test
                if ($valid_file) {
                    //move it to where we want it to be
                    move_uploaded_file($_FILES['photo']['tmp_name'], WWW_ROOT . 'upload/labreport/' . $new_file_name);
                    $dtRow = $this->Labreport->find("first", array("conditions" => array("id" => $_POST["labrid"])));
                    $dtRow["Labreport"]["downlink"] = '/upload/labreport/' . $new_file_name;
                    $this->Labreport->save($dtRow);
                    $message = 'Congratulations!  Your file was accepted.';
                }
            }
            //if there is an error...
            else {
                //set that to be the returned message
                $message = 'Ooops!  Your upload triggered the following error:  ' . $_FILES['photo']['error'];
            }
            $this->Session->setFlash($message);
        }
        $this->set("data", $this->Balesdata->query("SELECT l.id, l.bales_id,l.downlink,l.mic, l.length, l.strength, l.cg, l.testreport_no, l.testreport_date, l.note FROM labreports l WHERE l.bales_id = '" . $_GET["q"] . "'"));
    }

    /**
     *
     * @param type $type
     * @return type 
     */
    function _getUid($type = "do") {
        App::import('Model', 'Uniqueid');
        $dt = $this->Uniqueid->find("first", array("conditions" => array("type" => $type)));
        return $dt["Uniqueid"]["value"];
    }

    /**
     *
     * @param type $type 
     */
    function _incUid($type = "do") {
        App::import('Model', 'Uniqueid');
        $dt = $this->Uniqueid->find("first", array("conditions" => array("type" => $type)));
        $dt["Uniqueid"]["value"]+= 1;
        $this->Uniqueid->save($dt);
    }

    function searchcontract() {
        $this->set("broker", $this->Broker->find("all"));
        $this->set("seller", $this->Sellerpartie->find("all"));
        $this->set("dmlcompany", $this->Dmlcompanie->find("all"));
        $this->set("salesagainst", $this->Salesagainst->find("all"));
        $this->set("passingtype", $this->Passingtype->find("all"));
        $this->set("contracttype", $this->Contracttype->find("all"));
        $this->set("contractstatus", $this->Contractstatu->find("all"));

        if (isset($_POST["data"])) {
            $data = $_POST["data"];
            $sep = " where ";
            $str = "select id from contracts ";
            if (isset($data["Contract"]["sellerparty_id"]) && $data["Contract"]["sellerparty_id"] > 0) {
                $str .= $sep . " sellerparty_id=" . $data["Contract"]["sellerparty_id"];
                $sep = " and ";
            }

            if (isset($data["Contract"]["broker_id"]) && $data["Contract"]["broker_id"] > 0) {
                $str .= $sep . " broker_id=" . $data["Contract"]["broker_id"];
                $sep = " and ";
            }

            if (isset($data["Contract"]["dmlcompany_id"]) && $data["Contract"]["dmlcompany_id"] > 0) {
                $str .= $sep . " dmlcompany_id=" . $data["Contract"]["dmlcompany_id"];
                $sep = " and ";
            }

            if (isset($data["Contract"]["salesagainst_id"]) && $data["Contract"]["salesagainst_id"] > 0) {
                $str .= $sep . " salesagainst_id=" . $data["Contract"]["salesagainst_id"];
                $sep = " and ";
            }

            if (isset($data["Contract"]["passingtype_id"]) && $data["Contract"]["passingtype_id"] > 0) {
                $str .= $sep . " passingtype_id=" . $data["Contract"]["passingtype_id"];
                $sep = " and ";
            }

            if (isset($data["Contract"]["deliveryfrom_id"]) && $data["Contract"]["deliveryfrom_id"] > 0) {
                $str .= $sep . " deliveryfrom_id=" . $data["Contract"]["deliveryfrom_id"];
                $sep = " and ";
            }

            if (isset($data["Contract"]["contracttype_id"]) && $data["Contract"]["contracttype_id"] > 0) {
                $str .= $sep . " contracttype_id=" . $data["Contract"]["contracttype_id"];
                $sep = " and ";
            }

            if (isset($data["Contract"]["status_id"]) && $data["Contract"]["status_id"] > 0) {
                $str .= $sep . " status_id=" . $data["Contract"]["status_id"];
                $sep = " and ";
            }
            if ($data["Contract"]["dtchecked"] != "n") {
                $str .= $sep . " contract_date between '" . $data["Contract"]["fcontract_date"] . "' and '" . $data["Contract"]["tcontract_date"] . "'";
                $sep = " and ";
            }

            if (isset($data["Contract"]["fq_mic"]) and $data["Contract"]["fq_mic"] > 0) {
                if (isset($data["Contract"]["tq_mic"]) and $data["Contract"]["tq_mic"] != "")
                    $str .= $sep . " q_mic between '" . $data["Contract"]["fq_mic"] . "' and '" . $data["Contract"]["tq_mic"] . "'";
                else
                    $str .= $sep . " q_mic='" . $data["Contract"]["fq_mic"] . "' ";
                $sep = " and ";
            }
            if (isset($data["Contract"]["fq_length"]) and $data["Contract"]["fq_length"] > 0) {
                if (isset($data["Contract"]["tq_length"]) and $data["Contract"]["tq_length"] != "")
                    $str .= $sep . " q_length between '" . $data["Contract"]["fq_length"] . "' and '" . $data["Contract"]["tq_length"] . "'";
                else
                    $str .= $sep . " q_length='" . $data["Contract"]["fq_length"] . "' ";
                $sep = " and ";
            }
            if (isset($data["Contract"]["fq_strength"]) and $data["Contract"]["fq_strength"] > 0) {
                if (isset($data["Contract"]["tq_strength"]) and $data["Contract"]["tq_strength"] != "")
                    $str .= $sep . " q_strength between '" . $data["Contract"]["fq_strength"] . "' and '" . $data["Contract"]["tq_strength"] . "'";
                else
                    $str .= $sep . " q_strength='" . $data["Contract"]["fq_strength"] . "' ";
                $sep = " and ";
            }
            $this->set("cdata", $this->Contract->query("select c.id as 'Id', c.b_ref_no as 'brefno', b.name as 'bname',b.city as 'bcity',s.name as 'snmae',s.city as 'scity',c.contract_date,c.bank, c.account_no, c.rtgs_no, d.name as 'dname',d.city as 'dcity', c.crop_variety, c.quantity, c.rate, sa.value as 'sa', p.value as 'p', c.payment_condition, c.billing_name, c.delivery_condition,sp.name as 'spname',sp.city as 'spcity', c.commission, ct.value as 'ct', c.packing_type, c.remarks, c.q_mic, c.q_length, c.q_strength,c.q_remarks, c.note, st.value as 'st'  from contracts c,brokers b,sellerparties s ,salesagainsts sa,passingtypes p,dmlcompanies d , sellerparties sp,contracttypes ct,statustypes st  where c.broker_id = b.id  and  c.sellerparty_id=s.id and c.dmlcompany_id=d.id and sa.id=c.salesagainst_id and p.id=c.passingtype_id and sp.id=c.deliveryfrom_id and ct.id=c.contracttype_id and st.id= c.status_id and c.id in (" . $str . ")"));
        }
    }

    function stockreport() {
        $wr = $this->Warehouse->find("all");
        $this->set("warehouse", $wr);
        $this->set("dmlcompany", $this->Dmlcompanie->find("all"));

        if (isset($_POST["data"])) {
            $data = $_POST["data"];
            $sep = " where ";
            $str = "select a.*,(select contract_id from balesdatas where id=a.bales_id) as cid,(select bales from balesdatas where id=a.bales_id) as bales,(select mic from labreports where bales_id=a.bales_id limit 1) as mic from warehousestocks a ";

            if (isset($data["Contract"]["warehouse_id"]) && $data["Contract"]["warehouse_id"] > 0) {
                $str .= $sep . " warehouse_id=" . $data["Contract"]["warehouse_id"];
                $sep = " and ";
            }

            $openingstock = 0;
            if ($data["Contract"]["dtchecked"] != "n") {
                $str .= $sep . " date_time between '" . $data["Contract"]["fcontract_date"] . "' and '" . $data["Contract"]["tcontract_date"] . "'";
                $sep = " and ";

                $tmp = $this->Balesdata->query("select sum(bales) as s from balesdatas  where id in (select  bales_id from warehousestocks b where  b.warehouse_id =" . $data["Contract"]["warehouse_id"] . " and type='c' and datediff(date_time,'" . $data["Contract"]["fcontract_date"] . "') < 0 )");
                $tmp2 = $this->Balesdata->query("select sum(bales) as s from balesdatas  where id in (select  bales_id from warehousestocks b where  b.warehouse_id =" . $data["Contract"]["warehouse_id"] . " and type='d' and datediff(date_time,'" . $data["Contract"]["fcontract_date"] . "') < 0 )");

                if ($tmp[0][0]["s"])
                    $openingstock += $tmp[0][0]["s"];
                if ($tmp2[0][0]["s"])
                    $openingstock -= $tmp2[0][0]["s"];
            }
            $this->set("openingstock", $openingstock);
            $str .= " order by date_time";
            $this->set("cdata", $this->Contract->query($str));
        }
    }

    function stockmic() {

        if (isset($_POST["data"])) {
            $data = $_POST["data"];
            if (isset($data["Contract"]["fq_mic"]) and $data["Contract"]["fq_mic"] > 0) {
                if (isset($data["Contract"]["tq_mic"]) and $data["Contract"]["tq_mic"] != "")
                    $str =" mic between '" . $data["Contract"]["fq_mic"] . "' and '" . $data["Contract"]["tq_mic"] . "'";
                else
                    $str = " mic='" . $data["Contract"]["fq_mic"] . "' ";
                
            }    
            
            
            
           $str= "select a.*,(SELECT CONCAT(name,',',state) FROM `warehouses` WHERE `id`=a.warehouse_id) as w,(select contract_id from balesdatas where id=a.bales_id) as cid,(select bales from balesdatas where id=a.bales_id) as bales,(select mic from labreports where bales_id=a.bales_id limit 1) as mic from warehousestocks a where a.bales_id in (select bales_id from labreports where ".$str." and bales_id in( SELECT bales_id FROM `warehousestocks` WHERE type='c' and bales_id not in (SELECT bales_id FROM `warehousestocks` WHERE type='d')))";
           $this->set("cdata", $this->Contract->query($str));
        }
    }
    function uploadfiles(){
        App::import('Model', 'Uploadfile');       
        if ($_FILES && $_FILES['photo']['name']) {
            //if no errors...
            $valid_file = true;
            if (!$_FILES['photo']['error']) {
                //now is the time to modify the future file name and validate the file

                $new_file_name = strtolower($_FILES['photo']['tmp_name']); //rename file
                $new_file_name = "balesdata_c_". $_GET["id"]."_". $_GET["q"] . "_".$this->rand_string(8). substr($_FILES['photo']['name'], strpos($_FILES['photo']['name'], "."));
                if ($_FILES['photo']['size'] > (1024000)) { //can't be larger than 1 MB
                    $valid_file = false;
                    $message = 'Oops!  Your file\'s size is to large.';
                }

                //if the file has passed the test
                if ($valid_file) {
                    //move it to where we want it to be
                    move_uploaded_file($_FILES['photo']['tmp_name'], WWW_ROOT . 'upload/labreport/' . $new_file_name);
                    
                    $data=$_POST["data"];
                    $data["Uploadfile"]["bales_id"]= $_GET["q"];
                    $data["Uploadfile"]["downlink"] = '/upload/labreport/' . $new_file_name;
                    $this->Uploadfile->save($data);
                    $message = 'Congratulations!  Your file was accepted.';
                }
            }
            //if there is an error...
            else {
                //set that to be the returned message
                $message = 'Ooops!  Your upload triggered the following error:  ' . $_FILES['photo']['error'];
            }
            $this->Session->setFlash($message);
            
            
        }
        
        $this->set("cdata",$this->Uploadfile->find("all",array("conditions"=>array("bales_id"=>$_GET['q']))));

    }
    function rand_string( $length ) {
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";	

	$size = strlen( $chars );
	for( $i = 0; $i < $length; $i++ ) {
		$str .= $chars[ rand( 0, $size - 1 ) ];
	}

	return $str;
}
    
}
//ALTER TABLE  `warehousestocks` CHANGE  `enttime`  `enttime` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP