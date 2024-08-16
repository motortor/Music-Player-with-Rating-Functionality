<?php
// Check if the 'output' POST parameter is set
// 检查是否设置了'output'的POST参数
if (isset($_POST['output'])) {
    // Read the content of fitness.txt and timestamps.txt
    // 读取fitness.txt和timestamps.txt的内容
    $fitnessContent = file_get_contents('output/fitness.txt');
    $timestampsContent = file_get_contents('output/timestamps.txt');

    // Split the content into arrays by lines
    // 将内容按行拆分成数组
    $fitnessLines = explode("\n", $fitnessContent);
    $timestampsLines = explode("\n", $timestampsContent);

    // Get the user input ID, if any
    // 获取用户输入的ID号
    $userId = isset($_POST['userId']) ? $_POST['userId'] : '';

    // Build the output file name based on the user ID
    // 构建输出文件名
    $outputFileName = empty($userId) ? 'ID.txt' : $userId . '.txt';

    // Create the ID.txt (or userId.txt) file
    // 创建ID.txt文件（或userId.txt）
    $idFile = fopen($outputFileName, 'w');

    // Start scanning from the last line of fitness.txt upwards
    // 从fitness.txt的最后一行开始往上扫描
    $a = 0; // Flag to indicate if a non-empty line has been encountered
    // 用于标记是否已经扫描到非空行
    for ($i = count($fitnessLines) - 1; $i >= 0; $i--) {
        // Get the current line's song name and fitness score
        // 获取当前行的歌曲名和评分
        $fitnessLine = trim($fitnessLines[$i]);

        // If the line is empty, check if a non-empty line has been encountered
        // 如果是空行，检查是否已经扫描到非空行
        if (empty($fitnessLine)) {
            if ($a === 1) {
                // If a non-empty line was already encountered, stop scanning
                // 已经扫描到非空行，停止扫描
                break;
            }
        } else {
            // Encountered a non-empty line, set the flag to 1
            // 扫描到非空行，将标记置为1
            $a = 1;
        }

        list($songName, $fitness) = explode(': ', $fitnessLine);

        // Search for the corresponding line in timestamps.txt
        // 在timestamps.txt中查找对应的行
        foreach ($timestampsLines as $timestampLine) {
            if (strpos($timestampLine, $songName) === 0) {
                // Write the matched line to ID.txt
                // 将匹配的行写入ID.txt
                fwrite($idFile, "$timestampLine  fitness: $fitness\n");
                break;
            }
        }
    }

    // Close the file
    // 关闭文件
    fclose($idFile);

    // Return a success status code
    // 返回成功的状态码
    http_response_code(200);
}
?>
