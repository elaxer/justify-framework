<?php
/**
 * Key - URI pattern
 * Value - controller and action
 */
return [
    '/*' => 'index/index',
    'page/([1-9]\d*)' => 'index/pageItem',
    'about' => 'index/about',
    'contacts' => 'index/contacts'
];
