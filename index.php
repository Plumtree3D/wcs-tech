<html>
  <head>
    <title>Les argonautes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="favicon.png" />
  </head>

<!-- Header section -->
<body>
  <hr>
  <header>
      <?php require 'db.php' ?>
      <link href="style.css" rel="stylesheet">
    <h1> Les Argonautes </h1>
  </header>

  <!-- Main section -->
  <main>
    <div class="container">
      
    
      <!-- New member form -->
      <h2>Ajouter un·e Argonaute</h2>
      <form method="POST" class="new-member-form" autocomplete="off">
        <div class="field"> 
          <label for="name">Nom de l&apos;Argonaute</label>
          <input id="name" name="name" type="text" placeholder="Charalampos" />
        </div>
        <button title="Envoyer" type="submit"> </button>
      </form>
      
      <!-- Member list -->
      <h2>Membres de l'équipage</h2>
      <section class="member-list">
        <?php foreach($names as $name) : ?>
        <div class="member-item"><?= $name['name']; ?> 
          <a title="supprimer" href="?del=<?php echo $name['id']?>" class="delete"> 
            <div class="cross"> </div> 
          </a> 
        </div>
        <?php endforeach ?> 
      </section>
    </div>
  </main>

  <footer>
    <div class="waves">
    </div>
    <div class="footerBottom">
      <div class="infos">
        <img class="logo" src="https://www.wildcodeschool.com/assets/logo_main-e4f3f744c8e717f1b7df3858dce55a86c63d4766d5d9a7f454250145f097c2fe.png" alt="Wild Code School logo" />
        <p>Réalisé par Jason en Anthestérion de l'an 515 avant JC</p>
        <a href="https://github.com/Plumtree3D/wcs-tech"> <img src="github.png"> </a>
      </div>
    </div>
  </footer>
</body>
</html>