<?php
$connect = mysqli_connect("localhost", "root", "mysql", "phpbbs") or die("connect fail");
$number = $_POST['number'];
$title = $_POST['title'];
$content = $_POST['content'];
$date = date('Y-m-d H:i:s');
$query = "UPDATE board SET title='$title', content='$content', date='$date' where number=$number";
$result = $connect->query($query);
if ($result) {
?>
    <script>
        alert("수정되었습니다.");
        location.replace("./view.php?number=<?= $number ?>");
    </script>
<?php    } else {
    echo "fail";
}
?>