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
                    <h5 class="mx-5 mb-4">Järgnevalt vaatleme menüüvalikuid</h5>
                    
                </div>

                <div class="row d-flex mb-5">
                <ul class="nav nav-tabs nav-justified col-12 bg-grey">
                    <li class="nav-item"><a  class="nav-link link txt-lg" <?php if(!isset($data['type'])){ echo 'active';$data['type']=1;}else if($data['type']==1){echo 'active';}; ?> href="#kalender" data-toggle="tab">Kalender</a></li>
                    <li class="nav-item"><a  class="nav-link link txt-lg <?php if($data['type']==2){echo 'active';}; ?>" href="#broneeringud" data-toggle="tab">Broneeringud</a></li>

                    <li class="nav-item"><a  class="nav-link link txt-lg <?php if($data['type']==3){echo 'active';}; ?>" href="#kasutajad" data-toggle="tab">Kasutajad</a></li>
                    <li class="nav-item"><a  class="nav-link link txt-lg <?php if($data['type']==4){echo 'active';}; ?>" href="#asutusesatted" data-toggle="tab">Asutuse sätted</a></li>

                </ul>
                </div>

            <div class="tab-content">
                <div id="kalender" class="tab-pane center <?php if(!isset($data['type'])){ echo 'active';}else if($data['type']==1){echo 'active';}; ?>">
                    <u><h4 class="mx-5 mt-2"> Üldinfo: </h4></u>
                    <p class="mx-5 col-9 mt-3 h5">
                    Ruumi vahetamiseks valige sobiv ruum rippmenüüst:
                    <img class="mr-5 mt-3" src="<?php echo base_url(); ?>assets/img/chooseroom.jpg"></p>
                    <p class="mx-5 col-9 mt-5 h5">
                    Kõiki ruume saab korraga vaadata, kui vajutada lingile "Kõik ruumid":
                    <img class="mr-5 mt-3" src="<?php echo base_url(); ?>assets/img/allrooms.png">
                    </p>
                </div>
                <div id="broneeringud" class="tab-pane center <?php if($data['type']==2){echo 'active';}; ?>">
                <div class="mx-5 mt-2">
                        <p class="h5">Selles vaates tekivad automaatselt kõik kalendrisse sisetatud
                        broneeringud tabeli kujul. Tabelist saab broneeringuid otsida märksõnaga. Samuti saab
                        broneeringuid kuupäeva järgi filtreerida. SIIA KA TEHA GIF SELLEST ET SAAB TULPASID LIIGUTADA</p>
                    </div>
                </div>
            
                <div id="kasutajad" class="tab-pane center <?php if($data['type']==3){echo 'active';}; ?>">
                    <div class="mx-5 mt-2">
                        <p class="h5">Kasutajate lehel näeb oma asutuse administraatoreid ning
                        broneeringute klientide kontakte. Viimased tekivad automaatselt, kui tehakse broneering</p>
                    </div>
                </div>
                <div id="asutusesatted" class="tab-pane center <?php if($data['type']==4){echo 'active';}; ?>">
                    sätted
                </div>

            </div>

        </div>
			
		</div>
	</div>
</div>


