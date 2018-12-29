<?php

// $zm = new TestZhimaAuthInfoAuthorize();
// $data = $zm->test();
// header("Location:".$data['url'].'&params='.$data['urlparams']);
// exit;

class TestZhimaAuthInfoAuthorize {
    //芝麻信用网关地址
    public $gatewayUrl = "https://zmopenapi.zmxy.com.cn/openapi.do";
    //商户私钥文件
    public $privateKeyFile = "./Public/api/rsa_private_key.pem";
    //芝麻公钥文件
    public $zmPublicKeyFile = "./Public/api/zima_public_key.pem";
    //数据编码格式
    public $charset = "UTF-8";
    //芝麻分配给商户的 appId
    // public $appId = "1003540";
    public $appId = "";
    // 
    // 身份证号
    public $certNo = '';
    // 姓名
    public $certName = '';

    public function test(){
         $client = new ZmopClient($this->gatewayUrl,$this->appId,$this->charset,$this->privateKeyFile,$this->zmPublicKeyFile);
         $request = new ZhimaAuthInfoAuthorizeRequest();
         $request->setChannel("apppc");
         $request->setPlatform("zmop");
         $request->setIdentityType("2");// 必要参数 
         $request->setIdentityParam("{\"name\":\"$this->certName\",\"certType\":\"IDENTITY_CARD\",\"certNo\":\"$this->certNo\"}");// 必要参数 
         $request->setBizParams("{\"auth_code\":\"M_H5\",\"channelType\":\"app\",\"state\":\"商户自定义\"}");// 
         $url = $client->generatePageRedirectInvokeUrl($request);
         $params = $client->generateEncryptedParam($request);

         $urlparams = $client->generateEncryptedParamWithUrlEncode($request);
         // echo $url;
         // echo '<hr>';
         // echo $params;
         // echo '<hr>';

         // echo $urlparams;

         // echo '<hr>';

         return ['url'=>$url,'urlparams'=>$urlparams];
    }


    public function zhimaDecode($params,$sign){

    	$params = strstr ( $params, '%' ) ? urldecode ( $params ) : $params;
    	$sign = strstr ( $sign, '%' ) ? urldecode ( $sign ) : $sign;

    	$client = new ZmopClient($this->gatewayUrl,$this->appId,$this->charset,$this->privateKeyFile,$this->zmPublicKeyFile);


    	$result = $client->decryptAndVerifySign ( $params, $sign );
    	return $result;
    }

    public function getScore($openid){
    	$client = new ZmopClient($this->gatewayUrl,$this->appId,$this->charset,$this->privateKeyFile,$this->zmPublicKeyFile);
    	date_default_timezone_set('PRC');
	
		$transactionId =date('Y',time()).date('m',time()).date('d',time()).date('h',time()).date('i',time()).date('ss',time()). mt_rand(1111111,9999999) . mt_rand(1111111,9999999);
    	$request = new ZhimaCreditScoreGetRequest($transactionId);
         $request->setChannel("apppc");
         $request->setPlatform("zmop");
         $request->setTransactionId($transactionId);// 必要参数 
         $request->setProductCode("w1010100100000000001");// 必要参数 
         $request->setOpenId($openid);// 必要参数 
         $response = $client->execute($request);
         return json_encode($response);
    }

}



class ZhimaCreditScoreGetRequest
{
	/** 
	 * 芝麻会员在商户端的身份标识。
	 **/
	private $openId;
	
	/** 
	 * 产品码
	 **/
	private $productCode;
	
	/** 
	 * 商户传入的业务流水号。此字段由商户生成，需确保唯一性，用于定位每一次请求，后续按此流水进行对帐。生成规则: 固定30位数字串，前17位为精确到毫秒的时间yyyyMMddhhmmssSSS，后13位为自增数字。
	 **/
	private $transactionId;

