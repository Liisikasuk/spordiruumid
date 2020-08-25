<?php // echo validation_errors(); ?>
<html style="scroll-behavior:smooth">
<div class="container">
	<div class="container-md">
    
		<div id="nav-tabs" class="mt-5 pb-5 form-bg">
            <h3 class="text-center text-dark mt-4">Spordiruumide veebikalendri juhend</h3>
            <div class="row d-flex mb-5">
                <!-- <ul class="nav nav-tabs nav-justified col-12 bg-grey">
                    <li class="nav-item"><a  class="nav-link link txt-lg" <?php if(!isset($data['type'])){ echo 'active';$data['type']=1;}else if($data['type']==1){echo 'active';}; ?> href=#uldinfo data-toggle="tab">Üldinfo</a></li>
                    <li class="nav-item"><a  class="nav-link link txt-lg <?php if($data['type']==2){echo 'active';}; ?>" href="#kalender" data-toggle="tab">Kalender</a></li>
                </ul> -->
            </div>
                <div> 
           
                
                    
                    
                </div>
                <div class="mx-5 mb-4">
                    <ul>
                        <li><span class="toc-item-body">
                        <a href="#kasutajad" class="toc-link text-primary">Kasutajad</a></span>
                        </li>
                        <li><span class="toc-item-body">
                        <a href="#broneeringud" class="toc-link text-primary">Broneeringud</a>
                        </li>
                        <li><span class="toc-item-body">
                        <a href="#satted" class="toc-link text-primary">Sätted</a>
                        </li>
                        <div class="ml-5">
                            <li><span class="toc-item-body">
                            <a href="#asutusesatted" class="toc-link text-primary">Asutuse sätted</a>
                            </li>
                            <li><span class="toc-item-body">
                            <a href="#broneerimisvorm" class="toc-link text-primary">Broneerimisvormi sätted</a>
                            </li>
                        </div>
                        <li><span class="toc-item-body">
                        <a href="#kalender" class="toc-link text-primary">Kalender</a>
                        </li>
                        <div class="ml-5">
                            <li><span class="toc-item-body">
                            <a href="#uldinfo" class="toc-link text-primary">Üldinfo</a>
                            </li>
                            <li><span class="toc-item-body">
                            <a href="#broneeringutegemine" class="toc-link text-primary">Broneeringu tegemine</a>
                            </li>
                            <li><span class="toc-item-body">
                            <a href="#bronnimuutmine" class="toc-link text-primary">Olemasoleva broneeringu muutmine</a>
                            </li>
                            <li><span class="toc-item-body">
                            <a href="#bronniliigutamine" class="toc-link text-primary">Kalendrivaates broneeringute liigutamine</a>
                            </li>
                            <li><span class="toc-item-body">
                            <a href="#bronnikustutamine" class="toc-link text-primary">Broneeringu kustutamine</a>
                            </li>
                        </div>
                    </ul>
                </div>
                    <h5 class="mx-5 mb-4 mt-5 font-weight-bold" id="kasutajad">Kasutajad</h5>
                    <div class="mx-5 mt-2">
                    <u><p class="mx-4">
                    Kalendris on nelja tüüpi kasutajaid:
                    </p></u>
                    <div class="mt-4 mx-5">
                        <ul>
                            <li><p>KOV administraator - Pärnu Linnavalitsuse ametnik, kes jagab
                            asutuste esindajatele õiguseid. Näeb kõiki süsteemi kasutajaid, asutusi
                            ja kalendrite vaateid</p></li>
                        </ul>
                        <ul>
                            <li><p>Asutuse peaadministraator - oma asutuse piires saab muuta ja lisada ruume
                            ning hallata administraatoreid. Lisaks on tal samad õigused, mis administraatoril</p></li>
                        </ul>
                        <ul>
                            <li><p>Asutuse administraator - saab teha kõiki toiminguid seoses broneeringutega.
                            Näeb teisi asutuse kasutajaid ning asutuse sätteid (muuta ei saa)</p></li>
                        </ul>
                        <ul>
                            <li><p>Tavakasutaja - sisse logimata saab näha ruumide saadavust. Sisse loginuna
                            saab ruumi broneerimiseks saata asutusele päringu. Saab oma broneeringuid hallata</p></li>
                        </ul>
                    </div>
                        <p class="mt-4">Kasutajate lehel näeb oma asutuse administraatoreid ning
                        broneeringute klientide kontakte. Viimased tekivad automaatselt, kui tehakse broneering</p>
                    </div>
                <div>
                </div>
                    <h5 class="mx-5 mb-5 mt-5 font-weight-bold" id="broneeringud">Broneeringud</h5>
                    <div class="mx-5 mt-5">
                        <p>Selles vaates tekivad automaatselt kõik kalendrisse sisetatud
                        broneeringud tabeli kujul. Tabelist saab broneeringuid otsida märksõnaga. Samuti saab
                        broneeringuid kuupäeva järgi filtreerida.</p>
                        <img class="mx-2 mt-5 mb-5 col-sm-12" src="<?php echo base_url(); ?>assets/img/movingColumns.gif">
                    </div>
                <div>
                </div>
                    <h5 class="mx-5 mb-5 mt-5 font-weight-bold" id="satted">Sätted</h5>
                    <div class="mx-5 mt-2">
                        <p><u id="asutusesatted">Asutuse sätete</u> all näeb oma asutusega seotud infot. 
                        Peaadministraator saab ruume muuta või lisada, kui vajutada lehe alumises osas nuppu 
                        <img class="mr-2 mb-1 col-4" src="<?php echo base_url(); ?>assets/img/settingsEditRoom.jpg">. Broneeringute
                        tegemiseks tuleb ruumid lisada. Võimalik, et asutuses on ruume, mida renditakse välja, kuid selle ruumi kalendrit
                        soovitakse teiste eest peita (saun, majutus, konverentsiruum vms). Sellisel juhul saab ruume
                        teiste kasutajate eest ära peita, kuid asutuse administraatorid saavad ruumide kalendreid endiselt hallata</p>
                    </div>
                    <div class="mx-5 mt-5">
                        <p><u id="broneerimisvorm">Broneerimisvormi sätted</u> - kõige pealt saab asutus
                        seadistada kohustuslikud väljad administraatorile. Seejärel, kui asutuse poolt on tavakasutajate
                        broneerimine lubatud, siis avanevad tavakasutaja vormi sätted. Iga asutus saab valida, mis väljad
                        iga erineva päringu jaoks on nähtavad (kuvatakse kliendile päringu vormil) ning millised
                        väljad on kohustuslikud (mis tuleb kliendil kindlasti täita). Iga erineva broneeringutüübi (sündmus,
                        ühekordne treening, hooajaline treening) jaoks on oma sätted. </p>
                        <img class="mx-2 mt-5 mb-5 col-sm-12" src="<?php echo base_url(); ?>assets/img/reservationformSettings.gif">

                    </div>
                <div>
                    <h5 class="mx-5 mb-5 font-weight-bold mt-5" id="kalender">Kalender</h5>
                    <u><h5 class="mx-5 mt-2" id="uldinfo"> Üldinfo: </h5></u>
                    <div>
                        <p class="mx-5 col-10 mt-3">
                        Ruumi vahetamiseks valige sobiv ruum rippmenüüst:
                        <img class="mr-5 mt-5 col-9" src="<?php echo base_url(); ?>assets/img/chooseroom.jpg"></p>
                        <p class="mx-5 col-10 mt-5">
                        Kõiki ruume saab korraga vaadata, kui vajutada lingile "Kõik ruumid":
                        <img class="mr-5 mt-5 col-7" src="<?php echo base_url(); ?>assets/img/allrooms.png">
                        </p>
                        <p class="mx-5 col-10 mt-5">
                        Tagasi kalendrisse saamiseks vajuta "Tagasi töökalendrisse":
                        <img class="mr-5 mt-5 col-5" src="<?php echo base_url(); ?>assets/img/backToCalendar.png">
                        </p>
                        <p class="mx-5 col-10 mt-4">
                        Tavakasutajad näevad avalikus kalendris ainult klubi nime ning ruumi kasutamise
                        eesmärki (vasakpoolne pilt). Asutuse kasutajad näevad lisaks päringu aega, 
                        broneeringu värvi ning broneeringu muutmise märki (parempoolne pilt):
                        <img class="mr-5 mt-4 col-12" src="<?php echo base_url(); ?>assets/img/calendarView.png">
                        </p>
                        <p class="mx-5 col-10 mt-5">
                        Broneeringul klikkides avaneb vasakul modaalaken, kus  näeb broneeringuga seotud infot.
                        Modaalaknas saab sakke kokku pakkida, kui nendel vajutada:
                        
                        </p><img class="mx-2 mt-5 mb-4 col-sm-12" src="<?php echo base_url(); ?>assets/img/modalwindowPacking.gif">
                    </div>

                    <u><h5 class="mx-5 mt-5" id="broneeringutegemine"> Broneeringu tegemine: </h5></u>
                    <div> 
                        <p class="mx-5 col-10 mt-5">
                        Broneeringu tegemiseks valige hiirega otse kalendris sobiv kuupäev ja ajavahemik: </p>
                        <img class="mx-2 mt-5 mb-5 col-sm-12" src="<?php echo base_url(); ?>assets/img/makingReservation.gif"></p>
                        <p class="mx-5 col-10 mt-5">
                        või vajutage üleval paremal olevat nuppu "Uus broneering". Peale seda viiakse Teid broneeringu
                        tegemise lehele, kus saate valida millist broneeringut Te teha soovite, kas ühekordne,
                        hooajaline või suletud:
                        </p> <img class="mx-2 mt-5 mb-3 col-sm-12" src="<?php echo base_url(); ?>assets/img/chooseReservation.gif">
                        
                        <p class="mx-5 col-10 mt-5">
                        Täitke väljad ja vajutage "Broneeri". Kattuvate aegade puhul antakse Teile 
                        sellest teada:
                        
                        </p>
                        <img class="mx-5 mt-3 col-6" src="<?php echo base_url(); ?>assets/img/overlapReservations.png">
                        <p class="mx-5 col-10 mt-3"> Sellist broneeringut saab salvestada või muuta. Kui veateateid ei ole viiakse kasutaja otse 
                        kalendrivaatesse tagasi. </p>
                    </div>
                    <u><h5 class="mx-5 mt-5" id="bronnimuutmine"> Olemasoleva broneeringu muutmine: </h5></u>
                    <div>
                        <p class="mx-5 col-10 mt-5">
                        Modaalaknas asuvad broneeringute muutmise nupud. Märgistage broneeringud, mida soovite
                        muuta. Seejärel vajutage nuppu "muuda valitud" </p>
                        <img class="mx-2 mt-4 mb-5 col-sm-12" src="<?php echo base_url(); ?>assets/img/changeReservation.gif"></p>
                        <p class="mx-5 col-10 mt-5">
                        Tervet hooajalist broneeringut saab muuta korraga, kui vajutada nuppu "Muuda hooajaliselt".
                        Valige üks päev, millisest alates Te soovite hooajalist broneeringut muuta. Süsteem tuvastab kõik
                        tulevased valitud nädalapäeva ja kellaaegadega broneeringud ning seejärel viiakse kasutaja
                        broneeringu muutmise vaatesse.
                        </p> <img class="mx-2 mt-4 mb-5 col-sm-12" src="<?php echo base_url(); ?>assets/img/changeSeasonal.gif">
                        
                        <p class="mx-5 col-10 mt-5">
                        Broneeringu muutmisvaates kuvatakse kattuvaid aegu ainult tuleviku kohta. Broneeringu muudatuse salvestamisel
                        ei hoiatata uutest kattuvatest aegadest. Seda näeb kalendrist, kui klikkida broneeringul. Kattuvad ajad on modaalaknas punased:
                        
                        </p><img class="mx-5 mt-3 mb-5 col-7" src="<?php echo base_url(); ?>assets/img/redOverlapTimes.png">
                        <p class="mx-5 col-10 mt-5">
                        Iga muudatuse tagajärjel küsitakse muutmise põhjust ning sellest tekib logi. Logi näeb
                        modaalaknas: 
                        </p><img class="mx-2 mt-4 mb-5 col-sm-12" src="<?php echo base_url(); ?>assets/img/changeInfo.gif">
                    </div>
                    <u><h5 class="mx-5 mt-5" id="bronniliigutamine"> Kalendrivaates broneeringute liigutamine: </h5></u>
                    <div>
                        <p class="mx-5 col-10 mt-5">
                        Seotud broneeringu lisamiseks tuleb all hoida klahvi
                        <img class="col-sm-2" src="<?php echo base_url(); ?>assets/img/shift.jpg"> 
                        ja samal ajal lohistada broneeringut: </p>
                        <img class="mx-2 mt-3 mb-5 col-sm-12" src="<?php echo base_url(); ?>assets/img/movingWithShift.gif"></p>
                        <p class="mx-5 col-10 mt-5">
                        Kalendris saab broneeringuid muule ajale ja kuupäevale lohistada või broneeringu alt otsast
                        kinni võttes broneeringu aega pikemaks/lühemaks teha:
                        </p> <img class="mx-2 mt-3 mb-5 col-sm-12" src="<?php echo base_url(); ?>assets/img/movingReservation.gif">
                    </div>
                    <u><h4 class="mx-5 mt-5" id="bronnikustutamine"> Broneeringu kustutamine: </h4></u>
                    <div>
                        <p class="mx-5 col-10 mt-5">
                        Broneeringu kustutamiseks klõpsa broneeringu peal. Avanenud modaalaknas vali, kas tahad kustutada kõik
                        seotud broneerinud (selleks tee linnuke "VALI KÕIK" ette), ainult selle ühe valitud broneeringu
                        (mille peal kalendrivaates klõpsasid) või mitu broneeringut (selleks klõpsa linnuke nende kuupäevade
                        ja broneeringute ette, mida soovid kustutada):
                        </p> <img class="mx-2 mt-3 mb-5 col-sm-12" src="<?php echo base_url(); ?>assets/img/deleteReservation.gif">
                    </div>
                
                </div>
                
                

            

        </div>
			
		</div>
	</div>
</div>

<script>
    // $(document).ready(function(){
    //     $(this).scrollTop(0);
    // });
</script>


