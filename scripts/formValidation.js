function checkForm(){
  alert("sfgsf");
    var tieBreak;
    var email;
    var winner;
    var retiree;
    var validation = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    tieBreak = document.getElementById("tiebreaker").value;
    winner = document.getElementById("winner").value;
    retiree = document.getElementById("retiree").value;

    if (!tieBreak){
        alert("Please ensure all fields are complete!");
        return false;
    }

    if (winner == retiree){
      alert("Your winner prediction cannot be the same as your retiree prediction")
      return false;
    }

}
