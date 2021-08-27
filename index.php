<html lang="en">

<head>
    <title>Regular Expressions</title>
    <meta name="description" content="Web Development - Regular Expressions">
    <meta name="author" content="Umayanga Madushan">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Sofia" rel='stylesheet' type="text/css">
    <link href="style.css" rel="stylesheet" type="text/css">
</head>

<?php
    function formKeep($keep) {
        echo isset($_POST[$keep]) ? $_POST[$keep] : '';
    }
?>

<body>
<div class="regex">
  <h2>RegEx</h2>
    <form method="post">
        <input name="ar" placeholder="Registration Number" value="<?php formKeep("ar"); ?>" type="text" title="Registration number must be in ARXXXXX or AR/XXXXX format." required>
        <input name="af" placeholder="Index Number" value="<?php formKeep("af"); ?>" type="text" title="Index number must be in AF/XX/XXXXX format." required>
        <input name="nic" placeholder="NIC Number" value="<?php formKeep("nic"); ?>" type="text" title="Both new and old NIC number formats are allowed." required>
        <input name="mobile" placeholder="Mobile Number" value="<?php formKeep("mobile"); ?>" type="number" title="Mobile number must be in 07XXXXXXXX or +947XXXXXXXX format." required>
        <input name="email" placeholder="Academic E-Mail" value="<?php formKeep("email"); ?>" type="text" title="Academic E-Mail must be in xxxxx@fhss.sjp.ac.lk format."required>
        <label for="bday">Birthday
        <input name="bday" placeholder="BDay" value="<?php formKeep("bday"); ?>" type="date" title="Must be in age between 18 and 65." required></label>

        <input class="animated" name="submit" type="submit" value="Validate">
    </form>

<?php

if(isset($_REQUEST["submit"])) {

    $ar = $_REQUEST["ar"];
    $ar_pattern = "/^ar\/?(84|89|90)[0-9]{3}/i";
    $ar_match = preg_match($ar_pattern, $ar);

    $af = $_REQUEST["af"];
    $af_pattern = "/^af\/?(15|16)\/?1[0-9]{4}/i";
    $af_match = preg_match($af_pattern, $af);

    $nic = $_REQUEST["nic"];
    $nic_pattern = "/([0-9]{9}v$)|(^(19|20)[0-9]{10})/i";
    $nic_match = preg_match($nic_pattern, $nic);

    $mobile = $_REQUEST["mobile"];
    $mobile_pattern = "/^(0|\+94)7[0-25-8][0-9]{7}/i";
    $mobile_match = preg_match($mobile_pattern, $mobile);

    $email = $_REQUEST["email"];
    $email_pattern = "/(84|89|90)[0-9]{3}+@fhss\.sjp\.ac+\.lk$/i";
    $email_match = preg_match($email_pattern, $email);

    $bday = $_REQUEST["bday"];
    $d1 = strtotime($bday);
    $d2 = ceil((time()-$d1)/60/60/24);
    $bday_pattern = "/(657[5-9]|65[89][0-9]|6[6-9][0-9]{2}|[7-9][0-9]{3}|1[0-9]{4}|2[0-2][0-9]{3}|23[0-6][0-9]{2}|237[0-3][0-9]|2374[0-2])/i";
    $bday_match = preg_match($bday_pattern, $d2);

    function regExResult($result) {
        if ($result == 1) {
            echo "<div class='valid'>valid</div><br/>";
        }
        else {
            echo "<div class='invalid'>invalid</div><br/>";
        }
    }

    echo "<div class='validation'>";
    echo "Registration Number : ";
    regExResult($ar_match);
    echo "Index Number : ";
    regExResult($af_match);
    echo "NIC Number : ";
    regExResult($nic_match);
    echo "Mobile Number : ";
    regExResult($mobile_match);
    echo "Academic E-Mail : ";
    regExResult($email_match);
    echo "Employment Status : ";
    regExResult($bday_match);
    echo "</div>";

    echo "<br/><a class='refresh' href='index.php'>Refresh Page</div>";

}

?>

</div>


</body>
</html>
