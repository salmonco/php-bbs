<?php
$connect = mysqli_connect("localhost", "root", "mysql", "phpbbs") or die("fail");

$id = $_POST['id'];
$title = $_POST['title'];
$content = $_POST['content'];
$date = date("Y-m-d H:i:s");

$URL = './index.php';

$query = "INSERT INTO board (number, title, content, id, date, hit) 
                VALUES(null, '$title', '$content', '$id', '$date', 0)";

$result = $connect->query($query);
if ($result) {
?> <script>
        alert("<?php echo "글이 등록되었습니다." ?>");
        location.replace("<?php echo $URL ?>");
    </script>
<?php
} else {
    echo "FAIL";
}
?>