<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php 
  $this->load->view('templates/sidebarHeader');
?>
      <div class="card">
        <div class="container-besoin">
            <h5 class="title">Saisie de pro forma</h5>
            <form action="" method="get">
                <p>Fournisseur
                    <select name="" id="">
                        <option value="">Sentrison</option>
                    </select>
                    Delai de livraison <input type="date">
                </p>
                <p>
                    Libellé
                    <select class="saisie" name="" id="">
                        <option value="">Sentrison</option>
                    </select>
                    <input type="number" class="saisie" name="" id="" placeholder="Quantité">
                    <input type="number" class="saisie" name="" id="" placeholder="PU hors taxe">
                </p>
                <p>
                    <input type="number" class="saisie" name="" id="" placeholder="TVA">
                    <input type="number" class="saisie" name="" id="" placeholder="TTC">
                </p>
                <p><button>Ajouter une ligne +</button></p>
                <p><input class="submiter" type="submit" value="Valider"></p>
            </form>
        </div>
        <p class="trans">.</p>
    </div>

</body>
</html>