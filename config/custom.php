<?php

return [

    'campaign' => [
        'rate_per_person' => 2590,
        'breakfast_rate_per_person' => 1500,
    ],

    'default_pages' => [
        ['name' => 'Home Page', 'link' => '/'],
        ['name' => 'Maintenance Page', 'link' => 'maintenance'],
        ['name' => 'Subscription Page', 'link' => 'subscription'],
        ['name' => 'Subscription Cron Job', 'link' => 'subscription/cron-job'],
        ['name' => 'Demo Preview Page', 'link' => 'temporary-preview'],
    ],


    'not_allowed_prefix' => [
        'admin/',
        'unsubscribe/'
    ],

    'months' => [
        '1' => 'January',
        '2' => 'February',
        '3' => 'March',
        '4' => 'April',
        '5' => 'May',
        '6' => 'June',
        '7' => 'July',
        '8' => 'August',
        '9' => 'September',
        '10' => 'October',
        '11' => 'November',
        '12' => 'December',
    ],

    'other_activities' => [
        1 => 'Cycling / Mountain biking',
        2 => 'Golf',
        3 => 'Archery',
        4 => 'Rafting'
    ],

    'accommodation' => [
        1 => 'Standard',
        2 => 'Luxury',
        3 => 'Mixed'
    ],

    'open_link_type' => [
        0 => 'Open in same browser tab',
        1 => 'Open in new browser tab',
        2 => 'Open in new browser window'
    ],


    'open_link_type_new' => [
        '_self' => 'Open in same browser tab',
        '_blank' => 'Open in new browser tab',
        '_top' => 'Open in new browser window'
    ],

    'quick_link_group' => [
        1 => 'Our Accommodations',
        2 => 'About Us'
    ],

    //unsplash
    'unsplash'    =>  [
        'page' => 3,
        'per_page' => 15,
        'orientation' => 'landscape',
        'applicationId' => '47b54496c4f827e5c71c1adc66828c953762808bf1ca095b4895a3a948fda04b',
        'secret' => 'd239b401dd64f709f0ff38349f399e02e73cbd899373d1c243d72ff7bc82a591',
        'callbackUrl' => 'urn:ietf:wg:oauth:2.0:oob',
        'utmSource' => 'rhb'
    ],

    'images_resize' => [
        1   => '76',
        2   => '142',
        3   => '150',
        4   => '300',
        5   => '320',
        6   => '640',
        7   => '768',
        8   => '1024',
        9   => '1280',
        10  => '1366',
        11  => '1500',
        12  => '1600',
        13  => '1920'
    ],

    'image_preview' => '320',

    'hotel_class' => [
        0 => '5 Star Hotel',
        1 => '4 Star Hotel',
        2 => '3 Star Hotel',
        3 => '2 Star Hotel',
        4 => '1 Star Hotel',
        5 => 'Lodge'
    ],

    'how_did_you_find_us' => [
        0 => 'Google',
        1 => 'Facebook',
        2 => 'Instagram',
        3 => 'Friend'
    ],

    'fcm' => 'AAAAgUfcs6Y:APA91bGkj-rIQFYXLUlpea5e29BScbkwreyHweOgGeXgQMckAssHeccM3bIsErv06WogDnutLMBMwI1mC92fKbOO7usXffJq3vdEF_2lIj9PZkIvwZ6gBcX8x58TFAv8fxKfpYvpexv7',

    'bg_colors' => [],

    'btn_colors' => [],

    'title_colors' => [],

    'description_colors' => [],


    'slider_text_colors' => [
        'slider-text-white',
        'slider-text-dark'
    ],

    'slider_overlay_colors' => [
        'slider-overlay-white',
        'slider-overlay-dark'
    ],

    /*'bg_colors' => [
        'bg-purple',
        'bg-blue',
        'bg-green',
        'bg-red',
        'bg-yellow',
        'bg-white',
        'bg-dark'
    ],

    'btn_colors' => [
        'btn-link-purple',
        'btn-link-blue',
        'btn-link-green',
        'btn-link-red',
        'btn-link-yellow',
        'btn-link-white',
        'btn-link-dark'
    ],

    'title_colors' => [
        'title-purple',
        'title-blue',
        'title-green',
        'title-red',
        'title-yellow',
        'title-white',
        'title-dark'
    ],

    'description_colors' => [
        'description-purple',
        'description-blue',
        'description-green',
        'description-red',
        'description-yellow',
        'description-white',
        'description-dark'
    ],*/

    'icons' => [
        'no-icon'                   => '<strong>NO ICON</strong>'
    ],

    'custom_icons' => [
        'thundericon-custom-pin'        => '<span class="thundericon-custom icon-pin uk-margin-small-right"></span>',
        'thundericon-custom-signpost'   => '<span class="thundericon-custom icon-signpost uk-margin-small-right"></span>',
        'thundericon-custom-page'       => '<span class="thundericon-custom icon-page uk-margin-small-right"></span>'
    ],

    'uikit_icons' => [
        'thundericon-home'              => 'icon: home;',
        'thundericon-code'              => 'icon: code;',
        'thundericon-link'              => 'icon: link;',
        'thundericon-sign-in'           => 'icon: sign-in;',
        'thundericon-paint-bucket'      => 'icon: paint-bucket;',
        'thundericon-question'          => 'icon: question;',
        'thundericon-sign-out'          => 'icon: sign-out;',
        'thundericon-camera'            => 'icon: camera;',
        'thundericon-info'              => 'icon: info;',
        'thundericon-user'              => 'icon: user;',
        'thundericon-video-camera'      => 'icon: video-camera;',
        'thundericon-warning'           => 'icon: warning;',
        'thundericon-users'             => 'icon: users;',
        'thundericon-bell'              => 'icon: bell;',
        'thundericon-image'             => 'icon: image;',
        'thundericon-lock'              => 'icon: lock;',
        'thundericon-microphone'        => 'icon: microphone;',
        'thundericon-thumbnails'        => 'icon: thumbnails;',
        'thundericon-unlock'            => 'icon: unlock;',
        'thundericon-bolt'              => 'icon: bolt;',
        'thundericon-table'             => 'icon: table;',
        'thundericon-settings'          => 'icon: settings;',
        'thundericon-star'              => 'icon: star;',
        'thundericon-list'              => 'icon: list;',
        'thundericon-cog'               => 'icon: cog;',
        'thundericon-heart'             => 'icon: heart;',
        'thundericon-menu'              => 'icon: menu;',
        'thundericon-nut'               => 'icon: nut;',
        'thundericon-happy'             => 'icon: happy;',
        'thundericon-grid'              => 'icon: grid;',
        'thundericon-comment'           => 'icon: comment;',
        'thundericon-lifesaver'         => 'icon: lifesaver;',
        'thundericon-home'              => 'icon: home;',
        'thundericon-lifesaver'         => 'icon: lifesaver;',
        'thundericon-more'              => 'icon: more;',
        'thundericon-commenting'        => 'icon: commenting;',
        'thundericon-rss'               => 'icon: rss;',
        'thundericon-more-vertical'     => 'icon: more-vertical;',
        'thundericon-comments'          => 'icon: comments;',
        'thundericon-social'            => 'icon: social;',
        'thundericon-plus'              => 'icon: plus;',
        'thundericon-hashtag'           => 'icon: hashtag;',
        'thundericon-git-branch'        => 'icon: git-branch;',
        'thundericon-plus-circle'       => 'icon: plus-circle;',
        'thundericon-tag'               => 'icon: tag;',
        'thundericon-git-fork'          => 'icon: git-fork;',
        'thundericon-minus'             => 'icon: minus;',
        'thundericon-world'             => 'icon: world;',
        'thundericon-minus-circle'      => 'icon: minus-circle;',
        'thundericon-credit-card'       => 'icon: credit-card;',
        'thundericon-calendar'          => 'icon: calendar;',
        'thundericon-close'             => 'icon: close;',
        'thundericon-mail'              => 'icon: mail;',
        'thundericon-clock'             => 'icon: clock;',
        'thundericon-check'             => 'icon: check;',
        'thundericon-receiver'          => 'icon: receiver;',
        'thundericon-history'           => 'icon: history;',
        'thundericon-ban'               => 'icon: ban;',
        'thundericon-print'             => 'icon: print;',
        'thundericon-future'            => 'icon: future;',
        'thundericon-refresh'           => 'icon: refresh;',
        'thundericon-search'            => 'icon: search;',
        'thundericon-pencil'            => 'icon: pencil;',
        'thundericon-play'              => 'icon: play;',
        'thundericon-location'          => 'icon: location;',
        'thundericon-trash'             => 'icon: trash;',
        'thundericon-play-circle'       => 'icon: play-circle;',
        'thundericon-bookmark'          => 'icon: bookmark;',
        'thundericon-move'              => 'icon: move;',
        'thundericon-tv'                => 'icon: tv;',
        'thundericon-tablet'            => 'icon: tablet;',
        'thundericon-tablet-landscape'  => 'icon: tablet-landscape;',
        'thundericon-desktop'           => 'icon: desktop;',
        'thundericon-phone'             => 'icon: phone;',
        'thundericon-phone-landscape'   => 'icon: phone-landscape;',
        'thundericon-laptop'            => 'icon: laptop;',
        'thundericon-file'              => 'icon: file;',
        'thundericon-folder'            => 'icon: folder;',
        'thundericon-database'          => 'icon: database;',
        'thundericon-file-text'         => 'icon: file-text;',
        'thundericon-album'             => 'icon: album;',
        'thundericon-cloud-upload'      => 'icon: cloud-upload;',
        'thundericon-file-pdf'          => 'icon: file-pdf;',
        'thundericon-push'              => 'icon: push;',
        'thundericon-cloud-download'    => 'icon: cloud-download;',
        'thundericon-copy'              => 'icon: copy;',
        'thundericon-pull'              => 'icon: pull;',
        'thundericon-download'          => 'icon: download;',
        'thundericon-file-edit'         => 'icon: file-edit;',
        'thundericon-server'            => 'icon: server;',
        'thundericon-upload'            => 'icon: upload;',
        'thundericon-reply'             => 'icon: reply;',
        'thundericon-arrow-left'        => 'icon: arrow-left;',
        'thundericon-forward'           => 'icon: forward;',
        'thundericon-arrow-right'       => 'icon: arrow-right;',
        'thundericon-expand'            => 'icon: expand;',
        'thundericon-chevron-up'        => 'icon: chevron-up;',
        'thundericon-triangle-up'       => 'icon: triangle-up;',
        'thundericon-shrink'            => 'icon: shrink;',
        'thundericon-chevron-down'      => 'icon: chevron-down;',
        'thundericon-triangle-down'     => 'icon: triangle-down;',
        'thundericon-arrow-up'          => 'icon: arrow-up;',
        'thundericon-chevron-left'      => 'icon: chevron-left;',
        'thundericon-triangle-left'     => 'icon: triangle-left;',
        'thundericon-arrow-down'        => 'icon: arrow-down;',
        'thundericon-chevron-right'     => 'icon: chevron-right;',
        'thundericon-triangle-right'    => 'icon: triangle-right;',
        'thundericon-bold'              => 'icon: bold;',
        'thundericon-strikethrough'     => 'icon: strikethrough;',
        'thundericon-quote-right'       => 'icon: quote-right;',
        'thundericon-italic'            => 'icon: italic;',
        'thundericon-chevron-double-left'   => 'icon: chevron-double-left;',
        'thundericon-chevron-double-right'  => 'icon: chevron-double-right;'
    ],

    'social_media_icons' => [
        'thundericon-facebook'      => 'icon: facebook;',
        'thundericon-twitter'       => 'icon: twitter;',
        'thundericon-instagram'     => 'icon: instagram;',
        'thundericon-google'        => 'icon: google;',
        'thundericon-tumblr'        => 'icon: tumblr;',
        'thundericon-google-plus'   => 'icon: google-plus;',
        'thundericon-linkedin'      => 'icon: linkedin;',
        'thundericon-reddit'        => 'icon: reddit;',
        'thundericon-youtube'       => 'icon: youtube;',
        'thundericon-tripadvisor'   => 'icon: tripadvisor;'
    ],

    'hbl' => [
        'merchant_id' => '9103331682',
        'access_token' => [
            'USD' => '61f31228e5f04a37a05e4ae23a696a6a',
            'NPR' => 'bd3489a6b39c43fab752d048498cbeb8'
        ]
    ],

    'hbl_hotel' => [
        'merchant_id' => '9102637741',
        'access_token' => [
            'USD' => 'be9b3d1cf2ab4f3ea0b24643226f2ce4',
            'NPR' => 'fc14692f245b4f78b185db4d01f673ee'
        ]
    ],

    'nabil' => [
        'url' => 'https://api.compassplus.com:11611/Exec',
        'merchant_id' => '600000001066900',
        // 'merchant_id' => 'NABIL106756',
        'decryption_key' => '0123456789abcdef',
        'certificate_path' => 'app/private/nabil_key/eoeverestsummit.com.crt',
        'key_path' => 'app/private/nabil_key/eoeverestsummit.com.key',
        'nabil_password' => ''
    ]
];
