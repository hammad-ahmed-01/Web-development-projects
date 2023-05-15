<! Author==Hammad Ahmed>
<! HTML VS code>

<!Doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <title> Student - Page </title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div id="home" class="home" style="background: url('home_page.jpg') no-repeat center center/cover;">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Student Portal</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Menu
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Home</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#attendance">Attendance Section</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex" role="search" action="index.php">
                        <button class="btn btn-outline-success">Logout</button>
                    </form>
                </div>
            </div>
        </nav>  
        <div class="content h-100">
            <div class="d-flex h-100 text-center align-items-center">
                <div class="w-100 text-white">
                    <h1><span class="special">Welcome to your account</span></h1>
                    <br>
                    <p style="color: black;">CHECK Line 85 of this page and Line 6 of 'student_attendance.php' if you want to check complete db backed output</p>
                </div>
            </div>
        </div>
    </div>
    <div id="attendance" class="home">
        <div class="w-100 text-white" style="margin: 30px;">
            <h1><span class="special">Check Your Attendance Here</span></h1>
        </div>
        <br>
        <section>
        <h3>Your Attendance: <span id="count"><?php include 'student_attendance.php' ?></span>%</h3>

        <script>
            let percentage = document.getElementById('count');
            console.log(percentage.innerHTML);
            if(percentage.innerHTML < 75){
                percentage.style.color = "red";
                percentage.style.fontWeight = "bold";
            } 
            else if(percentage.innerHTML < 85){
                percentage.style.color = "yellow";
            } 
            else{
                percentage.style.color = "green";
            } 
        </script>

        <br>
        <?php
        	session_start();
            include("db.php");
            $db=$conn;
            $ID = "964626284";
            // uncomment the below line when you login with tables in database
            // $ID = $_SESSION["id"];
            // fetch query
            function fetch_data(){
              global $db, $ID;
              $query="SELECT * FROM attendance where attendance.studentid = '$ID'";
              $exec=mysqli_query($db, $query);
              if(mysqli_num_rows($exec)>0){
                $row= mysqli_fetch_all($exec, MYSQLI_ASSOC);
                return $row;  
                    
              }else{
                return $row=[];
              }
            }
            $fetchData= fetch_data();
            show_data($fetchData);
            
            function show_data($fetchData){
             echo '<table border="1" style="border: 2px solid white; color: black; background-color: white;">
                    <tr>
                        <th>Class ID</th>
                        <th>Attendance</th>
                        <th>Comments</th>
                    </tr>';
            
             if(count($fetchData)>0){
                  $sn=1;
                  foreach($fetchData as $data){ 
            
              echo "<tr>
                      <td>".$data['classid']."</td>
                      <td>".$data['isPresent']."</td>
                      <td>".$data['comments']."</td>
               </tr>";
                   
              $sn++; 
                 }
            }else{
                 
              echo "<tr>
                    <td colspan='3'>No Data Found</td>
                   </tr>"; 
            }
              echo "</table>";
            }
        ?>
        <br>
        </section>
    </div>
</body>
</html>