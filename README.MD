# 易班承德医学院新生报到指南

#### 项目介绍
易班承德医学院新生报到指南

#### 软件架构
-- /
  |-- yiban/
    |
    |-- freshman/
      |
      |-- director/
        |
        |
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
        |
        |-- demo/     当前测试实例
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
        |-- js/      易班开放的js调用接口
          |
          |-- director.js
        |
        |-- style/   基于WEUI制作的css文件包以及各图标文件（style下的文件结构不再细说）
  |
  |-- README.MD          本文档

#### 使用说明

1. 编写中。。。
