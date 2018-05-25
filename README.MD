# 易班承德医学院新生报到指南

#### 项目介绍
易班承德医学院新生报到指南

#### 软件架构
-- /
  |-- yiban/
    |
    |-- freshman/
      |
      |-- js/      易班开放的js调用接口
        |
        |-- navigator.js
      |
      |-- style/   基于WEUI制作的css文件包以及各图标文件（style下的文件结构不再细说）
      |-- classes/      开放平台SDK(轻应用)
        |
        |-- YBAPI/
          |
          |--IApp.class.php  易班提供的授权接口
        |
        |-- DBConnector.class.php       数据库连接类
        |
        |-- lang.zh_CN.UTF8.php        错误通知配置
        |
        |-- Students.class.php     学生类包含学生基本信息和易班用户信息
        |
        |-- YBException.class.php      易班Exception类继承Exception类
        |
        |-- yb-globals.inc.php     require本文件夹内各文件方便统一调用
        |
        |-- YBOpenApi.class.php     易班提供的开放api接口
      |-- navigator/
        |
        |-- config.php      配置文件，您需要修改这个文件写入对应的 AppID 等信息
        |
        |-- index.php       DEMO入口
        |
        |-- iapp.php        测试实例主入口
        |
        |-- browseinfo.php     查看学生信息提交历史
        |
        |-- freshmantips.php      新生入学须知
        |
        |-- manual.php     使用指南
        |
        |-- map.php      查看地图
        |
        |-- navigator.php     导航
        |
        |-- success.php      提交成功通知
        |
        |-- update.php     提交学生信息后端处理入口
        |
        |-- updateinfo.php      提交学生信息前端页面
        |
        |-- warning.php      重复填写学生信息警告通知
        |
        |-- error.php        学生信息提交失败通知
        |
        |-- 404.php          应用维护跳转页面
  |
  |-- README.MD          本文档

#### 使用说明

界面上部导航栏由三部分组成 

左边为查看学校地图功能
 
中间是标题栏，若需要帮助请点击标题栏拨打工作人员电话。
 
右边为调用二维码扫描器功能。
 
下部分为四个导航按键
 
信息登记：  
在新生报到地点填入考生号，学号，姓名，性别，确认无误并点击提交。
 
提交后点击浏览提交历史
 
若确认无误清出示给签到处工作人员，若有误清点击联系工作人员。
报道向导：
 
调出地图后选择去向，开始调出导航。
 