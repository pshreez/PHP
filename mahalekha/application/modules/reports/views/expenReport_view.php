<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>महालेखा नियन्त्रक कार्यालय</title>
        <link href="<?php echo base_url(); ?>css/itsstyle.css" type="text/css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>images/nepal_logo.png" type="image/icon" rel="shortcut icon" />

    </head>
    <?php echo form_open('reports/revenuReports/'); ?>
    <?PHP $vaucharNUmber = $this->uri->segment(3);
    $source = $this->reports_model->getrevenuReports();
    ?>
   
    
    <body>
        <table align="center"   style="width:1024px;">
            <tr><td>
                    <div class="reports">
                        <div align="center" class="headReports"> 
                            <h2>नेपाल सरकार</h2>
                            <h2>अर्थ मन्त्रालय</h2>
                            <h1>महालेखा नियन्त्रक कार्यालय</h1>
                            <h1>गोश्वरा भौचर</h1>
                            <h2>(राजस्व आम्दानीको लागि)</h2>
                        </div>
                </td>

                <td>    अनुसूची १०.5 <br>
                        म.ले.फा.नं.:१० क
                        <div id="govama">
                            गो.भै.नं.
                            <?php echo $vaucharNUmber; ?>
                            <br>
                                मिति:<?php
                         
                           echo  $source;    

                                ?>

                        </div>

                </td>
                </td>


            </tr>
        </table ><br><br>


                <table cellspacing="1"  border="1"  align="center" style="width:1024px;" >
                    <tr>
                        <td width="400px" align="center">ब्यहोरा</td>
                        <td width="100px" align="center">खाता पाना नं</td>
                        <td width="150px" align="center">राजस्व शीर्षक नं</td>
                        <td width="150px" align="center">डेविद</td>
                        <td width="150px" align="center">क्रेडिट</td>

                    </tr>

                    <tr height="200px">
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>


                    </tr></table>
                <table align="center" style="width:1024px;" border="0">


                    <tr >
                        <td>
                            भौचरको कुल रकम अंकमा:<input type="text" id="priceInlang" /> <br>
                                अक्षरेपी रु.: <input type="text" id="priceInlang"/> 
                        </td>

                    </tr>
                    <tr>
                        <td colspan="2">
                            <div id="formline"></div> 
                        </td>
                    </tr>

                    <tr>

                        <td>  पेस गर्ने: <input type="text" id="priceInlang"/> <br>
                                मिति: <input type="text" id="priceInlang"/> <br>
                                    दर्जा: <input type="text" id="priceInlang"/>
                                    </td> <br>


                                        <td> सदर गर्ने: <input type="text" id="priceInlang"/><br>
                                                मिति: <input type="text" id="priceInlang"/> <br>
                                                    दर्जा: <input type="text" id="priceInlang"/>
                                                    </td> <br>

                                                    </br>

                                                    </tr>
                                                    <td colspan="2">
                                                        <div id="formline"></div>
                                                    </td>
                                                    <tr >
                                                        <td colspan="2">
                                                            द्रस्तब्य :-<br>
                                                                यो फारा राज्सो आम्दनीको कारोबारको लागि प्रयोग गर्ने प्रारम्भिक फाराम हो |<br>
                                                                    यो फारम नगद दाखिला, बैंक दाखिला र आम्दानीका सिर्शक संचाउने लगायत अन्य हिसाब मिलानका लागि पनि प्रयोग गरिन्छ |<br>
                                                                        यो भौचर आभिलेख गरिएको रकम अखित्यार्वाल्बात स्वीकृत गराई राख्नु पर्दछ |<br>
                                                                            </td>
                                                                            </tr>


                                                                            </table>


                                                                            </body>
                                                                            </html>