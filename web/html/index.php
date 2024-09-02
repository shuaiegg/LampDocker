<?php
// 连接到数据库
$mysqli = new mysqli("db", "user", "password", "mydatabase");

// 检查连接
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// 查询数据
$sql = "SELECT id, name, email, created_at FROM performance_test ORDER BY id DESC";
$result = $mysqli->query($sql);

// 检查是否有数据
if ($result->num_rows > 0) {
    // 开始输出表格
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Created At</th></tr>";
    
    // 输出每一行数据
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["created_at"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "没有数据";
}

// 关闭连接
$mysqli->close();
?>