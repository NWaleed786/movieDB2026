<?php require("header.php"); ?>
<?php require("fonctions.php"); ?>
<?php
// Vérification de l'existence et du contenu du paramètre
$query = isset($_GET['query']) ? trim($_GET['query']) : '';
$actors = [];
if (!empty($query)) {
    $actors = searchActors($query);
}
?>

<div class="album py-5 bg-body-tertiary">
  <div class="container">
       <h4>Recherche d'acteurs</h4>
       <?php if (empty($query)) : ?>
            <p>Veuillez saisir un mot-clé dans la barre de recherche pour trouver des acteurs.</p>
       <?php else : ?>
            <p>Résultats pour <strong><?php echo htmlspecialchars($query); ?></strong></p>
            <?php if (empty($actors)) : ?>
                <p>Aucun résultat trouvé.</p>
            <?php else : ?>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
                <?php foreach($actors as $actor) : ?>
                    <div class="d-flex align-items-stretch">
                        <div class="card shadow-sm">
                            <?php if (!empty($actor['profile_path'])) : ?>
                            <img src="<?php echo 'https://image.tmdb.org/t/p/w300'.$actor['profile_path']; ?>" alt="Photo acteur" class="card-img-top" />
                            <?php endif; ?>
                            <div class="card-body lh-sm d-flex flex-column">
                                <p class="lh-sm"><strong><?php echo $actor['name']; ?></strong></p>
                                <?php if (!empty($actor['known_for']) && is_array($actor['known_for'])) : ?>
                                    <p class="text-muted">
                                    <?php
                                      $known = [];
                                      foreach($actor['known_for'] as $item){
                                          if(isset($item['title'])) $known[] = $item['title'];
                                      }
                                      if(!empty($known)) echo 'Connu pour : '.implode(', ', $known);
                                    ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>
            <?php endif; ?>
       <?php endif; ?>
  </div>
</div>

<?php require("footer.php"); ?>