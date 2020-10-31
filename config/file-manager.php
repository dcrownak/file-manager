<?php return array (
  'configRepository' => 'Alexusmai\\LaravelFileManager\\Services\\ConfigService\\DefaultConfigRepository',
  'aclRepository' => 'Alexusmai\\LaravelFileManager\\Services\\ACLService\\ConfigACLRepository',
  'routePrefix' => 'file-manager',
  'diskList' => 
  array (
    0 => 'images',
  ),
  'leftDisk' => 'images',
  'rightDisk' => NULL,
  'leftPath' => '',
  'rightPath' => NULL,
  'cache' => NULL,
  'windowsConfig' => 2,
  'maxUploadFileSize' => NULL,
  'allowFileTypes' => 
  array (
    0 => 'jpeg',
    1 => 'jpg',
    2 => 'png',
  ),
  'hiddenFiles' => true,
  'middleware' => 
  array (
    0 => 'web',
  ),
  'acl' => false,
  'aclHideFromFM' => true,
  'aclStrategy' => 'blacklist',
  'aclRulesCache' => NULL,
  'aclRules' => 
  array (
    '' => 
    array (
    ),
    1 => 
    array (
    ),
  ),
);