	private $apiParas = array();
	private $fileParas = array();
	private $apiVersion="1.0";
	private $scene;
	private $channel;
	private $platform;
	private $extParams;

	
	public function setOpenId($openId)
	{
		$this->openId = $openId;
		$this->apiParas["open_id"] = $openId;
	}

	public function getOpenId()
	{
		return $this->openId;
	}

	public function setProductCode($productCode)
	{
		$this->productCode = $productCode;
		$this->apiParas["product_code"] = $productCode;
	}

	public function getProductCode()
	{
		return $this->productCode;
	}

	public function setTransactionId($transactionId)
	{
		$this->transactionId = $transactionId;
		$this->apiParas["transaction_id"] = $transactionId;
	}

	public function getTransactionId()
	{
		return $this->transactionId;
	}

	public function getApiMethodName()
	{
		return "zhima.credit.score.get";
	}

	public function setScene($scene)
	{
		$this->scene=$scene;
	}

	public function getScene()
	{
		return $this->scene;
	}
	
	public function setChannel($channel)
	{
		$this->channel=$channel;
	}

	public function getChannel()
	{
		return $this->channel;
	}
	
	public function setPlatform($platform)
	{
		$this->platform=$platform;
	}

	public function getPlatform()
	{
		return $this->platform;
	}

	public function setExtParams($extParams)
	{
		$this->extParams=$extParams;
	}

	public function getExtParams()
	{
		return $this->extParams;
	}	

	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function getFileParas()
	{
		return $this->fileParas;
	}

	public function setApiVersion($apiVersion)
	{
		$this->apiVersion=$apiVersion;
	}

	public function getApiVersion()
	{
		return $this->apiVersion;
	}

}


class ZmopClient {
	//应用ID
	public $appId;
	//私钥文件路径，绝对路径或者相对路径
	public $privateKeyFilePath;

	//芝麻公钥文件路径，绝对路径或者相对路径
	public $zhiMaPublicKeyFilePath;
	//网关
	public $gatewayUrl;
	//返回数据格式
	public $format = "json";
	//api版本
	public $apiVersion = "1.0";

	// 表单提交字符集编码
	public $charset = "UTF-8";

	//签名类型
	protected $signType = "RSA";

	//参数
	private $signParam = 'sign';
	private $bizParam = "params";

	function __construct($gatewayUrl = '', $appId = '', $charset = 'UTF-8', $privateKeyFilePath, $zhiMaPublicKeyFilePath){
		$this -> gatewayUrl = $gatewayUrl;
		$this -> appId = $appId;
		$this -> privateKeyFilePath = $privateKeyFilePath;
        $this->  zhiMaPublicKeyFilePath = $zhiMaPublicKeyFilePath;
		$this -> charset = $charset;
	}

