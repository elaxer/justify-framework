<?php

use justify\framework\modules\Render;

return array(
    '^about$' => Render::urlRender('about', [
        'title' => 'About'
    ]),

    '^contacts$' => Render::urlRender('contacts', [
        'title' => 'Contacts'
    ]),

    '^page/([0-9]+)$' => 'viewPageItem',
    
    '^/*$' => 'viewMainPage'
);
