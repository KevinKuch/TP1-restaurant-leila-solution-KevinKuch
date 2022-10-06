<?php
  // Identifiant de page
  $page = 'accueil';
  include('inclusions/entete.inc.php');
?>

<div class="contenu-principal">
  <h2><?= $accTitrePage ?></h2>
  <p><img src="images/accueil-cuisine.jpg" alt="<?= $accImgAlt ?>"><?= $accPara1 ?></p>
  <p><?= $accPara2 ?></p>
</div>

<?php include('inclusions/pied2page.inc.php'); ?>