	/**
	 * 执行请求
	 * @param $request 请求对象
	 * @param $filePath 要上传文件的绝对路径
	 * @return bool|mixed
	 * @throws Exception
	 */
	public function execute($request) {
		$apiParamsQuery = $this->getBizParamStr($request);
		$sysParams = $this->getSystemParams($request);
		$sysParams[$this->signParam] = RSAUtil::sign($apiParamsQuery, $this->privateKeyFilePath);


		//加密,只对业务参数进行加密
		$encryptedApiParams[$this->bizParam] = RSAUtil::rsaEncrypt($apiParamsQuery, $this->zhiMaPublicKeyFilePath);

		//如果是文件上传，那么需要把文件参数也放到POST数组里面
		$files = $request->getFileParas();
		if($files != null){
			foreach ($files as $k => $v) {
				$encryptedApiParams [$k] = WebUtil::getFilePath ($v);
			}
		}

		//系统参数放入GET请求串
		$requestUrl = $this->gatewayUrl . "?";
		$requestUrl .= WebUtil::buildQueryWithEncode($sysParams);

		//发起HTTP请求
		try {
			$resp = WebUtil::curl($requestUrl, $encryptedApiParams ,$this->charset);
		} catch (Exception $e) {
			$this->logCommunicationError($sysParams["method"], $requestUrl, "HTTP_ERROR_" . $e->getCode(), $e->getMessage());
			return false;
		}

		//解析ZMOP返回结果
		$respWellFormed = false;
		if ("json" == $this->format) {
			$respObject = json_decode($resp);
			$biz_response = $this->get_biz_response($respObject);
			$encrypted = $respObject->encrypted;
			if($encrypted){
				$biz_response = RSAUtil::rsaDecrypt($biz_response, $this->privateKeyFilePath);
			}
			$bizRespObject = json_decode($biz_response);
			if (null !== $respObject) {
				$respWellFormed = true;
			}
		}

		//返回的HTTP文本不是标准JSON，记下错误日志
		if (false === $respWellFormed) {
			$this->logCommunicationError($sysParams["method"], $requestUrl, "HTTP_RESPONSE_NOT_WELL_FORMED", $resp);
			return false;
		}

        if(isset($respObject->biz_response_sign)){
            $bizResponseSign = $respObject->biz_response_sign;
            $verifyResult = RSAUtil::verify($biz_response, $bizResponseSign, $this->zhiMaPublicKeyFilePath);
            if($verifyResult == false){
                throw new Exception("验签失败:".$resp);
            }
        }

		// //如果ZMOP返回了错误码，记录到业务错误日志中
		// if (isset ($bizRespObject->error_code)) {
		// 	$logger = new LtLogger;
		// 	$logger->conf["log_file"] = rtrim(ZMOP_SDK_WORK_DIR, '\\/') . '/' . "logs/zmop_biz_err_" . $this->appId . "_" . date("Y-m-d") . ".log";
		// 	$logger->log(array(
		// 			date("Y-m-d H:i:s"),
		// 			$resp
		// 		));
		// }
		return $bizRespObject;
	}

	/**
	 * 对于page_redirect类型的接口调用,生成用来调用这种类型接口的url,便于在浏览器中使用
	 * @param $request 接口请求
	 * @return string 用于在浏览器中访问的url
	 */
	public function generatePageRedirectInvokeUrl($request){
		$apiParamsQuery = $this->getBizParamStr($request);
		$systemParams = $this->getSystemParams($request);
		$systemParams[$this->signParam] = RSAUtil::sign($apiParamsQuery, $this->privateKeyFilePath);
		$systemQueryParams = WebUtil::buildQueryWithEncode($systemParams);

		$url = $this->gatewayUrl;
		$url .= ('?' . $systemQueryParams);


		$bizParam =  RSAUtil::rsaEncrypt($apiParamsQuery, $this->zhiMaPublicKeyFilePath);
		$url .= ('&'. $this->bizParam .'='.urlencode($bizParam));
		return $url;
	}

	/**
	 * 1. 先解密，再验签
	 * 2. 如果验签成功，然后返回解密后的值
	 * 3. 如果验签失败，抛出异常
	 * @param $encryptedResponse 加密后的返回值
	 * @param $sign 签名(对未加密的返回值的签名)
	 * @return string 解密后的明文
	 * @throws Exception
	 */
	public function decryptAndVerifySign($encryptedResponse, $sign){
		$decryptedResponse = RSAUtil::rsaDecrypt($encryptedResponse, $this->privateKeyFilePath);
		$success = RSAUtil::verify($decryptedResponse, $sign, $this->zhiMaPublicKeyFilePath);
		if($success){
			return $decryptedResponse;
		}else{
			throw new Exception("验签失败:".$decryptedResponse);
		}
	}

	/**
	 * 为业务参数生成签名
	 * @param $request
	 * @return string
	 */
	public function generateSign($request){
		$paramStr = $this->getBizParamStr($request);
		return RSAUtil::sign($paramStr, $this->privateKeyFilePath);
	}

	/**
	 * 为业务参数生成签名并进行UrlEncode
	 * @param $request
	 * @return string
	 */
	public function generateSignWithUrlEncode($request){
		$paramStr = generateSign($request);
		return urlencode($paramStr);
	}

