<?php
if($hello_name!='Michael') {
$TIMELOCK = date('H');

if($TIMELOCK>='20' || $TIMELOCK<'08') {
   
    header('Location: ../../CRMmain.php?action=log_out');
    die;
    
}
}
require_once(__DIR__ . '../../includes/ADL_PDO_CON.php');

$cnquery = $pdo->prepare("select company_name from company_details limit 1");
$cnquery->execute()or die(print_r($query->errorInfo(), true));
$companydetailsq = $cnquery->fetch(PDO::FETCH_ASSOC);

$companynamere = $companydetailsq['company_name'];

$COM_MANAGER_ACCESS = array("Ben Sears", "Carys Riley", "Dawiez Kift", "Grant Fulcher", "Lisa Hall", "Andrew Collier");

$TRB_ACCESS = array("Tom Owen","Carys Riley");
if (in_array($hello_name, $TRB_ACCESS, true)) {
    $COMPANY_ENTITY_ID="1";
    $COMPANY_ENTITY = 'Bluestone Protect';
    $Level_10_Access = array("Michael", "Matt", "leighton", "Nick");
    $Level_9_Access = array("Michael", "Matt", "leighton", "Nick", "carys");
    $Level_8_Access = array("Michael", "Matt", "leighton", "Nick", "Abbiek", "carys", "Tina", "Heidy", "Nicola", "Mike", "Gavin");
    $Level_3_Access = array("Michael", "Matt", "leighton", "Nick", "Abbiek", "carys","Carys Riley","Jakob", "Nicola", "Tina", 'Heidy', 'Amy', "Chloe", "Audits", "Keith", "Rhiannon", "Ryan", "TEST", "Assured", "Gavin","David");
    $Level_1_Access = array("Tom Owen", "Carys Riley");
    $Task_Access = array("Michael", "Abbiek");
    $SECRET = array("Michael", "Abbiek", "carys", "Jakob", "Nicola", "Tina", 'Amy', "Chloe");
    $Agent_Access = array("111111111");
    $Closer_Access = array("James", "Hayley","Mike", "Kyle", "Sarah", "Richard", "Mike", "Corey");
    $Manager_Access = array("Richard", "Keith", "Michael", "Matt", "leighton", "Nick", "carys", "Nicola","David");
    $QA_Access = array("Abbiek", "carys", "Jakob", "Nicola", "Tina", "Amy");
}

$PFP_ACCESS = array("Dawiez Kift", "Mark Cinderby", "Matthew Pearson", "Steven Campisi");
if (in_array($hello_name, $PFP_ACCESS, true)) {
    $COMPANY_ENTITY_ID="2";
    $COMPANY_ENTITY = 'Protect Family Plans';
    $Level_10_Access = array("11111");
    $Level_9_Access = array("11111");
    $Level_8_Access = array("11111");
    $Level_3_Access = array("Dawiez Kift");
    $Level_1_Access = array("Dawiez Kift", "Mark Cinderby", "Matthew Pearson", "Steven Campisi");
    $Task_Access = array("1111111");
    $SECRET = array("1111111");
    $Agent_Access = array("111111111");
    $Closer_Access = array("11111");
    $Manager_Access = array("111111");
    $QA_Access = array("1111111");
}

$PLL_ACCESS = array("Robert Richards", "Antony Evans", "Samuel Bose", "Grant Fulcher");
if (in_array($hello_name, $PLL_ACCESS, true)) {
    $COMPANY_ENTITY_ID="3";
    $COMPANY_ENTITY = 'Protected Life Ltd';
    $Level_10_Access = array("11111");
    $Level_9_Access = array("11111");
    $Level_8_Access = array("11111");
    $Level_3_Access = array("Grant Fulcher");
    $Level_1_Access = array("Robert Richards", "Antony Evans", "Samuel Bose", "Grant Fulcher");
    $Task_Access = array("1111111");
    $SECRET = array("1111111");
    $Agent_Access = array("111111111");
    $Closer_Access = array("11111");
    $Manager_Access = array("111111");
    $QA_Access = array("1111111");
}

