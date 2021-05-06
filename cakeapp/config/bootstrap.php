<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.8
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

/*
 * Configure paths required to find CakePHP + general filepath constants
 */
require __DIR__ . '/paths.php';

/*
 * Bootstrap CakePHP.
 *
 * Does the various bits of setup that CakePHP needs to do.
 * This includes:
 *
 * - Registering the CakePHP autoloader.
 * - Setting the default application paths.
 */
require CORE_PATH . 'config' . DS . 'bootstrap.php';

use Cake\Cache\Cache;
use Cake\Console\ConsoleErrorHandler;
use Cake\Core\Configure;
use Cake\Core\Configure\Engine\PhpConfig;
use Cake\Database\Type;
use Cake\Datasource\ConnectionManager;
use Cake\Error\ErrorHandler;
use Cake\Http\ServerRequest;
use Cake\Log\Log;
use Cake\Mailer\Email;
use Cake\Mailer\TransportFactory;
use Cake\Utility\Inflector;
use Cake\Utility\Security;

/*
 * Uncomment block of code below if you want to use `.env` file during development.
 * You should copy `config/.env.example` to `config/.env` and set/modify the
 * variables as required.
 *
 * It is HIGHLY discouraged to use a .env file in production, due to security risks
 * and decreased performance on each request. The purpose of the .env file is to emulate
 * the presence of the environment variables like they would be present in production.
 */
// if (!env('APP_NAME') && file_exists(CONFIG . '.env')) {
//     $dotenv = new \josegonzalez\Dotenv\Loader([CONFIG . '.env']);
//     $dotenv->parse()
//         ->putenv()
//         ->toEnv()
//         ->toServer();
// }

/*
 * Read configuration file and inject configuration into various
 * CakePHP classes.
 *
 * By default there is only one configuration file. It is often a good
 * idea to create multiple configuration files, and separate the configuration
 * that changes from configuration that does not. This makes deployment simpler.
 */

try {
    Configure::config('default', new PhpConfig());
    Configure::load('app', 'default', false);
} catch (\Exception $e) {
    exit($e->getMessage() . "\n");
}

/*
 * Load an environment local configuration file to provide overrides to your configuration.
 * Notice: For security reasons app_local.php will not be included in your git repo.
 */
if (file_exists(CONFIG . 'app_local.php')) {
    Configure::load('app_local', 'default');
}

/*
 * When debug = true the metadata cache should only last
 * for a short time.
 */
if (Configure::read('debug')) {
    Configure::write('Cache._cake_model_.duration', '+2 minutes');
    Configure::write('Cache._cake_core_.duration', '+2 minutes');
    // disable router cache during development
    Configure::write('Cache._cake_routes_.duration', '+2 seconds');
}

/*
 * Set the default server timezone. Using UTC makes time calculations / conversions easier.
 * Check http://php.net/manual/en/timezones.php for list of valid timezone strings.
 */
date_default_timezone_set('Asia/Tokyo');

/*
 * Configure the mbstring extension to use the correct encoding.
 */
mb_internal_encoding(Configure::read('App.encoding'));

/*
 * Set the default locale. This controls how dates, number and currency is
 * formatted and sets the default language to use for translations.
 */
ini_set('intl.default_locale', Configure::read('App.defaultLocale'));

/*
 * Register application error and exception handlers.
 */
$isCli = PHP_SAPI === 'cli';
if ($isCli) {
    (new ConsoleErrorHandler(Configure::read('Error')))->register();
} else {
    (new ErrorHandler(Configure::read('Error')))->register();
}

/*
 * Include the CLI bootstrap overrides.
 */
if ($isCli) {
    require __DIR__ . '/bootstrap_cli.php';
}

/*
 * Set the full base URL.
 * This URL is used as the base of all absolute links.
 *
 * If you define fullBaseUrl in your config file you can remove this.
 */
if (!Configure::read('App.fullBaseUrl')) {
    $s = null;
    if (env('HTTPS')) {
        $s = 's';
    }

    $httpHost = env('HTTP_HOST');
    if (isset($httpHost)) {
        Configure::write('App.fullBaseUrl', 'http' . $s . '://' . $httpHost);
    }
    unset($httpHost, $s);
}

Cache::setConfig(Configure::consume('Cache'));
ConnectionManager::setConfig(Configure::consume('Datasources'));
TransportFactory::setConfig(Configure::consume('EmailTransport'));
Email::setConfig(Configure::consume('Email'));
Log::setConfig(Configure::consume('Log'));
Security::setSalt(Configure::consume('Security.salt'));

/*
 * The default crypto extension in 3.0 is OpenSSL.
 * If you are migrating from 2.x uncomment this code to
 * use a more compatible Mcrypt based implementation
 */
//Security::engine(new \Cake\Utility\Crypto\Mcrypt());

/*
 * Setup detectors for mobile and tablet.
 */
ServerRequest::addDetector('mobile', function ($request) {
    $detector = new \Detection\MobileDetect();

    return $detector->isMobile();
});
ServerRequest::addDetector('tablet', function ($request) {
    $detector = new \Detection\MobileDetect();

    return $detector->isTablet();
});

/*
 * Enable immutable time objects in the ORM.
 *
 * You can enable default locale format parsing by adding calls
 * to `useLocaleParser()`. This enables the automatic conversion of
 * locale specific date formats. For details see
 * @link https://book.cakephp.org/3/en/core-libraries/internationalization-and-localization.html#parsing-localized-datetime-data
 */
Type::build('time')
    ->useImmutable();
Type::build('date')
    ->useImmutable();
Type::build('datetime')
    ->useImmutable();
Type::build('timestamp')
    ->useImmutable();