	/**
	 * 为业务参数加密
	 * @param $request
	 * @return string
	 */
	public function generateEncryptedParam($request){
		$paramStr = $this->getBizParamStr($request);
		return RSAUtil::rsaEncrypt($paramStr, $this->zhiMaPublicKeyFilePath);
	}

	/**
	 * 为业务参数加密
	 * @param $request
	 * @return string
	 */
	public function generateEncryptedParamWithUrlEncode($request){
		$paramStr = $this->generateEncryptedParam($request);
		return urlencode($paramStr);
	}

	/**
	 * 从总的返回值中获取业务返回值
	 * @param $obj
	 * @return null
	 */
	private function get_biz_response($obj){
		$attrArray = get_object_vars($obj);
		foreach ($attrArray as $paraKey => $paraValue) {
			//如果属性名以_reponse结尾，该属性对应的值为业务返回值
			if(strrchr($paraKey, "_response") == "_response"){
				return $paraValue;
			}
		}
		return NULL;
	}

	private function getBizParamStr($request){
		$apiParams = $request->getApiParas();
		$apiParamsQuery = WebUtil::buildQueryWithEncode($apiParams);
		return $apiParamsQuery;
	}

	private function getSystemParams($request){
		if (WebUtil::checkEmpty($this->charset)) {
			$this->charset = "UTF-8";
		}

		$iv=null;
		if(!WebUtil::checkEmpty($request->getApiVersion())){
			$iv=$request->getApiVersion();
		}else{
			$iv=$this->apiVersion;
		}

		//组装系统参数
		$sysParams["app_id"] = $this->appId;
		$sysParams["version"] = $iv;
		$sysParams["method"] = $request->getApiMethodName();
		$sysParams["charset"] = $this->charset;
		$sysParams["scene"] = $request->getScene();
		$sysParams["channel"] = $request->getChannel();
		$sysParams["platform"] = $request->getPlatform();
		$sysParams["ext_params"] = $request->getExtParams();
		return $sysParams;
	}

	/**
	 * 记录错误日志
	 * @param $apiName
	 * @param $requestUrl
	 * @param $errorCode
	 * @param $responseTxt
	 */
	private function logCommunicationError($apiName, $requestUrl, $errorCode, $responseTxt) {
		$localIp = isset ($_SERVER["SERVER_ADDR"]) ? $_SERVER["SERVER_ADDR"] : "CLI";
		$logger = new LtLogger;
		$logger->conf["log_file"] = rtrim(ZMOP_SDK_WORK_DIR, '\\/') . '/' . "logs/zmop_comm_err_" . $this->appId . "_" . date("Y-m-d") . ".log";
		$logger->conf["separator"] = "^_^";
		$logData = array(
			date("Y-m-d H:i:s"),
			$apiName,
			$this->appId,
			$localIp,
			PHP_OS,
			$requestUrl,
			$errorCode,
			str_replace("\n", "", $responseTxt)
		);
		$logger->log($logData);
	}
}



class WebUtil{

    /**
     * 将传入的参数组织成key1=value1&key2=value2形式的字符串
     * @param $params
     * @return string
     */
    public static function buildQueryWithoutEncode($params) {
       return WebUtil::buildQuery($params, false);
    }

    public static function buildQueryWithEncode($params){
        return WebUtil::buildQuery($params, true);
    }

    public static function buildQuery($params, $needEncode){
        ksort($params);
        $stringToBeSigned = "";
        $i = 0;
        foreach ($params as $k => $v) {
            if (false === WebUtil::checkEmpty($v)) {
                if($needEncode){
                    $v = urlencode($v);
                }

                if ($i == 0) {
                    $stringToBeSigned .= "$k" . "=" . "$v";
                } else {
                    $stringToBeSigned .= "&" . "$k" . "=" . "$v";
                }
                $i++;
            }
        }
        unset ($k, $v);
        return $stringToBeSigned;
    }

