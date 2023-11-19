<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?php
$this->load->view('templates/sidebarHeader');
?>
<div class="card">
  <div class="container-besoin">
    <h5 class="title">Listes des demandes Pro forma</h5>
      <div class="card-body">

        <!-- Table with stripped rows -->
        <p>
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Date de demande</th>
              <th scope="col">Apercu </th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($allDemande as $key => $demande) { ?>
            <tr>
              <td><?= $demande->date_demande ?></td>
              <td>
                    <?php foreach ($demande->details as $key => $detail) { ?>
                      <?= $detail->nom_article ?>,
                    <?php } ?>
              </td>
              <td class="action2">
                <a href="<?= site_url("saisieProforma/index/".$demande->id_demande) ?>"><button class="valider">saisir un Pro Forma</button></a>
                <a href="<?= site_url("moinsDisant/index/".$demande->id_demande) ?>"><button class="valider">voir les moins disant</button></a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
        </p>
      </div>
  </div>
  <p class="trans">.</p>
</div>

</body>

</html>