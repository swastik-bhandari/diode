<?php 
session_start();
if (!isset($_SESSION["username"])){
header("Location: login-login.php");
$_SESSION['value'] = isset($_SESSION['value']) ? $_SESSION['value'] : 0;
exit();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Find Your Mentor</title>
        <link rel="stylesheet" href="../css/sh-style.css">
    </head>
<body>
    <?php 
    $first_div = 'block';
    $second_div = 'none';
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
     
   
if($_SESSION['value'] == 0)
{
    $namearr =[];
$first_div = 'none';
$second_div = 'grid';
$_SESSION['value'] =1;
$user = $_POST['usermentor'];
$Mentor =isset($_POST['Mentor'])?1:0;
$Programming =isset($_POST['Student'])?1:0;
$Data_Science =isset($_POST['Data-Science'])?1:0;
$AI = isset($_POST['AI'])?1:0;
$Software_Engineering = isset($_POST['Software-Engineering'])?1:0;
$Database_Management = isset($_POST['Database-Management'])?1:0;
$Networking = isset($_POST['Networking'])?1:0;
$Cloud = isset($_POST['Cloud'])?1:0;
$UI_UX = isset($_POST['UI-UX'])?1:0;
$Less6M =isset($_POST['Less6M'])?1:0;
$M61Y =isset($_POST['M61Y'])?1:0;
$Y12Y =isset($_POST['Y12Y'])?1:0;
$Y24Y =isset($_POST['Y24Y'])?1:0;
$Sunday =isset($_POST['sunday'])?1:0;
$Monday =isset($_POST['monday'])?1:0;
$Tuesday =isset($_POST['tuesday'])?1:0;
$Wednesday =isset($_POST['wednesday'])?1:0;
$Thursday =isset($_POST['thursday'])?1:0;
$Friday =isset($_POST['friday'])?1:0;
$Saturday =isset($_POST['saturday'])?1:0;
$conn = mysqli_connect('localhost','root','','diode');
if ($conn->connect_error) {
die('asdfasdf'. $conn->connect_error);
}
$query = "SELECT username FROM user_status WHERE mentor =1";
$result = $conn->query($query);
if($result->num_rows>0)
{
    while($row = $result->fetch_assoc())
    {
    if(str_contains($row['username'],$user)){
      array_push($namearr, $row['username']);
    }
    }
    $conn->close();
    $result->close();
}
else{
    die('mistake are occuring');
}
foreach($namearr as $x)
{
$conn = mysqli_connect('localhost','root','','diode');
if ($conn->connect_error) {
    die (''. $conn->connect_error);
}
$query = 'SELECT programming , data_science , ai , software_engineering , database_management , networking , cloud , ui_ux FROM mentor_info WHERE username = ?';
$stms = $conn->prepare($query);
$stms->bind_param('s', $x);
$stms->execute();
$result =$stms->get_result();
if($result->num_rows> 0){
    while($row = $result->fetch_assoc())
    {
        if($Programming == $row['programming'] && $Programming == 1 || $Data_Science == $row['data_science'] && $Data_Science == 1 ||
        $AI == $row['ai'] && $AI == 1 || $Software_Engineering == $row['software_engineering'] && $Software_Engineering == 1 || $Database_Management == $row['database_management'] && $Database_Management == 1 || $Networking == $row['networking'] && $Networking ==1 || $Cloud == $row['cloud'] && $Cloud == 1 || $UI_UX == $row['ui_ux'] && $UI_UX ==1){
           
        }
        else{
           unset($namearr[array_search($x,$namearr)]);
        }
    }
}
$conn->close();
$stms->close();
$result->close();
}

////////////////////////////////////////////
foreach($namearr as $x)
{
$conn = mysqli_connect('localhost','root','','diode');
if ($conn->connect_error) {
    die (''. $conn->connect_error);
}
$query = 'SELECT first_exp , second_exp , third_exp , fourth_exp FROM mentor_experience WHERE username = ?';
$stms = $conn->prepare($query);
$stms->bind_param('s', $x);
$stms->execute();
$result =$stms->get_result();
if($result->num_rows> 0){
    while($row = $result->fetch_assoc())
    {
        if(($row['fourth_exp'] == 1 && $Less6M ==1 || $M61Y ==1 || $Y12Y ==1 || $Y24Y==1 )||
        ($row['third_exp'] == 1 && $Less6M ==1 || $M61Y ==1 || $Y12Y ==1 )||
        ($row['second_exp'] == 1 && $Less6M ==1 || $M61Y ==1)||
        ($row['first_exp'] == 1 && $Less6M ==1 )){
           
        }
        else{
           unset($namearr[array_search($x,$namearr)]);
        }
    }
}
$conn->close();
$stms->close();
$result->close();

}



//////////////////////////////////////////
foreach($namearr as $x)
{
$conn = mysqli_connect('localhost','root','','diode');
if ($conn->connect_error) {
    die (''. $conn->connect_error);
}
$query = 'SELECT sunday , monday , tuesday , wednesday ,thursday , friday , saturday FROM weekly_schedule WHERE username = ?';
$stms = $conn->prepare($query);
$stms->bind_param('s', $x);
$stms->execute();
$result =$stms->get_result();
if($result->num_rows> 0){
    while($row = $result->fetch_assoc())
    {
        if($Sunday == $row['sunday'] && $Sunday == 1 || $Monday == $row['monday'] && $Monday == 1 ||
        $Tuesday == $row['tuesday'] && $Tuesday == 1 || $Wednesday == $row['wednesday'] && $Wednesday == 1 || $Thursday == $row['thursday'] && $Thursday == 1 || $Friday == $row['friday'] && $Friday ==1){
           
        }
        else{
           unset($namearr[array_search($x,$namearr)]);
        }
    }
}
$conn->close();
$stms->close();
$result->close();
}
/////////////////////////////////////////////
}
else{
    $first_div = 'block';
    $second_div = 'none';
    $_SESSION['value'] =0;
}
    }
    ?>
        <form class="firstform" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
        <div id = "sh-search">
            <input type="text" id="search-bar" placeholder="Search mentors or topics..." name="usermentor">
            <button id="search-btn" type="submit">🔍</button>
        </div>
        <div class="first-div" style="display:<?php echo $first_div;?>" >
        <div id = "sh-categories">

            <div id = "cat1" class = "cat">
                <div class="category-type">
                    <p>Search for:</p>
                </div>
                <div class = "options">
                    <div class="option">
                        <input type="checkbox" id="mentor" name="Mentor">
                        <label for="mentor">Mentor</label>
                    </div>

                    <div class="option">
                        <input type="checkbox" id="student" name="Student">
                        <label for="student">Student</label>
                    </div>
                </div>
            </div>

            <div id = "cat2" class = "cat">
                <div class="category-type">
                    <p>Topic:</p>
                </div>
                <div class = "options">
                    <div class="option">
                        <input type="checkbox" id="programming" name="Programming">
                        <label for="programming">Programming</label>
                    </div>

                    <div class="option">
                        <input type="checkbox" id="data-science" name="Data-Science">
                        <label for="data-science">Data Science</label>
                    </div>

                    <div class="option">
                        <input type="checkbox" id="ai" name="AI">
                        <label for="ai">AI</label>
                    </div>

                    <div class="option">
                        <input type="checkbox" id="software-engineering" name="Software-Engineering">
                        <label for="software-engineering">Software Engineering</label>
                    </div>

                    <div class="option">
                        <input type="checkbox" id="database-management" name="Database-Management">
                        <label for="database-management">Database Management</label>
                    </div>

                    <div class="option">
                        <input type="checkbox" id="networking" name="Networking">
                        <label for="networking">Networking</label>
                    </div>

                    <div class="option">
                        <input type="checkbox" id="cloud" name="Cloud">
                        <label for="cloud">Cloud</label>
                    </div>

                    <div class="option">
                        <input type="checkbox" id="ui-ux" name="UI-UX">
                        <label for="ui-ux">UI/UX</label>
                    </div>
                </div>
            </div>

            <div id = "cat3" class = "cat">
                <div class="category-type">
                    <p>Experience:</p>
                </div>
                <div class = "options">
                    <div class="option">
                        <input type="checkbox" id="less6m" name="Less6M">
                        <label for="less6m">Less than 6 month</label>
                    </div>

                    <div class="option">
                        <input type="checkbox" id="6mto1y" name="M61Y">
                        <label for="6mto1y">6 month - 1 year</label>
                    </div>

                    <div class="option">
                        <input type="checkbox" id="1yto2y" name="Y12Y">
                        <label for="6mto1y">1 year - 2 years</label>
                    </div>

                    <div class="option">
                        <input type="checkbox" id="2yto4y" name="Y24Y">
                        <label for="6mto1y">2 years - 4 years</label>
                    </div>
                </div>
            </div>

            <div id = "cat4" class = "cat">
                <div class="category-type">
                    <p>Rating:</p>
                </div>
                <div class = "options">
                    <div class="option">
                        <input type="checkbox" id="8+" name="8+">
                        <label for="less6m">8+</label>
                    </div>

                    <div class="option">
                        <input type="checkbox" id="7-8" name="7-8">
                        <label for="6mto1y">7-8</label>
                    </div>

                    <div class="option">
                        <input type="checkbox" id="6-7" name="6-7">
                        <label for="6mto1y">6-7</label>
                    </div>

                    <div class="option">
                        <input type="checkbox" id="5-6" name="5-6">
                        <label for="6mto1y">5-6</label>
                    </div>

                    <div class="option">
                        <input type="checkbox" id="any" name="any">
                        <label for="any">any</label>
                    </div>
                </div>
            </div>

            <div id="cat4" class="cat">
                <div class="category-type">
                    <p>Availability:</p>
                </div>

                <div class="options">
                    <div class="option">
