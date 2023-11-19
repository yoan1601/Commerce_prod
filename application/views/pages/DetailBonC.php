<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php 
  $this->load->view('templates/sidebarHeader');
?>
      <div class="card">
        <div class="container-besoin">
            <h5 class="title">Details bon de commmande</h5>
            <p><?= $bonCommande->nom_fournisseur ?></p>
            <p>ID:<?= $bonCommande->numero_bon ?> Generé le :<?= $bonCommande->date_creation_bon ?></p>
            <form action="" method="get">
                    <div class="card-body">
                      <p>
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">Libellé</th>
                            <th scope="col">Quantité</th>
                            <th scope="col">PU HT</th>
                            <th scope="col">TVA</th>
                            <th scope="col">TTC</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach($bonCommande->details as $d){ ?>
                            <tr>
                              <td><?= $d->nom_article ?></td>
                              <td><?= $d->quantite_detail_bon ?></td>
                              <td><?= $d->puht_detail_bon ?></td>
                              <td><?= $d->tva_detail_bon ?></td>
                              <td><?= $d->ttc_detail_bon ?></td>                                
                            </tr>
                          <?php } ?>
                        </tbody>
                    </table>
                    </p>
                </div>
            </form>
            </div>
            <p class="trans">.</p>
        </div>
    </body>
</html>  