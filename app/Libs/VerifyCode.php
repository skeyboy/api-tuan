<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 2016/7/20
 * Time: 11:02
 */

namespace App\Libs;

use Cache;
use Illuminate\Http\Request;
class VerifyCode
{
    //资源
    private $img;
    //画布宽度
    private $width=100;
    //画布高度
    private $height=30;
    //背景颜色
    private $bgColor='#ffffff';
    //验证码
    private $code;
    //验证码的随机种子
    private $codeStr='23456789abcdefghjkmnpqrstuvwsyz';
    //验证码长度
    private $codeLen=4;
    //验证码字体
    private $font;
    //验证码字体大小
    private $fontSize=23;
    //验证码字体颜色
    private $fontColor='';
    //随机键
    private $runkey = '';

    public function __construct() {

    }

    //创建验证码
    public function make($key)
    {
        if(empty($this->font))
        {
            $this->font = __DIR__.'/consola.ttf';
        }
        $this->code=Cache::get('captcha:'.$key);
        $this->create();//生成验证码
        header("Content-type:image/png");
        imagepng($this->img);
        imagedestroy($this->img);
        ob_end_flush();
    }

    //生成验证码
    public function createCode() {
        do {
            $seeds = str_shuffle(join('', range('A', 'Z')) . join('', range('a', 'z')) . join('', range(0, 9)));
            $value = substr($seeds, random_int(0, strlen($seeds)-$this->codeLen-1), $this->codeLen);
            $key = md5($seeds);
        } while (Cache::get('captcha:'.$key));
        Cache::put('captcha:'.$key, $value,10);
        $this->code = strtoupper($value);
        return [
            'url'=>config('constants.app_url') .config('constants.api_url_prefix'). '/code?code='.$key,
            'id' => $key
        ];
    }

    public function checkCode($id,$code)
    {
        $cache = Cache::pull('captcha:'.$id);
        if (!$cache) {
            return false;
        }
        if (strtoupper($cache)==strtoupper($code)) {
            return true;
        }
        return false;
    }
    //设置字体文件
    public function font($font)
    {
        $this->font= $font;
        return $this;
    }

    //设置文字大小
    public function fontSize($fontSize)
    {
        $this->fontSize=$fontSize;
        return $this;
    }

    //设置字体颜色
    public function fontColor($fontColor)
    {
        $this->fontColor = $fontColor;
        return $this;
    }

    //验证码数量
    public function num($num)
    {
        $this->codeLen=$num;
        return $this;
    }

    //设置宽度
    public function width($width)
    {
        $this->width = $width;
        return $this;
    }

    //设置高度
    public function height($height)
    {
        $this->height = $height;
        return $this;
    }

    //设置背景颜色
    public function background($color)
    {
        $this->bgColor = $color;
        return $this;
    }

    //返回验证码
    public function get() {
        return Cache::get('VERIFYCODE');
    }


    //建画布
    private function create() {
        if (!$this->checkGD())
            return false;
        $w = $this->width;
        $h = $this->height;
        $bgColor = $this->bgColor;
        $img = imagecreatetruecolor($w, $h);
        $bgColor = imagecolorallocate($img, hexdec(substr($bgColor, 1, 2)), hexdec(substr($bgColor, 3, 2)), hexdec(substr($bgColor, 5, 2)));
        imagefill($img, 0, 0, $bgColor);
        $this->img = $img;
        $this->createLine();
        $this->createFont();
        $this->createPix();
        $this->createRec();
    }

    //画线
    private function createLine(){
        $w = $this->width;
        $h = $this->height;
        $line_color = "#dcdcdc";
        $color = imagecolorallocate($this->img, hexdec(substr($line_color, 1, 2)), hexdec(substr($line_color, 3, 2)), hexdec(substr($line_color, 5, 2)));
        $l = $h/5;
        for($i=1;$i<$l;$i++){
            $step =$i*5;
            imageline($this->img, 0, $step, $w,$step, $color);
        }
        $l= $w/10;
        for($i=1;$i<$l;$i++){
            $step =$i*10;
            imageline($this->img, $step, 0, $step,$h, $color);
        }
    }

    //画矩形边框
    private function createRec() {
        //imagerectangle($this->img, 0, 0, $this->width - 1, $this->height - 1, $this->fontColor);
    }

    //写入验证码文字
    private function createFont() {
        $color = $this->fontColor;
        if (!empty($color)) {
            $fontColor = imagecolorallocate($this->img, hexdec(substr($color, 1, 2)), hexdec(substr($color, 3, 2)), hexdec(substr($color, 5, 2)));
        }
        $x = ($this->width - 10) / $this->codeLen;
        for ($i = 0; $i < $this->codeLen; $i++) {
            if (empty($color)) {
                $fontColor = imagecolorallocate($this->img, mt_rand(50, 155), mt_rand(50, 155), mt_rand(50, 155));
            }
            imagettftext($this->img, $this->fontSize, mt_rand(- 30, 30), $x * $i + mt_rand(6, 10), mt_rand($this->height / 1.3, $this->height - 5), $fontColor, $this->font, $this->code [$i]);
        }
        $this->fontColor = $fontColor;
    }

    //画线
    private function createPix() {
        $pix_color = $this->fontColor;
        for ($i = 0; $i < 50; $i++) {
            imagesetpixel($this->img, mt_rand(0, $this->width), mt_rand(0, $this->height), $pix_color);
        }

        for ($i = 0; $i < 2; $i++) {
            imageline($this->img, mt_rand(0, $this->width), mt_rand(0, $this->height), mt_rand(0, $this->width), mt_rand(0, $this->height), $pix_color);
        }
        //画圆弧
        for ($i = 0; $i < 1; $i++) {
            // 设置画线宽度
            imagearc($this->img, mt_rand(0, $this->width), mt_rand(0, $this->height), mt_rand(0, $this->width), mt_rand(0, $this->height)
                , mt_rand(0, 160), mt_rand(0, 200), $pix_color);
        }
        imagesetthickness($this->img, 1);
    }

    //验证GD库
    private function checkGD() {
        return extension_loaded('gd') && function_exists("imagepng");
    }

}
