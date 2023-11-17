<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php 
  $this->load->view('templates/sidebarHeader');
?>
      <div class="card">
        <div class="container-besoin">
            <h5 class="title">Demande de pro format</h5>
            
            <p>Dimpex</p>
            <p>2016-05-25</p>
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
                          <tr>
                            <td>Cahier</td>
                            <td>10</td>
                          </tr>
                          <tr>
                            <td>Cahier</td>
                            <td>10</td>
                          </tr>
                          <tr>
                            <td>Cahier</td>
                            <td>10</td>
                          </tr>
                          <tr>
                            <td>Cahier</td>
                            <td>10</td>
                          </tr>
                        </tbody>
                      </table>
                    </p>
                    </div>
                    <p><button>PDF</button><button class="pdf-near" type="submit">Envoyer</button></p>
                  </div>
        <p class="trans">.</p>
    </div>

</body>
</html>