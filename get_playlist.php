<?php
// Define the folder containing the music files
// 定义包含音乐文件的文件夹
$musicFolder = 'songs/';

// Get all music files with .mp3 or .wav extensions
// 获取所有 .mp3 或 .wav 扩展名的音乐文件
$musicFiles = glob($musicFolder . '*.{mp3,wav}', GLOB_BRACE);

// Number of music files to display per page
// 每页显示的音乐文件数量
$musicPerPage = 10;

// Get the current page number from the URL, default to 1 if not set
// 从URL获取当前页码，如果未设置则默认为1
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Calculate the total number of pages
// 计算总页数
$totalPages = ceil(count($musicFiles) / $musicPerPage);

// Calculate the starting index of the music files array for the current page
// 计算当前页的音乐文件数组的起始索引
$startIndex = ($page - 1) * $musicPerPage;

// Calculate the end index (not used in the final code)
// $endIndex = $startIndex + $musicPerPage;

// Slice the array to get only the music files for the current page
// 截取数组，只获取当前页的音乐文件
$musicFiles = array_slice($musicFiles, $startIndex, $musicPerPage);

// Initialize an empty playlist array
// 初始化一个空的播放列表数组
$playlist = [];

foreach ($musicFiles as $musicFile) {
    // Get the base name of the music file
    // 获取音乐文件的基本名称
    $filename = basename($musicFile);
    // Get the title of the music file without the extension
    // 获取不带扩展名的音乐文件标题
    $title = pathinfo($filename, PATHINFO_FILENAME);

    // Create an associative array with the music file information
    // 创建包含音乐文件信息的关联数组
    $song = [
        'title' => $title,  // Title of the song
        'mp3' => $musicFolder . $filename,  // Path to the mp3 file
        'wav' => $musicFolder . $filename,  // Path to the wav file
    ];

    // Add the song to the playlist array
    // 将歌曲添加到播放列表数组中
    $playlist[] = $song;
}

// Add the total pages information to the HTTP response header
// 将总页数信息添加到HTTP响应头中
header('X-Total-Pages: ' . $totalPages);

// Set the content type of the response to JSON
// 设置响应的内容类型为JSON
header('Content-Type: application/json');

// Output the playlist array as a JSON object with pretty print
// 将播放列表数组以美化的JSON对象形式输出
echo json_encode($playlist, JSON_PRETTY_PRINT);
?>
