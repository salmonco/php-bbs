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
    session_start();
    $URL = "./index.php";
    if (!isset($_SESSION['userid'])) {
    ?>
        <script>
            alert("로그인이 필요합니다");
            location.replace("<?php echo $URL ?>");
        </script>
    <?php
    }
    ?>

    <div class="writeContainer">
        <div class="writeIntro">
            <h2>글쓰기</h2>
        </div>
        <form action="write_action.php" class="write" method="post">
            <input type="hidden" name="id" value="<?= $_SESSION['userid'] ?>">
            <p>
                <input type="text" class="writeName" placeholder="제목을 입력해 주세요." onfocus="this.placeholder=''" onblur="this.placeholder='제목을 입력해 주세요.'" id="name" name="title">
            </p>
            <p>
                <textarea name="content" class="writeContent" placeholder="내용을 입력하세요." onfocus="this.placeholder=''" onblur="this.placeholder='내용을 입력하세요.'" id="message"></textarea>
            </p>
            <input type="submit" class="writeBtn" value="등록">
        </form>
    </div>
</body>

</html>