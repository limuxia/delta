-- 用户表
create table user(
       description text,       -- 用户名称
       id text collate nocase primary key, -- 用户 ID
       password text,          -- 用户密码
       effective_date text,    -- 生效日期
       valid_duration integer,  -- 有效时长（天）
       update_time text
       );

insert into user values('测试用户', 'TEST', 'test', '2019-12-26', 30, '');

-- 视频列表
create table training_list(
       id integer primary key autoincrement,
       description text,   -- 视频描述
       video_id text,      -- 已弃用：CC视频 ID（对应CC视频播放地址中参数：vid）
       status integer,      -- 可用状态：0禁用，1可用
       update_time text
       );

-- 视频播放日志表
create table training_log(
       id integer primary key autoincrement,
       log_time text		-- 观看时间
       video_id integer,     -- 观看视频
       user_id text,     	-- 观看用户
       client_ip text,  	-- 观看人 ip
       client_address text,  -- 观看人地址
	   client_device text	-- 观看人设备
       );
