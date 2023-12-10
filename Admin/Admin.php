<?php
	include_once "adminFunc.php";
	include_once "pop-up-messages.php";
	session_start();

    function getMainTemplate($pageName)
	{
		$BlockElement="";

		if($pageName=="user")
		{
			$BlockElement=Users();
		}
		else if ($pageName=="products")
		{
			$BlockElement=Products();
		}
		else if($pageName=="sections")
		{
			$BlockElement=sections();
		}
		else if($pageName=="orders")
		{
			$BlockElement=orders();
		}
		else if($pageName=="NewLetter")
		{
			$BlockElement=NewLetter();
		}
		else if($pageName=="admin")
		{
			$BlockElement=admin();
		}
		else if($pageName=="article")
		{
			$BlockElement=article();
		}
		else if($pageName=="addArticle")
		{
			$BlockElement=addArticle();
		}
		else if($pageName=="instagram")
		{
			$BlockElement=instagram();
		}
		else if($pageName=="addProduct")
		{
			$BlockElement=addProduct();
		}
		
		echo
		'
			<!DOCTYPE html>
			<html lang="en">
				<head>
					<meta charset="UTF-8">
					<meta http-equiv="X-UA-Compatible" content="IE=edge">
					<meta name="viewport" content="width=device-width, initial-scale=1.0">
					<link rel="stylesheet" href="../CSS/Admin/Admin.css">
					<link rel="stylesheet" href="../CSS/Common/pop-up-message.css">
					<title>Admin</title>
				</head>
				<body>
		';
					popUpMessage();
					echo'
						<div class="admin">
						<div class="dashboard">
							<a class="icon">
								<img src="../Images/logo.png" class="logo">
							</a>
							<hr class="line">
							<ul>
								<li class="leftSideBox">
									<a href="adminUserScreen.php" class="flex mar" name="user">
										<img src="../Images/User2.png" class="dashImgs">
										<div class="text">Users</div>
									</a>
								</li>
								<li class="leftSideBox">
									<div class="main">
										<input type="checkbox" id="drop-5" hidden>
										<label class="Dashlabel" for="drop-5">
											<img src="../Images/furniture-20.png" style="margin-right: 5px;" class="dashImgs">
											Product Information
										</label>
										<div class="list list-5">
											<a href="adminProductScreen.php" class="item">Products</a>
											<a href="AdminSectionScreen.php" class="item">Sections</a>
											<a href="adminOrdersScreen.php" class="item">Orders</a>
										</div>
									</div>
								</li>
								<li class="leftSideBox">
									<a href="adminadminScreen.php" class="flex mar" name="admin">
										<img src="../Images/admin.png" class="dashImgs">
										<div class="text">Admins</div>
									</a>
								</li>
								<li class="leftSideBox">
									<a href="adminNewsLetterScreen.php" class="flex mar" name="newL">
										<img src="../Images/letter.png" class="dashImgs">
										<div class="text">News Letter</div>
									</a>
								</li>
								<li class="leftSideBox">
									<a href="adminarticleScreen.php" class="flex mar" name="Article">
										<img src="../Images/article.png" class="dashImgs">
										<div class="text">Article</div>
									</a>
								</li>
								<li class="leftSideBox">
									<a href="instagramScreen.php" class="flex mar" name="Article">
										<img src="../Images/instagram-old-20.png" class="dashImgs">
										<div class="text">Instagram Posts</div>
									</a>
								</li>
								<li class="leftSideBox">
									<form class="logout-form" action="../PHP/logout-process.php" method="post">
										<button class="flex" name="alogout">
											<img src="../Images/logout-20.png" class="dashImgs">
											<div class="text">Log Out</div>
										</button>
									</form>
								</li>
							</ul>
						</div>
						<div class="right-container">
							<div class="right">
								<img src="../Images/fur1.jpg" class="BackImg">
								<div class="Info">
									'.$BlockElement.'	
								</div>
							</div>	
						</div>
					</div>
				</body>
			</html>
		';
	}
?>