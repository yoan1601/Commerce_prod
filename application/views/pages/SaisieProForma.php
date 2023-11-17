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
                    <select name="fournisseur" id="">
                        <?php foreach($fournisseurs as $f){ ?>
                        <option value="<?= $f->id_fournisseur ?>"><?= $f->nom_fournisseur ?></option>
                        <?php } ?>
                    </select>
                    Delai de livraison <input type="date" name="delai">
                </p>
                <p>
                    Libellé
                    <select class="saisie" name="article1" id="">
                        <?php foreach($articles as $a){ ?>
                        <option value="<?= $a->id_article ?>"><?= $a->nom_article ?></option>
                        <?php } ?>
                    </select>
                    <input type="number" step="0.01" class="saisie" name="quantite1" id="" placeholder="Quantité">
                    <input type="number" step="0.01" class="saisie" name="puht1" id="" placeholder="PU hors taxe">
                </p>
                <p>
                    <input type="number" step="0.01" class="saisie" name="tva1" id="" placeholder="TVA">
                    <input type="number" step="0.01" class="saisie" name="ttc1" id="" placeholder="TTC">
                </p>
                <generate id="generate"></generate>
                <p><input class="submiter" type="submit" value="Valider"></p>
            </form>
            <p><button id="ajouter">Ajouter une ligne +</button></p>
        </div>
        <p class="trans">.</p>
    </div>
<script>
    let generate=document.getElementById("generate");
    let ajouter=document.getElementById("ajouter");
    let nb=1;
    ajouter.addEventListener("click", function(){
        nb+=1;
        let libelle=document.createElement("p");
        libelle.textContent="Libelle";
        let libelle_select=document.createElement("select");
        libelle_select.className="saisie";
        libelle_select.name="article"+nb;
        let libelle_option;
        <?php foreach($articles as $a){ ?>
            libelle_option=document.createElement("option");
            libelle_option.value="<?= $a->id_article ?>";
            libelle_option.textContent="<?= $a->nom_article ?>";
            libelle_select.appendChild(libelle_option);
        <?php } ?>
        let libelle_qte=document.createElement("input");
        libelle_qte.type="number";
        libelle_qte.step="0.01";
        libelle_qte.className="saisie";
        libelle_qte.name="quantite"+nb;
        libelle_qte.placeholder="Quantite";
        let libelle_puht=document.createElement("input");
        libelle_puht.type="number";
        libelle_puht.step="0.01";
        libelle_puht.className="saisie";
        libelle_puht.name="puht"+nb;
        libelle_puht.placeholder="Quantite";
        libelle.appendChild(libelle_select);
        libelle.appendChild(libelle_qte);
        libelle.appendChild(libelle_puht);

        let secondLine=document.createElement("p");
        let tva=document.createElement("input");
        tva.type="number";
        tva.step="0.01";
        tva.className="saisie";
        tva.name="tva"+nb;
        tva.placeholder="Quantite";
        let ttc=document.createElement("input");
        ttc.type="number";
        ttc.step="0.01";
        ttc.className="saisie";
        ttc.name="ttc"+nb;
        ttc.placeholder="Quantite";
        secondLine.appendChild(tva);
        secondLine.appendChild(ttc);

        generate.appendChild(libelle);
        generate.appendChild(secondLine);
    });
</script>
</body>
</html>