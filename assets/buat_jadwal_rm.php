
<?php include 'genetika.php'; 
	
?>
		  <div class="col-md-10">

		  			<!-- form -->
	  			<div class="row">
	  				<div class="col-md-6">
	  					<div class="content-box-large">
			  				<div class="panel-heading">
					            <div class="panel-title">Buat Jadwal</div>
					          
					            <div class="panel-options">
					              <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
					              <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
					            </div>
					        </div>
			  				<div class="panel-body">

								  <!--  -->
								
								  <div class="form-group" id="form_fitness">
								    <label for="inputEmail3" class="col-sm-2 control-label">Fitness</label>
								    <div class="col-sm-10">
											
											<?php 
											error_reporting(0);
											if ($_GET['fit']== '') {
												$fit = 0;
											} else {
												$fit = $_GET['fit']; 
											} 
											?>

								    <input type="text" name="id_dos" class="form-control" id="fitness" placeholder="Nilai Fitness" readonly="Readonly" value="<?php echo $fit ?>" >
								    </div>
								  </div>
								<!--  -->
										<div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">Jadwal Bentrok</label>
								    <div class="col-sm-10">
								    	<input type="text" name="id_dos" class="form-control" id="bentrok" placeholder="Jadwal Bentrok" readonly="Readonly" value="0" >
								    </div>
								  </div>
								    <div class="col-sm-offset-2 col-sm-10" >
								  			  <button class="btn btn-success" id="acak" onclick="redirect('control2RM.php')" style="margin-bottom: 20px;" > Acak Jadwal </button> 
								  </div>
								
								<!--  -->

			  					<!--  -->
			  					<form class="form-horizontal" role="form" method="POST" action="control.php?kc=jadwal1rm">
								<!--  -->
								<div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">Kode jadwal</label>
								    <div class="col-sm-10">

								    	<?php
								    		  $sp=  "SELECT max(kode_jadwal) as kode_jadwal FROM jadwal_kuliah_rm;";
                        					// echo $sp;
              
                        			$result = $db_con->query($sp);
                        			
                        			while($r=$result->fetch(PDO::FETCH_ASSOC)){

                        			if ($result->rowCount() == 1) {
                        						
                        			$kode_jadwal = $r['kode_jadwal'];

                        			$urutan = (int) substr($kode_jadwal, 10, 3);
                        			
                        			$urutan++;
                        			
                        			$waktu = "RM".date('Ydm') ;
									$kode_jadwal_new = $waktu . sprintf("%03s", $urutan);

										} else { 
											$kode_jadwal_new = "RM".date('Ydm')."001"; }
										}

										   	?>

								    	<input type="text" name="kode_jadwal" class="form-control" id="inputEmail3" placeholder="Kode Jadwal" readonly="Readonly" value="<?php echo $kode_jadwal_new;  ?>" >
								    </div>
								  </div>
								
								 <!--  -->

								    	<?php
								    		$bln = date('m');
								    		$thn = date('Y');
								    		if ($bln <= 6){
								    			$tahun = $thn-1;
								    			$output = "$tahun - $thn";
								    		}
								    		if ($bln >= 7){
								    			$tahun = $thn+1;
								    			$output = "$thn - $tahun";
								    		}
								    		
								    	?>
								 			<div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">Tahun Ajaran</label>
								    <div class="col-sm-10">
								    	<input type="text"  name="thn_ajaran" class="form-control" id="bentrok" placeholder="Jadwal Bentrok" readonly="Readonly" value="<?php echo $output; ?>" >
								    </div>
								  </div>
								 <!--  -->
					
								  <div class="form-group">
								    <div class="col-sm-offset-2 col-sm-10" >
								      
								      <input type="submit" class="btn btn-primary" value="Simpan">
								      </form>
									      <!-- <h3>/</h3> -->
							
								

					<!-- 			<button class="btn btn-primary" id="acak" onclick="redirect('')" style="margin-bottom: 20px;" > Simpan </button>  -->
								    
								    
								    </div>
								  </div>
								
						
								  <!--  -->

			  				</div>
			  			</div>
	  				</div>
	  			
	  			</div>
	  		<!-- end form -->

	  					<!-- table -->
		  	<div class="row">
		  		<div class="col-md-12 panel-warning">
		  			<div class="content-box-header panel-heading">
	  					<div class="panel-title ">Data Saya</div>
						
				
		  			</div>
		  			<div class="content-box-large box-with-header">
			  		<div class="panel-body">
  					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
						<thead>
							<tr>
								<th>No</th>
								<th>Kelas</th>
								<th>Matkul</th>
								<th>Jam</th>
								<th>SKS</th>
								<th>Hari</th>
								<th>Ruang</th>
							</tr>
						</thead>
						<tbody>
							  <?php
        				$sp=  "SELECT 
a.kode_kelas,
CONCAT(b.nama_kelas,b.group_kelas) as nama_kelas,
Concat_WS('-', concat('(', c.kode_jam), concat( (SELECT kode_jam FROM jam WHERE kode_jam = c.kode_jam) + (g.jml_sks - 1),')')) as sesi, 

Concat_WS('-', MID(c.range_jam,1,5),(SELECT MID(range_jam,7,5) FROM jam WHERE kode_jam = c.kode_jam + (g.jml_sks - 1))) as jam_kuliah, 
g.nama_matkul,
g.jml_sks as sks,
d.nama as hari,
e.nama_ruangan as ruang

-- nama kelas,matakuliah,jamkuliah,sks,hari,ruangan
FROM data_acak as a LEFT JOIN 
     plot_kelas as b ON a.kode_kelas = b.kode_kelas
     LEFT JOIN jam as c ON a.jam = c.kode_jam
     LEFT JOIN hari as d ON a.hari = d.kode_hari
     LEFT JOIN ruang_belajar as e ON a.ruangan = e.kode_ruangan
     LEFT JOIN dosen as f ON b.dosen = f.id_dosen
     LEFT JOIN matakuliah as g ON b.matakuliah = g.kode_matkul 

GROUP BY a.kode_kelas ASC";
                        //echo $sp;
                        $no=1;
                        $exec = $db_con->query($sp);
                        while($r=$exec->fetch(PDO::FETCH_ASSOC)){
								

                // $fitness = (1/(1+$penalty_jam+$penalty_hari+$penalty_ruang));

                        	// 

											?>
										<tr class="odd gradeX">
										<td><?php echo $no ?></td>
										<td><?php echo $r['nama_kelas'] ?></td>
										<td><?php echo $r['nama_matkul'] ?></td>
										<td><?php echo $r['jam_kuliah'] ?></td>
										<td><?php echo $r['sks'] ?></td>
										<td><?php echo $r['hari'] ?></td>
										<td><?php echo $r['ruang'] ?></td>
									
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

    <script type="text/javascript">
    	function redirect(url){
    		location.href = url;

    		
    	 
    	}

    </script>