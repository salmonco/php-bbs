<?php
// 네이버 캡차 Open API 예제 - 키 입력값 비교
$client_id = "XtFydm_GuPKosniuPH1X"; // 네이버 개발자센터에서 발급받은 CLIENT ID
$client_secret = "CXVaPL4ZSm"; // 네이버 개발자센터에서 발급받은 CLIENT SECRET
$key = $_POST['key'];
$code = "1";
$value = $_POST['capt'];
$url = "https://openapi.naver.com/v1/captcha/nkey?code=" . $code . "&key=" . $key . "&value=" . $value;
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
curl_close($ch);

if ($status_code == 200) {
    $obj = json_decode($response);
    if ($obj->{'result'}) { //result 값이 true면 키와 입력값이 같음
        $connect = mysqli_connect("localhost", "root", "mysql", "phpbbs") or die("fail");

        $id = $_POST['id'];
        $pw = $_POST['pw'];
        $email = $_POST['email'];

        $date = date('Y-m-d H:i:s');

        //입력받은 데이터를 DB에 저장
        $query = "INSERT INTO member1 (id, pw, email, date, permit) VALUES ('$id', '$pw', '$email', '$date', 0)";
        $result = $connect->query($query);

        //저장이 됐다면 (result = true) 가입 완료
        if ($result) {
?> <script>
                alert('가입 되었습니다.');
                location.replace("./login.php");
            </script>

        <?php   } else {
        ?> <script>
                alert("fail");
            </script>
        <?php   }
        mysqli_close($connect);
    } else { ?>
        <script>
            alert('자동가입방지 문구가 올바르지 않습니다.')
            location.replace("join.php");
        </script>

<?php }
} else {
    echo "Error 내용:" . $response;
} ?>