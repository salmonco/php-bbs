<?php
// 네이버 캡차 Open API 예제 - 키 발급
$client_id = "XtFydm_GuPKosniuPH1X"; // 네이버 개발자센터에서 발급받은 CLIENT ID
$client_secret = "CXVaPL4ZSm"; // 네이버 개발자센터에서 발급받은 CLIENT SECRET
$code = "0";
$url = "https://openapi.naver.com/v1/captcha/nkey?code=" . $code;
$is_post = false;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, $is_post);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$headers = array();
$headers[] = "X-Naver-Client-Id: " . $client_id;
$headers[] = "X-Naver-Client-Secret: " . $client_secret;
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$response = curl_exec($ch); //response에서 JSON 형식으로 key 값 받아옴
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//echo "status_code:" . $status_code . "<br>";
curl_close($ch);
if ($status_code == 200) {
    //echo $response;
} else {
    echo "Error 내용:" . $response;
}
?>

<?php
// 네이버 캡차 Open API 예제 - 이미지수신
$obj = json_decode($response);
$key = $obj->{'key'}; //JSON 형식의 response에서 key 값 뽑아냄
$url = "https://openapi.naver.com/v1/captcha/ncaptcha.bin?key=" . $key;
$is_post = false;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, $is_post);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$headers = array();
$headers[] = "X-Naver-Client-Id: " . $client_id;
$headers[] = "X-Naver-Client-Secret: " . $client_secret;
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$response = curl_exec($ch);
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//echo "status_code:" . $status_code . "<br>";
curl_close($ch); ?>

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
        <form method="post" action='join_action.php'>
            <p><input class="login fir" type="text" name="id" placeholder="ID" onfocus="this.placeholder=''" onblur="this.placeholder='ID'" required></p>
            <p><input class="login sec" type="password" name="pw" placeholder="Password" onfocus="this.placeholder=''" onblur="this.placeholder='Password'" required></p>
            <p><input class="login email" type="email" name="email" placeholder="Email" onfocus="this.placeholder=''" onblur="this.placeholder='Email'" required></p>
            <?php if ($status_code == 200) { //오류가 없다면 캡차 이미지 프린트
                $fp = fopen("captcha.jpg", "w+");
                fwrite($fp, $response);
                fclose($fp);
                echo "<br>";
                echo "<img src='captcha.jpg'>";
            } else {
                echo "Error 내용2:" . $response;
            }
            ?>
            <input type="hidden" value="<?= $key ?>" name="key">
            <input type="text" name="capt">
            <button class="loginBtn" type="submit">회원가입</button>
        </form>
    </div>
</body>

</html>