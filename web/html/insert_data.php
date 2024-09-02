<?php
$mysqli = new mysqli("db", "user", "password", "mydatabase");

// 检查连接
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// 创建一个测试表
$mysqli->query("CREATE TABLE IF NOT EXISTS performance_test (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");

// 开始计时
$start_time = microtime(true);

// 插入 10,000 条测试数据
for ($i = 0; $i < 100; $i++) {
    $name = 'User' . $i;
    $email = 'user' . $i . '@example.com';
    $mysqli->query("INSERT INTO performance_test (name, email) VALUES ('$name', '$email')");
}

// 结束计时
$end_time = microtime(true);
$execution_time = ($end_time - $start_time);

echo "插入 10,0 条数据的执行时间: " . $execution_time . " 秒";

// 关闭连接
$mysqli->close();
?>