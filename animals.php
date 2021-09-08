<?php
include("db_connect.php");



####function for apply filter on data #####

function applyFilter($filter_condition)
{  
    global $con;
    $row='';
    $sql="SELECT *FROM animal_info $filter_condition";
    $res_row=mysqli_query($con,$sql);
    while($data=mysqli_fetch_assoc($res_row))
    {
        $row.="<tr>";
        $row.="<td>".$data['animal_name']."</td><td>".$data['animal_category']."</td><td>".$data['animal_life_expectancy']."</td><td>".$data['animal_description']."</td><td>".$data['date']."</td><td><img height='100'width='100'src=upload/".$data['animal_img']."></td></tr>";
       
    }
    return $row;
}

/**function show all element */

function showallanimal(){
    global $con;
   $row='';
    $sql="SELECT *FROM animal_info";
    $res=mysqli_query($con,$sql);
   while($data=mysqli_fetch_assoc($res)){
    $row.="<tr>";
    $row.="<td>".$data['animal_name']."</td><td>".$data['animal_category']."</td><td>".$data['animal_life_expectancy']."</td><td>".$data['animal_description']."</td><td>".$data['date']."</td><td><img height='100'width='100'src=upload/".$data['animal_img']."></td></tr>";
    
   }
   return $row;
}


####functionn for visitor count ###
function visitiorCount(){
    global $con;
    $sql="SELECT *FROM visitor_counter";
    $result=mysqli_query($con,$sql);
    $row1=mysqli_fetch_array($result);
    $counter=$row1['counts'];
    if(empty($counter)){
        
        $counter=1;
        $sql1="INSERT INTO visitor_counter(counts)VALUES('$counter')";
        $result1=mysqli_query($con,$sql1);
    }
    $counter1=$counter;
    $plus_counter=$counter+1;
    $sql2="UPDATE visitor_counter SET counts=$plus_counter";
    mysqli_query($con,$sql2); 
    return $counter1; 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!---fetch visiter count using session variable and print value -->

    <div>you are the visitor no:<?php $c=visitiorCount();echo $c; ?></div>
    <form action="#" method="post" onsubmit="return check();"id='frm'> 
        <div>Filter BY:
        <select name="category" id="category">
        <option value="none">--select Category--</option>   

        <option value="Carnivores">Carnivores</option>
                        <option value="Omnivores">Omnivores</option>
                        <option value="Herbivores">Herbivores</option>
        </select>
        <select name="life_expectancy" id="life_expectancy">
                   <option value="none">--select life expectancy--</option>   
                            <option value="1-5 Year">1-5 Year</option>
                            <option value="5-10 Year">5-10 Year</option>
                            <option value="10+">10+</option>
           
        </select>
        Sort BY: 
       <input type="radio" name="sort" id="date" value="date">Date
       <input type="radio" name="sort" id="name"value="animal_name">Name
       <input type="submit" value="apply filter and sort"name="filter">
      
    </form>
<a href="index.php" style="text-decoration:none;
   
    border:none;
    outline:none;
    height:35px;
    width:105px;
    font-size:20px;
    border-radius:10px;
    margin-top:20px;
    cursor: pointer;">back to add animal</a>
<!--table where  all animals data is shown  and filter data is also shown here --->

    <table id="animals_details" >
        <tr>
            <th> Name</th>
            <th>Category</th>
            <th>life expectancy</th>
            <th>Date</th>
            <th>description</th>
            <th>Photo</th>
        </tr>   
        <?php

/***this code is run when we filter the data */

            if(isset($_POST['filter']))
            {

         /**make dynamic query for filter */

                $filter_condition='';

/*****this query execute when both category and life expectancy is select */

                if($_REQUEST['category']!='none' AND $_REQUEST['life_expectancy']!='none')
                {
                    $category=$_REQUEST['category'];
                    $life_expectancy=$_REQUEST['life_expectancy'];
                    $filter_condition="WHERE animal_category='$category' AND animal_life_expectancy='$life_expectancy'";
                }else
                {

/***make this query for only category filter */

                    if($_REQUEST['category']!='none')
                    {
                        $category=$_REQUEST['category'];
                        $filter_condition=" WHERE animal_category='$category'";
                    }

/****make this query for only life expectancy filter */

                   if($_REQUEST['life_expectancy']!='none')
                   {
                        $life_expectancy=$_REQUEST['life_expectancy'];
                        $filter_condition.="WHERE animal_life_expectancy='$life_expectancy'";
                    }
            }

/**make this query for sort the data */

            if(isset($_REQUEST['sort']))
            {
                $sort=$_REQUEST['sort'];
                $filter_condition.=" ORDER BY $sort ASC";
            }
 /**this applyFilter function is filter the data */
                          
       $result=applyFilter( $filter_condition );  
       echo $result; 
       
            }else
            {

/**this function is call first time after save the data */

                $result=showallanimal();
                echo $result;
            }
        ?>
       
    </table>
<script src="js/function.js"></script>
</body>
</html>
