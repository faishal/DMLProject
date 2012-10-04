<?php
$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link href="/assets/css/bootstrap.css" rel="stylesheet">
        <link href="/assets/css/datepicker.css" rel="stylesheet">
        <link rel="stylesheet" href="/assets/css/blue/style.css" type="text/css" media="print, projection, screen" />
	
        
        <style type="text/css">

/*tablesort specific styling*/
th.sort-header {
  background:#eee;
  background:-webkit-gradient(linear, left top, left bottom, from(#f6f6f6), to(#eee));
  background:-moz-linear-gradient(top, #f6f6f6, #eee);
  text-shadow:0 1px 0 #fff;
  cursor:pointer;
  }
th.sort-header::-moz-selection,
th.sort-header::selection {
  background:transparent;
  }
table th.sort-header:after {
  content:'';
  float:right;
  margin-top:7px;
  border-width:4px 4px 0;
  border-style:solid;
  border-color:#404040 transparent;
  visibility:hidden;
  }
table th.sort-header:hover:after {
  visibility:visible;
  }
table th.sort-up:after,
table th.sort-down:after,
table th.sort-down:hover:after {
  visibility:visible;
  opacity:0.4;
  }
table th.sort-up:after {
  border-width:0 4px 4px;
  }

        </style>
        <link href="/assets/css/bootstrap-responsive.css" rel="stylesheet">
        <script src="/assets/js/jquery.js"></script>
        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->


    </head>

    <body>

        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#">DML Group of Companies</a>
                    <div class="nav-collapse">
                        <ul class="nav">
                           <!--
                            <li class="active"><a href="/">Home</a></li>
                            -->
                            <li class="dropdown">
                                <a href="#"
                                   class="dropdown-toggle"
                                   data-toggle="dropdown">
                                    Broker
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="/admin/broker" > Add Broker </a>
                                    </li>
                                    <li>
                                        <a href="/admin/viewbroker" > View Broker </a>
                                    </li>
                                   

                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#"
                                   class="dropdown-toggle"
                                   data-toggle="dropdown">
                                    Company
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="/admin/dmlcompanie" > Add Company </a>
                                    </li>
                                    <li>
                                        <a href="/admin/viewdmlcompanie" > View Companies </a>
                                    </li>
                                   

                                </ul>
                            </li>
                            
                            <li class="dropdown">
                                <a href="#"
                                   class="dropdown-toggle"
                                   data-toggle="dropdown">
                                    Warehouse
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="/admin/addwarehouse" > Add Warehouse </a>
                                    </li>
                                    <li>
                                        <a href="/admin/viewwarehouse" > View Warehouse </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#"
                                   class="dropdown-toggle"
                                   data-toggle="dropdown">
                                    Transporter
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="/admin/addtransporter" > Add Transporter </a>
                                    </li>
                                    <li>
                                        <a href="/admin/viewtransporter" > View Transporter </a>
                                    </li>
                                </ul>
                            </li>
                                   

                                
                            <li class="dropdown">
                                <a href="#"
                                   class="dropdown-toggle"
                                   data-toggle="dropdown">
                                    Sellerparty
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="/admin/sellerpartie" > Add Sellerparty </a>
                                    </li>
                                    <li>
                                        <a href="/admin/viewsellerpartie" > View Sellerparties </a>
                                    </li>
                                   

                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#"
                                   class="dropdown-toggle"
                                   data-toggle="dropdown">
                                    Contract
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="/admin/contract" > Add Contract </a>
                                    </li>
                                    <li>
                                        <a href="/admin/viewContract" > View Contract </a>
                                    </li>
                                   
                                    <li>
                                        <a href="/admin/searchcontract" > Search Contract </a>
                                    </li>

                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#"
                                   class="dropdown-toggle"
                                   data-toggle="dropdown">
                                    Export Contract
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="/admin/exportcontract" > Add Export Contract </a>
                                    </li>
                                    <li>
                                        <a href="/admin/viewexportcontract" > View Export Contract </a>
                                    </li>
                                   

                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#"
                                   class="dropdown-toggle"
                                   data-toggle="dropdown">
                                    Reports
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="/admin/stockmic" > Mic Stock </a>
                                    </li>
                                    <li>
                                        <a href="/admin/stockreport" > Stock Report </a>
                                    </li>
                                   <li>
                                        <a href="/admin/dailyreport" > Daily Report </a>
                                    </li>

                                </ul>
                            </li>
                        </ul>
                        <ul class="nav pull-right">
                            <li>
                                <a href="#">
                                    <?php
                                    if ($this->Session->read('Auth.User')) {
                                        $t = $this->Session->read('Auth.User');
                                        echo strtoupper($t["username"]);
                                    }
                                    ?></a>
                            </li> 
                            <li class="divider-vertical"></li>
                            <li>
                                <?php if ($this->Session->read('Auth.User')) { ?>

                                    <a href="/users/logout">Logout</a>
                                <?php } else { ?>
                                    <a href="/users/login">Login</a>
                                <?php } ?>

                            </li>


                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

        <div id="alertHolder"> </div>
        <script>

            bootstrap_alert = function() {}
            bootstrap_alert.warning = function(message) {
                $('#alertHolder').html('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><span>'+message+'</span></div>')
            }
<?php
$tst = $this->Session->flash();
if ($tst) {

    echo "bootstrap_alert.warning('$tst')";
}
?>


        </script>​

        <div class="container" style="margin-top:50px">

<?php echo $this->fetch('content'); ?>

        </div>
    </div>

    <hr>

    <footer>
        <p>&copy; Company 2012</p>
    </footer>

</div> <!-- /container -->

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<script type="text/javascript" src="/assets/js/tablesort.min.js"></script>
<script src="/assets/js/bootstrap-transition.js"></script>
<script src="/assets/js/bootstrap-alert.js"></script>
<script src="/assets/js/bootstrap-modal.js"></script>
<script src="/assets/js/bootstrap-dropdown.js"></script>
<script src="/assets/js/bootstrap-scrollspy.js"></script>
<script src="/assets/js/bootstrap-tab.js"></script>
<script src="/assets/js/bootstrap-tooltip.js"></script>
<script src="/assets/js/bootstrap-popover.js"></script>
<script src="/assets/js/bootstrap-button.js"></script>
<script src="/assets/js/bootstrap-collapse.js"></script>
<script src="/assets/js/bootstrap-carousel.js"></script>
<script src="/assets/js/bootstrap-typeahead.js"></script>
<script src="/assets/js/bootstrap-datepicker.js"></script>
<script>
     var d = new Date();
    var curr_date = d.getDate();
    var curr_month = d.getMonth() + 1; //Months are zero based
    var curr_year = d.getFullYear();
       $(document).ready(function() {
                $(".dt").each(function(){
                    if(this.value=="")
                        this.value=curr_date + "-" + curr_month + "-" + curr_year   ;
                    else {
                        var a = this.value.split("-");
                        this.value= a[2] + "-" + a[1] + "-" + a[0]        
                    } 

                })
                $(".dt").datepicker({
                    format:'dd-mm-yyyy'
                });
       });
      function convertdata(){
        $(".dt").each(function(){
            if(this.value!=""){
                var a = this.value.split("-");
                this.value= a[2] + "-" + a[1] + "-" + a[0]
            }
        });
      }


</script>

</body>
</html>


