<?php
// Get ratings data from the POST request
// 从POST请求中获取评分数据
$ratingsText = $_POST['ratings'];

// Define the file path
// 定义文件路径
$filePath = 'output/fitness.txt';

// Open the file in append mode
// 以追加模式打开文件
$file = fopen($filePath, 'a');

// Check if the file was opened successfully
// 检查文件是否成功打开
if ($file) {
    // Write the ratings data to the file
    // 将评分数据写入文件
    fwrite($file, $ratingsText . "\n");

    // Close the file
    // 关闭文件
    fclose($file);

    // Send a success response
    // 发送成功响应
    echo 'Ratings saved successfully!';
} else {
    // Send an error response if the file couldn't be opened
    // 如果文件无法打开，发送错误响应
    http_response_code(500);
    echo 'Error saving ratings: Unable to open file.';
}
?>
