<?php
include("function.php");
?>
<html>
    <head>
        <link rel="stylesheet" href="css/style.css">
    </head>
<body>
    <form id="add_animal" action="submission.php" method="post" enctype="multipart/form-data" onsubmit=" return checkcaptcha();"autocomplete="off">
        <div><h1 id="form-title">Add Animal Info.</h1></div>
        <table align="center">
            <tr>
                <td><h3><label for="">Name</label></h3></td>
                <td colspan="4">
                    <input type="text" name="animal_name" id="animal_name"required>
                </td>
                </tr>
                <tr>
                    <td><h3><label for="">Category</label></h3></td>
                    <td colspan="4">
                        <select class="dropdown"name="category" id="category"required>
                            <option>--select Category--</option>
                            <!--show all select option dynamiclly from database-->
                        <?php showSelectAll("animal_category","category_name");?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><h3><label for="">Animal Image</label></h3></td>
                    <td colspan="4">
                        <input type="file" name="animal_img" id="animal_img"required>
                    </td>
                </tr>
                <tr>
                    <td><h3><label for="">Description</label></h3></td>
                    <td colspan="4">
                        <textarea name="description" id="description" cols="40" rows="10"required></textarea>
                    </td>
                </tr>
                <tr>
                    <td><h3><label for="">Life expectancy</label></h3></td>
                    <td colspan="4">
                        <select name="life_expectancy"class="dropdown" id="life_expectancy"required>
                            <option>--Select life expectancy--</option>
            <!-----show life expectancy dropdown from database dynamically------->
                            <?php showSelectAll("life_expectancy","life_expectancy_value");?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><h3><label for="">Captcha</label></h3></td>
                    <td colspan="4">
                <!----- show captcha text in this container--------->
                        <span id="captcha_container" ></span>
                        <input type="text" name="captcha_value" id="captcha_value"placeholder="Enter Captcha">
                    </td>
                    <div id="error"></div>
                </tr>
                <tr align="center">
                    <td colspan="8"><input type="submit" value="Submit"></td>
                </tr>
        </table>      
    </form>    
</body>
<script src="js/function.js"></script>
</html>
 
