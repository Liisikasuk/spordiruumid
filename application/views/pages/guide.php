<?php // echo validation_errors(); ?>
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
           
                
                    <u><h5 class="m-5">
                    Kalendris on nelja tüüpi kasutajaid:
                    </h5></u>
                    <div class="m-5 px-5">
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
                    
                </div>

                <!-- <div class="row d-flex mb-5">
                <ul class="nav nav-tabs nav-justified col-12 bg-grey">
                    <li class="nav-item"><a  class="nav-link link txt-lg" <?php if(!isset($data['type'])){ echo 'active';$data['type']=1;}else if($data['type']==1){echo 'active';}; ?> href="#kalender" data-toggle="tab">Kalender</a></li>
                    <li class="nav-item"><a  class="nav-link link txt-lg <?php if($data['type']==2){echo 'active';}; ?>" href="#broneeringud" data-toggle="tab">Broneeringud</a></li>

                    <li class="nav-item"><a  class="nav-link link txt-lg <?php if($data['type']==3){echo 'active';}; ?>" href="#kasutajad" data-toggle="tab">Kasutajad</a></li>
                    <li class="nav-item"><a  class="nav-link link txt-lg <?php if($data['type']==4){echo 'active';}; ?>" href="#asutusesatted" data-toggle="tab">Asutuse sätted</a></li>

                </ul>
                </div> -->
                <div class="mx-5 mb-4">
                    <ul>
                        <li class="h5"><span class="toc-item-body">
                        <a href="#kasutajad" class="toc-link h5">Kasutajad</a></span>
                        </li>
                        <li class="h5"><span class="toc-item-body">
                        <a href="#broneeringud" class="toc-link h5">Broneeringud</a>
                        </li>
                        <li class="h5"><span class="toc-item-body">
                        <a href="#satted" class="toc-link h5">Sätted</a>
                        </li>
                        <div class="ml-5">
                            <li class="h5"><span class="toc-item-body">
                            <a href="#asutusesatted" class="toc-link h5">Asutuse sätted</a>
                            </li>
                            <li class="h5"><span class="toc-item-body">
                            <a href="#broneerimisvorm" class="toc-link h5">Broneerimisvormi sätted</a>
                            </li>
                        </div>
                        <li class="h5"><span class="toc-item-body">
                        <a href="#kalender" class="toc-link h5">Kalender</a>
                        </li>
                        <div class="ml-5">
                            <li class="h5"><span class="toc-item-body">
                            <a href="#uldinfo" class="toc-link h5">Üldinfo</a>
                            </li>
                            <li class="h5"><span class="toc-item-body">
                            <a href="#broneeringutegemine" class="toc-link h5">Broneeringu tegemine</a>
                            </li>
                            <li class="h5"><span class="toc-item-body">
                            <a href="#bronnimuutmine" class="toc-link h5">Olemasoleva broneeringu muutmine</a>
                            </li>
                            <li class="h5"><span class="toc-item-body">
                            <a href="#bronniliigutamine" class="toc-link h5">Kalendrivaates broneeringute liigutamine</a>
                            </li>
                            <li class="h5"><span class="toc-item-body">
                            <a href="#bronnikustutamine" class="toc-link h5">Broneeringu kustutamine</a>
                            </li>
                        </div>
                    </ul>
                </div>
                    <h4 class="mx-5 mb-4 font-weight-bold" id="kasutajad">Kasutajad</h4>
                    <div class="mx-5 mt-2">
                        <p class="h5">Kasutajate lehel näeb oma asutuse administraatoreid ning
                        broneeringute klientide kontakte. Viimased tekivad automaatselt, kui tehakse broneering</p>
                    </div>
                <div>
                </div>
                    <h4 class="mx-5 mb-4 mt-4 font-weight-bold" id="broneeringud">Broneeringud</h4>
                    <div class="mx-5 mt-2">
                        <p class="h5">Selles vaates tekivad automaatselt kõik kalendrisse sisetatud
                        broneeringud tabeli kujul. Tabelist saab broneeringuid otsida märksõnaga. Samuti saab
                        broneeringuid kuupäeva järgi filtreerida. SIIA KA TEHA GIF SELLEST ET SAAB TULPASID LIIGUTADA</p>
                    </div>
                <div>
                </div>
                    <h4 class="mx-5 mb-4 mt-4 font-weight-bold" id="satted">Sätted</h4>
                    <div class="mx-5 mt-2">
                        <p  class="h5"><u id="asutusesatted" class="h5">Asutuse sätete</u> all näeb oma asutusega seotud infot. 
                        Peaadministraator saab ruume muuta või lisada, kui vajutada lehe alumises osas nuppu 
                        <img class="mr-2 mb-1 col-4" src="<?php echo base_url(); ?>assets/img/settingsEditRoom.jpg">. Broneeringute
                        tegemiseks tuleb ruumid lisada. Võimalik, et asutuses on ruume, mida renditakse välja, kuid selle ruumi kalendrit
                        soovitakse teiste eest peita (saun, majutus, konverentsiruum vms). Sellisel juhul saab ruume
                        teiste kasutajate eest ära peita, kuid asutuse administraatorid saavad ruumide kalendreid endiselt hallata</p>
                    </div>
                    <div class="mx-5 mt-5">
                        <p class="h5"><u id="broneerimisvorm" class="h5">Broneerimisvormi sätted</u> - kõige pealt saab asutus
                        seadistada kohustuslikud väljad administraatorile. Seejärel, kui asutuse poolt on tavakasutajate
                        broneerimine lubatud, siis avanevad tavakasutaja vormi sätted. Iga asutus saab valida, mis väljad
                        iga erineva päringu jaoks on nähtavad (kuvatakse kliendile päringu vormil) ning millised
                        väljad on kohustuslikud (mis tuleb kliendil kindlasti täita). Iga erineva broneeringutüübi (sündmus,
                        ühekordne treening, hooajaline treening) jaoks on oma sätted. SIIA KA GIF TEHA</p>
                    </div>
                <div>
                    <h4 class="mx-5 mb-4 font-weight-bold mt-4" id="kalender">Kalender</h4>
                    <u><h4 class="mx-5 mt-2" id="uldinfo"> Üldinfo: </h4></u>
                    <div>
                        <p class="mx-5 col-10 mt-3 h5">
                        Ruumi vahetamiseks valige sobiv ruum rippmenüüst:
                        <img class="mr-5 mt-3" src="<?php echo base_url(); ?>assets/img/chooseroom.jpg"></p>
                        <p class="mx-5 col-10 mt-5 h5">
                        Kõiki ruume saab korraga vaadata, kui vajutada lingile "Kõik ruumid":
                        <img class="mr-5 mt-3" src="<?php echo base_url(); ?>assets/img/allrooms.png">
                        </p>
                        <p class="mx-5 col-10 mt-5 h5">
                        Tagasi kalendrisse saamiseks vajuta "Tagasi töökalendrisse":
                        <img class="mr-5 mt-3" src="<?php echo base_url(); ?>assets/img/backToCalendar.png">
                        </p>
                        <p class="mx-5 col-10 mt-4 h5">
                        Tavakasutajad näevad avalikus kalendris ainult klubi nime ning ruumi kasutamise
                        eesmärki (vasakpoolne pilt). Asutuse kasutajad näevad lisaks päringu aega, 
                        broneeringu värvi ning broneeringu muutmise märki (parempoolne pilt):
                        <img class="mr-5 mt-3" src="<?php echo base_url(); ?>assets/img/calendarView.png">
                        </p>
                        <p class="mx-5 col-10 mt-5 h5">
                        Broneeringul klikkides avaneb vasakul modaalaken, kus  näeb broneeringuga seotud infot.
                        Modaalaknas saab sakke kokku pakkida, kui nendel vajutada:
                        
                        </p><img class="mx-2 mt-3 col-sm-12" src="<?php echo base_url(); ?>assets/img/modalwindowPacking.gif">
                    </div>

                    <u><h4 class="mx-5 mt-5" id="broneeringutegemine"> Broneeringu tegemine: </h4></u>
                    <div> 
                        <p class="mx-5 col-10 mt-3 h5">
                        Broneeringu tegemiseks valige hiirega otse kalendris sobiv kuupäev ja ajavahemik: </p>
                        <img class="mx-2 mt-3 col-sm-12" src="<?php echo base_url(); ?>assets/img/makingReservation.gif"></p>
                        <p class="mx-5 col-10 mt-5 h5">
                        või vajutage üleval paremal olevat nuppu "Uus broneering". Peale seda viiakse Teid broneeringu
                        tegemise lehele, kus saate valida millist broneeringut Te teha soovite, kas ühekordne,
                        hooajaline või suletud:
                        </p> <img class="mx-2 mt-3 col-sm-12" src="<?php echo base_url(); ?>assets/img/chooseReservation.gif">
                        
                        <p class="mx-5 col-10 mt-5 h5">
                        Täitke väljad ja vajutage "Broneeri". Kattuvate aegade puhul antakse Teile 
                        sellest teada:
                        
                        </p>
                        <img class="mx-5 mt-3" src="<?php echo base_url(); ?>assets/img/overlapReservations.png">
                    </div>
                    <u><h4 class="mx-5 mt-5" id="muutmine"> Olemasoleva broneeringu muutmine: </h4></u>
                    <div>

                    </div>
                    <u><h4 class="mx-5 mt-5" id="bronniliigutamine"> Kalendrivaates broneeringute liigutamine: </h4></u>
                    <div>

                    </div>
                    <u><h4 class="mx-5 mt-5" id="bronnikustutamine"> Broneeringu kustutamine: </h4></u>
                    <div>

                    </div>
                
                </div>
                
                

            

        </div>
			
		</div>
	</div>
</div>

<!-- <script>



</script> -->


