<!DOCTYPE html>

<html lang="ko">

<head>
    <meta charset='utf-8'>
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
        <div class="listContainer">
            <div class="listIntro">
                <h2>게시판</h2>
                <p><a href="write.php"><i class="fas fa-pen"></i>글쓰기</a></p>
            </div>
            <table class="listTable">
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

                $query = "SELECT * FROM board order by number desc limit 0, 15";
                $result = $connect->query($query);


                while ($rows = mysqli_fetch_assoc($result)) {
                    $title = $rows['title'];

                    if (strlen($title) > 30) {
                        $title = str_replace($rows['title'], mb_substr($rows['title'], 0, 30, "utf-8") . "...", $rows['title']);
                    }
                ?>
                    <tbody>
                        <tr>
                            <td><?= $rows['number'] ?></td>
                            <td><a href="view.php?number=<?= $rows['number'] ?>"><?= $title ?></a></td>
                            <td><?= $rows['id'] ?></td>
                            <td><?= $rows['date'] ?></td>
                            <td><?= $rows['hit'] ?></td>
                        </tr>
                    </tbody>
                <?php } ?>
            </table>
        </div>
    </div>
    <?php require('view/footer.php') ?>
</body>

</html>