<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php 
  $this->load->view('templates/sidebarHeader');
?>
      <style>
        @media print{
          @page{
            margin: 0;
            width: 100%;
          }
          header, aside, #boutons{
            display: none !important;
          }
        }
      </style>
      <div class="container-fluid">
        <div id="printable" class="card">
          <div class="container-besoin">
            <h5 class="title">Bon de commmande</h5>
            <p>
                <div class="container-generic">
                    <div class="container1">
                        <p>Fournisseur : <?= $bonCommande->nom_fournisseur ?></p>
                        <p>Date de tirage : <?= $bonCommande->date_creation_bon ?></p>
                        <p>numero de bon de commande :<?= $bonCommande->numero_bon ?></p>
                        <p>Nom du bon de commande : <?= $bonCommande->libelle_bon ?></p>
                    </div>
                    <div class="container1">
                        <p>Delai de livraison: <?= $bonCommande->delai_livraison_bon ?></p>
                        <p>Livraison partielle: <?= $livrePart ?></p>
                        <p>Mode de payement: <?= $bonCommande->nom_mode ?></p>
                    </div>
                </div>
            </p>
            <div class="card-body">
              <p>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Catégorie</th>
                    <th scope="col">Designation</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">PU HT</th>
                    <th scope="col">TVA</th>
                    <th scope="col">TTC</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($bonCommande->details as $d){ ?>
                    <tr>
                        <td><?= $d->nom_categorie ?></td>
                        <td><?= $d->nom_article ?></td>
                        <td><?= $d->quantite_detail_bon ?></td>
                        <td><?= $d->puht_detail_bon ?> Ar</td>
                        <td><?= $d->tva_detail_bon ?> Ar</td>
                        <td><?= $d->ttc_detail_bon ?> Ar</td>                                
                      </tr>
                  <?php } ?>
                  <tr>
                      <td border="0"></td>
                      <td border="0"></td>
                      <td border="0"></td>
                      <td border="0"></td>
                      <td>Somme</td>
                      <td><?= $somme ?> Ar</td>
                </tbody>
              </table>
              </p>
            </div>
            <p>Arreté le present bon de commande a la somme de <?= $sommeLettre ?> Ar</p>
            <p>
            <div class="container-generic">
                <div class="container1">
                    <center>
                        <p>La societe</p>
                        <p class="trans">.</p>
                        <p class="trans">.</p>
                    </center>
                </div>
                <div class="container1">
                    <center>
                        <p class="signature">Le Fournisseur</p>
                        <p class="trans">.</p>
                        <p class="trans">.</p>
                    </center>
                </div>
            </div>  
            </p>
            <p id="boutons"> 
              <button id="pdf">PDF</button>
              <form action="<?= site_url("bonCommande/validerBCDG") ?>" method="post">
                <input type="hidden" name="idbon" value="<?= $bonCommande->id_bon ?>">
                <button class="pdf-near" type="submit">Valider</button>
              </form>
            </p>
            </div>
            <p class="trans">.</p>
        </div>
      </div>
    </body>
<script>
  let toprint=document.getElementById("printable");
  let pdf=document.getElementById("pdf");
  pdf.addEventListener("click", function(){
    window.print();
  });
</script>
</html>  