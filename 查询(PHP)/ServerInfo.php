<?php
header('Content-Type: text/plain; charset=UTF-8');

// 配置MySQL连接信息
$mysql_host = 'mysql.sqlpub.com';
$mysql_user = 'sl114514';
$mysql_password = 'QdsoHXQ0vbgqCvwn';
$mysql_database = 'scpsl_stats';
$mysql_table = 'server_status';

// 获取请求参数
$requested_ip = $_GET['ip'] ?? '';
if (empty($requested_ip)) {
    die("请输入IP参数，例如：example.com/Info.php?ip=192_168_1_1_7777");
}

// 格式化IP参数
$formatted_ip = str_replace('_', '.', $requested_ip);
$formatted_ip = preg_replace('/_(\d+)$/', ':$1', $formatted_ip); // 将最后一个_替换为端口号

// 连接MySQL数据库
try {
    $pdo = new PDO(
        "mysql:host=$mysql_host;dbname=$mysql_database;charset=utf8mb4",
        $mysql_user,
        $mysql_password,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    die("数据库连接失败: " . $e->getMessage());
}

// 查询最新记录
$query = "SELECT * FROM $mysql_table WHERE server_ip = :ip ORDER BY timestamp DESC LIMIT 1";
$stmt = $pdo->prepare($query);
$stmt->execute([':ip' => $formatted_ip]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result) {
    // 格式化输出
    $output = "服务器信息\n";
    $output .= "-----------\n";
    $output .= "IP(服务器ip): " . $result['server_ip'] . "\n";
    $output .= "服务器人数: " . $result['online_players'] . "\n";
    $output .= "-----------\n";
    $output .= "回合时长: " . ($result['round_duration'] ?? "未启动") . "\n";
    $output .= "-----------\n";
    echo $output;
} else {
    echo "未查询到服务器信息，请联系QQ3145186196";
}