    /**
     *  校验$value是否非空
     *  if not set ,return true;
     *  if is null , return true;
     * @param $value
     * @return bool
     */
    public static function checkEmpty($value) {
        if (!isset($value))
            return true;
        if ($value === null)
            return true;
        if (trim($value) === "")
            return true;

        return false;
    }

    /**
     * 向服务器发起post请求
     * @param $url 服务器地址
     * @param null $postFields 请求参数
     * @param $charset 字符集
     * @return mixed 服务器返回的值
     * @throws Exception post异常
     */
    public static function curl($url, $postFields = null, $charset) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FAILONERROR, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //$headers = array('content-type: application/x-www-form-urlencoded;charset=' . $charset);
        //curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            throw new Exception(curl_error($ch), 0);
        } else {
            $httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if (200 !== $httpStatusCode) {
                throw new Exception($response, $httpStatusCode);
            }
        }
        curl_close($ch);
        return $response;
    }
	
	/**
     * post文件上传路径处理
     * php5.5+使用CURLFile，否则拼@
     *
     * @param $filePath 上传文件本地路径
     * @return mixed
     */
    public static function getFilePath($filePath) {
        if (class_exists ( 'CURLFile' )) {
            return new CURLFile ( $filePath );
        } else {
            return "@" . $filePath;
        }
    }
}



class RSAUtil{

    /**
     * 加签
     * @param $data 要加签的数据
     * @param $privateKeyFilePath 私钥文件路径
     * @return string 签名
     */
    public static function sign($data, $privateKeyFilePath) {
        $priKey = file_get_contents($privateKeyFilePath);
        $res = openssl_get_privatekey($priKey);
        openssl_sign($data, $sign, $res);
        openssl_free_key($res);
        $sign = base64_encode($sign);
        return $sign;
    }

    /**
     * 验签
     * @param $data 用来加签的数据
     * @param $sign 加签后的结果
     * @param $rsaPublicKeyFilePath 公钥文件路径
     * @return bool 验签是否成功
     */
    public static function verify($data, $sign, $rsaPublicKeyFilePath) {
        //读取公钥文件
        $pubKey = file_get_contents($rsaPublicKeyFilePath);

        //转换为openssl格式密钥
        $res = openssl_get_publickey($pubKey);

        //调用openssl内置方法验签，返回bool值
        $result = (bool)openssl_verify($data, base64_decode($sign), $res);

        //释放资源
        openssl_free_key($res);

        return $result;
    }


    /**
     * rsa加密
     * @param $data 要加密的数据
     * @param $pubKeyFilePath 公钥文件路径
     * @return string 加密后的密文
     */
    public static function rsaEncrypt($data, $pubKeyFilePath){
        //读取公钥文件
        $pubKey = file_get_contents($pubKeyFilePath);
        //转换为openssl格式密钥
        $res = openssl_get_publickey($pubKey);

        $maxlength = RSAUtil::getMaxEncryptBlockSize($res);
        $output='';
        while($data){
            $input= substr($data,0,$maxlength);
            $data=substr($data,$maxlength);
            openssl_public_encrypt($input,$encrypted,$pubKey);
            $output.= $encrypted;
        }
        $encryptedData =  base64_encode($output);
        return $encryptedData;
    }

    /**
     * 解密
     * @param $data 要解密的数据
     * @param $privateKeyFilePath 私钥文件路径
     * @return string 解密后的明文
     */
    public static function rsaDecrypt($data, $privateKeyFilePath){
        //读取私钥文件
        $priKey = file_get_contents($privateKeyFilePath);
        //转换为openssl格式密钥
        $res = openssl_get_privatekey($priKey);
        $data = base64_decode($data);
        $maxlength = RSAUtil::getMaxDecryptBlockSize($res);
        $output='';
        while($data){
            $input = substr($data,0,$maxlength);
            $data = substr($data,$maxlength);
            openssl_private_decrypt($input,$out,$res);
            $output.=$out;
        }
        return $output;
    }

