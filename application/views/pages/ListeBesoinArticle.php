<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?php
$this->load->view('templates/sidebarHeader');
?>
<div class="card">
  <div class="container-besoin">
    <h5 class="title">Liste des besoin d'achat par article</h5>
    <form action="<?= site_url("besoinAchat/toListeBesoinGrpParArticleFiltre") ?>" method="get">
      <p>Filtre
        <select name="idCategorie" id="">
          <?php foreach ($allCategorie as $key => $categorie) { ?>
            <option value="<?= $categorie->id_categorie ?>"><?= $categorie->nom_categorie ?></option>
          <?php } ?>
        </select>
        <input type="submit" value="Filtrer">
      </p>
    </form>
    <div class="card-body">

      <!-- Table with stripped rows -->
      <p>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Libellé</th>
            <th scope="col">Catgorie</th>
            <th scope="col">Quantité</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($allBesoinGrp as $key => $besoin) { ?>
            <tr>
              <td><?= $besoin->nom_article ?></td>
              <td><?= $besoin->nom_categorie ?></td>
              <td><?= $besoin->qteTotale ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
      </p>
      <a href="<?= site_url("besoinAchat/toSelectBesoin") ?>"><input type="submit" value="faire une selection"></a>
    </div>
    
  </div>
  <p class="trans">.</p>
</div>

</body>

</html>