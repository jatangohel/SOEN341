<style type="text/css">
    #wrapper {min-height:100%;margin-bottom:-45px;}
  #push, #footer {height:45px;}
</style>
<div id="push"></div>
</div>
<div id="footer">

  <div class="navbar navbar-inverse bg-dark">
  <div class="navbar-text text-white pull-left">
    <p>
      <?php
      			if($_SESSION['dispEng'])
      				echo "Copyright 2019 Error404 Team";
      			else
      				echo "Copyright 2019 Équipe Error404";
      ?>
    </p>
  </div>
  <div class="navbar-text text-success text-center">
    <p>
      <?php
  			if($_SESSION['dispEng'])
  				echo "Please share this website with your friends, thanks!";
  			else
  				echo "Veuillez partager ce site avec vos amis, merci!";
      ?>
    </p>
  </div>
  <div class="navbar-text pull-right">
    <form>

  		<a href="javascript:LangURLChanger('En')">English</a><span style="color:blue;"> - </span>
  		<a href="javascript:LangURLChanger('Fr');">Français</a>

    </form>
  <a href="#"><i class="fab fa-facebook-square"></i></a>
  <a href="#"><i class="fab fa-google"></i></a>
  <a href="#"><i class="fab fa-twitter-square"></i></a>
  <a href="#"><i class="fas fa-share-square"></i></a>
  </div>
</div>

</div>
</body>
