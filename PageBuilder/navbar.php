<?php
  //ob_start();
if (session_status() != PHP_SESSION_ACTIVE)
  session_start();


//if (isset($_SESSION['userName']))
  $validserver=($_SERVER['REQUEST_URI']!='/SOEN341/') && ($_SERVER['REQUEST_URI']!='/Soen341/index.php') && ($_SERVER['REQUEST_URI']!='/SOEN341/index.php')&&($_SERVER['REQUEST_URI']!='/Soen341/')&& ($_SERVER['REQUEST_URI']!='/soEN341/') && ($_SERVER['REQUEST_URI']!='/SOEN341/?Lang=En') && ($_SERVER['REQUEST_URI']!='/SOEN341/?Lang=Fr') && (isset($_SESSION['userName']) && ($_SESSION['userName'] != 'GUEST'));
// else
//   $validserver=($_SERVER['REQUEST_URI']!='/SOEN341/') && ($_SERVER['REQUEST_URI']!='/Soen341/index.php') && ($_SERVER['REQUEST_URI']!='/SOEN341/index.php')&&($_SERVER['REQUEST_URI']!='/Soen341/')&& ($_SERVER['REQUEST_URI']!='/soEN341/') && ($_SERVER['REQUEST_URI']!='/SOEN341/?Lang=En') && ($_SERVER['REQUEST_URI']!='/SOEN341/?Lang=Fr');

$validserver2=($_SERVER['REQUEST_URI']!='/SOEN341/')&& ($_SERVER['REQUEST_URI']!='/Soen341/index.php') &&($_SERVER['REQUEST_URI']!='/Soen341/')&& ($_SERVER['REQUEST_URI']!='/SOEN341/index.php')&& ($_SERVER['REQUEST_URI']!='/soEN341/')&& ($_SERVER['REQUEST_URI']!='/SOEN341/?Lang=En') && ($_SERVER['REQUEST_URI']!='/SOEN341/?Lang=Fr');
changeLanguage();
function changeLanguage()
{
  if(isset($_GET['Lang'])){
    if($_GET['Lang'] == 'Fr')
      $_SESSION['dispEng'] = 0;
    else
      $_SESSION['dispEng'] = 1;
  }
  //default language
  if(!isset($_SESSION['dispEng']))
  	$_SESSION['dispEng'];
}

?>
<nav class="navbar navbar-expand-md navbar-dark bg-primary sticky-top">
  <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
    <span class="navbar-toggler-icon"></span>
  </button>

        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link font-weight-bold" href="../Soen341/">
                  <?php
                    if($_SESSION['dispEng'])
                      echo "SequenceBuilder";
                    else
                      echo "SéquenceDesCours";
                  ?>
                </a>
            </li>
        </ul>

        <div class="collapse navbar-collapse" id="collapse_target">

        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

         <?php
          if($validserver2){ ?>
          <li class="nav-item">
                <a class="nav-link" href="Generate.php">
                  <?php
                    if($_SESSION['dispEng'])
                      echo "ScheduleGenerator";
                    else
                      echo "GénérateurD'horaire";
                  ?>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Constraints.php">
                  <?php
                    if($_SESSION['dispEng'])
                      echo "ProgramSchedule";
                    else
                      echo "HoraireDuProgram";
                  ?>
                </a>
            </li>
          <?php } ?>
            <li class="nav-item">
                <a class="nav-link" href="about.php">
                  <?php
            				if($_SESSION['dispEng'])
            					echo "About us";
            				else
            					echo "À propos";
                  ?>
                </a>
            </li>
        </ul>


        <?php
         if($validserver){ ?>
         <ul class="navbar-nav ">
               <!-- PROFILE DROPDOWN - scrolling off the page to the right -->
               <li class="nav-item dropdown">
                   <a href="#" class="nav-link dropdown-toggle" id="navDropDownLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

               <?php
               if($_SESSION['dispEng'])
               	echo "Welcome";
               else
               	echo "Bienvenue";

                if(isset($_SESSION['loggedin']))
                 echo ', '.$_SESSION['userName'];
               ?>

           </a>
                   <div class="dropdown-menu" aria-labelledby="navDropDownLink">

                     <a class="dropdown-item" href="profilePage.php">
						<?php
							if($_SESSION['dispEng'])
								echo "Profile";
							else
								echo "Profil";
						?>
					 </a>
                       <div class="dropdown-divider"></div>
                       <a class="dropdown-item" href="FrontEnd/logout.php">
							<?php
								if($_SESSION['dispEng'])
									echo "Logout";
								else
									echo "Déconnexion";
							?>
					   </a>
                   </div>
               </li>
           </ul>
         <?php } ?>
        </div>
    </nav>

<script>
 function LangURLChanger(Lang){
      var currentPage = window.location.href;

      if(currentPage == currentPage.replace('Lang','x'))
        window.location.href = currentPage+'?Lang='+Lang;
      else
        window.location.href = currentPage.substring(0,currentPage.length-2)+Lang;
      }
</script>
<?php

 ?>
