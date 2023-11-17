function addligneBesoin() {
  incrementeBesoin();
  let input_nbBesoinsActu = document.getElementById("nbBesoins");
  let nbBesoins = parseInt(input_nbBesoinsActu.value, 10); // Convertir en nombre entier
  console.log(nbBesoins);

  let selectOriginal = document.getElementById("besoin1");
  let qteInputOriginal = document.getElementById("qte1");

  let newSelect = selectOriginal.cloneNode(true);
  newSelect.id = 'besoin'+nbBesoins;
  newSelect.name = 'besoin'+nbBesoins;

  let newInputQte = qteInputOriginal.cloneNode(true);
  newInputQte.id = 'qte'+nbBesoins;
  newInputQte.name = 'qte'+nbBesoins;

  let p = document.createElement('p');
  p.appendChild(newSelect);
  p.appendChild(newInputQte);

  let divListeBesoins = document.getElementById('listeBesoins');
  divListeBesoins.appendChild(p);
}
  
function incrementeBesoin() {
  let input_nbBesoinsActu = document.getElementById("nbBesoins");
  let nbBesoins = parseInt(input_nbBesoinsActu.value, 10); // Convertir en nombre entier
  input_nbBesoinsActu.value = nbBesoins + 1;
}

  