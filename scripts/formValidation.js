function checkNotNull(){
    var tieBreak;
    var email;
    var validation = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    tieBreak = document.getElementById("tiebreaker").value;
    email = document.getElementById("email").value;
    if (!tieBreak || !email){
        alert("Please ensure all fields are complete!");
        return false;
    }
    if (!validation.test(email.value)){
        alert("Please provide a valid address!");
        email.focus;
        return false;
    }
}