



//// Racunanje ////

$(document).ready(function() {

/// Promene opcija brzine u odnosu na cilj

    $('#odabir-cilj').change(function() {

       

        if ($(this).val() == 'odrzavanje') {``

            document.getElementById("opis-brzina").innerHTML ='Pri odrzavanju ne postoji mogucnost odabira brzine jer ne postoji promena telesne težine';

            document.getElementById("brzina").innerHTML = "";

          $('#brzina').prop('disabled', true);

        } else if ($(this).val() == 'dobijanje') {

            document.getElementById("opis-brzina").innerHTML ="Brzina ostvarenja se iskazuje kroz procenat telesne težine koji želite da izgubite ili dobijete u proseku nedeljno i ovo su neke smernice:";

            document.getElementById("brzina").innerHTML =

            `<option value="0.3" class="opcija">
                Sporije - za one koji nemaju mnogo iskustva sa praćenjem ishrane ili ne žure previše i vole stvari polako i održivo.
                Moj predlog za sve vas čiji je izbor suficit kalorija.
              </option>
              <option value="0.4" class="opcija" selected>
               Srednje - za one koji imaju srednje iskustva sa praćenjem ishrane ili žele rezultate očekivanom brzinom.
              Moj predlog za sve vas čiji je izbor deficit kalorija.
              </option>
              <option value="0.85" class="opcija" >
                Brže - za one koji imaju baš mnogo iskustva sa praćenjem ishrane ili oni koji žele najbrže rezultate (sa najviše negativnih
                nuspojava, npr veći gubitak mišića kod onih u deficitu tj veći dobitak masnih naslaga kod onih u suficitu).
                Predlažem samo u retkim situacijama i samo kod iskusnih.
              </option>`

          $('#brzina').prop('disabled', false);

        } else if ($(this).val() == 'gubljenje') {

            document.getElementById("opis-brzina").innerHTML ="Brzina ostvarenja se iskazuje kroz procenat telesne težine koji želite da izgubite ili dobijete u proseku nedeljno i ovo su neke smernice:";

            document.getElementById("brzina").innerHTML =

            `<option value="0.3" class="opcija">
                Sporije - za one koji nemaju mnogo iskustva sa praćenjem ishrane ili ne žure previše i vole stvari polako i održivo.
                Moj predlog za sve vas čiji je izbor suficit kalorija.
              </option>
              <option value="0.4" class="opcija" selected>
               Srednje - za one koji imaju srednje iskustva sa praćenjem ishrane ili žele rezultate očekivanom brzinom.
              Moj predlog za sve vas čiji je izbor deficit kalorija.
              </option>
              <option value="0.85" class="opcija" >
                Brže - za one koji imaju baš mnogo iskustva sa praćenjem ishrane ili oni koji žele najbrže rezultate (sa najviše negativnih
                nuspojava, npr veći gubitak mišića kod onih u deficitu tj veći dobitak masnih naslaga kod onih u suficitu).
                Predlažem samo u retkim situacijama i samo kod iskusnih.
              </option>
            `

          $('#brzina').prop('disabled', false);
        }
      });
    /// prevent refresh and go on top of page

    $('#submit-calculator').click(function(e){ 

        e.preventDefault();

    });

    /// calculator

    $('#submit-calculator').click(function() {

       /// vrednosti inputa

        let ciljVal = $('#odabir-cilj').val();

        let polVal = $('#pol').val();

        let godineVal = $('#godine').val();

        let tezinaVal = $('#tezina').val();

        let visinaVal = $('#visina').val();

        let aktivnostVal = $('#aktivnost').val();

        let brzinatVal = parseFloat($('#brzina').val());

       



        /// vrednost grama proteina zavisno od aktivnosti

        if (aktivnostVal==='veoma-neaktivan' || aktivnostVal==='lagano-aktivan') {

            var gramProteina = 1.5;

        }else if (aktivnostVal==='srednje-aktivan') {

            var gramProteina = 1.8;

        }else{

            var gramProteina = 2; 

        }

        /// dodavanje 0.2g ako je gubljenje

        if(ciljVal==="gubljenje"){

            gramProteina=gramProteina+0.2;

        }

        

        //// vrednosti idealnih tezina

        let idealnaMasti=visinaVal-100;

        if (polVal==='muski') {

            var idealnaProteini= visinaVal-80;

            gramMasti=0.8;

        } else {

            var idealnaProteini= visinaVal-90;

            gramMasti=1;

        }



        //dnevna promena u zavisnosti od brzine

        let dnevnaPromena = tezinaVal*brzinatVal*10;

        dnevnaPromenaMasti=dnevnaPromena*0.713*0.87*9;//cal

        dnevnaPromenaTkiva=dnevnaPromena*0.287*0.3*4;//cal

        let promena = (dnevnaPromenaMasti+dnevnaPromenaTkiva)/7;

        if (ciljVal==='odrzavanje') {

            promena= 0;

           // console.log(brzinatVal);

        }

            

        if (godineVal == "" || godineVal < 15 || godineVal > 80){

            ///unestite ispravne godine

            $('#godine_greska').removeClass('error-message-invisible').addClass('error-message-visible');

            $('#godine').focus();

        } else{

            $('#godine_greska').removeClass('error-message-visible').addClass('error-message-invisible');

            if (tezinaVal == "" || tezinaVal < 30 || tezinaVal > 200) {

                //////unestite ispravne tezinu

                $('#tezina_greska').removeClass('error-message-invisible').addClass('error-message-visible');

                $('#tezina').focus();

            } else {

                $('#tezina_greska').removeClass('error-message-visible').addClass('error-message-invisible');



                if (visinaVal == "" || visinaVal < 100 || visinaVal > 250) {

                    //////unestite ispravne visinu

                    $('#visina_greska').removeClass('error-message-invisible').addClass('error-message-visible');

                    $('#visina').focus();

                } else {

                    $('#visina_greska').removeClass('error-message-visible').addClass('error-message-invisible');

                    let rezultat = 66.5+(13.75*tezinaVal)+(5.003*visinaVal)-(6.775*godineVal);

                    if (polVal==="zenski") {

                        var BMP = 655.1+(9.563*tezinaVal)+(1.85*visinaVal)-(4.676*godineVal);

                    }else {var BMP = rezultat;}

                    

                    /// BMP zavisno od aktivnosti



                    if (aktivnostVal==="veoma-neaktivan"){BMP=BMP*1.2;}

                    if (aktivnostVal==="lagano-aktivan"){BMP=BMP*1.3;}

                    if (aktivnostVal==="srednje-aktivan"){BMP=BMP*1.45;}

                    if (aktivnostVal==="veoma-aktivan"){BMP=BMP*1.6; }

                    if (aktivnostVal==="ektremno-aktivan"){BMP=BMP*1.75;}

                    let BMPactiv= BMP;



                    /// BMP zavisno od cilja

                    

                    if (ciljVal==="dobijanje"){BMPactiv=BMPactiv+promena;}

                    if (ciljVal==="gubljenje"){BMPactiv=BMPactiv-promena;}

                    if (ciljVal==="odrzavanje"){BMPactiv=BMPactiv;}



                    //// konacan BMP 

                    let BMPFinal = Math.floor(BMPactiv);

                              

                    /// Proracun procenta nutrienata

                    let MastiProcent= Math.floor(idealnaMasti*gramMasti);

                    let ProteiniProcent= Math.floor(idealnaProteini*gramProteina);



                    /// Proracun gramaze nutrienata

                    let Masti = MastiProcent*9;

                    let Proteini = ProteiniProcent*4;

                    let Hidrati = Math.floor((BMPFinal-Masti-Proteini)/4);



                    //// Ispisivanje rezultata

                    document.getElementById("kalorije").innerHTML = "Kalorije: "+BMPFinal+" kcal";

                    document.getElementById("protein").innerHTML = "Protein: "+ProteiniProcent+" g";

                    document.getElementById("hidrat").innerHTML = "Ugljeni hidrati: "+Hidrati+" g";

                    document.getElementById("mast").innerHTML = "Masti: "+MastiProcent+" g";

                   

                }/////

                



                

            }

        }

        

    });

});



