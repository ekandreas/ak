<?php
namespace Deployer;

use Deployer\Task\Context;
use Dotenv\Dotenv;

require_once 'vendor/autoload.php';
require_once __DIR__ . "/vendor/deployer/deployer/recipe/composer.php";

host('akademikliniken.local')
    ->stage('development')
    ->identityFile('~/.ssh/id_rsa');

set('repository', 'git@github.com:ekandreas/akademikliniken.git');

set('env_vars', '/usr/bin/env');
set('keep_releases', 5);
set('shared_dirs', ['web/app/uploads']);
set('shared_files', ['.env']);

include 'config/build/wp-init.php';
