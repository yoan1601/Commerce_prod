<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?php
$this->load->view('templates/sidebarHeader');
?>
<div class="card">
  <div class="container-besoin">
    <h5 class="title">Les besoins d'achat pour une demande pro forma</h5>
    <form action="<?= site_url("besoinAchat/toSelectBesoinGrpParArticleFiltre") ?>" method="get">
      <p>Categorie
        <select name="idCategorie" id="">
          <?php foreach ($allCategorie as $key => $categorie) { ?>
            <option value="<?= $categorie->id_categorie ?>"><?= $categorie->nom_categorie ?></option>
          <?php } ?>
        </select>
        <input type="submit" value="Filtrer">
      </p>
    </form>
    <form action="<?= site_url("besoinAchat/toGenererDemande") ?>" method="POST">
      <div class="card-body">

        <!-- Table with stripped rows -->
        <p>
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Libellé</th>
              <th scope="col">Catégorie</th>
              <th scope="col">Quantité total</th>
              <th scope="col">Selectionner</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($allBesoinGrp as $key => $besoin) { ?>
            <tr>
              <td><?= $besoin->nom_article ?></td>
              <td><?= $besoin->nom_categorie ?></td>
              <td><?= $besoin->qteTotale ?></td>
              <td class="action2">
                <input type="checkbox" name="idArticleGrp[]" id="" value="<?= $besoin->id_article ?>">
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
        </p>
        <input type="submit" value="generer la demande">
      </div>
    </form>
  </div>
  <p class="trans">.</p>
</div>

</body>

</html>