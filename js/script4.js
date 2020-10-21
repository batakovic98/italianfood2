window.onload = function(){
    
    
    document.getElementById("login").addEventListener("click", function(){
       
        var email = document.getElementById('email').value.trim();
        var sifra = document.getElementById('password').value.trim();
        var validno = true;
    

        var reEmail =/^([A-Z]|[a-z]|[0-9]|[\_\%\.\+\-])([A-Z]|[a-z]|[0-9]|[\_\%\.\+\-])+\@[a-z]+\.[a-z]{2,4}$/;
        
        
        
    
        if(!reEmail.test(email) || email==""){
            document.getElementById("greskamail").innerHTML = "Pogrešan format emaila!";
            document.getElementById("greskamail").style.color = "red";
            document.getElementById("email").style.borderColor = "red";
            validno=false;
        }
        
        
        if(sifra==""){
            document.getElementById("greskapass").innerHTML = "Pogrešan format lozinke!";
            document.getElementById("greskapass").style.color = "red";
            document.getElementById("password").style.borderColor = "red";
            validno=false;
        }
        
    
        if(validno){
            $.ajax({
                url:"login.php",
                method:"post",
                type:"json",
                data:{
                    email:email,
                    sifra:sifra
                },
                success: function(response){
                    window.location.replace("index.php");
                    
                },
                error: function(){
                    alert("NEUSPESNO");
                }
            })
        }
        else{
            var greska = document.getElementById("ispis"); 
            greska.style.color ="red";
            greska.innerHTML = "Ne postoji korisnik. Registrujte se."
        }
            
    })
        

    

   document.getElementById("email").focus();
   document.getElementById("email").addEventListener("blur", function(){
       var email = document.getElementById("email");
       var reEmail = /^([A-Z]|[a-z]|[0-9]|[\_\%\.\+\-])([A-Z]|[a-z]|[0-9]|[\_\%\.\+\-])+\@[a-z]+\.[a-z]{2,4}$/;
       if(!reEmail.test(email.value.trim())){
           document.getElementById("greskamail").innerHTML = "Pogrešan format emaila!";
           document.getElementById("greskamail").style.color = "red";
           document.getElementById("email").style.borderColor = "red";
       }
       else{
           document.getElementById("greskamail").innerHTML = "";
           document.getElementById("email").style.borderColor = "green";
       }
   })


   document.getElementById("password");
   document.getElementById("password").addEventListener("blur", function(){
       var sifra = document.getElementById("password");
       var reSifra = /^.{8,50}$/;
       if(!reSifra.test(sifra.value.trim())){
           document.getElementById("greskapass").innerHTML = "Pogrešan format lozinke!";
           document.getElementById("greskapass").style.color = "red";
           document.getElementById("password").style.borderColor = "red";
       }
       else{
           document.getElementById("greskapass").innerHTML = "";
           document.getElementById("password").style.borderColor = "green";
       }
   })



}


$(document).ready(function(){

    $('#scrollToTop').click(function () {
        var offset = 220;
        var duration = 500;
        jQuery(window).scroll(function () {
            if (jQuery(this).scrollTop() > offset) {
                jQuery('#scrollToTop').fadeIn(duration);
            } else {
                jQuery('#scrollToTop').fadeOut(duration);
            }
        });
    
        $('html').animate({
            scrollTop: 0
        }, 2000);
    });

})