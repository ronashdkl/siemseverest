<?php
namespace app\assets;

use yii\web\AssetBundle;

/**
 * Created by PhpStorm.
 * User: Binay
 * Date: 22/11/2017
 * Time: 16:37
 */
class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'bootstrap/css/bootstrap.min.css',
        'fonts/font-awesome.min.css',
        'fonts/ionicons.min.css',
        'dist/css/AdminLTE.min.css',
        'dist/css/skins/_all-skins.min.css',
        'bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css',
        'https://fonts.googleapis.com/css?family=Roboto',
        ];
    public $js = [
        'bootstrap/js/bootstrap.min.js',
        'bower_components/datatables.net/js/jquery.dataTables.min.js',
        'bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js',
        'https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js',
        'https://oss.maxcdn.com/respond/1.4.2/respond.min.js',
        'plugins/fastclick/fastclick.js',
        'dist/js/app.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
