<?php

/**
 * Simple class to access Twoffein API
 * @author Lukas Kolletzki <lukas@kolletzki.info>
 * @version 2013-08-20
 * @copyright (c) 2013, Lukas Kolletzki
 * @license http://www.gnu.org/licenses/ GNU General Public License, version 3 (GPL-3.0)
 */
class Twoffein {

	private static $baseUrl = "https://twoffein.com/api/";
	private $screenName;
	private $apiKey;
	private static $config = ["encode" => "json"];

	public function __construct($pScreenName, $pApiKey) {
		$this->screenName = $pScreenName;
		$this->apiKey = $pApiKey;
	}

	/**
	 * Send GET requests to twoffein
	 * @param string $ressource Ressource you want to access i.E. "drinks"
	 * @param array $params Parameters 
	 */
	public function get($ressource, $params) {
		$query = self::$baseUrl . "get/" . $ressource . "/?" . self::array2query($params) . "screen_name=" . $this->screenName . "&api_key=" . $this->apiKey . "&encode=" . self::$config["encode"];
		return file_get_contents($query);
	}

	/**
	 * Send POST request to Twoffein
	 * @param string $ressource Ressource you want to access i.E. "cookie"
	 * @param type $params Parameters
	 * @return string Result from twoffein, depends on "encode" value in config
	 */
	public function post($ressource, $params) {
		$query = self::$baseUrl . "post/" . $ressource . "/?" . self::array2query($params) . "screen_name=" . $this->screenName . "&api_key=" . $this->apiKey . "&encode=" . self::$config["encode"];
		return file_get_contents($query);
	}

	/**
	 * Converts an array into an HTML GET parameter string
	 * @param array $array input array
	 * @return string output string
	 */
	private static function array2query($array) {
		$string = "";
		foreach ($array as $key => $val) {
			$string .= $key . "=" . urlencode($val) . "&";
		}
		return $string;
	}

	/**
	 * Set a config value
	 * @param string $setting Key of setting
	 * @param mixed $value Value of setting
	 */
	private static function configure($setting, $value) {
		self::$config[$setting] = $value;
	}

}