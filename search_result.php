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
    <?php require('view/header.php') ?>

    <div>
        <div class="search_resultContainer">
            <div class="search_resultIntro">
                <h2>검색결과</h2>
            </div>
            <table class="search_resultTable">
                <thead>
                    <tr>
                        <th>번호</th>
                        <th>제목</th>
                        <th>작성자</th>
                        <th>날짜</th>
                        <th>조회수</th>
                    </tr>
                </thead>
                <?php
                $connect = mysqli_connect("localhost", "root", "mysql", "phpbbs") or die("connect fail");

                $user_skey = $_POST['skey'];

                $query = "SELECT * FROM board WHERE content LIKE '%$user_skey%'";
                $result = $connect->query($query);
                while ($rows = mysqli_fetch_assoc($result)) {
                ?>
                    <tbody>
                        <tr>
                            <td><?= $rows['number'] ?></td>
                            <td><a href="view.php?number=<?= $rows['number'] ?>"><?= $rows['title'] ?></a></td>
                            <td><?= $rows['id'] ?></td>
                            <td><?= $rows['date'] ?></td>
                            <td><?= $rows['hit'] ?></td>
                        </tr>
                    </tbody>
                <?php } ?>
            </table>
        </div>
    </div>
</body>

</html>