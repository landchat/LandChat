# LandChat 主题手册

## 简介

### 为什么要用主题

主题能让大家自定义LandChat Web聊天室界面。

### 怎么使用主题

在LandChat Web的URL后加上?theme=xxx/即可。

如：[https://landchat.ericnth.cn/web/?theme=default/](https://landchat.ericnth.cn/web/index.php?theme=default/)

### 要注意什么

仅使用您信任的主题。恶意主题可以轻松盗取您的账号和密码。

## 编写主题

### Javascript部分

#### 文件名称：lc_actions.js

js文件需要被命名为lc_actions.js。

#### 具体内容

lc_actions.js文件应该包含三个函数，分别是`onstartup`，`onload`和`onrefresh`。

onstartup函数会在页面打开前调用。

onload函数会在页面被渲染完成后调用。

onfresh函数会在每次页面刷新完成后被调用。

请一定附带上这些函数，如果不需要，请保留一条return命令。

示例：

```javascript
function onstartup() {
    return;
}
function onload() {
    return;
}
function onrefresh() {
    return;
}
```

### css（样式表）部分

#### 文件名称：lc_style.css

css文件需要被命名为lc_style.css。

#### 具体内容

lc_style.css文件应该包含对资源的定位，以及对资源的美化（可选）。

以下这些不是必选的，仅挑选您需要编辑的元素进行描述即可。

| 元素名称 | class/id | 描述                                                         |
| -------- | -------- | ------------------------------------------------------------ |
| msgbox   | class    | 整个消息显示框（所有消息内容）                               |
| sendbox  | class    | 整个消息发送框（包括消息输入框，发送/更多功能按钮，发送状态显示条等） |
| zw       | class    | 整个功能框（包括LandChat 2020文本，修改聊天室/昵称/密码/头像功能，版本，重新登录，下载记录等等） |
| ibox     | id       | 消息输入框                                                   |
| psend    | id       | “更多功能”按钮                                               |
| msend    | id       | “发送”按钮                                                   |
| prvcr    | id       | 当前聊天室                                                   |
| ccr/crb  | id       | 更改聊天室输入框/确定按钮                                    |
| cnc/cncs | id       | 更改昵称/确定按钮                                            |
| c3/c32   | id       | 更改密码/确定按钮                                            |
| c4/c42   | id       | 更改头像链接/确定按钮                                        |
| rspbox   | id       | 消息发送结果显示                                             |

以上不是全面的。如果需要更多内容，请自行研究html代码。

示例：

```css
.msgbox{
    margin-left:5px;
    position:absolute;
    height:79%;
    top:0%;
    width:79%;
    left:20%;
    border:1px solid #000;
    overflow:auto;
}
.sendbox{
    margin-left:5px;
    position:absolute;
    top:80%;
    height:19%;
    left:20%;
    width:79%;
    border:1px solid #000;
    overflow:auto;
}
.zw{
    margin-left:1px;
    position:absolute;
    left:0%;
    height:99%;
    width:20%;
    top:0%;
    border:1px solid #000;
}
#ibox{
    position:relative;
    height:32px;
    width:98%;
}
#psend{
    position:relative;
    width:15%;
}
#msend{
    position:relative;
    width:15%;
}
```

### 主题开发完之后

您应该立即发送一封邮件给LandChat开发团队（eric_ni2008@icloud.com）。

邮件内容是：您的主题名称，一个包含有css和js文件的zip压缩包，您的其他联系方式。

我们会尽快处理并与您联系，并把主题上传到LandChat服务器供用户使用。您也可以上传到您自己的服务器上。结构是：

```
主题名称
	-lc_actions.js
	-lc_style.css
```

然后主题链接是: https://您的网站/路径/主题名称/

使用时请这样填写：https://landchat.ericnth.cn/web/?theme=https://您的网站/路径/主题名称/

如果主题开发得好，我们会把您的名字写在LandChat鸣谢名单内，甚至用作LandChat默认主题。

## 结束语

以上就是LandChat主题功能的介绍与编写方法的讲解了。

LandChat主题是一项正在开发的新功能，若有缺漏/不足之处，或者又可以拓展的新功能，请一定向我们提出建议。我们会把您的名字写在LandChat鸣谢名单内。

LandChat开发团队邮件：eric_ni2008@icloud.com