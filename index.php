<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Management System</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <nav>
      <label class="logo">SNC_University</label>
       <ul>
           <li><a href="">Home</a></li>
           <li><a href="">Contact</a></li>
           <li><a href="">Admission</a></li>
           <li><a href="login.php" class="btn btn-success" >Login</a></li>
       </ul> 
    </nav>
    <div class="section1">
        <label class="img_text"> We Teach Students with care</label>
        <img  class="main_img" src="unipic1.jpg">
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="welcome_img" src="unipic2.jpeg">
         </div>
         <div class="col-md-8">
            <h1>Welcome to SNC University </h1>
            <p>
            At our University , we are committed to providing world-class education, fostering innovation, 
            and shaping future leaders. 
            With experienced faculty, state-of-the-art facilities, and a student-focused approach, 
            we ensure that every learner reaches their full potential. Join us to experience excellence in education.
             Empowering minds with cutting-edge technology, our University  is a hub for innovation and research. Our dynamic curriculum and industry-driven programs prepare students for the challenges of the digital world. Step into the future with us and redefine possibilities.

             "Guided by the principles of knowledge and wisdom, our University blends modern education with strong ethical values. Our mission is to nurture students with integrity, excellence, and a passion for lifelong learning. Enroll today and embark on a journey of academic and spiritual growth.
            </p>
         </div>
        </div>
    </div>

    <center>
        <h1>Faculty Members</h1>
    </center>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="teacher" src="teacher3.jpeg">
                <p>
                Engr. Bilal Hussain <br>
                M.Eng. in Software Engineering <br>
                | Lecturer & Research Coordinator  | 
                </p>
            </div>
            <div class="col-md-4">
            <img  class="teacher"src="teacher1.jpeg">
            <p>
            Dr. Ali Rahman <br>
            Ph.D. in Computer Science <br>
             | Head of AI & Data Science Department |
            </p>
            </div>
            <div class="col-md-4">
            <img  class="teacher" src="teacher2.jpeg">
            <p>
            Prof. Ahmed Khan <br>
            M.Sc. in Mathematics <br>
            | Senior Lecturer in Applied Mathematics  | 
            </p>
            </div>
        </div>
    </div>

    <center>
        <h1>Programs & Courses</h1>
    </center>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="teacher" src="ugpic.png">
                <p>
                <h3><b>  Undergraduate (UG) Programs <br></b></h3>
                | B.Sc. (Computer Science, Physics,etc.) |<br>
                | B.Com. (Accounting & Finance, Business, etc.)  | <br>
                | B.A. (English, History, Sociology, etc.)  | 
                </p>
            </div>
            <div class="col-md-4">
            <img  class="teacher"src="pgpic.jpeg">
            <p>
            <h3><b>  Postgraduate (PG) Programs <br></b></h3>
                | M.Sc. (Computer Science, Physics,etc.) |<br>
                | M.Com. (Accounting & Finance, Business, etc.)  | <br>
                | M.A. (English, History, Sociology, etc.)  | 
            </p>
            </div>
            <div class="col-md-4">
            <img  class="teacher" src="diplomapic.jpeg">
            <p>
            <h3><b>  Diploma & Certificate Courses <br></b></h3>
                | Diploma in Web Development |<br>
                | Certificate in Digital Marketing | <br>
                | Certificate in AI & Machine Learning | 
            </p>
            </div>
        </div>
    </div>
    <center>
        <h1 class="adm">Admission Form</h1>
    </center>
    <div align="center" class="admission_form">
    <form action="data_check.php" method="POST">
        <div class="adm_int">
            <label class="label_text">Name</label> <!-- Corrected class name -->
            <input class="input_deg" type="text" name="name">
        </div>
        <div class="adm_int">
            <label class="label_text">Email</label> <!-- Corrected class name -->
            <input class="input_deg" type="text" name="email">
        </div>
        <div class="adm_int">
            <label class="label_text">Phone</label> <!-- Corrected class name -->
            <input class="input_deg" type="text" name="phone">
        </div>
        <div class="adm_int">
            <label class="label_text">Message</label> <!-- Corrected class name -->
            <textarea class="input_txt" name="message"></textarea>
        </div>
        <div class="adm_int">
            <input class="btn btn-primary" id="submit" type="submit" value="Apply" name="apply">
        </div>
    </form>
    </div>

    <footer>
        <h3 class="footer_text">All @copyright reserved by SNC University</h3>
    </footer>
</body>
</html>
