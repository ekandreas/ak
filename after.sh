#!/bin/sh

# If you would like to do some extra provisioning you may
# add any commands you wish to this file and they will
# be run after the Homestead machine is provisioned.

curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
sudo chmod +x wp-cli.phar
sudo mv wp-cli.phar /usr/local/bin/wp

curl -LO https://deployer.org/deployer.phar
sudo mv deployer.phar /usr/local/bin/dep
sudo chmod +x /usr/local/bin/dep

if ! grep -q "rewrite for bedrock" "/etc/nginx/sites-available/akademikliniken.local"; then
    echo "Adding rewrite rules for akademikliniken.local in nginx!"
    sudo sed -i '/sendfile off;/r /home/vagrant/code/config/rewrite.config' /etc/nginx/sites-available/akademikliniken.local
    sudo sed 's/server_name .akademikliniken.local/server_name _/g' /etc/nginx/sites-available/akademikliniken.local
fi

cd /home/vagrant/code && dep wp-init development
