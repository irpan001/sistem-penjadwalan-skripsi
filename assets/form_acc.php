
		  <div class="col-md-10">

		  		<!-- form -->
	  			<div class="row">
	  				<div class="col-md-6">
	  					<div class="content-box-large">
			  				<div class="panel-heading">
					            <div class="panel-title">Jadwal Saat Ini</div>
					          
					            <div class="panel-options">
					              <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
					              <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
					            </div>
					        </div>
			  				<div class="panel-body">

						
			  					<!--  -->

			  					<form class="form-horizontal" role="form">
								<!--  -->
								<div class="form-group">
							
								    <div class="col-sm-10" align="center">

								    	<?php

								    	  $kjad = $_GET['ss'];
							  if ($kjad == 'RP') {
							  	  $sp = "SELECT DISTINCT kode_jadwal FROM jadwal_up_fix";
							  } elseif ($kjad == 'RM') {
							  	  $sp = "SELECT DISTINCT kode_jadwal FROM jadwal_up_fix_rm";
							  } elseif ($kjad == 'W') {
							  	  $sp = "SELECT DISTINCT kode_jadwal FROM jadwal_up_fix_w";
							  }
                        					// echo $sp;
              
                        			$result = $db_con->query($sp) or die (mysql_error());
                        			
                        			while($r=$result->fetch(PDO::FETCH_ASSOC)){
                        		
                        					$kode_jadwal_new = $r['kode_jadwal'];
                        		
										}

										   	?>

								    	<h3><?php
								    	error_reporting(0);
								    	 	if ($kode_jadwal_new == '') {
								    	 		echo "Data Belum Ada dari Akademik " ;
								    	 	} else {
								    	 echo $kode_jadwal_new;}  
								    	 ?> </h3>
								    </div>
								  </div>
								
								 <!--  -->
					</form>
								  <!--  -->

			  				</div>
			  			</div>
	  				</div>
	  			
	  			</div>
	  		<!-- end form -->

	  					<!-- table -->
		  	<div class="row">
		  		<div class="col-md-12 panel-primary">
		  			<div class="content-box-header panel-heading">
	  					<div class="panel-title ">Data Jadwal <?php echo $_GET['ss']; ?></div>
						
				
		  			</div>
		  			<div class="content-box-large box-with-header">
			  		<div class="panel-body">
  					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
						<thead>
							<tr>
								<th>No</th>
								<th>Kode Jadwal</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							  <?php
							  $kjad = $_GET['ss'];
							  if ($kjad == 'RP') {
							  	  $sp = "SELECT DISTINCT kode_jadwal FROM jadwal_up";
							  } elseif ($kjad == 'RM') {
							  	  $sp = "SELECT DISTINCT kode_jadwal FROM jadwal_up_rm";
							  } elseif ($kjad == 'W') {
							  	  $sp = "SELECT DISTINCT kode_jadwal FROM jadwal_up_w";
							  }
							
                        //echo $sp;
                        $no=1;
                        $exec = $db_con->query($sp) or die (mysql_error());
                        while($r=$exec->fetch(PDO::FETCH_ASSOC)){
								
											?>
										<tr class="odd gradeX">
										<td><?php echo $no ?></td>
										<td><a href="cek_excel.php?ss=<?php echo $_GET['ss'] ?>&&kode_jadwal=<?php echo $r['kode_jadwal'] ?>"><?php echo $r['kode_jadwal'] ?></a></td>
										<td><a href="control.php?kc=ACC1<?php echo $_GET['ss'] ?>&&kode_jadwal=<?php echo $r['kode_jadwal'] ?> " ><button class="btn btn-primary">ACC</button></a></td>
									
										</tr>

							<?php
							$no++;
						}
							?>
							
						</tbody>
					</table>
  				</div>
					</div>
		  		</div>
		  	</div>
		  	<!-- end table -->


	  		<!--  Page content -->
		  </div>
		</div>
    </div>

