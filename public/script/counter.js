var n = 100000; // Nombre final du compteur
var cpt = 99820; // Initialisation du compteur
var duree = 1; // Durée en seconde pendant laquel le compteur ira de 0 à 100000
var delta = Math.ceil((duree * 1000) / n); // On calcule l'intervalle de temps entre chaque rafraîchissement du compteur
var node =  document.getElementById("counter"); // On appelle l'élément où sera rafraîchi la valeur du compteur

function countdown() {
    node.innerHTML = ++cpt;
    if( cpt < n ) { // Si on n'est pas arrivé à la valeur finale, on relance notre compteur une nouvelle fois
        setTimeout(countdown, delta);
    }
}

setTimeout(countdown, delta);



var nOne = 1400;
var cptOne = 1220;
var dureeOne = 1;
var deltaOne = Math.ceil((dureeOne * 1000) / nOne);
var nodeOne =  document.getElementById("counter1");

function countdownOne() {
    nodeOne.innerHTML = ++cptOne;
    if( cptOne < nOne ) {
        setTimeout(countdownOne, deltaOne);
    }
}

setTimeout(countdownOne, deltaOne);



var nTwo = 5;
var cptTwo = 0;
var dureeTwo = 1;
var deltaTwo = Math.ceil((dureeTwo * 1000) / nTwo);
var nodeTwo =  document.getElementById("counter2");

function countdownTwo() {
    nodeTwo.innerHTML = ++cptTwo;
    if( cptTwo < nTwo ) {
        setTimeout(countdownTwo, deltaTwo);
    }
}

setTimeout(countdownTwo, deltaTwo);



var nThree = 93;
var cptThree = 0;
var dureeThree = 1;
var deltaThree = Math.ceil((dureeThree * 1000) / nThree);
var nodeThree =  document.getElementById("counter3");

function countdownThree() {
    nodeThree.innerHTML = ++cptThree;
    if( cptThree < nThree ) {
        setTimeout(countdownThree, deltaThree);
    }
}

setTimeout(countdownThree, deltaThree);

