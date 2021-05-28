<?php
declare(strict_types=1);

/** @var Mage_Sales_Model_Resource_Setup $installer */
$installer = $this;
$installer->startSetup();

$installer->getConnection()->addColumn($installer->getTable('flagbit_faq/faq'), 'meta_title', 'VARCHAR(255) AFTER meta_description');

$installer->endSetup();