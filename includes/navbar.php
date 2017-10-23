<?php
require_once(__DIR__ . '../../includes/ADL_PDO_CON.php');
require_once(__DIR__ . '../../includes/adl_features.php');

if (isset($fferror)) {
    if ($fferror == '1') {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    }
}

$LOGOUT_ACTION = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS);
$FEATURE = filter_input(INPUT_GET, 'FEATURE', FILTER_SANITIZE_SPECIAL_CHARS);

if (isset($LOGOUT_ACTION) && $LOGOUT_ACTION == "log_out") {
	$page_protect->log_out();
}

if(isset($hello_name)) {

$cnquery = $pdo->prepare("select company_name from company_details limit 1");
$cnquery->execute()or die(print_r($query->errorInfo(), true));
$companydetailsq = $cnquery->fetch(PDO::FETCH_ASSOC);

$companynamere = $companydetailsq['company_name'];

?>
<style>
    .dropdown-menu li:hover .sub-menu {
    visibility: visible;
    }
    .dropdown:hover .dropdown-menu {
    display: block;
    }
</style>

    <nav role="navigation" class="navbar navbar-default">
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="/index.php" class="navbar-brand"> ADL</a>
        </div>
        
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/CRMmain.php"><i class="fa fa-home">  Home</i></a></li>
                <li><a href="/AddClient.php"><i class="fa fa-user-plus">  Add</i></a></li>
                <li><a href="/SearchClients.php"><i class="fa fa-search">  Search</i></a></li>

                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">CRM <b class="caret"></b></a>
                    <ul role="menu" class="dropdown-menu">
                        <li><a href="<?php if(in_array($hello_name, $Level_3_Access, true)) { echo "/AddClient.php"; } else { echo "#"; } ?>">Add Complaint</a></li>
                        <li><a href="/<?php if(in_array($hello_name, $Level_3_Access, true)) { echo "SearchClients.php"; } else { echo "#"; } ?>">Search Complaints</a></li>
                        <li class="divider"></li>                           
                        <li><a <?php if ($ffcompliance == '0') { echo "class='btn-warning'"; } else { } ?> href="<?php if ($ffcompliance == '1' && in_array($hello_name, $Level_3_Access, true)) { echo '/compliance/dash.php?EXECUTE=1'; } else { echo '/CRMmain.php?FEATURE=COMPLIANCE'; } ?>"> Compliance Dash <?php if ($ffcompliance == '0') { echo '(not enabled)'; }?></a></li>     
                    <li class="divider"></li>
                    <li><a href="<?php if(in_array($hello_name, $Level_1_Access, true)) { echo '/messenger/Main.php'; } else { echo '/CRMmain.php?FEATURE=MESSENGER'; } ?>"> Internal Messages</a></li>     

                    </ul>
                </li>

                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">Audits <b class="caret"></b></a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="/audits/main_menu.php">Main Menu</a></li>
                            <li class="divider"></li>
                            <li><a <?php if ($ffaudits == '0') { echo "class='btn-warning'"; } else { } ?> href="<?php if ($ffaudits == '1' && in_array($hello_name, $Level_3_Access, true)) { echo '/audits/lead_gen_reports.php?step=New'; } else { echo '#'; } ?>">Lead Audits <?php if ($ffaudits == '0') { echo "(not enabled)"; } ?></a></li>
                            <li><a <?php if ($ffaudits == '0') { echo "class='btn-warning'"; } else { } ?> href="<?php if ($ffaudits == '1' && in_array($hello_name, $Level_3_Access, true) || in_array($hello_name, $COM_MANAGER_ACCESS, true) || in_array($hello_name, $COM_LVL_10_ACCESS, true)) {  echo '/audits/auditor_menu.php'; } else { echo '#'; } ?>">Legal and General Audits <?php if ($ffaudits == '0') { echo "(not enabled)"; } ?></a></li>
                            <li><a <?php if ($ffaudits == '0') { echo "class='btn-warning'"; } else { } ?> href="<?php if ($ffaudits == '1' && in_array($hello_name, $Level_3_Access, true)) {  echo '/audits/RoyalLondon/Menu.php'; } else { echo '#'; } ?>">Royal London Audits <?php if ($ffaudits == '0') { echo "(not enabled)"; } ?></a></li>
                            <li><a <?php if ($ffaudits == '0') { echo "class='btn-warning'"; } else { } ?> href="<?php if ($ffaudits == '1' && in_array($hello_name, $Level_3_Access, true)) {  echo '/audits/Aviva/Menu.php'; } else { echo '#'; } ?>">Aviva Audits <?php if ($ffaudits == '0') { echo "(not enabled)"; } ?></a></li>
                            <li><a <?php if ($ffaudits == '0') { echo "class='btn-warning'"; } else { } ?> href="<?php if ($ffaudits == '1' && in_array($hello_name, $Level_3_Access, true)) {  echo '/audits/WOL/Menu.php'; } else { echo '#'; } ?>">One Family Audits <?php if ($ffaudits == '0') { echo "(not enabled)"; } ?></a></li>
                            <li class="divider"></li>
                            <li><a <?php if ($ffaudits == '0') { echo "class='btn-warning'"; } else { } ?> href="<?php if ($ffaudits == '1' && in_array($hello_name, $Level_3_Access, true)) {  echo '/audits/reports_main.php'; } else { echo '#'; } ?>">Reports <?php if ($ffaudits == '0') { echo "(not enabled)"; } ?></a></li>
                        </ul>
                    </li>
             
     

                    <li class='dropdown'>
                        <a data-toggle='dropdown' class='dropdown-toggle' href='#'>Admin <b class='caret'></b></a>
                        <ul role='menu' class='dropdown-menu'>
                                <li><a <?php if ($ffemployee == '0') { echo "class='btn-warning'"; } else { } ?> href="<?php if ($ffemployee == '1' && in_array($hello_name, $Level_9_Access, true) || in_array($hello_name, $COM_MANAGER_ACCESS, true)) { echo '/Staff/Main_Menu.php'; } else { echo '/CRMmain.php?FEATURE=EMPLOYEE'; } ?>">Staff Database <?php if ($ffemployee == '0') { echo "(not enabled)"; } ?></a></li> 
                               
                                 <li class="divider"></li>
                            
                            <?php if ($hello_name == 'Michael') { ?>
                                
                             <li><a href='/admin/Admindash.php?admindash=y'>Control Panel</a></li>
                            <?php } ?>
                        </ul>  
                    </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/CRMmain.php?action=log_out"><i class="fa fa-sign-out"></i> Logout</a></li>
            </ul>

<?php if(in_array($hello_name, $Level_1_Access, true)) { ?>
                <div class="LIVERESULTS">

                </div>
<?php } ?>
        </div>
    </nav>

<?php if(in_array($hello_name, $Level_1_Access, true)) { ?>
    <script>
        function refresh_div() {
            jQuery.ajax({
                url: '/php/NavbarLiveResults.php',
                type: 'POST',
                success: function (results) {
                    jQuery(".LIVERESULTS").html(results);
                }
            });
        }

        t = setInterval(refresh_div, 1000);
    </script>
<?php } 

        if (isset($FEATURE)) { ?>
    <div class="container">
           <?php if ($FEATURE== 'DEALSHEETS') { ?>
        <div class='notice notice-info' role='alert'><strong><h2>Dealsheets Integration</h2></strong>
            <br>
            <li>Integrate your dealsheet into ADL.</li>
            <li>Search previously submitted dealsheets.</li>
            <li>Set search criteria.</li>
            <li>Dealsheet's can be vetted before being put onto ADL (Agent -> Closer -> Quality Control -> ADL).</li>
            <li>With the data inputted it can be uploaded to ADL with a click of a button.</li>
        </div>
              
        <?php } ?>
           <?php if ($FEATURE== 'EMPLOYEE') { ?>
        <div class='notice notice-info' role='alert'><strong><h2>Employee database</h2></strong>
            <br>
            <li>Manage your employees via ADL.</li>
            <li>Upload their files/documents on a secure server.</li>
            <li>Holiday management - Have a clear overview of who is off, when and why.</li>
            <li>Each employee has their own employee profile (employee overview).</li>
            <li>Anyone with the correct access can check on any employee.</li>
            <li>Employee register - Mark someone down as AWOL, sick, on holiday, in work etc.. .</li>
        </div>
              
        <?php } ?> 
           <?php if ($FEATURE== 'ASSETS') { ?>
        <div class='notice notice-info' role='alert'><strong><h2>Asset Management</h2></strong>
            <br>
            <li>Maintain an inventory of all company assets (computers, office supplies etc...).</li>
            <li>Help control inventory of stock levels.</li>
            <li>Check why particular hardware is failing (common faults).</li>
            <li>Assign hardware (headsets) to employees.</li>
            <li>Track how much you are spending per week/month/year on a product.</li>
        </div>
              
        <?php } ?>    
           <?php if ($FEATURE== 'DIALER') { ?>
        <div class='notice notice-info' role='alert'><strong><h2>Dialer Integration</h2></strong>
            <br>
            <li>Integrate ADL into your dialer (Bluetelecoms, Connex etc...).</li>
            <li>Easier call recordings search.</li>
            <li>Customised wallboards.</li>
            <li>Customised reports can be created.</li>
        </div>
              
        <?php } ?>        
           <?php if ($FEATURE== 'TRACKERS') { ?>
        <div class='notice notice-info' role='alert'><strong><h2>Trackers</h2></strong>
            <br>
            <li>Closers can fill in an ADL tracker (client name, lead gen name, result of call (sale, no quote etc..).</li>
            <li>Get a clear overview day by day of agent and closer performance.</li>
            <li>Search employee performance by date or by date and Closer/Lead gen.</li>
            <li>Trackers can be viewed on a wall board.</li>
        </div>
              
        <?php } ?>
           <?php if ($FEATURE== 'KEYFACTSEMAIL') { ?>
        <div class='notice notice-info' role='alert'><strong><h2>Keyfacts Email</h2></strong>
            <br>
            <li>Send your Keyfacts email via ADL.</li>
            <li>Easily track who is sending or who is not sending the Keyfacts email.</li>
            <li>A note will be added to a clients profile (if they are already on ADL).</li>
            <li>Track failed/bounced emails.</li>
            <li>Get read receipts.</li>
        </div>
              
        <?php } ?>            
           <?php if ($FEATURE== 'SMS') { ?>
        <div class='notice notice-info' role='alert'><strong><h2>SMS Integration</h2></strong>
            <br>
            <li>Send SMS messages from ADL (templates or free text).</li>
            <li>Get delivery status reports (failed/sent/delivered).</li>
            <li>A note will be added to the clients timeline when a message fails or is delivered successfully.</li>
            <li>Clients can text back. Notes will be added to the clients timeline.</li>
            <li>An alert will appear on ADL when a message has been received from a client.</li>
            <li>A customised message can be played if a client attempts to ring the SMS number.</li>
            <li>ADL ensures that your SMS messaging service complies with the Telephone Consumer Protection Act (TCPA).</li>
        </div>
              
        <?php } ?>  
           <?php if ($FEATURE== 'FINANCIALS') { ?>
        <div class='notice notice-info' role='alert'><strong><h2>Financials</h2></strong>
            <br>
            <li>ADL can give projected earning across a date range (Gross, net etc..).</li>
            <li>Upload RAW COMMs directly to ADL to search through data.</li>
            <li>Create customised criteria to search through data.</li>
            <li>Identify missing policy numbers.</li>
            <li>Identify policies that you have not been paid on.</li>
            <li>Identify policy statuses.</li>
            <li>Display financials statistics from RAW COMM uploads.</li>
            <li>Compare the RAW COMMS with what should of been paid.</li>
        </div>
              
        <?php } ?>      
           <?php if ($FEATURE== 'EWS') { ?>
        <div class='notice notice-info' role='alert'><strong><h2>Early Warning System (EWS)</h2></strong>
            <br>
            <li>Upload EWS directly to ADL to search through data.</li>
            <li>Assign EWS warnings to employee's to deal with.</li>
            <li>Build up a complete history from the EWS data.</li>
            <li>EWS warning will link directly to the client profile.</li>
            <li>ADL will provide a good overview of the EWS data and can be further customised.</li>
        </div>
              
        <?php } ?>         
    </div> 
 <?php }
?>
    
    
<?php } ?>