<?php
//customer_list.php - shows a list of customer data
?>
<?php include 'includes/config.php';?>
<?php require 'includes/Pager.php';?>
<?php $config->loadhead .= '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';?>
<?php get_header();?>
<h1><?=$config->sub_banner?></h1>
<?php
$sql = "select * from SampleFood";
//we connect to the db here
$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

//we extract the data here
$result = mysqli_query($iConn,$sql);

    
$prev = '<i class="fa fa-caret-left" style="font-size:large"></i>';
$next = '<i class="fa fa-caret-right" style="font-size:large"></i>';

$myPager = new Pager(5,'',$prev,$next,'');
$sql = $myPager->loadSQL($sql,$iConn);  #load SQL, pass in existing connection, add offset
$result = mysqli_query($iConn,$sql) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));
    

if(mysqli_num_rows($result) > 0)
{//show records
    
    echo $myPager->showNAV();//show pager if enough records 
	if($myPager->showTotal()==1){$itemz = "dish";}else{$itemz = "dishes";}  //deal with plural
    echo '<p align="center">We have ' . $myPager->showTotal() . ' ' . $itemz . '!</p>';

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
    
    echo $myPager->showNAV();//show pager if enough records 

}else{//inform there are no records
    echo '<p>We\'re working hard on new menu items. Please check back soon!</p>';
}

//release web server resources
@mysqli_free_result($result);

//close connection to mysql
@mysqli_close($iConn);

?>
<?php get_footer();?>