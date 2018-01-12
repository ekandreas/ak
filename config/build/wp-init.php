<?php
namespace Deployer;

use Deployer\Task\Context;
use Dotenv\Dotenv;

task('wp-init', function() {

    $root = realpath(__DIR__.'/../../');
    $dotenv = new Dotenv($root);
    $dotenv->load();

    $db = getenv('DB_NAME');
    $url = getenv('WP_HOME');

    $actions = [
        "mysql -e 'CREATE DATABASE IF NOT EXISTS {$db};'",
        "wp core multisite-install --subdomains --url='akademikliniken.local' --title=\"Akademikliniken\" --admin_user=admin --admin_password=admin --admin_email=\"admin@admin.se\" --skip-email",
        "wp site create --slug=eng --title='Akademikliniken English'",
        "wp search-replace '.local/wp' '.local'",
        "wp theme enable akademikliniken --network",
        "wp theme activate akademikliniken",
        "wp language core activate sv_SE",
    ];

    foreach ($actions as $action) {
        writeln("{$action}");
        writeln(runLocally($action));
    }
});
