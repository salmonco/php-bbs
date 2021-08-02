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
    <div class="pageLogo"><a href="main.php">BBS SITE</a></div>
    <div class="loginContainer">
        <form method="post" action='login_action.php'>
            <p><input class="login fir" name="id" type="text" placeholder="ID" onfocus="this.placeholder=''" onblur="this.placeholder='ID'"></p>
            <p><input class="login sec" name="pw" type="password" placeholder="Password" onfocus="this.placeholder=''" onblur="this.placeholder='Password'"></p>
            <button class="loginBtn" type="submit">로그인</button>
        </form>
        <br />
        <button id="join" onclick="location.href='./join.php'">회원가입</button>
    </div>

</body>

</html>