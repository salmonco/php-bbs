<?php $connect = mysqli_connect("localhost", "root", "mysql", "phpbbs") or die("connect fail");
$number = $_GET['number'];
$query = "SELECT id FROM board where number=$number";
$result = $connect->query($query);
$rows = mysqli_fetch_assoc($result);

$usrid = $rows['id'];

session_start();

$URL = "./index.php";

if (isset($_SESSION['userid'])) {
    if ($_SESSION['userid'] == $usrid) {
        $querydel = "DELETE FROM board WHERE number=$number";
        $resultdel = $connect->query($querydel);
        if ($resultdel) { ?>
            <script>
                alert("삭제되었습니다.");
                location.replace("<?php echo $URL ?>");
            </script>
        <?php    } else {
            echo "fail";
        } ?>
    <?php } else { ?>
        <script>
            alert("권한이 없습니다.");
            location.replace("<?php echo $URL ?>");
        </script>
    <?php }
} else { ?>
    <script>
        alert("권한이 없습니다.");
        location.replace("<?php echo $URL ?>");
    </script>
<?php } ?>