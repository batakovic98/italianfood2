$(document).ready(function () {
    let proizvodi = proizvodiUKorpi();
    
    
        
    if(proizvodi == null)
        praznaKorpa();
    else
        prikazUKorpi();
    
    

});

function prikazUKorpi() {
    let proizvodi = proizvodiUKorpi();

    $.ajax({
        url : "data/proizvodi.json",
        success : function(data) {
            let proizvodiZaPrikazivanje = [];

            //izdvajanje objekata dohvacenih ajaxom tako da tu budu samo objekti koji su u localstorage i dodavanje kolicine
            data = data.filter(p => {
                for(let prioiz of proizvodi)
                {
                    if(p.id == prioiz.id) {
                        p.quantity = prioiz.quantity;
                        return true;
                    }
                        
                }
                return false;
            });
            napraviListu(data)
        }
    });
}

function napraviListu(proizvodi) {
    let ispis = "";
   
                
    for(let p of proizvodi) {
        ispis += generisiListu(p);
    }

    

    $("#korpa").html(ispis);

    function generisiListu(p) {
       return  `<article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
            <figure>
                <img src=${p.slika.src} alt=${p.slika.alt} class="img-fluid tm-gallery-img" />
                <figcaption>
                    <h4 class="tm-gallery-title">${p.naziv}</h4>
                    <p class="tm-gallery-description">${p.opis}</p>
                    <p class="tm-gallery-price">${p.cena}din</p>
                    <p class="tm-gallery-price">${p.quantity}kom</p>
                </figcaption>
            </figure>
            <div class="tm-paging-links">
            <input type="button" class="btnNaruci" onclick='izbrisiIzKorpe(${p.id})' class="tm-paging-item"  value="Ukloni"/>
			</div>
        </article>`
    }
}

function praznaKorpa() {
    $("#korpa").html("<p class='prazna' >Korpa je prazna! </p>");
}

function proizvodiUKorpi() {
    return JSON.parse(localStorage.getItem("tm-gallery-page-pizza"));
}



function izbrisiIzKorpe(id) {
    let proizvodi = proizvodiUKorpi();
    let filtrirano = proizvodi.filter(p => p.id != id);

    localStorage.setItem("tm-gallery-page-pizza", JSON.stringify(filtrirano));

    prikazUKorpi();
}

$("#isprazni").click(function(){
    isprazniKorpu();
    praznaKorpa();
    
    

});

function isprazniKorpu() {
    localStorage.removeItem("tm-gallery-page-pizza");
    alert("Da li zelite da ispraznite korpu?");
}