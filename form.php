<?php
$link = mysqli_connect("localhost", "root", "qwertyas123");
mysqli_select_db($link, "umbrella-corp");

$name = $_POST["name"];
$email = $_POST["email"];
$department = $_POST["department"];
$level = $_POST["security-level"];
$message = $_POST["message"];

$sql = "INSERT INTO messages(name, email, department, level, message) VALUES ('$name', '$email', '$department', '$level', '$message')";
$result = mysqli_query($link, $sql);

header("Location: ".$_SERVER["HTTP_REFERER"]);

$sql="SELECT name, email, department, level, message FROM messages";
$result=mysqli_query($link, $sql);

while ($line=mysqli_fetch_row($result)) {
echo "<b>Имя:</b>".$line[0]."<br>";
echo "<b>Email:</b>".$line[1]."<br>";
echo "<b>Отдел:</b>".$line[2]."<br>";
echo "<b>Уровень доступа:</b>".$line[3]."<br>";
echo "<b>Сообщение:</b>".$line[4]."<br>";
}
?>
