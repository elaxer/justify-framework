<?php
return array(
    'about' => url_render('about', [
        'title' => 'About'
    ]),
    'contacts' => url_render('contacts', [
        'title' => 'Contacts'
    ]),
    'page/([0-9]+)' => 'viewPageItem',
    '' => 'viewMainPage',
);
