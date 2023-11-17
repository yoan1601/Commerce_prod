<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?php
$this->load->view('templates/sidebarHeader');
?>
<div class="card">
  <div class="container-besoin">
    <h5 class="title">Demande de pro format</h5>
    <form action="<?= site_url("besoinAchat/envoieDemande") ?>" method="post">
    <input type="hidden" name="dateDemande" value="<?= $dateActuelle ?>">
    <?php $i = 1; ?>
    <?php foreach ($allBesoinGrp as $key => $besoin) { ?>
    <input type="hidden" name="idArticle<?= $i ?>" value="<?= $besoin->id_article ?>">
    <input type="hidden" name="qte<?= $i ?>" value="<?= $besoin->qteTotale ?>">
    <?php $i++; ?>
    <?php } ?>
    <p><?= $nom_societe ?></p>
    <p><?= $dateActuelle ?></p>
    <div class="card-body">

      <!-- Table with stripped rows -->
      <p>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Libellé</th>
            <th scope="col">Quantité</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($allBesoinGrp as $key => $besoin) { ?>
            <tr>
              <td><?= $besoin->nom_article ?></td>
              <td><?= $besoin->qteTotale ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
      </p>
    </div>
    <p><button>PDF</button><button class="pdf-near" type="submit">Envoyer</button></p>
    </form>
  </div>
  <p class="trans">.</p>
</div>

</body>

</html>