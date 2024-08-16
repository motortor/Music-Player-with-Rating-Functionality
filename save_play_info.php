<?php
// Check if the request method is POST
// 检查请求方法是否为POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get play information from POST request
    // 从POST请求中获取播放信息
    $playInfo = $_POST["playInfo"];

    // File path
    // 文件路径
    $filePath = "output/timestamps.txt";

    // New code: Parse play information to get start and end timestamps
    // 新增代码：解析播放信息，获取开始和结束时间戳
    $matches = [];
    // Match the first timestamp in the play information
    // 匹配播放信息中的第一个时间戳
    preg_match('/\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}\.\d{3}/', $playInfo, $matches);
    $startTimestamp = strtotime($matches[0]); // Convert to a timestamp
    // 转换为时间戳

    $matches = [];
    // Match all timestamps in the play information
    // 匹配播放信息中的所有时间戳
    preg_match_all('/\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}\.\d{3}/', $playInfo, $matches);
    $endTimestamp = strtotime(end($matches[0])); // Convert the last match to a timestamp
    // 转换最后一个匹配的时间戳

    // Write play information to the file
    // 将播放信息写入文件
    file_put_contents($filePath, $playInfo, FILE_APPEND | LOCK_EX);

    // Send a success response
    // 响应成功
    echo "Play info saved successfully!";
} else {
    // Send an error response for non-POST requests
    // 如果请求方法不是POST，响应错误
    http_response_code(400);
    echo "Bad Request";
}
?>
