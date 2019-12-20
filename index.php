<?php
session_start();
    
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
	if ($_SESSION["vaitro"] == "admin") header("location: admin.php");
	else header("location: student.php");
	exit;
}
?>

<!DOCTYPE html><html><head>
	<title>Hệ thống quản lý lịch thi</title>
	<meta charset="utf-8">
</head>
<body>
<h1> Trang đăng nhập</h1>
<h2 id="out"></h2>
<form id="login-form">
	Tên đăng nhập <input type="text" name="username" id="username"/> <br/>
	Mật khẩu <input type="text" name="password" id="password"/> <br/>
	<input type="submit" value="Đăng nhập"/>
</form>
	<script type="text/javascript" src="/ajax/ajax.js"></script>
	<script>
		document.getElementById("login-form").onsubmit = function() {
			// Gui request bang AJAX
			let xmlhttp = getXmlHttpObject();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4) {
					// Nhan ket qua JSON
					let v = xmlhttp.responseText;
					let o = JSON.parse(v);
					if (v.length > 0) {
						// Cap nhat DOM
						//document.getElementById("out").innerText = v.toString();
						if (o.status == "thanhcong") window.location.href=o.location;
						else document.getElementById("out").innerText = "Sai ten dang nhap/mat khau!";
					}
				}
			};

			xmlhttp.open("POST", "login.php", true);
			xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			xmlhttp.send("name="+ document.getElementById("username").value +"&pass="+document.getElementById("password").value);

			
			//Bo gui request bang form
			return false;
		};
	</script>
</body>
</html>
