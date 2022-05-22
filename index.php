<html>
  <head>
    <title>Les argonautes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>

<!-- Header section -->
<body>
  <header>
  <hr>
      <?php require 'db.php' ?>
      <link href="style.css" rel="stylesheet">
    <h1>

      Les Argonautes
    </h1>
  </header>

  <!-- Main section -->
  <main>
    <div class="container">
      
    
      <!-- New member form -->
      <h2>Ajouter un(e) Argonaute</h2>
      <form method="POST" class="new-member-form" autocomplete="off">
        <div class="field"> 
          <label for="name">Nom de l&apos;Argonaute</label>
          <input id="name" name="name" type="text" placeholder="Charalampos" />
        </div>
        <button type="submit">Envoyer</button>
      </form>

      <?php if(isset($_POST["name"])) {
        $name =  htmlspecialchars($_POST["name"]);
        $request = $pdo->prepare("INSERT INTO argonautes (name) VALUES ('$name')");
        $resultat= $request->execute(); $request->debugDumpParams(); 
        header('Location: ./'); 
      }
      ?>
      
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

      <?php if(isset($_GET['del'])) {
        $id = $_GET['del']; 
        $request = $pdo->prepare("DELETE FROM `argonautes` WHERE argonautes.id = ('$id')");
        $request->execute();
        header('Location: ./'); 
      }
      ?>
    </div>
  </main>

  <footer>
    <div class="waves">
    </div>
    <div class="footerInfos">
      <img src="https://www.wildcodeschool.com/assets/logo_main-e4f3f744c8e717f1b7df3858dce55a86c63d4766d5d9a7f454250145f097c2fe.png" alt="Wild Code School logo" />
      <p>Réalisé par Jason en Anthestérion de l'an 515 avant JC</p>
    </div>
  </footer>
</body>
</html>