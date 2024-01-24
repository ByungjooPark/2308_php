<?php

namespace App\Http\Utils;

use Illuminate\Support\Str;

class EncrypUtil {
	/**
	 * base64 URL 인코드
	 * 
	 * @param string $str JSON
	 * @return string base64_url_encode 문자열
	 */
	public static function base64UrlEncode(string $str) {
		return rtrim(strtr(base64_encode($str), '+/', '-_'), '=');
	}

	/**
	 * base64 URL 디코드
	 * 
	 * @param string $str base64 url encode
	 * @return string json
	 */
	public static function base64UrlDecode(string $str) {
		return base64_decode(strtr($str, '-_', '+/'));
	}

	/**
	 * 암호화한 문자열 리턴
	 * 
	 * @param 	string $alg 알고리즘명
	 * @param	string $str 암호화 할 문자열
	 * @param	int $saltLength 솔트 문자열 길이
	 * @return 	string 암호화 된 문자열
	 */
	public static function hashWithSalt(string $alg, string $str, int $saltLength = 0) {
		$salt = EncrypUtil::getSalt($saltLength);

		return hash($alg, $str).$salt;
	}

	/**
	 * 특정 길이 만큼의 랜덤한 문자열 리턴
	 * 
	 * @param	int $length 솔트 문자열 길이
	 * @return 	string 랜덤 문자열
	 */
	public static function getSalt(int $length) {
		return Str::random($length);
	}
}