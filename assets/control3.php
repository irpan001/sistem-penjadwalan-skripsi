
<?php  
session_start();
include '../vendors/koneksi.php';

$jj = $_GET['hal'];

	
	
		if ($jj == "page3") {
		# code...
$dos = $_POST["dos"];
$sesi = $_POST["sesi"];
if($dos !== ""){
	$sql = "SELECT * FROM plot_dosen,dosen WHERE plot_dosen.id_dosen = dosen.id_dosen AND plot_dosen.penelitian = '$dos' AND plot_dosen.sesi = '$sesi'  ";
	$output = '<option value="" selected="" disabled="">PILIH</option>';
	 $exe = $db_con->query($sql) or die (mysql_error());
		while($row=$exe->fetch(PDO::FETCH_ASSOC)){
					 
		$output .= '<option value="'.$row["id_dosen"].'">'.$row["nama_dosen"].'</option>';
	}
}else{
	$output = '<option value="">--Tolong pilih data--</option>';
}
echo  $output;
}


	if ($jj == "page4") {
		# code...
$dos = $_POST["dos"];
$sesi = $_POST["sesi"];
$kelas = $_POST["kelas"];
$jur = $_SESSION['jurusan'];

if($kelas !== ""){

	$sql = "SELECT * FROM plot_up WHERE nama_kelas = '$kelas' AND penelitian = '$dos' AND sesi= '$sesi' ";
	$a = '<input type="text" name="grup"  class="form-control" id="grup" placeholder="Jurusan" readonly="readonly" value="A" >';
	 $exe = $db_con->query($sql) or die (mysql_error());
// echo $kelas;
// echo $sql;
		while($row=$exe->fetch(PDO::FETCH_ASSOC)){

			if ($row['group_kelas'] == "") {
				$abjad = "A";
			} elseif ($row['group_kelas'] == "A") {
				$abjad = "B"; 
			} elseif ($row['group_kelas'] == "B") {
				$abjad = "C"; 
			} elseif ($row['group_kelas'] == "C") {
				$abjad = "D"; 
			} elseif ($row['group_kelas'] == "D") {
				$abjad = "E"; 
			} elseif ($row['group_kelas'] == "E") {
				$abjad = "F"; 
			} elseif ($row['group_kelas'] == "F") {
				$abjad = "G"; 
			} elseif ($row['group_kelas'] == "G") {
				$abjad = "H"; 
			}		 

	$a = '<input type="text" name="grup"  class="form-control" id="grup" placeholder="Jurusan" readonly="readonly" value="'.$abjad.'" >';
	}
}else{
	$a =  '<input type="text" name="grup"  class="form-control" id="grup" placeholder="Jurusan" readonly="readonly" value="FULL" >';
}
echo  $a;
}





if ($jj == "jam") {
	

	$sql = "SELECT * FROM jam ";
	$output = '';
	 $exe = $db_con->query($sql) or die (mysql_error());
		while($row=$exe->fetch(PDO::FETCH_ASSOC)){
					 
		$output .= '<label><input type="checkbox" name="jam[]" id="jam" value="'.$row["kode_jam"].'">'.$row["range_jam"].'</label><br/>';
	}

echo  $output;
}

if ($jj == "kategori") {
	

	$sql = "SELECT * FROM kategori ";
	$output = '';
	 $exe = $db_con->query($sql) or die (mysql_error());
		while($row=$exe->fetch(PDO::FETCH_ASSOC)){
					 
		$output .= '<label><input type="checkbox" name="kategori[]" id="kategori" value="'.$row["kode_kategori"].'">'.$row["nama_kategori"].'</label><br/>';
	}

echo  $output;
}			


if ($jj == "hari") {
	

	$sql = "SELECT * FROM hari ";
	$output = '<option value="" selected="" disabled="">PILIH</option>';
	 $exe = $db_con->query($sql) or die (mysql_error());
		while($row=$exe->fetch(PDO::FETCH_ASSOC)){
					 
		$output .= '<option value="'.$row["kode_hari"].'">'.$row["nama_hari"].'</option>';
	}

echo  $output;
}

if ($jj == "sesi") {
	

	$sql = "SELECT * FROM sesi ";
	$output = '<option value="" selected="" disabled="">PILIH</option>';
	 $exe = $db_con->query($sql) or die (mysql_error());
		while($row=$exe->fetch(PDO::FETCH_ASSOC)){
					 
		$output .= '<option value="'.$row["kode_sesi"].'">'.$row["keterangan"].'</option>';
	}

echo  $output;
}

