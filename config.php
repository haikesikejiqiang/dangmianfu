<?php
/*
 * @Author: yumusb
 * @Date: 2019-08-19 17:35:15
 * @LastEditors: yumusb
 * @LastEditTime: 2019-08-19 17:50:00
 * @Description: 
 */

header("Content-type: text/html; charset=utf-8");
function exitt($a = "错误", $b = "../")
{

	echo "<script>alert('{$a}');window.location.href='{$b}'</script>";
	exit();
}
const NeedTakeNote = 'no';
//需要记录,则改为 yes
//不需要 值为 no
//如果需要记录 需要正确的数据库配置


$http_type = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://';
$url = dirname($http_type . $_SERVER['SERVER_NAME'] . $_SERVER["REQUEST_URI"]) . "/notify.php";

//echo "{$url}?check"; //访问这个输出的url检测回调可用性
$alipay_config = array(
	//签名方式,默认为RSA2(RSA2048)
	'sign_type' => "RSA2",

	//支付宝公钥
	'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAlR5axuRi6zP+64Znt0JAuEloMzpqpJ7RMzqVT06MbqI82Thd1FTpPp6xMnoCunQnzeCv9bZ1XQ4keVOA7ZzdouCLcvEWmiKYKu4gye7SUOJcW6Pd3kU24mr3LFcIVg3yVT0imDpz26s5jzuWTEw3diQ0uK/QlBMG8pfDaMGAOEusMFOi6b0XCfE0CHYkwtkZ/4lafiYy8Cpjxbn2Cjdw9j4wXPE3fKx65uUlAocBIx+n3nzF/lpr1FgRHi1wCI6QcAvZSwnRYBQ+IwMnT1/tGSW+R4qp5Txhlbh9Boi3fUTljwyT1jMEUmHF7FbE1TGPYbOMCeItJILl7DSdqUu3WQIDAQAB",

	//商户私钥
	'merchant_private_key' => "MIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQC5aKsuFxk/feCpGZ1oWUhSVY0StOmPEZ2a4cxBgrZqDcouOGpn7XzSqFRELBNgQJ+kNisRJUigqZiqCl09OyQWjAv7ko2ajqH/jxMyNFMgFmN9N14664iFLWCHG8iR63q9e4/3m2DGibk3GLOJ6cOOC81wrKGsDCIwt61MhPeYTLGSeVYoF6C2YC1XV3T5Jz/XeLfgBYSucP15SqKCzOiboKIxeitiQbQKc2Wn1Eh+JNGDP1T7FENJ9MUDwcBy9kYbVPGlAHTizw40N7LXT+dkvT8p0cpiGIod9GXgwBKLC8Tf9oOAav+W5n2sTixsRe+3HggRdbK1nzWi5mQgyjlvAgMBAAECggEAOzLFPTEY2aHaYoOQM6oWIlu4cFmdHRYVyUcBDYWrso72l+1hZA96xFQEm8Oq6BeaITc+ZvoNh2a/HMO0Y4GHkz9h8BAp8EhMRymqimQUinE7kNZl2tArRcJoSJtBXf3esbNLE1bj/mAo6AOWB5nA25C/JpOoByPUotNynLTzzQdbLyfXok/0KIFmzVRNl5cDcRp98Em/34TVB0ytIE9WP2XJZ9fHgCPBIYZUlyoB4if6FjBbGvx9WRlZFabukrnaLcTd/ntYPbfahg1/bnuEFY8b0CyznKBv5P0TNVMloInhCH8cv1fv+uL70wKZ34OeTZ0k+Z6RBlMD9xTALhpVOQKBgQD76z2hgmh1EnBJ4ZjsUpFvIRWTNkGWS+XPbU/JluoyAMrxmxNOUx7/sWTj4H3TRmvjurERiAGD7IL+8cluJHbBpbBobq2LnXm7/Hojeo2JZN8GD4MS4CYKQcKxUfJCR3C327UgXTEM1oKG/tfrqxtHV4EMlW1QQcO1X06dFMfvfQKBgQC8aZjfFezygE3ng0MBn53XK7B2cGQTEmnY6FhouNbHNbgJXPjsTcu9njLUK3RxeNWXLPsIrCBJYjtRMnnaqR+m0VZWi9Ypq7UpIvRQcTcly3d8+Xb1Js1WgODx9Mu/HZmjDUhPDkXoyGeAtz56kmOu89+mwOeNa5lPhZyn4EP4WwKBgQDZbG/V3IqxOEfHzDjDBoRVCJXpZ3N1922R+ENbtq/MlliR7AjemejwQDfWYWPXnDjz5KZ8fgjoxpFM3nu+XyRL/+fgSl3oWPK/J6p2wogz4+aFAZBcEy9hvN3/Ur2nLKeBV9Pc6fGypdUkFAFhel1h1okfxjwBf7Ec8fQUqOHitQKBgQCeqzMBU/6abjCtMh6AxIHxTaqq45VzdkNLVsf1UQwW8YdN400B+7YDtrFJelryoHcHe+rgb8w04JPhmmeCHIE6Q/q4ocS2jRLgVL547A8sNgAncBKc+5NbMOe++4+GIBBdfvcRFI0NL4/ylt737EYkdN45GSUnNKEElhnKSpQTFwKBgA9hRKqgOpqbzaH7531iJH49Q/qQh+XQM2GtfMgJHhiURPAoTDP18jqlcKwKImg6PKgTmJa8bTOIIix7KXVDEWOAEnW1X1pfxjbS8brUeVKSBmsbAJTgd4Tfn+Iy3wOGoj3D5ipFL5BKUYH1d6+rkkyTPvdgYY17WOIrfrKbPupQ",

	//编码格式
	'charset' => "UTF-8",

	//支付宝网关
	'gatewayUrl' => "https://openapi.alipay.com/gateway.do",

	//应用ID
	'app_id' => "2019083066755097",
	//最大查询重试次数
	'MaxQueryRetry' => "10",
	'notify_url' => $url,

	//查询间隔
	'QueryDuration' => "3"
);

