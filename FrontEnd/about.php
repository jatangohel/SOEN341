
<?php
require_once __DIR__.'/../PageBuilder/header.php';
require_once __DIR__.'/../PageBuilder/navbar.php';
require_once __DIR__.'/../PageBuilder/footer.php'; ?>
<?php
if (session_status() != PHP_SESSION_ACTIVE)
{
  ob_start();
  session_start();
}
?>

<head>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <style>

  body {
    /* padding-top: 56px; */
  }

  .carousel-item {
    height: 65vh;
    min-height: 300px;
    background: no-repeat center center scroll;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
  }

  .portfolio-item {
    margin-bottom: 30px;
  }


 }
  </style>
</head>

<body>

  <!-- Page Content -->
  <div class="container">
    <h1 >
      <?php
  			if($_SESSION['dispEng'])
  				echo "About us";
  			else
  				echo "À propos";
      ?>
    </h1>
    <div class="row">
      <div class="col-lg-6">

        <p>
          <?php
    				if($_SESSION['dispEng'])
    					echo "Schedule Builder is a Concordia University website that helps Software Engineering students to easily build their own schedule and plan their graduation. Our website allows students to:  ";
    				else
    					echo "Schedule Builder est un site Internet de l'universié Concordia qui aide les étudiants en Software Engineering à facilement planifier horaire et planifier
    							leur graduation. Notre site permet aux étudiants de:  ";
    			?>
        </p>
        <ul>
          <li>
            <?php
    					if($_SESSION['dispEng'])
    						echo "Check class availability";
    					else
    						echo "Vérifier la disponibilité des cours";
    				?>
          </li>
          <li>
            <?php
    					if($_SESSION['dispEng'])
    						echo "Check all SOEN classes including all sections, tutorials, and labs";
    					else
    						echo "Vérifier tout les cours de SOEN incluant toutes les sections, tutoriels et labs";
    				?>
          </li>
          <li>
            <?php
    					if($_SESSION['dispEng'])
    						echo "Optimize their schedule according to their prefrences";
    					else
    						echo "Optimiser leur horaire en fonction de leurs préférences";
    				?>
          </li>
          <li>
            <?php
    					if($_SESSION['dispEng'])
    						echo "Plan for graduation";
    					else
    						echo "Planifier pour la graduation";
  				  ?>
        </li>
        </ul>
        <p>
          <?php
    				if($_SESSION['dispEng'])
    					echo "The Error404 team is composed of skilled developers, creative designers, and most importantly, students who actually understand the needs of every university student.";
    				else
    					echo "L'équipe Error404 est composée de developeurs expérimentés, designers créatifs et surtout des étudiants qui comprennent les besions de tout les étudiants universitaires.";
    			?>
        </p>
      </div>
      <div class="col-lg-6">
        <img class="img-fluid rounded" src="http://www.concordia.ca/cunews/main/stories/2017/09/06/meet-the-8-new-concordia-university-research-chairs/_jcr_content/parsys/image.img.png/1504640103973.png" alt="">
      </div>
    </div>


    <!-- Portfolio Section -->
    <h2>
      <?php
  			if($_SESSION['dispEng'])
  				echo "Team Members";
  			else
  				echo "Les membres";
  		?>
    </h2>

    <div class="row">
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-75">
          <img class="card-img-top" src="../images/KHALID.jpg" >
          <div class="card-body">
            <h4 class="card-title">
              <p class="card-text">Khalid Hassanain</p>
            </h4>
            <p class="card-text">
              <?php
      					if($_SESSION['dispEng'])
      						echo "Team leader, Computer Engineering student, experienced in Web Development, Marketing, Project Design and Project Management.";
      					else
      						echo "Chef d'équipe, étudiant en génie informatique, expérimenté en développement web, marketing, conception de projet et gestion de projet.";
      				?>
             </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-75 ">
          <img class="card-img-top" src="../images/HANI.jpg" >
          <div class="card-body">
            <h4 class="card-title">
              <p class="card-text">Hani Sabsoob</p>
            </h4>
            <p class="card-text">
              <?php
      					if($_SESSION['dispEng'])
      						echo "Development team member, Software Engineering Student, experienced in Web Development and Project Management, Data Analyst.";
      					else
      						echo "Membre de l'équipe de développement, étudiant en génie logiciel, expérimenté en développement web et gestion de projet, analyste de données.";
      				?>
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-75">
          <img class="card-img-top" src="../images/JATAN.jpg" >
          <div class="card-body">
            <h4 class="card-title">
              <p class="card-text">Jatan Gohel</p>
            </h4>
            <p class="card-text">
              <?php
      					if($_SESSION['dispEng'])
      						echo "Development team member, Software Engineering Graduate Student, experienced in Front-end Development, Responsive Web Designs, Graphic Designing and UI / UX
      								Development, Data Analyst, interested in tutoring.";
      					else
      						echo "Membre de l'équipe de développement, étudiant diplomé en génie logiciel, expérimenté en développement frontal, conceptions web, conception graphique et
      								développement UI / UX, analyste de données, intéressé en tutorat.";
      				?>
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-75">
          <img class="card-img-top" src="../images/KECHENG.png" >
          <div class="card-body">
            <h4 class="card-title">
              <p class="card-text">Kecheng Yao</p>
            </h4>
            <p class="card-text">
              <?php
      					if($_SESSION['dispEng'])
      						echo "Development team member, Computer Engineering Student, experienced in Marketing, Projet design and management.";
      					else
      						echo "Membre de l'équipe de développement, étudiant en génie informatique, expérimenté en marketing, conception de projet et gestion de projet.";
      				?>
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-75">
          <img class="card-img-top" src="../images/MARIO2.jpg" >
          <div class="card-body">
            <h4 class="card-title">
              <p class="card-text">Mario Gaudio</p>
            </h4>
            <p class="card-text">
              <?php
      					if($_SESSION['dispEng'])
      						echo "Development team member, Computer Engineering Student, experienced in FPGA design using VHDL, Project Testing, Academic and personal projects.";
      					else
      						echo "Membre de l'équipe de développement, étudiant en génie informatique, expérimenté en conception FPGA en VHDL, test de projet, projets académiques et personnels.";
      				?>
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-75">
          <img class="card-img-top" src="../images/OSAMA.jpg" >
          <div class="card-body">
            <h4 class="card-title">
              <p class="card-text">Mohammad Osama Qalam</p>
            </h4>
            <p class="card-text">
              <?php
      					if($_SESSION['dispEng'])
      						echo "Development team member, Electrical Engineering Student, Imaging applications specialist, Research assistant on optical receiver's design, private tutor.";
      					else
      						echo "Membre de l'équipe de développement, étudiant en génie électrique, spécialitse en imagerie, assistant de recherche pour la conception de receveurs
      								optiques, tutorat.";
      				?>
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-75">
          <img class="card-img-top" src="../images/HEFNY.jpg" >
          <div class="card-body">
            <h4 class="card-title">
              <p class="card-text">Mohamed Hefny</p>
            </h4>
            <p class="card-text">
              <?php
      					if($_SESSION['dispEng'])
      						echo "Development team member, Software Engineering Student, experienced in Website Development using WordPress and Database Developement.";
      					else
      						echo "Membre de l'équipe de développement, étudiant en génie logiciel, expérimenté en development de sites web en WordPress et development de bases de données.";
      				?>
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-75">
          <img class="card-img-top" src="../images/LAITH.jpg" >
          <div class="card-body">
            <h4 class="card-title">
              <p class="card-text">Mhd Laith Awad</p>
            </h4>
            <p class="card-text">
              <?php
      					if($_SESSION['dispEng'])
      						echo "Development team member, Software Engineering Student, Imaging applications specialist, participated in multiple coding competitions.";
      					else
      						echo "Membre de l'équipe de développement, étudiant en génie logiciel, spécialiste en imagerie, a participé à plusieurs compétitions de programmation.";
      				?>
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-75">
          <img class="card-img-top" src="../images/MINHAO.jpg" >
          <div class="card-body">
            <h4 class="card-title">
              <p class="card-text">Minhao Yu</p>
            </h4>
            <p class="card-text">
              <?php
      					if($_SESSION['dispEng'])
      						echo "Development team member, Electrical Engineering Student, experienced in writing programs using high-level languages like C++ and Java.";
      					else
      						echo "Membre de l'équipe de développement, étudiant en génie électrique, expérimenté en development de programmes utilisant des langues de haut niveau comme C++ et Java.";
      				?>
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-75">
          <img class="card-img-top" src="../images/NOOR.jpg" >
          <div class="card-body">
            <h4 class="card-title">
              <p class="card-text">Noor Al-Musleh</p>
            </h4>
            <p class="card-text">
              <?php
      					if($_SESSION['dispEng'])
      						echo "Development team member, Computer Engineering Student, experienced in Mobile app development, project design and management, Research analyst.";
      					else
      						echo "Membre de l'équipe de développement, étudiant en génie informatique, expérimenté en development d'applications mobiles, conception et gestion de projet, analyste de recherche.";
      				?>
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-75 ">
          <img class="card-img-top" src="../images/YIFAN.png" >
          <div class="card-body">
            <h4 class="card-title">
              <p class="card-text">Yifan Yang</p>
            </h4>
            <p class="card-text">
              <?php
      					if($_SESSION['dispEng'])
      						echo "Development team member, Software Engineering Student, experienced in multiple programming developments using Java, Ruby, HTML, JavaScript, PHP, LISP, Prolog and C.";
      					else
      						echo "Membre de l'équipe de développement, étudiant en génie logiciel, expérimenté en plusieurs developments de programmes en Java, Ruby, HTML, JavaScript, PHP, LISP, Prolog et C.";
      				?>
            </p>
          </div>
        </div>
      </div>
    </div>





  </div>
  <!-- /.container -->
<br><br><br>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
