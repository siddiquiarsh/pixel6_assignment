<?php

/*function for database connection */

function connectdatabase(){
    $con=mysqli_connect("localhost","root","","pixel6_assignment");
    return $con;
}

#####function show all dropdown record###

function showSelectAll($table,$col_name)
{
    $connectionId=connectdatabase();
    $sql="SELECT *FROM $table";
    $res=mysqli_query($connectionId,$sql);    
    while($data=mysqli_fetch_assoc($res))
    {
        echo "<option value=".$data[$col_name].">". $data[$col_name]."</option>";
    }
}

####function for apply filter on data #####

function applyFilter($filter_condition)
{   
    $connectionId=connectdatabase();
    $sql="SELECT *FROM animal_info $filter_condition";
    $res_row=mysqli_query($connectionId,$sql);
    while($data=mysqli_fetch_assoc($res_row))
    {
        $row="<tr>";
        $row.="<td>".$data['animal_name']."</td><td>".$data['animal_category']."</td><td>".$data['animal_life_expectancy']."</td><td>".$data['animal_description']."</td><td>".$data['date']."</td><td><img height='100'width='100'src=upload/".$data['animal_img']."></td></tr>";
        echo $row;
    }

}

/**function show all element */

function showallanimal(){
    $connectionId=connectdatabase();
    $sql="SELECT *FROM animal_info";
    $res=mysqli_query($connectionId,$sql);
   while($data=mysqli_fetch_assoc($res)){
    $row="<tr>";
    $row.="<td>".$data['animal_name']."</td><td>".$data['animal_category']."</td><td>".$data['animal_life_expectancy']."</td><td>".$data['animal_description']."</td><td>".$data['date']."</td><td><img height='100'width='100'src=upload/".$data['animal_img']."></td></tr>";
    echo $row;
   }
}
####functionn for visitor count ###
function visitiorCount(){
    $connectionId=connectdatabase();
    $sql="SELECT *FROM visitor_counter";
    $result=mysqli_query($connectionId,$sql);
    $row1=mysqli_fetch_array($result);
    $counter=$row1['counts'];
    if(empty($counter)){
        $counter=1;
        $sql1="INSERT INTO visitor_counter(counts)VALUES('$counter')";
        $result1=mysqli_query($connectionId,$sql1);
    }
    $counter1=$counter;
    $plus_counter=$counter+1;
    $sql2="UPDATE visitor_counter SET counts=$plus_counter";
    mysqli_query($connectionId,$sql2); 
    return $counter1; 
}
?>