if ($jj == "penelitian1") {
	

	$sql = "SELECT * FROM plot_semhas,penelitian where plot_semhas.penelitian = penelitian.kode_penelitian AND plot_semhas.keterangan = 'lulus'";
	$output = '<option value="" selected="" disabled="">PILIH</option>';
	 $exe = $db_con->query($sql) or die (mysql_error());
		while($row=$exe->fetch(PDO::FETCH_ASSOC)){
					 
		$output .= '<option value="'.$row["penelitian"].'">'.$row["judul_penelitian"].'</option>';
	}

echo  $output;
}

if ($jj == "penelitian") {
	

	$sql = "SELECT * FROM plot_up,penelitian where plot_up.penelitian = penelitian.kode_penelitian  AND plot_up.keterangan = 'lulus'";
	$output = '<option value="" selected="" disabled="">PILIH</option>';
	 $exe = $db_con->query($sql) or die (mysql_error());
		while($row=$exe->fetch(PDO::FETCH_ASSOC)){
					 
		$output .= '<option value="'.$row["penelitian"].'">'.$row["judul_penelitian"].'</option>';
	}

echo  $output;
}


if ($jj == "penelitian0") {
	
    $jur = $_SESSION['jurusan']; 
	$sql = "SELECT * FROM penelitian WHERE jurusan = '$jur' ";
	$output = '<option value="" selected="" disabled="">PILIH</option>';
	 $exe = $db_con->query($sql) or die (mysql_error());
		while($row=$exe->fetch(PDO::FETCH_ASSOC)){
					 
		$output .= '<option value="'.$row["kode_penelitian"].'">'.$row["judul_penelitian"].'</option>';
	}

echo  $output;
}

if ($jj == "dosen") {
	
    $jur = $_SESSION['jurusan']; 
	$sql = "SELECT * FROM dosen WHERE jurusan = '$jur' AND status_dos= '14' ";
	$output = '<option value="" selected="" disabled="">PILIH</option>';
	 $exe = $db_con->query($sql) or die (mysql_error());
		while($row=$exe->fetch(PDO::FETCH_ASSOC)){
					 
		$output .= '<option value="'.$row["nama_dosen"].'">'.$row["nama_dosen"].'</option>';
	}

echo  $output;
}

if ($jj == "dosen2") {
	
    $jur = $_SESSION['jurusan']; 
	$sql = "SELECT * FROM dosen WHERE jurusan = '$jur' AND status_dos= '14' ";
	$output = '<option value="" selected="" disabled="">PILIH</option>';
	 $exe = $db_con->query($sql) or die (mysql_error());
		while($row=$exe->fetch(PDO::FETCH_ASSOC)){
					 
		$output .= '<option value="'.$row["nama_dosen"].'">'.$row["nama_dosen"].'</option>';
	}

echo  $output;
}

if ($jj == "kategori1") {
	

	$sql = "SELECT * FROM kategori";
	$output = '<option value="" selected="" disabled="">PILIH</option>';
	 $exe = $db_con->query($sql) or die (mysql_error());
		while($row=$exe->fetch(PDO::FETCH_ASSOC)){
					 
		$output .= '<option value="'.$row["kode_kategori"].'">'.$row["nama_kategori"].'</option>';
	}

echo  $output;
}


	if ($jj == "jadwal_cari") {
	
$sesi = $_POST['sesi'];
if ($sesi == 1) {
		$sql = "SELECT DISTINCT(kode_jadwal),tahun_ajaran FROM jadwal_up";
} elseif ($sesi == 2) {
		$sql = "SELECT DISTINCT(kode_jadwal),tahun_ajaran FROM jadwal_up_rm";
} elseif ($sesi == 3) {
		$sql = "SELECT DISTINCT(kode_jadwal),tahun_ajaran FROM jadwal_up_w";
}

	$output = '<option value="" selected="" disabled="">PILIH</option>';
	 $exe = $db_con->query($sql) or die (mysql_error());
		while($row=$exe->fetch(PDO::FETCH_ASSOC)){
					 
		$output .= '<option value="'.$row["kode_jadwal"].'">'.$row["kode_jadwal"].' T.A ('.$row["tahun_ajaran"].')</option>';
	}

echo  $output;
}

 	

	if ($jj == "plotdos") {

$s_jur = $_SESSION['jurusan'];
$sesi = $_POST["sesi"];
if ($sesi == "1") {
			$sql = "SELECT DISTINCT(ketersediaan.id_dosen) as kddos, dosen.nama_dosen, jam.keterangan FROM ketersediaan,dosen,jam WHERE ketersediaan.id_dosen = dosen.id_dosen AND ketersediaan.sesi = jam.kode_jam AND jam.keterangan = 'RP'AND dosen.jurusan = '$s_jur' ";
} elseif ($sesi == "2") {
			$sql = "SELECT DISTINCT(ketersediaan.id_dosen) as kddos, dosen.nama_dosen, jam.keterangan FROM ketersediaan,dosen,jam WHERE ketersediaan.id_dosen = dosen.id_dosen AND ketersediaan.sesi = jam.kode_jam AND jam.keterangan = 'RM' AND dosen.jurusan = '$s_jur' ";
} elseif ($sesi == "3") {
			$sql = "SELECT DISTINCT(ketersediaan.id_dosen) as kddos, dosen.nama_dosen, jam.keterangan FROM ketersediaan,dosen,jam WHERE ketersediaan.id_dosen = dosen.id_dosen AND ketersediaan.sesi = jam.kode_jam AND jam.keterangan = 'W' AND dosen.jurusan = '$s_jur' ";
}

	$output = '<option disabled="" selected="">PILIH</option>';
	 $exe = $db_con->query($sql) or die (mysql_error());

		while($row=$exe->fetch(PDO::FETCH_ASSOC)){

	$output .= '<option value="'.$row["nama_dosen"].'">'.$row["nama_dosen"].'</option>';
			// $output .= '';
	}

echo  $output;
}

