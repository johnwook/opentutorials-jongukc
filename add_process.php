<?php
// 1. 데이터베이스 서버에 접속
$link = mysql_connect('localhost', 'root', 'xlsk87');
if (!$link) {
	die('Could not connect: ' . mysql_error());
}
// 2. 데이터베이스 선택
mysql_select_db('opentutorials');
mysql_query("set session character_set_connection=utf8;");
mysql_query("set session character_set_results=utf8;");
mysql_query("set session character_set_client=utf8;");

$title = mysql_real_escape_string($_POST['title']);
$description = mysql_real_escape_string($_POST['description']);

$sql = "INSERT INTO topic (title, description, created) VALUES('".$title."', '".$description."', NOW())";
mysql_query($sql);
if(mysql_affected_rows()==1){
	echo "
		<html>
			<head>
				<script>
					alert('성공 했습니다.');
					location.href=\"index.php?id=".mysql_insert_id()."\";
				</script>
			</head>
		</html>";
} else {
	echo "
		<html>
			<body>
				실패, ".mysql_error()."
			</body>
		</html>";
}
?>
