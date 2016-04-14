<?php
/**
 * A very flexible, full and easy jpaddress solution for FuelPHP
 *
 * @package		Jpaddress
 * @version		1.0
 * @author		Sotaro OMURA (omoon)
 * @license		MIT License
 * @copyright	2012 omoon
 * @link		http://omoon.org
 */

namespace Jpaddress;

class Jpaddress
{

public static function before()
    {
        echo "Jpaddress";
    }
    /**
     * 都道府県コードから都道府県名を取得
	 *
	 * @param  num    $kencd 都道府県コード
     *
	 * @return string 都道府県名
	 */
    public static function getKenName($kencd)
    {
        return static::kenList($kencd, 0);
    }

    /**
     * 都道府県コードから短い都道府県名（末尾の都道府県を除いたもの）を取得
	 *
	 * @param  num    $kencd 都道府県コード
     *
	 * @return string 短い都道府県名
	 */
    public static function getShortKenName($kencd)
    {
        return static::kenListShort($kencd, 0);
    }

    /**
     * 住所から都道府県コードを取得
	 *
	 * @param  string $jusho 住所
     *
	 * @return num 都道府県コード
	 */
    public static function getKencdByJusho($jusho)
    {
        $kens = static::kenList(0, 1);
        foreach($kens as $kencd => $ken) {
            if (preg_match("/^($ken)(.*)$/u", $jusho, $match)) {
                return $kencd;
            }
        }
        return '';
    }

    /**
     * 郵便番号から住所を取得。Google API を利用
	 *
	 * @param  string $zip 郵便番号
     *
	 * @return string 住所
	 */
    public static function getJushoByZip($zip)
    {
        if (preg_match("/(\d{3})\-?(\d{4})/", $zip, $match)) {
            $zip = sprintf("%s-%s", $match[1], $match[2]); 
        } else {
            return '';
        }
        return static::getJushoFromGoogle($zip);

    }

    /**
     * 郵便番号から都道府県コードと都道府県を除いた住所の配列を取得
	 *
	 * @param  string $zip 郵便番号
     *
	 * @return array 都道府県コード、住所
	 */
    public static function getKencdAndJushoByZip($zip)
    {
        $return = array('kencd' => '', 'jusho' => '');

        $jusho = static::getJushoByZip($zip);
        $kencd = static::getKencdByJusho($jusho);
        $jusho = preg_replace("/^" . static::getKenName($kencd) . "/", "", $jusho);
        $return['jusho'] = $jusho;
        $return['kencd'] = $kencd;

        return $return;
    }

    /**
     * 郵便番号から住所を取得。Google API を利用
	 *
	 * @param  string $zip 郵便番号
     *
	 * @return string 住所
	 */
    public static function getJushoFromGoogle($zip)
    {
        $ret = json_decode(file_get_contents("http://www.google.com/transliterate?langpair=ja-Hira|ja&text=" . $zip));
        if ($ret[0][1][1] == $zip) {
            return $ret[0][1][0];
        }
        return '';
    }


    public static function kenList($num=0, $flag=0)
    {
        $kens = array(
            0  => '不明',
            1  => '北海道',
            2  => '青森県',
            3  => '岩手県',
            4  => '宮城県',
            5  => '秋田県',
            6  => '山形県',
            7  => '福島県',
            8  => '茨城県',
            9  => '栃木県',
            10 => '群馬県',
            11 => '埼玉県',
            12 => '千葉県',
            13 => '東京都',
            14 => '神奈川県',
            15 => '新潟県',
            16 => '富山県',
            17 => '石川県',
            18 => '福井県',
            19 => '山梨県',
            20 => '長野県',
            21 => '岐阜県',
            22 => '静岡県',
            23 => '愛知県',
            24 => '三重県',
            25 => '滋賀県',
            26 => '京都府',
            27 => '大阪府',
            28 => '兵庫県',
            29 => '奈良県',
            30 => '和歌山県',
            31 => '鳥取県',
            32 => '島根県',
            33 => '岡山県',
            34 => '広島県',
            35 => '山口県',
            36 => '徳島県',
            37 => '香川県',
            38 => '愛媛県',
            39 => '高知県',
            40 => '福岡県',
            41 => '佐賀県',
            42 => '長崎県',
            43 => '熊本県',
            44 => '大分県',
            45 => '宮崎県',
            46 => '鹿児島県',
            47 => '沖縄県',
            99 => '海外',
        );
        if($flag==1){
            return $kens;
        }else{
            return $kens[$num];
        }
    }


    static function kenListShort($num=0, $flag=0)
    {
        $kens = array(
            0  => '不明',
            1  => '北海道',
            2  => '青森',
            3  => '岩手',
            4  => '宮城',
            5  => '秋田',
            6  => '山形',
            7  => '福島',
            8  => '茨城',
            9  => '栃木',
            10 => '群馬',
            11 => '埼玉',
            12 => '千葉',
            13 => '東京',
            14 => '神奈川',
            15 => '新潟',
            16 => '富山',
            17 => '石川',
            18 => '福井',
            19 => '山梨',
            20 => '長野',
            21 => '岐阜',
            22 => '静岡',
            23 => '愛知',
            24 => '三重',
            25 => '滋賀',
            26 => '京都',
            27 => '大阪',
            28 => '兵庫',
            29 => '奈良',
            30 => '和歌山',
            31 => '鳥取',
            32 => '島根',
            33 => '岡山',
            34 => '広島',
            35 => '山口',
            36 => '徳島',
            37 => '香川',
            38 => '愛媛',
            39 => '高知',
            40 => '福岡',
            41 => '佐賀',
            42 => '長崎',
            43 => '熊本',
            44 => '大分',
            45 => '宮崎',
            46 => '鹿児島',
            47 => '沖縄',
            99 => '海外',
        );
        if($flag==1){
            return $kens;
        }else{
            return $kens[$num];
        }
    }

}
