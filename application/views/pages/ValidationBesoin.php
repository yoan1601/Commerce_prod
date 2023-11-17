<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?php
$this->load->view('templates/sidebarHeader');
?>

<div class="card">
  <div class="container-besoin">
    <h5 class="title">Validation besoin d'achat</h5>
    <p>Liste des besoins d'achat du departement <strong><?= $user->nom_dept ?></strong> </p>
    <form action="<?= site_url("besoinAchat/filtreBesoin") ?>" method="POST">
      <p>Filtre
        <select name="idService" id="">
          <?php foreach ($allServices as $key => $service) { ?>
            <option value="<?= $service->id_service ?>"><?= $service->nom_service ?></option>
          <?php } ?>
        </select>
        <input type="submit" name="" value="Filtrer">
      </p>
    </form>
    <form action="" method="get">
      <div class="card-body">

        <!-- Table with stripped rows -->
        <p>
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">service</th>
              <th scope="col">Apercu besoin</th>
              <th scope="col">Delai de livraison</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($allBesoinAchat as $key => $besoin) { ?>

              <tr>
                <td><?= $besoin->nom_service ?></td>
                <td style="overflow-x: hidden; width: 12vw;">
                  <a style="color: blue;" href="<?= site_url('besoinAchat/detailBesoin/'.$besoin->id_besoin) ?>">
                    <?php foreach ($besoin->details as $key => $detail) { ?>
                      <?= $detail->nom_article ?>,
                    <?php } ?>
                  </a>
                </td>
                <td><?= $besoin->delai_livraison_besoin ?></td>
                <td class="action2">
                  <button class="valider"><a style="color: white;" href="<?= site_url("besoinAchat/validerBesoinAchat/" . $user->id_emp . "/" . $besoin->id_besoin) ?>"> <img src="<?= base_url("assets\icons\icons8-check-48 (2).png") ?>" alt="" srcset=""> Valider</a></button>
                  <button class="refuser"><a style="color: white;" href="<?= site_url("besoinAchat/refuserBesoinAchat/" . $besoin->id_besoin) ?>"><img src="<?= base_url("assets\icons\icons8-cross-48 (1).png") ?>" alt="" srcset="">Refuser</a></button>
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