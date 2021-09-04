<?php
include("function.php");



######this filter  variable is use for filter and sort the data #########

if(isset($_REQUEST['filter']))
{
    header("location:animals.php?msg=filter");
}else

/**this block  is use for save data in database */

{ 


####call visitor function for get and set visitor  no ####

$a=visitiorCount();

####session start for store the visitor value and access every page######

session_start();

#####store the visitor  value in session's count variable #######

$_SESSION['count']=$a;

$connectionId=connectdatabase();
$animal_name=$_POST['animal_name'];
$count=$_POST['count'];
$category=$_POST['category'];
$description=$_POST['description'];
$life_expectancy=$_POST['life_expectancy'];

/**Get current date */

$date=date("y-m-d");
$animal_img=$_FILES['animal_img']['name'];
$animal_img_tmp_name=$_FILES['animal_img']['tmp_name'];
/**Break String into an array */
$img_name=explode(".",$animal_img);
$new_animal_img_name="";
for($i=0;$i<count($img_name);$i++)
    {
        if($i==0)
        {
/**add time and rand no in animal photo for avoid dublicate photo */

            $new_animal_img_name.=time().rand();
        }
        if($i==count($img_name)-1)
        {
            $new_animal_img_name.=".";
        }

 /**********Change animal Photo name *******/

    $new_animal_img_name.=$img_name[$i];    
    } 
$animal_img_path="upload/".$new_animal_img_name;

 #Upload photo into upload folder after upload photo other data  store indatabase## 

if(move_uploaded_file($animal_img_tmp_name,$animal_img_path))
{
/**Query for save data from database */
    $sql="INSERT INTO animal_info(animal_name,animal_category,animal_life_expectancy,animal_description,date,animal_img)VALUES('$animal_name','$category','$life_expectancy','$description','$date','$new_animal_img_name')";
    $res=mysqli_query($connectionId,$sql);
    if($res)
    {
/*if data is sucessfully save in database then control redirect animal.php page */
        header("location:animals.php?");
    }else
    {
/*if data is not save in database then control redirect index.php page */
        header("location:addanimalInfo.php?error_msg=data not saved");
    }
}else
{
/**this header is work when photo is not upload  */
    header("location:addanimalInfo.php?error_msg=data not saved");
}
 
}
?>