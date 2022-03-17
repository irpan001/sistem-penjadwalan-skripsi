<html>
<head>
	<title></title>
</head>
<body>
<table>
	<tr>
		<td>Jakarta Mana</td>
		<td>: 
			<select id="jakarta">
				<option>--Pilih Jakarta--</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>Daerah Jakarta yang anda pilih</td>
		<td>:
			<select id="daerahJakarta">
				<option>--Daerah--</option>
			</select>
		</td>
	</tr>
</table>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		var app = {
			show: function(){
				$.ajax({
					url: "control3.php?hal=page2",
					method: "GET",
					success: function(data){
						$("#jakarta").html(data)
					}
				})
			},
			tampil: function(){
				var kotaId = $(this).val();
				$.ajax({
					url: "control3.php?hal=page1",
					method: "POST",
					data: {kotaId: kotaId},
					success: function(data){
						$("#daerahJakarta").html(data)
					}
				})
			}
		}
		app.show();
		$(document).on("change", "#jakarta", app.tampil)
	})
</script>
</body>
</html>