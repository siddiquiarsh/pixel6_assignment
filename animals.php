<?php
include("function.php");
session_start();

/**fetch visiter count using session variable and print value */ 

echo "you are the visitor no .".$_SESSION['count'];
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
    <form action="#" method="post" onsubmit="return check();"id='frm'> 
        <div>Filter BY:
        <select name="category" id="category">
        <option value="none">--select Category--</option>   

    <!----show category dynamically from database---->

            <?php showSelectAll("animal_category","category_name");?>
        </select>
        <select name="life_expectancy" id="life_expectancy">
        <option value="none">--select life expectancy--</option>   

    <!---show life_expectancy dynamically from database---->

            <?php showSelectAll("life_expectancy","life_expectancy_value");?>
        </select>
        Sort BY: 
       <input type="radio" name="sort" id="date" value="date">Date
       <input type="radio" name="sort" id="name"value="animal_name">Name
       <input type="submit" value="apply filter and sort"name="filter">
       <input type="submit" value="Clear Filter" name="clearfilter">
    </form>

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
                          
        applyFilter( $filter_condition );   
       
            }else
            {

/**this function is call first time after save the data */

                showallanimal();
            }
        if(isset($_REQUEST['clearfilter']))
{
    showallanimal();
}
        ?>
       
    </table>
<script src="js/function.js"></script>
</body>
</html>
