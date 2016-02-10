<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>महालेखा नियन्त्रक कार्यालय</title>
        <link href="<?php echo base_url(); ?>css/itsstyle.css" type="text/css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>images/nepal_logo.png" type="image/icon" rel="shortcut icon" />
        <style type="text/css">
            form {font-size:14px;}
            fieldset {border:2px solid #499dea; width:250px; margin:50px auto; overflow:visible;}
            legend {color:#C10808; font-size:15px; font-weight:bold;}
        </style>
    </head>

    <body>
        <div id="header">
            <div class="header_bg">
                <div class="spacer"></div>
                <h2>नेपाल सरकार</h2>
                <h2>अर्थ मन्त्रालय</h2>
                <h1>महालेखा नियन्त्रक कार्यालय</h1>
                <h2>अनामनगर, काठमाडौँ</h2>
                
            </div>
        </div>
        <?php
        echo form_open('login/validate');
        ?>
        <fieldset>
            <legend>प्रवेश प्रविस्ठी</legend>
                <?php
        //if (@$error == 0) { echo "<div class='red'>प्रयोगकर्ता नाम वा गोप्य शब्द मिलेन</div>"; }
        //echo "<div class='red'>".validation_errors()."</div>";

                    echo "<span class='fright'>प्रयोगकर्ता नाम : " . form_input('uname') . "</span><br />";
                    echo form_error('uname');
                    echo "<span style='float:right'>गोप्य शब्द : " . form_password('pword') . "</span><br clear='all' />";
                    echo form_error('pword');
                    echo form_submit('submit', 'प्रवेस गर्नुहोस');
        ?>
        </fieldset>
            <?php echo form_close();
        ?>
    </body>
</html>