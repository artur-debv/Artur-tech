<!Doctype HTML>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Painel Adm</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<style>
	body {
		margin: 0px;
		padding: 0px;
		background-color: white;
		overflow: hidden;
		font-family: system-ui;
	}

	.clearfix {
		clear: both;
	}

	.logo {
		margin: 0px;
		margin-left: 28px;
		font-weight: bold;
		color: white;
		margin-bottom: 30px;
	}

	.logo span {
		color: #f7403b;
	}

	.sidenav {
		height: 100%;
		width: 300px;
		position: fixed;
		z-index: 1;
		top: 0;
		left: 0;
		background-color: #272c4a;
		overflow: hidden;
		transition: 0.5s;
		padding-top: 30px;
		width: 273px;
	}

	.sidenav a {
		gap: 8px;
		padding: 15px 8px 15px 32px;
		text-decoration: none;
		font-size: 20px;
		color: #818181;
		display: flex;
		transition: 0.3s;
		color: white;
	}

	.sidenav a:hover {
		color: #f1f1f1;
		background-color: #1b203d;
	}

	.sidenav {
		position: absolute;
		top: 0;
		right: 25px;
		font-size: 36px;
		background-image: linear-gradient(180deg, #4e73df 10%, #224abe 100%);
		background-size: cover;
	}

	#main {
		transition: margin-left .5s;
		margin-left: 300px;
	}

	.head {
		padding: 20px;
	}

	.col-div-6 {
		width: 50%;
		float: left;
	}



	.profile {
		display: inline-block;
		float: right;
		width: 160px;
	}

	.pro-img {
		float: left;
		width: 40px;
		margin-top: 5px;
	}

	.profile p {
		color: white;
		font-weight: 500;
		margin-left: 55px;
		margin-top: 10px;
		font-size: 13.5px;
	}

	.profile p span {
		font-weight: 400;
		font-size: 12px;
		display: block;
		color: #8e8b8b;
	}

	.col-div-3 {
		width: 25%;
		float: left;
	}

	.box {
		width: 85%;
		height: 100px;
		background-color: #272c4a;
		margin-left: 10px;
		padding: 10px;
	}

	.box p {
		font-size: 35px;
		color: white;
		font-weight: bold;
		line-height: 30px;
		padding-left: 10px;
		margin-top: 20px;
		display: inline-block;
	}

	.box p span {
		font-size: 20px;
		font-weight: 400;
		color: #818181;
	}

	.box-icon {
		font-size: 40px !important;
		float: right;
		margin-top: 35px !important;
		color: #818181;
		padding-right: 10px;
	}

	.col-div-8 {
		width: 70%;
		float: left;
	}

	.col-div-4 {
		width: 30%;
		float: left;
	}

	.content-box {
		padding: 20px;
	}

	.content-box p {
		margin: 0px;
		font-size: 20px;
		color: #f7403b;
	}

	.content-box p span {
		float: right;
		background-color: #ddd;
		padding: 3px 10px;
		font-size: 15px;
	}


	.nav2 {
		display: none;
	}

	.box-8 {
		margin-left: 10px;
	}

	table {
		font-family: arial, sans-serif;
		border-collapse: collapse;
		width: 100%;

	}

	td,
	th {
		text-align: left;
		padding: 15px;
		color: #ddd;
		border-bottom: 1px solid #81818140;
	}

	.circle-wrap {
		margin: 50px auto;
		width: 150px;
		height: 150px;
		background: #e6e2e7;
		border-radius: 50%;
	}

	.circle-wrap .circle .mask,
	.circle-wrap .circle .fill {
		width: 150px;
		height: 150px;
		position: absolute;
		border-radius: 50%;
	}

	.circle-wrap .circle .mask {
		clip: rect(0px, 150px, 150px, 75px);
	}

	.circle-wrap .circle .mask .fill {
		clip: rect(0px, 75px, 150px, 0px);
		background-color: #f7403b;
	}

	.circle-wrap .circle .mask.full,
	.circle-wrap .circle .fill {
		animation: fill ease-in-out 3s;
		transform: rotate(126deg);
	}

	@keyframes fill {
		0% {
			transform: rotate(0deg);
		}

		100% {
			transform: rotate(126deg);
		}
	}

	.circle-wrap .inside-circle {
		width: 130px;
		height: 130px;
		border-radius: 50%;
		background: #fff;
		line-height: 130px;
		text-align: center;
		margin-top: 10px;
		margin-left: 10px;
		position: absolute;
		z-index: 100;
		font-weight: 700;
		font-size: 2em;
	}

	.dropdown,
	.dropdown-center,
	.dropend,
	.dropstart,
	.dropup,
	.dropup-center {
		position: relative;
		left: 10%;
	}

	.topbar {
		height: 4.375rem;
	}

	.sidebar .nav-item .nav-link .img-profile,
	.topbar .nav-item .nav-link .img-profile {
		height: 2rem;
		width: 2rem;
	}

	.rounded-circle {
		border-radius: 50% !important;
	}

	img {
		vertical-align: middle;
		border-style: none;
	}

	.topbar.navbar-light .navbar-nav .nav-item .nav-link {
		color: #d1d3e2;
	}

	.topbar .nav-item .nav-link {
		height: 4.375rem;
		display: flex;
		align-items: center;
		padding: 0 0.75rem;
	}

	.navbar {
		position: relative;
		display: flex;
		flex-wrap: wrap;
		align-items: center;
		justify-content: space-between;
		padding: 0.5rem 1rem;
	}

	.navbar-expand {
		flex-flow: row nowrap;
		/* justify-content: flex-start; */
	}

	a {
		color: white;
	}

	.h1__dropdown {
		font-size: 18px;
		color: rgba(255, 255, 255, .4);
	}

	.hr_Admin {
		color: rgba(255, 255, 255, .4);
		width: 229px;
		position: relative;
		left: 5%;
	}

	.hr_finaly_produtos {
		color: rgba(255, 255, 255, .4);
		width: 226px;
		position: relative;
		right: 4%;

	}


	.h1_consultas {
		font-size: 18px;
		color: rgba(255, 255, 255, .4);
		position: relative;
		left: 10%;
	}

	.hr_finaly_cliente {
		color: rgba(255, 255, 255, .4);
		width: 226px;
		position: relative;
		left: 4%;
		margin-top: 2px;
	}

	.h1_Relatórios {
		font-size: 18px;
		color: rgba(255, 255, 255, .4);
		position: relative;
		left: 10%;
	}

	.hr_finaly_relatórios {
		color: rgba(255, 255, 255, .4);
		width: 226px;
		position: relative;
		left: 4%;
		margin-top: 2px;
	}

	.icon_user {
		color: white;
	}

	.modal {
		backdrop-filter: none;
	}

	.modal-backdrop {
		background-color: transparent;
	}

	.modal-backdrop {
		--bs-backdrop-zindex: none;
		--bs-backdrop-bg: #000;
		--bs-backdrop-opacity: 0.5;
		position: fixed;
		top: 0;
		left: 0;
		z-index: var(--bs-backdrop-zindex);
		width: 100vw;
		height: 100vh;
		background-color: var(--bs-backdrop-bg);
	}

	input[type=date],
	input[type=datetime-local],
	input[type=month],
	input[type=time] {
		-webkit-appearance: listbox;
	}

	.form-control {
		display: block;
		width: 100%;
		height: calc(1.5em + 0.75rem + 2px);
		padding: 0.375rem 0.75rem;
		font-size: 1rem;
		font-weight: 400;
		line-height: 1.5;
		color: #6e707e;
		background-color: #fff;
		background-clip: padding-box;
		border: 1px solid #d1d3e2;
		border-radius: 0.35rem;
		transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
	}

	label {
		font-weight: bold;
		font-size: 13px;
		color: #262626;
	}

	.modal-body {
		position: relative;
		flex: 1 1 auto;
		padding: 1rem;
		margin-top: -20px;
	}
