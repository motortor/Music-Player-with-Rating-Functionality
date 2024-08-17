# Music-Player-with-Rating-Functionality
在一项有关“基于生理信号进行音乐偏好等级分类的可行性研究”中，我编写了一个针对性的播放器，可以记录实验者开始和结束收听音乐的时间戳，并从1至5进行评分。

播放器的songs文件夹中收录了70首30秒的音乐，均从音乐库Music4All中随机抽取。songs_data中收录了对应音乐的速度、风格、语言、作者等数据。

播放器的页面和具体功能如下图所示：
![image](https://github.com/motortor/Music-Player-with-Rating-Functionality/blob/main/screenshot.png)

实验结束后，点击页面上方的“OUTPUT DATA”按钮，即可将每首音乐的ID、播放和结束时间戳、对应的评分输出到以“实验者ID”命名的TXT文件里。
输出结果的格式如下为例：
```
1lp3AkKObSaXUQj2: 2024/08/16 18:18:49.686 - 2024/08/16 18:19:19.979  fitness: 1
1NqEMzdMVUt7GvP3: 2024/08/16 18:18:16.101 - 2024/08/16 18:18:46.286  fitness: 5
0tGyfM8g4zni2Fpw: 2024/08/16 18:17:42.813 - 2024/08/16 18:18:13.213  fitness: 4
0nqt0LfiOiVMAcoQ: 2024/08/16 18:17:05.982 - 2024/08/16 18:17:36.410  fitness: 3
0RtweAx2UHLd5Bwr: 2024/08/16 18:16:29.550 - 2024/08/16 18:16:59.997  fitness: 2
```
