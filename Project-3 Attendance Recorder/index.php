<! Author == Hammad Ahmed>
<! HTML VS code> 

<!Doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<title> Attendance Recorder - Login </title>
<link rel="stylesheet" href="index.css">
</head>

<body>
<div class="login-page">
    <div class="caption-col col">
        <div class="caption span">
           <span class="middle">Attendance Recorder <span class="special" id="caption">Student</span></span>
        </div>
    </div>
    <div class="log-col col">

        <!-- Pills navs -->
        <div class="logincontainer container-sm">
            <ul class="nav nav-pills nav-justified" id="ex1" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="tab-Student" data-mdb-toggle="pill" href="#pills-Student" role="tab"
                        aria-controls="pills-Student" onclick="shift_to_student()">Student</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="tab-Teacher" data-mdb-toggle="pill" href="#pills-Teacher" role="tab"
                        aria-controls="pills-Teacher" onclick="shift_to_teacher()">Teacher</a>
                </li>
            </ul>
        <!-- Pills navs -->
        

        <br><br>


        <!-- Pills content -->
        <div class="tab-content">

            <!-- Student -->
            <div id="Student" class="tab-pane fade show active" id="pills-Student" role="tabpanel" aria-labelledby="tab-Student">
                <form action="validate_student.php" method="post">
                    <div class="form-outline container-sm">
                        <input name="studentId" type="text" id="StudentId" class="form-control" />
                        <label class="form-label" for="StudentId">Enter Your ID:</label>
                        <br><br>
                        <button name="submit" type="submit" class="btn btn-primary btn-block mb-4">Log in</button>
                    </div>
                </form>
                <br><br><br>
                <form action="student.php" method="post">
                    <div class="form-outline container-sm">
                        <label class="form-label" for="StudentId">Login Aniways (Just to Check)</label>
                        <br>
                        <button name="submit" type="submit" class="btn btn-primary btn-block mb-4">Log in</button>
                    </div>
                </form>
            </div>

            <!-- Teacher -->
            <div id="Teacher" class="tab-pane fade show active" id="pills-Teacher" role="tabpanel" aria-labelledby="tab-Teacher">
                <form action="validate_teacher.php" method="post">    
                    <div class="form-outline container-sm">
                        <input name="teacherId" type="text" id="TeacherId" class="form-control" />
                        <label class="form-label" for="TeacherId">Enter Your ID: </label>
                        <br><br>
                        <button name="submit" type="submit" class="btn btn-primary btn-block mb-3">Log in</button>
                    </div>
                </form>
                <br><br><br>
                <form action="teacher.php" method="post">
                    <div class="form-outline container-sm">
                        <label class="form-label" for="StudentId">Login Aniways (Just to Check)</label>
                        <br>
                        <button name="submit" type="submit" class="btn btn-primary btn-block mb-4">Log in</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Pills content -->
        
        </div>
    </div>
</div>

<script>
    let Student = document.getElementById("Student");
    let Teacher = document.getElementById("Teacher");
    let caption = document.getElementById("caption");
    let studentTab = document.getElementById("tab-Student");
    let teacherTab = document.getElementById("tab-Teacher");

    function shift_to_teacher() {
        teacherTab.className += " active";
        studentTab.classList.remove('active');
        Student.style.display = "none";
        Teacher.style.display = "block";
        caption.innerHTML = "Teacher";
    }

    function shift_to_student() {
        studentTab.className += " active";
        teacherTab.classList.remove('active');
        Teacher.style.display = "none";
        Student.style.display = "block";
        caption.innerHTML = "Student";
    }
</script>
</body>
</html>