<<<<<<< HEAD
                        <input type="checkbox" id="sunday" name="days" value="sunday">
                        <label for="sunday">Sunday</label>
                    </div>
                    <div class="option">
                        <input type="checkbox" id="monday" name="days" value="monday">
                        <label for="monday">Monday</label>
                    </div>
                    <div class="option">
                        <input type="checkbox" id="tuesday" name="days" value="tuesday">
                        <label for="tuesday">Tuesday</label>
                    </div>
                    <div class="option">
                        <input type="checkbox" id="wednesday" name="days" value="wednesday">
                        <label for="wednesday">Wednesday</label>
                    </div>
                    <div class="option">
                        <input type="checkbox" id="thursday" name="days" value="thursday">
                        <label for="thursday">Thursday</label>
                    </div>
                    <div class="option">
                        <input type="checkbox" id="friday" name="days" value="friday">
                        <label for="friday">Friday</label>
                    </div>
                    <div class="option">
                        <input type="checkbox" id="saturday" name="days" value="saturday">
                        <label for="saturday">Saturday</label>
                    </div>
                </div>
            
                <div id="time">
                    <div class="option">
                        <label for="start-time">Start Time:</label>
                        <input type="time" id="start-time" name="start-time">
=======
                      
                        <input type="checkbox" id="start-date" name="sunday">Sunday
                    </div>
                    <div class="option">
                     
                        <input type="checkbox" id="end-date" name="monday">Monday
                    </div>
                    <div class="option">
                        
                        <input type="checkbox" id="start-time" name="tuesday">Tuesday
