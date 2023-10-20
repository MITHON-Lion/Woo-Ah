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

   // POST 데이터 가져오기
   $baby_name = $_POST["name"];
   $birth_date = $_POST["birth_date"];
    $gender = $_POST["gender"];
   //birth_date를 'YYYY-MM-DD' 형식으로 변환
   // SQL 쿼리 작성
   $sql = "INSERT INTO baby (baby_name, birth_date, gender) VALUES ('$baby_name', '$birth_date', $gender);";
    // SQL 쿼리 실행
    if ($conn->query($sql) === TRUE) {
        echo "Registration successful! Welcome, " . $name . "!";
        header('Location: ../main.html'); // 로그인 성공 시 리다이렉션할 페이지로 이동
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // 데이터베이스 연결 종료
    $conn->close();




?>