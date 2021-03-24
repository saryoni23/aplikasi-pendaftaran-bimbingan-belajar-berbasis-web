<!DOCTYPE html>
<html lang="en">

<head>
	<title>Halaman Siswa</title>

	<link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="../../assets/css/style.css" rel="stylesheet">
</head>

<body>
	<div class="col-md-4 col-md-offset-4 form-login">
		<div class="outter-form-login">
			<div class="logo-login">
				<em class="glyphicon glyphicon-user"></em>
			</div>

			<h3 class="text-center title-login">Nilai</h3>

			<?php
			require '../../config/keneksi1.php';
			?>

			<table class="table" width="100%" cellpadding="3" cellspacing="0">
				<tr>
					<th width="40">No.</th>
					<th>NIS Siswa</th>
					<th>Kode Materi</th>
					<th>Nilai</th>
				</tr>
				<?php

				$sql = mysqli_query($db,"SELECT * FROM nilai ORDER BY id DESC");
				if (mysqli_num_rows($sql) > 0) {
					$no = 1;
					while ($data = mysqli_fetch_assoc($sql)) {
						echo '
						<tr bgcolor="#fff">
							<td align="center">' . $no . '</td>
							<td ">' . $data['nis'] . '</td>
							<td ">' . $data['id'] . '</td>
							<td ">' . $data['nilai'] . '</td>
							</tr>
						';
						$no++;
					}
				} else {
					echo '
					<tr bgcolor="#fff">
						<td align="center" colspan="4" align="center">Tidak ada data!</td>
					</tr>
					';
				}
				?>
			</table>

			<a href="../member/index.php">
				<input type="cancel" class="btn btn-block btn-custom-green" value="kembali" /></a>

			</form>
		</div>
	</div>

	<!-- <script src="assets/js/jquery.min.js"></script> -->
	<script src="assets/js/bootstrap.min.js"></script>
</body>

</html>