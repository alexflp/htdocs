<?php
ini_set('date.timezone', 'America/Vancouver');
require_once "../lib/AlphaPay.Api.php";
header("Content-Type:text/html;charset=utf-8");
/**
 * 流程：
 * 1、创建QRCode支付单，取得code_url，生成二维码
 * 2、用户扫描二维码，进行支付
 * 3、支付完成之后，AlphaPay服务器会通知支付成功
 * 4、在支付成功通知中需要查单确认是否真正支付成功（见：notify.php）
 */
//获取扫码
$input = new AlphaPayUnifiedOrder();
$input->setOrderId(AlphaPayConfig::PARTNER_CODE . date("YmdHis"));
$input->setDescription("test");
$input->setPrice("1");
$input->setCurrency("CAD");
$input->setNotifyUrl("https://pay.alphapay.ca//notify_url");
$input->setOperator("123456");
$currency = $input->getCurrency();
if (!empty($currency) && $currency == 'CNY') {
    //建议缓存汇率,每天更新一次,遇节假日或其他无汇率更新情况,可取最近一个工作日的汇率
    $inputRate = new AlphaPayExchangeRate();
    $rate = AlphaPayApi::exchangeRate($inputRate);
    if ($rate['return_code'] == 'SUCCESS') {
        $real_pay_amt = $input->getPrice() / $rate['rate'];
        if ($real_pay_amt < 0.01) {
            echo 'CNY转换CAD后必须大于0.01CAD';
            exit();
        }
    }
}

$result = AlphaPayApi::qrOrder($input);
print_r ($result);
$url2 = $result["code_url"];
print_r($url2);
//跳转
$inputObj = new AlphaPayRedirect();
echo "===================";
print_r($inputObj);
$inputObj->setRedirect(urlencode('http://119.29.230.16/success.php?order_id=' . strval($input->getOrderId())));
?>

<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>AlphaPay支付样例-扫码</title>
    <script>
        function redirect(url) {
            window.location.href = url;
        }
    </script>
</head>
<body>
<div style="margin-left: 10px;color:#556B2F;font-size:30px;font-weight: bolder;">方式一、扫码支付</div>
<br/>

<img alt="扫码支付" src="qrcode.php?data=<?php echo urlencode($url2); ?>" style="width:150px;height:150px;"/>
<?php echo ($url2) ?>
<div style="margin-left: 10px;color:#556B2F;font-size:30px;font-weight: bolder;">方式二、跳转到AlphaPay支付</div>
<br/>
<button onclick="redirect('<?php echo AlphaPayApi::getQRRedirectUrl($result['pay_url'], $inputObj); ?>')">跳转
</button>
</body>
</html>