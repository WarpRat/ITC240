<?php include 'includes/config.php'?>
<?php get_header()?>

<?php

//Point to the client email before deploying to prod

$to      = 'robertcharlesrussell@gmail.com';

if(isset($_POST["FirstName"]))
{//if data, show it
    
    $FirstName = clean_post('FirstName');
    $LastName = clean_post('LastName');
    $Email = clean_post('Email');
    //$Comments = clean_post('Comments');
    //$Comments = wordwrap($Comments, 70, "\r\n"); 
    
    $myText = "<html><b><p>There is a new catering request:</b></p>";
    $myText .= process_post();
    $myText .= "</html>";

    /*
    $FirstName = $_POST["FirstName"];
    $LastName = $_POST["LastName"];
    $Email = $_POST["Email"];
    $Comments = $_POST["Comments"];
    */
    
    /*
    $myText = "<html><b><p>The user has entered their information as follows:</b></p>" . PHP_EOL; //double newlines 
    $myText .= "<b><p>Name: </b></p>" . $FirstName . " " . $LastName . PHP_EOL; 
    $myText .= "<b><p>Email: </b></p>" . $Email . PHP_EOL . PHP_EOL;
    $myText .= "<b><p>This is what they had on their mind:</b></p>" . PHP_EOL;
    $myText .= "<pre>" . $Comments . "</pre></html>" . PHP_EOL;
    */   

    $subject = "ITC240 Contact from " . $FirstName . " " . $LastName . " " . date("m/d/y, G:i:s");
    $headers = 'From: noreply@itc240.melanieclark.info' . PHP_EOL .
        'Reply-To: ' . $Email . PHP_EOL .
        'X-Mailer: PHP/' . phpversion() . PHP_EOL .
        'MIME-Version: 1.0' . PHP_EOL .
        'Content-type: text/html; charset=UTF-8';

    mail($to, $subject, $myText, $headers);
    
    echo '
    <h4>Your message was successfully sent!</h4>
    <p>We\'ll get back to you within 48 hours</p>
    <p><a href="">Return</a></p>

    ';
    
}else{
	echo '
		<form action="" method="post">
		<div id="content">
		        <div class="clear"></div>
		        <div class="content_item">
		          <h2>Request Special Event Catering</h2>
		          <p><b>Contact us about catering your event:</b>
		          <div style="width:200px; float:left;"><p>First Name</p></div>
                  <div style="width:430px; float:left;"><p><input class="contact" type="text" name="FirstName" placeholder="Enter First Name" autofocus required /></p></div>
                  <br style="clear:both"/>
				  <div style="width:200px; float:left;"><p>Last Name</p></div>
                  <div style="width:430px; float:left;"><p><input class="contact" type="text" name="LastName" placeholder="Enter Last Name" required /></p></div>
                  <br style="clear:both"/>
				  <div style="width:200px; float:left;"><p>Email Address</p></div>
                  <div style="width:430px; float:left;"><p><input class="contact" type="email" name="Email" placeholder="Please enter Email" required /></p></div>
		          <br style="clear:both"/>

                  <div style="width:200px; float:left;"><p>Event Type</p></div>
                  <div style="width:430px; float:left;"><p><input class="contact" type="radio" name="Appointment_Type" value="Wedding" checked="checked" /> Wedding <br />
                  <input class="contact" type="radio" name="Appointment_Type" value="Birthday Party" /> Birthday Party <br /> 
                  <input class="contact" type="radio" name="Appointment_Type" value="Corporate Event" /> Corporate Event <br /></p></div>
                  <br style="clear:both"/>

                  <div style="width:200px; float:left;"><p>Dietary Restrictions</p></div>
                  <div style="width:430px; float:left;"><p><input class="contact" type="checkbox" name="Dietary_Restrictions[]" value="Kosher" /> Kosher <br />
                  <input class="contact" type="checkbox" name="Dietary_Restrictions[]" value="Halal" /> Halal <br /> 
                  <input class="contact" type="checkbox" name="Dietary_Restrictions[]" value="Vegetarian" /> Vegetarian <br />
                  <input class="contact" type="checkbox" name="Dietary_Restrictions[]" value="Vegan" /> Vegan <br /></p></div>
                  <br style="clear:both"/>


                  <div style="width:200px; float:left;"><p>Event Date/Time</p></div>
                  <div style="width:430px; float:left;"><p><input class="contact" type="date" name="Appointment_Time" required /></p></div>

                  <br style="clear:both"/>
				  <div style="width:200px; float:left;"><p>Comments</p></div>
			      <div style="width:430px; float:left;"><p><textarea class="contact textarea" rows="8" cols="50" name="Comments" placeholder="Any special requests or other comments for your event?"></textarea></p></div>

		          <br style="clear:both;" />

		          <div style="width:230px; float:left; padding-left: 200px;"><p style="padding-top: 15px"><input class="submit" type="submit" value="Submit" /></p></div>

				  </div>
				</div>
			</div>
		';
};
?>
<?php 

function clean_post($key){
    
    if(isset($_POST[$key])){
        return strip_tags(trim($_POST[$key]));
     }else{
        return '';
    }
 
}


function process_post()
{//loop through POST vars and return a single string
    $myReturn = ''; //set to initial empty value

    foreach($_POST as $varName=> $value)
    {#loop POST vars to create JS array on the current page - include email
         $strippedVarName = str_replace("_"," ",$varName);#remove underscores
        if(is_array($_POST[$varName]))
         {#checkboxes are arrays, and we need to collapse the array to comma separated string!
             $myReturn .= "<p><b>" . $strippedVarName . ":</b> " . implode(",",$_POST[$varName]) . "</p>" . PHP_EOL;
         }else{//not an array, create line
             $myReturn .= "<p><b>" . $strippedVarName . ":</b> " . $value . "</p>" . PHP_EOL;
         }
    }
    return $myReturn;
}

get_footer()?>

