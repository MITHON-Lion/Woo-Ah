<?php
// 이 부분에서 데이터베이스 연결 및 사용자 인증 로직을 구현해야 합니다.
$host = "localhost";
	$user = "root";
	$pass = "111111";
	$db = "wooah";

    try {
        // 데이터베이스에 연결
        $conn = new mysqli($host, $user, $pass, $db);
    } catch (PDOException $e) {
        // 데이터베이스 연결이 실패하면 에러 메시지 출력
        echo "Error: " . $e->getMessage();
    }
    $userid = $_POST["userid"];
    $password = $_POST["password"];
// SQL 쿼리를 사용하여 사용자 인증
$query = "SELECT * FROM users WHERE id='$userid' AND password='$password'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
  echo "로그인 성공.";
    header('Location: ../index.html'); // 로그인 성공 시 리다이렉션할 페이지로 이동
} else {
    // 로그인 실패
    echo "로그인 실패. 다시 시도하세요.";
}

// 데이터베이스 연결 종료
$conn->close();

?>
