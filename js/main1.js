window.onload = function(){
    
    
    
    ispisListe();
    
    document.getElementById("sortiraj").addEventListener("change", sortiraj);
    
    
    

    
}



function sviProizvodi(){
    $.ajax({
        url:"data/proizvodi.json",
        method:"get",
        type:"json",
        success: function(data){
            ispisProizvoda(data);
            
        },
        error: function(err){
            console.log(err);
        }
    })
}

function ispisProizvoda(proizvodi){

        let ispis = "";
        for(let p of proizvodi){
            ispis += `<article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
            <figure>
                <img src=${p.slika.src} alt=${p.slika.alt} class="img-fluid tm-gallery-img" />
                <figcaption>
                    <h4 class="tm-gallery-title">${p.naziv}</h4>
                    <p class="tm-gallery-description">${p.opis}</p>
                    <p class="tm-gallery-price">${p.cena}din</p>
                </figcaption>
            </figure>
            <div class="tm-paging-links">
				<input type="button" class="btnNaruci" data-id=${p.id} class="tm-paging-item" value="Naruči"/>
			</div>
        </article>`
        }
        document.getElementById("tm-gallery-page-pizza").innerHTML = ispis;
        bindCartEvents();
        
}

function ispisMenija(){

    $.ajax({
        url: "data/meni1.json",
        method: "get",
        type:"json",
        success: function(data){
            let ispis = "<ul class='tm-nav-ul'>"
            for(let d of data){
                ispis+=`
                <li class="tm-nav-li"><a href="${d.link}" class=${d.aktivan}>${d.text}</a></li>`     
            }
            ispis+= "</ul>";
            document.getElementById("meni").innerHTML = ispis;

        },
        error: function(xhr,status,error){
            alert(status);
        }
    })
}

function ispisKategorija(){
    $.ajax({
        url: "data/kategorije.json",
        method: "get",
        type:"json",
        success: function(data){
            let ispis="";
            for(let d of data){
                ispis+=`
                <label class="klasa"><input class="radio" type="radio" name="rbKat" value="${d.id}"><i></i>${d.naziv}</label>`     
            }
            
            document.getElementById("meni11").innerHTML = ispis;

            document.getElementsByName("rbKat")[0].addEventListener("change", function(){
              
                sviProizvodi(this.value);
               
            });

            document.getElementsByName("rbKat")[1].addEventListener("change", function(){
              
                filtriraj(this.value);
               
            });

            document.getElementsByName("rbKat")[2].addEventListener("change", function(){
              
                filtriraj(this.value);
               
            });
            document.getElementsByName("rbKat")[3].addEventListener("change", function(){
              
                filtriraj(this.value);
               
            });
               
            
            

        },
        error: function(xhr,status,error){
            alert(status);
        }
    })
    
}


function filtriraj(id){
    $.ajax({
        url: "data/proizvodi.json",
        method: "get",
        type:"json",
        success: function(data){
            data = data.filter(p=> p.katId == id)
            ispisProizvoda(data);
          
        },
        error: function(xhr,status,error){
            alert(status);
        }
    })
}


function ispisListe(){

    let lista=['A-Z', 'Z-A', 'Cena opadajuće', 'Cena rastuće'];
    let value=['1', '2', '3', '4'];
    ispis = "<select id='sortiraj' class='klasa'>";
    ispis +="<option value='0'>Sortirajte</option>";
    for(let i = 0; i < lista.length; i++){
        ispis += "<option value='" + value[i] + "'>" + lista[i] + "</option>";
    }
    ispis += "</select> <a href='korpa.html' class='fas fa-shopping-cart' class='klasa' class='tm-paging-link'></a><i class='fa fa-trash' onclick='isprazniKorpu()' class='klasa' aria-hidden='true'></i>";
    document.getElementById("meni111").innerHTML += ispis;
}




    function sortiraj(){
        var selektovano = document.getElementById("sortiraj").options[document.getElementById("sortiraj").selectedIndex].value;
      
       $.ajax({
          url:"data/proizvodi.json",
          method:"get",
          dataType:"json",
          success:function(data){
    
            if(selektovano == "0"){
              ispisProizvoda(data);
            }
    
            if(selektovano == "1"){
              data.sort(function(a,b){
                if(a.naziv > b.naziv)
                  return 1;
                
                if(a.naziv < b.naziv)
                  return -1;
    
                else
                  return 0;
              });
              ispisProizvoda(data);
            }
    
            if(selektovano == "2"){
              data.sort(function(a,b){
                if(a.naziv > b.naziv)
                  return -1;
                
                if(a.naziv < b.naziv)
                  return 1;
    
                else
                  return 0;
              });
              ispisProizvoda(data);
            }
    
          if(selektovano == "4"){
            data.sort(function(a,b){
              if(a.cena > b.cena)
                return 1;
              if(a.cena < b.cena)
                return -1;
              else  
                return 0;
            });
            ispisProizvoda(data);
          }
    
          if(selektovano == "3"){
            data.sort(function(a,b){
              if(a.cena > b.cena)
                return -1;
              if(a.cena < b.cena)
                return 1;
              else  
                return 0;
            });
            ispisProizvoda(data);
          }
        
        },
          error:function(err){
            console.error(err);
          }
        });
    
    }

    


    function bindCartEvents() {
        $(".btnNaruci").click(dodajUKorpu)
       
    }
    
    function proizUKorpi() {
        return JSON.parse(localStorage.getItem("tm-gallery-page-pizza"));
    }
    
    function dodajUKorpu(e) {
        let id = $(this).data("id");
        e.preventDefault();
        var proizvodi = proizUKorpi();
    
        if(proizvodi) {
            if(proizvodVecUKorpi()) {
                dodajKolicinu();
            } else {
                dodajLokalStor()
            }
        } else {
            dodajPrviLokalStor();
        }
    
        alert("Proizvod dodat u korpu.");
        
       
        function proizvodVecUKorpi() {
            return proizvodi.filter(p => p.id == id).length;
        }
    
        function dodajLokalStor() {
            let proizvodi = proizUKorpi();
            proizvodi.push({
                id : id,
                quantity : 1
            });
            localStorage.setItem("tm-gallery-page-pizza", JSON.stringify(proizvodi));
        }
    
        function dodajKolicinu() {
            let proizvodi = proizUKorpi();
            for(let i in proizvodi)
            {
                if(proizvodi[i].id == id) {
                    proizvodi[i].quantity++;
                    break;
                }      
            }
    
            localStorage.setItem("tm-gallery-page-pizza", JSON.stringify(proizvodi));
        }
    
        
    
        function dodajPrviLokalStor() {
            let proizvodi = [];
            proizvodi[0] = {
                id : id,
                quantity : 1
            };
            localStorage.setItem("tm-gallery-page-pizza", JSON.stringify(proizvodi));
        }
    }
    
    
    
    function isprazniKorpu() {
        localStorage.removeItem("tm-gallery-page-pizza");
        alert("Ispraznili ste korpu.");
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