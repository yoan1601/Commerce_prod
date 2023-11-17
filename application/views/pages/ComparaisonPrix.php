<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php 
  $this->load->view('templates/sidebarHeader');
?>

      <h5 id="compare-title" class="title">Comparaison de prix</h5>

      <div class="card-price">
        <form action="<?= site_url("moinsDisant/saveBonCommande") ?>" method="post">
          <?php for($i=1;$i<=count($proformas);$i++){ ?>
          <div class="container-table">
              <p><center><span><?= $proformas[$i-1]["proforma"]->nom_fournisseur ?></span></center></p>
              <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">Libellé</th>
                      <th scope="col">Quantité</th>
                      <th scope="col">PU</th>
                      <th scope="col">Prix total</th>                    
                    </tr>
                  </thead>
                  <tbody>
                      <?php foreach($proformas[$i-1]["details"] as $d){ ?>
                        <tr style="<?php if($d->isCheapest){ echo "background-color:chartreuse"; } ?>">
                          <td><?= $d->nom_article ?></td>
                          <td><?= $d->quantite_detail_proforma." ".$d->symbole_unite ?></td>
                          <td><?= $d->puht_detail_proforma ?> Ar</td>
                          <td><?= $d->ttc_detail_proforma ?> Ar</td>
                        </tr>
                      <?php } ?>
                  </tbody>
                </table>
                <p>
                  Mode de payement
                  <select name="mode<?= $i ?>" id="">
                    <?php foreach($modePaiements as $m){ ?>
                      <option value="<?= $m->id_mode_paiement ?>"><?= $m->nom_mode ?></option>
                    <?php } ?>
                  </select>
                </p>
                <p>livraison partielle
                  <input type="radio" name="livraisonpart<?= $i ?>" id="" required value="1">oui
                  <input type="radio" name="livraisonpart<?= $i ?>" id="" selected required value="0">non
                </p>
          </div>
          <?php } ?>
          <button type="submit">Generer les bons de commande</button>
        </form>
      <p class="trans">.</p>
    </div>
</body>
</html>