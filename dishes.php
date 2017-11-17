<?php
//customer_list.php - shows a list of customer data
?>
<?php include 'includes/config.php';?>
<?php include 'includes/header.php';?>
<h1><?=$config->sub_banner?></h1>
<?php
$sql = "select * from SampleFood";
//we connect to the db here
$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

//we extract the data here
$result = mysqli_query($iConn,$sql);

if(mysqli_num_rows($result) > 0)
{//show records

    while($row = mysqli_fetch_assoc($result))
    {
        echo '<p>';
        echo 'Dish: <b>' . $row['name'] . '</b><br> ';
        echo 'Course: <b>' . $row['course'] . '</b><br> ';
        echo 'Season: <b>' . $row['season'] . '</b><br> ';
        if($row['wine_pair']){
            echo 'Suggested Wine Pairing: <i><b>' . $row['wine_pair'] . '</i></b><br>';
            }else{
                
            }
            echo '<a href="food_view.php?id=' . $row['food_id'] . '"> More </a>';
            echo '</p>';
    }    

}else{//inform there are no records
    echo '<p>We\'re working hard on new menu items. Please check back soon!</p>';
}

//release web server resources
@mysqli_free_result($result);

//close connection to mysql
@mysqli_close($iConn);

?>
<?php include 'includes/footer.php';?>