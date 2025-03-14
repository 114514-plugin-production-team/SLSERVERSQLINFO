#### 本插件为"服务器信息查询"
---------------------------
网站查询正在搞，但PHP源码我就直接公开
---------------------------
原理：把服务器信息上传到SQL服务器，PHP网站再把SQL服务器的信息取出来，OK🤓🤓🤓🤓
---------------------------
如果你是单独搞的话，你的SQL服务器得有"server_status"表，生成DLL
"
CREATE TABLE `server_status` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `timestamp` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `server_ip` VARCHAR(15) NOT NULL,
    `server_port` INT NOT NULL,
    `online_players` INT NOT NULL,
    `round_duration` VARCHAR(20) NOT NULL,
    UNIQUE KEY `uq_server` (`server_ip`, `server_port`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
"
他是一个表🤔🤔🤔
可以制作服务器列表🤓🤓🤓
---------------------------
插件和PHP程序里的SQL服务器可以改成你的,我的TM不是root气死
---------------------------
### 干了一下午的，只为了一点Star
## 我的QQ:3145186196
# 当然我还用了DeepSeek
