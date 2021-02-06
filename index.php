<!DOCTYPE html>
<html lang="en">
<?php
$page = $_SERVER['PHP_SELF'];
$sec = "300";

//ini_set('display_errors', 'on');
//error_reporting(E_ALL); // Display all types of error

 include_once('./consql.php');
 include_once('./config.php');

?>


<head>
	<meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title><?php echo "$title"; ?></title>
	<meta name='description' content='<?php echo "$descript"; ?>'>
	<meta name="author" content="Erreur32">
	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
	<link rel="icon" type="image/png" href="/favicon.png"/>
	<meta name="keyword" content="tox,server,dayz,map,namalsk,namalsk island">
	<link id="theme-style" href="css/style_dark.css" rel="stylesheet">

	<style>
		.tab-content {
			margin-top: -1px;
			background: #3a4149;
			border: none;
			border-radius: 0 0 .25rem .25rem;
		}

		a,
		a:visited {
			color: #20A8D8;
			text-decoration: none;
		}

		a:hover {
			color: orange;
			text-decoration: none;
		}

		.description-header {
			color: #26A65B;
		}

		.label-danger {
			background-color: #EF4836;
		}

		.label-warning {
			background-color: #F89406;
			color: white;
		}

		.label-success {
			background-color: #26A65B;
		}

		.label-primary {
			background-color: #4183D7;
			color: green;
		}

		.label-info {
			background-color: #5bc0de;
		}

		.label {
			display: inline;
			padding: .2em .6em .3em;
			font-size: 75%;
			font-weight: 700;
			line-height: 1;
			color: #fff;
			text-align: center;
			white-space: nowrap;
			vertical-align: baseline;
			border-radius: .25em;
		}

		.selection {			color: black !important;		}

		.select2-results {			color: black !important;		}

		.select2-results__option--highlighted {			background-color: #3875d7 !important;		}

		.pull-left {			float: left !important;		}

		.pull-right {			float: right !important;		}

		.navbar-brand-logo {			margin-left: 2rem;		}
	</style>


<?php
		$time = microtime();
		$time = explode(' ', $time);
		$time = $time[1] + $time[0];
		$start = $time;

        if (empty($Info['HostName']))  {
        $Info['HostName'] = "<h1>OFF LINE</h1>" ;
        }
?> 
		<main class="main" style="margin-top: 10px">

			<!-- Breadcrumb-->
			<ol class=""></ol>

			<div class="container-fluid">
				<div id="ui-view">

					<div class="animated fadeIn">
						<div class="row">

							<div class="col-lg-12 col-xs-12">
								
								<div class="card">
									<div class="card-body" style="text-align:center;">
										<h3> <img height="24px" width="24px"
												src="https://steamcdn-a.akamaihd.net/steamcommunity/public/images/apps/221100/f8c16699ed5ce1cc8aa9b15ed3fdd66553fce2bf.ico">
											 
											<?php echo  $Info['HostName'] ; ?>
											<!--<i class="flag-icon h5 flag-icon-fr"></i>-->
										 </h3>
										      <h5><span style="color:grey;"><?php  echo $Info['Map']; ?>  </span></h5>
											<span class="label label-<?php echo $Timer > 1.0 ? 'danger' : 'success'; ?>"><?php echo $Timer; ?>s</span>

									</div>

<?php
	        if (empty($Info['Map']))  {
				echo "</main>";

				// change to our local zone !!
                setlocale(LC_ALL,'french');

				echo "<center><small class='text-muted'>Last refresh</small> <br>  <strong class='h4'>".date('m/d/y H:i:s')."</strong></center>";
                echo "<div style=\"padding-bottom: 10%;padding-left: 20%;padding-right: 20%\"> <center><img src=".$logoteam." class=\"arrondie2\"   width=\"100%\" max-height=\"20%\" height=\"auto\"></center></div></div>";
                exit;
                }
?>
									<div class="card-footer">
										<div class="row" style="text-align:center;">

											<div class="col-md-2 col-xs-12 border-right">
												<div class="description-block">
													<h5 class="description-header">
													 <?php if (empty($Info['Players'])) { echo "<span style='color:grey;'>"; } ?>
                                                     <?php echo $Info['Players']; ?> <span style='color:grey;'>/<?php echo $Info['MaxPlayers'] ; ?></span></span>
													</h5>
													   <span class="description-text">PLAYERS</span>
												</div>
											</div>

											<div class="col-md-2 col-xs-12  border-right">
												<div class="description-block">
													<h5 class="description-header"><?php  echo $ipserv.":".$Info['GamePort'];  ?> 
													</h5>
													<span class="description-text">IP Server</span>
												</div>
											</div>

											<div class="col-md-2 col-xs-12 border-right">
												<div class="description-block">
													<h5 class="description-header"><?php  echo $Info['Map']; ?></h5>
													<span class="description-text">MAP</span>
												</div>
											</div>

											<div class="col-md-2 col-xs-12 border-right">
												<div class="">
													<h5 class="description-header">
										<?php  //echo count($modnum)
											echo  $timeserver ;
											echo " <small style='color: grey;'>  <i class='fas  fa-sun'></i> <span style='color: white;'> x ".$timespeed."</span> - <i class='fas  fa-moon'></i><span style='color: white;'> x ".$timespeedn."  </span>";

?>

														</small></h5>
													<span class="description-text">GAME TIME</span>
												</div>
											</div>
<!--
											<div class="col-md-2 col-xs-12 border-right">
												<div class="description-block">
													<h5 class="description-header">Yes</h5> <span
														class="description-text">3 PP</span>
												</div>
											</div>
-->


											<div class="col-md-2 col-xs-12 border-right">
												<div class="description-block">
													<h5 class="description-header"> <?php echo  $Info['Version']; ?></h5>
													<span class="description-text">SERVER VERSION</span>
												</div>
											</div>
											
											<div class="col-md-2 col-xs-12">
												<div class="description-block">
											<h5 class="description-header"><?php   echo $hive; ?></h5>
													<span class="description-text">HIVE</span>
												</div>
											</div>
											
											
										</div>
									</div><!-- class="card-footer" -->

								</div> <!-- end card -->
							</div>
						</div>
						<!--end row  -->

						<div class="row">
							<div class="col-lg-12">
								<div class="card">
									<div class="card-body menutab">
										<ul class="nav nav-tabs" id="tabs" role="tablist">

											<li class="nav-item">
												<a class="nav-link active show" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">
												<!--<i class="fas fa-home">-->
												<i class="fas fa-chart-area"></i> Server Info</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="modlist-tab" data-toggle="tab" href="#modlist" role="tab" aria-controls="modlist" aria-selected="false">
												<i class="fas	fa-server"></i> MOD List</a>
											</li>											
											<li class="nav-item">
                                                <a class="nav-link" id="userdata-tab"  data-toggle="tab" href="#userdata" role="tab" aria-controls="userdata" aria-selected="false">
                                            <i class="fas fa-user-check"></i> User  Database</a>
                                            </li>
											<li class="nav-item"> <a class="nav-link" id="map-tab" data-toggle="tab"  href="#maptab" role="tab" aria-controls="maptab" aria-selected="false">
                                                 <i class="fas fa-map"></i>  MAP</a>
                                            </li>
										</ul>

										<div class="tab-content content_wrapper" id="tabs">

											<!-- cadre stat Gameserver -->
											<div class="tab-pane fade tab_content active show" id="overview" role="tabpanel" aria-labelledby="overview-tab">

												<div class="row" style="margin-left: 30px;">

													 <div class="col-lg-2 col-sm-5">
                                                            <div class="callout callout-dark" style="padding:0">
															 <img src="<?php echo $imagemap; ?>" class="arrondie2" height="50px"  width="150px">
															  </div>
                                                     </div>
	
													<div class="col-lg-2 col-sm-5">
														<div class="callout callout-light">
															<small class="text-muted">Last time refresh</small> <br>
													<strong class="h4">	<?php  setlocale(LC_ALL,'french'); echo  date("m/d/y H:i:s"); ?>	</strong>
															<div class="chart-wrapper">
																<canvas id="sparkline-chart-1" width="100"	height="30"></canvas>
															</div>
														</div>
													</div>
													<div class="col-lg-2 col-sm-5">
														<div class="callout callout-primary">
															<small class="text-muted">Last Player actif</small> <br>
															<strong class="h4"><span style="color: #20A8D8;"><?php echo  $Info['Players'] ; ?></span>
																<small> /<span style="color: grey;"><?php echo  $Info['MaxPlayers'] ; ?></span></small>
															</strong>
															<div class="chart-wrapper">
																<canvas id="sparkline-chart-1" width="100"	height="30"></canvas>
															</div>
														</div>
													</div>
													<div class="col-lg-2 col-sm-5">
														<div class="callout callout-warning">
															<small class="text-muted">MOD actif</small>
															<br>
															<strong class="h4"><span style="color: #FFC107;"><?php echo count($modnum); ?></span></strong>
															<div class="chart-wrapper">
																<canvas id="sparkline-chart-1" width="100"	height="30"></canvas>
															</div>
														</div>
													</div>
													<div class="col-lg-2 col-sm-5">
														<div class="callout callout-success">
															<small class="text-muted">Whitelist entries</small>
															<br> <strong class="h4" style="color: #4DBD74">0</strong>
															<div class="chart-wrapper">
																<canvas id="sparkline-chart-1" width="100"	height="30"></canvas>
															</div>
														</div>
													</div>
													<div class="col-lg-2 col-sm-5">
														<div class="callout callout-danger">
															<small class="text-muted">Bans</small>
															<br> <strong class="h4"  style="color: #F86C6B">0</strong>
															<div class="chart-wrapper">
                                                              <canvas id="sparkline-chart-1" width="100"  height="30"></canvas>
                                                            </div>
														</div>
													</div>

												</div>


												<div class="row" style="margin-top: 30px">

													<div class="col-lg-10 col-sm-16">
														<div class="card">

															<div class="card-header"><i class="fas  fa-server"></i>Stat Gameserver</div>

															<div class="card-body">
																<div class="row">

																	<div class="col-lg-14">
																		
																		<div class="row">
																			<div class="form-check	form-check-inline" style="width: 100% !important;">
																				<div class="col-sm-5">
																					<label class="col-form-label" for="date-input">
																						<strong>Server Name</strong>
																					</label>
																				</div>
																				<div class="col-sm-10" style="color:grey;">
																				  <?php echo  $Info['HostName'] ; ?> 
																				</div>
																			</div>
																		</div>	

																		<div class="row">
																			<div class="form-check	form-check-inline"
																				style="width: 100% !important;">
																				<div class="col-sm-5">
																					<label class="col-form-label" for="date-input">
																						<strong>Server IP</strong>
																						<br><i></i><small> Server port</small></i>
																					</label>
																				</div>
																				<div class="col-sm-7">
																		         	<a  href="#"><?php echo  $ipserv;   ?></a><br>
																			 	<a  href="#"><?php echo  $servport; ?></a>
																				</div>
																			</div>
																		</div>	
																		<div class="row">
																			<div class="form-check	form-check-inline"
																				style="width: 100%	!important;">
																				<div class="col-sm-5">
																					<label class="col-form-label" for="date-input">
																						<strong>Gameserver protection</strong>
																					</label>
																				</div>
																				<div class="col-sm-7">
																					<span class="badge badge-light">Anti-Cheat ON</span>
																					<span class="badge badge-light">BattlEye enabled</span>
																				</div>
																			</div>
																		</div>
																		<div class="row">
                                                                                                                                                        <div class="form-check form-check-inline"
                                                                                                                                                                style="width: 100%      !important;">
                                                                                                                                                                <div class="col-sm-5">
                                                                                                                                                                        <label class="col-form-label" for="date-input">
                                                                                                                                                                                <strong>Total User</strong>
                                                                                                                                                                        </label>
                                                                                                                                                                </div>
                                                                                                                                                                <div class="col-sm-7">
                                                                                                                                                                        <i class="fa fa-user"> <font color=orange></font></i>
                                                                                                                                                                </div>
                                                                                                                                                        </div>
                                                                                                                                                </div>

																		<div class="row">
																			<div class="form-check	form-check-inline"
																				style="width: 100% !important;">
																				<div class="col-sm-5">
																					<label class="col-form-label" for="date-input">
																						<strong>Best Distance Kill</strong>
																						<!--br>
																						<small>	From User</small-->
																					</label>
																				</div>
																			<div class="col-sm-7"><i class="fas fa-dot-circle" style="color:#20a8d8"></i>
																				  <font color=orange></font>
																				</div>
																			</div>
																		</div>


																		
																		<div class="row">
																			<div class="form-check	form-check-inline" style="width: 100% !important;">
																				<div class="col-sm-5">
																					<label class="col-form-label" for="date-input">
																						<strong>Mod information</strong>
																						<br><i><small> MOD Actif </small></i>
																					</label>
																				</div>
																				<div class="col-sm-7">
																			<!--a href="mod_server.php"--><span class="badge badge-light">	
																				<b><?php echo count($modnum); ?></b>	<span class="text-muted"> Mods	</span></span><!--/a-->
																				</div>
																			</div>
																		</div>
																		
																			<div class="row">
																			  <div class="form-check	form-check-inline"	style="width: 100% !important;">
																				<div class="col-sm-5">
																					<label class="col-form-label" for="date-input">
																						<strong>Direct connect</strong><br>
																						<em><i> (clic to join) </i> </em>
																					</label>
																				</div>
																				<div class="col-sm-7">
															<a style="text-decoration:none;" href='steam://connect/<?php echo $ipserv.":".$queryport."/";?>'>
																							<span class='label label-success'> GO PLAY </span>
																					 	</a>										
																				</div>
																		      </div>
																		    </div>
																	 

																	</div>


																</div>
															</div>

														</div>
													</div>

												
												<!-- graph home page  -->
											
													 <div class="col-lg-10 col-sm-16">
													    <div class="card">

														    <?php if( !empty( $Players ) ): ?>
															   <div class="card-header">List players online: <?php echo  $Info['Players'] ; ?></div>
																<div class="card-body">
                                                                                                                           													
																<?php foreach( $Players as $Player ): ?>
																<table>
        															<tr>
                                                        									<td style="width:200px"> <span class="btn btn-large btn-primary">"Survivor" </span> </td>
										    					        <td>&emsp; <span style='color:grey'>Playtime </span>>  <?php echo $Player[ 'TimeF' ]; ?> Minutes </td>
																</tr>
																</table>

														                <?php endforeach; ?>

			                                                                                                        </div>
																<?php else: ?>											    		
              
																  <div class="card-header">List players online: <?php echo  $Info['Players'] ; ?></div>
                                                                                                                                   <div class="card-body">
									                                                             <tr>
					                					                                        <td colspan="2"><center><span class="btn btn-large btn-primary">( No players in game )</span></center></td>			                          															       </tr>
																    </div>



														    <?php endif; ?>
														</div>
                                                                                                        </div>
													
													<!-- graph home page  -->
													 
													<div class="col-lg-12 col-sm-16">
														<div class="card">
															<div class="card-header">Player count last 12 hours</div>
																<div class="card-body">
																 <?php    include('./GraphPlayer.php'); ?>
															</div>
	                                                                                                        </div>
													</div>

												</div>

											</div>



								<!-- TAB MOD list -->

											<div class="tab-pane tab_content fade" id="modlist" role="tabpanel"	aria-labelledby="modlist-tab">

				 								<div class="row">
													<div class="col-lg-5 col-sm-12">

														<div class="card">
															<div class="card-header"><i class="fas fa-users"></i>
																MOD list on <span style="color:grey;"><?php echo  $Info['HostName'] ; ?></span>
															</div>

															<div class="card-body">

																<p class="before-list">
																	<center>
																		<span style="padding: 5px 0px 2px 20px;"><?php echo count($modnum); ?>   MODS	</span>
																		<span style="padding: 5px 0px 2px 20px;">IP:	<span style="color: orange;"><?php echo  $urlserv; ?>	</span></span>
																	</center>
																</p>

																<table class="table_ table-bordered_ table-striped_">
																	<thead>
																		<tr>
																			<th style="text-align:left;"><span class='label label-info'>MOD Name</span>
																			</th>
 																 		<!-- <th><span class='label label-info'>steamWorkshopId</span></th>-->
																		</tr>

																	</thead>

																	<tbody>
																		 <tr><td><br></td><td></td><br></tr>
							                                   			    <?php $modnum=json_decode($json); //converts to an array of objects
							                                          		    foreach( $modnum as $item ) { ?>
				                        				         		 <tr>
				                               				     			 <td><a href="http://steamcommunity.com/sharedfiles/filedetails/?id=<?php echo $item->steamWorkshopId?>" data-type="Link"><?php echo $item->name; ?></a></td>
        								                         		 </tr>
							                                    			<?php } ?>

																	</tbody>

																</table>
															</div>
														</div>
													</div>

												</div>
											</div>



								<!--  tab  Metrics Graph   -->
											 
											<div class="tab-pane tab_content fade" id="metrics" role="tabpanel"	aria-labelledby="metrics-tab">
												<div class="row">
													<div class="col-lg-6 col-sm-8">
														<div class="card">
															<div class="card-header">Player population   24	hours</div>
															<div class="card-body"><br>
															<?php //  include('graph.php'); ?>

															</div>
														</div>
													</div>
													
												    <div class="col-lg-6 col-sm-12">
                                                                                                                <div class="card" style="margin: 0 auto;  height: 500px;  width: 100%;">
                                                                                                                        <div class="card-header"> line-chart </div>
                                                                                                                        <div class="card-body"><center>
                                                                                                                        </center>

                                                                                                                        </div>
                                                                                                                </div>
                                                                                                        </div>

													<div class="col-lg-8 col-sm-8">
														<div class="card">
															<div class="card-header"> 12 h  </div>
															<div class="card-body" style="margin: 0 auto;  height: 500px;  width: 100%; padding-bottom: 0;">
															<center> <script src="morris/morris.js"></script>
															</center>
															</div>
														</div>
													</div>



												</div>
											</div>
											 


                                                                <!--  MAP tab  -->

                                                                                        <div class="tab-pane tab_content fade"  id="maptab" role="tabpanel" aria-labelledby="map-tab">
                                                                                                <div class="col-lg-12 col-sm-12">
                                                                                                        <div class="card">
                                                                                                                <div class="card-header" style="padding: 15px;"> <i class="fas fa-map"></i>  MAP <span style='color: grey;'><?php  echo $Info['Map']; ?></span> </div>
                               	                                                      <!--a href=""--> <div  style="width:100%;height:620px;">
												<iframe src="https://dayz.ginfo.gg/<?php echo $Info['Map']; ?>/#c=37;-4;3" frameborder="0" allowfullscreen style="width:100%;height:600px;" security="restricted"></iframe>
												<!--img src="imagemap.jpg" style="width:100%;max-width:1200px;height:auto;padding:5px;" class="arrondie2" -->
												       </div>
											<!--/a-->
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>


								<!--  tab  User List  -->
											<div class="tab-pane tab_content fade" id="userdata" role="tabpanel" aria-labelledby="userdata-tab">

												<div class="col-lg-12 col-sm-12">
													<div class="card">
														<div class="card-header"> <i class="fas fa-user-check"></i> User registered	</div>
														
														<div style="position:relative;padding-top:56.25%;">

													    	</div>

													</div>
												</div>
											</div>



								<!-- end tabs  -->

										</div>
									</div>
								</div>
							</div><!-- end row  -->
						</div>
					</div>

				</div>
			</div>
		</main>



	<footer class="app-footer">
	<div style="text-align:center;"> <span style="text-align:center;"> 🆃🅾🆇  © 2020  - <a href="https://git.echosystem.fr/Erreur32/DayZ-Stat-Server">Dayz-server-stats</a> by  <a href="https://echosystem.fr/erreur32">Erreur32</a> </span>
	 </div> 
	<div class="ml-auto">  <a href="server.json.php">JSON </a> |  
		<?php
			$time = microtime();
			$time = explode(' ', $time);
			$time = $time[1] + $time[0];
			$finish = $time;
			$total_time = round(($finish - $start), 3);
			echo 'Generated in <a style="font-size: 12px" href="#" target="_blank">'.$total_time.'</a> sec.';
		?>
	 </div>
	</footer>


        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/graph_loader.js"></script>
        <script src="js/switch.js"></script>
	<!-- menu deroulant -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://kit.fontawesome.com/9ba5e91dd6.js" crossorigin="anonymous"></script>

	<style>
		.tab-content {
			margin-top: -1px;
			background: #3a4149;
			border: none;
			border-radius: 0 0 .25rem .25rem;
		}

		a,
		a:visited {
			color: #20A8D8;
			text-decoration: none;
		}

		a:hover {
			color: orange;
			text-decoration: none;
		}

		.description-header {
			color: #26A65B;
		}

.arrondie2 {
  border:2px solid grey;
  -moz-border-radius:7px;
  -webkit-border-radius:7px;
  border-radius:7px;
}

.switch {
  position: relative;
  display: inline-block;
}
.switch-input {
  display: none;
}
.switch-label {
  display: block;
  width: 36px;
  height: 14px;
  text-indent: -100%;
  clip: rect(0 0 0 0);
  color: transparent;
  user-select: none;
}
.switch-label::before,
.switch-label::after {
  content: "";
  display: block;
  position: absolute;
  cursor: pointer;
}

.switch-label::before {
  width: 100%;
  height: 100%;
  background-color: #535658;
  border-radius: 9999em;
  -webkit-transition: background-color 0.25s ease;
  transition: background-color 0.25s ease;
}
.switch-label::after {
  top: 0;
  left: 0;
  width: 18px;
  height: 18px;
  border-radius: 50%;
  background-color: #fff;
  box-shadow: 0 0 2px rgba(0, 0, 0, 0.45);
  -webkit-transition: left 0.25s ease;
  transition: left 0.25s ease;
}
.switch-input:checked + .switch-label::before {
  background-color: #89c12d;
}
.switch-input:checked + .switch-label::after {
  left: 18px;
}

</style>
 

<!-- not implanted -->
<link rel="stylesheet" type="text/css" href="css/dark.css" />
<!-- Dark Theme -->
<script>
 $("#darkTrigger").click(function(){
    if ($("body").hasClass("dark")){
        $("body").removeClass("dark");
    }
    else{
        $("body").addClass("dark");
    }
 });
 </script>
