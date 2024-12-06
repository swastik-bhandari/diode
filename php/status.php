<?php 
session_start();
if (!isset($_SESSION["username"])){
header("Location:login-login.php");
exit();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Find Your Mentor</title>
        <link rel="stylesheet" href="../css/st-style.css">
    </head>
    <body>
        <?php 
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $Mentor = isset($_POST['Mentor']) ? 1 : 0; // Checkbox values
    $Student = isset($_POST['Student']) ? 1 : 0;
    $Programming = isset($_POST['Programming']) ? 1 : 0;
    $Data_Science = isset($_POST['Data-Science']) ? 1 : 0;
    $AI = isset($_POST['AI']) ? 1 : 0;
    $Software_Engineering = isset($_POST['Software-Engineering']) ? 1 : 0;
    $Database_Management = isset($_POST['Database-Management']) ? 1 : 0;
    $Networking = isset($_POST['Networking']) ? 1 : 0;
    $Cloud = isset($_POST['Cloud']) ? 1 : 0;
    $UI_UX = isset($_POST['UI/UX']) ? 1 : 0;
   
    // Experience fields
    $Less6M = isset($_POST['Less6M']) ? 1 : 0;
    $Mto1Y = isset($_POST['6Mto1Y']) ? 1 : 0;
    $Yto2Y = isset($_POST['1Yto2Y']) ? 1 : 0;
    $Yto4Y = isset($_POST['2Yto4Y']) ? 1 : 0;

    // Availability fields
    $Sunday = isset($_POST['Sunday']) ? 1 : 0;
    $Monday = isset($_POST['Monday']) ? 1 : 0;
    $Tuesday = isset($_POST['Tuesday']) ? 1 : 0;
    $Wednesday = isset($_POST['Wednesday']) ? 1 : 0;
    $Thursday = isset($_POST['Thursday']) ? 1 : 0;
    $Friday = isset($_POST['Friday']) ? 1 : 0;
    $Saturday = isset($_POST['Saturday']) ? 1 : 0;

    // Time fields
    $Start_Time = !empty($_POST['Start-Time']) ? $_POST['Start-Time'] : null;
    $End_Time = !empty($_POST['End-Time']) ? $_POST['End-Time'] : null;
 //-000000000000000000000000000000000
 $conn = new mysqli('localhost','root','','diode');
 if($conn->connect_error){
     die('while the first check'. $conn->connect_error);
 }
 $query = "SELECT username FROM mentor_info WHERE username=?";
 $stms = $conn->prepare($query);
 $stms->bind_param("s",$_SESSION['username']);
 $stms->execute();
 $stms->store_result();


 if($stms->num_rows > 0)
 {
     $conn->close();
    $conn = new mysqli('localhost','root','','diode');
    if($conn->connect_error){
        die('new error here'. $conn->connect_error);
    }
    $query = 'UPDATE user_status SET student = ? , mentor = ? WHERE username = ?';
    $stms = $conn->prepare($query);
    $stms->bind_param('sss',$Student , $Mentor , $_SESSION['username']);
    if($stms->execute())
    {
        $conn->close();
        $stms->close();
    }
    else{
      die('new problem in stms'. $conn->connect_error);
    }
     $conn = new mysqli("localhost", "root","" ,"diode");
     if ($conn->connect_error) {
          die("can't connect because of". $conn->connect_error);
     }
     $query = "UPDATE mentor_info SET  programming = ? , data_science = ?, ai= ?, software_engineering= ?, database_management= ?, networking= ? , cloud= ? ,ui_ux= ? WHERE username= ? ";
     $stms= $conn->prepare($query);
     $stms->bind_param("sssssssss", $Programming , $Data_Science , $AI , $Software_Engineering , $Database_Management , $Networking , $Cloud , $UI_UX ,$_SESSION['username'] );
     if($stms->execute()) {
         $conn->close();
         $stms->close();
     }
     else{
         die('failed to stms->connect'. $conn->error);
     }
      $conn = new mysqli('localhost', 'root','','diode');
      if ($conn->connect_error) {
         die('failed from 2nd input'. $conn->connect_error);
      }
      $query = 'UPDATE mentor_experience SET  first_exp = ? , second_exp = ?, third_exp= ?, fourth_exp= ? WHERE username= ? ';
 
      $stms= $conn->prepare($query);
      $stms->bind_param('sssss' ,   $Less6M , $Mto1Y, $Yto2Y, $Yto4Y ,$_SESSION['username']);
      if($stms->execute()) {
         $conn->close();
         $stms->close();
      }
 
      else
      {
         die('2nd failed from stms'. $conn->error);
      }
      $conn = new mysqli('localhost', 'root','','diode');
      if ($conn->connect_error) {
         die('from 3rd conn'. $conn->connect_error);
      }
      $query = 'UPDATE weekly_schedule SET  sunday = ? , monday = ?, tuesday= ?, wednesday= ?, thursday= ?, friday= ? , saturday= ?  WHERE username= ? ';
      $stms= $conn->prepare($query);
      $stms->bind_param("ssssssss",  $Sunday , $Monday , $Tuesday, $Wednesday , $Thursday ,$Friday , $Saturday , $_SESSION['username']);
      if($stms->execute()) {
      $conn->close();
      $stms->close();
      }
      else{
         die('error from 3rd stms'. $conn->error);
      }
      $conn = new mysqli('localhost', 'root','','diode');
      if ($conn->connect_error) {
      die("connection error form the fourth query"); 
     }
 $query = "UPDATE schedule SET  start_time = ? , end_time = ? WHERE username= ? ";
     $stms = $conn->prepare($query);
     $stms->bind_param("sss" ,  $Start_Time , $End_Time,$_SESSION['username']);
     if($stms->execute()) {
         $conn->close();
         $stms->close();
 
     }
     else
     {
         die('error from the fourth stms'. $conn->error);
     }
 }
 else {
     $conn->close();

     $conn = new mysqli('localhost','root','','diode');
    if($conn->connect_error){
        die('new error here in con'. $conn->connect_error);
    }
    $query = 'INSERT INTO user_status (username , student , mentor) VAlUES (?, ?, ?)';   
    $stms = $conn->prepare($query);
    $stms->bind_param('sss',  $_SESSION['username'],$Student , $Mentor);
    if($stms->execute())
    {
        
        $conn->close();
        $stms->close();
    }
    else{
      die('new problem in stms'. $conn->connect_error);
    }

     $conn = new mysqli("localhost", "root","" ,"diode");
     if ($conn->connect_error) {
          die("can't connect because of". $conn->connect_error);
     }
     $query = "INSERT INTO mentor_info (username, programming , data_science, ai, software_engineering, database_management, networking , cloud ,ui_ux) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
     $stms= $conn->prepare($query);
     $stms->bind_param("sssssssss", $_SESSION['username'],$Programming , $Data_Science , $AI , $Software_Engineering , $Database_Management , $Networking , $Cloud , $UI_UX );
     if($stms->execute()) {
         $conn->close();
         $stms->close();
     }
     else{
         die('failed to stms->connect'. $conn->error);
     }
      $conn = new mysqli('localhost', 'root','','diode');
      if ($conn->connect_error) {
         die('failed from 2nd input'. $conn->connect_error);
      }
      $query = 'INSERT INTO mentor_experience (username , first_exp , second_exp , third_exp , fourth_exp) VALUES (?, ?, ?, ?, ?)';
 
      $stms= $conn->prepare($query);
      $stms->bind_param('sssss' , $_SESSION['username'],  $Less6M , $Mto1Y, $Yto2Y, $Yto4Y);
      if($stms->execute()) {
         $conn->close();
         $stms->close();
      }
 
      else
      {
         die('2nd failed from stms'. $conn->error);
      }
      $conn = new mysqli('localhost', 'root','','diode');
      if ($conn->connect_error) {
         die('from 3rd conn'. $conn->connect_error);
      }
      $query = 'INSERT INTO weekly_schedule (username , sunday , monday , tuesday , wednesday , thursday , friday , saturday) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
      $stms= $conn->prepare($query);
      $stms->bind_param("ssssssss", $_SESSION['username'], $Sunday , $Monday , $Tuesday, $Wednesday , $Thursday ,$Friday , $Saturday);
      if($stms->execute()) {
      $conn->close();
      $stms->close();
      }
      else{
         die('error from 3rd stms'. $conn->error);
      }
      $conn = new mysqli('localhost', 'root','','diode');
      if ($conn->connect_error) {
      die("connection error form the fourth query"); 
     }
 $query = "INSERT INTO schedule (username , start_time , end_time) VALUES (? ,? ,?)";
     $stms = $conn->prepare($query);
     $stms->bind_param("sss" , $_SESSION['username'], $Start_Time , $End_Time);
     if($stms->execute()) {
         $conn->close();
         $stms->close();
 
     }
     else
     {
         die('error from the fourth stms'. $conn->error);
     }
 }

    //0000000000000000000000000000000000
   

}
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
        <div id = "st-categories">
            <div id = "cat1" class = "cat">
                <div class="category-type">
                    <p>You are a :</p>
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
                    <p>Proficiencies:</p>
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
                        <input type="checkbox" id="ui-ux" name="UI/UX">
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
                        <input type="checkbox" id="6mto1y" name="6Mto1Y">
                        <label for="6mto1y">6 month - 1 year</label>
                    </div>

                    <div class="option">
                        <input type="checkbox" id="1yto2y" name="1Yto2Y">
                        <label for="1yto2y">1 year - 2 years</label>
                    </div>

                    <div class="option">
                        <input type="checkbox" id="2yto4y" name="2Yto4Y">
                        <label for="2yto4y">2 years - 4 years</label>
                    </div>

                    <div class="option">
                        <input type="checkbox" id="more4y" name="More4Y">
                        <label for="more4y">4+ years</label>
                    </div>
                </div>
            </div>

            <div id="cat4" class="cat">
                <div class="category-type">
                    <p>Availability:</p>
                </div>

                <div class="options">
                    <div class="option">
                        <input type="checkbox" id="sunday" name="Sunday" value="sunday">
                        <label for="sunday">Sunday</label>
                    </div>
                    <div class="option">
                        <input type="checkbox" id="monday" name="Monday" value="monday">
                        <label for="monday">Monday</label>
                    </div>
                    <div class="option">
                        <input type="checkbox" id="tuesday" name="Tuesday" value="tuesday">
                        <label for="tuesday">Tuesday</label>
                    </div>
                    <div class="option">
                        <input type="checkbox" id="wednesday" name="Wednesday" value="wednesday">
                        <label for="wednesday">Wednesday</label>
                    </div>
                    <div class="option">
                        <input type="checkbox" id="thursday" name="Thursday" value="thursday">
                        <label for="thursday">Thursday</label>
                    </div>
                    <div class="option">
                        <input type="checkbox" id="friday" name="Friday" value="friday">
                        <label for="friday">Friday</label>
                    </div>
                    <div class="option">
                        <input type="checkbox" id="saturday" name="Saturday" value="saturday">
                        <label for="saturday">Saturday</label>
                    </div>
                </div>
            
                <div class="option">
                    <label for="start-time">Start Time:</label>
                    <input type="time" id="start-time" name="Start-Time">
                </div>
                <div class="option">
                    <label for="end-time">End Time:</label>
                    <input type="time" id="end-time" name="End-Time">
                </div>
                <input type="submit" value="submit" name="Submit" height="100" width="200">
                </div>
            </div>
            

            </div>
        </div>
        </form>
        <script src="../js/st-script.js"></script>
    </body>
</html>