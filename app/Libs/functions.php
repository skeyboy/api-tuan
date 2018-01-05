<?php
/*
 * 千万要注意,这个文件的内容一定要和 website 中的 function 文件一致,否则系统就会混乱!!!
 */

//定义常量
/*
 * 以下是 redis 用到的前缀
 */
//热标的集合前缀
const REDIS_borrowSidList = "redis:borrowSidList:";
//标的详情前缀
const REDIS_borrowDetail = "redis:borrowDetail:";
//标的成功投标用户列表
const REDIS_investMemberSuccessList = "redis:investMemberSuccessList:";
//投标用户detail
const REDIS_investMember = "redis:investMember:";
//投标用户详情JSON数据
const REDIS_borrowInvestor = 'redis:borrowInvestor:';
//投标用户的key
const REDIS_borrowInvestorKey = 'redis:borrowInvestor:Key:';
//投标钱多多返回notify数据
const REDIS_borrowQddInvestNotify = 'redis:borrowQddInvestNotify:';
//用户两分钟投标的份数
const REDIS_borrowMemberInvestNum = 'redis:borrowMemberInvestNum:';


//投标支持人数
const CACHE_borrowInfoPopulation = 'cache:borrowInfoPopulation:';
//标的详情
const CACHE_borrowDetail = 'cache:borrowDetail:';
//标的描述
const CACHE_borrowInfoDesc = 'cache:borrowInfoDesc:';
//二手车的参数描述
const CACHE_borrowInfoCarDesc  = 'cache:borrowInfoCarDesc:';
//投票数据
const CACHE_borrowInfoVote = 'cache:borrowInfoVote:';
//标的列表
const CACHE_borrowInfoList = 'cache:borrowList:type:';
//众筹完成用时
const CACHE_borrowInfoEndTime = 'cache:borrowInfoEndTime:';
//众筹投资记录
const CACHE_borrowInvestorList = 'cache:borrowInvestorList:';
//详情页评论记录
const CACHE_borrowCommentList = 'cache:borrowCommentList:';

//广告
const CACHE_ad = 'cache:ad:';
//公告
const CACHE_article = 'cache:article:';


//redis作为缓存的key键在此定义
//用户可用余额
const REDIS_CACHE_USER_BALANCE = "redis:cache:user:balance:";
//用户hash
const REDIS_CACHE_USER = "redis:cache:user:";
//个人中心
const REDIS_CACHE_PROFILE = 'redis:cache:account:';
/**
 * 数据格式化
 * @param $str
 * @return int|string
 */
function FormatUserName($str)
{
    $len = mb_strlen($str);
    if($len >= 2){
        $string = mb_substr($str,0,1).str_repeat('*', 3).mb_substr($str,-1);
    }else{
        $string = mb_substr($str,0,1).str_repeat('*', 4);
    }
    return $string;
}

//获取真实IP, 如果有负载均衡需要用这个
function getRealIp()
{
    //HTTP_ALI_CDN_REAL_IP 还有这个没加上
    $ip = '';
    //HTTP_X_FORWARDED_FOR 只要是HTTP开头的,在Header返回的,都会被伪造
//    if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && ('' !== trim($_SERVER['HTTP_X_FORWARDED_FOR'])))
//        $ip = trim($_SERVER['HTTP_X_FORWARDED_FOR']);
//    else if (isset($_SERVER['HTTP_CLIENT_IP']) && ('' !== trim($_SERVER['HTTP_CLIENT_IP'])))
//        $ip = trim($_SERVER['HTTP_CLIENT_IP']);
//    if (isset($_SERVER['REMOTE_ADDR']) && ('' !== trim($_SERVER['REMOTE_ADDR'])))
//        $ip = trim($_SERVER['REMOTE_ADDR']);
//    else if (getenv("HTTP_X_FORWARDED_FOR"))
//        $ip = getenv("HTTP_X_FORWARDED_FOR");
//    else if (getenv("HTTP_CLIENT_IP"))
//        $ip = getenv("HTTP_CLIENT_IP");
//    else if (getenv("REMOTE_ADDR"))
//        $ip = getenv("REMOTE_ADDR");

    //以下代码不能使用CDN,直接A记录解析到 SLB 有效, SLB 是4层TCP转发的
    if (isset($_SERVER['REMOTE_ADDR']) && ('' !== trim($_SERVER['REMOTE_ADDR'])))
        $ip = trim($_SERVER['REMOTE_ADDR']);
    else
        $ip = "Unknown";
    return $ip;
}


/**
 * Created by PhpStorm.
 * User: hanyun
 * Date: 2016/8/4
 * Time: 18:33
 */
function changeKey($key)
{
    $keys = explode('_', $key);
    $res = '';
    if (count($keys) > 1) {
        foreach ($keys as $key => $v) {
            if ($key > 0) {
                $res .= ucfirst($v);
            } else {
                $res .= $v;
            }
        }
    } else {
        return $key;
    }
    return $res;
}

function delNull($data)
{
    if (is_array($data)) {
        foreach ($data as $key => $v) {
            $data[$key] = delNull($v);
        }
        return $data;
    } else {
        return is_null($data) ? "" : $data;
    }
}

function changeArrayKey($arr)
{
    $tmp = [];
    if (empty($arr)||is_null($arr)||!is_array($arr)) {
        return $tmp;
    }
    foreach ($arr as $key => $v) {
        if (is_int($key)) {
            if (is_array($v)) {
                $tmp[changeKey($key)] = changeArrayKey(delNull($v));
            } else {
                $tmp[changeKey($key)] = delNull($v);
            }
        } else {
            if (is_array($v)) {
                $tmp[changeKey($key)] = changeArrayKey(delNull($v));
            } else {
                $tmp[changeKey($key)] = delNull($v);
            }
        }
    }
    return $tmp;
}

function checkUid($uid){
    $str = \Illuminate\Support\Facades\Redis::get('out_money_investor_7254');
    /*$str = '
    14263,13283,16593,16601,11002,4979,9245,9317,10794,12276,12963,15580,9623,6969,13419,14544,12976,14958,11512,12767,10597,15534,17333,11690,17390,13753,14873,1562,15466,17315,14864,12619,15869,13771,12266,9428,11132,12514,17252,17691,12130,10127,12417';*/
    //$str = config('constants.invest_7254');
    $arr = explode(',', $str);
    return in_array($uid, $arr);
}
