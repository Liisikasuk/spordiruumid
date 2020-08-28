<?php if($this->session->userdata('roleID')==='2'||$this->session->userdata('roleID')==='3'||$this->session->userdata('roleID')==='1'){?>
 <div class="container">
	<div class="container-md mx-auto mt-5">
		<div class="bg-white form-bg">

            <div class="d-flex mb-5">
                <ul class="nav nav-tabs nav-justified col-12 bg-grey p-0">
                    <li class="nav-item p-0"><a class="nav-link link txt-lg single-tab active pl-5"  href="#asutus" data-toggle="tab"><?php foreach ($editBuildings as $value) {echo $value['name'];break;}?> sätted</a></li>
						<li class="nav-item p-0"><a class="nav-link link txt-lg" href="#broneering" data-toggle="tab">Broneerimisvormi sätted</a></li>
						<li class="nav-item p-0"></li>
				</ul>
            </div>

						<div class="tab-content ">
							<div id="asutus" class="tab-pane center  <?php if(!isset($data['type'])){ echo 'active';}else if($data['type']==1){echo 'active';}; ?>">
							<?php echo form_open('building/update', array('id' => 'change')); ?>
							<input class="d-none" type="hidden" name="id" value="<?php echo $this->uri->segment(3);?>">
						
									<h4 class="pt-2 txt-xl px-5 mx-5 mt-4">Asutuse info</h4>

									<div class="row d-flex p-0 mt-4 px-md-5 mx-5">
											<div class="form-label-group col-12 col-md-6 py-0 pl-0 pr-5">
											<label for="status">Piirkond</label>
											<select id="place" name="place" class="form-control arrow">
												<option value="0" >Vali piirkond</option>
											<?php foreach($regions as $region) {?>
													<option value="<?php echo $region['regionID'];?>" <?php if ($editBuildings[0]['regionID']==$region['regionID']){echo 'selected';}?>><?php echo $region['regionName'];?></option>
											<?php }?>
											</select>
											</div>
									</div>
									<div class="row d-flex p-0 mt-4 px-md-5 mx-5">
											<div class="form-label-group col-12 col-md-6 py-0 pl-0 pr-5">
													<label>Kontakt email*</label>
													<input class="form-control" id="contact_email" type="email" name="email" value="<?php foreach ($editBuildings as $value) {echo $value['contact_email'];break;}?>">
											</div>
											<div class="form-label-group col-12 col-md-6 p-0 pl-0 pl-md-5  pr-5 pr-md-0">
													<label>Teavituste email</label>
													<input class="form-control" id="notify_email" type="email" name="notifyEmail" value="<?php foreach ($editBuildings as $value) {echo $value['notify_email'];break;}?>">
											</div>
									</div>

									<div class="row d-flex p-0 mt-4 px-md-5 mx-5">
											<div class="form-label-group col-12 col-md-6 py-0 pl-0 pr-5">
													<label>Telefoni number*</label>
													<input class="form-control" id="phone" type="number" name="phone" value="<?php foreach ($editBuildings as $value) {echo $value['phone'];break;}?>">
											</div>
											<div class="form-label-group col-12 col-md-6 p-0 pl-0 pl-md-5  pr-5 pr-md-0">
													<label>Hinnakirja link (url) <b data-tooltip="Aadress peab olema kujul: https://koduleht.ee "><img id="tool" class="mr-5" src="<?php echo base_url(); ?>assets/img/icon-info.svg" width="6%"></b></label>
													<input class="form-control" id="price_url" type="text" name="price_url" value="<?php foreach ($editBuildings as $value) {echo $value['price_url'];break;}?>">
											</div>
									</div>

									<h4 class="mt-5 txt-xl px-5 mx-5 pb-3">Ruumid</h4>
									<div class="form-label-group py-0 px-5 mx-5" id="saalid">
											<label class="txt-regular txt-lg">Nähtavad ruumid <b data-tooltip="Kõik kasutajad näevad"><img id="tool" class="mr-5" src="<?php echo base_url(); ?>assets/img/icon-info.svg" width="3%"></b></label>
											<?php foreach ($editBuildings as $value) { 
										
												if ($value['roomActive'] == 1) { 
													echo('<div class="row d-flex mb-3 p-0 justify-content-between"> 
													<input class="d-none" type="hidden" name="roomID[]" value="'.$value['id'].'"> 
													<input class="form-control col-6" id="activeRoom[]" type="text" name="room[]" value="' . $value['roomName'] .'">
													<input name="color[]" type="color" value="'. $value["roomColor"] .'">
													<input type="button" id="activeOrPassive'.$value['id'].'" data-id="'.$value['id'].'" class="btn btn-custom btn-width-92 text-white text-center py-1 px-2 txt-strong" value="Nähtav"> 

													<input data-id="'.$value['id'].'" class="btn btn-delete btn-width-92 text-white text-center py-1 px-2 txt-strong"  type="button" value="Kustuta">
													</div>'); 
												}}; ?>
									</div>
									<div class="form-label-group py-0 px-5 mx-5">
											<label class="txt-regular txt-lg">Peidetud ruumid <b data-tooltip="Nähtavad ainult asutuse kasutajatele"><img id="tool" class="mr-5" src="<?php echo base_url(); ?>assets/img/icon-info.svg" width="3%"></b></label>
											<?php foreach ($editBuildings as $key => $value) { 
												if ($value['roomActive'] == '0') { 
													echo('<div class="row d-flex mb-3 p-0 justify-content-between">
													<input class="d-none" type="hidden" name="roomID[]" value="'.$value['id'].'"> 
													<input class="form-control col-6" id="inactiveRoom[]" type="text" name="room[]" value="' . $value['roomName'] .'">
													<input name="color[]" type="color" value="'. $value["roomColor"] .'">
													<input type="button" id="activeOrPassive' . $value['id']. '" data-id="'.$value['id'].'" class="btn btn-inactive btn-width-92 text-white text-center py-1 px-2 txt-strong" value="Peidus">
													<input data-id="'.$value['id'].'" class="btn btn-delete btn-width-92 text-white text-center py-1 px-2 txt-strong"  type="button" value="Kustuta">
													</div>');
												}}; ?>
									</div>

									<div class="flex mx-5 px-5 mt-5">
											<a id="lisaSaal" class="btn btn-custom text-white text-center py-2 px-4 pluss"><p class="m-0 px-0 txt-lg txt-strong text-center align-items-center">Lisa ruum</p></a>
									</div>

									<div class="d-flex justify-content-end my-5 px-5 mx-5">
										<a class="txt-xl link-deco align-self-center py-0 pr-5 mr-2" href="<?php echo base_url(); ?>building/view/<?php  print_r($this->session->userdata['building']);?>">Katkesta</a>
											<button type="submit" class="btn btn-custom col-md-5 text-white txt-xl">Salvesta muudatused</button>
									</div>
							</form>
							
							</div>  
							<div id="broneering" class="tab-pane center">   
							<?php echo form_open('building/updateBookingSettings', array('id' => 'changebookingSettings')); ?>
								<h4 class="pt-2 txt-xl px-5 mx-5 mt-4">Administraatori broneeringuvormi vaikeseaded</h4>
							
								<p class="pt-3 txt-lg px-5 mx-5">Kohustuslikud väljad administraatorile: </p>
								<div class="col-sm-12 w-auto mx-5 px-5 ">
										
										<table class="table table-sm  table-hover" style="border-top: hidden">
									<tbody>
									<tr>
															<th ></td>
															<th class="p-1">
														 <span data-tooltip="Kohustuslik"><img  src="<?php echo base_url(); ?>assets/img/mark.png" width="70%"></span>
															</th>
														
														</tr>
									<tr class="m-5" >
									<td class="col-10">
									
									Klubi nimi  &nbsp;&nbsp;	
							
									</td>
										<td class="col-1"><label><input type="checkbox" <?php if($bookingformdata['clubname_admin']){echo 'checked';}?>  name="clubname_admin" value="<?php echo $bookingformdata['clubname_admin'] ?>"><span></span></label></td>
									</tr>
									<tr>
									<td class="col-10">
									
									Kontaktisik  &nbsp;&nbsp;	
							
							
									</td>
										<td class="col-1"><label><input type="checkbox" <?php if($bookingformdata['contactname_admin']){echo 'checked';}?> name="contact_admin" value="<?php echo $bookingformdata['contactname_admin'] ?>"><span></span></label></td>
									</tr>

									<tr>
									<td class="col-10">
									Telefon  &nbsp;&nbsp;	
									</td>
										<td class="col-1"><label><input type="checkbox" <?php if($bookingformdata['phone_admin']){echo 'checked';}?> name="phone_admin" value="<?php echo $bookingformdata['phone_admin'] ?>"><span></span></label></td>
									</tr>
									<tr>
									<td class="col-10">
									E-mail &nbsp;&nbsp;
									</td>
										<td class="col-1">	<label><input type="checkbox" <?php if($bookingformdata['email_admin']){echo 'checked';}?> name="email_admin" value="<?php echo $bookingformdata['email_admin'] ?>"><span></span></label></td>
									</tr>
									<tr>
									<td class="col-10">
									Sündmus / Treeningu tüüp  &nbsp;&nbsp;	
									</td>
										<td class="col-1"><label><input type="checkbox" <?php if($bookingformdata['type_admin']){echo 'checked';}?> name="type_admin" value="<?php echo $bookingformdata['type_admin'] ?>"><span></span></label></td>
									</tr>
									</tbody>
								</table>
								</div>
							
							
								
							
								
								<div class="row d-flex p-0 m-4 px-md-5 mx-5">
									Broneeringu kinnitus vaikimisi sees  &nbsp;&nbsp;	<label><input type="checkbox" <?php if($bookingformdata['approved_admin']){echo 'checked';} ?> name="approveNow" id="approveNow" value="<?php echo $bookingformdata['approved_admin'] ?>"><span></span></label>
								</div>
								
								
								
							
								
								<div class="row d-flex p-0 mt-4 px-md-5 mx-5">
								
									<p class="txt-lg">	Vaikevärvid: </p>
									&nbsp;&nbsp; <input type="color" id="favcolor" name="favcolor1" value="<?php echo $bookingformdata['color1'];?>">
									&nbsp;&nbsp; <input type="color" id="favcolor" name="favcolor2" value="<?php echo $bookingformdata['color2'];?>">
									&nbsp;&nbsp; <input type="color" id="favcolor" name="favcolor3" value="<?php echo $bookingformdata['color3'];?>">
									&nbsp;&nbsp; <input type="color" id="favcolor" name="favcolor4" value="<?php echo $bookingformdata['color4'];?>">
									&nbsp;&nbsp; <input type="color" id="favcolor" name="favcolor5" value="<?php echo $bookingformdata['color5'];?>">
									&nbsp;&nbsp; <input type="color" id="favcolor" name="favcolor6" value="<?php echo $bookingformdata['color6'];?>">
									&nbsp;&nbsp; <input type="color" id="favcolor" name="favcolor7" value="<?php echo $bookingformdata['color7'];?>">
									&nbsp;&nbsp; <input type="color" id="favcolor" name="favcolor8" value="<?php echo $bookingformdata['color8'];?>">
								</div>
								<div class="row d-flex p-0 mt-4 px-md-5 mx-5">
								</div>
								<div id="üldsätted" style="background-color:#F8F8F8" class="pt-2 txt-xl py-4">

									<h4 class="pt-2 txt-xl px-5 mx-5 mt-4">Tavakasutaja päringuvormi üldsätted <b data-tooltip="Tavakasutajate broneering veel ei tööta ja see osa on arendamisel"><img id="tool" class="mr-5" src="<?php echo base_url(); ?>assets/img/icon-info.svg" width="3%"></b></h4>	
									<div class="row d-flex p-0 m-4 px-md-5 mx-5">	
										<p class="txt-lg ">	Luba tavakasutajatele päringute esitamine  &nbsp;&nbsp;	<label><input type="checkbox" id="allowUserBooking" <?php if($bookingformdata['allow_booking']){echo 'checked';} ?> name="allowBooking" value="<?php echo $bookingformdata['allow_booking'] ?>"><span></span></label></p>
									</div>
									<div id="showOrHide">
										<p class="pt-1 txt-lg px-5 mx-5">Kohustuslikud väljad tavakasutajatele: </p>
										
										<div class="col-sm-12 w-auto mx-5 px-5 ">
										
									<table class="table table-sm  table-hover" style="border-top: hidden">
								<tbody>
								<tr>
														<th class="pb-5"></td>
														<th class="p-1">
													 <span data-tooltip="Kohustuslik"><img  src="<?php echo base_url(); ?>assets/img/mark.png" width="70%"></span>
														</th>
													
													</tr>
								<tr>
								<td class="col-10">
									Klubi nimi  &nbsp;&nbsp;	
								</td>
									<td class="col-1"><label><input type="checkbox"  <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
								</tr>
								
								<tr>
								<td class="col-10"> 	
									Kontaktisik  &nbsp;&nbsp;	
							</td>
									<td class="col-1"><label><input type="checkbox"  <?php if($bookingformdata['contactname_user']){echo 'checked';} ?> name="name_user" value="<?php echo $bookingformdata['contactname_user'] ?>"><span></span></label>
								</td>
								</tr>
							<tr>
							<td class="col-10"> 	
									Telefon  &nbsp;&nbsp;	
								</td>
								<td class="col-1"><label><input type="checkbox"  <?php if($bookingformdata['phone_user']){echo 'checked';} ?> name="phone_user" value="<?php echo $bookingformdata['phone_user'] ?>"><span></span></label></td>
							</tr>
							<tr>
								<td class="col-10">
									E-mail &nbsp;&nbsp;	
								</td>
								<td class="col-1"><label><input type="checkbox"  <?php if($bookingformdata['email_user']){echo 'checked';} ?> name="email_user" value="<?php echo $bookingformdata['email_user'] ?>"><span></span></label></td>
								</tr>
								<tr>
								<td class="col-10">
								Ruumi kasutamise eesmärk   &nbsp;&nbsp;	
								</td>
								<td class="col-1"><label><input type="checkbox"  <?php if($bookingformdata['type_user']){echo 'checked';} ?> name="type_user" value="<?php echo $bookingformdata['type_user'] ?>"><span></span></label></td>
								</tr>
								<tr>
								<td class="col-10">
							

							
										
								</td>
								<td class="col-1"><label><input type="checkbox"  <?php if($bookingformdata['type_user']){echo 'checked';} ?> name="type_user" value="<?php echo $bookingformdata['type_user'] ?>"><span></span></label></td>
								</tr>
							</tbody>
								</table>
							
								<p class="txt-lg mb-2">Kasutustingimused: </p>
								<div class="row d-flex p-0">	
										<p class=" mb-2">	Soovin, et klient peab nõustuma kasutustingimustega  &nbsp;&nbsp;	<label><input type="checkbox" id="allowUserBooking" <?php if($bookingformdata['allow_booking']){echo 'checked';} ?> name="allowBooking" value="<?php echo $bookingformdata['allow_booking'] ?>"><span></span></label></p>
									</div>
									<p class="mb-1">Sisesta siia oma asutuse kasutustingimused: </p>
									<div class="input-group  mb-4">
										<textarea class="form-control"></textarea>
									</div>
								</div>


							 <div class="py-2 bg-white" id="uhekordse satted">

									
									

									<h4 class="pt-2 txt-xl px-5 mx-5 mt-4">1. Ühekordse treeningu vormil tavakasutajalt küsitakse:</h4>
										<div class="col-sm-12 w-auto mx-5 px-5 ">
											<table class="table table-sm  table-hover" style="border-top: hidden">
												<tbody>
													<tr class="mb-2">
													<td class="p-0"></td>
											<td class="p-0">
											<h4> <span data-tooltip="Nähtav"><img id="tool" src="<?php echo base_url(); ?>assets/img/eye2.png" width="80%"></span></h4>	
											</td>
											
											<td class="p-1">
											<b data-tooltip="Kohustuslik"><img id="tool" src="<?php echo base_url(); ?>assets/img/mark.png" width="70%"></b>
											</td>
													
													</tr>
										
											
											<tr>
											<td class="col-10">Inimeste arvu</td>	
												<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td> 
												<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												
											</tr>
											
											<tr>
											<td class="col-10">Vanusegruppi</td>
												<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td> 
												<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												
											</tr>
											<tr class="col-5"> 
											<td class="col-10">Treeningu olekut <b data-tooltip="Klient peab märkima, kas sündmus on avalik või privaatne"><img id="tool" class="mr-5" src="<?php echo base_url(); ?>assets/img/icon-info.svg" width="3%"></b></td>
												<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td> 
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
											</tr>
											<tr class="col-5"> 
											<td class="col-10">Treeningu ettevalmistus aega</td>
												<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td> 
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
											</tr>
											<tr class="col-5"> 
											<td class="col-10">Treeningujärgne koristus aega</td>
												<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td> 
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
											</tr>
											
											<tr>
												<td class="col-10">Lepingu soovimist</td>	
												<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td> 
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												
											</tr>
												<tr>
													<td> &nbsp;&nbsp;&nbsp;&nbsp; - Ettevõtte- või eraisiku nime</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td> 
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												<tr>
													<td> &nbsp;&nbsp;&nbsp;&nbsp; - Registrikoodi/isikukoodi</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												<tr>
													<td> &nbsp;&nbsp;&nbsp;&nbsp; - Aadressi</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												<tr>
													<td> &nbsp;&nbsp;&nbsp;&nbsp; - Kontaktisikut</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td> 
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												<tr>
													<td> &nbsp;&nbsp;&nbsp;&nbsp; - E-maili</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												<tr>
													<td> &nbsp;&nbsp;&nbsp;&nbsp; - Telefoni</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
											
											
											
												<tr>
													<td>Maksmisviisi</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												<tr>
													<td> &nbsp;&nbsp;&nbsp;&nbsp; - Sularahas kohapeal tasudes</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td> 
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												<tr>
													<td> &nbsp;&nbsp;&nbsp;&nbsp; - Pangakaart kohapeal tasudes</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												<tr>
													<td> &nbsp;&nbsp;&nbsp;&nbsp; - Arvega</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												<tr>
													<td> &nbsp;&nbsp;&nbsp;&nbsp; - Ettemaks</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td> 
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												<tr>
													<td> &nbsp;&nbsp;&nbsp;&nbsp; - Muu</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												
												<tr>
													<td>Arve soovimist</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
											<tr class="col-5"> 
													<td> &nbsp;&nbsp;&nbsp;&nbsp; - Ettevõtte- või eraisiku nime</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td> 
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												<tr>
													<td> &nbsp;&nbsp;&nbsp;&nbsp; - Registrikoodi/isikukoodi</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												<tr>
													<td> &nbsp;&nbsp;&nbsp;&nbsp; - Aadressi</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												<tr>
													<td> &nbsp;&nbsp;&nbsp;&nbsp; - Kontaktisikut</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td> 
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												<tr>
													<td> &nbsp;&nbsp;&nbsp;&nbsp; - E-maili</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												<tr>
													<td> &nbsp;&nbsp;&nbsp;&nbsp; - Telefoni</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
											
											
										
										
										
												</tbody>
											</table>
										</div>

									
										<p class="txt-lg pt-3 px-5 mx-5">Üldinfo: </p>
										
										<p class="pt-3 px-5 mx-5">Sisesta siia üldinfo tekst: </p>
										
										<div class="form-label-group mt-2 pb-2 px-5 mx-5">
											<div class="input-group">
												<textarea class="form-control" placeholder="nt saali mahutavus, tribüüni kohtade arv, olemasolev varustus"></textarea>
											</div>
										</div>

										<p class="pt-3 px-5 mx-5">Sisesta siia kinnitusmeili lisatekst: </p> 
										
										<div class="form-label-group mt-2 pb-2 px-5 mx-5">
											<div class="input-group">
												<textarea class="form-control" placeholder="nt info taotluste esitamiste, kuupäevade jne kohta"></textarea>
											</div>
										</div>
										

									 

									 <div class="py-2" id="hooajalise satted" style="background-color:#F8F8F8">

									
									

									 <h4 class="pt-2 txt-xl px-5 mx-5 mt-4">2. Hooajalise treeningu vormil tavakasutajalt tavakasutajalt küsitakse:</h4>
										<div class="col-sm-12 w-auto mx-5 px-5 ">
										<table class="table table-sm  table-hover" style="border-top: hidden">
											<tbody>
										<tr>
											<td class="p-0"></td>
											<td class="p-0">
											<h4> <span data-tooltip="Nähtav"><img id="tool" src="<?php echo base_url(); ?>assets/img/eye2.png" width="80%"></span></h4>	
											</td>
											
											<td class="p-1">
											<b data-tooltip="Kohustuslik"><img id="tool" src="<?php echo base_url(); ?>assets/img/mark.png" width="70%"></b>
											</td>
										</tr>
											<tr class="col-5"> 
											<td class="col-10">Inimeste arv</td>	
												<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td> 
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
											</tr>
											<tr class="col-5"> 
												<td>Vanusegrupp</td>
												<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td> 
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												
											</tr>
											<tr class="col-5"> 
												<td>Treeningu olek <b data-tooltip="Klient peab märkima, kas sündmus on avalik või privaatne"><img id="tool" class="mr-5" src="<?php echo base_url(); ?>assets/img/icon-info.svg" width="3%"></b></td>
												<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td> 
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
											</tr>
											<tr class="col-5"> 
												<td>Treeningu ettevalmistus aeg</td>
												<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td> 
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
											</tr>
											<tr class="col-5"> 
												<td>Treeningujärgne koristus aeg</td>
												<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td> 
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
											</tr>
											<tr class="col-5"> 
												<td>Lepingu andmed</td>	
												<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td> 
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												
											</tr>
											<tr class="col-5"> 
													<td> &nbsp;&nbsp;&nbsp;&nbsp; - Ettevõtte- või eraisiku nimi</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td> 
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												<tr>
													<td> &nbsp;&nbsp;&nbsp;&nbsp; - Registrikood/isikukood</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												<tr>
													<td> &nbsp;&nbsp;&nbsp;&nbsp; - Aadress</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												<tr>
													<td> &nbsp;&nbsp;&nbsp;&nbsp; - Kontaktisik</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td> 
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												<tr>
													<td> &nbsp;&nbsp;&nbsp;&nbsp; - Email</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												<tr>
													<td> &nbsp;&nbsp;&nbsp;&nbsp; - Telefon</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												
											
												<tr>
													<td>Maksmisviis</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												<tr>
													<td> &nbsp;&nbsp;&nbsp;&nbsp; - Sularahas kohapeal tasudes</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td> 
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												<tr>
													<td> &nbsp;&nbsp;&nbsp;&nbsp; - Pangakaart kohapeal tasudes</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												<tr>
													<td> &nbsp;&nbsp;&nbsp;&nbsp; - Arvega</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												<tr>
													<td> &nbsp;&nbsp;&nbsp;&nbsp; - Ettemaks</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td> 
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												<tr>
													<td> &nbsp;&nbsp;&nbsp;&nbsp; - Muu</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												<tr>
													<td>Arve saaja andmed</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												<tr>
													<td> &nbsp;&nbsp;&nbsp;&nbsp; - Ettevõtte- või eraisiku nimi</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td> 
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												<tr>
													<td> &nbsp;&nbsp;&nbsp;&nbsp; - Registrikood/isikukood</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												<tr>
													<td> &nbsp;&nbsp;&nbsp;&nbsp; - Aadress</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												<tr>
													<td> &nbsp;&nbsp;&nbsp;&nbsp; - Kontaktisik</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td> 
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												<tr>
													<td> &nbsp;&nbsp;&nbsp;&nbsp; - Email</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												<tr>
													<td> &nbsp;&nbsp;&nbsp;&nbsp; - Telefon</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
										
										</tbody>
										</table>
										</div>
										
										<p class="txt-lg pt-3 px-5 mx-5">Üldinfo: </p>
										
										<p class="pt-3 px-5 mx-5">Sisesta siia üldinfo tekst: </p>
										
										<div class="form-label-group mt-2 pb-2 px-5 mx-5">
											<div class="input-group">
												<textarea class="form-control" placeholder="nt saali mahutavus, tribüüni kohtade arv, olemasolev varustus"></textarea>
											</div>
										</div>

										<p class="pt-3 px-5 mx-5">Sisesta siia kinnitusmeili lisatekst: </p> 
										
										<div class="form-label-group mt-2 pb-2 px-5 mx-5">
											<div class="input-group">
												<textarea class="form-control" placeholder="nt info taotluste esitamiste, kuupäevade jne kohta"></textarea>
											</div>
										</div>
										
										
										

									 </div>
									 <div class="py-2 bg-white" id="sundmuse satted">

									
									

									 <h4 class="pt-2 txt-xl px-5 mx-5 mt-4">3. Sündmuse vormil tavakasutajalt küsitakse:</h4>
										<div class="col-sm-12 w-auto mx-5 px-5 ">
											<table class="table table-sm  table-hover" style="border-top: hidden">
												<tbody>
											<tr>
												<td class="p-0"></td>
												<td class="p-0">
												<h4> <span data-tooltip="Nähtav"><img id="tool" src="<?php echo base_url(); ?>assets/img/eye2.png" width="80%"></span></h4>	
												</td>
												
												<td class="p-1">
												<b data-tooltip="Kohustuslik"><img id="tool" src="<?php echo base_url(); ?>assets/img/mark.png" width="70%"></b>
												</td>
											</tr>
											<tr class="col-5"> 
											<td class="col-10">Inimeste arv</td>	
												<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td> 
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
											</tr>
											<tr class="col-5"> 
												<td>Vanusegrupp</td>
												<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td> 
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												
											</tr>
											<tr class="col-5"> 
												<td>Sündmuse olek <b data-tooltip="Klient peab märkima, kas sündmus on avalik või privaatne"><img id="tool" class="mr-5" src="<?php echo base_url(); ?>assets/img/icon-info.svg" width="3%"></b></td>
												<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td> 
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
											</tr>
											<tr class="col-5"> 
												<td>Sündmuse ettevalmistus aeg</td>
												<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td> 
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
											</tr>
											<tr class="col-5"> 
												<td>Sündmusejärgne koristus aeg</td>
												<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td> 
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
											</tr>
											<tr class="col-5"> 
												<td>Lepingu andmed</td>	
												<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td> 
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												
											</tr>
											<tr class="col-5"> 
													<td> &nbsp;&nbsp;&nbsp;&nbsp; - Ettevõtte- või eraisiku nimi</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td> 
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												<tr>
													<td> &nbsp;&nbsp;&nbsp;&nbsp; - Registrikood/isikukood</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												<tr>
													<td> &nbsp;&nbsp;&nbsp;&nbsp; - Aadress</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												<tr>
													<td> &nbsp;&nbsp;&nbsp;&nbsp; - Kontaktisik</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td> 
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												<tr>
													<td> &nbsp;&nbsp;&nbsp;&nbsp; - Email</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												<tr>
													<td> &nbsp;&nbsp;&nbsp;&nbsp; - Telefon</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												
											
												<tr>
													<td>Maksmisviis</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												<tr>
													<td> &nbsp;&nbsp;&nbsp;&nbsp; - Sularahas kohapeal tasudes</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td> 
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												<tr>
													<td> &nbsp;&nbsp;&nbsp;&nbsp; - Pangakaart kohapeal tasudes</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												<tr>
													<td> &nbsp;&nbsp;&nbsp;&nbsp; - Arvega</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												<tr>
													<td> &nbsp;&nbsp;&nbsp;&nbsp; - Ettemaks</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td> 
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												<tr>
													<td> &nbsp;&nbsp;&nbsp;&nbsp; - Muu</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												<tr>
													<td>Arve saaja andmed</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												<tr>
													<td> &nbsp;&nbsp;&nbsp;&nbsp; - Ettevõtte- või eraisiku nimi</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td> 
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												<tr>
													<td> &nbsp;&nbsp;&nbsp;&nbsp; - Registrikood/isikukood</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												<tr>
													<td> &nbsp;&nbsp;&nbsp;&nbsp; - Aadress</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												<tr>
													<td> &nbsp;&nbsp;&nbsp;&nbsp; - Kontaktisik</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td> 
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												<tr>
													<td> &nbsp;&nbsp;&nbsp;&nbsp; - Email</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
												<tr>
													<td> &nbsp;&nbsp;&nbsp;&nbsp; - Telefon</td>
													<td class="col-md-1"><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
													<td><label><input type="checkbox" class="form-check-input" <?php if($bookingformdata['clubname_user']){echo 'checked';} ?> name="clubname_user" value="<?php echo $bookingformdata['clubname_user'] ?>"><span></span></label></td>
												</tr>
											</tbody>
											</table>
											</div>
										
											
											<p class="txt-lg pt-3 px-5 mx-5">Üldinfo: </p>
										
										<p class="pt-3 px-5 mx-5">Sisesta siia üldinfo tekst: </p>
										
										<div class="form-label-group mt-2 pb-2 px-5 mx-5">
											<div class="input-group">
												<textarea class="form-control" placeholder="nt saali mahutavus, tribüüni kohtade arv, olemasolev varustus"></textarea>
											</div>
										</div>

										<p class="pt-3 px-5 mx-5">Sisesta siia kinnitusmeili lisatekst: </p> 
										
										<div class="form-label-group mt-2 pb-2 px-5 mx-5">
											<div class="input-group">
												<textarea class="form-control" placeholder="nt info taotluste esitamiste, kuupäevade jne kohta"></textarea>
											</div>
										</div>
										
										</div>
									</div>	



									</div>	

								
							</div>
						
							<div class="row d-flex p-0 mt-4 px-md-5 mx-5">	
							</div>
							
							<div class="d-flex justify-content-end my-5 px-5 mx-5">
								<a class="txt-xl link-deco align-self-center py-0 pr-5 mr-2" href="<?php echo base_url(); ?>building/view/<?php  print_r($this->session->userdata['building']);?>">Katkesta</a>
								<button type="submit" class="btn btn-custom col-md-5 text-white txt-xl">Salvesta muudatused</button>
							</div>
						</form>
					</div>
					</div>
					 </div>

        </div>
    </div>
</div>
                    <?php } else { redirect(''); }?>


                             
<script>

$( document ).ready(function() {

	if(!$('#allowUserBooking').is(":checked")){
			$( "#showOrHide" ).hide();
		}

	$(':checkbox').click(function() {
   		value = +$(this).is( ':checked' );
		   $(this).val(value);
		
		if($('#allowUserBooking').is(":checked")){
			console.log(value);
			$( "#showOrHide" ).show();
		}else{
			$( "#showOrHide" ).hide();
		}
	});


	var counter=1;
   $('#lisaSaal').on('click', function() {
    $('#saalid').append('<div class="d-flex mb-3 p-0 justify-content-between"><input class="form-control col-6" id="activeRoom[]" type="text" name="additionalRoom[]" value=""><input name="colorForNewRoom[]" type="color" value="#cbe9fe"><input type="button" id="activeOrPassive<?php echo($value["id"]); ?>" class="addedRoom btn btn-custom btn-width-92 text-white text-center py-1 px-2 txt-strong" value="Nähtav">	<input class="d-none" type="hidden" name="newRoomStatus[]" value="1"> 	<input data-id="<?php echo $value['id']; ?>" id="additionalRoom'+counter+'" class="abc btn btn-delete btn-width-92 text-white text-center py-1 px-2 txt-strong"  type="button" value="Kustuta"></div>');
	counter++;
  });

  $(document).on('click', '.abc', function() { 
	
	  $(this).parent().remove(); 
	  });


  $(".btn-delete").on("click", function() {
	console.log($(this).data("id"));
	var elementToDelete=$(this);
    $.ajax({
	  url: "<?php echo base_url(); ?>building/deleteRoom",
      method: "POST", // use "GET" if server does not handle DELETE
      data: { "roomID": $(this).data("id") },
      dataType: "html"
    }).done(function( msg ) {

			if(msg=='""'){  
				elementToDelete.parent().remove(); 
			}
			else{
			$( "#textMessageToUser" ).append('<p class="alert alert-danger text-center">'+msg+'</p>');
		window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove(); 
                });
			}, 4000);}
	
    }).fail(function( jqXHR, textStatus ) {
      alert( "Request failed: " + textStatus );
    }); 
  });

 
  
  $(document).on('click', '.addedRoom', function() { 


		var newRoomStatus=1;
	if($(this).val()=="Nähtav"){
		$(this).val("Peidus");
		$(this).next().val('0');
		$(this).removeClass("btn-custom");
		$(this).addClass("btn-inactive");
		newRoomStatus=0;
		
	} 
	else{
		$(this).val("Nähtav");
		$(this).next().val('1');
		$(this).removeClass("btn-inactive");
		$(this).addClass("btn-custom");
		newRoomStatus=1;
	}
	});

  $('input[id^="activeOrPassive"]').on("click", function() {
	// console.log($(this).data("id"));
	// console.log($(this).val());
	var roomStatus=1;
	if($(this).val()=="Nähtav"){
		$(this).val("Peidus");
		$(this).removeClass("btn-custom");
		$(this).addClass("btn-inactive");
		roomStatus=0;
		
	} 
	else{
		$(this).val("Nähtav");
		$(this).removeClass("btn-inactive");
		$(this).addClass("btn-custom");
		roomStatus=1;
	}
	
	var elementToDelete=$(this);
    $.ajax({
	  url: "<?php echo base_url(); ?>building/roomStatus",
      method: "POST", // use "GET" if server does not handle DELETE
      data: { 
		"roomID": $(this).data("id"),
	    "roomStatus": roomStatus
		 },
      dataType: "html"
    }).done(function( msg ) {
			if(msg=='"Sa ei saa muuta teiste ruumide staatust. Andmeid ei salvestatud!"'){
				alert( msg );
				location.reload();
			}
    }).fail(function( jqXHR, textStatus ) {
      alert( "Request failed: " + textStatus );
    }); 
  });



});



</script>
