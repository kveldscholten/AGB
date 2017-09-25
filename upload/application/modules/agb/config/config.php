<?php
/**
 * @copyright Ilch 2.0
 * @package ilch
 */

namespace Modules\Agb\Config;

class Config extends \Ilch\Config\Install
{
    public $config = [
        'key' => 'agb',
        'version' => '1.0',
        'icon_small' => 'fa-paragraph',
        'author' => 'Veldscholten, Kevin',
        'link' => 'http://ilch.de',
        'languages' => [
            'de_DE' => [
                'name' => 'AGB',
                'description' => 'Hier können die ABG`s verwaltet werden.',
            ],
            'en_EN' => [
                'name' => 'AGB',
                'description' => 'Here you can manage your AGBs.',
            ],
        ]
    ];

    public function install()
    {
        $this->db()->queryMulti($this->getInstallSql());
    }

    public function uninstall()
    {
        $this->db()->queryMulti('DROP TABLE `[prefix]_agb`;');
    }

    public function getInstallSql()
    {
        return 'CREATE TABLE IF NOT EXISTS `[prefix]_agb` (
                `id` INT(11) NOT NULL AUTO_INCREMENT,
                `title` VARCHAR(255) NOT NULL,
                `text` MEDIUMTEXT NOT NULL,
                `show` TINYINT(1) NOT NULL,
                `position` INT(11) NOT NULL DEFAULT 0,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;';
    }

    public function getUpdate($installedVersion)
    {

    }
}
