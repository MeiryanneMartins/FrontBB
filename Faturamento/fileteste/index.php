<?php include 'filesLogic.php'; ?>


<!DOCTYPE html>
<html>
<head>
	<title>Upload</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div class = "container">
		<div class = "row">
			<form action="index.php" method="post" enctype="multipart/form-data">
				<h3>SELECIONAR ARQUIVO</h3>
				<input type="file" name="myfile">
				<button type="submit" name="save">Upload</button>
				<button type="" class="btn btn-xs btn-danger" name="excluir" class="btn btn-sm btn-danger" id=""><span class="glyphicon glyphicon-remove"></span>Excluir</button>
				
			</form>


			<div id='busca'>
				<form action="/search" class="search" method="get">
					<input id="txtbusca" name="q" type="text" value="" placeholder="Digite o que você procura" />
					<input id="btnBusca" type="submit" value="Ok"/>
				</form>
			</div>



			<div class="row">

				<table>
					<thead>
						<th>ID</th>
						<th>NOME ARQUIVO</th>
						<th>TAMANHO (em mb)</th>
						<th>Downloads</th>
						<th>AÇÃO</th>
					</thead>
					<tbody>

						<?php foreach ($files as $file): ?>

							<tr>
								<td><?=$file['id']; ?></td>
								<td><?=$file['name'];?></td>
								<td><?=$file['size'] / 1000 . "KB";?></td>
								<td><?=$file['downloads'];?></td>
								<td> 
									<a href="index.php?file_id=<?=$file ['id'] ?>">Download</a>
								</td>
							</tr>

						<?php endforeach ; ?>

					</tbody>
				</table>

			</div>

		</div>

	</body>
	</html>