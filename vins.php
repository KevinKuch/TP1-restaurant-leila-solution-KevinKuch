<?php
  // Identifiant de page
  $page = 'vins';
  include('inclusions/entete.inc.php');

  // Obtenir une citation aléatoire
  $citation = obtenirCitation($page);

  //Obtenir et afficher les infos des bouteilles de Vin disponible du resto
  $listMenuVin = afficherNomInfoMenuVin($page, $lan);
 
?>

<div class="contenu-principal">
  <div class="citation">
    <img src="images/vins-citation.png" alt="">
    <blockquote>
      <?= $citation['texte']; ?>
      <cite>- <?= $citation['auteur']; ?></cite>
    </blockquote>
  </div>
  <form class="frm-recherche">
    <label><?= $vinRechercheEtiquette ?>
      <input type="text" name="origine" placeholder="<?= $vinRecherchePlaceholder ?>">
    </label>
  </form>
  <div class="carte">
     <!-- Un élément SECTION pour chaque section des Vins foreach-->
    <?php foreach($listMenuVin as $categorieVin => $lesVins) { ?>
    <section>
      <h2><?= mb_strtoupper($categorieVin) ?></h2>

      <ul>
      <!-- Élément LI pour chaque Vin -->
      <?php foreach($lesVins as $unVin) { ?>
        <li>
          <span>
            <span class="vin-nom"><?= $unVin["nom"] ?></span><br>
            <b class="vin-provenance">[<?= $unVin["provenance"] ?>]</b>
            <i class="vin-desc"><?= $unVin["desc"] ?></i>
          </span>
          <span class="prix"><?= $unVin["prix"] ?></span>
        </li>
      <?php } ?>
      <!-- Fin LI foreach-->
      </ul>
    </section>
    <?php } ?>
     <!-- Fin section foreach -->
  </div>
</div>
<?php include('inclusions/pied2page.inc.php'); ?>