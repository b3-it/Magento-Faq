<?php
declare(strict_types=1);

/** @var Mage_Sales_Model_Resource_Setup $installer */
$installer = $this;
$installer->startSetup();

$installer->getConnection()->addColumn($installer->getTable('flagbit_faq/faq'), 'url_key', 'VARCHAR(255)');

$installer->endSetup();