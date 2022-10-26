<?php
  // Identifiant de page
  $page = 'menu';
  include('inclusions/entete.inc.php');

  // Obtenir une citation aléatoire
  $citation = obtenirCitation($page);

  //Obtenir et afficher les infos dans le menu qui sont disponibles dans le resto
  $listMenuVin = afficherNomInfoMenuVin($page, $lan);

?>

<div class="contenu-principal">
  <div class="citation">
    <img src="images/menu-citation.jpg" alt="">
    <blockquote>
      <?= $citation['texte']; ?>
      <cite>- <?= $citation['auteur']; ?></cite>
    </blockquote>
  </div>
  <div class="carte">

    <!-- Un élément SECTION pour chaque section du Menu  foreach-->
    <?php foreach($listMenuVin as $categorieMenu => $lesMenusPlats) { ?>
    <section>
      <h2><?= $categorieMenu ?></h2>
      <ul>
        <!-- Un élément LI pour chaque article (plat) foreach-->
        <?php foreach($lesMenusPlats as $unMenuPlat) { ?>
        <li>
        
          <!-- Si le plat à un description, alors aligner les points avec les prix avec la description du plat, sinon on aligne avec le nom du plat -->
        <?php if($unMenuPlat["desc"] == "") { ?>
            <span><?= $unMenuPlat["nom"] ?>
            <i><?= $unMenuPlat["desc"] ?></i></span>
        <?php } ?>

          <?php if($unMenuPlat["desc"] !== "") { ?>
            <span><?= $unMenuPlat["nom"] ?>
            <br><i><?= $unMenuPlat["desc"] ?></i></span>
          <?php } ?>
          <!-- Fin condition if statement de la description Menu-->

          <span class="prix">
          <i class="article-menu-portion">
            <!-- Si la portion du plat est supérieur à 1, on affiche la portion -->
            <?php if($unMenuPlat["portion"] > 1) { ?>
            (<?= $mnuPortionEtiquette ?> <?= $unMenuPlat["portion"] ?>)
            <?php } ?>
          </i>
          
          <?= $unMenuPlat["prix"] ?></span>
        </li>
        <!-- Fin LI foreach-->
        <?php } ?>
      </ul>
    </section>
    <?php } ?>
    <!-- Fin section foreach -->
    
  </div>
</div>

<?php include('inclusions/pied2page.inc.php'); ?>