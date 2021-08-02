<?php
$connect = mysqli_connect("localhost", "root", "mysql", "phpbbs");
$number = $_GET['number'];

session_start();

$query = "SELECT title, content, date, hit, id FROM board where number =$number";
$result = $connect->query($query);
?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Zen+Tokyo+Zoo&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <title>BBS SITE</title>
</head>

<body>
    <?php
    if ($rows = mysqli_fetch_assoc($result)) {
    ?>
        <div class="viewContainer">
            <div class="infoContainer">
                <div>
                    <h3>제목: <?= $rows['title'] ?></h3>
                    <h4>작성자: <?= $rows['id'] ?></h4>
                    <div class="infoDetail">
                        <p><?= $rows['date'] ?></p>
                        <p class="viewNum">조회수: <?= $rows['hit'] ?></p>
                    </div>
                </div>
                <div class="updelBtn">
                    <a href="modify.php?number=<?= $number ?>" class="updateBtn">수정</a>
                    <a href="delete_action.php?number=<?= $number ?>" class="deleteBtn">삭제</a>
                </div>
            </div>
            <div class="messageContainer">
                <?= $content = nl2br($rows['content']) ?>
            </div>
            <br><br><br><br><br>
            <h5><?= $rows['id'] ?>님의 게시글</h5>
        </div>
    <?php } ?>
    <p class="listComback"><a href="index.php">목록으로 돌아가기</a></p>
</body>

</html>

<?php $hit = "UPDATE board SET hit=hit+1 where number=$number";
$connect->query($hit);
?>