>>>>>>> 3743b794713326cdd3fee530df43975b9a74f7f5
                    </div>
                    <div class="option">
                        
                        <input type="checkbox" id="end-time" name="wednesday">wednesday
                    </div>
                    <div class="option">
                        
                        <input type="checkbox" id="end-time" name="thursday">Thursday
                    </div>
                    <div class="option">
                       
                        <input type="checkbox" id="end-time" name="friday">Friday
                    </div>
                    <div class="option">
                  
                        <input type="checkbox" id="end-time" name="saturday">Saturday
                    </div>
                </div>
            </div>
            

            </div>
        </div>
        </form>
        <!-- <div class="second-div" style="display:<?php echo $second_div;?>">
        <div class="second-div-person">
        <figure class="second-div-figure">
            <img src="../resource/person1.jpg" alt="img not found" height="500" width="500">
            <figcaption class="figcaption-name">Anonymous</figcaption>
        </figure>
            <span class="person-tags">tags:coding , programming</span>
            <span class="available-at">3:50 - 6:00</span>
            <span class="experience"> 2 years</span>
        </div>


        </div> -->
    
       <?php 
       echo "<div class='second-div' style='display:".$second_div.";'>";
       foreach($namearr as $x)
       {
           echo "<div class='second-div-person' ><figure class='second-div-figure' style ='display:flex; flex-direction:column;'><img src='../resource/person1.jpg' height='500' width='500'><figcaption class='figcaption-name'>" .htmlspecialchars($x) . "</figcaption><span class='person-tags'>tags:";
           $conn = new mysqli("localhost","root","","diode");
           if($conn->connect_error)
           {
               die("welp". $conn->connect_error);  
           }
           $query = "SELECT programming , data_science, ai , software_engineering , database_management, networking , cloud , ui_ux FROM mentor_info WHERE username =? ";
           $stms = $conn->prepare( $query );
           $stms->bind_param("s", $x);
           $stms->execute();
           $result= $stms->get_result();  
           if($result->num_rows > 0)
           {
               while($row = $result->fetch_assoc())
               {
                   if($row['programming']==1)
                   {
                       echo "programming ,";
                   }
                   
                   if($row['data_science']==1)
                   {
                       echo "data science ,";
                   }
                   
                   if($row['ai']==1)
                   {
                       echo "ai , ";
                   }
                   
                   if($row['software_engineering']==1)
                   {
                       echo  "software engineering";
                   }
                   
                   if($row['database_management']==1)
                   {
                      
                       echo "database management ,";
                   }
                   
                   if($row['networking']==1)
                   {
                       echo "networking ,";
                   }
                   
                   if($row['cloud']==1)
                   {
                       echo "cloud ,";
                   }
                   
                   if($row['ui_ux']==1)
                   {
                       echo "ui ux";
                   }
                   
               }
       
           }
           $conn->close();
           $stms->close();
           $result->close();
           echo "</span><span class='available-at'>";
           ////////////////////////////////
           $conn = new mysqli("localhost","root","","diode");
           if($conn->connect_error)
           {
               die("welp2". $conn->connect_error);  
           }
           $query = "SELECT start_time , end_time FROM schedule WHERE username = ? ";
           $stms = $conn->prepare( $query );
           $stms->bind_param("s", $x);
           $stms->execute();
           $result= $stms->get_result();  
           if($result->num_rows > 0)
           {
               while($row = $result->fetch_assoc())
               {
                  echo htmlspecialchars($row['start_time']) . "to " . htmlspecialchars($row['end_time']);
                   
               }
       
           }
           $conn->close();
           $stms->close();
           $result->close();
           echo "</span><span class='experience'>";
       
           ////////////////////////////////
           $conn = new mysqli("localhost","root","","diode");
           if($conn->connect_error)
           {
               die("welp3". $conn->connect_error);  
           }
           $query = "SELECT first_exp , second_exp , third_exp , fourth_exp FROM mentor_experience WHERE username = ? ";
           $stms = $conn->prepare( $query );
           $stms->bind_param("s", $x);
           $stms->execute();
           $result= $stms->get_result();  
           if($result->num_rows > 0)
           {
               while($row = $result->fetch_assoc())
               {
                  if($row['first_exp']==1)
                  {
                   echo "Less than 6 Months";
                  }
                  else if ($row['second_exp']==1)
                  {
                   echo "6 Months - 1 Year";
                  }
                  else if($row['third_exp']==1)
                  {
                   echo "1 Year - 2 Year";
                  }
                  else if ($row['fourth_exp']==1)
                  {
                   echo "2 Year - 4 Year";
                  }
               }
       
           }
           $conn->close();
           $stms->close();
           $result->close();
           echo "</span><form method='POST' action='profile.php' ><input type='text' value='".$x. "'style='display:none;' name ='user'><input type='submit' value='Class' style='width:100px; height:50px;border-radius:50px; background-color:red;'></form></div>";
           ////////////////////////////////
       
       }
       echo "</div>";
       ?>


    
        <script src="../js/sh-script.js"></script>
    </body>
</html>