function checkNotNull(){
    var tieBreak;
    var email;
    tieBreak = document.getElementById("tiebreaker").value;
    email = document.getElementById("email").value;
    if (!tieBreak || !email){
        alert("Please ensure all fields are complete!");
        return false;
    }
}