    /**
     *根据key的内容获取最大加密lock的大小，兼容各种长度的rsa keysize（比如1024,2048）
     * 对于1024长度的RSA Key，返回值为117
     * @param $keyRes
     * @return float
     */
    public static function getMaxEncryptBlockSize($keyRes){
        $keyDetail = openssl_pkey_get_details($keyRes);
        $modulusSize = $keyDetail['bits'];
        return $modulusSize/8 - 11;
    }

    /**
     * 根据key的内容获取最大解密block的大小，兼容各种长度的rsa keysize（比如1024,2048）
     * 对于1024长度的RSA Key，返回值为128
     * @param $keyRes
     * @return float
     */
    public static function getMaxDecryptBlockSize($keyRes){
        $keyDetail = openssl_pkey_get_details($keyRes);
        $modulusSize = $keyDetail['bits'];
        return $modulusSize/8;
    }
}



class ZhimaAuthInfoAuthorizeRequest
{
	/** 
	 * 业务扩展字段,页面授权接口需要传入auth_code,channelType,state
auth_code授权码,值取决于授权方式和身份类型
PC方式,身份类型identity_type=1:
{"auth_code":"M_MOBILE_APPPC"}
PC方式,身份类型identity_type=2:
{"auth_code":"M_APPPC_CERT"}
H5方式(身份类型identity_type为任何值):
{"auth_code":"M_H5"}
SDK方式(身份类型identity_type为任何值):
{"auth_code":"M_APPSDK"}
channelType渠道类型,每个授权码支持不同的渠道类型
appsdk:sdk接入
apppc:商户pc页面接入
api:后台api接入
windows:支付宝服务窗接入
app:商户app接入
state是商户自定义的数据,页面授权接口会原样把这个数据返回个商户
	 **/
	private $bizParams;
	
	/** 
	 * 不同身份类型传入的参数列表,json字符串的key-value格式

身份类型identityType=1:
{"mobileNo":"15158657683"}

身份类型identityType=2:
{"certNo":"330100xxxxxxxxxxxx","name":"张三","certType":"IDENTITY_CARD"}
	 **/
	private $identityParam;
	
	/** 
	 * 身份标识类型
<p>1:按照手机号进行授权</p>
2:按照身份证+姓名进行授权
	 **/
	private $identityType;

	private $apiParas = array();
	private $fileParas = array();
	private $apiVersion="1.0";
	private $scene;
	private $channel;
	private $platform;
	private $extParams;

	
	public function setBizParams($bizParams)
	{
		$this->bizParams = $bizParams;
		$this->apiParas["biz_params"] = $bizParams;
	}

	public function getBizParams()
	{
		return $this->bizParams;
	}

	public function setIdentityParam($identityParam)
	{
		$this->identityParam = $identityParam;
		$this->apiParas["identity_param"] = $identityParam;
	}

	public function getIdentityParam()
	{
		return $this->identityParam;
	}

	public function setIdentityType($identityType)
	{
		$this->identityType = $identityType;
		$this->apiParas["identity_type"] = $identityType;
	}

	public function getIdentityType()
	{
		return $this->identityType;
	}

	public function getApiMethodName()
	{
		return "zhima.auth.info.authorize";
	}

	public function setScene($scene)
	{
		$this->scene=$scene;
	}

	public function getScene()
	{
		return $this->scene;
	}
	
	public function setChannel($channel)
	{
		$this->channel=$channel;
	}

	public function getChannel()
	{
		return $this->channel;
	}
	
	public function setPlatform($platform)
	{
		$this->platform=$platform;
	}

	public function getPlatform()
	{
		return $this->platform;
	}

	public function setExtParams($extParams)
	{
		$this->extParams=$extParams;
	}

	public function getExtParams()
	{
		return $this->extParams;
	}	

	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function getFileParas()
	{
		return $this->fileParas;
	}

	public function setApiVersion($apiVersion)
	{
		$this->apiVersion=$apiVersion;
	}

	public function getApiVersion()
	{
		return $this->apiVersion;
	}

}