if ($jj == "pdos") {
		# code...
$penelitian = $_POST["penelitian"];
if($kotaId !== ""){
	
	$sql = "SELECT * FROM plot_up WHERE penelitian = '$penelitian' ";
	$output = '<option value="" selected="" disabled="">PILIH</option>';
	 $exe = $db_con->query($sql) or die (mysql_error());
		while($row=$exe->fetch(PDO::FETCH_ASSOC)){
					 
		$output .= '<option value="'.$row["dosen"].'">'.$row["dosen"].'</option>';
	}
}else{
	$output = '<option value="">--Tolong pilih data--</option>';
}
echo  $output;
}

if ($jj == "pdos2") {
		# code...
$penelitian = $_POST["penelitian"];
if($kotaId !== ""){
	
	$sql = "SELECT * FROM plot_up WHERE penelitian = '$penelitian' ";
	$output = '<option value="" selected="" disabled="">PILIH</option>';
	 $exe = $db_con->query($sql) or die (mysql_error());
		while($row=$exe->fetch(PDO::FETCH_ASSOC)){
					 
		$output .= '<option value="'.$row["dosen2"].'">'.$row["dosen2"].'</option>';
	}
}else{
	$output = '<option value="">--Tolong pilih data--</option>';
}
echo  $output;
}

if ($jj == "pdos3") {
		# code...
$kategori = $_POST["kategori"];
if($kotaId !== ""){
	
	$sql = "SELECT * FROM kategori_dos WHERE kategori = '$kategori' ";
	$output = '<option value="" selected="" disabled="">PILIH</option>';
	 $exe = $db_con->query($sql) or die (mysql_error());
		while($row=$exe->fetch(PDO::FETCH_ASSOC)){
					 
		$output .= '<option value="'.$row["nama_dosen"].'">'.$row["nama_dosen"].'</option>';

	}
	{
					 
		$output .= '<option disabled="" selected="">alternatif lain</option>';
		
	}
	{
		$sql = "SELECT * FROM dosen WHERE jurusan = '$_SESSION[jurusan]' AND status_dos = '14' ";		
		$exe = $db_con->query($sql) or die (mysql_error());
		while($row=$exe->fetch(PDO::FETCH_ASSOC))	 
		$output .= '<option value="'.$row["nama_dosen"].'">'.$row["nama_dosen"].'</option>';

	}

}else{
	$output = '<option value="">--Tolong pilih data--</option>';
}
echo  $output;
}

if ($jj == "pdos4") {
		# code...
$kategori = $_POST["kategori"];
if($kotaId !== ""){
	
	$sql = "SELECT * FROM kategori_dos WHERE kategori = '$kategori' ";
	$output = '<option value="" selected="" disabled="">PILIH</option>';
	 $exe = $db_con->query($sql) or die (mysql_error());
		while($row=$exe->fetch(PDO::FETCH_ASSOC)){
					 
		$output .= '<option value="'.$row["nama_dosen"].'">'.$row["nama_dosen"].'</option>';
	}
	{
					 
		$output .= '<option disabled="" selected="">alternatif lain</option>';
		
	}
	{
		$sql = "SELECT * FROM dosen WHERE jurusan = '$_SESSION[jurusan]' AND status_dos = '14' ";		
		$exe = $db_con->query($sql) or die (mysql_error());
		while($row=$exe->fetch(PDO::FETCH_ASSOC))	 
		$output .= '<option value="'.$row["nama_dosen"].'">'.$row["nama_dosen"].'</option>';

	}
}else{
	$output = '<option value="">--Tolong pilih data--</option>';
}
echo  $output;
}
	
?>
