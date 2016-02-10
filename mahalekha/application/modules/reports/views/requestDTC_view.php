<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="<?php echo base_url(); ?>css/itsstyle.css" type="text/css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>images/nepal_logo.png" type="image/icon" rel="shortcut icon" />

</head>
<?php echo form_open('reports/revenuReports/'); ?>

<body>

<table >
    <tr><td>
            भुक्तानी आदेश संख्या:<input type="text"  name="DTCnumber" id="priceInlang" value="" class="number" />
        </td>
        <td align="right" >
            भुक्तानी आदेश संख्या:<input type="text"  name="reqDTC" id="priceInlang" value="" class="number" />
        </td>
    </tr>  
</table>
<table align="center" class="imageDTC">

</table>
<table >
    <tr>
        <div style="padding-left: 550px"><strong>महालेखा नियन्त्रक कार्यालय,अनामनगर</strong></div>
    </tr>


    <div>श्री केष तथा लेखा नियन्त्रक कार्यालय,<br>
            काठमाडौँ समन्वय कार्यालय, बबरमहल<br>

                </div>
                <div>
                    चालु आ.व.<input type="text"  name="reqDTC" id="priceInlang" value=""/> को ब.उ.शि.नं.<input type="text"  name="reqDTC" id="priceInlang" value="" class="number" /> बाट निम्न बमोजिम रु <input type="text"  name="reqDTC" id="priceInlang" value="" class="number" />&ensp;&ensp;|- भुतानिको लागि अनुरोध छ |
                </div>

                <table align="center" border="1"  >

                    <tr>
                        <td width="100px"align="center" rowspan="2">सि.न.</td>
                        <td width="100px" align="center" rowspan="2">बिबरण</td>
                        <td width="150px" align="center" rowspan="2">ख.शिन.</td>
                        <td  align="center" colspan="4">स्रोत</td>

                        <td width="150px" align="center" rowspan="2">दात्रि संस्था</td>
                        <td width="150px" align="center" colspan="2" >भुक्तानी रकम</td>
                        <td width="150px" align="center" rowspan="2">भुक्तानी पाउनेको नाम</td>
                        <td width="150px" align="center" rowspan="2">कैफियत</td>

                    </tr>
                    <tr>
                        <td width="400px">नेपाल सरकार</td>
                        <td width="200px">नगद आनुदन</td>
                        <td width="200px">सोधभर्ना हुने ऋन</td>
                        <td width="200px"> नगद ऋन</td>

                        <td width="500px">अंकमा</td>
                        <td width="350px">अछेर्मा</td>
                    </tr>



                    <tr height="200px">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                    </tr>
                    <tr>
                        <td align="center" colspan="3"> जम्मा</td>
                        <td> ..............</td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td>............. </td>
                        <td>............. </td>
                        <td></td>
                        <td></td>


                    </tr>
                </table><br>
                    <table  align="center" border="1" style="width:800px">


                        <tr >
                            <td align="center"colspan="3"> को.ले.नि.का. प्रयोजनको लागि   </td> </tr> 
                        <tr> 
                            <td>दर्ता नं:<input type="text" id="priceInlang" value="" class="number" /></td>    
                            <td>दर्ता मिति:<input type="text"  id="priceInlang" value="" class="number" /></td>
                            <td>टोकन नं:<input type="text"   id="priceInlang" value="" class="number" /></td>
                        </tr>  
                        <tr> 
                            <td>कार्यालय कोद नं:<input type="text"  id="priceInlang" value="" class="number" /></td>    
                            <td>उप-शीर्षक:<input type="text"   id="priceInlang" value="" class="number" /></td>
                            <td>दर्ता समय:<input type="text" id="priceInlang" value="" class="number" /></td>
                        </tr>  
                        <tr> 
                            <td>पेश:<input type="text"  id="priceInlang" value="" class="number" /></td>    
                            <td>सिफारिस गर्ने:<input type="text"   id="priceInlang" value="" class="number" /></td>
                            <td>सदर गर्ने:<input type="text"  id="priceInlang" value="" class="number" /></td>
                        </tr>  



                    </table>

                    <table>  
                        <tr>    
                            <td id="signetureDTC1">...................................<br></td>
                            <td id="signetureDTC2" style="padding-left:850px">...................................<br></td>
                        </tr>
                        <tr>   
                            <td id="signetureDTC1" align="center">लेखा अधिकृत
                            </td>  
                            <td id="signetureDTC2" style="padding-left: 850px">उप-महालेखा नियन्त्रक
                            </td> 
                        </tr>

                    </table>
                    </table>
                    </body>

                    </html>