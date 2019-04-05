<?php
	$_SESSION['dispEng'];
?>
<SCRIPT>

function changeLanguage()
{
	<?php
		if($_SESSION['dispEng'])
			$_SESSION['dispEng']='0';
		else
			$_SESSION['dispEng']='1';
	?>;
}

</SCRIPT>
<footer>

  <div class="navbar navbar-inverse bg-dark fixed-bottom">
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
		<?php
			if($_SESSION['dispEng'])
				$languageHolder="Français";
			else
				$languageHolder="English";
		?>
		<input type="button" value=<?= $languageHolder?> onClick="changeLanguage(); window.location.href=window.location.href; ">
	</form> 
	<a href="#"><i class="fab fa-facebook-square"></i></a>
	<a href="#"><i class="fab fa-google"></i></a>
	<a href="#"><i class="fab fa-twitter-square"></i></a>
	<a href="#"><i class="fas fa-share-square"></i></a>
  </div>
</div>
  </footer>
