create table user(
       description text,       -- 用户名称
       id text collate nocase, -- 用户 ID
       password text,          -- 用户密码
       effective_date text,    -- 生效日期
       valid_duration integer,  -- 有效时长（天）
       update_time text
       );

insert into user values('测试用户', 'TEST', 'test', '2019-12-26', 30, '');

create table training_list(
       id integer auto_increment,
       description text,
       video_id text
       );
      
insert into training_list values
       (1, '安全鞋中文版 ', 'CD5623B7D68625E79C33DC5901307461'),
       (2, '呼吸防护中文版', '465C13B6F0B455BF9C33DC5901307461'),
       (3, '躯体防护中文版 ', '997C251F55AFEBE59C33DC5901307461'),
       (4, '手部防护中文版', '63E409C66DC2AAD09C33DC5901307461'),
       (5, '听力防护中文版', '5BC6BABB20AE5DBC9C33DC5901307461'),
       (6, '头部防护中文版 ', 'D69F35A6FE2D421C9C33DC5901307461'),
       (7, '眼部防护中文版 ', 'C750E137F2AEDAF99C33DC5901307461'),
       (8, '坠落防护中文版 ', '98FFB85813ECCFF29C33DC5901307461');
 