<?php
// Check if the 'clear' POST parameter is set
// 检查是否设置了'clear'的POST参数
if (isset($_POST['clear'])) {
    // Define the output folder path
    // 定义output文件夹的路径
    $outputFolder = 'output';
    
    // Get all files in the output folder
    // 获取output文件夹中的所有文件
    $files = glob($outputFolder . '/*');
    
    // Loop through each file and delete it
    // 遍历每个文件并将其删除
    foreach ($files as $file) {
        unlink($file); // Delete the file
        // 删除文件
    }

    // Return a success status code
    // 返回成功的状态码
    http_response_code(200);
}
?>
