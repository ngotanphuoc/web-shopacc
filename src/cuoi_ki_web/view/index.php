<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Trang chủ shop acc</title>
		<script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<link href="view/css/select2.css" rel="stylesheet"/>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="view/css/main2.css">
		 <!-- Data table -->
		 <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	</head>
	<body style="background:transparent;">
		<?php include "header.php" ?>

		<?php include "dieuhuong.php"?>
		
		<?php include "footer.php" ?>

		<script src="view/js/jquery-1.8.0.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
		<script src="view/js/select2.js"></script>
		 <!-- Custom scripts for all pages-->
		 <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
		<script language="javascript" src="view/js/xuligiaodien1.js"></script>
		<script>

				$(document).ready(function() {

					$(".states").select2({

							placeholder: "Select a State",

							allowClear: true

					});

				});

		</script>
	</body>
</html>