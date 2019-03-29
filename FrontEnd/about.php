
  <!-- Page Content -->
  <div class="container">
	<?php
		session_start();
		$_SESSION['dispEng']='0';
	?>
    <h1 >
		<?php
			if($_SESSION['dispEng'])
				echo "About us";
			else
				echo "� propos";
		?>
	</h1>
    <div class="row">
      <div class="col-lg-6">

        <p>
			<?php
				if($_SESSION['dispEng'])
					echo "Schedule Builder is a Concordia University website that helps Software Engineering students to easily build their own schedule and plan their graduation. Our website allows students to:  ";
				else
					echo "Schedule Builder est un site Internet de l'universi� Concordia qui aide les �tudiants en Software Engineering � facilement planifier horaire et planifier
							leur graduation. Notre site permet aux �tudiants de:  ";
			?>
		</p>
        <ul>
			<li>
				<?php
					if($_SESSION['dispEng'])
						echo "Check class availability";
					else
						echo "V�rifier la disponibilit� des cours";
				?>
			</li>
			<li>
				<?php
					if($_SESSION['dispEng'])
						echo "Check all SOEN classes including all sections, tutorials, and labs";
					else
						echo "V�rifier tout les cours de SOEN incluant toutes les sections, tutoriels et labs";
				?>
			</li>
			<li>
				<?php
					if($_SESSION['dispEng'])
						echo "Optimize their schedule according to their prefrences";
					else
						echo "Optimiser leur horaire en fonction de leurs pr�f�rences";
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
					echo "L'�quipe Error404 est compos�e de developeurs exp�riment�s, designers cr�atifs et surtout des �tudiants qui comprennent les besions de tout les �tudiants universitaires.";
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
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <p class="card-text">Khalid Hassanain</p>
            </h4>
            <p class="card-text">
				<?php
					if($_SESSION['dispEng'])
						echo "Team leader, Computer Engineering student, experienced in Web Development, Marketing, Project Design and Project Management.";
					else
						echo "Chef d'�quipe, �tudiant en g�nie informatique, exp�riment� en d�veloppement web, marketing, conception de projet et gestion de projet.";
				?>
			</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <p class="card-text">Hani Sabsoob</p>
            </h4>
            <p class="card-text">
				<?php
					if($_SESSION['dispEng'])
						echo "Development team member, Software Engineering Student, experienced in Web Development and Project Management, Data Analyst.";
					else
						echo "Membre de l'�quipe de d�veloppement, �tudiant en g�nie logiciel, exp�riment� en d�veloppement web et gestion de projet, analyste de donn�es.";
				?>
			</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
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
						echo "Membre de l'�quipe de d�veloppement, �tudiant diplom� en g�nie logiciel, exp�riment� en d�veloppement frontal, conceptions web, conception graphique et 
								d�veloppement UI / UX, analyste de donn�es, int�ress� en tutorat.";
				?>
			</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <p class="card-text">Kecheng Yao</p>
            </h4>
            <p class="card-text">
				<?php
					if($_SESSION['dispEng'])
						echo "Development team member, Computer Engineering Student, experienced in Marketing, Projet design and management.";
					else
						echo "Membre de l'�quipe de d�veloppement, �tudiant en g�nie informatique, exp�riment� en marketing, conception de projet et gestion de projet.";
				?>
			</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <p class="card-text">Mario Gaudio</p>
            </h4>
            <p class="card-text">
				<?php
					if($_SESSION['dispEng'])
						echo "Development team member, Computer Engineering Student, experienced in FPGA design using VHDL, Project Testing, Academic and personal projects.";
					else
						echo "Membre de l'�quipe de d�veloppement, �tudiant en g�nie informatique, exp�riment� en conception FPGA en VHDL, test de projet, projets acad�miques et personnels.";
				?>
			</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <p class="card-text">Mohammad Osama Qalam</p>
            </h4>
            <p class="card-text">
				<?php
					if($_SESSION['dispEng'])
						echo "Development team member, Electrical Engineering Student, Imaging applications specialist, Research assistant on optical receiver's design, tutoring.";
					else
						echo "Membre de l'�quipe de d�veloppement, �tudiant en g�nie �lectrique, sp�cialitse en imagerie, assistant de recherche pour la conception de receveurs 
								optiques, tutorat.";
				?>
			</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <p class="card-text">Mohamed Hefny</p>
            </h4>
            <p class="card-text">
				<?php
					if($_SESSION['dispEng'])
						echo "Development team member, Software Engineering Student, experienced in Website Development using WordPress and Database Developement.";
					else
						echo "Membre de l'�quipe de d�veloppement, �tudiant en g�nie logiciel, exp�riment� en development de sites web en WordPress et development de bases de donn�es.";
				?>
			</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <p class="card-text">Mhd Laith Awad</p>
            </h4>
            <p class="card-text">
				<?php
					if($_SESSION['dispEng'])
						echo "Development team member, Software Engineering Student, Imaging applications specialist, participated in multiple coding competitions.";
					else
						echo "Membre de l'�quipe de d�veloppement, �tudiant en g�nie logiciel, sp�cialiste en imagerie, a particip� � plusieurs comp�titions de programmation.";
				?>
			Part of the development team, </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <p class="card-text">Minhao Yu</p>
            </h4>
            <p class="card-text">
				<?php
					if($_SESSION['dispEng'])
						echo "Development team member, Electrical Engineering Student, experienced in writing programs using high-level languages like C++ and Java.";
					else
						echo "Membre de l'�quipe de d�veloppement, �tudiant en g�nie �lectrique, exp�riment� en development de programmes utilisant des langues de haut niveau comme C++ et Java.";
				?>
			</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <p class="card-text">Noor Al-Musleh</p>
            </h4>
            <p class="card-text">
				<?php
					if($_SESSION['dispEng'])
						echo "Development team member, Computer Engineering Student, experienced in Mobile app development, project design and management, Research analyst.";
					else
						echo "Membre de l'�quipe de d�veloppement, �tudiant en g�nie informatique, exp�riment� en development d'applications mobiles, conception et gestion de projet, analyste de recherche.";
				?>
			</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <p class="card-text">Yifan Yang</p>
            </h4>
            <p class="card-text">
				<?php
					if($_SESSION['dispEng'])
						echo "Development team member, Software Engineering Student, experienced in multiple programming developments using Java, Ruby, HTML, JavaScript, PHP, LISP, Prolog and C.";
					else
						echo "Membre de l'�quipe de d�veloppement, �tudiant en g�nie logiciel, exp�riment� en plusieurs developments de programmes en Java, Ruby, HTML, JavaScript, PHP, LISP, Prolog et C.";
				?>
			</p>
          </div>
        </div>
      </div>
    </div>

    <hr>



  </div>
  <!-- /.container -->
<br><br><br>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
