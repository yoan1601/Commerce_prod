<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php 
  $this->load->view('templates/sidebarHeader');
?>

      <div class="card">
        <div class="container-besoin">
            <h5 class="title">Besoin d'achat</h5>
            <form action="" method="get">
                <span>Besoin du: Finance</span>
                <p>Delai de livraison <input type="date"></p>
                <p>Cartgorie
                    <select name="" id="">
                        <option value="">Sentrison</option>
                    </select>
                    <input type="number" name="" id="" placeholder="Quantite">
                </p>
                <p><button>Ajouter une ligne +</button></p>
                <p><input class="submiter" type="submit" value="Valider"></p>
            </form>
        </div>
        <p class="trans">.</p>
    </div>

</body>
</html>