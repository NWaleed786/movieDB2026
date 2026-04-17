<?php require("header.php"); ?>
<?php require("fonctions.php"); ?>
<?php
// Vérification de l'existence et du contenu du paramètre
$query = isset($_GET['query']) ? trim($_GET['query']) : '';
$movies = [];
if (!empty($query)) {
    $movies = searchMovies($query);
}
?>

<div class="album py-5 bg-body-tertiary">
  <div class="container">
       <h4>Recherche de films</h4>
       <?php if (empty($query)) : ?>
            <p>Veuillez saisir un mot-clé dans la barre de recherche pour trouver des films.</p>
       <?php else : ?>
            <p>Résultats pour <strong><?php echo htmlspecialchars($query); ?></strong></p>
            <?php if (empty($movies)) : ?>
                <p>Aucun résultat trouvé.</p>
            <?php else : ?>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
                <?php foreach($movies as $movie) : ?>
                    <div class="d-flex align-items-stretch">
                        <div class="card shadow-sm">
                            <?php if (!empty($movie['poster_path'])) : ?>
                            <img src="<?php echo 'https://image.tmdb.org/t/p/w500'.$movie['poster_path']; ?>" alt="Affiche film" class="card-img-top" />
                            <?php endif; ?>
                            <div class="card-body lh-sm d-flex flex-column">
                                <p class="lh-sm"><strong><?php echo $movie['title']; ?></strong></p>
                                <p class="text-muted">Date de sortie : <?php echo $movie['release_date']; ?></p>
                                <p class="text-muted">Note : <?php echo $movie['vote_average']; ?>/10</p>
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