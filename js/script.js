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
