<?php
    namespace Win;

    require_once("WinUtility.php");
    
    use SQLite3;
    /**
     * @brief Win版Chromeユーティリティクラス
     * 
     */
    class ChromeUtility {
        public static function GetUserDataFolderPath() {
            return getenv('LOCALAPPDATA') . "\\Google\\Chrome\\User Data\\";
        }
    }

    /**
     * @brief まだ用途不明
     */
    class ChromeAesGcm {
        public function GetLocalStatePath() {
            return ChromeUtility::GetUserDataFolderPath() . "Local State";
        }
    }

    /**
     * @brief Win版Chromeプロファイルクラス
     */
    class ChromeProfile {
        private $profileName = "Default";
        private $tempCookiesFilePath = "";

        function __construct() {
            $this->tempCookiesFilePath = WinUtility::GetTempFilePath();
            copy($this->GetCookiesFilePath(), $this->tempCookiesFilePath);
        }

        public function GetCookiesFilePath() {
            return ChromeUtility::GetUserDataFolderPath() . $this->profileName . "\\Cookies";
        }

        public function GetTempCookiesFilePath() {
            return $this->tempCookiesFilePath;
        }
    }

    $profile = new ChromeProfile();
    
    // TODO: Cookieを一時ファイルにコピーしてから以下の処理をする。
    // $sqlite = new SQLite3("Cookies");
    // $q = $sqlite->query("SELECT value, name, host_key, path, expires_utc, encrypted_value FROM cookies WHERE host_key LIKE '%youtube.com'");
   
?>