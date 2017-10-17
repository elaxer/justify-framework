<?php
return array(
    '^about$' => 'about',

    '^contacts$' => 'contacts',

    '^page/([0-9]+)$' => 'viewPageItem',
    
    '^/*$' => 'viewMainPage'
);