$WI_ACCESS = array("Mark Ives", "Matthew Page", "Daniel Ferman", "Luke Ratner", "Lisa Hall", "Ben Dearing");
if (in_array($hello_name, $WI_ACCESS, true)) {
    $COMPANY_ENTITY_ID="4";
    $COMPANY_ENTITY = 'We Insure';
    $Level_10_Access = array("11111");
    $Level_9_Access = array("11111");
    $Level_8_Access = array("11111");
    $Level_3_Access = array("Lisa Hall");
    $Level_1_Access = array("Mark Ives", "Matthew Page", "Daniel Ferman", "Luke Ratner", "Lisa Hall", "Ben Dearing");
    $Task_Access = array("1111111");
    $SECRET = array("1111111");
    $Agent_Access = array("111111111");
    $Closer_Access = array("11111");
    $Manager_Access = array("111111");
    $QA_Access = array("1111111");
}

$TFAC_ACCESS = array("Andrew Collier","Jordan Davies", "Daniel Matthews", "James Keen", "Craig Howells", "Joe Rimell", "Jake Woods");
if (in_array($hello_name, $TFAC_ACCESS, true)) {
    $COMPANY_ENTITY_ID="5";
    $COMPANY_ENTITY = 'The Financial Assessment Centre';
    $Level_10_Access = array("Tom Owen");
    $Level_9_Access = array("Tom Owen");
    $Level_8_Access = array("Tom Owen");
    $Level_3_Access = array("Andrew Collier");
    $Level_1_Access = array("Jordan Davies", "Daniel Matthews", "James Keen", "Craig Howells", "Joe Rimell", "Jake Woods","Andrew Collier");
    $Task_Access = array("1111111");
    $SECRET = array("1111111");
    $Agent_Access = array("111111111");
    $Closer_Access = array("11111");
    $Manager_Access = array("111111");
    $QA_Access = array("Tom Owen");
}

$APM_ACCESS = array("Adam Gregory", "Alex Clarke", "Allan Burnett", "Ben Sears", "Zac Collins", "Elena Clifton", "Rebecca Smith", "Ian Grist", "Phoenix Rayner", "Josh Clark", "Aton John", "Gary Longfield", "George Gleeson", "Rebecca Rainford", "Ethan James", "Alex Jennison", "Sean Thomas");
if (in_array($hello_name, $APM_ACCESS, true)) {
    $COMPANY_ENTITY_ID="6";
    $COMPANY_ENTITY = 'Assured Protect and Mortgages';
    $Level_10_Access = array("11111");
    $Level_9_Access = array("11111");
    $Level_8_Access = array("11111");
    $Level_3_Access = array("Ben Sears");
    $Level_1_Access = array("Adam Gregory", "Alex Clarke", "Allan Burnett", "Ben Sears", "Zac Collins", "Elena Clifton", "Rebecca Smith", "Ian Grist", "Phoenix Rayner", "Josh Clark", "Aton John", "Gary Longfield", "George Gleeson", "Rebecca Rainford", "Ethan James", "Alex Jennison", "Sean Thomas");
    $Task_Access = array("1111111");
    $SECRET = array("1111111");
    $Agent_Access = array("111111111");
    $Closer_Access = array("11111");
    $Manager_Access = array("111111");
    $QA_Access = array("1111111");
}

