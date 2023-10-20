<?php
// 데이터베이스 연결 정보
$host = "localhost";
$user = "root";
$password = "111111";
$dbname = "wooah";

try {
    // 데이터베이스에 연결
    $conn = new mysqli($host, $user, $password, $dbname);

    // 에러 모드 설정
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $name = $_POST["name"];
    $userid = $_POST["userid"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];


    // 사용자 정보를 데이터베이스에 삽입하는 SQL 쿼리
    $sql = "INSERT INTO users (name, id, password) VALUES ('$name', '$userid', '$password')";

    // SQL 쿼리 실행
    if ($conn->query($sql) === TRUE) {
        echo "Registration successful! Welcome, " . $name . "!";
        header('Location: ../baby_info.html'); // 로그인 성공 시 리다이렉션할 페이지로 이동
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // 데이터베이스 연결 종료
    $conn->close();

} catch (Exception $e) {
    // 데이터베이스 연결이 실패하면 에러 메시지 출력
    echo "Error: " . $e->getMessage();
}
?>
