<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php 
  $this->load->view('templates/sidebarHeader');
?>
      <div class="card">
        <div class="container-besoin">
            <h5 class="title">Detail des besoin d'achat</h5>
            
            <p>Service : Finance</p>
            <p>Delai de livraison :2016-05-25</p>
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
                          <tr>
                            <td>Cahier</td>
                            <td>Accessoire</td>
                            <td>10</td>
                            <td>piece</td>
                          </tr>
                          <tr>
                            <td>Cahier</td>
                            <td>Accessoire</td>
                            <td>10</td>
                            <td>piece</td>
                          </tr>
                        </tbody>
                      </table>
                    </p>
                    </div>
                    <p class="final">
                    <button class="valider"> <img src="<?= base_url("assets\icons\icons8-check-48 (2).png") ?>" alt="" srcset=""> Valider</button>
                    <button class="refuser" > <img src="<?= base_url("assets\icons\icons8-cross-48 (1).png") ?>" alt="" srcset="">Refuser</button>
                  </p> 
                  </div>     
            <p class="trans">.</p>
    </div>

</body>
</html>