$COM_LVL_10_ACCESS = array("Michael", "Hayden Williams");
if (in_array($hello_name, $COM_LVL_10_ACCESS, true)) {

    $COMPANY_ENTITY = filter_input(INPUT_POST, 'COMPANY_ENTITY', FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($COMPANY_ENTITY)) {

        if (in_array($hello_name, $TRB_ACCESS, true)) {
            $COMPANY_ENTITY = 'The Review Bureau';

            $Level_10_Access = array("Tom Owen");
            $Level_9_Access = array("Tom Owen");
            $Level_8_Access = array("Tom Owen");
            $Level_3_Access = array("Tom Owen");
            $Level_1_Access = array("Tom Owen");
            $Task_Access = array("1111111");
            $SECRET = array("1111111");
            $Agent_Access = array("111111111");
            $Closer_Access = array("11111");
            $Manager_Access = array("111111");
            $QA_Access = array("Tom Owen");
        }

        if (in_array($hello_name, $PFP_ACCESS, true)) {
            $COMPANY_ENTITY = 'Protect Family Plans';
        }
        if (in_array($hello_name, $PLL_ACCESS, true)) {
            $COMPANY_ENTITY = 'Protected Life Ltd';
        }
        if (in_array($hello_name, $WI_ACCESS, true)) {
            $COMPANY_ENTITY = 'We Insure';
        }

        if (in_array($hello_name, $TFAC_ACCESS, true)) {
            $COMPANY_ENTITY = 'The Financial Assessment Centre';
        }
        if (in_array($hello_name, $APM_ACCESS, true)) {
            $COMPANY_ENTITY = 'Assured Protect and Mortgages';
        }
    }

    $Level_10_Access = array("Michael", "Hayden Williams");
    $Level_9_Access = array("Michael", "Hayden Williams");
    $Level_8_Access = array("Michael", "Hayden Williams");
    $Level_3_Access = array("Michael", "Hayden Williams");
    $Level_1_Access = array("Michael", "Hayden Williams");
    $Task_Access = array("1111111");
    $SECRET = array("1111111");
    $Agent_Access = array("111111111");
    $Closer_Access = array("11111");
    $Manager_Access = array("111111");
    $QA_Access = array("Michael", "Hayden Williams");
}

if ($companynamere == 'The Review Bureau') {
    $COMPANY_ENTITY_ID="1";
    $COMPANY_ENTITY = 'The Review Bureau';
    $Level_10_Access = array("Michael", "Matt", "leighton", "Nick");
    $Level_9_Access = array("Michael", "Matt", "leighton", "Nick", "carys");
    $Level_8_Access = array("Michael", "Matt", "leighton", "Nick", "Abbiek", "carys", "Tina", "Heidy", "Nicola", "Mike", "Gavin");
    $Level_3_Access = array("Michael", "Matt", "leighton", "Nick", "Abbiek", "Carys Riley",  "carys", "Jakob", "Nicola", "Tina", 'Heidy', 'Amy', "Chloe", "Audits", "Keith", "Rhiannon", "Ryan", "TEST", "Assured", "Gavin","David");
    $Level_1_Access = array("Michael", "Matt", "leighton", "Nick", "Abbiek", "Carys Riley", "carys", "Jakob", "Nicola", "Tina", 'Heidy', 'Amy', "Chloe", "Audits", "Rhiannon", "Ryan", "TEST", "Assured", "Gavin", "Keith","David");
    $Task_Access = array("Michael", "Abbiek");
    $SECRET = array("Michael", "Abbiek", "carys", "Jakob", "Nicola", "Tina", 'Amy', "Chloe");
    $Agent_Access = array("111111111");
    $Closer_Access = array("James", "Hayley","Mike", "Kyle", "Sarah", "Richard", "Mike","Corey");
    $Manager_Access = array("Richard", "Keith", "Michael", "Matt", "leighton", "Nick", "carys", "Nicola","David");
    $QA_Access = array("Abbiek", "carys", "Jakob", "Nicola", "Tina", "Amy");
}

if ($companynamere == 'ADL_CUS') {
    $COMPANY_ENTITY="The Financial Assessment Centre";
    $Level_10_Access = array("Michael", "Dean", "Helen", "Andrew", "David");
    $Level_8_Access = array("Michael", "Dean", "Helen", "Andrew", "David");
    $Level_3_Access = array("Michael", "Dean", "Helen", "Andrew", "David", "James");
    $Level_1_Access = array("Michael", "Dean", "Helen", "Andrew", "David", "James");
    $SECRET = array("Michael");
    $Task_Access = array("Michael", "Dean", "Helen", "Andrew", "David");
}
?>
