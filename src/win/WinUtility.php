<?php
    namespace Win;

    /**
     * @brief Win用ユーティリティクラス
     */
    class WinUtility {
        /**
         * @brief 一時ファイル用のファイル名を取得する
         * @todo ランダムなファイル名になるように処理を変更する
         */
        public static function GetTempFilePath() {
            return getenv("TEMP") . "\\temp.cookies";
        }
    }
?>