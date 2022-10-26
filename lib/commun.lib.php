<?php 
/********* CITATION ALÉATOIRE *************************************************/
    /**
     * Retourne une citation aléatoire.
     * @param string $section Page du site pour laquelle on veut une citation.
     * @return array Tableau associatif contenant l'info de la citation aléatoire choisie.
     */
    function obtenirCitation($section)
    {
        $citationsJson = file_get_contents('data/citations-' . $section . '.json');
        $citationsTab = json_decode($citationsJson, true);
        $positionAlea = rand(0, count($citationsTab)-1);
        $citationAleatoire = $citationsTab[$positionAlea];
        return $citationAleatoire;
    }

/********* LANGUE DU SITE *****************************************************/
    /**
     * Retourne les langues disponibles déterminées à partir du contenu du 
     * dossier 'i18n'.
     * 
     * @return array Tableau des sigles (iso-639-1) des langues disponibles.
     */
    function languesDisponibles()
    {
        $contenuI18n = scandir('i18n');
  
        $languesDisponibles = [];
        for($i = 0; $i < count($contenuI18n); $i++) {
            if($contenuI18n[$i] !== '.' && $contenuI18n[$i] !== '..') {
                $languesDisponibles[] = $contenuI18n[$i];
            }
        }

        return $languesDisponibles;
    }

    /**
     * Détermine et retourne la langue à utiliser dans le site.
     * 
     * @param string $langueParDefaut Langue à utiliser par défaut.
     * @param array $languesDisponibles Tableau des langues disponibles.
     * 
     * @return string Langue du site.
     */
    function determinerLangueSite($langueParDefaut, $languesDisponibles) 
    {
        // Langue par défaut
        $lan = $langueParDefaut;

        // Choix de langue dans un témoin HTTP
        if(isset($_COOKIE['leila-langue']) 
                && in_array($_COOKIE['leila-langue'], $languesDisponibles)) {
            $lan = $_COOKIE['leila-langue'];
        }

        // Choix de langue dans un paramètre de requête
        if(isset($_GET['langue']) 
                && in_array($_GET['langue'], $languesDisponibles)) {
            $lan = $_GET['langue'];

            // Retenir ce choix dans un témoin HTTP
            setcookie('leila-langue', $lan, time() + 365 * 24 * 3600);
        }

        return $lan;
    }

/********* MENU ET CARTE DES VINS *********************************************/

/**
 * Affiche les noms des menus et les vins 
 * 
 * @param string $sectionPage : Identification de la page des noms pour Menu et Vin
 * 
 * @param string $lang : Identifier la langue pour la page de Menu et Vin du site
 * 
 * @return array Tableau associatif contenant les infos et les noms du Menu et Vin
 */
function afficherNomInfoMenuVin($sectionPage, $lang)
{
    if(file_exists("data/$sectionPage-$lang.json")) {
        $listMenuVin = file_get_contents("data/$sectionPage-$lang.json");
    }
    else {
        $listMenuVin = file_get_contents("data/$sectionPage-fr.json");
    }
    $listMenuVinTab = json_decode($listMenuVin, true);
    $listMenusVins = $listMenuVinTab;
    return $listMenusVins;
    
}

?>