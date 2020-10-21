window.onload = function(){
    
        ispisMenija();
        ispisIkona();

    $.ajax({
        url:"data/zaposleni.json",
        method:"get",
        type:"json",
        success: function(data){
            ispisZaposlenih(data);
        },
        error: function(err){
            console.log(err);
        }
    })

    
    
}

function ispisZaposlenih(zaposleni){

    let ispis = "";
        for(let z of zaposleni){

            ispis += `<article class="col-lg-6">
            <figure class="tm-person">
                <img src=${z.slika.src} alt=${z.slika.alt} class="img-fluid tm-person-img" />
                <figcaption class="tm-person-description">
                    <h4 class="tm-person-name">${z.ime}</h4>
                    <p class="tm-person-title">${z.radnoMesto}</p>
                    <p class="tm-person-about">${z.opis}</p>
                </figcaption>
            </figure>
        </article>`;
    }

    document.getElementById("zaposleni").innerHTML = ispis;

}

function ispisMenija(){

    $.ajax({
        url: "data/meni2.json",
        method: "get",
        type:"json",
        success: function(data){
            let ispis = "<ul class='tm-nav-ul'>"
            for(let d of data){
                ispis+=`
                <li class="tm-nav-li"><a href="${d.link}" class=${d.aktivan}>${d.text}</a></li>`     
            }
            ispis+= "</ul>";
            document.getElementById("meni1").innerHTML = ispis;

        },
        error: function(xhr,status,error){
            alert(status);
        }
    })
}

function ispisIkona(){
    $("#opis1").hide();
    $.ajax({
        url:"data/ikone.json",
        method:"get",
        type:"json",
        success: function(data){
            let ispis="";
                for(let d of data){
                    ispis+=`<div class="col-lg-4" id="donja">
                    <div class="tm-feature">
                        <img src=${d.slika.src} alt=${d.slika.alt} class=${d.klasa}/>
                        <p class="tm-feature-description">${d.tekst}</p>
                        
                        <div data-id=${d.opisi.id}><p class="tm-feature-description">${d.opisi.opisTekst}</p></div>
                    </div>
                    
                </div>`
                }
                document.getElementById("ikone").innerHTML=ispis;
        },
        error: function(xhr,status,error){
            alert(status);
        }
    })




}

$(document).ready(function(){

    slideShow();    

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

function slideShow(){
    var trenutna = $("#slajder .prikazana");
    var sledeca = trenutna.next().length ? trenutna.next() : trenutna.parent().children(":first");
    trenutna.removeClass("prikazana");
    sledeca.addClass("prikazana");
    setTimeout(slideShow, 4000);
}