<?php
//customer_view.php - shows details of a single customer
?>
<?php include 'includes/config.php';?>
<?php

//process querystring here
if(isset($_GET['id']))
{//process data
    //cast the data to an integer, for security purposes
    $id = (int)$_GET['id'];
}else{//redirect to safe page
    header('Location:dishes.php');
}


$sql = "select * from SampleFood where food_id = $id";
//we connect to the db here
$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

//we extract the data here
$result = mysqli_query($iConn,$sql);

if(mysqli_num_rows($result) > 0)
{//show records

    while($row = mysqli_fetch_assoc($result))
    {
        $dish = stripslashes($row['name']);
        $course = stripslashes($row['course']);
        $season = stripslashes($row['season']);
        $wine = stripslashes($row['wine_pair']);
        $description = stripcslashes($row['description']);
        $Feedback = '';
        $pageID = $dish;
        $config->title = $dish;
    }    

}else{//inform there are no records
    $Feedback = '<p>This dish does not exist, we update our menus often, try refreshing the page</p><p>If you believe you reached this page in error, please contact us.</p>';
}

?>
<?php get_header();?>
<h1><?=$pageID?></h1>
<?php
    
    
if($Feedback == '')
{//data exists, show it
    
    echo '<div class="content_photo">';
    echo '<p><img style=" max-width: 550px; height: auto; width: auto;" src=' . $config->image_sub . $id . '.jpg />';
    echo '</p>'; 

    echo '<div class="content_text"><p>';
    echo 'Dish: <b>' . $dish . '</b><br>';
    echo 'Course: <b>' . $course . '</b><br>';
    echo 'Season: <b>' . $season . '</b><br>';
    if($wine){
        echo 'Wine Pairing: <b><i>' . $wine . '</b><br></i></p>';
    }
    echo '<p>Description: <b>' . $description . '</b></p>';
    echo '<a href="dishes.php">Go Back</a>';
    echo '</div></div>';


}else{//warn user no data
    echo $Feedback;
}    


//release web server resources
@mysqli_free_result($result);

//close connection to mysql
@mysqli_close($iConn);

?>
<?php get_footer();?>