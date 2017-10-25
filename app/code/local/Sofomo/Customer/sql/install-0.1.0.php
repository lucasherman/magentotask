<?php
$installer = $this;

$installer->startSetup();

$setup = new Mage_Eav_Model_Entity_Setup('core_setup');

$entityTypeId = $setup->getEntityTypeId('customer');
$attributeSetId = $setup->getDefaultAttributeSetId($entityTypeId);
$attributeGroupId = $setup->getDefaultAttributeGroupId($entityTypeId, $attributeSetId);

$installer->addAttribute("customer", "eligible_for_discount", array(
    "group" => "General Information",
    "type" => "int",
    "input" => "select",
    "global" => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
    'visible'           => true,
    'required'          => false,
    'user_defined'      => false,
    'default'           => 0,
    'source' => 'eav/entity_attribute_source_boolean'

));

$attribute   = Mage::getSingleton("eav/config")->getAttribute("customer", "eligible_for_discount");

$setup->addAttributeToGroup($entityTypeId, $attributeSetId, $attributeGroupId, 'eligible_for_discount', '99999');

$installer->endSetup();