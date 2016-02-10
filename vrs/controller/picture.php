<?php
Class Picture{
    function index()
    {
        F3::set('template', 'photo');
        echo Template::serve("template/layout.html");

    }
    function pictureFolder($id=4){
       echo 123;
      //var_dump($_FILES);die;
        $filename=$id;
     // die(F3::get('FILES.uploadfile.tmp_name'));
        $path="photo/";
        if(move_uploaded_file(F3::get('FILES.uploadfile.tmp_name'),$path.$filename.".jpg"))
        {
            $picture=new Axon("owner_photo");
            $picture->picture=$filename;
            $picture->save();
         }
        else{
           echo "there weas an error";
        }
        
    }

   
}

?>
