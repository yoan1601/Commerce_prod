<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php 
  $this->load->view('templates/sidebarHeader');
?>

      <div class="card">
        <div class="container-besoin">
            <h5 class="title">Validation besoin d'achat</h5>
            
            <p>Liste des besoins d'achat du departement ?Finance? </p>
            <form action="" method="get">
            <p>Filtre
                <select name="" id="">
                    <option value="">Sentrison</option>
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
                          <tr>
                            <td>Developpement</td>
                            <td>Cahier-Stylo,..</td>
                            <td>2016-05-25</td>
                            <td class="action2">
                                <button class="valider"> <img src="<?= base_url("assets\icons\icons8-check-48 (2).png") ?>" alt="" srcset=""> Valider</button>
                                <button class="refuser" > <img src="<?= base_url("assets\icons\icons8-cross-48 (1).png") ?>" alt="" srcset="">Refuser</button>
                            </td>
                          </tr>
                          <tr>
                            <td>Developpement</td>
                            <td>Cahier-Stylo,..</td>
                            <td>2016-05-25</td>
                            <td class="action2">
                                <button class="valider"> <img src="<?= base_url("assets\icons\icons8-check-48 (2).png") ?>" alt="" srcset=""> Valider</button>
                                <button class="refuser" > <img src="<?= base_url("assets\icons\icons8-cross-48 (1).png") ?>" alt="" srcset="">Refuser</button>
                            </td>
                          </tr>
                          </tr>
                        </tbody>
                      </table>
                    </p>
                    </div>
                  </div>
        <p class="trans">.</p>
    </div>

</body>
</html>