if ($alipay_config['alipay_public_key'] == '' || $alipay_config['merchant_private_key'] == '' || $alipay_config['app_id'] == '') {
	exit("alipay_public_key/merchant_private_key/app_id must not be null");
}
/* 创建订单表。直接复制以下内容，然后选中数据库 执行就可成功创建
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `f2f_order` (
  `id` varchar(50) NOT NULL COMMENT '订单号',
  `mark` VARCHAR(50) NOT NULL COMMENT '备注',
  `mount` varchar(20) NOT NULL COMMENT '订单金额',
  `notify_time` varchar(20) NOT NULL COMMENT '订单验证时间',
  `trade_no` varchar(30) NOT NULL COMMENT '支付宝订单号',
  `buyer_logon_id` varchar(30) NOT NULL COMMENT '付款账号',
  `status` varchar(10) NOT NULL COMMENT '订单状态'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `f2f_order`
  ADD PRIMARY KEY (`id`);
COMMIT;
*/
// $database=array(
// 	'dbname'=>'f2f',
// 	'host'=>'localhost',
// 	'port'=>3306,
// 	'user'=>'root',
// 	'pass'=>'root',
// );
//数据库配置信息。
if (NeedTakeNote == "yes") {
	$database = array(
		'dbname' => 'f2f',
		'host' => 'localhost',
		'port' => 3306,
		'user' => 'root',
		'pass' => 'root',
	);

	try {
		$db = new PDO("mysql:dbname=" . $database['dbname'] . ";host=" . $database['host'] . ";" . "port=" . $database['port'] . ";", $database['user'], $database['pass'], array(PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8"));
	} catch (PDOException $e) {
		die("数据库出错，请检查 config.php中的database配置项.<br> " . $e->getMessage() . "<br/>");
	}

	$table = 'f2f_order'; //表名字
}
