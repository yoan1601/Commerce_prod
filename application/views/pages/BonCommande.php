<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php 
  $this->load->view('templates/sidebarHeader');
?>

      <div class="card">
        <div class="container-besoin">
            <h5 class="title">Bon de commmande</h5>
            <p>
                <div class="container-generic">
                    <div class="container1">
                        <p>Fournisseur : Fournisses</p>
                        <p>Date de tirage : date</p>
                        <p>numero de bon de commande :ID BC'ID</p>
                        <p>Nom du bon de commande : libelle</p>
                    </div>
                    <div class="container1">
                        <p>Delai de livraison:</p>
                        <p>Livraison partielle:</p>
                        <p>Mode de payement:</p>
                    </div>
                </div>
            </p>
            <form action="" method="get">
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
                            <tr>
                                <td>Cahier</td>
                                <td>13</td>
                                <td>12</td>
                                <td>20202</td>
                                <td>20202</td>
                                <td>20202</td>                                
                              </tr>
                              <tr>
                                <td>Cahier</td>
                                <td>13</td>
                                <td>12</td>
                                <td>20202</td>
                                <td>20202</td>
                                <td>20202</td>                              
                              </tr>
                              <tr>
                                <td>Cahier</td>
                                <td>13</td>
                                <td>12</td>
                                <td>20202</td>
                                <td>20202</td>
                                <td>20202</td>                           
                              </tr>
                              <tr class="total">
                                <td></td>
                                <td></td>
                                <td>Total</td>
                                <td>202</td>
                                <td>402</td>
                                <td>302</td>                           
                              </tr>
                        </tbody>
                    </table>
                    </p>
                </div>
            </form>
            <p>Arreté le present bon de commande a la somme de TTC en lettre</p>
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
            <p> 
                <button>PDF</button>
                <button class="pdf-near" type="submit">Valider</button>
            </p>
            </div>
            <p class="trans">.</p>
        </div>
    </body>
</html>  