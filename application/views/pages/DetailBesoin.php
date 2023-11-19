<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php 
  $this->load->view('templates/sidebarHeader');
?>
      <div class="card">
        <div class="container-besoin">
            <h5 class="title">Detail du besoin d'achat</h5>
            
            <p>Service : <?= $user->nom_dept ?></p>
            <p>Delai de livraison : <?= $besoin->delai_livraison_besoin ?></p>
                    <div class="card-body">
        
                      <!-- Table with stripped rows -->
                      <p>
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">Libellé</th>
                            <th scope="col">Categorie</th>
                            <th scope="col">Quantité</th>
                            <th scope="col">Unité</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($besoin->details as $key => $detail) { ?>
                          <tr>
                            <td><?= $detail->nom_article ?></td>
                            <td><?= $detail->nom_categorie ?></td>
                            <td><?= $detail->quantite_detail_besoin ?></td>
                            <td><?= $detail->nom_unite ?></td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </p>
                    </div>
                    <p class="final">
                    <button class="valider"><a style="color: white;" href="<?= site_url("besoinAchat/validerBesoinAchat/" . $user->id_emp . "/" . $besoin->id_besoin) ?>"> <img src="<?= base_url("assets\icons\icons8-check-48 (2).png") ?>" alt="" srcset=""> Valider</a></button>
                  <button class="refuser"><a style="color: white;" href="<?= site_url("besoinAchat/refuserBesoinAchat/" . $besoin->id_besoin) ?>"><img src="<?= base_url("assets\icons\icons8-cross-48 (1).png") ?>" alt="" srcset="">Refuser</a></button>
                  </p> 
                  </div>
        <p class="trans">.</p>
    </div>

</body>
</html>