<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?php
$this->load->view('templates/sidebarHeader');
?>

<div class="card">
    <div class="container-besoin">
        <h5 class="title">Besoin d'achat</h5>
        <form action="<?= site_url("besoinAchat/insertBesoins") ?>" method="POST">
            <input type="hidden" name="nbBesoins" id="nbBesoins" value="1">
            <span>Besoin du: <?= $user->nom_service  ?></span>
            <p>Delai de livraison <input type="date" name="delaiLivraison" required></p>
            <div id="listeBesoins">
                <p>
                    <select name="besoin1" id="besoin1" style="margin: 5px;">
                        <?php foreach ($allArticle as $key => $article) { ?>
                            <option value="<?= $article->id_article ?>"><?= $article->nom_article ?> - <?= $article->nom_categorie ?></option>
                        <?php } ?>
                    </select>
                    <input type="number" name="qte1" id="qte1" placeholder="Quantite" step="0.01" min="0" required>
                </p>
            </div>
            <p><input class="submiter" type="submit" value="Valider"></p>
        </form>
        <p><button onclick="addligneBesoin()">Ajouter une ligne +</button></p>
    </div>
    <p class="trans">.</p>
</div>

</body>
<script src="<?= base_url('assets/js/besoins.js') ?>"></script>

</html>