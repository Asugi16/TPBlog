<?php 
$titre = 'Mon blog';
ob_start(); 
?>
  <div align="center">
    <h1>Bienvenue sur le blog de Lulu </h1> <br />
  </div>
  <h3> Les derniers articles </h3> <br /> <br />


  <?php
  while ($data = $posts->fetch()) {
  ?>
    <div class="news">
      <h3>
        <?php echo htmlspecialchars($data['titre']); ?>
        <em>le <?php echo $data['date_creation']; ?></em>
      </h3>

      <p>
        <?php echo nl2br(htmlspecialchars($data['contenu'])); ?>
        <br />
        <em><a href="view/postView.php?id=<?= $data['id'] ?>">Commentaires</a></em>
      </p>
    </div>
  <?php
  }
  $posts->closeCursor();

  ?>

  <div>
    <a href="index.php?action=inscription"> <br /> S'inscrire </a>
    <a href="index.php?action=connexion"> <br /> Se connecter </a>

  </div>

  <?php $content = ob_get_clean();
  
require('view/template.php'); 
?>