</style>
<?php
// Obter o parâmetro pag
if (isset($_GET['pag'])) {
	$pag = $_GET['pag'];
} else {
	$pag = null;
}

// Incluir o arquivo apropriado
if ($pag) {
	switch ($pag) {
		case 'Produto':
			include 'Produto.php';
			break;
		case 'Cliente':
			include 'Cliente.php';
			break;
	}
}
?>

<body>
	<div id="mySidenav" class="sidenav">
		<p class="logo">ADMIN</p>
		<hr class="hr_Admin">
		<div class="dropdown">
			<h1 class="h1__dropdown">Cadastros</h1>
			<a class="link_pag_cliente" href="painelAdm.php?pag=Produto"><span class="icon_user"><i
						class='bx bx-cart-add'></i></span>Produtos</a>
			</li>
			<hr class="hr_finaly_produtos">
		</div>
		<h1 class="h1_consultas">Consultas</h1>

		<a class="link_pag_cliente" href="painelAdm.php?pag=Cliente"><span class="icon_user"><i
					class='bx bx-user'></i></span>Cliente</a>
		</li>
		<hr class="hr_finaly_cliente">
		<h1 class="h1_Relatórios">Relatórios</h1>
		<!-- Button trigger modal -->
		<a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Relatórios</a>
		<!-- Modal -->
		<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
			aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title fs-5" id="staticBackdropLabel">Relatório de Vendas</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="modal-body">

							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>Data Inicial</label>
										<input value="2023-11-04" type="date" class="form-control" name="dataInicial">
									</div>
								</div>
								<div class="col-md-4">

									<div class="form-group">
										<label>Data Final</label>
										<input value="2023-11-04" type="date" class="form-control" name="dataFinal">
									</div>
								</div>
								<div class="col-md-4">

									<div class="form-group">
										<label>Paga</label>
										<select class="form-control" name="status">
											<option value="">Todos</option>
											<option value="Sim">Sim</option>
											<option value="Não">Não</option>

										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Gerar Relatório</button>
					</div>
				</div>
			</div>
		</div>
		<hr class="hr_finaly_relatórios">
</body>

</html>