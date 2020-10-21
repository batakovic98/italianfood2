window.onload = function(){
    
    ispisIkonica();
    
    document.getElementById("posalji").addEventListener("click", function(){

        var validno = true;

        var ime = document.getElementById("ime");
        var reIme = /^[A-ZŽĆČŠĐ][a-zžćčšđ]{2,14}$/;
        if(!reIme.test(ime.value.trim())){
            document.getElementById("ime").style.borderColor = "red";
            validno = false;
        }
        else{
            
            document.getElementById("ime").style.borderColor = "green";
        }


        var email = document.getElementById("email");
        var reEmail = /^([A-Z]|[a-z]|[0-9]|[\_\%\.\+\-])([A-Z]|[a-z]|[0-9]|[\_\%\.\+\-])+\@[a-z]+\.([a-z]+\.)?[a-z]{2,4}$/;
        if(!reEmail.test(email.value.trim())){
            
            document.getElementById("email").style.borderColor = "red";
            validno = false;
        }
        else{
            
            document.getElementById("email").style.borderColor = "green";
        }


        var poruka = document.getElementById("poruka");
        
        if(poruka.value == ""){
            
            document.getElementById("poruka").style.borderColor = "red";
            validno = false;
        }
        else{
            
            document.getElementById("poruka").style.borderColor = "green";
        }


        if(validno){
            $.ajax({
                url:"contact.php",
                method:"post",
                type:"json", 
                success: function(){
                    alert("PORUKA POSLATA");
                   
                },
                error: function(){
                    alert("NEUSPESNO");
                }
            })
        }
    

       
    })

    document.getElementById("ime").focus();
   document.getElementById("ime").addEventListener("blur", function(){
       var ime = document.getElementById("ime");
       var reIme = /^[A-ZŽĆČŠĐ][a-zžćčšđ]{2,14}$/;
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

   document.getElementById("email");
   document.getElementById("email").addEventListener("blur", function(){
       var email = document.getElementById("email");
       var reEmail = /^([A-Z]|[a-z]|[0-9]|[\_\%\.\+\-])([A-Z]|[a-z]|[0-9]|[\_\%\.\+\-])+\@[a-z]+\.([a-z]+\.)?[a-z]{2,4}$/;
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


   document.getElementById("poruka");
   document.getElementById("poruka").addEventListener("blur", function(){
       var poruka = document.getElementById("poruka");
       if(poruka.value == ""){
           document.getElementById("greskaarea").innerHTML = "Polje za poruku mora biti popunjeno!";
           document.getElementById("greskaarea").style.color = "red";
           document.getElementById("poruka").style.borderColor = "red";
       }
       else{
           document.getElementById("greskaarea").innerHTML = "";
           document.getElementById("poruka").style.borderColor = "green";
       }
   })
}

function ispisIkonica(){

    let ikonice=['fab fa-facebook tm-social-icon', 'fab fa-twitter tm-social-icon', 'fab fa-instagram tm-social-icon'];

    let ispis="";
        for( let i=0; i<ikonice.length; i++){

            ispis+="<a href='#' class='tm-social-link'><i class='" +ikonice[i]+ "'></i></a>"

        }
    document.getElementById("ikonice").innerHTML=ispis;
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