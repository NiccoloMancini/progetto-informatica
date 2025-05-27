function ApriFinestra(){
  let finestra=document.getElementById("apriChiudiFinestra");
  let bg=document.getElementById("background");
  finestra.classList.remove("d-none");
  bg.classList.add("opacity-50");
  document.getElementById("divInTheMiddle").classList.add("op-1");
}

function ChiudiFinestra(){
  let finestra=document.getElementById("apriChiudiFinestra");
  let bg=document.getElementById("background");
  finestra.classList.add("d-none")
  bg.classList.remove("opacity-50");
  document.getElementById("divInTheMiddle").classList.remove("op-1");
}

function nuovoRistorante(){
  let finestra = document.getElementById("nuovoRistorante");
  finestra.classList.toggle("d-none");
}

let map = L.map('map').setView([43.7800127, 11.1997685], 13);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

function caricaMarker(lat, long){
  var marker = L.marker([lat, long]).addTo(map);
}