/*
 * Custom Inflector rules, can be set to correctly pluralize or singularize
 * table, model, controller names or whatever other string is passed to the
 * inflection functions.
 */
//Inflector::rules('plural', ['/^(inflect)or$/i' => '\1ables']);
//Inflector::rules('irregular', ['red' => 'redlings']);
//Inflector::rules('uninflected', ['dontinflectme']);
//Inflector::rules('transliteration', ['/å/' => 'aa']);

// 業種の配列
Configure::write("array_job", ["1" => "不動産業", "2" => "飲食業"]);

//管理者用メールアドレス
define("D_ADMIN_MAIL", "info@coa-bridge.jp");
//トップページURL
define("D_HOME_URL", "http://dev123.tank.jp");
define("D_SIGN", "
【発行元】
Bridge（ブリッジ）
公式ホームページ http://dev123.tank.jp
");

//お問い合わせフォームリンク
define("D_LINK_QUESTION", "/login/question/");
//パスワード再設定
define("D_LINK_REPASSWORD", "/login/password/");

Configure::write('array_prefecture', [
    '1' => '北海道',
    '2' => '青森県',
    '3' => '岩手県',
    '4' => '宮城県',
    '5' => '秋田県',
    '6' => '山形県',
    '7' => '福島県',
    '8' => '茨城県',
    '9' => '栃木県',
    '10' => '群馬県',
    '11' => '埼玉県',
    '12' => '千葉県',
    '13' => '東京都',
    '14' => '神奈川県',
    '15' => '新潟県',
    '16' => '富山県',
    '17' => '石川県',
    '18' => '福井県',
    '19' => '山梨県',
    '20' => '長野県',
    '21' => '岐阜県',
    '22' => '静岡県',
    '23' => '愛知県',
    '24' => '三重県',
    '25' => '滋賀県',
    '26' => '京都府',
    '27' => '大阪府',
    '28' => '兵庫県',
    '29' => '奈良県',
    '30' => '和歌山県',
    '31' => '鳥取県',
    '32' => '島根県',
    '33' => '岡山県',
    '34' => '広島県',
    '35' => '山口県',
    '36' => '徳島県',
    '37' => '香川県',
    '38' => '愛媛県',
    '39' => '高知県',
    '40' => '福岡県',
    '41' => '佐賀県',
    '42' => '長崎県',
    '43' => '熊本県',
    '44' => '大分県',
    '45' => '宮崎県',
    '46' => '鹿児島県',
    '47' => '沖縄県'
]);

Configure::write("array_status", [
    "0" => "非公開",
    "1" => "交渉中",
    "2" => "公開中",
    "3" => "交渉中止",
    "4" => "交渉成立",
    "5" => "下書き",
    ]);
Configure::write("array_build_status", [
    "0" => "未設定",
    "1" => "交渉中",
    "2" => "マッチング中",
    ]);
Configure::write("array_shop", [
        1=>"ビルイン型店舗",
        2=>"路面店",
        3=>"商業施設型",
        4=>"ロードサイド型店舗",
    ]);
Configure::write("array_agreement", [
        1=>"専属専任媒介契約",
        2=>"専任媒介契約",
        3=>"一般媒介契約",
    ]);
Configure::write("array_build", [
        1=>"アパート",
        2=>"マンション",
        3=>"店舗",
    ]);
Configure::write("array_constract", [
        1=>"木造",
        2=>"軽量鉄骨造",
        3=>"重量鉄骨造",
    ]);
Configure::write("array_floor", [
        1=>"建物",
        2=>"土地"
    ]);

Configure::write("array_rent_money",[
    10000=>"10,000",
    30000=>"30,000",
    50000=>"50,000",
    100000=>"100,000",
    200000=>"200,000",
    300000=>"300,000",
    400000=>"400,000",
    500000=>"500,000",
    700000=>"700,000",
    900000=>"900,000",
    1000000=>"1,000,000",
    1500000=>"1,500,000",
    2000000=>"2,000,000",
]);
Configure::write("array_space_money",[
    1000=>"1,000",
    3000=>"3,000",
    5000=>"5,000",
    8000=>"8,000",
    10000=>"10,000",
    20000=>"20,000",
    30000=>"30,000",
    40000=>"40,000",
    50000=>"50,000",
    60000=>"60,000",
    70000=>"70,000",
    80000=>"80,000",
]);


Configure::write("array_job", [
    1=>"農林・水産業",
    2=>"林業",
    3=>"漁業",
    4=>"鉱業",
    5=>"建設業",
    6=>"製造業",
    7=>"電気・ガス",
    8=>"運輸・通信業",
    9=>"卸売・小売・飲食業",
    10=>"金融・保険業",
    11=>"不動産業",
    12=>"サービス業"
]);
Configure::write("array_sub", [
        1=>"サブ1",
        2=>"サブ2",
        3=>"サブ3",
        4=>"サブ4",
        5=>"サブ5",
    ]);
Configure::write("array_open",[
    1=>"公開",
    0=>"下書き"
]);
Configure::write("array_comment_status",[
    1=>"admin",
    2=>"user",
]);
Configure::write("array_code",[
    1=>"build",
    2=>"tenant",
]);
Configure::write("array_read",[
    1=>"既読",
    0=>"未読",
]);
Configure::write("array_response",[
    0=>"未設定",
    1=>"交渉中",
    2=>"交渉成立",
    3=>"交渉中止",
]);
Configure::write("array_job_type", [
    1=>[
        1=>'その他1',
        2=>'その他2',
        3=>'その他3',
        4=>'その他4',
        5=>'その他5',

        ],
    2=>[
        21=>'その他21',
        22=>'その他22',
        23=>'その他23',
        24=>'その他24',
        25=>'その他25',
        26=>'その他26',
        27=>'その他27',

        ],
]);
