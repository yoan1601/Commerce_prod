<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php 
  $this->load->view('templates/sidebarHeader');
?>
      <div class="card">
        <div class="container-besoin">
            <h5 class="title">Liste des bons de commande generés</h5>
                    <div class="card-body">
        
                      <!-- Table with stripped rows -->
                      <p>
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">Generé le </th>
                            <th scope="col">ID</th>
                            <th scope="col">Fournisseur</th>
                            <th scope="col">Montant total</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach($bons as $b){ ?>
                            <tr>
                              <td><?= $b->date_creation_bon ?></td>
                              <td><?= $b->numero_bon ?></td>
                              <td><?= $b->nom_fournisseur ?></td>
                              <td><?= $b->montant ?> Ar</td>
                              <td class="action2">
                                <form action="<?= site_url('bonCommande/validerBCFinance') ?>" method="post">
                                  <input type="hidden" name="idbon" value="<?= $b->id_bon ?>">
                                  <button class="valider">Valider</button>
                                </form>
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