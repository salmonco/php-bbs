<?php $connect = mysqli_connect("localhost", "root", "mysql", "phpbbs") or die("connect fail");
$number = $_GET['number'];
$query = "SELECT title, content, date, id FROM board where number=$number";
$result = $connect->query($query);
$rows = mysqli_fetch_assoc($result);

$title = $rows['title'];
$content = $rows['content'];
$usrid = $rows['id'];

session_start();

$URL = "./index.php";

if (!isset($_SESSION['userid'])) {
?> <script>
        alert("권한이 없습니다.");
        location.replace("<?php echo $URL ?>");
    </script>
<?php   } else if ($_SESSION['userid'] == $usrid) {
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
        <div class="writeContainer">
            <div class="writeIntro">
                <h2>수정하기</h2>
            </div>
            <form method="post" action="modify_action.php" class="write">
                <input type="hidden" name="id" value="<?= $_SESSION['userid'] ?>">
                <input type="hidden" name="number" value="<?= $number ?>">
                <p>
                    <input type="text" class="writeName" id="name" name="title" value="<?= $title ?>">
                </p>
                <p>
                    <textarea name="content" class="writeContent" id="message"><?= $content ?></textarea>
                </p>
                <input type="submit" class="writeBtn" value="등록">
            </form>
        </div>
    </body>

    </html>
<?php   } else {
?> <script>
        alert("권한이 없습니다.");
        location.replace("<?php echo $URL ?>");
    </script>
<?php   }
?>