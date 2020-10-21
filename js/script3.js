window.onload = function(){
    
    
    document.getElementById("btnreg").addEventListener("click", function(){
 
        var ime = document.getElementById('ime').value.trim();
        var prezime = document.getElementById('prezime').value.trim();
        var email = document.getElementById('email').value.trim();
        var sifra = document.getElementById('password').value.trim();
        var validno = true;
    
        var reIme = /^[A-ZŽĆČŠĐ][a-zđžćčš]{1,19}(\s[A-ZŽĆČŠĐ][a-zđžćčš]{1,19})*$/;
        var rePrezime = /^[A-ZŽĆČŠĐ][a-zđžćčš]{1,19}(\s[A-ZŽĆČŠĐ][a-zđžćčš]{1,19})*$/;
        var reEmail =/^([A-Z]|[a-z]|[0-9]|[\_\%\.\+\-])([A-Z]|[a-z]|[0-9]|[\_\%\.\+\-])+\@[a-z]+\.[a-z]{2,4}$/;
        var reSifra=/^.{8,50}$/;
        
        
        if(!reIme.test(ime) || ime==""){
            document.getElementById("greskaime").innerHTML = "Pogrešan format imena!";
            document.getElementById("greskaime").style.color = "red";
            document.getElementById("ime").style.borderColor = "red";
            validno=false;
        }
        else{
            document.getElementById("greskaime").innerHTML = "";
           document.getElementById("ime").style.borderColor = "green";
        }


        if(!rePrezime.test(prezime) || prezime==""){
            document.getElementById("greskaprezime").innerHTML = "Pogrešan format prezimena!";
            document.getElementById("greskaprezime").style.color = "red";
            document.getElementById("prezime").style.borderColor = "red";
            validno=false;
        }
        else{
            document.getElementById("greskaprezime").innerHTML = "";
            document.getElementById("prezime").style.borderColor = "green";
        }
    
        if(!reEmail.test(email) || email==""){
            document.getElementById("greskamail").innerHTML = "Pogrešan format emaila!";
            document.getElementById("greskamail").style.color = "red";
            document.getElementById("email").style.borderColor = "red";
            validno=false;
        }
        else{
            document.getElementById("greskamail").innerHTML = "";
            document.getElementById("email").style.borderColor = "green";
        }
        
        if(!reSifra.test(sifra) || sifra==""){
            document.getElementById("greskapass").innerHTML = "Pogrešan format lozinke!";
            document.getElementById("greskapass").style.color = "red";
            document.getElementById("password").style.borderColor = "red";
            validno=false;
        }
        else{
            document.getElementById("greskapass").innerHTML = "";
            document.getElementById("password").style.borderColor = "green";
        }
    
        if(validno){
            $.ajax({
                url:"registracija.php",
                method:"post",
                type:"json",
                data:{
                    ime:ime,
                    prezime:prezime,
                    email:email,
                    sifra:sifra
                    
                },
                success: function(response){
                    location.reload();
                    alert("REGISTRACIJA USPEŠNA! MOŽETE SE ULOGOVATI.");
                },
                error: function(){
                    alert("NEUSPEŠNA REGISTRACIJA!");
                }
            })
        }
        else{
            var greska = document.getElementById("ispis");
            greska.style.color ="red";
            greska.innerHTML = "Ispravite ili popunite polja podvučena crvenom bojom! Ime i prezime moraju početi velikim slovom!"
        }
            
    })
        

    document.getElementById("ime").focus();
   document.getElementById("ime").addEventListener("blur", function(){
       var ime = document.getElementById("ime");
       var reIme = /^[A-ZŽĆČŠĐ][a-zđžćčš]{1,19}(\s[A-ZŽĆČŠĐ][a-zđžćčš]{1,19})*$/;
       if(!reIme.test(ime.value.trim())){
           document.getElementById("greskaime").innerHTML = "Pogrešan format imena!";
           document.getElementById("greskaime").style.color = "red";
           document.getElementById("ime").style.borderColor = "red";
       }
       else{
           document.getElementById("greskaime").innerHTML = "";
           document.getElementById("ime").style.borderColor = "green";
       }
   })


   document.getElementById("prezime");
   document.getElementById("prezime").addEventListener("blur", function(){
       var prezime = document.getElementById("prezime");
       var rePrezime = /^[A-ZŽĆČŠĐ][a-zđžćčš]{1,19}(\s[A-ZŽĆČŠĐ][a-zđžćčš]{1,19})*$/;
       if(!rePrezime.test(prezime.value.trim())){
           document.getElementById("greskaprezime").innerHTML = "Pogrešan format prezimena!";
           document.getElementById("greskaprezime").style.color = "red";
           document.getElementById("prezime").style.borderColor = "red";
       }
       else{
           document.getElementById("greskaprezime").innerHTML = "";
           document.getElementById("prezime").style.borderColor = "green";
       }
   })

   document.getElementById("email");
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