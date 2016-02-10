<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>महालेखा नियन्त्रक कार्यालय</title>
<link href="<?php echo base_url(); ?>css/itsstyle.css" type="text/css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>images/nepal_logo.png" type="image/icon" rel="shortcut icon" />
<!--        <style type="text/css">
form {font-size:14px;}
fieldset {border:2px solid #499dea; width:250px; margin:50px auto; overflow:visible;}
legend {color:#C10808; font-size:15px; font-weight:bold;}
</style>-->
</head>
<?php echo form_open('reports/revenuReports/'); ?>

<body>
    <table align="center"  style="width:1024px; ">
        <tr><td>
                <div class="reports">
                    <div align="center" class="headReports"> 
                        <h2>नेपाल सरकार</h2>
                        <h2>अर्थ मन्त्रालय</h2>
                        <h1>महालेखा नियन्त्रक कार्यालय</h1>
                        <h2>(बजेट कार्यन्यन शाखा)</h2>
                    </div>
                </div>
                <td>    फोन: ४३८५३६ <br>
                        अनामनगर<br> काठमाडौँ,नेपाल


                    </td>
                    </td>
                    </tr>

                            </table>
<table>
<tr>
<td id="releaseNumber" >
प.सं.:-<input type="text"  name="Data" id="priceInlang" value="" class="number" /><br>
च.नं.:-<input type="text"  name="Data" id="priceInlang" value="" class="number" />
</td>
<td id="releaseDate">
मिति:<input type="text"  name="gosaraData" id="priceInlang" value="" class="number" />
</td>

</tr>
<tr >
<td align="center" colspan="2"> बिसय:-<input type="text"   id="priceInlang" value="" class="number" /></td>
</tr>



<!--        <table id="reportsDetail" border="1" >-->
<table cellspacing="0" cellpadding="5" border="1"  align="center" style="width:1024px;" >
<tr>
<td width="100px" align="center"rowspan="2">बजेट उप-<br>शीर्षक नं.</td>
<td width="100px" align="center"rowspan="2">खर्च शीर्षक नं</td>
<td width="250px" align="center"rowspan="2">नेपाल सरकार</td>
<td width="150px" align="center" colspan="3">बैदेसिक</td>
<td width="250px" align="center"rowspan="2">जम्मा रकम</td>
<td width="150px" align="center"rowspan="2">कैफियत</td>
</tr>
<tr>
<td width="400px">दात्री संस्था</td>
<td width="200px">स्रोतको किसिम</td>
<td width="200px">रकम</td>

</tr>

<tr height="200px">
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
</tr>
<tr>
<td colspan="6" align="right">जम्मा</td>
<td>............</td>
</tr>

</table>
<table id="footerRelease">
<tr >
<td>
बोधाथ :-<br>
श्री उधोग मंक्त्रालय, सिहदरबार |<br>    
श्री महालेखा नियन्त्रक कार्यालय, लगानी साखा |<br>
श्री नेपाल बिदुत प्राधिकरण, काठमाडौँ |
</td>
</tr>
</table>

</body>
</html>