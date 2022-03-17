<?php
include '../vendors/koneksi.php';
	  $cari = $_GET['kode_jadwal'];
	  $ss = $_GET['ss'];
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=".$cari.".xls");

?>
	<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
						<thead>
							<tr>
								<th>No</th>
								<th>NIM</th>
								<th>Nama Mahasiswa</th>
								<th>Judul Penelitian</th>
								<th>Dosen</th>
								<th>Dosen2</th>
								<th>Jam</th>
								<th>SKS</th>
								<th>Hari</th>
								<th>Ruang</th>
							</tr>
						</thead>
						<tbody>
							  <?php
							  // error_reporting(0);
						
							  if ($ss == 'RP') {
							  	$sp=  "SELECT 


Concat_WS('-', concat('(', c.kode_jam), concat( (SELECT kode_jam FROM jam WHERE kode_jam = c.kode_jam) + (g.jml_sks - 1),')')) as sesi, 

Concat_WS('-', MID(c.range_jam,1,5),(SELECT MID(range_jam,7,5) FROM jam WHERE kode_jam = c.kode_jam + (g.jml_sks - 1))) as jam_kuliah, 
b.dosen,
b.dosen2,
g.nim,
g.nama,
g.judul_penelitian,

g.jml_sks as sks,
d.nama_hari as hari,
e.nama_ruangan as ruang

-- nama kelas,penelitian,jamkuliah,sks,hari,ruangan
FROM jadwal_up as a,
     plot_up as b,
     jam as c,
     hari as d,
     ruang_belajar as e,
    
     penelitian as g 

WHERE a.kode_jadwal = '$cari' AND
	  a.kode_up = b.kode_up AND 
      a.jam = c.kode_jam AND
      a.hari = d.kode_hari AND
      a.ruangan = e.kode_ruangan AND
      
      b.penelitian = g.kode_penelitian
      
GROUP BY a.kode_up ASC";
							  }
							  if ($ss == 'RM') {
							  $sp=  "SELECT 


Concat_WS('-', concat('(', c.kode_jam), concat( (SELECT kode_jam FROM jam WHERE kode_jam = c.kode_jam) + (g.jml_sks - 1),')')) as sesi, 

Concat_WS('-', MID(c.range_jam,1,5),(SELECT MID(range_jam,7,5) FROM jam WHERE kode_jam = c.kode_jam + (g.jml_sks - 1))) as jam_kuliah, 
b.dosen2,
g.nim,
g.nama,
g.judul_penelitian,
f.nama_dosen as dosen,
g.jml_sks as sks,
d.nama_hari as hari,
e.nama_ruangan as ruang

-- nama kelas,penelitian,jamkuliah,sks,hari,ruangan
FROM jadwal_up_rm as a,
     plot_up as b,
     jam as c,
     hari as d,
     ruang_belajar as e,
     dosen as f,
     penelitian as g 

WHERE a.kode_jadwal = '$cari' AND
	  a.kode_up = b.kode_up AND 
      a.jam = c.kode_jam AND
      a.hari = d.kode_hari AND
      a.ruangan = e.kode_ruangan AND
      b.dosen = f.id_dosen AND
      b.penelitian = g.kode_penelitian
      
GROUP BY a.kode_up ASC";
							  }
							  if ($ss == 'W') {
							 $sp=  "SELECT 


Concat_WS('-', concat('(', c.kode_jam), concat( (SELECT kode_jam FROM jam WHERE kode_jam = c.kode_jam) + (g.jml_sks - 1),')')) as sesi, 

Concat_WS('-', MID(c.range_jam,1,5),(SELECT MID(range_jam,7,5) FROM jam WHERE kode_jam = c.kode_jam + (g.jml_sks - 1))) as jam_kuliah, 
b.dosen2,
g.nim,
g.nama,
g.judul_penelitian,
f.nama_dosen as dosen,
g.jml_sks as sks,
d.nama_hari as hari,
e.nama_ruangan as ruang

-- nama kelas,penelitian,jamkuliah,sks,hari,ruangan
FROM jadwal_up_w as a,
     plot_up as b,
     jam as c,
     hari as d,
     ruang_belajar as e,
     dosen as f,
     penelitian as g 

WHERE a.kode_jadwal = '$cari' AND
	  a.kode_up = b.kode_up AND 
      a.jam = c.kode_jam AND
      a.hari = d.kode_hari AND
      a.ruangan = e.kode_ruangan AND
      b.dosen = f.id_dosen AND
      b.penelitian = g.kode_penelitian
      
GROUP BY a.kode_up ASC";
							  }
							
	
                        //echo $sp;
                        $no=1;
                        $exec = $db_con->query($sp) or die (mysql_error());
                        while($r=$exec->fetch(PDO::FETCH_ASSOC)){
								
											?>
										<tr class="odd gradeX">
										<td><?php echo $no ?></td>
										
										<td><?php echo $r['nim'] ?></td>
										<td><?php echo $r['nama'] ?></td>
										<td><?php echo $r['judul_penelitian'] ?></td>
										<td><?php echo $r['dosen'] ?></td>
										<td><?php echo $r['dosen2'] ?></td>
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


<?php	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=3">';  ?>