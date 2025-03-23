<?php session_start();

/**
*  This is free and unencumbered software released into the public domain.
*
*  Anyone is free to copy, modify, publish, use, compile, sell, or
*  distribute this software, either in source code form or as a compiled
*  binary, for any purpose, commercial or non-commercial, and by any
*  means.
*
*  In jurisdictions that recognize copyright laws, the author or authors
*  of this software dedicate any and all copyright interest in the
*  software to the public domain. We make this dedication for the benefit
*  of the public at large and to the detriment of our heirs and
*  successors. We intend this dedication to be an overt act of
*  relinquishment in perpetuity of all present and future rights to this
*  software under copyright law.
*
*  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
*  EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
*  MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
*  IN NO EVENT SHALL THE AUTHORS BE LIABLE FOR ANY CLAIM, DAMAGES OR
*  OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE,
*  ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
*  OTHER DEALINGS IN THE SOFTWARE.
*
*  For more information, please refer to https://unlicense.org/
*/

$coordarray = isset( $_SESSION['coords'] ) ? $_SESSION['coords'] : [];
$_SESSION['temporary'] = [];
$mapdisplay       = '+ map';
$uidisplay        = '+ ui';
$resourcesdisplay = '+ res';
if( $_SESSION['map_display'] !== false )
    $mapdisplay = '- map';
if( $_SESSION['show_ui'] !== false )
    $uidisplay = '- ui';
if( $_SESSION['show_resources'] !== false )
    $resourcesdisplay = '- res';
if( file_exists( __DIR__  . '/data.php' ) )
        include( __DIR__  . '/data.php');

data:{
    if( ! isset( $data ) ){
        $data=[
            'opt'=>[
                1=>'[darkness]',
                2=>''
            ],
            'housea' => [
                'd'=>[
                    'vis'  => 1,
                    'con'  => [ 'so a funny thing','happened on the way','to the store','the other day','and i was thinking','about it as i','was coding this','array of strings','and could not help but','include it and also','nothing happened because','i did not go to the store' ],
                    #'lid'  => 0,
                    #'face' => '???'
                ]
            ],
            'h'=>[
                't'=>['h'],
                'd'=>[
                    'vis'  => 1,
                    'con'  => [ '>' ],
                    #'lid'  => 0,
                    #'face' => '???'
                ]
            ],
            0=>[
                't'=>['0'],
                'd'=>[
                    'vis'=>1,
                    'con'=>[ '' ]
                ],
                0=>[
                    'vis'=>1,
                    'con'=>[ '' ],
                    'mut'=>[ 1 ]
                ],
                1=>[
                    'mut'=>[ 0 ],
                    'vis'=>1,
                    'con'=>[ '' ],
                    'opt'=>[
                        [ '...', 1 ],
                        [ '...', 2 ]
                    ]
                ]
            ]
        ];
    }
    if( ! isset( $mobs ) ){

    }
    if( ! isset( $resourcetable ) ){
        $resourcetable = [
            'alcove' => [
                'disp' => 'alcove',
                'type' => 'water'
            ],
            'basement' => [
                'case'  => [],
                'disp'  => 'basement',
                'harv'  => 'mantle',
                'mine'  => 3600,
                'type' => 'floor'
            ],
            'bedrock' => [
                'case'  => [
                    'combine' => [
                        'channel' => 'damn' 
                    ]
                ],
                'disp'  => 'bedrock',
                'harv'  => 'magma',
                'mine'  => 1900,
                'type' => 'floor'
            ],
            'brush' => [
                'case'  => [],
                'disp'  => 'brush',
                'harv'  => 'underg',
                'mine'  => 1200,
                'sp'    => 1,
                'type' => 'floor'
            ],
            'checkpoint' => [
                'case'  => [],
                'disp'  => 'checkpoint',
                'sp'    => 1,
                'type' => 'floor'
            ],
            'chlorinatedlake' => [
                'case'  => [
                    'combine' => [
                        'water' => 'chlorinatedlake'
                    ]
                ],
                'disp' => 'chlorine',
                'harv' => 'subwater',
                'mine' => 2000,
                'sp'   => 1,
                'type' => 'water'
            ],
            'cove' => [
                'disp' => 'cove',
                'type' => 'water'
            ],
            'deep' => [
                'disp' => 'deep water',
                'swim' => 2,
                'type' => 'water'
            ],

            'deep3' => [
                'disp' => 'deeper water',
                'swim' => 5,
                'type' => 'water'
            ],
            'dirt' => [
                'case'  => [ 
                    'combine' => [
                        'water' => 'muddybank' 
                    ]
                ],
                'disp' => 'dirt',
                'harv' => 'soil',
                'mine' => 10,
                'sp'   => 10,
                'type' => 'floor'
            ],
            'dolostone' => [
                'dnh'  => 1,
                'disp' => 'dolostone',
                'type' => 'floor'
            ],
            'enrichedsoil' => [
                'case' => [],
                'disp' => 'enriched soil',
                'dnh'  => 1,
                'type' => 'code' 
            ],
            'flooroff' => [
                'disp' => 'x',
                'dnh'  => 1,
                'type' => 'floor'
            ],
            'forst' => [
                'case' => [],
                'disp' => 'forest',
                'dnh'  => 1,
                'sp'   => 1,
                'type' => 'floor'
            ],
            'garden' => [
                'case' => [],
                'disp' => 'garden',
                'dnh'  => 1,
                'type' => 'floor'
            ],
            'grass' => [
                'case'  => [
                    'combine' => [
                        'dirt'  => 'grass', 
                        'grass' => 'overg'
                    ]
                ],
                'disp' => 'grass',
                'harv' => 'dirt',
                'mine' => 1,
                'sp'   => 11,
                'type' => 'floor'
            ],
            'groundwater' => [
                'case' => [],
                'disp' => 'groundwater',
                'dnh'  => 1,
                'sp'   => 1,
                'type' => 'water'
            ],
            'igneous' => [
                'case' => [],
                'disp' => 'igneous',
                'harv' => 'sedimentary',
                'mine' => 2500,
                'res'  => 'igneous',
                'type' => 'floor'
            ],
            'ladder' => [
                'disp' => 'ladder',
                'dnh'  => 1,
                'type' => 'ladder'
            ],
            'lake' => [
                'disp' => 'lake',
                'dnh'  => 1,
                'sp'   => 1,
                'swim' => 3,
                'type' => 'water'
            ],
            'lair' => [
                'case' => [],
                'disp' => 'lair',
                'dnh'  => 1,
                'type' => 'floor'
            ],
            'limestone' => [
                'case'  => [],
                'disp'  => 'limestone',
                'harv'  => 'marble',
                'mine'  => 600,
                'sp'    => 1,
                'type' => 'floor'
            ],
            'magma' => [
                'disp' => 'magma',
                'dnh'  => 1,
                'type' => 'water'
            ],
            'mantle' => [
                'disp' => 'mantle',
                'dnh'  => 1,
                'type' => 'floor'
            ],
            'marble' => [
                'case'  => [],
                'disp'  => 'marble',
                'harv'  => 'dolostone',
                'mine'  => 800,
                'type' => 'floor'
            ],
            'mound' => [
                'case' => [],
                'disp' => 'mound',
                'dnh'  => 1,
                'sp'   => 1,
                'type' => 'floor'
            ],
            'mount' => [
                'case' => [],
                'disp' => 'mountain',
                'dnh'  => 1,
                'sp'   => 1,
                'type' => 'floor'
            ],
            'mud' => [
                'amt'   => 5,
                'case'  => [],
                'disp'  => 'mud',
                'harv'  => 'soil',
                'mine'  => 20,
                'res'   => 'mud',
                'type' => 'floor'
            ],
            'muddybank' => [
                'amt'   => 3,
                'case'  => [],
                'disp'  => 'muddy bank',
                'harv'  => 'dirt',
                'mine'  => 20,
                'res'   => 'mud',
                'sp'    => 1,
                'type' => 'floor'
            ],
            'mudstone' => [
                'case'  => [],
                'disp'  => 'mudstone',
                'harv'  => 'siltstone',
                'mine'  => 200,
                'type' => 'floor'
            ],
            'nothing' => [
                'disp' => ' x ',
                'dnh'  => 1,
                'sp'   => 6,
                'type' => 'air'
            ],
            'nothingbarrier' => [
                'disp' => ' [ ] ',
                'dnh'  => 1,
                'type' => 'air'
            ],
            'overg' => [
                'case'  => [],
                'disp'  => 'overgrowth',
                'harv'  => 'brush',
                'mine'  => 10,
                'sp'    => 3,
                'type' => 'floor'
            ],
            'playerproperty' => [
                'case' => [],
                'disp' => 'o u o',
                'dnh'  => 1,
                'type' => 'floor'
            ],
            'playerpropertyb' => [
                'case' => [],
                'disp' => 'o_u_o',
                'dnh'  => 1,
                'type' => 'floor'
            ],
            'playerroof' => [
                'case' => [],
                'disp' => '',
                'dnh'  => 1,
                'type' => 'floor'
            ],
            'pond' => [
                'case' => [],
                'disp' => 'pond',
                'dnh'  => 1,
                'sp'   => 1,
                'swim' => 1,
                'type' => 'water'
            ],
            'powerless' => [
                'disp' => 'What have you done?',
                'dnh'  => 1,
                'type' => 'wall'
            ],
            'prevwater' => [
                'disp'  => 'sand',
                'harv'  => 'sandstone',
                'mine'  => 1,
                'res'   => 'sand',
                'sp'    => 1,
                'type' => 'floor'
            ],
            'ravine' => [
                'case' => [],
                'dnh'  => 1,
                'sp'   => 1,
                'type' => 'floor'
            ],
            'riverbed' => [
                'disp'  => 'riverbed',
                'harv'  => 'water',
                'mine'  => 20,
                'res'   => 'cementb',
                'sp'    => 1,
                'swim'  => 1,
                'type' => 'water'
            ],
            'roots' => [
                'case'  => [],
                'disp'  => 'roots',
                'harv'  => 'soil',
                'mine'  => 30,
                'type' => 'floor'
            ],
            'roughsoil' => [
                'case'  => [],
                'disp'  => 'rough soil',
                'harv'  => 'subwater',
                'mine'  => 1600,
                'type' => 'floor'
            ],
            'sand' => [
                'case'  => [ 
                    'combine' => [
                        'magma'   => 'trueglass',
                        'water'   => 'riverbed',
                    ]
                ],
                'disp' => 'sand',
                'harv' => 'sandstone',
                'mine' => 1,
                'sp'   => 1,
                'type' => 'floor'
            ],
            'sandclay' => [
                'case'  => [],
                'disp'  => 'sandclay',
                'harv'  => 'sandstone',
                'mine'  => 50,
                'sp'    => 1,
                'type' => 'floor'
            ],
            'sandstone' => [
                'case'  => [],
                'disp'  => 'sandstone',        
                'harv'  => 'mudstone',
                'mine'  => 100,
                'score' => 50,
                'sp'    => 1,
                'type' => 'floor'
            ],
            'sedimentary' => [
                'case' => [],
                'disp' => 'sedimentary',
                'harv' => 'basement',
                'mine' => 2900,
                'sp'   => 0,
                'type' => 'floor'
            ],
            'shale' => [
                'case'  => [],
                'disp'  => 'shale',
                'harv'  => 'limestone',
                'mine'  => 500,
                'sp'    => 1,
                'type' => 'floor'
            ],
            'shallow' => [
                'case' => [],
                'disp' => 'shallow water',
                'dnh'  => 1,
                'swim' => 0,
                'sp'   => 1,
                'type' => 'water'
            ],
            'shore' => [
                'disp' => 'shore',
                'dnh'  => 1,
                'swim' => 0,
                'type' => 'water'
            ],
            'siltstone' => [
                'case'  => [],
                'disp'  => 'siltstone',
                'harv'  => 'shale',
                'mine'  => 300,
                'sp'    => 1,
                'type' => 'floor'
            ],
            'soil' => [
                'case'  => [],
                'disp'  => 'soil',
                'harv'  => 'subsoil',
                'mine'  => 1400,
                'sp'    => 1,
                'type' => 'floor'
            ],
            'stream' => [
                'disp' => 'stream',
                'dnh'  => 1,
                'sp'   => 1,
                'type' => 'water'
            ],
            'stonepath' => [
                'case'  => [],
                'disp'  => 'stonepath',
                'harv'  => 'path',
                'mob'   => [
                    'dealing' => [
                        'hit'  => 10,
                        'str'  => 0,
                        'crit' => 2
                    ],
                    'receiving' => [
                        'block' => 45,
                        'dodge' => 0
                    ],
                    'reverb' => 1
                ],
                'sp'    => 11,
                'type' => 'floor'
            ],
            'subsoil' => [
                'case'  => [],
                'disp'  => 'subsoil',
                'harv'  => 'bedrock',
                'mine'  => 1500,
                'sp'    => 1,
                'type' => 'floor'
            ],
            'subwater' => [
                'disp' => 'subwater',
                'dnh'  => 1,
                'sp'   => 1,
                'type' => 'water'
            ],
            'swamp' => [
                'case' => [],
                'dnh'  => 1,
                'disp' => 'swamp',
                'sp'   => 1,
                'type' => 'water'
            ],
            'tornt' => [
                'case' => [],
                'disp' => 'torrential waters',
                'dnh'  => 1,
                'swim' => 10,
                'sp'   => 2,
                'type' => 'water'
            ],
            'trail' => [
                'case' => [],
                'disp' => 'trail',
                'dnh'  => 1,
                'sp'   => 9,
                'type' => 'floor'
            ],
            'tree' => [
                'amt'   => 5,
                'case' => [],
                'disp'  => 'tree',
                'harv'  => 'underg',
                'mine'  => 1,
                'res'   => 'wood',
                'sp'    => 1,
                'type' => 'floor'
                
            ],
            'treeb' => [
                'amt'   => 5,
                'case'  => [],
                'disp'  => 'tree (b)',
                'harv'  => 'underg',
                'mine'  => 1,
                'res'   => 'woodb',
                'sp'    => 1,
                'type' => 'floor'
            ],
            'treec' => [
                'amt'   => 5,
                'case'  => [],
                'disp'  => 'tree (c)',
                'harv'  => 'underg',
                'mine'  => 1,
                'res'   => 'woodc',
                'sp'    => 1,
                'type' => 'floor'
            ],
            'tunnel' => [
                'disp' => 'reinforced',
                'dnh'  => 1,
                'type' => 'open'
            ],
            'underg' => [
                'case'  => [],
                'disp'  => 'undergrowth',
                'harv'  => 'roughsoil',
                'mine'  => 1300,
                'sp'    => 1,
                'type' => 'floor'
            ],
            'unknown' => [
                'case' => [],
                'disp' => '? ? ?',
                'dnh'  => 1,
                'sp'   => 1,
                'type' => 'water'
            ],
            'volcano' => [
                'case'  => [
                    'combine' => [
                        'chlorinatedlake' => 'corrosive'
                    ]
                ],
                'disp' => 'volcanic ash',
                'harv' => 'volcano',
                'mine' => 2300,
                'type' => 'floor'
            ],
            'walloff' => [
                'disp' => 'x',
                'dnh'  => 1,
                'type' => 'wall'
            ],
            'warp' => [
                'disp' => '(?)',
                'dnh'  => 1,
                'type' => 'floor'
            ],
            'water' => [
                'case'  => [
                    'combine' => []
                ],
                'disp'    => 'water',
                'harv'    => 'prevwater',
                'mine'    => 0,
                'res'     => 'water',
                'sp'      => 45,
                'swim'    => 1,
                'type'    => 'water'
            ],
            'weaksandstone' => [
                'case'  => [],
                'disp'  => 'mudstone (weakened)',
                'harv'  => 'mudstone',
                'mine'  => 90,
                'sp'    => 1,
                'type' => 'floor'
            ],
            'wood' => [
                'case' => [],
                'disp' => 'wood',
                'res'  => 'wood',
                'type' => 'resource'
            ],
            'woodb' => [
                'case' => [],
                'disp' => 'wood (b)',
                'res'  => 'woodb',
                'type' => 'resource'
            ],
            'woodc' => [
                'case' => [],
                'disp' => 'wood (c)',
                'res'  => 'woodc',
                'type' => 'resource'
            ],

            'cementb' => [
                'res' => 'cementb',
                'disp' => 'cement (b)',
                'case' => [
                    'combine' => [
                        'grass'    => 'platformb',
                        'dirt'     => 'platformb',
                        'mudstone' => 'platformb',
                        'underg'   => 'platformb',
                        'brush'    => 'platformb',
                        'channel'  => 'platformb',
                        'deep'     => 'platformb',
                        'deep3'    => 'platformb',
                        'overg'    => 'platformb',
                        'path'     => 'platformb',
                        'sand'     => 'platformb',
                        'sandstone'=> 'platformb',
                        'soil'     => 'platformb',
                        'wall'     => 'platformb',
                        'water'    => 'platformb',
                    ]
                ],
                'sp' => 0,
                'type' => 'floor'
            ],



            'path' => [
                'disp'  => 'path',
                'res'   => 'dirt',
                'harv'  => 'soil',
                'mine'  => 1300,
                'case'  => [],
                'sp' => 45,
                'type' => 'ladder'
            ],



            'channelswimmer' => [
                'disp' => 'channel swimmer', 
                'res'  => 'channelswimmer',
                'case' => [],
                'type' => 'resource'
            ],
            'channelcrawler' => [ 
                'disp' => 'channel crawler', 
                'res'  => 'channelcrawler',
                'case' => [],
                'type' => 'resource'
            ],
            'channelwater' => [ 
                'disp' => 'channel water',
                'res'  => 'channelwater',
                'case' => [],
                'type' => 'resource'
            ],
            'channelsand' => [
                'disp' => 'channel sand',
                'res'  => 'channelsand',
                'case' => [],
                'type' => 'resource'
            ],
            'shells'     => [ 'disp' => 'seashells',   'res'  => 'shells',     'case' => [], 'type' => 'resource' ],
            'starfish'   => [ 'disp' => 'starfish',    'res'  => 'starfish',   'case' => [], 'type' => 'resource' ],
            'seastar'    => [ 'disp' => 'seastar',     'res'  => 'seastar',    'case' => [], 'type' => 'resource' ],
            'crab'       => [ 'disp' => 'crab',        'res'  => 'crab',       'case' => [], 'type' => 'resource' ],
            'clam'       => [ 'disp' => 'clam',        'res'  => 'clam',       'case' => [], 'type' => 'resource' ],
            'scallop'    => [ 'disp' => 'scallop',     'res'  => 'scallop',    'case' => [], 'type' => 'resource' ],
            'sanddollar' => [ 'disp' => 'sand dollar', 'res'  => 'sanddollar', 'case' => [], 'type' => 'resource' ],
            'bones'      => [ 'disp' => 'bones',       'res'  => 'bones',      'case' => [], 'type' => 'resource' ],


            'concrete' => [
                'disp' => 'concrete (a)',
                'res'  => 'concrete',
                'harv' => 'path',
                'case' => [],
                'type' => 'floor'
            ],
            'concretec' => [
                'disp' => 'concrete (c)',
                'res'  => 'concretec',
                'harv' => 'path',
                'case' => [],
                'type' => 'floor'
            ],




            










            'trueglass' => [
                'disp' => 'trueglass',
                'harv' => 'magma',
                'mine' => 1900,
                'case' => [ 
                    'combine' => [
                        'magma' => 'refinedtrueglass',
                        'conductiveglass' => 'stablepowercore',
                        'platformb' => 'constructionglassb'
                    ]
                ]
            ],
            'refinedtrueglass' => [
                'disp' => 'refined trueglass',
                'harv' => 'magma',
                'case' => [
                    'combine' => [
                        'magma'      => 'stabletrueglass',
                        'radioglass' => 'conductiveglass'
                    ]
                ]
            ],
            'stabletrueglass' => [
                'disp' => 'stable trueglass',
                'harv' => 'magma',
                'case' => [
                    'combine' => [
                        'magma'    => 'glasscore',
                        'reactive' => 'radioglass'
                    ]
                ]
            ],

            

            'woodb' => [ 'disp' => 'wood (b)', 'res' => 'woodb', 'case'  => [] ],
            'wall'            => [ 'dnh' => 1, 'disp' => 'wall',          'case' => [], 'type' => 'wall'  ],
            'bed'            => [ 'dnh' => 1, 'disp' => 'zzz',          'case' => [], 'type' => 'wall'  ],
            
            'walleast3'       => [ 'dnh' => 1, 'disp' => 'wall',          'case' => [], 'type' => 'wall'  ],
            'wallwest3'       => [ 'dnh' => 1, 'disp' => 'wall',          'case' => [], 'type' => 'wall'  ],
            'wallnortheast2'  => [ 'dnh' => 1, 'disp' => 'wall',          'case' => [], 'type' => 'wall'  ],
            'wallnorthwest2'  => [ 'dnh' => 1, 'disp' => 'wall',          'case' => [], 'type' => 'wall'  ],
            'wallsoutheast2'  => [ 'dnh' => 1, 'disp' => 'wall',          'case' => [], 'type' => 'wall'  ],
            'wallsouthwest2'  => [ 'dnh' => 1, 'disp' => 'wall',          'case' => [], 'type' => 'wall'  ],
            'wallsoutheast1'  => [ 'dnh' => 1, 'disp' => 'wall',          'case' => [], 'type' => 'wall'  ],
            'wallsouthwest1'  => [ 'dnh' => 1, 'disp' => 'wall',          'case' => [], 'type' => 'wall'  ],
            'wallnortheast1'  => [ 'dnh' => 1, 'disp' => 'wall',          'case' => [], 'type' => 'wall'  ],
            'wallnorthwest1'  => [ 'dnh' => 1, 'disp' => 'wall',          'case' => [], 'type' => 'wall'  ],
            'wallanorth'      => [ 'dnh' => 1, 'disp' => 'wall (a)',      'case' => [], 'type' => 'wall' ],
            'wallanorthwest'  => [ 'dnh' => 1, 'disp' => 'wall (a)',      'case' => [], 'type' => 'wall' ],
            'wallanortheast'  => [ 'dnh' => 1, 'disp' => 'wall (a)',      'case' => [], 'type' => 'wall' ],
            'wallasouthwest'  => [ 'dnh' => 1, 'disp' => 'wall (a)',      'case' => [], 'type' => 'wall' ],
            'wallasoutheast'  => [ 'dnh' => 1, 'disp' => 'wall (a)',      'case' => [], 'type' => 'wall' ],
            'wallasouth'      => [ 'dnh' => 1, 'disp' => 'wall (a)',      'case' => [], 'type' => 'wall' ],
            'wallbnorth1'      => [ 'dnh' => 1, 'disp' => 'wall (b)',      'case' => [], 'type' => 'wall' ],
            'wallbnorthwest1'  => [ 'dnh' => 1, 'disp' => 'wall (b)',      'case' => [], 'type' => 'wall' ],
            'wallbnortheast1'  => [ 'dnh' => 1, 'disp' => 'wall (b)',      'case' => [], 'type' => 'wall' ],
            'wallbsouthwest1'  => [ 'dnh' => 1, 'disp' => 'wall (b)',      'case' => [], 'type' => 'wall' ],
            'wallbsoutheast1'  => [ 'dnh' => 1, 'disp' => 'wall (b)',      'case' => [], 'type' => 'wall' ],
            'wallbsouth1'      => [ 'dnh' => 1, 'disp' => 'wall (b)',      'case' => [], 'type' => 'wall' ],
            'wallaeast'      => [ 'dnh' => 1, 'disp' => 'wall (a)',      'case' => [], 'type' => 'wall' ],
            'wallawest'      => [ 'dnh' => 1, 'disp' => 'wall (a)',      'case' => [], 'type' => 'wall' ],
            'wallbeast3'      => [ 'dnh' => 1, 'disp' => 'wall (b)',      'case' => [], 'type' => 'wall' ],
            'wallbwest3'      => [ 'dnh' => 1, 'disp' => 'wall (b)',      'case' => [], 'type' => 'wall' ],
            'door'            => [ 'dnh' => 1, 'disp' => 'door (closed)',  'case' => [], 'type' => 'wall'  ],
            'windoweast'      => [ 'dnh' => 1, 'disp' => 'window (east)',  'case' => [], 'type' => 'floor' ],
            'floorbeast'      => [ 'dnh' => 1, 'disp' => 'floor (b)',      'case' => [], 'type' => 'floor' ],
            'floorbwest'      => [ 'dnh' => 1, 'disp' => 'floor (b)',      'case' => [], 'type' => 'floor' ],
            'floorbnorth'     => [ 'dnh' => 1, 'disp' => 'floor (b)',      'case' => [], 'type' => 'floor' ],
            'floorbsouth'     => [ 'dnh' => 1, 'disp' => 'floor (b)',      'case' => [], 'type' => 'floor' ],
            'floorbnorthwest' => [ 'dnh' => 1, 'disp' => 'floor (b)',      'case' => [], 'type' => 'floor' ],
            'floorbnortheast' => [ 'dnh' => 1, 'disp' => 'floor (b)',      'case' => [], 'type' => 'floor' ],
            'floorbsouthwest' => [ 'dnh' => 1, 'disp' => 'floor (b)',      'case' => [], 'type' => 'floor' ],
            'floorbsoutheast' => [ 'dnh' => 1, 'disp' => 'floor (b)',      'case' => [], 'type' => 'floor' ],
            'floorbcenter'    => [ 'dnh' => 1, 'disp' => 'floor (b)',      'case' => [], 'type' => 'floor' ],
            'dooropen'        => [ 'dnh' => 1, 'disp' => 'door (open)',    'case' => [], 'type' => 'floor' ],
            'flooracenter'    => [ 'dnh' => 1, 'disp' => 'floor (a)',      'case' => [], 'type' => 'floor' ],
            'floorasouth'     => [ 'dnh' => 1, 'disp' => 'floor (a)',      'case' => [], 'type' => 'floor' ],
            'flooranorth'     => [ 'dnh' => 1, 'disp' => 'floor (a)',      'case' => [], 'type' => 'floor' ],
            'flooraeast'      => [ 'dnh' => 1, 'disp' => 'floor (a)',      'case' => [], 'type' => 'floor' ],
            'floorawest'      => [ 'dnh' => 1, 'disp' => 'floor (a)',      'case' => [], 'type' => 'floor' ],
            'flooranorthwest' => [ 'dnh' => 1, 'disp' => 'floor (a)',      'case' => [], 'type' => 'floor' ],
            'flooranortheast' => [ 'dnh' => 1, 'disp' => 'floor (a)',      'case' => [], 'type' => 'floor' ],
            'floorasouthwest' => [ 'dnh' => 1, 'disp' => 'floor (a)',      'case' => [], 'type' => 'floor' ],
            'floorasoutheast' => [ 'dnh' => 1, 'disp' => 'floor (a)',      'case' => [], 'type' => 'floor' ],
            'doorbridge'      => [ 'dnh' => 1, 'disp' => 'bridge',         'case' => [], 'type' => 'floor' ],
            'doorlocked'      => [ 'dnh' => 1, 'disp' => 'door (locked)',  'case' => [], 'type' => 'wall' ],
            'doorunlocked'    => [ 'dnh' => 1, 'disp' => 'door (unlocked)','case' => [], 'type' => 'floor' ],
            'doorautomatic'   => [ 'dnh' => 1, 'disp' => 'door (automatic','case' => [], 'type' => 'wall' ],

        ];
    }
    if( ! isset( $furniture ) ){
        $furniture = [
            #'3/7' => [
            #    1 => [
            #        'deska'      => [ 1, 0, 8,  'deska', 'desk' ],
            #        'computera'  => [ 2, 5, 10, 'computera', 'computer', 'computera' ],
            #        'powercorda' => [ 3, 5, -5, 'powercorda', 'power cord', 'powercorda' ]
            #    ],
            #    64 => [
            #        'powercorda' => [ 0, 0, 0, 'powercorda', 'power cord', 'powercorda' ],
            #        'computera'  => [ 0, 0, 0, 'computera', 'computer', 'computera' ]
            #    ]
            #]
        ];
    }
    if( ! isset( $warp ) ){
        $warp = [
            #'7/7' => [ 'area' => 64, 'power' => [ '3/7', 'powercorda' ] ]
        ];
    }
    if( ! isset( $terminals ) ){
        $terminals = [ '3/7' ];
    }
    if( ! isset( $examine ) ){
        $examine = [
            #'computera'  => [ 'poweredby' => [ '3/7', 'powercorda'] ],
            #'powercorda' => [ 'powering'  => [ '3/7', 'computera' ] ]
        ];
    }
    if( ! isset( $walls ) ){
        $walls = [
            'wallaeast',
            'wallawest',
            'wall',
            'walleast3',
            'wallwest3',
            'wallnortheast2',
            'wallnorthwest2',
            'wallsoutheast2',
            'wallsouthwest2',
            'wallsoutheast1',
            'wallsouthwest1',
            'wallnortheast1',
            'wallnorthwest1',
            'wallanorth',
            'wallanorthwest',
            'wallanortheast',
            'wallasouthwest',
            'wallasoutheast',
            'wallasouth',
            'wallbnorth1',
            'wallbnorthwest1',
            'wallbnortheast1',
            'wallbsouthwest1',
            'wallbsoutheast1',
            'wallbsouth1',
            'door',
            'locked',
            'bed',
            'doorlocked',
            'doorautomatic',
            'powerless',
            'walloff'
        ];
    }
    if( ! isset( $floors ) ){
        $floors = [
            'windoweast',
            'floorbeast',
            'floorbwest',
            'floorbnorth',
            'floorbsouth',
            'floorbnorthwest',
            'floorbnortheast',
            'floorbsouthwest',
            'floorbsoutheast',
            'floorbcenter',
            'dooropen',
            'unlocked',
            'flooracenter',
            'floorasouth',
            'flooranorth',
            'flooraeast',
            'floorawest',
            'flooranorthwest',
            'flooranortheast',
            'floorasouthwest',
            'floorasoutheast',
            'doorbridge',
            'doorunlocked',
            'flooroff',
            'playerroof',
        ];
    }
    if( ! isset( $objects ) ){
        $objects = [
            'enrichedsoil',
        ];
    }
    
    if( isset( $items ) ){
        
    }
}

functions:{
    function _decay(){
        $decay = rand( $_SESSION['area'] + 5, $_SESSION['area'] + 10 );
        $decay = (int)"{$decay}0";
        return $decay;
    }
    function _reload($parts){
        $goto=NULL;
        if( $parts != './' ){
            foreach($parts as $p){
                $goto.="{$p}/";
            }
            $goto=ltrim(rtrim($goto,'/'),'/');
            if(!empty($goto))
                $goto="?/{$goto}";
        }
        else{
            $goto = NULL;
        }
        header("Location:./{$goto}");
    }




    function _player( $opts = [] ){
        $phealth = $_SESSION['health'];
        $paction = $_SESSION['action'];
        $pcon    = $_SESSION['attributes']['constitution'];
        $pstam   = $_SESSION['attributes']['stamina'];
        $pstr    = $_SESSION['attributes']['strength'];
        $pagi    = $_SESSION['attributes']['agility'];
        $ppre    = $_SESSION['attributes']['precision'];
        $pluck   = $_SESSION['attributes']['luck'];
        return [
            'health' => $phealth,
            'action' => $paction,
            'con'    => $pcon,
            'stam'   => $pstam,
            'str'    => $pstr,
            'agi'    => $pagi,
            'pre'    => $ppre,
            'luck'   => $pluck
        ];
        
    }

    /**
     *
     *  

    # Brad
    # https://stackoverflow.com/users/362536/brad
    # https://stackoverflow.com/a/11872928
    # Aug 8, 2012 (re:"Generating random results in PHP?")
    
     *
     *
     **/

    function _random( $weightedValues = [], $skip = NULL ){
        /**
        * getRandomWeightedElement()
        * Utility function for getting random values with weighting.
        * Pass in an associative array, such as array('A'=>5, 'B'=>45, 'C'=>50)
        * An array like this means that "A" has a 5% chance of being selected, "B" 45%, and "C" 50%.
        * The return value is the array key, A, B, or C in this case.  Note that the values assigned
        * do not have to be percentages.  The values are simply relative to each other.  If one value
        * weight was 2, and the other weight of 1, the value with the weight of 2 has about a 66%
        * chance of being selected.  Also note that weights should be integers.
        * 
        * @param array $weightedValues
        */
        $rand = mt_rand( 0, (int)array_sum( $weightedValues ) );
        foreach( $weightedValues as $key => $value ) {
            $rand -= $value;
            if( $rand <= 0 ){
                if( ! is_NULL( $skip ) ){
                    if( $key == $skip ){
                        _random($weightedValues, $skip );
                    }
                    else{
                        return $key;
                    }
                }
                return $key;
            }
        }
    }

    function _attrup( $opts = [] ){
        if( $_SESSION['acquire']['action'] !== false ){
            if( isset( $opts['attr'] ) ){
                $attr = $opts['attr'];
                $extra = 0;
                if( _random( [ 'lucky' => $_SESSION['attributes']['luck'], 'nothing' => 100 ] ) == 'lucky' ){
                    $extra = 9;
                }
                if( isset( $_SESSION['attributes']["{$attr}"] ) ){
                    if( ! isset( $_SESSION['leveling']["{$attr}"] ) ){
                        $_SESSION['leveling']["{$attr}"] = 1 + $extra;
                    }
                    $_SESSION['leveling']["{$attr}"] = $_SESSION['leveling']["{$attr}"] + 1;
                    if( $_SESSION['leveling']["{$attr}"] > 99 ){
                        $_SESSION['attributes']["{$attr}"] = $_SESSION['attributes']["{$attr}"] + 1 + $extra;
                        if( isset( $opts['skills'] ) ){
                            if( is_array( $opts['skills'] ) ){
                                foreach( $opts['skills'] as $skill ){
                                    if( isset( $_SESSION['skills']["{$skill}"] ) ){
                                        $_SESSION['skills']["{$skill}"] = $_SESSION['skills']["{$skill}"] + 1;
                                    }
                                }
                            }
                        }
                        unset( $_SESSION['leveling']["{$attr}"] );
                    }
                }
            }
        }
    }

    function _lockedroomcode( $opts = [] ){
        if( isset( $opts['code'] ) ){
            $out = '<span class="lockeddoorconsole">';
            $codecorrect = false;
            if( ! isset( $_SESSION['unlocked']["{$_SESSION['examining']}"] ) ){
                $_SESSION['unlocked']["{$_SESSION['examining']}"] = [ 0 => 6, 1 => 6, 2 => 6, 3 => 6 ];
            }
            if( isset( $_SESSION['unlocked']["{$_SESSION['examining']}"] ) ){
                $ec = $_SESSION['unlocked']["{$_SESSION['examining']}"];
                if( "{$ec[0]}{$ec[1]}{$ec[2]}{$ec[3]}" == "{$opts['code'][0]}{$opts['code'][1]}{$opts['code'][2]}{$opts['code'][3]}" ){
                    $codecorrect = true;
                }
            }
            if( $codecorrect !== true ){
                $out .= '&#128274; :: Room Locked [ ';
                $curcod = $_SESSION['unlocked']["{$_SESSION['examining']}"];
                if( $curcod[0] == $opts['code'][0] )
                    $out .= 'x ';
                else
                    $out .= "<a href='./?cyclecode=0'>{$curcod[0]}</a> ";
                if( $curcod[1] == $opts['code'][1] )
                    $out .= 'x ';
                else
                    $out .= "<a href='./?cyclecode=1'>{$curcod[1]}</a> ";
                if( $curcod[2] == $opts['code'][2] )
                    $out .= 'x ';
                else
                    $out .= "<a href='./?cyclecode=2'>{$curcod[2]}</a> ";
                if( $curcod[3] == $opts['code'][3] )
                    $out .= 'x ';
                else
                    $out .= "<a href='./?cyclecode=3'>{$curcod[3]}</a> ";
                $out .= ' =/= ';
                if( $curcod[0] == $opts['code'][0] )
                    $out .= 'x ';
                else
                    $out .= "{$opts['code'][0]} ";
                if( $curcod[1] == $opts['code'][1] )
                    $out .= 'x ';
                else
                    $out .= "{$opts['code'][1]} ";
                if( $curcod[2] == $opts['code'][2] )
                    $out .= 'x ';
                else
                    $out .= "{$opts['code'][2]} ";
                if( $curcod[3] == $opts['code'][3] )
                    $out .= 'x ';
                else
                    $out .= "{$opts['code'][3]} ";
                $out .= ' ]';
            }
            else {
                $out .= '&#128275; :: Room Unlocked';
            }
            $out .= '</span>';
            return $out;
        }
        return NULL;
    }

    function _resource( $opts = [] ){
        global $resourcetable;
        if( empty( $opts ) ){
            $types = [];
            foreach( $resourcetable as $k => $v ){
                if( isset( $v['sp'] ) ){
                    $types["{$k}"] = $v['sp'];
                }
            }
            return _random( $types );
        }
    }

}

GET:{

    $xmax = 64; $ymax = 64;

    if( isset( $_SESSION['playerposition'] ) ){

        /** Player positioning
          * @since version alpha
          *     - Various coordinates, originating from player position
          */
        $pp               = explode( '/', $_SESSION['playerposition'] );
        $ppx              = $pp[0];
        $ppy              = $pp[1];
        $ppxn             = $ppx + 1;
        $ppxp             = $ppx - 1;
        $ppyn             = $ppy + 1;
        $ppyp             = $ppy - 1;
        $ppcoordnorth     = "{$ppx}/{$ppyp}";
        $ppcoordsouth     = "{$ppx}/{$ppyn}";
        $ppcoordeast      = "{$ppxn}/{$ppy}";
        $ppcoordwest      = "{$ppxp}/{$ppy}";
        $ppcoordnortheast = "{$ppxn}/{$ppyp}";
        $ppcoordnorthwest = "{$ppxp}/{$ppyp}";
        $ppcoordsouthwest = "{$ppxp}/{$ppyn}";
        $ppcoordsoutheast = "{$ppxn}/{$ppyn}";
        $player = [
            'x'         => $ppx,
            'y'         => $ppy,
            'north'     => $ppcoordnorth,
            'south'     => $ppcoordsouth,
            'east'      => $ppcoordeast,
            'west'      => $ppcoordwest,
            'northeast' => $ppcoordnortheast,
            'northwest' => $ppcoordnorthwest,
            'southwest' => $ppcoordsouthwest,
            'southeast' => $ppcoordsoutheast,
            'nearby'    => [
                "{$ppx}/{$ppy}",
                $ppcoordnorth,
                $ppcoordsouth,
                $ppcoordeast,
                $ppcoordwest,
                $ppcoordnortheast,
                $ppcoordnorthwest,
                $ppcoordsouthwest,
                $ppcoordsoutheast
            ]
        ];

        /**
         *
         *

            Gravity ~~~~~~~~~~~~~
            @since version alpha

            $_SESSION['standingon']:    current tile being occupied by player
            ^ $standingontype corresponds to session key 'standingon'
            $_SESSION['standingabove']: tile below 'standingon'

            ^ $standingabovetype corresponds to session key 'standingabove'
            $standingabovedisp corresponds to the 'disp' of the tile (its face)

            Defaults:
                $standingabovetype: floor

            standing above: floor, wall: do nothing
            standing on: floor: do nothing
            standing above: water: do nothing
            all else: move player down until condition is met

         *
         *
         */
        $standingabovedisp = NULL;
        $standingunderdisp = NULL;
        if( isset( $_SESSION['standingon'] ) ){
            if( isset( $resourcetable["{$_SESSION['standingon']}"]['type'] ) ){
                $standingontype = $resourcetable["{$_SESSION['standingon']}"]['type'];
                if( isset( $_SESSION['coords']["{$player['south']}"]['disp'] ) ){
                    $standingabovedisp = $_SESSION['coords']["{$player['south']}"]['disp'];
                    if( isset( $resourcetable["{$standingabovedisp}"]['type'] ) ){
                        $standingabovetype = $resourcetable["{$standingabovedisp}"]['type'];
                    }
                }
                if( isset( $standingabovetype ) ){
                    if( $standingabovetype == 'open' OR $standingabovetype == 'air' ){
                        if( isset( $_SESSION['coords']["{$player['north']}"]['disp'] ) ){
                            $standingunderdisp = $_SESSION['coords']["{$player['north']}"]['disp'];
                            if( isset( $resourcetable["{$standingunderdisp}"]['type'] ) ){
                                $standingundertype = $resourcetable["{$standingunderdisp}"]['type'];
                            }
                            if( $standingundertype == 'air' OR $standingundertype == 'open' ){
                                if( $standingontype == 'air' OR $standingontype == 'open' ){
                                    if( ! isset( $_SESSION['temporary_airborne' ] ) ){
                                        $_SESSION['temporary_airborne' ] = 0;
                                    }
                                    else{
                                        $_SESSION['temporary_airborne'] = $_SESSION['temporary_airborne'] + 1;
                                    }
                                }
                            }
                        }
                    }
                    else{
                        if( isset( $_SESSION['temporary_airborne'] ) ){
                            if( $_SESSION['acquire']['falldamage'] !== false ){
                                $_SESSION['health'] = ( $_SESSION['health'] - $_SESSION['temporary_airborne'] * 10 ) + round( $_SESSION['attributes']['agility'] / 100 );
                            }
                            unset( $_SESSION['temporary_airborne'] );
                        }
                    }
                }
                if( isset( $_SESSION['coords']["{$player['north']}"]['disp'] ) ){
                    $standingunderdisp = $_SESSION['coords']["{$player['north']}"]['disp'];
                    if( isset( $resourcetable["{$standingabovedisp}"]['type'] ) ){
                        $standingundertype = $resourcetable["{$standingabovedisp}"]['type'];
                    }
                }
                if( ! isset( $standingabovetype ) )  $standingabovetype = 'floor';
                if( $standingontype == 'ladder' )    $standingabovetype = 'floor';
                if( $standingabovetype == 'ladder' ) $standingontype = 'floor';
                if( $standingabovetype == 'floor' OR $standingontype == 'floor' OR $standingabovetype == 'wall'  ){}
                else{
                    if( $standingabovetype == 'water' ){}
                    else{
                        if( ! is_NULL( $standingabovedisp ) ){
                            $_SESSION['playerposition'] = $player['south'];
                            header( 'Location: ./' );
                        }
                    }
                }                
            }
        }

        $disp = 'disp';
        if( $_SESSION['worldpower'] !== true ){
            $disp = 'offdisp';        
            if( isset( $warp["{$_SESSION['playerposition']}"]['area'] ) ){
                if( isset( $warp["{$_SESSION['playerposition']}"]['power'] ) ){
                    $powercoord = isset( $warp["{$_SESSION['playerposition']}"]['power'][0] ) ? $warp["{$_SESSION['playerposition']}"]['power'][0] : NULL;
                    $powercord  = isset( $warp["{$_SESSION['playerposition']}"]['power'][1] ) ? $warp["{$_SESSION['playerposition']}"]['power'][1] : NULL;
                    if( isset( $_SESSION['coords']["{$powercoord}"] ) ){
                        $_SESSION['coords']["{$powercoord}"]['powered'] = true;
                        $_SESSION['turnbackon'] = true;
                        $_SEESSION['temp'] = 1;
                    }
                    
                }
                $_SESSION['area'] = $warp["{$_SESSION['playerposition']}"]['area'];
                unset( $_SESSION['start'] );
                header( 'Location: ./' );
            }                
        }

        /**
         *
         *

            Player positioning (cont) ~~~~~~~~~~~~~
            @since version alpha

            Various coordinates, originating from player position:
            see: $_SESSION['playerposition']

         *
         *
         */
        $playereast      = isset( $_SESSION['coords']["{$player['east']}"]["{$disp}"] )  ? $_SESSION['coords']["{$player['east']}"]["{$disp}"]  : NULL;
        $playerwest      = isset( $_SESSION['coords']["{$player['west']}"]["{$disp}"] )  ? $_SESSION['coords']["{$player['west']}"]["{$disp}"]  : NULL;
        $playernorth     = isset( $_SESSION['coords']["{$player['north']}"]["{$disp}"] ) ? $_SESSION['coords']["{$player['north']}"]["{$disp}"] : NULL;
        $playersouth     = isset( $_SESSION['coords']["{$player['south']}"]["{$disp}"] ) ? $_SESSION['coords']["{$player['south']}"]["{$disp}"] : NULL;
        $playereasttype  = isset( $resourcetable["{$playereast}"]['type'] )              ? $resourcetable["{$playereast}"]['type']              : NULL;
        $playerwesttype  = isset( $resourcetable["{$playerwest}"]['type'] )              ? $resourcetable["{$playerwest}"]['type']              : NULL;
        $playernorthtype = isset( $resourcetable["{$playernorth}"]['type'] )             ? $resourcetable["{$playernorth}"]['type']             : NULL;
        $playersouthtype = isset( $resourcetable["{$playersouth}"]['type'] )             ? $resourcetable["{$playersouth}"]['type']             : NULL;
    }

    # $_GET k/v pairs
    $grpA = 
    $grpB = 
    $grpC = 
    $grpD = [];
    $grps = [
        [ 'grpA', 1 ], # ?/1/2
        [ 'grpB', 3 ], # ?/*/*/3/4
        [ 'grpC', 5 ], # ?/*/*/*/*/5/6
        [ 'grpD', 7 ]  # ?/*/*/*/*/*/*/7/8
    ];

    $c = 0;
    foreach( $_GET as $k => $v ){

        # Truncate group
        if( $c != 0 ){
            continue;
        }

        $length = ( sizeOf( $grps ) * 7 ) + sizeOf( $grps );

        # Clean k(eys) and v(alues)
        $k = ltrim(
                rtrim(
                    $k,
                    '/'
                ),
                '/'
             );
        $k = explode(
                '/',
                substr(
                    preg_replace( 
                        '/[^a-z-0-9\/]/',
                        '',
                        $k
                    ), 
                    0, 
                    $length 
                )
            );
        $v = preg_replace(
                '/[^a-z-0-9\/]/',
                '',
                $v
             );

        # Check the current top/left positioning on map (corresponds to x/y)
        $checkdown  = $_SESSION['top'];  $checkleft  = $_SESSION['left'];
        $checkright = $_SESSION['left']; $checkup    = $_SESSION['top'];

        # Unset swap tiles when not actively in swap mode
        if( isset( $_SESSION['swap'] ) AND $k[0] != 'swap' )
            unset( $_SESSION['swap'] );

        $playerposition = $_SESSION['playerposition'];
        $ppc            = explode( '/', $playerposition );
        $ppcx           = (int)$ppc[0];
        $ppcy           = (int)$ppc[1];   

        if( ! empty( $_GET ) ){
            if( $k[0] == 'togglemap' ){
                $_SESSION['map_display'] = $_SESSION['map_display'] !== false ? (bool)false : (bool)true;
                _reload('./');
            }
            elseif( $k[0] == 'ui' ){
                $_SESSION['show_ui'] = $_SESSION['show_ui'] !== false ? (bool)false : (bool)true;
                header( 'Location: ./?x' );
            }
            elseif( $k[0] == 'cyclecode' ){
                if( isset( $_SESSION['examining'] ) ){
                    if( isset( $_SESSION['unlocked']["{$_SESSION['examining']}"] ) ){
                        $position = (int)$v;
                        if( isset( $_SESSION['unlocked']["{$_SESSION['examining']}"][$v] ) ){
                            $curcode = $_SESSION['unlocked']["{$_SESSION['examining']}"][$v];
                            if( $curcode < 9 )
                                $_SESSION['unlocked']["{$_SESSION['examining']}"][$v] = $curcode + 1;
                            if( $curcode == 9 )
                                $_SESSION['unlocked']["{$_SESSION['examining']}"][$v] = 0;
                        }
                    }
                }
                header( 'Location: ./' );
            }
            elseif( $k[0] == 'examine' ){
                if( isset( $examine["{$v}"] ) ){
                    $_SESSION['examining'] = $v;
                }
                header( 'Location: ./' );
            }
            # Toggle Resources display (in UI)
            elseif( $k[0] == 'resources' ){
                $_SESSION['show_resources'] = $_SESSION['show_resources'] !== false ? (bool)false : (bool)true;
                header( 'Location: ./' );
            }
            elseif( $k[0] == 'unhand' ){
                if( isset( $_SESSION['currentresource'] ) )
                    unset( $_SESSION['currentresource'] );
                header( 'Location: ./' );
            }










            /** movement
             *  @since version alpha
             *  @since va2
             */
            elseif( $k[0] == 'playerright' ){
                if( $ppcx == $xmax ){
                    $_SESSION['playerposition'] = "1/{$player['y']}";
                    $_SESSION['started']        = $_SESSION['started'] - ( 8 * 60 * 60 );
                    $_SESSION['temp']           = 1;
                }
                if( $ppcx < $xmax ){
                    $right = ( $ppcx + 1 ) . '/' . $ppcy;
                    if( isset( $_SESSION['coords']["{$right}"]["{$disp}"] ) ){
                        $move = true;
                        if( $move !== false ){
                            if( $playereasttype == 'air' OR $playereasttype == 'open' OR $playereasttype == 'ladder' ){

                            }
                            /** swim skill equates to water traversal
                             *  @since version alpha
                             */                             
                            elseif( $playereasttype == 'water' ){
                                if( isset( $resourcetable["{$playereast}"]['swim'] ) ){
                                    if( $resourcetable["{$playereast}"]['swim'] > $_SESSION['skills']['swimming'] ){
                                        $move = false;
                                    }
                                }
                            }
                            else{
                                $move = false;
                            }
                        }
                        if( $_SESSION['coords']["{$right}"]['decay'] <= 0 ){
                            $move = true;
                        }
                        if( $move !== false ){
                            if( isset( $_SESSION['examining'] ) ) unset($_SESSION['examining']);
                            _attrup( [ 'attr' => 'stamina' ] );
                            $_SESSION['steps'] = $_SESSION['steps'] + 1;
                            if( $_SESSION['combat']['currently'] !== true ){
                                $_SESSION['combat']['steps_since_last'] = $_SESSION['combat']['steps_since_last'] + 1;
                            }
                            $_SESSION['playerposition'] = $right;
                        }
                    }
                }
                header( 'Location: ./' );
            }
            elseif( $k[0] == 'playerleft' ){
                if( $ppcx == 1 ){
                    $_SESSION['playerposition'] = "{$xmax}/{$player['y']}";
                    $_SESSION['temp'] = 1;
                    $season = $_SESSION['current_season'];
                    switch( $season ){
                        case 'autumn': $_SESSION['current_season'] = 'winter'; break;
                        case 'winter': $_SESSION['current_season'] = 'spring'; break;
                        case 'spring': $_SESSION['current_season'] = 'summer'; break;
                        case 'summer': $_SESSION['current_season'] = 'autumn'; break;
                    }
                }            
                if( $ppcx > 1 ){
                    $left = ($ppcx-1).'/'.$ppcy;
                    if( isset( $_SESSION['coords']["{$left}"]["{$disp}"] ) ){
                        $move = true;
                        if( $move !== false ){
                            if( $playerwesttype == 'air' OR $playerwesttype == 'open' OR $playerwesttype == 'ladder' ){

                            }
                            /** swim skill equates to water traversal
                             *  @since va2:
                             */                             
                            elseif( $playerwesttype == 'water' ){
                                if( isset( $resourcetable["{$playerwest}"]['swim'] ) ){
                                    if( $resourcetable["{$playerwest}"]['swim'] > $_SESSION['skills']['swimming'] ){
                                        $move = false;
                                    }
                                }
                            }
                            else{
                                $move = false;
                            }
                        }
                        if( $_SESSION['coords']["{$left}"]['decay'] <= 0 ){
                            $move = true;
                        }
                        if( $move !== false ){
                            if( isset( $_SESSION['examining'] ) ) unset($_SESSION['examining']);
                            _attrup( [ 'attr' => 'stamina' ] );
                            $_SESSION['steps'] = $_SESSION['steps'] + 1;
                            if( $_SESSION['combat']['currently'] !== false ){
                                $_SESSION['combat']['steps_since_last'] = 0;
                            }
                            else{
                                $_SESSION['combat']['steps_since_last'] = $_SESSION['combat']['steps_since_last'] + 1;
                            }
                            $_SESSION['playerposition'] = $left;
                        }
                    }
                }
                header( 'Location: ./' );
            }
            elseif( $k[0] == 'playerup' ){
                if( $ppcy > 1 ){
                    $up = $ppcx.'/'.$ppcy-1;
                    if( isset( $_SESSION['coords']["{$up}"]["{$disp}"] ) ){
                        $move = true;
                        if( $move !== false ){
                            if( $playernorthtype == 'air' OR $playernorthtype == 'open' OR $playernorthtype == 'ladder' ){

                            }
                            /** swim skill equates to water traversal
                             *  @since va2:
                             */                             
                            elseif( $playernorthtype == 'water' ){
                                if( isset( $resourcetable["{$playernorth}"]['swim'] ) ){
                                    if( $resourcetable["{$playernorth}"]['swim'] > $_SESSION['skills']['swimming'] ){
                                        $move = false;
                                    }
                                }
                            }

                            else{
                                $move = false;
                            }
                        }
                        if( $_SESSION['coords']["{$up}"]['decay'] <= 0 ){
                            $move = true;
                        }
                        if( $move !== false ){
                            if( isset( $_SESSION['examining'] ) ){
                                unset($_SESSION['examining']);
                            }
                            _attrup( [ 'attr' => 'stamina' ] );
                            $_SESSION['steps'] = $_SESSION['steps'] + 1;
                            if( $_SESSION['combat']['currently'] !== false ){
                                $_SESSION['combat']['steps_since_last'] = 0;
                            }
                            else{
                                $_SESSION['combat']['steps_since_last'] = $_SESSION['combat']['steps_since_last'] + 1;
                            }
                            $_SESSION['playerposition'] = $up;
                        }
                    }
                }
                header( 'Location: ./' );
            }
            elseif( $k[0] == 'playerdown' ){
                if( $ppcy == $ymax ){
                    unset( $_SESSION['start'] );
                    unset( $_SESSION['coords'] );
                    $_SESSION['playerposition'] = "{$player['x']}/4";
                    $_SESSION['temp'];
                    
                    $areascore = $_SESSION['score_area'] > 0 ? $_SESSION['score_area'] : 0;
                    $availscore = $_SESSION['score_avail'] > 0 ? $_SESSION['score_avail'] : 0;
                    
                    $_SESSION['score_total'] = $areascore + $availscore;
                    $_SESSION['score_area']  = 0;
                    $_SESSION['area'] = $_SESSION['area'] + 1;
                    $_SESSION['arrived'] = time();
                    header( 'Location: ./' );
                }
                else{
                    $down = $ppcx.'/'.$ppcy+1;
                    if( isset( $_SESSION['coords']["{$down}"]["{$disp}"] ) ){
                        $move = true;
                        if( $move !== false ){
                            if( $playersouthtype == 'air' OR $playersouthtype == 'open' OR $playersouthtype == 'ladder' ){

                            }
                            /** swim skill equates to water traversal
                             *  @since va2:
                             */                             
                            elseif( $playersouthtype == 'water' ){
                                if( isset( $resourcetable["{$playersouth}"]['swim'] ) ){
                                    if( $resourcetable["{$playersouth}"]['swim'] > $_SESSION['skills']['swimming'] ){
                                        $move = false;
                                    }
                                }
                            }
                            else{
                                $move = false;
                            }
                        }
                        if( $_SESSION['coords']["{$down}"]['decay'] <= 0 ){
                            $move = true;
                        }
                        if( $move !== false ){
                            if( isset( $_SESSION['examining'] ) ) unset($_SESSION['examining']);
                            _attrup( [ 'attr' => 'stamina' ] );
                            $_SESSION['steps'] = $_SESSION['steps'] + 1;
                            if( $_SESSION['combat']['currently'] !== false ){
                                $_SESSION['combat']['steps_since_last'] = 0;
                            }
                            else{
                                $_SESSION['combat']['steps_since_last'] = $_SESSION['combat']['steps_since_last'] + 1;
                            }
                            $_SESSION['playerposition'] = $down;
                        }
                    }
                }
                header( 'Location: ./' );
            }










            elseif( $k[0] == 'resource' ){
                if( isset( $k[1] ) ){
                    if( isset( $resourcetable ) ){
                        if( isset( $resourcetable["{$k[1]}"] ) ){
                            $cr = NULL;
                            if( isset( $_SESSION['currentresource'] ) )
                                $cr = $_SESSION['currentresource'];
                            
                            if( $cr != $k[1] )
                                $_SESSION['currentresource'] = $k[1];
                            else
                                unset( $_SESSION['currentresource'] );
                            header( 'Location: ./' );
                        }
                    }
                }
            }
            elseif( $k[0] == 'turnoff' ){
                if( isset( $k[1] ) ){
                    if( $k[1] == 'action' ){
                        $_SESSION['acquire']['action'] = false;
                    }
                    if( $k[1] == 'encounters' ){
                        $_SESSION['acquire']['encounters'] = false;
                    }
                    if( $k[1] == 'falldamage' ){
                        $_SESSION['acquire']['falldamage'] = false;
                    }
                    if( $k[1] == 'resources' ){
                        $_SESSION['acquire']['resources'] = false;
                    }
                    if( $k[1] == 'score' ){
                        $_SESSION['acquire']['score'] = false;
                    }
                    header( 'Location:./' );
                }
            }
            elseif( $k[0] == 'turnon' ){
                if( isset( $k[1] ) ){
                    if( $k[1] == 'gravity' ){
                        $_SESSION['acquire']['gravity'] = true;
                    }
                    header( 'Location:./' );
                }
            }
            elseif( $k[0] == 'destroy' ){
                if( isset( $k[1] ) AND isset( $k[2] ) ){
                    if( isset( $_SESSION['coords']["{$k[1]}/{$k[2]}"] ) ){
                        $_SESSION['coords']["{$k[1]}/{$k[2]}"] = [
                            'decay'   => _decay(),
                            'disp'    => 'nothingbarrier',
                            'born'    => time(),
                            'offdisp' => 'powerless',
                            'powered' => true,
                        ];
                    }
                    header( 'Location:./?destroy' );
                }
            }
            elseif( $k[0] == 'swap' ){
                if( isset( $k[1] ) AND isset( $k[2] ) ){
                    if( isset( $_SESSION['coords']["{$k[1]}/{$k[2]}"] ) ){
                        $_SESSION['swap'] = "{$k[1]}/{$k[2]}";
                        if( isset( $k[3] ) AND isset( $k[4] ) ){
                            if( isset( $_SESSION['coords']["{$k[1]}/{$k[2]}"] ) ){
                                if( isset( $_SESSION['coords']["{$k[3]}/{$k[4]}"] ) ){
                                    $_SESSION['coords']['holdmeforasecond'] = $_SESSION['coords']["{$k[1]}/{$k[2]}"];
                                    $_SESSION['coords']["{$k[1]}/{$k[2]}"] = $_SESSION['coords']["{$k[3]}/{$k[4]}"];
                                    $_SESSION['coords']["{$k[3]}/{$k[4]}"] = $_SESSION['coords']['holdmeforasecond'];
                                    unset( $_SESSION['coords']['holdmeforasecond'] );
                                    unset( $_SESSION['swap'] );
                                    header( 'Location:./?swap' );
                                }
                            }
                        }
                    }
                }
            }
            elseif( $k[0] == 'jump' ){
                if( isset( $k[1] ) AND isset( $k[2] ) ){
                    if( $_SESSION['acquire']['action'] !== false ){
                        if( $_SESSION['action'] > 0 ){
                            if( isset( $_SESSION['coords']["{$k[1]}/{$k[2]}"] ) ){
                                $xdif = $k[1] > $ppcx ? $k[1] - $ppcx : $ppcx - $k[1];
                                $ydif = $k[2] > $ppcy ? $k[2] - $ppcy : $ppcy - $k[2];
                                $distance = ( $xdif + $ydif ) * 10;
                                if( ( $_SESSION['action'] - $distance ) < 0 ){
                                    
                                }
                                else{
                                    $_SESSION['action'] = $_SESSION['action'] - $distance;
                                    $_SESSION['playerposition'] = "{$k[1]}/{$k[2]}";
                                    _attrup( [ 'attr' => 'agility' ] );
                                    header( 'Location:./?jump' );
                                }
                            }
                        }
                    }
                    else{
                        $_SESSION['playerposition'] = "{$k[1]}/{$k[2]}";
                        _attrup( [ 'attr' => 'agility' ] );
                        header( 'Location:./?jump' );
                    }
                }                    
            }
            elseif( $k[0] == 'tunnel' ){
                if( isset( $k[1] ) AND isset( $k[2] ) ){
                    if( isset( $_SESSION['coords']["{$k[1]}/{$k[2]}"] ) ){
                        $_SESSION['coords']["{$k[1]}/{$k[2]}"] = [
                            'decay'   => _decay(),
                            'disp'    => 'tunnel',
                            'born'    => time(),
                            'offdisp' => 'tunnel',
                            'powered' => true,
                        ];
                    }
                    header( 'Location:./?tunnel' );
                }
            }
            elseif( $k[0] == 'ladder' ){
                if( isset( $k[1] ) AND isset( $k[2] ) ){
                    if( isset( $_SESSION['coords']["{$k[1]}/{$k[2]}"] ) ){
                        $_SESSION['coords']["{$k[1]}/{$k[2]}"] = [
                            'decay'   => _decay(),
                            'disp'    => 'ladder',
                            'born'    => time(),
                            'offdisp' => 'ladder',
                            'powered' => true,
                        ];
                    }
                    header( 'Location:./?ladder' );
                }
            }
            elseif( $k[0] == 'coord' ){
                if( isset( $k[1] ) AND isset( $k[2] ) ){
                    if( isset( $player['nearby'] ) ){
                        if( in_array( $k[1].'/'.$k[2], $player['nearby'] ) ){
                            if( (int)$k[1] >= 0 AND (int)$k[2] >= 0 ){
                                if( isset( $_SESSION['streakcoord'] ) ){
                                    if( $_SESSION['streakcoord'] == $k[1].'/'.$k[2] ){
                                        $_SESSION['streak'] = $_SESSION['streak'] + 1;
                                    }
                                    else{
                                        $_SESSION['streak'] = 0;
                                    }
                                }
                                $_SESSION['currentcoord'] = $k[1].'/'.$k[2];
                                $_SESSION['streakcoord'] =  $k[1].'/'.$k[2];
                                if( isset( $_SESSION['coords']["{$_SESSION['currentcoord']}"]["{$disp}"] ) ){
                                    $curcoord = $_SESSION['coords']["{$_SESSION['currentcoord']}"]["{$disp}"];
                                    if( $curcoord == 'enrichedsoil' ){
                                        $_SESSION['currentcoordb'] = $_SESSION['currentcoord'];
                                    }
                                }





                                /** combat
                                 *  @since va2
                                 */
                                if( isset( $_SESSION['coords']["{$_SESSION['currentcoord']}"]['decay'] ) ){
                                    if( $_SESSION['coords']["{$_SESSION['currentcoord']}"]['decay'] > 0 ){ 
                                        $_SESSION['combat']['last'] = time();
                                        $to = $_SESSION['currentcoord'];
                                        $mobcoords = explode( '/', $to );
                                        $mobx      = $mobcoords[0];
                                        $moby      = $mobcoords[1];
                                        $extradecay = 0;
                                        if( _random( [ 'lucky' => $_SESSION['attributes']['luck'], 'nothing' => 100 ] ) == 'lucky' ){
                                            _attrup( [ 'attr' => 'luck' ] );
                                            $_SESSION['action'] = $_SESSION['action'] + 15;
                                            $extradecay = 2;
                                        }
                                        $hit = true;
                                        if( $moby > $ppcy ){
                                            if( $mobx == $ppcx ){
                                                $ny  = $ppcy + 2;
                                                $nny = $ppcy + 3;
                                                if( isset( $_SESSION['coords']["{$ppcx}/{$ny}"]['decay'] ) ){ 
                                                    $_SESSION['coords']["{$ppcx}/{$ny}"]['decay'] = $_SESSION['coords']["{$ppcx}/{$ny}"]['decay'] + 2 + $extradecay;
                                                }
                                                if( isset( $_SESSION['coords']["{$ppcx}/{$nny}"]['decay'] ) ){ 
                                                    $_SESSION['coords']["{$ppcx}/{$nny}"]['decay'] = $_SESSION['coords']["{$ppcx}/{$nny}"]['decay'] + 1 + $extradecay;
                                                }
                                            }
                                        }
                                        if( $moby == $ppcy ){
                                            if( $mobx > $ppcx ){
                                                $nx  = $ppcx + 2;
                                                $nnx = $ppcx + 3;
                                                if( isset( $_SESSION['coords']["{$nx}/{$ppcy}"]['decay'] ) ){ 
                                                    $_SESSION['coords']["{$nx}/{$ppcy}"]['decay'] = $_SESSION['coords']["{$nx}/{$ppcy}"]['decay'] + 2 + $extradecay;
                                                }
                                                $secondarychance = ( $_SESSION['attributes']['luck'] + $_SESSION['attributes']['precision'] );
                                                
                                                    $secondarychance = $secondarychance / $_SESSION['attributes']['strength'];
                                                
                                                $secondarynothing = 100 - $secondarychance;
                                                if( _random( [ 'secondary' => $secondarychance, 'nothing' => $secondarynothing ] ) == 'secondary' ){
                                                    if( isset( $_SESSION['coords']["{$nnx}/{$ppcy}"]['decay'] ) ){ 
                                                        $_SESSION['coords']["{$nnx}/{$ppcy}"]['decay'] = $_SESSION['coords']["{$nnx}/{$ppcy}"]['decay'] + 1 + $extradecay;
                                                    }
                                                }
                                            }
                                        }
                                        if( $mob > $ppcy ){
                                            
                                        }
                                        if( $hit !== false ){
                                            $mobtype = $_SESSION['coords']["{$to}"]['disp'];
                                            
                                                $toplayerhit     = isset( $resourcetable["{$mobtype}"]['mob']['dealing']['hit']     ) ? $resourcetable["{$mobtype}"]['mob']['dealing']['hit']     : 1;
                                                $toplayerstr     = isset( $resourcetable["{$mobtype}"]['mob']['dealing']['str']     ) ? $resourcetable["{$mobtype}"]['mob']['dealing']['str']     : 1;
                                                $toplayercrit    = isset( $resourcetable["{$mobtype}"]['mob']['dealing']['crit']    ) ? $resourcetable["{$mobtype}"]['mob']['dealing']['crit']    : 1;
                                                $fromplayerblock = isset( $resourcetable["{$mobtype}"]['mob']['receiving']['block'] ) ? $resourcetable["{$mobtype}"]['mob']['receiving']['block'] : 1;
                                                $fromplayerdodge = isset( $resourcetable["{$mobtype}"]['mob']['receiving']['dodge'] ) ? $resourcetable["{$mobtype}"]['mob']['receiving']['dodge'] : 1;
                                                $hitplayerfor    = isset( $resourcetable["{$mobtype}"]['mob']['reverb']             ) ? $resourcetable["{$mobtype}"]['mob']['reverb']             : 1;
                                                
                                                $mobdodgechance  = $fromplayerdodge + (int)".0{$_SESSION['area']}";
                                                $mobblockvalue   = 0;
                                                $reverb          = 0;
                                                if( $toplayerstr > 0 ){
                                                    $mobblockchance  = $fromplayerblock + ( $toplayerstr );
                                                    $mobblockvalue   = $toplayerstr * mt_rand( 1, 3 );
                                                }
                                                if( _random( [ 'block' => $mobblockchance, 'dodge' => $dodgechance, 'hit' => 100 ] ) == 'hit' ){
                                                    $mobhitfor = $_SESSION['attributes']['strength'] * 3 - $mobblockvalue;
                                                    if( $hitplayerfor > 0 ){
                                                        $reverb = ( $mobhitfor * $hitplayerfor ) / 100;
                                                    }
                                                }
                                                $_SESSION['coords']["{$to}"]['decay'] = $_SESSION['coords']["{$to}"]['decay'] - $mobhitfor - $extradecay;
                                                $_SESSION['health'] = $_SESSION['health'] - $reverb;
                                            
                                            
                                            
                                            
                                            _attrup( [ 'attr' => 'strength' ] );
                                            _attrup( [ 'attr' => 'stamina'  ] );
                                            if( $_SESSION['coords']["{$to}"]['decay'] <= 0 ){
                                                $_SESSION['coords']["{$_SESSION['currentcoord']}"]['decay'] = 0;
                                                $_SESSION['exp'] = $_SESSION['exp'] + (int)"{$_SESSION['area']}0";
                                                if( _random( [ 'lucky' => $_SESSION['attributes']['luck'], 'nothing' => 1000 ] ) == 'lucky' ){
                                                    $_SESSION['exp'] = $_SESSION['exp'] + ( (int)"{$_SESSION['area']}0" * 2 );
                                                }
                                            }
                                        }
                                    }
                                        #$player = _player();
                                }





                            }
                        }
                    }
                    header( 'Location: ./' );
                }            
            }
            elseif( $k[0] == 'minicoord' ){
                if( isset( $k[1] ) AND isset( $k[2] ) ){
                    if( (int)$k[1] >= 0 AND (int)$k[2] >= 0 ){
                        $_SESSION['currentcoord'] = $k[1].'/'.$k[2];
                        if( isset( $_SESSION['coords']["{$_SESSION['currentcoord']}"]["{$disp}"] ) ){
                            $curcoord = $_SESSION['coords']["{$_SESSION['currentcoord']}"]["{$disp}"];
                            if( $curcoord == 'enrichedsoil' ){
                                $_SESSION['currentcoordb'] = $_SESSION['currentcoord'];
                            }
                        }
                    }
                }
            }        
            else{
                foreach( $grps as $g ){
                    //truncate values
                    if( isset( $k[$g[1] - 1] ) ){
                        ${$g[0]}[0]=(int)substr( $k[$g[1]-1], 0,7 );
                    }
                    //truncate values
                    if( isset( $k[$g[1]]) ){
                        ${$g[0]}[1] = (int)substr( $k[$g[1]], 0, 7 );
                    }
                }
            }
        }

    }

    $posA = 'h'; 
    $selA = 0;
    if( isset( $_SESSION['playerposition'] ) ){
        $standingon = $_SESSION['coords']["{$_SESSION['playerposition']}"]["{$disp}"];
        $_SESSION['standingon'] = $standingon;
    }
    if( isset( $_SESSION['map_display'] ) ){
        if( $_SESSION['map_display'] !== false ){
            if( isset( $_SESSION['standingon'] ) ){
                if( isset( $data["{$_SESSION['standingon']}"] ) ){
                    $posA = $_SESSION['standingon'];
                }
            }
        }
        else{
            if( isset( $grpA[0] ) ){ $posA = $grpA[0];}
            if( isset( $grpA[1] ) ){ $selA = $grpA[1];}
        }
    }

    if( ! isset( $data ) ) $data = [];
    $dat = isset( $data[0] ) ? $data[0] : $data;
    $dat = isset( $data[$posA] ) ? $data[$posA] : $dat;
    if( !isset( $dat[$posA] ) ){ $grpA = []; }
    $posB  = isset( $grpB[0] )     ? $grpB[0] : NULL;
    $title = isset( $dat['t'][0] ) ? htmlentities( $dat['t'][0], ENT_QUOTES|ENT_IGNORE, 'utf-8') : 'o u o';
}

session:{
    $disp = $_SESSION['worldpower'] !== false ? 'disp' : 'offdisp';
    $directions = ['northeast','northwest','southeast','southwest','north','south','east','west'];




    
    if( ! isset( $_SESSION['started'] ) ){
        $_SESSION = [
            'acquire' => [
                'action'     => true,
                'encounters' => true,
                'falldamage' => true,
                'gravity'    => false,
                'resources'  => true,
                'score'      => true
            ],
            'exp' => 0,
            'lvl' => 1,
            'attributes' => [
                'constitution' => 7,
                'stamina'      => 7,
                'strength'     => 13,
                'agility'      => 10,
                'precision'    => 7,
                'luck'         => 1
            ],
            'area'           => 1,
            'arrived'        => time(),
            'coords'         => [],
            'dead'           => false,
            'died'           => 0,
            'id'             => time() . mt_rand( 0, 1024 ),
            'left'           => 0,
            'map_display'    => true,
            'playerposition' => '1/4',
            'rain_ended'     => time(),
            'resources'      => [],
            'current_season' => 'autumn',
            'show_resources' => isset( $_SESSION['show_resources'] ) ? $_SESSION['show_resources'] : true,
            'skills' => [
                'fishing'    => 1,
                'mining'     => 1,
                'scavenging' => 1,
                'swimming'   => 1
            ],
            'score_area'        => 0,
            'score_avail'       => 0,
            'score_total'       => 0,
            'show_ui'           => true,
            'started'           => time(),
            'temp'              => 1,
            'top'               => 0,
            'totalfish'         => 0,
            'totalharvest'      => 0,
            'totalscavenge'     => 0,
            'totalwatersources' => 0,
            'worldpower'        => true,
            'steps'             => 0,
            'combat' => [
                'currently'        => false,
                'last'             => time(),
                'lost'             => 0,
                'ran'              => 0,
                'steps_since_last' => 0,
                'times'            => 0,
                'won'              => 0,
            ]
        ];
        if( isset( $resourcctable ) ){
            foreach( $resourcctable as $k => $v ){
                if( ! isset( $_SESSION['resources']["{$k}"] ) )
                    $_SESSION['resources']["{$k}"] = 0;
            }
        }
    }




    
    if( $_SESSION['combat']['currently'] !== true ){
        $stepssincelastcombat = $_SESSION['combat']['steps_since_last'];
        $timesincelastcombat  = time() - $_SESSION['combat']['last'];
        if( $_SESSION['acquire']['encounters'] !== false ){
            if( $timesincelastcombat > 60 ){
                if( _random( [ true => $stepssincelastcombat, false => ( 100 - $stepssincelastcombat ) ] ) !== false ){
                    $_SESSION['combat']['currently'] = true;
                }
                header( 'Location: ./' );
            }
        }
    }





    $currentresource = NULL;
    if( isset( $_SESSION['currentresource'] ) ){
        $currentresource = $_SESSION['currentresource'];
        if( ! isset( $_SESSION['resources']["{$currentresource}"] ) ){
            unset( $_SESSION['currentresource'] );
        }
        else {
            if( $_SESSION['resources']["{$currentresource}"] < 1 )
                unset( $_SESSION['currentresource'] );
        }
    }





    $currentcoord = NULL;
    if( isset( $_SESSION['currentcoord'] ) ){
        $currentcoord = $_SESSION['currentcoord'];
        $currentcoord = $_SESSION['coords']["{$currentcoord}"]["{$disp}"];
        # This advances time when you sleep in a bed
        if( $currentcoord == 'bed' ){
            $_SESSION['started'] = $_SESSION['started'] - 8*60*60;
            header( 'Location: ./' );
        }
        # This opens a door when you click on it
        if( $currentcoord == 'door' ){
            $_SESSION['coords']["{$_SESSION['currentcoord']}"]["{$disp}"] = 'dooropen';
            unset($_SESSION['currentcoord']);
            header( 'Location: ./' );
        }
        # This closes an open door when you click on it
        if( $currentcoord == 'dooropen' ){
            $_SESSION['coords']["{$_SESSION['currentcoord']}"]["{$disp}"] = 'door';
            unset($_SESSION['currentcoord']);
            header( 'Location: ./' );
        }
    }





    if( ! isset( $_SESSION['currentresource'] ) ){
        if( isset( $_SESSION['currentcoordb'] ) ){
            if( isset( $_SESSION['currentcoordb'] ) ){
                $coords = explode( '/', $_SESSION['currentcoordb'] );
                $x = $coords[0];
                $y = $coords[1];
                $xn = $x + 1;
                $xnn = $x + 2;
                $xnnn = $x + 3;
                $xp = $x - 1;
                $xpp = $x - 2;
                $xppp = $x - 3;
                $yn = $y + 1;
                $ynn = $y + 2;
                $ynnn = $y + 3;
                $yp = $y - 1;
                $ypp = $y - 2;
                $yppp = $y - 3;
                $coordnorth  = "{$x}/{$yp}";
                $coordnorth2 = "{$x}/{$ypp}";
                $coordnorth3 = "{$x}/{$yppp}";
                $coordsouth  = "{$x}/{$yn}";
                $coordsouth2 = "{$x}/{$ynn}";
                $coordsouth3 = "{$x}/{$ynnn}";
                $coordeast   = "{$xn}/{$y}";
                $coordeast2  = "{$xnn}/{$y}";
                $coordeast3  = "{$xnnn}/{$y}";
                $coordwest   = "{$xp}/{$y}";
                $coordwest2  = "{$xpp}/{$y}";
                $coordwest3  = "{$xppp}/{$y}";
                $coordnortheast = "{$xn}/{$yp}";
                $coordnorthwest = "{$xp}/{$yp}";
                $coordsouthwest = "{$xp}/{$yn}";
                $coordsoutheast = "{$xn}/{$yn}";
                $north       = isset( $_SESSION['coords']["{$x}/{$yp}"]["{$disp}"] )  ? $_SESSION['coords']["{$x}/{$yp}"]["{$disp}"]  : NULL;
                $north2      = isset( $_SESSION['coords']["{$x}/{$ypp}"]["{$disp}"] )  ? $_SESSION['coords']["{$x}/{$ypp}"]["{$disp}"]  : NULL;
                $north3      = isset( $_SESSION['coords']["{$x}/{$yppp}"]["{$disp}"] )  ? $_SESSION['coords']["{$x}/{$yppp}"]["{$disp}"]  : NULL;
                $northwest   = isset( $_SESSION['coords']["{$xp}/{$yp}"]["{$disp}"] ) ? $_SESSION['coords']["{$xp}/{$yp}"]["{$disp}"] : NULL;
                $northeast   = isset( $_SESSION['coords']["{$xn}/{$yp}"]["{$disp}"] ) ? $_SESSION['coords']["{$xn}/{$yp}"]["{$disp}"] : NULL;
                $south       = isset( $_SESSION['coords']["{$x}/{$yn}"]["{$disp}"] )  ? $_SESSION['coords']["{$x}/{$yn}"]["{$disp}"]  : NULL;
                $south2      = isset( $_SESSION['coords']["{$x}/{$ynn}"]["{$disp}"] )  ? $_SESSION['coords']["{$x}/{$ynn}"]["{$disp}"]  : NULL;
                $south3      = isset( $_SESSION['coords']["{$x}/{$ynnn}"]["{$disp}"] )  ? $_SESSION['coords']["{$x}/{$ynnn}"]["{$disp}"]  : NULL;
                $southeast   = isset( $_SESSION['coords']["{$xn}/{$yn}"]["{$disp}"] ) ? $_SESSION['coords']["{$xn}/{$yn}"]["{$disp}"] : NULL;
                $southwest   = isset( $_SESSION['coords']["{$xp}/{$yp}"]["{$disp}"] ) ? $_SESSION['coords']["{$xp}/{$yp}"]["{$disp}"] : NULL;
                $east        = isset( $_SESSION['coords']["{$xn}/{$y}"]["{$disp}"] )  ? $_SESSION['coords']["{$xn}/{$y}"]["{$disp}"]  : NULL;
                $east2       = isset( $_SESSION['coords']["{$xnn}/{$y}"]["{$disp}"] )  ? $_SESSION['coords']["{$xnn}/{$y}"]["{$disp}"]  : NULL;
                $east3       = isset( $_SESSION['coords']["{$xnnn}/{$y}"]["{$disp}"] )  ? $_SESSION['coords']["{$xnnn}/{$y}"]["{$disp}"]  : NULL;
                $west        = isset( $_SESSION['coords']["{$xp}/{$y}"]["{$disp}"] )  ? $_SESSION['coords']["{$xp}/{$y}"]["{$disp}"]  : NULL;
                $west2       = isset( $_SESSION['coords']["{$xpp}/{$y}"]["{$disp}"] )  ? $_SESSION['coords']["{$xpp}/{$y}"]["{$disp}"]  : NULL;
                $west3       = isset( $_SESSION['coords']["{$xppp}/{$y}"]["{$disp}"] )  ? $_SESSION['coords']["{$xppp}/{$y}"]["{$disp}"]  : NULL;
                if( isset( $_SESSION['code']["{$_SESSION['currentcoordb']}"] ) ){
                    $_SESSION['power']["{$_SESSION['currentcoordb']}"] = 
                        $_SESSION['power']["{$_SESSION['currentcoordb']}"] < 9 ?
                        $_SESSION['power']["{$_SESSION['currentcoordb']}"] + 1 : 0;
                    unset( $_SESSION['currentcoordb'] );
                    unset( $_SESSION['currentcoord'] );
                    header( 'Location: ./' );
                }
                else{
                    $_SESSION['code']["{$_SESSION['currentcoordb']}"] = mt_rand(0,9);
                    unset( $_SESSION['currentcoord'] );
                    unset( $_SESSION['currentcoordb'] );
                }
            }
        }
    }





    if( ! is_NULL( $currentresource ) ){
        if( isset( $_SESSION['currentcoord'] ) ){
            if( isset( $_SESSION['coords']["{$_SESSION['currentcoord']}"]["{$disp}"] ) ){
                if( $currentresource == 'water' ){
                    if( (int)$_SESSION['resources']['water'] > 0 ){
                        $_SESSION['resources']['water'] = $_SESSION['resources']['water'] - 1;
                        $_SESSION['coords']["{$_SESSION['currentcoord']}"]["{$disp}"] = 'water';
                    }
                    unset( $_SESSION['currentcoord'] );
                }
                if( isset( $resourcetable ) ){
                    if( isset( $resourcetable["{$currentresource}"]['case']['combine'] ) ){
                        foreach( $resourcetable["{$currentresource}"]['case']['combine'] as $if => $then ){
                            if( $_SESSION['coords']["{$_SESSION['currentcoord']}"]["{$disp}"] == $if ){
                                if( $_SESSION['resources']["{$currentresource}"] > 0 ){
                                    $_SESSION['resources']["{$currentresource}"] = $_SESSION['resources']["{$currentresource}"] - 1;
                                    _tileupdate( [ 'coords' => $_SESSION['currentcoord'], 'type' => $then ] );
                                    unset( $_SESSION['currentcoord'] );
                                    _reload('./');
                                }
                                else{
                                    unset( $_SESSION['currentresource'] );
                                }
                            }
                        }
                    }
                    else{
                        _tileupdate( [ 'coords' => $_SESSION['currentcoord'], 'type' => $currentresource ] );
                    }
                }
            }
            _reload('./');
        }
    }





    /** fishing, harvesting, & scavenging
     *  @since v-alpha ~~~~~~~~~~~~~~~~~~
     *  @since va2:
     *    Unset default values after
     */
    fhsdefaults:{
        $amt      = 1;
        $canbreak = false;
        $canharv  = true;
        $channelresources = [
            'channelcrawler' => 15, 'channelsand'  => 45,
            'channelswimmer' => 25, 'channelwater' => 60
        ];
        $scavengeresources = [
            'bones'   => 5,
            'clam'    => 1,  'crab'       => 1,
            'sand'    => 99, 'sanddollar' => 1,
            'scallop' => 1,  'seastar'    => 1,
            'shells'  => 49, 'starfish'   => 1
        ];
    }
    /** Player is currently NOT 'holding' a resource
     * 
     */
    if( ! isset( $_SESSION['currentresource'] ) ){
        if( isset( $_SESSION['currentcoord'] ) ){
            if( isset( $_SESSION['coords']["{$_SESSION['currentcoord']}"]["{$disp}"] ) ){
                $check = $_SESSION['coords']["{$_SESSION['currentcoord']}"]["{$disp}"];
                if( isset( $resourcetable["{$check}"] ) ){
                    $res  = $check;
                    $harv = NULL;
                    if( isset( $resourcetable["{$check}"]['res'] ) ){
                        $res = $resourcetable["{$check}"]['res'];
                    }
                    if( isset( $resourcetable["{$check}"]['harv'] ) ){
                        $harv = $resourcetable["{$check}"]['harv'];
                    }
                    if( isset( $resourcetable["{$check}"]['amt'] ) ){
                        $amt = $resourcetable["{$check}"]['amt'];
                    }
                    if( $res == 'shallow' OR $res == 'channel' ){
                        if( $res == 'shallow' ){
                            if( $_SESSION['coords']["{$_SESSION['currentcoord']}"]['fish'] > 0 ){
                                $_SESSION['coords']["{$_SESSION['currentcoord']}"]['fish'] = $_SESSION['coords']["{$_SESSION['currentcoord']}"]['fish'] - 1;
                                $scavenge = _random( $scavengeresources );    
                                if( $scavenge == 'sand' OR $scavenge == 'bones' ){}else{
                                    $_SESSION['skills']['scavenging'] = $_SESSION['skills']['scavenging'] + _random( [ 1 => 99, 2 => 1 ] );
                                }
                                if( ! isset( $_SESSION['resources']["{$scavenge}"] ) ){
                                    if( $_SESSION['acquire']['resources'] !== false ){
                                        $_SESSION['resources']["{$scavenge}"] = 1;
                                    }
                                }
                            }
                        }
                        elseif( $res == 'channel' ){
                            if( $_SESSION['channel']["{$_SESSION['currentcoord']}"]['fish'] > 0 ){
                                $_SESSION['channel']["{$_SESSION['currentcoord']}"]['fish'] = $_SESSION['channel']["{$_SESSION['currentcoord']}"]['fish'] - 1;
                                $fishout = _random( $channelresources );    
                                if( ! isset( $_SESSION['skills']['fishing'] ) ){
                                    $_SESSION['skills']['fishing'] = 1;
                                }
                                else{
                                    if( $fishout == 'channelswimmer' OR $fishout == 'channelcrawler' )
                                        $_SESSION['skills']['fishing'] = $_SESSION['skills']['fishing'] + _random( [ 1 => 99, 2 => 1 ] );
                                }

                                if( isset( $_SESSION['resources']["{$fishout}"] ) ){
                                    if( $_SESSION['acquire']['resources'] !== false ){
                                        $_SESSION['resources']["{$fishout}"] = $_SESSION['resources']["{$fishout}"] + 1;
                                    }
                                }
                                else{
                                    if( $_SESSION['acquire']['resources'] !== false ){
                                        $_SESSION['resources']["{$fishout}"] = 1;
                                    }
                                }
                            }
                        }
                        unset( $_SESSION['currentcoord'] );
                        _reload('./');
                    }
                    else{
                        $break   = 1;
                        $canharv = false;
                        if( $_SESSION['action'] > 0 ){
                            if( $_SESSION['acquire']['action'] !== false ){
                                $_SESSION['action'] = $_SESSION['action'] - 5;
                            }
                            if( isset( $_SESSION['attributes']['strength'] ) ){
                                if( ! isset( $_SESSION['leveling']['strength'] ) ){
                                    $_SESSION['leveling']['strength'] = 1;
                                }
                                $_SESSION['leveling']['strength'] = $_SESSION['leveling']['strength'] + 1;
                                if( $_SESSION['leveling']['strength'] > 99 ){
                                    $_SESSION['attributes']['strength'] = $_SESSION['attributes']['strength'] + 1;
                                    $_SESSION['skills']['mining'] = $_SESSION['skills']['mining'] + 1;
                                    unset( $_SESSION['leveling']['strength'] );
                                }
                            }
                            if( isset( $resourcetable["{$check}"]['mine'] ) ){
                                if( $resourcetable["{$check}"]['mine'] > $_SESSION['skills']['mining'] ){
                                    $canharv = false;
                                }
                                elseif( $resourcetable["{$check}"]['mine'] <= $_SESSION['skills']['mining'] ){
                                    $canharv = true;
                                    $canbreak = false;
                                }                            
                                else{
                                    $canharv = true;
                                    $canbreak = true;
                                }
                            }
                            else{
                                $canharv = false;
                            }
                        }
                        if( $_SESSION['action'] <= 0 ){
                            if( isset( $_SESSION['resources']['water'] ) ){
                                if( $_SESSION['resources']['water'] > 0 ){
                                    $_SESSION['resources']['water'] = $_SESSION['resources']['water'] - 1;
                                    $_SESSION['action'] = $_SESSION['action'] + 25;
                                }
                            }
                        }
                    }

                    $ignorecanharv = [ 'trueglass', 'refinedtrueglass', 'stabletrueglass' ];
                    if( in_array( $check, $ignorecanharv ) ){
                        $canharv = true;
                    }

                    /** resource is harvestable
                     *
                     *
                    # The tile's current resource can be harvested
                    # or, at least, what's in its location can be
                     *
                     *
                     */
                    if( $_SESSION['acquire']['resources'] !== true ){
                        if( ! is_NULL( $harv ) ){
                            _tileupdate( [ 'coords' => $_SESSION['currentcoord'], 'type' => $harv ] );
                        }
                    }
                    if( $canharv !== false AND $_SESSION['acquire']['resources'] !== false ){
                        /** break increment not set
                         *
                         *
                        # Check whether or not this tile has a break incremement
                        # If it doesn't (and can be mined) then one is set
                        # Current break incremement is tied to $_SESSION['area']
                         *
                         *
                         */
                        if( ! isset( $_SESSION['coords']["{$_SESSION['currentcoord']}"]['break'] ) ){
                            if( isset( $resourcetable["{$check}"]['mine'] ) ){
                                $_SESSION['coords']["{$_SESSION['currentcoord']}"]['break'] = $_SESSION['area'];
                            }
                        }
                        else{
                            /** break increment is set
                             *
                             *
                            # Decrease this tile's break increment by 1 for every registered 'hit'
                            # by the player on its coordinates
                             *
                             *
                             */
                            if( isset( $_SESSION['coords']["{$_SESSION['currentcoord']}"]['break'] ) ){
                                $_SESSION['coords']["{$_SESSION['currentcoord']}"]['break'] = 
                                    $_SESSION['coords']["{$_SESSION['currentcoord']}"]['break'] - $break;
                                    if( $_SESSION['acquire']['action'] !== false ){
                                        $_SESSION['action'] = $_SESSION['action'] - 1;
                                    }
                            }
                            /** break increment is less than 1
                             *
                             *
                            # $_SESSION['coords'][THISTILE]['break'] is less than 1:
                            #   1 Add this resource to the player's inventory
                            #     ^ dependent upon (bool)$_SESSION['acquire']['resources']
                            #   2 Swap that tile's display for the mined display
                            #   3 Increase mining skill by 1
                            #   4 Set this tile's break increment to 0
                            #   5 Add this resource's mining level to the area's score
                             *
                             *
                             */
                            if( $_SESSION['coords']["{$_SESSION['currentcoord']}"]['break'] < 1 ){
                                if( isset( $_SESSION[ 'currentresource'] ) ){
                                    unset( $_SESSION['currentresource'] );
                                }
                                if( $canbreak !== false ){
                                    if( $_SESSION['acquire']['resources'] !== false ){
                                        $_SESSION['resources']["{$res}"] = $_SESSION['resources']["{$res}"] + $amt;
                                    }
                                }
                                else{
                                    if( $_SESSION['acquire']['resources'] !== false ){
                                        // add something to "break" this resource (mining skill too low)
                                        $_SESSION['resources']["{$res}"] = $_SESSION['resources']["{$res}"] + $amt;
                                    }
                                }
                                $_SESSION['skills']['mining'] = $_SESSION['skills']['mining'] + 1;
                                $_SESSION['exp'] = $_SESSION['exp'] + $amt;
                                $_SESSION['coords']["{$_SESSION['currentcoord']}"]["{$disp}"] = $harv;
                                $_SESSION['coords']["{$_SESSION['currentcoord']}"]['break'] = 0;
                                if( isset( $resourcetable["{$check}"]['mine'] ) ){
                                    if( $_SESSION['acquire']['score'] !== false ){
                                        if( $_SESSION['coords']["{$k}"]['decay'] <= 0 ){
                                            $_SESSION['score_area'] = $_SESSION['score_area'] + $resourcetable["{$check}"]['mine'];
                                        }
                                    }
                                }
                                else {
                                    if( $_SESSION['acquire']['score'] !== false ){
                                        if( $_SESSION['coords']["{$k}"]['decay'] <= 0 ){
                                            $_SESSION['score_area'] = $_SESSION['score_area'] + 1;
                                        }
                                    }
                                }
                            }
                            /** this resource is do not harvest
                             *
                             *
                            # This tile's resource is designated as do not harvest (dnh)
                            # but there is something in its location that can be taken by the player
                             *
                             *
                             */
                            if( isset( $resourcetable["{$check}"]['dnh'] ) ){
                                _tileupdate( [ 'coords' => $_SESSION['currentcoord'], 'type' => $harv ] );
                            }
                        }
                    }

                }
            }
            unset( $_SESSION['currentcoord'] );
            _reload('./');
        }
    }
    fhsunsets:{
        $amt                = NULL;
        $canbreak           = NULL;
        $canharv            = false;
        $channelresources   = [];
        $scavengerresources = [];
    }
    /** ^ fishing, harvesting, & scavenging */

    if( $_SESSION['map_display'] !== false ){
        $donotbuildover = [
            'tunnel',
            'ladder',
            'magma',
            'dolostone',
            'cementb',
            'platformb',
            'door',
            'dooropen',
            'doorlocked',
            'doorunlocked',
            'constructionglassb',
            'windoweast',
            'doorbridge',
            'walla',
            'playerproperty',
            'playerpropertyb',
            'playerpropertyc',
            'playerpropertyd',
            'doorautomatic',
            'doorautomaticopen'
        ];
        if( isset( $walls ) ){
            $donotbuildover = array_merge( $walls, $donotbuildover );
        }
        if( isset( $floors ) ){
            $donotbuildover = array_merge( $floors, $donotbuildover );
        }
        if( isset( $objects ) ){
            $donotbuildover = array_merge( $objects, $donotbuildover );
        }
        for($y=1;$y<=$ymax;$y++){
            for($x=1;$x<=$xmax;$x++){
                $ct = NULL; $type = _resource();
                if( ! isset( $_SESSION['coords']["{$x}/{$y}"] ) ){
                    _tileupdate( [ 'x' => $x, 'y' => $y, 'type' => $type ] );
                }
                $ct = isset( $_SESSION['coords']["{$x}/{$y}"]["{$disp}"] ) ? $_SESSION['coords']["{$x}/{$y}"]["{$disp}"] : NULL;
                if( isset( $prefills ) ){
                    if( isset( $prefills["{$x}/{$y}"]["{$disp}"] ) ){
                        $ct = NULL;
                    }
                }
                if( ! is_NULL( $ct ) ){
                    $xp = $x - 1; $xn = $x + 1; $xnn = $xn + 1; $xpp = $xp - 1; $xnnn = $xnn + 1; $xppp = $xpp - 1; $xnnnn = $xnnn + 1; $xpppp = $xppp - 1;
                    $yp = $y - 1; $yn = $y + 1; $ynn = $yn + 1; $ypp = $yp - 1; $ynnn = $ynn + 1; $yppp = $ypp - 1; $ynnnn = $ynnn + 1; $ypppp = $yppp - 1;
                    $north       = isset( $_SESSION['coords']["{$x}/{$yp}"]["{$disp}"] )        ? $_SESSION['coords']["{$x}/{$yp}"]["{$disp}"]        : NULL;
                    $north2      = isset( $_SESSION['coords']["{$x}/{$ypp}"]["{$disp}"] )       ? $_SESSION['coords']["{$x}/{$ypp}"]["{$disp}"]       : NULL;
                    $north3      = isset( $_SESSION['coords']["{$x}/{$yppp}"]["{$disp}"] )      ? $_SESSION['coords']["{$x}/{$yppp}"]["{$disp}"]      : NULL;
                    $north4      = isset( $_SESSION['coords']["{$x}/{$ypppp}"]["{$disp}"] )     ? $_SESSION['coords']["{$x}/{$ypppp}"]["{$disp}"]     : NULL;
                    $northwest   = isset( $_SESSION['coords']["{$xp}/{$yp}"]["{$disp}"] )       ? $_SESSION['coords']["{$xp}/{$yp}"]["{$disp}"]       : NULL;
                    $northwest2  = isset( $_SESSION['coords']["{$xpp}/{$ypp}"]["{$disp}"] )     ? $_SESSION['coords']["{$xpp}/{$ypp}"]["{$disp}"]     : NULL;
                    $northwest3  = isset( $_SESSION['coords']["{$xppp}/{$yppp}"]["{$disp}"] )   ? $_SESSION['coords']["{$xppp}/{$yppp}"]["{$disp}"]   : NULL;
                    $northwest4  = isset( $_SESSION['coords']["{$xpppp}/{$ypppp}"]["{$disp}"] ) ? $_SESSION['coords']["{$xpppp}/{$ypppp}"]["{$disp}"] : NULL;
                    $northeast   = isset( $_SESSION['coords']["{$xn}/{$yp}"]["{$disp}"] )       ? $_SESSION['coords']["{$xn}/{$yp}"]["{$disp}"]       : NULL;
                    $northeast2  = isset( $_SESSION['coords']["{$xnn}/{$ypp}"]["{$disp}"] )     ? $_SESSION['coords']["{$xnn}/{$ypp}"]["{$disp}"]     : NULL;
                    $northeast3  = isset( $_SESSION['coords']["{$xnnn}/{$yppp}"]["{$disp}"] )   ? $_SESSION['coords']["{$xnnn}/{$yppp}"]["{$disp}"]   : NULL;
                    $northeast4  = isset( $_SESSION['coords']["{$xnnnn}/{$ypppp}"]["{$disp}"] ) ? $_SESSION['coords']["{$xnnnn}/{$ypppp}"]["{$disp}"] : NULL;
                    $south       = isset( $_SESSION['coords']["{$x}/{$yn}"]["{$disp}"] )        ? $_SESSION['coords']["{$x}/{$yn}"]["{$disp}"]        : NULL;
                    $south2      = isset( $_SESSION['coords']["{$x}/{$ynn}"]["{$disp}"] )       ? $_SESSION['coords']["{$x}/{$ynn}"]["{$disp}"]       : NULL;
                    $south3      = isset( $_SESSION['coords']["{$x}/{$ynnn}"]["{$disp}"] )      ? $_SESSION['coords']["{$x}/{$ynnn}"]["{$disp}"]      : NULL;
                    $south4      = isset( $_SESSION['coords']["{$x}/{$ynnnn}"]["{$disp}"] )     ? $_SESSION['coords']["{$x}/{$ynnnn}"]["{$disp}"]     : NULL;
                    $southeast   = isset( $_SESSION['coords']["{$xn}/{$yn}"]["{$disp}"] )       ? $_SESSION['coords']["{$xn}/{$yn}"]["{$disp}"]       : NULL;
                    $southeast2  = isset( $_SESSION['coords']["{$xnn}/{$ynn}"]["{$disp}"] )     ? $_SESSION['coords']["{$xnn}/{$ynn}"]["{$disp}"]     : NULL;
                    $southeast3  = isset( $_SESSION['coords']["{$xnnn}/{$ynnn}"]["{$disp}"] )   ? $_SESSION['coords']["{$xnnn}/{$ynnn}"]["{$disp}"]   : NULL;
                    $southeast4  = isset( $_SESSION['coords']["{$xnnnn}/{$ynnnn}"]["{$disp}"] ) ? $_SESSION['coords']["{$xnnnn}/{$ynnnn}"]["{$disp}"] : NULL;
                    $southwest   = isset( $_SESSION['coords']["{$xp}/{$yn}"]["{$disp}"] )       ? $_SESSION['coords']["{$xp}/{$yn}"]["{$disp}"]       : NULL;
                    $southwest2  = isset( $_SESSION['coords']["{$xpp}/{$ynn}"]["{$disp}"] )     ? $_SESSION['coords']["{$xpp}/{$ynn}"]["{$disp}"]     : NULL;
                    $southwest3  = isset( $_SESSION['coords']["{$xppp}/{$ynnn}"]["{$disp}"] )   ? $_SESSION['coords']["{$xppp}/{$ynnn}"]["{$disp}"]   : NULL;
                    $southwest4  = isset( $_SESSION['coords']["{$xpppp}/{$ynnnn}"]["{$disp}"] ) ? $_SESSION['coords']["{$xpppp}/{$ynnnn}"]["{$disp}"] : NULL;
                    $east        = isset( $_SESSION['coords']["{$xn}/{$y}"]["{$disp}"] )        ? $_SESSION['coords']["{$xn}/{$y}"]["{$disp}"]        : NULL;
                    $east2       = isset( $_SESSION['coords']["{$xnn}/{$y}"]["{$disp}"] )       ? $_SESSION['coords']["{$xnn}/{$y}"]["{$disp}"]       : NULL;
                    $east3       = isset( $_SESSION['coords']["{$xnnn}/{$y}"]["{$disp}"] )      ? $_SESSION['coords']["{$xnnn}/{$y}"]["{$disp}"]      : NULL;
                    $east4       = isset( $_SESSION['coords']["{$xnnnn}/{$y}"]["{$disp}"] )     ? $_SESSION['coords']["{$xnnnn}/{$y}"]["{$disp}"]     : NULL;
                    $west        = isset( $_SESSION['coords']["{$xp}/{$y}"]["{$disp}"] )        ? $_SESSION['coords']["{$xp}/{$y}"]["{$disp}"]        : NULL;
                    $west2       = isset( $_SESSION['coords']["{$xpp}/{$y}"]["{$disp}"] )       ? $_SESSION['coords']["{$xpp}/{$y}"]["{$disp}"]       : NULL;
                    $west3       = isset( $_SESSION['coords']["{$xppp}/{$y}"]["{$disp}"] )      ? $_SESSION['coords']["{$xppp}/{$y}"]["{$disp}"]      : NULL;
                    $west4       = isset( $_SESSION['coords']["{$xpppp}/{$y}"]["{$disp}"] )     ? $_SESSION['coords']["{$xpppp}/{$y}"]["{$disp}"]     : NULL;
                    if( in_array( $north, $donotbuildover ) ){      $north      = NULL; }
                    if( in_array( $north2, $donotbuildover ) ){     $north2     = NULL; }
                    if( in_array( $north3, $donotbuildover ) ){     $north3     = NULL; }
                    if( in_array( $north4, $donotbuildover ) ){     $north4     = NULL; }
                    if( in_array( $northwest, $donotbuildover ) ){  $northwest  = NULL; }
                    if( in_array( $northwest2, $donotbuildover ) ){ $northwest2 = NULL; }
                    if( in_array( $northwest3, $donotbuildover ) ){ $northwest3 = NULL; }
                    if( in_array( $northwest4, $donotbuildover ) ){ $northwest4 = NULL; }
                    if( in_array( $northeast, $donotbuildover ) ){  $northeast  = NULL; }
                    if( in_array( $northeast2, $donotbuildover ) ){ $northeast2 = NULL; }
                    if( in_array( $northeast3, $donotbuildover ) ){ $northeast3 = NULL; }
                    if( in_array( $northeast4, $donotbuildover ) ){ $northeast4 = NULL; }
                    if( in_array( $south, $donotbuildover ) ){      $south      = NULL; }
                    if( in_array( $south2, $donotbuildover ) ){     $south2     = NULL; }
                    if( in_array( $south3, $donotbuildover ) ){     $south3     = NULL; }
                    if( in_array( $south4, $donotbuildover ) ){     $south4     = NULL; }
                    if( in_array( $southwest, $donotbuildover ) ){  $southwest  = NULL; }
                    if( in_array( $southwest2, $donotbuildover ) ){ $southwest2 = NULL; }
                    if( in_array( $southwest3, $donotbuildover ) ){ $southwest3 = NULL; }
                    if( in_array( $southwest4, $donotbuildover ) ){ $southwest4 = NULL; }
                    if( in_array( $southeast, $donotbuildover ) ){  $southeast  = NULL; }
                    if( in_array( $southeast2, $donotbuildover ) ){ $southeast2 = NULL; }
                    if( in_array( $southeast3, $donotbuildover ) ){ $southeast3 = NULL; }
                    if( in_array( $southeast4, $donotbuildover ) ){ $southeast4 = NULL; }
                    if( in_array( $east, $donotbuildover ) ){       $east       = NULL; }
                    if( in_array( $east2, $donotbuildover ) ){      $east2      = NULL; }
                    if( in_array( $east3, $donotbuildover ) ){      $east3      = NULL; }
                    if( in_array( $east4, $donotbuildover ) ){      $east4      = NULL; }
                    if( in_array( $west, $donotbuildover ) ){       $west       = NULL; }
                    if( in_array( $west2, $donotbuildover ) ){      $west2      = NULL; }
                    if( in_array( $west3, $donotbuildover ) ){      $west3      = NULL; }
                    if( in_array( $west4, $donotbuildover ) ){      $west4      = NULL; }
                    $coordnorth     = !is_NULL( $north )     ? "{$x}/{$yp}"    : NULL;
                    $coordnorth2    = !is_NULL( $north2 )    ? "{$x}/{$ypp}"   : NULL;
                    $coordnorth3    = !is_NULL( $north3 )    ? "{$x}/{$yppp}"  : NULL;
                    $coordnorth4    = !is_NULL( $north4 )    ? "{$x}/{$ypppp}" : NULL;
                    $coordsouth     = !is_NULL( $south )     ? "{$x}/{$yn}"    : NULL;
                    $coordsouth2    = !is_NULL( $south2 )    ? "{$x}/{$ynn}"   : NULL;
                    $coordsouth3    = !is_NULL( $south3 )    ? "{$x}/{$ynnn}"  : NULL;
                    $coordsouth4    = !is_NULL( $south4 )    ? "{$x}/{$ynnnn}" : NULL;
                    $coordeast      = !is_NULL( $east )      ? "{$xn}/{$y}"    : NULL;
                    $coordeast2     = !is_NULL( $east2 )     ? "{$xnn}/{$y}"   : NULL;
                    $coordeast3     = !is_NULL( $east3 )     ? "{$xnnn}/{$y}"  : NULL;
                    $coordeast4     = !is_NULL( $east4 )     ? "{$xnnnn}/{$y}" : NULL;
                    $coordwest      = !is_NULL( $west )      ? "{$xp}/{$y}"    : NULL;
                    $coordwest2     = !is_NULL( $west2 )     ? "{$xpp}/{$y}"   : NULL;
                    $coordwest3     = !is_NULL( $west3 )     ? "{$xppp}/{$y}"  : NULL;
                    $coordwest4     = !is_NULL( $west4 )     ? "{$xpppp}/{$y}" : NULL;
                    $coordnortheast = !is_NULL( $northeast ) ? "{$xn}/{$yp}"   : NULL;
                    $coordnorthwest = !is_NULL( $northwest ) ? "{$xp}/{$yp}"   : NULL;
                    $coordsouthwest = !is_NULL( $southwest ) ? "{$xp}/{$yn}"   : NULL;
                    $coordsoutheast = !is_NULL( $southeast ) ? "{$xn}/{$yn}"   : NULL;
                    if( $ct == 'nothing' ){
                        $ct = 'nothing1';
                        if( $ct == 'nothing1' ){
                            $ct = 'nothing0';
                            if( ! is_NULL( $north2 ) AND mt_rand( 0, 1 ) == 1 ) $_SESSION['coords']["{$coordnorth2}"]["{$disp}"] = 'nothing0';
                            if( ! is_NULL( $north  ) AND mt_rand( 0, 1 ) == 1 ) $_SESSION['coords']["{$coordnorth}"]["{$disp}"]  = 'nothing0';
                            if( ! is_NULL( $west   ) AND mt_rand( 0, 1 ) == 1 ) $_SESSION['coords']["{$coordwest}"]["{$disp}"]   = 'nothing0';
                            if( ! is_NULL( $east   ) AND mt_rand( 0, 1 ) == 1 ) $_SESSION['coords']["{$coordeast}"]["{$disp}"]   = 'nothing0';
                            if( ! is_NULL( $south  ) AND mt_rand( 0, 1 ) == 1 ) $_SESSION['coords']["{$coordsouth}"]["{$disp}"]  = 'nothing0';
                        }
                    }
                    if( $ct == 'nothing0' ){
                        $ct = 'nothingbarrier';
                    }
                    /** tile gravity
                     *  @since ver alpha
                     *  @since va2:
                     *    Allow player to toggle this
                     */
                    if( ! is_NULL( $south ) ){
                        if( ! in_array( $south, $donotbuildover ) ){
                            if( $ct != 'nothingbarrier' ){
                                if( $_SESSION['acquire']['gravity'] !== false ){
                                    if( ( time() - $_SESSION['arrived'] ) > $_SESSION['area'] ){
                                        if( $south == 'nothingbarrier' ){
                                                _tileupdate( [ 'coords' => $coordsouth, 'type' => $ct ] );
                                                $ct = 'nothingbarrier';
                                                $_SESSION['temp'] = 1;
                                        }
                                    }
                                }
                            }
                        }
                    }
                    if( $y < 5 ){
                        $ct = 'nothingbarrier';
                    }
                    if( isset( $player ) ){
                        if( in_array( "{$x}/{$y}", $player['nearby'] ) ){
                            if( $ct == 'doorautomatic' ){
                                $ct = 'doorautomaticopen';
                            }
                        }
                        else{
                            if( $ct == 'doorautomaticopen' )
                                $ct = 'doorautomatic';
                        }
                    }










                    /** water
                     *  @since va2
                     */
                    if( $ct == 'deep' ){
                        if( $east == 'water' ){
                            _tileupdate( [ 'coords' => $coordeast, 'type' => 'deep' ] );
                        }
                        if( $east == 'nothingbarrier' ){
                            _tileupdate( [ 'coords' => $coordeast, 'type' => 'water' ] );
                            $ct = 'water';
                        }
                        if( $south == 'nothingbarrier' ){
                            _tileupdate( [ 'coords' => $coordsouth, 'type' => 'water' ] );
                            $ct = 'water';
                        }
                        if( $south == 'water' ){
                            _tileupdate( [ 'coords' => $coordsouth, 'type' => 'deep' ] );
                            $ct = 'water';
                        }
                    }
                    if( $ct == 'water' ){
                        if( $east == 'nothingbarrier' ){
                            _tileupdate( [ 'coords' => $coordeast, 'type' => 'shallow' ] );
                            $ct = 'shallow';
                        }
                        if( $south == 'nothingbarrier' ){
                            _tileupdate( [ 'coords' => $coordsouth, 'type' => 'water' ] );
                            $ct = 'nothingbarrier';
                        }
                        if( $west == 'nothingbarrier' ){
                            _tileupdate( [ 'coords' => $coordwest, 'type' => 'shallow' ] );
                            $ct = 'shallow';
                        }
                        if( $west == 'prevwater' ){
                            _tileupdate( [ 'coords' => $coordwest, 'type' => 'shallow' ] );
                            $ct = 'shallow';
                        }
                    }
                    if( $ct == 'shallow' ){
                        if( $south == 'nothingbarrier' ){
                            if( $south2 == 'water' ){
                                _tileupdate( [ 'coords' => $coordsouth2, 'type' => 'deep' ] );
                                $ct = 'nothingbarrier';
                            }
                        }
                        if( $west == 'nothingbarrier' ){
                            if( $east == 'prevwater' ){
                                _tileupdate( ['coords' => $coordwest, 'type' => 'prevwater' ] );
                                $ct = 'prevwater';
                            }
                            else{
                                _tileupdate( ['coords' => $coordwest, 'type' => 'shallow' ] );
                                $ct = 'prevwater';
                            }
                        }
                    }










                    if( isset( $_SESSION['coords']["{$x}/{$y}"]["{$disp}"] ) ){
                        if( $ct == 'door' OR $ct == 'dooropen' OR $ct == 'doorlocked' OR $ct == 'doorunlocked'  ){

                        }
                        else{
                            if( $ct != $_SESSION['coords']["{$x}/{$y}"]["{$disp}"] ){
                                _tileupdate( [ 'x' => $x, 'y' => $y, 'type' => $ct ] );
                            }
                        }
                    }
                }
            }
        }
    }
    function _a2a( $apples = [] ){
        $comparison = false;
        if( isset( $apples[0] ) AND isset( $apples[1] ) ){
            $comparison = $apples[0] == $apples[1] ? true : false;
            if( str_starts_with( '!', $apples[1] ) ){
                $apples[1] = ltrim( $apples[1], '!' );
                $comparison = $apples[0] != $apples[1] ? true : false;
            }
        }
        return $comparison;
    }
    function _tileupdate( $opts = [] ){
        if( isset( $opts['coords'] ) ){
            $coords = explode( '/', $opts['coords'] );
            $opts['x'] = $coords[0];
            $opts['y'] = $coords[1];
        }
        if( isset( $opts['x'] ) AND isset( $opts['y'] ) ){
            $fishstock = mt_rand( 1, $_SESSION['area'] );
            $_SESSION['coords']["{$opts['x']}/{$opts['y']}"] = [
                'decay'   => _decay(),
                'disp'    => $opts['type'],
                'born'    => time(),
                'offdisp' => 'powerless',
                'powered' => true,
                'fish'    => $fishstock
            ];
        }
        return NULL;
    }
    if( isset( $_GET['flee'] ) ){
        if( mt_rand( 0, 1 ) == 1 ){
            $_SESSION['combat']['currently'] = false;
            $_SESSION['combat']['ran'] = $_SESSION['combat']['ran'] + 1;
            $_SESSION['combat']['last'] = time();
            $_SESSION['combat']['steps_since_last'] = 0;
        }
        header( 'Location: ./' );
    }
    if(isset($_GET['x'])){
        if( isset( $_SESSION['currentcoord'] ) ){
            unset( $_SESSION['currentcoord'] );
        }
        if( isset( $_SESSION['examining'] ) ){
            unset( $_SESSION['examining'] );
        }
        header('Location:./');
    }
    if(isset($_GET['r'])){
        if( isset( $_SESSION['examining'] ) )
            unset( $_SESSION['examining'] );
        if(isset($_GET['rr'])){
            foreach($_SESSION as $k=>$v){
            if( $k == 'show_resources' ){}
            else{
            unset($_SESSION["{$k}"]);
            }
            }
            header('Location:./');
        }
    }
    if( isset( $_GET['rez'] ) ){
        if( isset( $_SESSION['health'] ) ){
            if( $_SESSION['health'] < 1 ){
                $_SESSION['health'] = 1;
            }
        }
        header( 'Location: ./' );
    }

    if( ! isset( $_SESSION['start'] ) ){
        if( isset( $_SESSION['coords'] ) ){
            if( $_SESSION['worldpower'] !== false ){

                if( isset( $prefills ) ){
                    if( isset( $prefills["{$_SESSION['area']}"] ) ){
                        foreach( $prefills["{$_SESSION['area']}"] as $k => $v ){
                            if( $k == 'pp' ){
                                $_SESSION['playerposition'] = $v;
                            }
                            else {
                                if( is_array( $v ) ){
                                    if( isset( $v['disp'] ) ){
                                        $_SESSION['coords']["{$k}"]['disp'] = $v['disp'];
                                    }
                                    if( isset( $v['offdisp'] ) ){
                                        $_SESSION['coords']["{$k}"]['offdisp'] = $v['offdisp'];
                                    }
                                }
                            }
                        }
                    }
                }
                
                if( ! isset( $_SESSION['start'] ) ){
                    $_SESSION['start'] = true;
                    _reload('./');
                }
            }
        }
    }

}

formatting:{
    function _format( $str ){
        $str = htmlentities( $str, ENT_QUOTES | ENT_IGNORE, 'utf-8' );
        $str = str_replace(
            [ '\*',    '\+',    '\[',    '\]'    ],
            [ '&#42;', '&#43;', '&#91;', '&#93;' ],
            $str
        );
        $str = preg_replace(
            [ '/\*\*(.*?)\*\*/',     '/\*(.*?)\*/' ],
            [ '<strong>$1</strong>', '<em>$1</em>' ],
            trim( $str )
        );
        if( is_string( $str ) ){
            $str = preg_replace_callback(
                '/\%\%(.*?)\%\%/',
                function( $s ){
                    return '<code title="' . $s[1] . '">' . _word($s[1]) . '</code>';
                },
                $str
            );
        }
        return$str;
    }
}

language:{
    /**
     *  Using letter frequency & occurrence, with grammatical rulesets, to create
     *  seemingly random yet functional whole-words from seeds
     *  -------------------------------------------------------------------------------------
     *  abstract: taking any seed letter or word (up to an initial character position of 8)
     *  to return, through a series of 'common grammar rules', produce a word from the original
     *  seed that is a permutation of itself
     *  -------------------------------------------------------------------------------------
     *  some randomness can/is introduced by way of phonetic and consonant replacement
     *  -------------------------------------------------------------------------------------
     *  *Most seeds will give an appropriately grammatical response given enough rulesets
     *  -------------------------------------------------------------------------------------
     *  'Wordle Letter Frequency and Patterns'
     *  https://real-statistics.com/wordle-strategy/wordle-letter-frequency-and-patterns/
     *  >letters used in the 2,315 (possible target) words and distribution over 5 positions)
     *  >additional positions quantified using this data and are adjusted for trends (chatgpt)
     *
     *  getRandomWeightedValue() (_random)
     *  https://stackoverflow.com/a/11872928
     *  we cam use the data from wordle to feed a function an array of letters with associated
     *  percent on hit for the requested string position and return a value based on its likelihood
     *
     *  word-to-consonants
     *  https://stackoverflow.com/a/55890486
     *  we can break down words into their consonants and replace single syllable-sounds w/ phonetic(s)
     *
     *  sentence/word diagraming
     *  >use a large dictionary of words that are categorized (noun, verb, ...) to diagram input
     *
     *    the word-lists utilized and built upon:
     *    -------------------------------------------------------------------------------------
     *    'List of Greek and Latin roots in English'
     *    https://www.oakton.edu/user/3/gherrera/Greek%20and%20Latin%20Roots%20in%20English/greek_and_latin_roots.pdf
     *    -------------------------------------------------------------------------------------
     *    'An English stop word list'| http://snowball.tartarus.org/algorithms/english/stop.txt
     *    -------------------------------------------------------------------------------------
     *    adjectives/nouns/verbs.txt | https://github.com/aaronbassett/Pass-phrase
     *    -------------------------------------------------------------------------------------
     *    'Words that can be either a| 
     *    noun, verb, or adjective or| 
     *    adverb II'                 | https://onweb3.wordpress.com/2013/08/14/663/
     *    -------------------------------------------------------------------------------------
     *    additional resources:     /
     *    -------------------------------------------------------------------------------------
     *    'Teaching phonics'       | https://teachphonics.co.uk/teaching-phonics.html
     */

    function _letter( $loop = 0, $opts = [] ){
        $letters = [ 
            'a' => [ 0 => 141, 1 => 304, 2 => 307, 3 => 163, 4 => 64,  5 => 72,  6 => 130, 7 => 245, 8 => 312, 9 => 98  ],
            'b' => [ 0 => 173, 1 => 16,  2 => 57,  3 => 24,  4 => 11,  5 => 9,   6 => 30,  7 => 65,  8 => 12,  9 => 5   ],
            'c' => [ 0 => 198, 1 => 40,  2 => 56,  3 => 152, 4 => 31,  5 => 45,  6 => 32,  7 => 78,  8 => 166, 9 => 29  ],
            'd' => [ 0 => 111, 1 => 20,  2 => 75,  3 => 69,  4 => 118, 5 => 54,  6 => 18,  7 => 82,  8 => 51,  9 => 134 ],
            'e' => [ 0 => 72,  1 => 242, 2 => 177, 3 => 318, 4 => 424, 5 => 198, 6 => 305, 7 => 212, 8 => 425, 9 => 318 ],
            'f' => [ 0 => 136, 1 => 8,   2 => 25,  3 => 35,  4 => 26,  5 => 20,  6 => 6,   7 => 30,  8 => 28,  9 => 18  ],
            'g' => [ 0 => 115, 1 => 12,  2 => 67,  3 => 76,  4 => 41,  5 => 31,  6 => 14,  7 => 58,  8 => 89,  9 => 36  ],
            'h' => [ 0 => 69,  1 => 144, 2 => 9,   3 => 28,  4 => 139, 5 => 80,  6 => 112, 7 => 15,  8 => 30,  9 => 120 ],
            'i' => [ 0 => 34,  1 => 202, 2 => 266, 3 => 158, 4 => 11,  5 => 20,  6 => 185, 7 => 278, 8 => 139, 9 => 8   ],
            'j' => [ 0 => 20,  1 => 2,   2 => 3,   3 => 2,   4 => 0,   5 => 1,   6 => 0,   7 => 5,   8 => 1,   9 => 0   ],
            'k' => [ 0 => 20,  1 => 10,  2 => 12,  3 => 55,  4 => 113, 5 => 12,  6 => 14,  7 => 22,  8 => 72,  9 => 98  ],
            'l' => [ 0 => 88,  1 => 201, 2 => 112, 3 => 162, 4 => 156, 5 => 75,  6 => 220, 7 => 130, 8 => 158, 9 => 170 ],
            'm' => [ 0 => 107, 1 => 38,  2 => 61,  3 => 68,  4 => 42,  5 => 64,  6 => 28,  7 => 52,  8 => 88,  9 => 47  ],
            'n' => [ 0 => 37,  1 => 87,  2 => 139, 3 => 182, 4 => 130, 5 => 50,  6 => 93,  7 => 142, 8 => 165, 9 => 145 ],
            'o' => [ 0 => 41,  1 => 279, 2 => 244, 3 => 132, 4 => 58,  5 => 36,  6 => 265, 7 => 218, 8 => 128, 9 => 67  ],
            'p' => [ 0 => 142, 1 => 61,  2 => 58,  3 => 50,  4 => 56,  5 => 99,  6 => 55,  7 => 45,  8 => 52,  9 => 60  ],
            'q' => [ 0 => 23,  1 => 5,   2 => 1,   3 => 0,   4 => 0,   5 => 5,   6 => 2,   7 => 0,   8 => 1,   9 => 0   ],
            'r' => [ 0 => 105, 1 => 267, 2 => 163, 3 => 152, 4 => 212, 5 => 92,  6 => 280, 7 => 170, 8 => 148, 9 => 215 ],
            's' => [ 0 => 366, 1 => 16,  2 => 80,  3 => 171, 4 => 36,  5 => 330, 6 => 20,  7 => 92,  8 => 160, 9 => 42  ],
            't' => [ 0 => 149, 1 => 77,  2 => 111, 3 => 139, 4 => 253, 5 => 130, 6 => 95,  7 => 120, 8 => 146, 9 => 266 ],
            'u' => [ 0 => 33,  1 => 186, 2 => 165, 3 => 82,  4 => 1,   5 => 45,  6 => 175, 7 => 150, 8 => 76,  9 => 3   ],
            'v' => [ 0 => 43,  1 => 15,  2 => 49,  3 => 46,  4 => 0,   5 => 25,  6 => 12,  7 => 40,  8 => 39,  9 => 0   ],
            'w' => [ 0 => 83,  1 => 44,  2 => 26,  3 => 25,  4 => 17,  5 => 70,  6 => 36,  7 => 22,  8 => 20,  9 => 13  ],
            'x' => [ 0 => 0,   1 => 14,  2 => 12,  3 => 3,   4 => 8,   5 => 2,   6 => 10,  7 => 15,  8 => 5,   9 => 7   ],
            'y' => [ 0 => 6,   1 => 23,  2 => 29,  3 => 3,   4 => 364, 5 => 9,   6 => 19,  7 => 25,  8 => 2,   9 => 350 ],
            'z' => [ 0 => 3,   1 => 2,   2 => 11,  3 => 20,  4 => 4,   5 => 2,   6 => 4,   7 => 13,  8 => 22,  9 => 6   ],
        ];
        if( isset( $opts['ignore'] ) ){
            if( ! empty( $opts['ignore'] ) ){
                foreach( $opts['ignore'] as $i ){
                    if( isset( $letters["{$i}"] ) )
                        unset( $letters["{$i}"] );
                }
            }
        }
        $loopletters = [];
        foreach( $letters as $k=>$v ){
            if( isset( $opts['only'] ) ){
                if( ! empty( $opts['only'] ) ){
                    if( ! in_array( $k, $opts['only'] ) )
                        continue;
                }
            }
            $all = 0;
            for( $i = 0; $i < sizeOf($v); $i++ ){
                $all = $all + $v[$i];
            }
            $percentage = intval(round(($v[$loop]/$all)*100));
            $percentage = intval(round(($percentage/(2315*2))*100));
            $loopletters["{$k}"] = $percentage;
        }
        return _random($loopletters);
    }
    function _word( $sessionkey = NULL, $opts = [] ){
        $origin = $sessionkey;
        if( ! is_NULL( $sessionkey ) ) $sessionkey = strtolower( $sessionkey );
        if( isset( $_SESSION['word']["{$sessionkey}"] ) )
            return $_SESSION['word']["{$sessionkey}"];

        $consonants = array_diff( range( 'a', 'z'), array( 'a', 'e', 'i', 'o', 'u' ) );
        $cset       = '[' . implode( '', $consonants ) . ']';
        $vowels     = [ 'a', 'e', 'i', 'o', 'u', 'y' ];

        letter_rules:{
            $letters = [
                'a' => [
                    1 => [
                        1 => [
                            'a' => [ 'only' => $consonants ]
                        ]
                    ],
                    2 => [ 
                        1 => [ 
                            /** za* */ 'z' => [ 'only' => [ 'b', 'c', 'd', 'f', 'g', 'i', 'k', 'l', 'm', 'n', 'p', 'r', 'u', 'y', 'z' ] ],
                            'f' => [ 'ignore' => $vowels ]
                        ]
                    ]
                ],

                'b' => [
                    1 => [
                        1 => [
                            'b' => [ 'only' => $vowels ]
                        ]
                    ],
                    3 => [
                        3 => [
                            'b' => [ 'only' => $vowels ]
                        ]
                    ],
                ],

                'c' => [ 
                    1 => [
                        1 => [
                            'c' => [ 'only' => $vowels ]
                        ]
                    ]
                ],

                'd' => [
                    1 => [
                        1 => [
                            'd' => [ 'only' => $vowels ]
                        ]
                    ],
                    2 => [
                        2 => [
                            'd' => [ 'only' => [ 'a', 'c', 'd', 'e', 'f', 'h', 'j', 'k', 'l', 'm', 'o', 'r', 's', 'u', 'v' ] ]
                        ]
                    ],           
                    3 => [
                        3 => [
                            'd' => [ 'only' => $vowels ]
                        ]
                    ],
                    4 => [
                        4 => [
                            'd' => [ 'only' => [ 'a', 'c', 'd', 'e', 'f', 'h', 'j', 'k', 'l', 'm', 'o', 'r', 's', 'u', 'v' ] ]
                        ]
                    ],           
                    5 => [
                        5 => [
                            'd' => [ 'only' => $vowels ]
                        ]
                    ],
                    6 => [
                        6 => [
                            'd' => [ 'only' => [ 'a', 'c', 'd', 'e', 'f', 'h', 'j', 'k', 'l', 'm', 'o', 'r', 's', 'u', 'v' ] ]
                        ]
                    ],           
                    7 => [
                        7 => [
                            'd' => [ 'only' => $vowels ]
                        ]
                    ],
                ],

                'e' => [
                    2 => [ 
                        1 => [ 
                            /** ze* */ 'z' => [ 'only' => [ 'a', 'b', 'c', 'd', 'e', 'i', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u' ] ],
                            'f' => [ 'ignore' => $vowels ]
                        ]
                    ]
                ],

                'f' => [
                    1 => [
                        1 => [
                            'f' => [ 'only' => $vowels ]
                        ]
                    ],
                    3 => [
                        3 => [
                            'f' => [ 'only' => $vowels ]
                        ]
                    ]                    
                ],

                'g' => [
                    1 => [
                        1 => [
                            'g' => [ 'only' => [ 'a', 'e', 'h', 'i', 'o', 'r', 'u', 'w', 'y' ] ]
                        ]
                    ],
                    4 => [
                        4 => [
                            'g' => [ 'only' => $vowels ]
                        ]
                    ]
                ],
         
                'h' => [ 
                    1 => [
                        1 => [
                            'h' => [ 'only' => $vowels ]
                        ]
                    ],
                    3 => [
                        3 => [                    
                            'h' => [ 'only' => $vowels ]
                        ]
                    ],
                    5 => [
                        5 => [
                            'h' => [ 'only' => $vowels ]
                        ]
                    ],
                    7 => [
                        7 => [
                            'h' => [ 'only' => $vowels ]
                        ]
                    ],
                ],

                'i' => [
                    1 => [
                        1 => [
                            'i' => [ 'ignore' => $vowels ]
                        ]
                    ],
                    2 => [ 
                        1 => [ 
                            /** zi* */ 'z' => [ 'only' => [ 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 't', 'w', 'z' ] ],
                            'f' => [ 'ignore' => $vowels ]
                        ]
                    ]
                ],

                'j' => [
                    1 => [
                        1 => [
                            'j' => [
                                'ignore' => [ 'b','c','d','f','g', 'h', 'k', 'l', 'm', 'n', 'p', 'q', 'r', 'v', 'w', 'x', 'z' ]
                            ]
                        ]
                    ]
                ],

                'k' => [ 
                    1 => [
                        1 => [
                            'k' => [ 'only' => $vowels ]
                        ]
                    ],
                    4 => [
                        4 => [
                            'k' => [ 'only' => $vowels ]
                        ]
                    ]
                ],

                'l' => [
                    1 => [
                        1 => [
                            'l' => [ 'only' => $vowels ]
                        ]
                    ]
                ],

                'm' => [ 
                    1 => [
                        1 => [
                            'm' => [ 'only' => $vowels ]
                        ]
                    ]
                ],

                'n' => [
                    1 => [
                        1 => [
                            'n' => [ 'only' => $vowels ]
                        ]
                    ]
                ],

                'o' => [
                    1 => [
                        1 => [
                            'f' => [ 'ignore' => $vowels ]
                        ]
                    ]
                ],

                'p' => [
                    1 => [
                        1 => [
                            'p' => [ 'only' => [ 'a', 'e', 'f', 'h', 'i', 'o', 'r', 'u', 'y' ] ]
                        ]
                    ],
                    2 => [
                        1 => [
                            'a' => [ 'only' => [ 'e', 'g', 'h', 'i', 'l', 'p', 'r', 't' ] ]
                        ]
                    ],                    
                ],

                'q' => [
                    1 => [
                        1 => [
                            'q' => [
                                'only' => [ 'w', 'u' ]
                            ]
                        ]
                    ],
                    2 => [
                        1 => [
                            'a' => [
                                'only' => [ 'u' ]
                            ]
                        ]
                    ]
                ],

                'r' => [
                    1 => [
                        1 => [
                            'r' => [
                                'only' => [ 'a', 'e', 'i', 'o', 'u', 'y', 'h' ]
                            ]
                        ]
                    ],
                    2 => [
                        2 => [
                            'r' => [ 'only' => $vowels ]
                        ]
                    ],
                    3 => [
                        2 => [
                            'r' => [
                                'ignore' => [ 'r' ]
                            ]
                        ]
                    ],
                    4 => [
                        4 => [
                            'r' => [ 'only' => $vowels ]
                        ]
                    ],
                    5 => [
                        3 => [
                            'r' => [
                                'ignore' => [ 'r' ]
                            ]
                        ]
                    ]                    
                    
                ],

                's' => [
                    1 => [
                        1 => [
                            's' => [ 'only' =>  [ 'a', 'c', 'e', 'h', 'i', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 't', 'u', 'w' ] ]
                        ]
                    ]
                ],

                't' => [
                    1 => [
                        1 => [
                            't' => [ 'only' => [ 'a', 'e', 'h', 'i', 'o', 'r', 'u', 'w', 'y' ] ]
                        ]
                    ]
                ],

                'u' => [ 
                    1 => [
                        1 => [
                            'u' => [
                                'only' => [ 'b', 'c', 'd', 'l', 'g', 'h', 'm', 'n', 'p', 'r', 't' ],
                            ],
                            'f' => [ 'ignore' => $vowels ]
                        ]  
                    ]
                ],

                'v' => [
                    1 => [
                        1 =>[
                            'v' => [ 'only' => $vowels, 'ignore' => [ 'y' ] ]
                        ]
                    ],
                    3 => [
                        3 => [
                            'v' => [ 'only' => $vowels ]
                        ]
                    ],                    
                    5 => [
                        5 => [
                            'v' => [ 'only' => $vowels ]
                        ]
                    ]
                ],

                'w' => [
                    1 => [
                        1 => [
                            'w' => [
                                'ignore' => [ 'b', 'c', 'd', 'f', 'g', 'k', 'l', 'm', 'n', 'p', 'q', 's', 't', 'v', 'x', 'z' ]
                            ]
                        ]
                    ]
                ],

                'x' => [
                    1 => [
                        1 => [
                            'a' => [ 'only' => [ $vowels ], 'ignore' => ['a'] ],
                            'o' => [ 'only' => [ $vowels ], 'ignore' => ['o'] ],
                            'e' => [ 'only' => [ $vowels ], 'ignore' => ['e'] ],
                        ]
                    ],
                    2 => [
                        1 => [
                            'a' => [ 'only' => [ $vowels ], 'ignore' => ['a'] ],
                            'o' => [ 'only' => [ $vowels ], 'ignore' => ['o'] ],
                            'e' => [ 'only' => [ $vowels ], 'ignore' => ['e'] ],
                        ]
                    ],
                ],

                'y' => [
                    1 => [
                        1 => [
                            'f' => [ 'ignore' => [ 'h', 'j', 'k', 'o', 'p', 'q', 'u', 'w', 'x', 'y' ] ]
                        ]
                    ]
                ],

                'z' => [ 
                    1 => [
                        1 => [
                            'z' => [
                                'only' => [ 'a', 'e', 'i', 'o', 'u', 'w', 'y' ]
                            ]
                        ]
                    ],
                    4 => [
                        4 => [
                            'z' => [ 'only' => $vowels ]
                        ]
                    ]
                ]
            ];
        }
        initialize_defaults:{
            $fin    = '';
            $return = NULL;
            $sko    = NULL;
            $vow    = 0;
            for( $i = 0; $i <= 11; $i++ ){
                ${"on{$i}"}     = [];
                ${"ig{$i}"}     = [];
                ${"letter{$i}"} = NULL;
            }
        }
        no_double_vowels:{
            if( ! is_NULL( $sessionkey ) ){
                $baseword = str_split( $sessionkey );
                foreach( $baseword as $k => $v ){
                    $tk = $k+1;
                    if( isset( ${"ig{$k}"} ) ){
                        if( in_array( $v, $vowels ) ){
                            ${"ig{$k}"} = [ $vowels ];
                        }
                    }
                    ${"letter{$tk}"} = $v;
                }
            }
        }
        hardcoded_ignore_rulesets_first:{
            $ig0 = ['x'];
            $ig3 = ['q'];
            $ig4 = ['j','q','u','v','z','x'];
            $ig5 = ['x'];
            $ig6 = ['j'];
            $ig7 = ['q'];
            $ig9 = ['j','q','v'];
            $ig10= ['j','q','v'];
            $ig11= ['j','q','v'];
        }
        prepare_word_request:{
            if( ! is_NULL($sessionkey)){
                $sessionkey = preg_replace( '/(.)\\1+/', '$1', $sessionkey );
                $sk         = preg_replace( "/({$cset})({$cset})/", '$1-$2', $sessionkey );
                $sessionkey = $sk;
            }
        }
        prepare_root_word:{
            if( isset( $sk ) ){
                $sko = $sk;
                $check = str_split($sko);
                foreach($check as $k=>$c){
                    if(in_array($c,$vowels)){
                        $vow++;
                    }                
                    if($vow>=2){
                        unset($check[$k]);
                    }
                }
                $sko = implode($check);
                $sko = explode('-',$sko);
                foreach( $sko as $k => $v){
                    if( strlen( $v ) < 2 ){
                        if(isset($sko[$k-1])){
                            $sko[$k-1] = $sko[$k-1] . $v;
                            unset($sko[$k]);
                        }
                    }
                }
                if( isset( $opts['return'] ) ){
                    if( $opts['return'] == 'root' )
                        return $sko;
                }
            }
        }

        if( is_NULL( $letter1 ) )
            $letter1 = _letter( 0, [ 'ignore' => $ig0, 'only' => $on0 ] );

        set_initial_letters_based_on_rules:{
            if( ! is_NULL( $letter1 ) ){
                if( isset( $letters["{$letter1}"][1][0]["{$letter1}"]['only'] ) )
                    $on1 = $letters["{$letter1}"][1][0]["{$letter1}"]['only'];
                if( isset( $letters["{$letter1}"][1][0]["{$letter1}"]['ignore'] ) )
                    $ig1 = array_merge( $ig1, $letters["{$letter1}"][1][0]["{$letter1}"]['ignore'], [ $letter1 ] );
                    if( is_NULL( $letter2 ) )
                        $letter2 = _letter( 1, [ 'ignore' => $ig1, 'only' => $on1 ] );
                if( ! is_NULL( $letter2 ) ){
                    if( isset( $letters["{$letter2}"][1][1]["{$letter1}"]['only'] ) )
                        $on2 = $letters["{$letter2}"][1][1]["{$letter1}"]['only'];
                    if( isset( $letters["{$letter2}"][1][1]["{$letter1}"]['ignore'] ) )
                        $ig2 = array_merge( $ig2, $letters["{$letter2}"][1][1]["{$letter1}"]['ignore'], [ $letter1 ] );
                    if( is_NULL( $letter3 ) )
                        $letter3 = _letter( 2, [ 'ignore' => $ig2, 'only' => $on2 ] );
                    if( ! is_NULL( $letter3 ) ){
                        if( isset( $letters["{$letter3}"][1][2]["{$letter2}"]['only'] ) )
                            $on3 = $letters["{$letter3}"][1][2]["{$letter2}"]['only'];
                        if( isset( $letters["{$letter3}"][1][2]["{$letter2}"]['ignore'] ) )
                            $ig3 = array_merge( $ig3, $letters["{$letter3}"][1][2]["{$letter2}"]['ignore'], [ $letter2 ] );
                        if( is_NULL( $letter4 ) )
                            $letter4 = _letter( 3, [ 'ignore' => $ig3, 'only' => $on3 ] );
                        if( ! is_NULL( $letter4 ) ){
                            if( isset( $letters["{$letter4}"][1][3]["{$letter3}"]['only'] ) )
                                $on4 = $letters["{$letter4}"][1][3]["{$letter3}"]['only'];
                            if( isset( $letters["{$letter4}"][1][3]["{$letter3}"]['ignore'] ) )
                                $ig4 = array_merge( $ig4, $letters["{$letter4}"][1][3]["{$letter3}"]['ignore'], [ $letter3 ] );
                            if( is_NULL( $letter5 ) )
                                $letter5 = _letter( 4, [ 'ignore' => $ig4, 'only' => $on4 ] );
                            if( ! is_NULL( $letter5 ) ){
                                if( isset( $letters["{$letter5}"][1][4]["{$letter4}"]['only'] ) )
                                    $on5 = $letters["{$letter5}"][1][4]["{$letter4}"]['only'];
                                if( isset( $letters["{$letter5}"][1][4]["{$letter4}"]['ignore'] ) )
                                    $ig5 = array_merge( $ig5, $letters["{$letter5}"][1][4]["{$letter4}"]['ignore'], [ $letter4 ] );
                                if( is_NULL( $letter6 ) )
                                    $letter6 = _letter( 5, [ 'ignore' => $ig5, 'only' => $on5 ]  );
                                if( ! is_NULL( $letter6 ) ){
                                    if( isset( $letters["{$letter6}"][1][5]["{$letter5}"]['only'] ) )
                                        $on6 = $letters["{$letter6}"][1][5]["{$letter5}"]['only'];
                                    if( isset( $letters["{$letter6}"][1][5]["{$letter5}"]['ignore'] ) )
                                        $ig6 = array_merge( $ig6, $letters["{$letter6}"][1][5]["{$letter5}"]['ignore'], [ $letter5 ] );
                                    if( is_NULL( $letter7 ) )
                                        $letter7 = _letter( 6, [ 'ignore' => $ig6, 'only' => $on6 ]  );                            
                                    if( ! is_NULL( $letter7 ) ){
                                        if( isset( $letters["{$letter7}"][1][6]["{$letter6}"]['only'] ) )
                                            $on7 = $letters["{$letter7}"][1][6]["{$letter6}"]['only'];
                                        if( isset( $letters["{$letter7}"][1][6]["{$letter6}"]['ignore'] ) )
                                            $ig7 = array_merge( $ig7, $letters["{$letter7}"][1][6]["{$letter6}"]['ignore'], [ $letter6 ] );
                                        if( is_NULL( $letter8 ) )
                                            $letter8 = _letter( 7, [ 'ignore' => $ig7, 'only' => $on7 ]  );
                                        if( ! is_NULL( $letter8 ) ){
                                            if( isset( $letters["{$letter8}"][1][7]["{$letter7}"]['only'] ) )
                                                $on8 = $letters["{$letter8}"][1][7]["{$letter7}"]['only'];
                                            if( isset( $letters["{$letter8}"][1][7]["{$letter7}"]['ignore'] ) )
                                                $ig8 = array_merge( $ig8, $letters["{$letter8}"][1][7]["{$letter7}"]['ignore'], [ $letter7 ] );
                                            if( is_NULL( $letter9 ) )
                                                $letter9 = _letter( 8, [ 'ignore' => $ig8, 'only' => $on8 ]  );
                                            if( ! is_NULL( $letter10 ) ){
                                                if( isset( $letters["{$letter9}"][1][8]["{$letter8}"]['only'] ) )
                                                    $on9 = $letters["{$letter9}"][1][8]["{$letter8}"]['only'];
                                                if( isset( $letters["{$letter9}"][1][8]["{$letter8}"]['ignore'] ) )
                                                    $ig9 = array_merge( $ig9, $letters["{$letter9}"][1][8]["{$letter8}"]['ignore'], [ $letter8 ] );
                                                if( is_NULL( $letter10 ) )
                                                    $letter10 = _letter( 9, [ 'ignore' => $ig9, 'only' => $on9 ]  );
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                $word = 
                    $letter1.
                    $letter2.
                    $letter3.
                    $letter4.
                    $letter5.
                    $letter6.
                    $letter7.
                    $letter8.
                    $letter9.
                    $letter10.
                    $letter11;
            }
        }
        swap_letters:{
            if( strlen( $word ) >= 1 ){
                $sizeofword  = sizeof( str_split( $word ) );
                if( $letter1 = substr( $word, -1 ) ){
                    if( $letter1 == 'y' )
                        ${"letter{$sizeofword}"} = 'a';
                    elseif( $letter1 == 'a' )
                        ${"letter{$sizeofword}"} = 'y';
                }
                else{
                    $letter1 = _letter(0);
                }
            }
            $word = $letter1.$letter2.$letter3.$letter4.$letter5.$letter6.$letter7.$letter8.$letter9.$letter10.$letter11;
        }
        if_less_than_2_characters:{
            # ditch word if less than 2 characters
            if( strlen( $word ) < 2 ){
                $word = _word();
            }
        }
        if_less_than_3_characters:{
            # grab a new word and skip our original first result
            if( strlen( $word ) < 3 ){
                $sk   = isset( $letter1 ) ? $letter1 : NULL;
                $word = _word( NULL, [ 'skip' => $sk ] );
            }
        }

        $word = preg_replace( '/(.)\\1+/', '$1', $word );

        if( str_ends_with( $word, 'x' ) )
            $word = _word();

        $fin = $word;
        $cf  = $fin;

        $first3 = mb_substr( $fin,  0, 3 );
        $last3  = mb_substr( $fin, -3   );
        $last2  = mb_substr( $fin, -2   );
        
        if( mb_strlen( $fin ) >= 7 ){
            if( str_ends_with( $fin, 'the' ) ){
                $fin = mb_substr( $fin, 0, -3 ) . 'th';
            }
            if( str_ends_with( $fin, 'thu' ) ){
                $fin = mb_substr( $fin, 0, -3 ) . 'th';
            }
        }


        if( mb_strlen( $fin ) >= 3 ){
            if( $last2 == 'ht' ){
                $fin = _word( mb_substr( $fin, 0, -2 ) );
            }
        }
        if( mb_strlen( $fin ) >= 4 ){
            if( $first3 == $last3 ){
                $fin = mb_substr( $fin, 0, -3 );
            }
            if( is_string( $fin ) ){
                $fin = explode( '-', preg_replace( "/({$cset})({$cset})/", '$1-$2', $fin ) );
            }
            if( is_array( $fin ) ){
                $fin = array_unique( $fin );
                foreach($fin as $k => $v ){
                    if( mb_strlen( $v ) < 3 )
                        unset($fin[$k]);
                }
                $fin = implode( $fin );
            }
        }

        $fin = str_replace( '-', '', $fin );
        $fin = preg_replace( '/(.)\\1+/', '$1', $fin );

        // completed word------------
        if( ! empty( $origin ) ){
            if( ! isset( $_SESSION['word']["{$origin}"] ) )
                $_SESSION['word']["{$origin}"] = $fin;
        }
        return $fin;
    }

    function _diagram( $str = NULL, $alg = [] ){
        $origin = $str;
        if( ! is_NULL( $str ) ){
          $tokens         = [];
          $lastc          = mb_substr( $str, -1 );
          $type           = 'statement';
          $type           = ( $lastc == '?' ) ? 'question'    : $type;
          $type           = ( $lastc == '!' ) ? 'exclamation' : $type;
          $tokens['type'] = $type;
          $str = str_replace(
          [ '!','.','?',';','-',',','*' ],
          '', $str );
          $str = preg_replace(
            [ 
                '/i\'m/',         '/you\'re/',
                '/he\'s/',        '/she\'s/',
                '/it\'s/',        '/we\'re/',
                '/they\'re/',     '/i\'ve/',
                '/you\'ve/',      '/we\'ve/',
                '/they\'ve/',     '/i\'d/',
                '/you\'d/',       '/he\'d/',
                '/she\'d/',       '/we\'d/',
                '/they\'d/',      '/i\'ll/',
                '/you\'ll/',      '/he\'ll/',
                '/she\'ll/',      '/we\'ll/',
                '/they\'ll/',
                '/isn\'t/',       '/aren\'t/',
                '/wasn\'t/',      '/weren\'t/',
                '/hasn\'t/',      '/haven\'t/',
                '/hadn\'t/',      '/doesn\'t/',
                '/don\'t/',       '/didn\'t/',
                '/won\'t/',       '/wouldn\'t/',
                '/shan\'t/',      '/shouldn\'t/',
                '/can\'t/',       '/cannot/',
                '/couldn\'t/',    '/mustn\'t/',
                '/let\'s/',       '/that\'s/',
                '/who\'s/',       '/what\'s/',
                '/here\'s/',      '/there\'s/',
                '/when\'s/',      '/where\'s/',
                '/why\'s/',       '/how\'s/',
            ],
            [
                'i am',           'you are',
                'he is',          'she is',
                'it is',          'we are',
                'they are',       'i have',
                'you have',       'we have',
                'they have',      'i would had',
                'you would had',  'he would had',
                'she would had',  'we would had',
                'they would had', 'i will',
                'you will',       'he will',
                'she will',       'we will',
                'they will',
                'is not',         'are not',
                'was not',        'were not',
                'has not',        'have not',
                'had not',        'does not',
                'do not',         'did not',
                'wo not',         'would not',
                'shall not',      'should not',
                'can not',        'can not',
                'could not',      'must not',
                'let us',         'that is',
                'who is',         'what is',
                'here is',        'there is',
                'when is',        'where is',
                'why is',         'how is',
            ],
            $str
          );
          $str = strtok( $str, ' ' );
        }
        $articl  = [ 'a',      'an',        'the'                                                                              ];
        $auxils  = [ 'would',  'should',    'could',     'ought'                                                               ];
        $verbsb  = [ 'am',     'is',        'are',       'was',     'were',    'be',     'been',      'being'                  ];
        $verbsh  = [ 'have',   'has',       'had',       'having'                                                              ];
        $verbsd  = [ 'do',     'does',      'did',       'doing'                                                               ];
        $reflex  = [ 'myself', 'ourselves', 'youirself', 'himself', 'herself', 'itself', 'themselves'                          ];
        $pospro  = [           'ours',      'yours',     'his',     'hers',              'theirs'                              ];
        $posadj  = [ 'my',     'our',       'your',      'his',     'her',     'its',    'their'                               ];
        $object  = [ 'me',     'us',        'you',       'him',     'her',     'it',     'them'                                ];
        $subject = [ 'i',      'we',        'you',       'he',      'she',     'it',     'they',      'everything', 'everyone' ];
        $nvaa = [
            'back',          'best',         'better',         'bitter',        'broadside',     'clean',         'clear',         'close',
            'cod',           'collect',      'counter',        'crisscross',    'damn',          'double',        'down',          'even',
            'express',       'fair',         'fast',           'fine',          'firm',          'flush',         'forward',       'free',
            'full',          'home',         'jolly',          'last',          'light',         'low',           'ok',            'okay',
            'out',           'pat',          'plain',          'plumb',         'plump',         'pop',           'prompt',        'quiet',
            'right',         'rough',        'round',          'second',        'short',         'solo',          'square',        'steady',
            'still',         'tiptoe',       'true',           'upstage',       'well',          'wholesale',     'worst',         'wrong',
            'zigzag'
        ];
        $nva = [ 
            'state' 
        ];
        $overlap = [
            'and',           'but',           'if',            'or',            'because',       'as',            'until',         'while',
            'of',            'at',            'by',            'for',           'with',          'about',         'against',       'between',
            'into',          'through',       'during',        'before',        'after',         'above',         'below',         'to',
            'from',          'up',            'down',          'in',            'out',           'on',            'off',           'over',
            'under',         'again',         'further',       'then',          'once',          'here',          'there',         'when',
            'where',         'why',           'how',           'all',           'any',           'both',          'each',          'few',
            'more',          'most',          'other',         'some',          'such',          'no',            'nor',           'not',
            'only',          'own',           'same',          'so',            'than',          'too',           'very'
        ];
        $adjs = [
            'brown',         'quizzical',     'highfalutin',   'dynamic',       'wakeful',       'cheerful',      'thoughtful',    'cooperative',
            'abundant',      'uneven',        'yummy',         'juicy',         'vacuous',       'concerned',     'young',         'sparkling',
            'abhorrent',     'sweltering',    'late',          'macho',         'scrawny',       'friendly',      'kaput',         'divergent',
            'busy',          'charming',      'protective',    'premium',       'puzzled',       'waggish',       'rambunctious',  'puffy',
            'hard',          'fat',           'sedate',        'yellow',        'resonant',      'dapper',        'courageous',    'vast',
            'cool',          'elated',        'wary',          'bewildered',    'level',         'wooden',        'ceaseless',     'tearful',
            'cloudy',        'gullible',      'flashy',        'trite',         'quick',         'nondescript',   'round',         'slow',
            'spiritual',     'brave',         'tenuous',       'abstracted',    'colossal',      'sloppy',        'obsolete',      'elegant',
            'fabulous',      'vivacious',     'exuberant',     'faithful',      'helpless',      'odd',           'sordid',        'blue',
            'imported',      'ugly',          'ruthless',      'deeply',        'eminent',       'reminiscent',   'rotten',        'sour',
            'volatile',      'succinct',      'judicious',     'abrupt',        'learned',       'stereotyped',   'evanescent',    'efficacious',
            'festive',       'loose',         'torpid',        'condemned',     'selective',     'strong',        'momentous',     'ordinary',
            'dry',           'great',         'ultra',         'ahead',         'broken',        'dusty',         'piquant',       'creepy',
            'miniature',     'periodic',      'equable',       'unsightly',     'narrow',        'grieving',      'whimsical',     'fantastic',
            'kindhearted',   'miscreant',     'cowardly',      'cloistered',    'marked',        'bloody',        'chunky',        'undesirable',
            'oval',          'nauseating',    'aberrant',      'stingy',        'standing',      'distinct',      'illegal',       'angry',
            'faint',         'rustic',        'few',           'calm',          'gorgeous',      'mysterious',    'tacky',         'unadvised',
            'greasy',        'minor',         'loving',        'melodic',       'flat',          'wretched',      'clever',        'barbarous',
            'pretty',        'endurable',     'handsomely',    'unequaled',     'acceptable',    'symptomatic',   'hurt',          'tested',
            'long',          'warm',          'ignorant',      'ashamed',       'excellent',     'known',         'adamant',       'eatable',
            'verdant',       'meek',          'unbiased',      'rampant',       'somber',        'cuddly',        'harmonious',    'salty',
            'overwrought',   'stimulating',   'beautiful',     'crazy',         'grouchy',       'thirsty',       'joyous',        'confused',
            'terrible',      'high',          'unarmed',       'gabby',         'wet',           'sharp',         'wonderful',     'magenta',
            'tan',           'huge',          'productive',    'defective',     'chilly',        'needy',         'imminent',      'flaky',
            'fortunate',     'neighborly',    'hot',           'husky',         'optimal',       'gaping',        'faulty',        'guttural',
            'massive',       'watery',        'abrasive',      'ubiquitous',    'aspiring',      'impartial',     'annoyed',       'billowy',
            'lucky',         'panoramic',     'heartbreaking', 'fragile',       'purring',       'wistful',       'burly',         'filthy',
            'psychedelic',   'harsh',         'disagreeable',  'ambiguous',     'short',         'splendid',      'crowded',       'light',
            'yielding',      'hypnotic',      'dispensable',   'deserted',      'nonchalant',    'green',         'puny',          'deafening',
            'classy',        'tall',          'typical',       'exclusive',     'materialistic', 'mute',          'shaky',         'inconclusive',
            'rebellious',    'doubtful',      'telling',       'unsuitable',    'woebegone',     'cold',          'sassy',         'arrogant',
            'perfect',       'adhesive',      'industrious',   'crabby',        'curly',         'voiceless',     'nostalgic',     'better',
            'slippery',      'willing',       'nifty',         'orange',        'victorious',    'ritzy',         'wacky',         'vigorous',
            'spotless',      'good',          'powerful',      'bashful',       'soggy',         'grubby',        'moaning',       'placid',
            'permissible',   'half',          'towering',      'bawdy',         'measly',        'abaft',         'delightful',    'goofy',
            'capricious',    'nonstop',       'addicted',      'acoustic',      'furtive',       'erratic',       'heavy',         'square',
            'delicious',     'needless',      'resolute',      'innocent',      'abnormal',      'hurried',       'awful',         'impossible',
            'aloof',         'giddy',         'large',         'pointless',     'petite',        'jolly',         'boundless',     'abounding',
            'hilarious',     'heavenly',      'honorable',     'squeamish',     'red',           'phobic',        'trashy',        'pathetic',
            'parched',       'godly',         'greedy',        'pleasant',      'small',         'aboriginal',    'dashing',       'icky',
            'bumpy',         'laughable',     'hapless',       'silent',        'scary',         'shaggy',        'organic',       'unbecoming',
            'inexpensive',   'wrong',         'repulsive',     'flawless',      'labored',       'disturbed',     'aboard',        'gusty',
            'loud',          'jumbled',       'exotic',        'vulgar',        'threatening',   'belligerent',   'synonymous',    'encouraging',
            'fancy',         'embarrassed',   'clumsy',        'fast',          'ethereal',      'chubby',        'high-pitched',  'plastic',
            'open',          'straight',      'little',        'ancient',       'fair',          'psychotic',     'murky',         'earthy',
            'callous',       'heady',         'lamentable',    'hallowed',      'obtainable',    'toothsome',     'oafish',        'gainful',
            'flippant',      'tangy',         'tightfisted',   'damaging',      'utopian',       'gaudy',         'brainy',        'imperfect',
            'shiny',         'fanatical',     'snotty',        'relieved',      'shallow',       'foamy',         'parsimonious',  'gruesome',
            'elite',         'wide',          'kind',          'bored',         'tangible',      'depressed',     'boring',        'screeching',
            'outrageous',    'determined',    'picayune',      'glossy',        'historical',    'staking',       'curious',       'gigantic',
            'wandering',     'profuse',       'vengeful',      'glib',          'unaccountable', 'frightened',    'outstanding',   'chivalrous',
            'workable',      'modern',        'swanky',        'comfortable',   'gentle',        'substantial',   'brawny',        'curved',
            'nebulous',      'boorish',       'afraid',        'fierce',        'efficient',     'lackadaisical', 'recondite',     'internal',
            'absorbed',      'squealing',     'frail',         'thundering',    'wanting',       'cooing',        'axiomatic',     'debonair',
            'boiling',       'tired',         'numberless',    'flowery',       'mushy',         'enthusiastic',  'proud',         'upset',
            'hungry',        'astonishing',   'deadpan',       'prickly',       'mammoth',       'absurd',        'clean',         'jittery',
            'wry',           'entertaining',  'literate',      'lying',         'uninterested',  'aquatic',       'super',         'languid',
            'cute',          'absorbing',     'scattered',     'brief',         'halting',       'bright',        'fuzzy',         'lethal',
            'scarce',        'aggressive',    'obsequious',    'fine',          'giant',         'holistic',      'pastoral',      'stormy',
            'quaint',        'nervous',       'wasteful',      'grotesque',     'loutish',       'abiding',       'unable',        'black',
            'dysfunctional', 'knowledgeable', 'truculent',     'various',       'luxuriant',     'shrill',        'spiffy',        'guarded',
            'colorful',      'misty',         'spurious',      'freezing',      'glamorous',     'famous',        'new',           'instinctive',
            'nasty',         'exultant',      'seemly',        'tawdry',        'maniacal',      'wrathful',      'shy',           'nutritious',
            'idiotic',       'worried',       'bad',           'stupid',        'ruddy',         'wholesale',     'naughty',       'thoughtless',
            'futuristic',    'available',     'slimy',         'cynical',       'fluffy',        'plausible',     'nasty',         'tender',
            'changeable',    'smiling',       'oceanic',       'satisfying',    'steadfast',     'ugliest',       'crooked',       'subsequent',
            'fascinated',    'woozy',         'teeny',         'quickest',      'moldy',         'uppity',        'sable',         'horrible',
            'silly',         'ad-hoc',        'numerous',      'berserk',       'wiry',          'knowing',       'lazy',          'childlike',
            'zippy',         'fearless',      'pumped',        'weak',          'tacit',         'weary',         'rapid',         'precious',
            'smoggy',        'swift',         'lyrical',       'steep',         'quack',         'direful',       'talented',      'hesitant',
            'fallacious',    'ill',           'quarrelsome',   'quiet',         'flipped-out',   'didactic',      'fluttering',    'glorious',
            'tough',         'sulky',         'elfin',         'abortive',      'sweet',         'habitual',      'supreme',       'hollow',
            'possessive',    'inquisitive',   'adjoining',     'incandescent',  'lowly',         'majestic',      'bizarre',       'acrid',
            'expensive',     'aback',         'unusual',       'foolish',       'jobless',       'capable',       'damp',          'political',
            'dazzling',      'erect',         'Early',         'immense',       'hellish',       'omniscient',    'reflective',    'lovely',
            'incompetent',   'empty',         'breakable',     'educated',      'easy',          'devilish',      'assorted',      'decorous',
            'jaded',         'homely',        'dangerous',     'adaptable',     'coherent',      'dramatic',      'tense',         'abject',
            'fretful',       'troubled',      'diligent',      'solid',         'plain',         'raspy',         'irate',         'offbeat',
            'healthy',       'melted',        'cagey',         'many',          'wild',          'venomous',      'animated',      'alike',
            'youthful',      'ripe',          'alcoholic',     'sincere',       'teeny-tiny',    'lush',          'defeated',      'zonked',
            'foregoing',     'dizzy',         'frantic',       'obnoxious',     'funny',         'damaged',       'grandiose',     'spectacular',
            'maddening',     'defiant',       'makeshift',     'strange',       'painstaking',   'merciful',      'madly',         'clammy',
            'itchy',         'difficult',     'clear',         'used',          'temporary',     'abandoned',     'null',          'rainy',
            'evil',          'alert',         'domineering',   'amuck',         'rabid',         'jealous',       'robust',        'obeisant',
            'overt',         'enchanting',    'longing',       'cautious',      'motionless',    'bitter',        'anxious',       'craven',
            'breezy',        'ragged',        'skillful',      'quixotic',      'knotty',        'grumpy',        'dark',          'draconian',
            'alluring',      'magical',       'versed',        'humdrum',       'accurate',      'ludicrous',     'sleepy',        'envious',
            'lavish',        'roasted',       'thinkable',     'overconfident', 'roomy',         'painful',       'wee',           'observant',
            'old-fashioned', 'drunk',         'royal',         'likeable',      'adventurous',   'eager',         'obedient',      'attractive',
            'x-rated',       'spooky',        'poised',        'righteous',     'excited',       'real',          'abashed',       'womanly',
            'ambitious',     'lacking',       'testy',         'big',           'gamy',          'early',         'auspicious',    'blue-eyed',
            'discreet',      'nappy',         'vague',         'helpful',       'nosy',          'perpetual',     'disillusioned', 'overrated',
            'gleaming',      'tart',          'soft',          'agreeable',     'therapeutic',   'accessible',    'poor',          'gifted',
            'old',           'humorous',      'flagrant',      'magnificent',   'alive',         'understood',    'economic',      'mighty',
            'ablaze',        'racial',        'tasteful',      'purple',        'broad',         'lean',          'legal',         'witty',
            'nutty',         'icy',           'feigned',       'redundant',     'adorable',      'apathetic',     'jumpy',         'scientific',
            'combative',     'worthless',     'tasteless',     'voracious',     'jazzy',         'uptight',       'utter',         'hospitable',
            'imaginary',     'finicky',       'shocking',      'dead','noisy',  'shivering',     'subdued',       'rare',          'natural',
            'zealous',       'demonic',       'ratty',         'snobbish',      'deranged',      'muddy',         'whispering',    'credible',
            'hulking',       'fertile',       'tight',         'abusive',       'functional',    'obscene',       'thankful',      'daffy',
            'smelly',        'lively',        'homeless',      'secretive',     'amused',        'lewd',          'mere',          'agonizing',
            'sad',           'innate',        'sneaky',        'noxious',       'illustrious',   'alleged',       'cultured',      'tame',
            'macabre',       'lonely',        'mindless',      'low',           'scintillating', 'statuesque',    'decisive',      'rhetorical',
            'hysterical',    'happy',         'earsplitting',  'mundane',       'spicy',         'overjoyed',     'taboo',         'peaceful',
            'forgetful',     'elderly',       'upbeat',        'squalid',       'warlike',       'dull',          'plucky',        'handsome',
            'groovy',        'absent',        'wise',          'romantic',      'invincible',    'receptive',     'smooth',        'different',
            'tiny',          'cruel',         'dirty',         'mature',        'faded',         'tiresome',      'wicked',        'average',
            'panicky',       'detailed',      'juvenile',      'scandalous',    'steady',        'wealthy',       'deep',          'sticky',
            'jagged',        'wide-eyed',     'tasty',         'disgusted',     'garrulous',     'graceful',      'tranquil',      'annoying',
            'hissing',       'noiseless',     'selfish',       'onerous',       'lopsided',      'ossified',      'penitent',      'malicious',
            'aromatic',      'successful',    'zany',          'evasive',       'wet',           'naive',         'nice',          'uttermost',
            'brash',         'muddled',       'energetic',     'accidental',    'silky',         'guiltless',     'important',     'drab',
            'aware',         'skinny',        'careful',       'rightful',      'tricky',        'sore',          'rich',          'blushing',
            'stale',         'daily',         'watchful',      'uncovered',     'rough',         'fresh',         'hushed',        'rural',
            'questionable',
        ];
        $noun = [
            'ball',          'bat',           'bed',           'book',          'boy',           'bun',           'can',           'cake',
            'cap',           'car',           'cat',           'cow',           'cub',           'cup',           'dad',           'day',
            'dog',           'doll',          'dust',          'fan',           'feet',          'girl',          'gun',           'hall',
            'hat',           'hen',           'jar',           'kite',          'man',           'map',           'men',           'mom',
            'pan',           'pet',           'pie',           'pig',           'pot',           'rat',           'son',           'sun',
            'toe',           'tub',           'van',           'apple',         'arm',           'banana',        'bike',          'bird',
            'book',          'chin',          'clam',          'class',         'clover',        'club',          'corn',          'crayon',
            'crow',          'crown',         'crowd',         'crib',          'desk',          'dime',          'dirt',          'dress',
            'fang',          'field',         'flag',          'flower',        'fog',           'game',          'heat',          'hill',
            'home',          'horn',          'hose',          'joke',          'juice',         'kite',          'lake',          'maid',
            'mask',          'mice',          'milk',          'mint',          'meal',          'meat',          'moon',          'mother',
            'morning',       'name',          'nest',          'nose',          'pear',          'pen',           'pencil',        'plant',
            'rain',          'river',         'road',          'rock',          'room',          'rose',          'seed',          'shape',
            'shoe',          'shop',          'show',          'sink',          'snail',         'snake',         'snow',          'soda',
            'sofa',          'star',          'step',          'stew',          'stove',         'straw',         'string',        'summer',
            'swing',         'table',         'tank',          'team',          'tent',          'test',          'toes',          'tree',
            'vest',          'water',         'wing',          'winter',        'woman',         'women',         'alarm',         'animal',
            'aunt',          'bait',          'balloon',       'bath',          'bead',          'beam',          'bean',          'bedroom',
            'boot',          'bread',         'brick',         'brother',       'camp',          'chicken',       'children',      'crook',
            'deer',          'dock',          'doctor',        'downtown',      'drum',          'dust',          'eye',           'family',
            'father',        'fight',         'flesh',         'food',          'frog',          'goose',         'grade',         'grandfather',
            'grandmother',   'grape',         'grass',         'hook',          'horse',         'jail',          'jam',           'kiss',
            'kitten',        'light',         'loaf',          'lock',          'lunch',         'lunchroom',     'meal',          'mother',
            'notebook',      'owl',           'pail',          'parent',        'park',          'plot',          'rabbit',        'rake',
            'robin',         'sack',          'sail',          'scale',         'sea',           'sister',        'soap',          'song',
            'spark',         'space',         'spoon',         'spot',          'spy',           'summer',        'tiger',         'toad',
            'town',          'trail',         'tramp',         'tray',          'trick',         'trip',          'uncle',         'vase',
            'winter',        'water',         'week',          'wheel',         'wish',          'wool',          'yard',          'zebra',
            'actor',         'airplane',      'airport',       'army',          'baseball',      'beef',          'birthday',      'boy',
            'brush',         'bushes',        'butter',        'cast',          'cave',          'cent',          'cherries',      'cherry',
            'cobweb',        'coil',          'cracker',       'dinner',        'eggnog',        'elbow',         'face',          'fireman',
            'flavor',        'gate',          'glove',         'glue',          'goldfish',      'goose',         'grain',         'hair',
            'haircut',       'hobbies',       'holiday',       'hot',           'jellyfish',     'ladybug',       'mailbox',       'number',
            'oatmeal',       'pail',          'pancake',       'pear',          'pest',          'popcorn',       'queen',         'quicksand',
            'quiet',         'quilt',         'rainstorm',     'scarecrow',     'scarf',         'stream',        'street',        'sugar',
            'throne',        'toothpaste',    'twig',          'volleyball',    'wood',          'wrench',        'advice',        'anger',
            'answer',        'apple',         'arithmetic',    'badge',         'basket',        'basketball',    'battle',        'beast',
            'beetle',        'beggar',        'brain',         'branch',        'bubble',        'bucket',        'cactus',        'cannon',
            'cattle',        'celery',        'cellar',        'cloth',         'coach',         'coast',         'crate',         'cream',
            'daughter',      'donkey',        'drug',          'earthquake',    'feast',         'fifth',         'finger',        'flock',
            'frame',         'furniture',     'geese',         'ghost',         'giraffe',       'governor',      'honey',         'hope',
            'hydrant',       'icicle',        'income',        'island',        'jeans',         'judge',         'lace',          'lamp',
            'lettuce',       'marble',        'month',         'north',         'ocean',         'patch',         'plane',         'playground',
            'poison',        'riddle',        'rifle',         'scale',         'seashore',      'sheet',         'sidewalk',      'skate',
            'slave',         'sleet',         'smoke',         'stage',         'station',       'thrill',        'throat',        'throne',
            'title',         'toothbrush',    'turkey',        'underwear',     'vacation',      'vegetable',     'visitor',       'voyage',
            'year',          'able',          'achieve',       'acoustics',     'activity',      'aftermath',     'afternoon',     'fox',
            'afterthought',  'apparel',       'appliance',     'beginner',      'believe',       'bomb',          'border',        'boundary',
            'breakfast',     'cabbage',       'cable',         'calculator',    'calendar',      'caption',       'carpenter',     'cemetery',
            'channel',       'circle',        'creator',       'creature',      'education',     'faucet',        'feather',       'friction',
            'fruit',         'fuel',          'galley',        'guide',         'guitar',        'health',        'heart',         'idea',
            'kitten',        'laborer',       'language',      'lawyer',        'linen',         'locket',        'lumber',        'magic',
            'minister',      'mitten',        'money',         'mountain',      'music',         'partner',       'passenger',     'pickle',
            'picture',       'plantation',    'plastic',       'pleasure',      'pocket',        'police',        'pollution',     'railway',
            'recess',        'reward',        'route',         'scene',         'scent',         'squirrel',      'stranger',      'suit',
            'sweater',       'temper',        'territory',     'texture',       'thread',        'treatment',     'veil',          'vein',
            'volcano',       'wealth',        'weather',       'wilderness',    'wren',          'wrist',         'writer',        'account',
            'achiever',      'acoustics',     'act',           'action',        'activity',      'actor',         'addition',      'adjustment',
            'advertisement', 'advice',        'aftermath',     'afternoon',     'afterthought',  'agreement',     'air',           'airplane',
            'airport',       'alarm',         'amount',        'amusement',     'anger',         'angle',         'animal',        'answer',
            'ant',           'ants',          'apparatus',     'apparel',       'apple',         'apples',        'appliance',     'approval',
            'arch',          'argument',      'arithmetic',    'arm',           'army',          'art',           'attack',        'attempt',
            'attention',     'attraction',    'aunt',          'authority',     'babies',        'baby',          'back',          'badge',
            'bag',           'bait',          'balance',       'ball',          'balloon',       'balls',         'banana',        'band',
            'base',          'baseball',      'basin',         'basket',        'basketball',    'bat',           'bath',          'battle',
            'bead',          'beam',          'bean',          'bear',          'bears',         'beast',         'bed',           'bedroom',
            'beds',          'bee',           'beef',          'beetle',        'beggar',        'beginner',      'behavior',      'belief',
            'believe',       'bell',          'bells',         'berry',         'bike',          'bikes',         'bird',          'birds',
            'birth',         'birthday',      'bit',           'bite',          'blade',         'blood',         'blow',          'board',
            'boat',          'boats',         'body',          'bomb',          'bone',          'book',          'books',         'boot',
            'border',        'bottle',        'boundary',      'box',           'boy',           'boys',          'brain',         'brake',
            'branch',        'brass',         'bread',         'breakfast',     'breath',        'brick',         'bridge',        'brother',
            'brothers',      'brush',         'bubble',        'bucket',        'building',      'bulb',          'bun',
            'burst',         'bushes',        'business',      'butter',        'button',        'cabbage',       'cable',         'cactus',
            'cake',          'cakes',         'calculator',    'calendar',      'camera',        'camp',          'can',           'cannon',
            'canvas',        'cap',           'caption',       'car',           'card',          'care',          'carpenter',     'carriage',
            'cars',          'cart',          'cast',          'cat',           'cats',          'cattle',        'cause',         'cave',
            'celery',        'cellar',        'cemetery',      'cent',          'chain',         'chair',         'chairs',        'chalk',
            'chance',        'change',        'channel',       'cheese',        'cherries',      'cherry',        'chess',         'chicken',
            'chickens',      'children',      'chin',          'church',        'circle',        'clam',          'class',         'clock',
            'clocks',        'cloth',         'cloud',         'clouds',        'clover',        'club',          'coach',         'coal',
            'coast',         'coat',          'cobweb',        'coil',          'collar',        'color',         'comb',          'comfort',
            'committee',     'company',       'comparison',    'competition',   'condition',     'connection',    'control',       'cook',
            'copper',        'copy',          'cord',          'cork',          'corn',          'cough',         'country',       'cover',
            'cow',           'cows',          'crack',         'cracker',       'crate',         'crayon',        'cream',         'creator',
            'creature',      'credit',        'crib',          'crime',         'crook',         'crow',          'crowd',         'crown',
            'crush',         'cry',           'cub',           'cup',           'current',       'curtain',       'curve',         'cushion',
            'dad',           'daughter',      'day',           'death',         'debt',          'decision',      'deer',          'degree',
            'design',        'desire',        'desk',          'destruction',   'detail',        'development',   'digestion',     'dime',
            'dinner',        'dinosaurs',     'direction',     'dirt',          'discovery',     'discussion',    'disease',       'disgust',
            'distance',      'distribution',  'division',      'dock',          'doctor',        'dog',           'dogs',          'doll',
            'dolls',         'donkey',        'door',          'downtown',      'drain',         'drawer',        'dress',         'drink',
            'driving',       'drop',          'drug',          'drum',          'duck',          'ducks',         'dust',          'ear',
            'earth',         'earthquake',    'edge',          'education',     'effect',        'egg',           'eggnog',        'eggs',
            'elbow',         'end',           'engine',        'error',         'event',         'example',       'exchange',      'existence',
            'expansion',     'experience',    'expert',        'eye',           'eyes',          'face',          'fact',          'fairies',
            'fall',          'family',        'fan',           'fang',          'farm',          'farmer',        'father',        'fathers',
            'faucet',        'fear',          'feast',         'feather',       'feeling',       'feet',          'fiction',       'field',
            'fifth',         'fight',         'finger',        'fingers',       'fire',          'fireman',       'fish',          'flag',
            'flame',         'flavor',        'flesh',         'flight',        'flock',         'floor',         'flower',        'flowers',
            'fly',           'fog',           'fold',          'food',          'foot',          'force',         'fork',          'form',
            'fowl',          'frame',         'friction',      'friend',        'friends',       'frog',          'frogs',         'front',
            'fruit',         'fuel',          'furniture',     'alley',         'game',          'garden',        'gate',          'geese',
            'ghost',         'giants',        'giraffe',       'girl',          'girls',         'glass',         'glove',         'glue',
            'goat',          'gold',          'goldfish',      'good-bye',      'goose',         'government',    'governor',      'grade',
            'grain',         'grandfather',   'grandmother',   'grape',         'grass',         'grip',          'ground',        'group',
            'growth',        'guide',         'guitar',        'gun',           'hair',          'haircut',       'hall',          'hammer',
            'hand',          'hands',         'harbor',        'harmony',       'hat',           'hate',          'head',          'health',
            'hearing',       'heart',         'heat',          'help',          'hen',           'hill',          'history',       'hobbies',
            'hole',          'holiday',       'home',          'honey',         'hook',          'hope',          'horn',          'horse',
            'horses',        'hose',          'hospital',      'hot',           'hour',          'house',         'houses',        'humor',
            'hydrant',       'ice',           'icicle',        'idea',          'impulse',       'income',        'increase',      'industry',
            'ink',           'insect',        'instrument',    'insurance',     'interest',      'invention',     'iron',          'island',
            'jail',          'jam',           'jar',           'jeans',         'jelly',         'jellyfish',     'jewel',         'join',
            'joke',          'journey',       'judge',         'juice',         'jump',          'kettle',        'key',           'kick',
            'kiss',          'kite',          'kitten',        'kittens',       'kitty',         'knee',          'knife',         'knot',
            'knowledge',     'laborer',       'lace',          'ladybug',       'lake',          'lamp',          'land',          'language',
            'laugh',         'lawyer',        'lead',          'leaf',          'learning',      'leather',       'leg',           'legs',
            'letter',        'letters',       'lettuce',       'level',         'library',       'lift',          'light',         'limit',
            'line',          'linen',         'lip',           'liquid',        'list',          'lizards',       'loaf',          'lock',
            'locket',        'look',          'loss',          'love',          'low',           'lumber',        'lunch',         'lunchroom',
            'machine',       'magic',         'maid',          'mailbox',       'man',           'manager',       'map',           'marble',
            'mark',          'market',        'mask',          'mass',          'match',         'meal',          'measure',       'meat',
            'meeting',       'memory',        'men',           'metal',         'mice',          'middle',        'milk',          'mind',
            'mine',          'minister',      'mint',          'minute',        'mist',          'mitten',        'mom',           'money',
            'monkey',        'month',         'moon',          'morning',       'mother',        'motion',        'mountain',      'mouth',
            'move',          'muscle',        'music',         'nail',          'name',          'nation',        'neck',          'need',
            'needle',        'nerve',         'nest',          'net',           'news',          'night',         'noise',         'north',
            'nose',          'note',          'notebook',      'number',        'nut',           'oatmeal',       'observation',   'ocean',
            'offer',         'office',        'oil',           'operation',     'opinion',       'orange',        'oranges',       'order',
            'organization',  'ornament',      'oven',          'owl',           'owner',         'page',          'pail',          'pain',
            'paint','pan',   'pancake',       'paper',         'parcel',        'parent',        'park',          'part',
            'partner',       'party',         'passenger',     'paste',         'patch',         'payment',       'peace',         'pear',
            'pen',           'pencil',        'person',        'pest',          'pet',           'pets',          'pickle',        'picture',
            'pie',           'pies',          'pig',           'pigs',          'pin',           'pipe',          'pizzas',        'place',
            'plane',         'planes',        'plant',         'plantation',    'plants',        'plastic',       'plate',         'play',
            'playground',    'pleasure',      'plot',          'plough',        'pocket',        'point',         'poison',        'police',
            'polish',        'pollution',     'popcorn',       'porter',        'position',      'pot',           'potato',        'powder',
            'power',         'price',         'print',         'prison',        'process',       'produce',       'profit',        'property',
            'prose',         'protest',       'pull',          'pump',          'punishment',    'purpose',       'push',          'quarter',
            'quartz',        'queen',         'question',      'quicksand',     'quiet',         'quill',         'quilt',         'quince',
            'quiver',        'rabbit',        'rabbits',       'rail',          'railway',       'rain',          'rainstorm',     'rake',
            'range',         'rat',           'rate',          'ray',           'reaction',      'reading',       'reason',        'receipt',
            'recess',        'record',        'regret',        'relation',      'religion',      'representative','request',       'respect',
            'rest',          'reward',        'rhythm',        'rice',          'riddle',        'rifle',         'ring',          'rings',
            'river',         'road',          'robin',         'rock',          'rod',           'roll',          'roof',          'room',
            'root',          'rose',          'route',         'rub',           'rule',          'run',           'sack',          'sail',
            'salt',          'sand',          'scale',         'scarecrow',     'scarf',         'scene',         'scent',         'school',
            'science',       'scissors',      'screw',         'sea',           'seashore',      'seat',          'secretary',     'seed',
            'selection',     'self',          'sense',         'servant',       'shade',         'shake',         'shame',         'shape',
            'sheep',         'sheet',         'shelf',         'ship',          'shirt',         'shock',         'shoe',          'shoes',
            'shop',          'show',          'side',          'sidewalk',      'sign',          'silk',          'silver',        'sink',
            'sister',        'sisters',       'size',          'skate',         'skin',          'skirt',         'sky',           'slave',
            'sleep',         'sleet',         'slip',          'slope',         'smash',         'smell',         'smile',         'smoke',
            'snail',         'snails',        'snake',         'snakes',        'sneeze',        'snow',          'soap',          'society',
            'sock',          'soda',          'sofa',          'son',           'song',          'songs',         'sort',          'sound',
            'soup',          'space',         'spade',         'spark',         'spiders',       'sponge',        'spoon',         'spot',
            'spring',        'spy',           'square',        'squirrel',      'stage',         'stamp',         'star',          'start',
            'statement',     'station',       'steam',         'steel',         'stem',          'step',          'stew',          'stick',
            'sticks',        'stitch',        'stocking',      'stomach',       'stone',         'stop',          'store',         'story',
            'stove',         'stranger',      'straw',         'stream',        'street',        'stretch',       'string',        'structure',
            'substance',     'sugar',         'suggestion',    'suit',          'summer',        'sun',           'support',       'surprise',
            'sweater',       'swim',          'swing',         'system',        'table',         'tail',          'talk',          'tank',
            'taste',         'tax',           'teaching',      'team',          'teeth',         'temper',        'tendency',      'tent',
            'territory',     'test',          'texture',       'theory',        'thing',         'things',        'thought',       'thread',
            'thrill',        'throat',        'throne',        'thumb',         'thunder',       'ticket',        'tiger',         'time',
            'tin',           'title',         'toad',          'toe',           'toes',          'tomatoes',      'tongue',        'tooth',
            'toothbrush',    'toothpaste',    'top',           'touch',         'town',          'toy',           'toys',          'trade',
            'trail',         'train',         'trains',        'tramp',         'transport',     'tray',          'treatment',     'tree',
            'trees',         'trick',         'trip',          'trouble',       'trousers',      'truck',         'trucks',        'tub',
            'turkey',        'turn',          'twig',          'twist',         'umbrella',      'uncle',         'underwear',     'unit',
            'use',           'vacation',      'value',         'van',           'vase',          'vegetable',     'veil',          'vein',
            'verse',         'vessel',        'vest',          'view',          'visitor',       'voice',         'volcano',       'volleyball',
            'voyage',        'walk',          'wall',          'war',           'wash',          'waste',         'watch',         'water',
            'wave',          'waves',         'wax',           'way',           'wealth',        'weather',       'week',          'weight',
            'wheel',         'whip',          'whistle',       'wilderness',    'wind',          'window',        'wine',          'wing',
            'winter',        'wire',          'wish',          'woman',         'women',         'wood',          'wool',          'word',
            'work',          'worm',          'wound',         'wren',          'wrench',        'wrist',         'writer',        'writing',
            'yak',           'yam',           'yard',          'yarn',          'year',          'yoke',          'zebra',         'zephyr',
            'zinc',          'zipper',        'zoo',
        ];
        $verb = [
            'abide',         'accelerate',    'accept',        'accomplish',    'achieve',       'acquire',       'acted',         'activate',
            'adapt',         'add',           'address',       'administer',    'admire',        'admit',         'adopt',         'advise',
            'afford',        'agree',         'alert',         'alight',        'allow',         'altered',       'amuse',         'analyze',
            'announce',      'annoy',         'answer',        'anticipate',    'apologize',     'appear',        'applaud',       'applied',
            'appoint',       'appraise',      'appreciate',    'approve',       'arbitrate',     'argue',         'arise',         'arrange',
            'arrest',        'arrive',        'ascertain',     'ask',           'assemble',      'assess',        'assist',        'assure',
            'attach',        'attack',        'attain',        'attempt',       'attend',        'attract',       'audited',       'avoid',
            'back',          'bake',          'balance',       'ban',           'bang',          'bare',          'bat',           'bathe',
            'battle',        'be',            'beam',          'bear',          'beat',          'become',        'beg',           'begin',
            'behave',        'behold',        'belong',        'bend',          'beset',         'bet',           'bid',           'bind',
            'bite',          'bleach',        'bleed',         'bless',         'blind',         'blink',         'blot',          'blow',
            'blush',         'boast',         'boil',          'bolt',          'bomb',          'book',          'bore',          'borrow',
            'bounce',        'bow',           'box',           'brake',         'branch',        'break',         'breathe',       'breed',
            'brief',         'bring',         'broadcast',     'bruise',        'brush',         'bubble',        'budget',        'build',
            'bump',          'burn',          'burst',         'bury',          'bust',          'buy',           'buze',          'awake',
            'calculate',     'call',          'camp',          'care',          'carry',         'carve',         'cast',          'catalog',
            'catch',         'cause',         'challenge',     'change',        'charge',        'chart',         'chase',         'cheat',
            'check',         'cheer',         'chew',          'choke',         'choose',        'chop',          'claim',         'clap',
            'clarify',       'classify',      'clean',         'clear',         'cling',         'clip',          'close',         'clothe',
            'coach',         'coil',          'collect',       'color',         'comb',          'come',          'command',       'communicate',
            'compare',       'compete',       'compile',       'complain',      'complete',      'compose',       'compute',       'conceive',
            'concentrate',   'conceptualize', 'concern',       'conclude',      'conduct',       'confess',       'confront',      'confuse',
            'connect',       'conserve',      'consider',      'consist',       'consolidate',   'construct',     'consult',       'contain',
            'continue',      'contract',      'control',       'convert',       'coordinate',    'copy',          'correct',       'correlate',
            'cost',          'cough',         'counsel',       'count',         'cover',         'crack',         'crash',         'crawl',
            'create',        'creep',         'critique',      'cross',         'crush',         'cry',           'cure',          'curl',
            'curve',         'cut',           'cycle',         'dam',           'damage',        'dance',         'dare',
            'deal',          'decay',         'deceive',       'decide',        'decorate',      'define',        'delay',         'delegate',
            'delight',       'deliver',       'demonstrate',   'depend',        'describe',      'desert',        'deserve',       'design',
            'destroy',       'detail',        'detect',        'determine',     'develop',       'devise',        'diagnose',      'dig',
            'direct',        'disagree',      'disappear',     'disapprove',    'disarm',        'discover',      'dislike',       'dispense',
            'display',       'disprove',      'dissect',       'distribute',    'dive',          'divert',        'divide',        'do',
            'double',        'doubt',         'draft',         'drag',          'drain',         'dramatize',     'draw',          'dream',
            'dress',         'drink',         'drip',          'drive',         'drop',          'drown',         'drum',          'dry',
            'dust',          'dwell',         'earn',          'eat',           'edited',        'educate',       'fail',
            'eliminate',     'embarrass',     'employ',        'empty',         'enacted',       'encourage',     'end',           'endure',
            'enforce',       'engineer',      'enhance',       'enjoy',         'enlist',        'ensure',        'enter',         'entertain',
            'escape',        'establish',     'estimate',      'evaluate',      'examine',       'exceed',        'excite',        'excuse',
            'execute',       'exercise',      'exhibit',       'exist',         'expand',        'expect',        'expedite',      'experiment',
            'explain',       'explode',       'express',       'extend',        'extract',       'face',          'facilitate',    'fade',
            'fancy',         'fasten',        'fax',           'fear',          'feed',          'feel',          'fence',         'fetch',
            'fight',         'file',          'fill',          'film',          'finalize',      'finance',       'find',          'fire',
            'fit',           'fix',           'flap',          'flash',         'flee',          'fling',         'float',         'flood',
            'flow',          'flower',        'fly',           'fold',          'follow',        'fool',          'forbid',        'force',
            'forecast',      'forego',        'foresee',       'foretell',      'forget',        'forgive',       'form',          'formulate',
            'forsake',       'frame',         'freeze',        'frighten',      'fry',           'gather',        'gaze',          'generate',
            'give',          'glow',          'glue',          'go',            'govern',        'grab',          'graduate',      'grate',
            'grease',        'greet',         'grin',          'grind',         'grip',          'groan',         'grow',          'guarantee',
            'guard',         'guess',         'guide',         'hammer',        'hand',          'handle',        'handwrite',     'hypothesize',
            'hang',          'happen',        'harass',        'harm',          'hate',          'haunt',         'head',          'heal',
            'heap',          'hear',          'heat',          'help',          'hide',          'hit',           'hold',          'hook',
            'hop',           'hope',          'hover',         'hug',           'hum',           'hunt',          'hurry',         'hurt',
            'identify',      'ignore',        'illustrate',    'imagine',       'implement',     'impress',       'improve',       'improvise',
            'include',       'increase',      'induce',        'influence',     'inform',        'initiate',      'inject',        'injure',
            'inlay',         'innovate',      'input',         'inspect',       'inspire',       'install',       'institute',     'instruct',
            'insure',        'integrate',     'intend',        'intensify',     'interest',      'interfere',     'interlay',      'interpret',
            'interrupt',     'interview',     'introduce',     'invent',        'inventory',     'investigate',   'invite',        'irritate',
            'jail',          'jam',           'jog',           'join',          'joke',          'judge',         'juggle',        'jump',
            'keep',          'kept',          'kick',          'kill',          'kiss',          'kneel',         'knit',          'knock',
            'knot',          'know',          'label',         'land',          'last',          'laugh',         'get',           'itch',
            'launch',        'lay',           'lead',          'lean',          'leap',          'learn',         'leave',         'lecture',
            'led',           'lend',          'let',           'level',         'license',       'lick',          'lie',           'lifted',
            'light',         'lighten',       'like',          'list',          'listen',        'live',          'load',          'locate',
            'lock',          'log',           'long',          'look',          'lose',          'love',          'justify',
            'maintain',      'make',          'man',           'manage',        'manipulate',    'manufacture',   'map',           'march',
            'mark',          'market',        'marry',         'match',         'mate',          'matter',        'mean',          'measure',
            'meddle',        'mediate',       'meet',          'melt',          'memorize',      'mend',          'mentor',        'milk',
            'mine',          'mislead',       'miss',          'misspell',      'mistake',       'misunderstand', 'mix',           'moan',
            'model',         'modify',        'monitor',       'moor',          'motivate',      'mourn',         'move',          'mow',
            'muddle',        'mug',           'multiply',      'murder',        'nail',          'name',          'navigate',      'need',
            'negotiate',     'nest',          'nod',           'nominate',      'normalize',     'note',          'notice',        'number',
            'obey',          'object',        'observe',       'obtain',        'occur',         'offend',        'offer',         'officiate',
            'open',          'operate',       'order',         'organize',      'oriented',      'originate',     'overcome',      'overdo',
            'overdraw',      'overflow',      'overhear',      'overtake',      'overthrow',     'owe',           'own',
            'pack',          'paddle',        'paint',         'park',          'part',          'participate',   'pass',          'paste',
            'pat',           'pause',         'pay',           'peck',          'pedal',         'peel',          'peep',          'perceive',
            'perfect',       'perform',       'permit',        'persuade',      'phone',         'photograph',    'pick',          'pilot',
            'pinch',         'pine',          'pinpoint',      'pioneer',       'place',         'plan',          'plant',         'play',
            'plead',         'please',        'plug',          'point',         'poke',          'polish',        'pop',           'possess',
            'post',          'pour',          'practice',      'praised',       'pray',          'preach',        'precede',       'predict',
            'prefer',        'prepare',       'prescribe',     'present',       'preserve',      'preset',        'preside',       'press',
            'pretend',       'prevent',       'prick',         'print',         'process',       'procure',       'produce',       'profess',
            'program',       'progress',      'project',       'promise',       'promote',       'proofread',     'propose',       'protect',
            'prove',         'provide',       'publicize',     'pull',          'pump',          'punch',         'puncture',      'punish',
            'purchase',      'push',          'put',           'qualify',       'question',      'queue',         'quit',
            'race',          'radiate',       'rain',          'raise',         'rank',          'rate',          'reach',         'read',
            'realign',       'realize',       'reason',        'receive',       'recognize',     'recommend',     'reconcile',     'record',
            'recruit',       'reduce',        'refer',         'reflect',       'refuse',        'regret',        'regulate',      'rehabilitate',
            'reign',         'reinforce',     'reject',        'rejoice',       'relate',        'relax',         'release',       'rely',
            'remain',        'remember',      'remind',        'remove',        'render',        'reorganize',    'repair',        'repeat',
            'replace',       'reply',         'report',        'represent',     'reproduce',     'request',       'rescue',        'research',
            'resolve',       'respond',       'restored',      'restructure',   'retire',        'retrieve',      'return',        'review',
            'revise',        'rhyme',         'rid',           'ride',          'ring',          'rinse',         'rise',          'risk',
            'rob',           'rock',          'roll',          'rot',           'rub',           'ruin',          'rule',          'run','rush',
            'sack',          'sail',          'satisfy',       'save',          'saw',           'say',           'scare',         'scatter',
            'schedule',      'scold',         'scorch',        'scrape',        'scratch',       'scream',        'screw',         'scribble',
            'scrub',         'seal',          'search',        'secure',        'see',           'seek',          'select',        'sell',
            'send',          'sense',         'separate',      'serve',         'service',       'set',           'settle',        'sew',
            'shade',         'shake',         'shape',         'share',         'shave',         'shear',         'shed',          'shelter',
            'shine',         'shiver',        'shock',         'shoe',          'shoot',         'shop',          'show',          'shrink',
            'shrug',         'shut',          'sigh',          'sign',          'signal',        'simplify',      'sin',           'sing',
            'sink',          'sip',           'sit',           'sketch',        'ski',           'skip',          'slap',          'slay',
            'sleep',         'slide',         'sling',         'slink',         'slip',          'slit',          'slow',          'smash',
            'smell',         'smile',         'smite',         'smoke',         'snatch',        'sneak',         'sneeze',        'sniff',
            'snore',         'snow',          'soak',          'solve',         'soothe',        'soothsay',      'sort',          'sound',
            'sow',           'spare',         'spark',         'sparkle',       'speak',         'specify',       'speed',         'spell',
            'spend',         'spill',         'spin',          'spit',          'split',         'spoil',         'spot',          'spray',
            'spread',        'spring',        'sprout',        'squash',        'squeak',        'squeal',        'squeeze',       'stain',
            'stamp',         'stand',         'stare',         'start',         'stay',          'steal',         'steer',         'step',
            'stick',         'stimulate',     'sting',         'stink',         'stir',          'stitch',        'stop',          'store',
            'strap',         'streamline',    'strengthen',    'stretch',       'stride',        'strike',        'string',        'strip',
            'strive',        'stroke',        'structure',     'study',         'stuff',         'sublet',        'subtract',      'succeed',
            'suck',          'suffer',        'suggest',       'suit',          'summarize',     'supervise',     'supply',        'support',
            'suppose',       'surprise',      'surround',      'suspect',       'suspend',       'swear',         'sweat',         'sweep',
            'swell',         'swim',          'swing',         'switch',        'symbolize',     'synthesize',    'systemize',     'write',
            'tabulate',      'take',          'talk',          'tame',          'tap',           'target',        'taste',         'teach',
            'tear',          'tease',         'telephone',     'tell',          'tempt',         'terrify',       'test',          'thank',
            'thaw',          'think',         'thrive',        'throw',         'thrust',        'tick',          'tickle',        'tie',
            'time',          'tip',           'tire',          'touch',         'tour',          'tow',           'trace',         'trade',
            'train',         'transcribe',    'transfer',      'transform',     'translate',     'transport',     'trap',          'travel',
            'tread',         'treat',         'tremble',       'trick',         'trip',          'trot',          'trouble',       'troubleshoot',
            'trust',         'try',           'tug',           'tumble',        'turn',          'tutor',         'twist',         'type',
            'undergo',       'understand',    'undertake',     'undress',       'unfasten',      'unify',         'unite',         'unlock',
            'unpack',        'untidy',        'update',        'upgrade',       'uphold',        'upset',         'use',           'utilize',
            'vanish',        'verbalize',     'verify',        'vex',           'visit',         'wail',          'wait',          'wake',
            'walk',          'wander',        'want',          'warm',          'warn',          'wash',          'waste',         'watch',
            'water',         'wave',          'wear',          'weave',         'wed',           'weep',          'weigh',         'welcome',
            'wend',          'wet',           'whine',         'whip',          'whirl',         'whisper',       'whistle',       'win',
            'wind',          'wink',          'wipe',          'wish',          'withdraw',      'withhold',      'withstand',     'wobble',
            'wonder',        'work',          'worry',         'wrap',          'wreck',         'wrestle',       'wriggle',       'wring',
            'x-ray',         'yawn',          'yell',          'zip',           'zoom',          'jump',          'jumped',        'jumping',
        ];
        $misc = [

        ];
        $vowels = [ 'a', 'e', 'i', 'o', 'u', 'y' ];
        if( ! empty ( $alg ) ){ 
        return _diagram(_word($str),false);
        }
        else{
          if( ! empty( $str ) ){
            if( ! empty( $_SESSION['word'] ) ){
            foreach( $_SESSION['word'] as $wk => $wv ){
                    if( ! empty( $wk ) ){
                        if( $str == $wv ){
                            if( ! isset( $translated ) )
                                $translated = $wk;
                            $str = $wk;
                        }
                    }
                }
            }
          }
          if( ! is_NULL( $str ) ){
              $c=0;
              $tokens = [
                'article'                    => [],
                'subject'                    => [],
                'noun'                       => [],
                'noun_verb_adjective'        => [],
                'noun_verb_adjective_adverb' => [],
                'possessive_pronoun'         => [],
                'verb'                       => [],
                'verb_be'                    => [],
                'verb_have'                  => [],
                'object'                     => [],
                'possessive_adjective'       => [],
                'adjective'                  => [],
                'auxiliary'                  => [],
                'misc'                       => [],
                'stop'                       => []
              ];
              while( $str !== false ){
                  $c++;
                  if(     in_array( $str, $articl  ) ){ $key = 'article';                    }
                  elseif( in_array( $str, $subject ) ){ $key = 'subject';                    }
                  elseif( in_array( $str, $noun    ) ){ $key = 'noun';                       }
                  elseif( in_array( $str, $nva     ) ){ $key = 'noun_verb_adjective';        }
                  elseif( in_array( $str, $nvaa    ) ){ $key = 'noun_verb_adjective_adverb'; }
                  elseif( in_array( $str, $pospro  ) ){ $key = 'possessive_pronoun';         }
                  elseif( in_array( $str, $verb    ) ){ $key = 'verb';                       }
                  elseif( in_array( $str, $verbsb  ) ){ $key = 'verb_be';                    }
                  elseif( in_array( $str, $verbsh  ) ){ $key = 'verb_have';                  }
                  elseif( in_array( $str, $verbsd  ) ){ $key = 'verb_do';                    }
                  elseif( in_array( $str, $object  ) ){ $key = 'object';                     }
                  elseif( in_array( $str, $posadj  ) ){ $key = 'possessive_adjective';       }
                  elseif( in_array( $str, $adjs    ) ){ $key = 'adjective';                  }
                  elseif( in_array( $str, $auxils  ) ){ $key = 'auxiliary';                  }
                  elseif( in_array( $str, $overlap ) ){ $key = 'stop';                       }
                  else{                                 $key = 'misc';                       }
                  $cv = str_split( $str );
                  $thisisa = NULL;
                  foreach( $cv as $ck => $cv ){
                      $thisisa .= 'v';
                      if( ! in_array( $cv, $vowels ) ){
                          if( isset( $cv[$ck-1] ) ){
                              if( ! in_array( $cv[$ck-1], $vowels ) ){
                                  $thisisa .= 'c';
                              }
                          }
                          else{
                              $thisisa .= 'c';
                          }
                      }
                  }
                  $m = sizeof( explode( 'vc', $thisisa ) );
                  $strlst  = mb_substr( $str, -1 );
                  $strfrst = mb_substr( $str, 0, 1 );
                  $cvfirst = in_array( $strfrst, $vowels ) ? 'V' : 'C';
                  $cvsecnd = in_array( $strlst,  $vowels ) ? 'V' : 'C';
                  $tokens["{$key}"][] = [ 'word' => $str, 'pos' => $c, 'alg' => "[{$cvfirst}](VC){$m}[{$cvsecnd}]" ];
                  $str = strtok( ' ' );
              }
          }
          $tokens['original'] = $origin;
          if( isset( $translated ) )
              $tokens['translated'] = $translated;
          if( isset( $tokens ) )
            return $tokens;
        }
    }
}

weather:{
    /**
     *  Use a given season to produce a range of temperatures to fluctuate over
     *  a period of time to produce numbers that act as rain/snowfall simulation
     * 
     *  abstract: given a season type, a range of temperatures is referenced. first,
     *  we adjust temperatures as follows: room temperature 29, 0 to 6, and 37 to 50
     *  celsius. 
     *
     *  using chatgpt, we adjusted a reference set (Dalton's Law of Partial Pressures)
     *  to accommodate this degree shift and to account for only the temperature range
     *  we require (0-50, 0-5 as an edge case).
     *
     *  using this adjusted reference set, and a multiplier applied over time to chance,
     *  we can calculate the separate necessary variables to report an (accurate enough)
     *  precipitation report for that given season.
     *  -------------------------------------------------------------------------------------
     *  using a multiplier over time allows us to simulate radiation increasing/decreasing
     *  over the course of the day.
     *  -------------------------------------------------------------------------------------
     *  'hygrometer' is used to measure humidity by using a glazed mirror that cools down
     *  when air passes over it. dew point is the temperature at which must be cooled for
     *  water vapor in it to condense into dew or frost.
     *  -------------------------------------------------------------------------------------
     *    -- lowest           is 6  ( +6  degree difference ~ 0                )
     *    -- highest          is 50 ( +13 degree difference ~ 37 (37c == 100f) )
     *    -- room temperature is 29 ( +9  degree difference ~ 20               )
     *  -------------------------------------------------------------------------------------
     *  vapor pressure of water as a function of temp
     *    '9.12: Dalton's Law of Partial Pressures'
     *    - https://chem.libretexts.org/Bookshelves/General_Chemistry/ChemPRIME_(Moore_et_al.)/09%3A_Gases/9.12%3A_Dalton%27s_Law_of_Partial_Pressures
     *  -------------------------------------------------------------------------------------
     *  actual amount of moisture present in the air (higher doesn't always guarantee precipitation)
     *    'Converting Specific Humidity to Relative Humidity'
     *    - https://www.mathscinotes.com/2016/03/converting-specific-humidity-to-relative-humidity/
     */

    function _hygrometer( $values = [] ){
        $playertime = isset( $_SESSION['started'] ) ? $_SESSION['started'] : time();
        $season                    = $_SESSION['current_season'];
        if( ! isset( $values['season'] ) )
            $values['season'] = $season;
        $m                         = 0;
        $partialpressurewatervapor = 0;
        $totalpressure             = 0;
        $raining                   = 0;
        $sincelastrain             = 0;
        $t                         = 29;
        // check whether or not it is raining and has rained
        if( ! isset( $_SESSION['season']['incr'] ) ){ $_SESSION['season']['incr'] = 0; }
        if( isset( $_SESSION['rain_began'] ) ){
            $raining = time() - $_SESSION['rain_began'];
            if( $_SESSION['rain_ended'] > 0 ){
                if( $raining >= 120 ){
                    $_SESSION['rain_ended'] = time();
                    unset( $_SESSION['rain_began'] );
                }
            }
        }
        if( isset( $_SESSION['rain_ended'] ) ){
            if( $_SESSION['rain_ended'] > 0 )
                $sincelastrain = time() - $_SESSION['rain_ended'];
        }
        // seasons ----------------------------------------------------
            $seasons = [
                'winter' => [ 'low' => 6,  'high' => 20, 'm' => (int)$sincelastrain/100 ],
                'spring' => [ 'low' => 14, 'high' => 30, 'm' => (int)$sincelastrain/75  ],
                'summer' => [ 'low' => 22, 'high' => 50, 'm' => (int)$sincelastrain/25  ],
                'autumn' => [ 'low' => 30, 'high' => 40, 'm' => (int)$sincelastrain/50  ]
            ];
            if( isset( $values['season'] ) ){
                if( isset( $seasons["{$values['season']}"] ) ){
                    $season = $values['season'];
                    $sinfo  = $seasons["{$values['season']}"];
                    $low    = $seasons["{$values['season']}"]['low'];
                    $high   = $seasons["{$values['season']}"]['high'];
                    $m      = $seasons["{$values['season']}"]['m'];
                    // do they know it doesn't rain in the savanna?
                    if( $season != 'savanna' ){
                        $dif  = $high - $low;
                        if( ! isset( $_SESSION['season']['timer'] ) ){
                            $_SESSION['season']['timer'] = time();
                        }
                        $timesince = time() - $_SESSION['season']['timer'];
                        $timesince = intval(($timesince/50)*$dif);
                        if( $timesince > 100 ){
                            if( isset( $_SESSION['season']['incr'] ) ){
                                if( $_SESSION['season']['incr'] >= $dif ){
                                    $_SESSION['season']['incr'] = 0;
                                }
                                elseif( $t <= $high ){
                                    $_SESSION['season']['incr'] = $_SESSION['season']['incr'] + 1;
                                }
                            }
                            unset( $_SESSION['season']['timer'] );
                        }
                        // increase the chances of rain over time (as the "earth" warms)
                        $m = ( $m + $_SESSION['season']['incr'] );
                        if( gmdate('H', $playertime) >= 8 OR gmdate('H', $playertime ) <= 20 )
                            $m = ( $m + gmdate('H', $playertime ) );
                        else
                            $m = ( $m - gmadate('H', $playertime) ) < 0 ? 0 : $m - gmadate('H', $playertime);
                    }
                }
            }
            // freezing occurs at 6
            $f = $t <= 6 ? true : false;
        // clouds (and precipitation)-------------------------------------------------------
            // given temp rounded to nearest 5 (in celsius)(:https://stackoverflow.com/a/4133893)
            $tcheck = ( round( $t ) % 5 === 0 ) ? round( $t ) : round( ( $t + 5 / 2 ) / 5 ) * 5;
            // maximum amount of water vapor that air holds at a given temp
            $saturationpoint = 6.11 * 10 ** ( ( 7.5 * $t ) / ( 237.3 * $t ) );
            $airsaturation   = ( $t > 50 ) ? 50 : 50 - $t;
            // maximum amount of water vapor that can exist in the air at a given temp
            $saturationvaporpressure = 0.61094 * 2.718 ** ( (17.625 * $t) / ( $t + 243.04 ) );
            // vapor pressure of water as a function of temp
            $partialpressures = [
                0   => [ 'mmHg' => 4.6,   'kPa' => 0.61   ],
                5   => [ 'mmHg' => 9.2,   'kPa' => 1.23   ],
                10  => [ 'mmHg' => 17.5,  'kPa' => 2.33   ],
                15  => [ 'mmHg' => 31.8,  'kPa' => 4.24   ],
                20  => [ 'mmHg' => 54.6,  'kPa' => 7.28   ],  
                25  => [ 'mmHg' => 92.5,  'kPa' => 12.33  ],
                30  => [ 'mmHg' => 155.2, 'kPa' => 20.69  ],  
                35  => [ 'mmHg' => 233.7, 'kPa' => 31.16  ],
                40  => [ 'mmHg' => 355.1, 'kPa' => 47.34  ],
                45  => [ 'mmHg' => 525.8, 'kPa' => 70.10  ],
                50  => [ 'mmHg' => 760.0, 'kPa' => 101.32 ]
            ];
            // add vapor pressure 
            if( isset( $partialpressures[$tcheck] ) ){
                $totalpressure    = $totalpressure + (int)$partialpressures[$tcheck]['kPa'];
                $partialpressures = $partialpressures[$tcheck];
            }
            if( isset( $values['watersources'] ) ){
                $totalpressure = $totalpressure + $values['watersources'];
            }
            $totalpressure = $totalpressure * $t;
            // actual amount of moisture present in the air (higher doesn't always guarantee precipitation)
            #$specifichumidity = 0.622 * ( ( $partialpressurewatervapor ) / ( $totalpressure + $partialpressurewatervapor ) );
            $specifichumidity = 0.622 * ( $totalpressure / 50 );
            // relative humidity (higher indicates the potential for participation, but not guarantee)
            $relativehumidity = ( $specifichumidity / $saturationpoint ) * 50;
            // determines the point at which water vapor reaches saturation and condenses (leading to precipitation)
            $vaporpressure = ( $relativehumidity / 50 ) * $saturationvaporpressure;
            // temperature at which water vapor turns to liquid
            $dewpoint = $t - ( ( 50 - $relativehumidity ) / 5 );
            // when temp and dewpoint are equal, clouds and fog form
            $dewpointpercent = ( $dewpoint * 50 ) / 50;
            // when reached, clouds form- leads to rain
            $saturationpercent = ( $airsaturation * 50 ) / 50;
            // all of the above but quantified into:
            $rainchance = ( $saturationpercent * 50 ) / 50;
        // multipliers -----------------------------------------------
            // rainchance increases by a multiplier as time progresses
            if( $m > 0 )
                $rainchance = $rainchance + ( $rainchance / 25 ) * $m;
            if( intval($rainchance) >= 40 ){
                if( _random(['1' => $rainchance, '0' => 100-$rainchance]) == 1 ){
                    if( ! isset( $_SESSION['rain_began'] ) ){
                        $_SESSION['rain_began'] = time();
                        $_SESSION['rain_ended'] = 0;
                    }
                }
            }
            else {
                if( isset( $_SESSION['rain_began'] ) ){
                    if( time() - $_SESSION['rain_began'] >= 300 ){
                        unset( $_SESSION['rain_began'] );
                        unset( $_SESSION['season']['incr'] );
                        $_SESSION['rain_ended'] = time();
                    }
                }
            }
            $rainbegan = $rainended = 0;
            if( isset( $_SESSION['rain_began'] ) ){
                $rainbegan = $_SESSION['rain_began'];
                if($rainbegan > 0){
                    $relativehumidity = intval($relativehumidity) + (time() - $rainbegan) / 50;
                    $rainbegan        = gmdate( 'z H:i:s', time() - $rainbegan );
                    $rainchance       = 100;
                    if( $relativehumidity > 100 ){
                        $relativehumidity = 100;
                        if( _random(['1' => 1, '0' => 300]) == 1 ){
                            $_SESSION['rain_ended'] = time();
                            unset( $_SESSION['rain_began'] );
                        }
                    }
                }
            }
            if( isset( $_SESSION['rain_ended'] ) ){
                $rainended = $_SESSION['rain_ended'];
                if($rainended > 0)
                    $rainended = gmdate( 'z H:i:s', time() - $rainended );
            }
            $icon  = $f !== false ? '&&#10052;' : '&#9748;,&#9729;';
            $icon .= $relativehumidity >= 60 ? ',&#9729;' : '';
        // return array-----------------------------------------------
            return [
                'precipitation_report' => [
                    'temp'     => $t,
                    'season'    => [ 'name' => $season, 'info' => $sinfo ],
                    'freezing' => $f,
                    'precipitation' => [
                        'icon'       => $icon,
                        'currently'  => $raining > 0 ? 'yes' : 'no',
                        'for'        => $rainbegan,
                        'last'       => $rainended,
                        'chance'     => intval($rainchance),
                        'saturation' => [
                            'air_saturation'            => $airsaturation,
                            'saturation_percent'        => $saturationpercent,
                            'saturation_point'          => $saturationpoint,
                            'saturation_vapor_pressure' => $saturationvaporpressure,
                        ],
                        'pressure' => [
                            'partial_pressure_water_vapor' => $partialpressurewatervapor,
                            'partial_pressure_details'     => $partialpressures,
                            'total_pressure'               => $totalpressure,
                        ],
                        'humidity' => [
                            'relative_humidity' => $relativehumidity,
                            'specific_humidity' => $specifichumidity,
                        ],
                        'dewpoint' => [
                            'dewpoint'         => $dewpoint,
                            'dewpoint_percent' => $dewpointpercent,
                        ]
                    ]
                ]
            ];
    }
}

scene:{
    /**
     *  Use data like season & time to return a visual report of scene information
     *
     *  abstract: given a few starter data points (season, time), we can feed this
     *  information into functions specific to the informnation we'd like to return-
     *  for instance, using a hygrometer to measure the relative humidity and rain chance
     *  based on season and time of day (among other things.)
     *
     *  this information will be displayed in a way that makes coherent the data relevant
     *  to the current information being quantified.
     */
    function _scene( $opts = [] ){
        global $resourcetable, $disp, $uidisplay, $resourcesdisplay;
        /**
         *  visualization for _hygrometer data
         *   - current temperature (celsius)
         *   - current relative humidity level (%)
         *   - rain/snow(ed/ing) (currently/last)
         *   - rain chance (%)
         *     w/ accompanying (umbrella, snowflake, cloud icons)
         */
        $precip = _hygrometer($opts);
        $streak = isset( $_SESSION['streak'] ) ? $_SESSION['streak'] : 0;
        $values = $precip['precipitation_report'];
        _hygrometer_report:{
            $humidity = intval($values['precipitation']['humidity']['relative_humidity']);
            $humidity = "{$humidity}<sup>%</sup>";
            $season = $seasonb = $_SESSION['current_season'];
            $t = $values['temp'];
            $time = gmdate( 'H:i:s', $_SESSION['started'] );
            $color = 'roomtemp';
            $color =
                $t < 50 ? 
                    'hot':
                    $color;
            $color =
                $t < 40 ? 
                    'warm':
                    $color;
            $color =
                $t < 30 ?
                    'roomtemp':
                    $color;
            $color =
                $t < 20 ?
                    'cold':
                    $color;
            $t = "<span>{$t}<sup>&#8451;</sup> / {$humidity}</span>";
            $type =
                $t <= 6 ?
                    'snow':
                    'rain';
            $last = $values['precipitation']['last'];
            $last =
                $last > 0 ?
                    "<span>-{$last}</span>":
                    NULL;
            $current = $values['precipitation']['for'];
            $current =
                $current > 0 ?
                    "<span>+{$current}</span>":
                    NULL;
            $icon = NULL;
            foreach( 
                explode( ',', $values['precipitation']['icon'] )
                as $ico
            ){
                $icon .= "<i>{$ico}</i>";
            }
            $chance = 
                '<span>'.
                    "{$icon}{$values['precipitation']['chance']}%".
                '</span>';
            $hygrometer = '<div>'.
                "<span class='hygrometer {$color}'>" .
                "{$t}{$chance}" .
                '</span>' .
            '</div>';
        }
        skills:{
            $skills = NULL;
            if( isset( $_SESSION['skills'] ) ){
                foreach( $_SESSION['skills'] as $k => $v){
                    $skt = $k;
                    $k = $k == 'mining' ? '&#9935;' : $k;
                    $k = $k == 'fishing' ? '&#9673;' : $k;
                    $k = $k == 'swimming' ? '&bsim;' : $k;
                    $k = $k == 'scavenging' ? '&#128794;' : $k;
                    $skills .= "<span title='{$skt}'>{$k}<strong>{$v}</strong></span>";
                }
            }
            $skills = "<div class='skills'>{$skills}</div>";
        }
        attributes:{
            $attributes    = NULL;
            $attributesarr = NULL;
            $attributes .= '<div class="attributes">';
            $attributes .= "<span class='attribute' title='Level'><i>LVL</i><strong>{$_SESSION['lvl']}</strong></span>";
            $attributes .= "<span class='attribute' title='Experience'><i>EXP</i><strong>{$_SESSION['exp']}</strong></span>";
            if( isset( $_SESSION['attributes'] ) ){
                foreach( $_SESSION['attributes'] as $k => $v ){
                    $leveling = NULL;
                    if( isset( $_SESSION['leveling']["{$k}"] ) ){
                        $currentleveling = $_SESSION['leveling']["{$k}"];
                        $leveling = "<span class='leveling'><span style='width:{$currentleveling}%;'></span></span>";
                    }
                    $attributesarr .= "<span class='attribute' title='{$k}'><i>{$k}</i><strong>{$v}</strong>{$leveling}</span>";
                }
            }
            $attributes .= "{$attributesarr}</div>";
        }
        toolbelt:{
            
            $toolbelt = NULL;
            $tools = [
                'destroy'   => 'destroy',
                'minicoord' => 'mine',
                'swap'      => 'swap',
                'tunnel'    => 'reinforce',
                'ladder'    => 'ladder',
            ];
            $toolbelt .= '<div class="toolbelt">';
            foreach( $tools as $k => $v ){
                if( isset($_GET["{$k}"] ) )
                    $k = 'x';
                if( $k == 'x' )
                    $v = "<strike>{$v}</strike>";
                $toolbelt .= "<a href='./?{$k}'>{$v}</a>";
            }
            $toolbelt .= '</div>';
            
        }
        resources:{
            $resourcesout = NULL;
            if( isset( $_SESSION['resources'] ) AND $_SESSION['worldpower'] !== false ){
                if( $_SESSION['show_resources'] !== false ){
                    $resourcesout .=  '<div class="resources">';
                    # https://math.stackexchange.com/a/2040617
                    # 1. In the book Meaning, Logic and Ludics-By Alain Lecomte, 
                    # The writer says that: Let U and B be two positive designs 
                    # we denote tensor product of U and B by U⊙B
                    # 2. In the book Dag Prawitz on Proofs and Meaning: The writer says 
                    # that α⊙β means that either β is derivable from α or is α derivable from β
                    $resourcesout .=  '<div>';
                    $held = 0;
                    $totl = 0;
                    if( isset( $_SESSION['resources'] ) ){
                        $resourcesout .=  '<div>';
                        $resources = array_reverse( $_SESSION['resources'] );
                        foreach( $resources as $k => $v ){
                            $resourceidc = $k;
                            $extra = NULL;
                            $dk = $k;
                            $selected = NULL;
                            if( isset( $resourcetable ) ){
                                if( isset( $resourcetable["{$k}"] ) ){
                                    if( $v > 0 ){
                                        $held = $held + 1;
                                        $totl = $totl + $v;
                                        if( isset( $_SESSION['currentresource'] ) ){
                                            if( $_SESSION['currentresource'] == $k ){
                                                $selected = '<sup>x</sup>';
                                            }
                                        }
                                    }
                                    if( isset( $resourcetable["{$k}"]["{$disp}"] ) )
                                        $dk = $resourcetable["{$k}"]["{$disp}"];
                                    $resourcesout .=  "<span><a href='./?/resource/{$resourceidc}'>{$selected} {$dk}  {$v}</a></span>";
                                }
                            }
                        }
                        $resourcesout .=  '</div>';
                    }
                    $resourcesout .=  '</div>';
                    $resourcesout .=  '<div><span class="resdisc">';
                    if( $_SESSION['acquire']['score'] !== false ){
                        $resourcesout .=  '<span>AREA ' . $_SESSION['area'] . '</span>';
                        scorekeeper:{
                            $score = NULL;
                            $score_area  = isset( $_SESSION['score_area'] )  ? $_SESSION['score_area']  : 0;
                            $score_total = isset( $_SESSION['score_total'] ) ? $_SESSION['score_total'] : 0;
                            $score_avail = isset( $opts['score'] )           ? $opts['score']           : 0;
                        }
                        if( $score_avail < 0 ){
                            $score_avail = 0;
                        }
                        $resourcesout .= '<span>' . $score_total . '<small>('.$score_area.'/'.$score_avail.')</small></span>';
                    }
                    if( $_SESSION['acquire']['resources'] !== false ){
                        $resourcesout .= '<span>' . $totl . '<small>('.$held.'/'  . sizeof($resourcetable).')</small></span>';
                    }
                    $resourcesout .= '</span></div>';
                    $resourcesout .=  '</div>';
                }
            }
        }
        /**
         *  visualization for all scene data
         *   - current season
         *   - current time
         *   - _hygrometer_report
         */
        scene:{
            $scene = NULL;
            if( $_SESSION['show_ui'] !== true ){
                $attributes = $hygrometer = $skills = NULL;
                $seasonb .= ' noui';
            }
            if( $_SESSION['show_resources'] !== true ){
                $seasonb .= ' nores';
            } else {
                if( $_SESSION['acquire']['resources'] !== true ){
                    $seasonb .= ' nores';
                }
                else{
                    $seasonb .= ' res'; 
                }
            }
            if( $_SESSION['acquire']['resources'] !== true AND $_SESSION['acquire']['score'] !== true ){
                $seasonb .= ' noscore';
            }
            $scene = 
            "<div class='scene {$seasonb}'>" .
                "<time>{$time}<small>{$current}{$last}</small></time>" .
                "<span class='season'>{$season}</span>" .
                $hygrometer.
                $resourcesout.
                $skills.
                $attributes.
                $toolbelt.
            '</div>';
        }
        return $scene;
    }
}

templating:{
    $furnituredetails = [];
    $templateb = $template = $body = $header = $examining = $mapoutput = NULL;

    if( isset( $_SESSION['playerposition'] ) ){
        $coords = explode( '/', $_SESSION['playerposition'] );
        $west2  = $coords[0]-2;
        $east2  = $coords[0]+2;
        $north2 = $coords[1]-2;
        $south2 = $coords[1]+2;
        $west2  = "{$west2}/{$coords[1]}";
        $east2  = "{$east2}/{$coords[1]}";
        $north2 = "{$coords[0]}/{$north2}";
        $south2 = "{$coords[0]}/{$south2}";
    }

    $totalwatersources = 0;
    $totalharvest  = 0;
    $totalscavenge  = 0;
    $totalfish     = 0;
    $rainingcss = 'no_rain';
    if( isset( $_SESSION['rain_began'] ) )
        $rainingcss = 'rain';
    if( isset( $_SESSION['examining'] ) ){
        if( $_SESSION['examining'] == 'computera' )
            $rainingcss .= ' terminal';
    }
    if( $_SESSION['map_display'] !== true ){
        $rainingcss = 'nomap';
    }
    $movementkeys = '<a href="./?moveleft">&#8656;</a><a href="./?moveup">&#8657;</a><a href="./?moveright">&#8658;</a><a href="./?movedown">&#8659;</a>';
    $exit = '<a href="./?">o u o</a>';
    if( isset( $_SESSION['currentcoord'] ) )
        $exit = '<a href="./?x">x _ x</a>';






    $header .= 
        '<!DOCTYPE HTML>'.
            '<head>'.
                "<title>{$title}</title>".
                '<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />'.
                '<link rel="stylesheet" href="./style.css" />'.
            '</head>';

    $body .= '<body>';

    $template .= "<main class='{$rainingcss}'>";
    $template .= isset( $_GET['r'] ) ? '<div class="reset"><a href="./?r&rr">yes</a><a href="./">no</a></div>' : '';





    if( $_SESSION['map_display'] !== false ){

        $mapoutput .= "<section id='map'><div id='mapcontainer'>";





        if( isset( $_SESSION['coords'] ) ){
            $playertime = isset( $player['time'] ) ? $player['time'] : time();
            $score = 0;
            $tilec = 0;
            if( $_SESSION['dead'] !== false ){
                $_SESSION['worldpower'] = false;
            }
            if( $_SESSION['combat']['currently'] !== true ){
                foreach( $coordarray as $k => $v ){
                    $canharv         = false;
                    $classadditional = NULL;
                    $coords          = explode( '/', $k );
                    $extra           = NULL;
                    $id              = isset( $coords[0] ) AND isset( $coords[1] ) ? 
                                       $coords[0] . $coords[1] : NULL;
                    $powered         = true;
                    $tdisp           = isset( $v['disp'] ) ?
                                       $v['disp'] : NULL;
                    $url             = NULL;
                    $view            = true;
                    $x               = isset( $coords[0] ) ? (int)$coords[0] : 1;
                    $y               = isset( $coords[1] ) ? (int)$coords[1] : 1;
                    $z               = isset( $coords[1] ) ? (int)$coords[1] : 1;
                    $mapoutput .= $x == 1 ? '<div>' : '';                        
                    /** Water sources for _hygrometer ~~~~~~~~~~~~~
                     */
                    if( $tdisp == 'water'   ){ $totalwatersources = (int)$totalwatersources + (int).001; }
                    if( $tdisp == 'deep'    ){ $totalwatersources = (int)$totalwatersources + (int).002; }
                    if( $tdisp == 'channel' ){ $totalwatersources = (int)$totalwatersources + (int).002; }
                    if( $tdisp == 'torrnt'  ){ $totalwatersources = (int)$totalwatersources + (int).003; }
                    if( $tdisp == 'deep3'   ){ $totalwatersources = (int)$totalwatersources + (int).004; }
                    /** ~~~~~~~~~~~~~ */
                    if( $_SESSION['worldpower'] !== true ){
                        $tdisp = isset( $v['offdisp'] ) ? $v['offdisp'] : $tdisp;
                    }
                    $title = $tdisp;
                    /** *-able status ~~~~~~~~~~~~~
                     */
                    if( isset( $player ) ){                                     # Near to the player
                        if( in_array( $k, $player['nearby'] ) ){
                            $url = "./?/coord/{$k}";
                        }
                    }
                    if( isset( $_GET['destroy'] ) ){                            # Destroy
                        $classadditional .= ' destructable';
                        $url = "./?/destroy/{$k}";
                    }
                    if( isset( $_GET['swap'] ) OR isset( $_SESSION['swap'] ) ){ # Swap
                        $classadditional .= ' swappablea';
                        $url = "./?/swap/{$k}";
                        if( isset( $_SESSION['swap'] ) ){
                            $classadditional .= ' swappableb';
                            $url = "./?/swap/{$_SESSION['swap']}/{$k}";
                        }                            
                    }
                    if( isset( $_GET['tunnel'] ) ){                             # Reinforce
                        $classadditional .= ' reinforceable';
                        $url = "./?/tunnel/{$k}";
                    }
                    if( isset( $_GET['ladder'] ) ){                             # Ladder
                        $classadditional .= ' ladderable';
                        $url = "./?/ladder/{$k}";
                    }
                    if( isset( $_GET['minicoord'] ) ){                          # Mine
                        $url = "./?/minicoord/{$k}";
                    }
                    if( isset( $_GET['jump'] ) ){                               # Jump
                        $classadditional .= ' reachable';
                        (int)$xdif = (int)$x > (int)$player['x'] ? (int)$x - (int)$player['x'] : (int)$player['x'] - (int)$x;
                        (int)$ydif = (int)$y > (int)$player['y'] ? (int)$y - (int)$player['y'] : (int)$player['y'] - (int)$y;
                        $distance = ( $xdif + $ydif ) * 10;
                        if( $_SESSION['acquire']['action'] !== false ){
                            if( ( $_SESSION['action'] - $distance ) > 0 ){
                                $url = "./?/jump/{$k}";
                            }
                        }
                        else{
                            $url = "./?/jump/{$k}";
                        }
                    }
                    if( isset( $resourcetable["{$tdisp}"]['type'] ) ){          # type 'floor', 'open'
                        if( $resourcetable["{$tdisp}"]['type'] == 'floor' ){
                            $classadditional .= ' traversable';
                        }
                        if( $resourcetable["{$tdisp}"]['type'] == 'open' ){
                            $classadditional .= ' open';
                        }
                    }
                    if( isset( $resourcetable ) ){                              # Can be actively mined by player
                        if( isset( $resourcetable["{$tdisp}"] ) ){
                            if( isset( $resourcetable["{$tdisp}"]['disp'] ) )
                                $title = $resourcetable["{$tdisp}"]['disp'];
                            if( isset( $resourcetable["{$tdisp}"]['mine'] ) ){
                                if( $_SESSION['skills']['mining'] >= $resourcetable["{$tdisp}"]['mine'] ){
                                    if( ! isset( $_SESSION['currentresource'] ) ){
                                        $totalharvest = $totalharvest + 1;
                                        $canharv = true;
                                        $classadditional .= ' harvestable';
                                    }
                                }
                            }
                        }
                    }
                    if( $tdisp == 'channel' ){                                  # Fishing
                        $totalfish = $totalfish + 1;
                        if( $v['fish'] > 0 ){
                            $classadditional .= ' harvestable';
                        }
                    }
                    if( $tdisp == 'shallow' ){                                  # Scavenge
                        $totalscavenge = $totalscavenge + 1;
                        if( $v['fish'] > 0 ){
                            $classadditional .= ' harvestable';
                        }
                    }
                    /** ~~~~~~~~~~~~~ */
                    if( 
                        $tdisp == 'marble'   OR 
                        $tdisp == 'basement' OR 
                        $tdisp == 'bed'      OR 
                        $tdisp == 'warp' 
                    ){
                        $extra .= '<span></span><span></span><span></span><span></span>';
                    }
                    if( $k != $_SESSION['playerposition'] ){
                        if( $tdisp != 'nothingbarrier' ){
                            if( isset( $resourcetable["{$tdisp}"]['type'] ) ){
                                if( 
                                    $resourcetable["{$tdisp}"]['type'] == 'water' OR
                                    $resourcetable["{$tdisp}"]['type'] == 'air'   OR
                                    $resourcetable["{$tdisp}"]['type'] == 'ladder'
                                ){ }
                                else{
                                    if( isset( $v['decay'] ) ){
                                        if( $v['decay'] > 0 ){
                                            $score  = $score - (int)".{$v['decay']}";
                                            $extra .= '<span class="popup mob"><strong>';
                                            $extra .= $v['decay'] . '</strong></span>';
                                        }
                                    }
                                }
                            }
                        }
                    }
                    if( $view !== false ){
                        if( isset( $_SESSION['currentresource'] ) ){
                            if( isset( $resourcetable["{$_SESSION['currentresource']}"] ) ){
                                foreach( $resourcetable["{$_SESSION['currentresource']}"]['case'] as $resk => $resv ){
                                    if( $resk == $tdisp ){
                                        $classadditional .= ' combination';
                                        $title .= ' => ' . $resv;
                                    }
                                }
                            }
                        }
                        $titleout = NULL;
                        $titleout = isset( $resourcetable["{$tdisp}"]['disp'] ) ? $resourcetable["{$tdisp}"]['disp'] : '???';
                        if( $titleout == '???' ){
                            if( isset( $_SESSION['coords']["{$x}/{$y}"]["{$tdisp}"] ) ){
                                $cres = $_SESSION['coords']["{$x}/{$y}"]["{$tdisp}"];
                                if( isset( $resourcetable["{$cres}"]['disp'] ) ){
                                    $titleout = $resourcetable["{$cres}"]['disp'];
                                }
                            }
                        }
                        $titleout = " title='{$titleout}'";
                        $shadow  = NULL;
                        $timeofday = 'afternoon';
                        $timeofday = intval(gmdate( 'H', time() - $_SESSION['started'] )) >= 20 ? 'night'   : $timeofday;
                        $timeofday = intval(gmdate( 'H', time() - $_SESSION['started'] )) <  12 ? 'morning' : $timeofday;
                        $timeofday = intval(gmdate( 'H', time() - $_SESSION['started'] )) >  5  ? 'morning' : $timeofday;
                        $timeofday = intval(gmdate( 'H', time() - $_SESSION['started'] )) <= 5  ? 'night'   : $timeofday;
                        if( gmdate( 'H', time() - $_SESSION['started'] ) <= 5 OR gmdate( 'H', time() - $_SESSION['started'] ) >= 20 ){
                            $timeofday = 'night';
                        }
                        else{
                            if( gmdate( 'H', time() - $_SESSION['started'] ) > 5 AND gmdate( 'H', time() - $_SESSION['started'] ) < 12 ){
                                $timeofday = 'morning';
                            }
                            else{
                                $timeofday = 'afternoon';
                            }
                        }
                        $tileclass = NULL;
                        $currenttile = NULL;
                        if( isset( $_SESSION['playerposition'] ) ){
                            if( $_SESSION['playerposition'] == $k ){
                                $currenttile = $k;
                                $tileclass .= ' current_tile';
                                
                            }
                        }
                        $powerclass = isset( $_SESSION['coords']["{$x}/{$y}"]['powered'] ) ? $_SESSION['coords']["{$x}/{$y}"]['powered'] : false;
                        $powerclass = "power_{$powerclass}";
                        if( $tdisp == 'nothing' ){
                            $tiletile = " id='{$x}/{$y}' class='box nothing'";
                        }
                        elseif( $tdisp == 'nothingbarrier' ){
                            $tiletile = " id='{$x}/{$y}' class='box nothingbarrier'";
                        }
                        else{
                            $tiletile = " style='{$shadow}z-index:{$z};' id='{$x}/{$y}' class='box {$powerclass}'{$titleout}";
                        }
                        $dispthis = false;
                        if( in_array( $x, [ $player['x']-3,$player['x']-2,$player['x']-1,$player['x'],$player['x']+1,$player['x']+2,$player['x']+3 ] ) ){
                            $dispthis = true;
                        }
                        if( in_array( $y, [ $player['y']-3,$player['y']-2,$player['y']-1,$player['y'],$player['y']+1,$player['y']+2,$player['y']+3 ] ) ){
                            if( $dispthis !== false ){
                                $dispthis = true;
                            }
                        }
                        else{
                            $dispthis = false;
                        }
                        if( $dispthis !== false )
                            $mapoutput .= "<span{$tiletile}>";
                        if( ! is_NULL( $currenttile ) ){
                            if( $dispthis !== false ){
                                $mapoutput .= '<a class="move w" href="./?playerleft"><span>&larr;</span></a>';
                                $mapoutput .= '<a class="move e"  href="./?playerright"><span>&rarr;</span></a>';
                                $mapoutput .= '<a class="move n" href="./?playerup"><span>&uarr;</span></a>';
                                $mapoutput .= '<a class="move s" href="./?playerdown"><span>&darr;</span></a>';
                            }
                        }
                        $tdispclass = $tdisp;
                        #if( $_SESSION['acquire']['resources'] !== true ){
                        #    $classadditional = NULL;
                        #    $tdispclass      = isset( $resourcetable["{$tdisp}"]['type'] ) ? $resourcetable["{$tdisp}"]['type'] : NULL;
                        #}
                        if( isset( $furniture["{$k}"]["{$_SESSION['area']}"] ) ){
                            if( $dispthis !== false )
                                $mapoutput .= "<span class='box {$tdispclass}{$classadditional}'>";
                            foreach( $furniture["{$k}"]["{$_SESSION['area']}"] as $f ){
                                if( isset( $player ) ){
                                    $href = ' href="#"';
                                    if( isset( $f[5] ) )
                                        $href = " href='./?examine={$f[5]}'";
                                    if( ! in_array( $k, $player['nearby'] ) ){
                                        $href = ' href="#"';
                                    }
                                    if( isset( $examine["{$f[3]}"] ) ){ 
                                        $thisfurnituredetails = $examine["{$f[3]}"];
                                        if( isset( $thisfurnituredetails['powering'] ) ){
                                            if( isset( $_GET['unplug'] ) OR isset( $_GET['plugin'] ) ){
                                                if( $_SESSION['coords']["{$x}/{$y}"]['powered'] !== false ){
                                                    if( isset( $_GET['unplug'] ) ){
                                                        $_SESSION['coords']["{$x}/{$y}"]['powered'] = false;
                                                        $_SESSION['temp'] = true;
                                                    }
                                                }
                                                else {
                                                    if( isset( $_GET['plugin'] ) ){
                                                        $_SESSION['coords']["{$x}/{$y}"]['powered'] = true;
                                                        $_SESSION['temp'] = true;                                                
                                                    }
                                                }
                                                _reload('./?x');
                                            }
                                            $powering = $thisfurnituredetails['powering'];
                                            if( isset( $furniture["{$powering[0]}"]["{$_SESSION['area']}"]["{$powering[1]}"] ) ){
                                                if( isset( $_SESSION['coords']["{$powering[0]}"]['powered'] ) ){
                                                    if( $_SESSION['coords']["{$powering[0]}"]['powered'] !== false ){
                                                        if( $f[0] > 0 ){
                                                            if( $dispthis !== false )
                                                                $mapoutput .= "<span class='powering furniture {$powering[1]}'>&#9735;</span>";
                                                        }
                                                        $powered = true;
                                                    }
                                                    else{
                                                        if( $f[0] > 0 ){
                                                            if( $dispthis !== false )
                                                                $mapoutput .= "<span class='powering furniture {$powering[1]} off'>&#9735;</span>";
                                                        }
                                                        $powered = false;
                                                    }
                                                }
                                            }
                                        }
                                        if( isset( $thisfurnituredetails['poweredby'] ) ){
                                            $poweredby = $thisfurnituredetails['poweredby'];
                                            if( isset( $poweredby ) ){
                                                if( isset( $furniture["{$poweredby[0]}"]["{$_SESSION['area']}"]["{$poweredby[1]}"] ) ){
                                                    if( isset( $_SESSION['coords']["{$poweredby[0]}"]['powered'] ) ){
                                                        if( isset( $poweredby ) ){
                                                            if( $f[0] > 0 ){
                                                                if( $dispthis !== false )
                                                                    $mapoutput .= "<span class='powering furniture {$poweredby[1]} off'>&#9735;</span>";
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                                player_housing_termina:{
                                    if( $f[3] == 'computera' ){
                                            if( isset( $_SESSION['turnbackon'] ) ){
                                                $_SESSION['worldpower'] = true;
                                                unset( $_SESSION['turnbackon'] );
                                                _reload('./?x');
                                            }
                                            else{
                                                    $_SESSION['worldpower'] = isset( $_SESSION['coords']["{$x}/{$y}"]['powered'] ) ? $_SESSION['coords']["{$x}/{$y}"]['powered'] : false;

                                                if( isset( $_SESSION['temp'] ) ){
                                                    unset( $_SESSION['start']);
                                                    unset( $_SESSION['examining'] );
                                                    unset( $_SESSION['temp'] );
                                                    _reload('./');
                                                }
                                            }
                                            $xx = $x+1;
                                            $yy = $y+3;
                                            if( isset( $_SESSION['coords']["{$xx}/{$yy}"]["{$disp}"] ) ){
                                                if( $_SESSION['coords']["{$xx}/{$yy}"]["{$disp}"] == 'door' ){
                                                    $_SESSION['coords']["{$xx}/{$yy}"]["{$disp}"] = 'doorlocked';
                                                }
                                                if( $_SESSION['coords']["{$xx}/{$yy}"]["{$disp}"] == 'doorlocked' ){
                                                    if( ! isset( $_SESSION['doorlocked']["{$xx}/{$yy}"] ) ){
                                                        $_SESSION['doorlocked']["{$xx}/{$yy}"] = [
                                                            0 => mt_rand(0,5),
                                                            1 => mt_rand(7,9),
                                                            2 => mt_rand(0,5),
                                                            3 => mt_rand(7,9)
                                                        ];
                                                    }
                                                    $codecorrect = false;
                                                    if( isset( $_SESSION['unlocked']["{$f[3]}"] ) ){
                                                        $ec = $_SESSION['unlocked']["{$f[3]}"];
                                                        $dc = $_SESSION['doorlocked']["{$xx}/{$yy}"];
                                                        if( "{$ec[0]}{$ec[1]}{$ec[2]}{$ec[3]}" == "{$dc[0]}{$dc[1]}{$dc[2]}{$dc[3]}" ){
                                                            $codecorrect = true;
                                                        }
                                                    }
                                                    $furnituredetails["{$f[3]}"]['code'] = $_SESSION['doorlocked']["{$xx}/{$yy}"];
                                                    if( $codecorrect !== false ){
                                                        $_SESSION['coords']["{$xx}/{$yy}"]["{$tdisp}"] = 'doorunlocked';
                                                    }
                                                }
                                            }
                                        
                                    }
                                }
                                $furnituredetails["{$f[3]}"]['powered'] = isset( $_SESSION['coords']["{$x}/{$y}"]['powered'] ) ? $_SESSION['coords']["{$x}/{$y}"]['powered'] : false;
                                if( $f[0] > 0 ){
                                    if( $dispthis !== false )
                                        $mapoutput .= "<a style='z-index:{$f[0]};left:{$f[1]}px;top:{$f[2]}px;' class='furniture {$powerclass} {$f[3]}' {$href} title='{$f[4]}'></a>";
                                }
                            }
                            if( $dispthis !== false )
                                $mapoutput .= '</span>';
                        }
                        else{
                            if( empty( $tdisp ) OR is_NULL( $tdisp ) ){
                                $tdisp = 'nothingbarrier';
                            }                        
                            if( ! is_NULL( $url ) ){
                                if( $dispthis !== false )
                                    $mapoutput .= "<a class='box {$tdispclass}{$classadditional}'href='{$url}'{$titleout}>";
                            }
                            else {
                                if( $dispthis !== false )
                                    $mapoutput .= "<span class='box {$tdispclass} {$timeofday}'{$titleout}>";
                            }
                        }
                        if( $dispthis !== false )
                            $mapoutput .= $extra;
                        if( isset( $_SESSION['power']["{$k}"] ) ){
                            $pl = $_SESSION['power']["{$k}"];
                            if( $dispthis !== false )
                                $mapoutput .= "<sub>{$pl}</sub>";
                        }





                        if( $tdisp == 'channel' OR $tdisp == 'shallow' ){    # Display fish status
                            if( $v['fish'] > 0 ){
                                $fishable = $v['fish'];
                                if( $dispthis !== false )
                                    $mapoutput .= "<sup>&#9673; {$fishable}</sup>";
                                $fishable = NULL;
                            }
                        }
                        if( isset( $_SESSION['coords']["{$k}"]['break'] ) ){ # Display mining status
                            if( is_int( $_SESSION['coords']["{$k}"]['break'] ) ){
                                if( $_SESSION['coords']["{$k}"]['break'] > 0 ){
                                    $keybreak = $_SESSION['coords']["{$k}"]['break'];
                                    if( $dispthis !== false )
                                        $mapoutput .= "<sup>{$keybreak}</sup>";
                                } else {
                                    if( isset( $resourcetable["{$tdisp}"]['mine'] ) ){
                                        if( $resourcetable["{$tdisp}"]['mine'] <= $_SESSION['skills']['mining'] ){
                                            if( $dispthis !== false )
                                                $mapoutput .= '<sup>x</sup>';
                                        }
                                    }
                                }
                            }
                        }
                        if( isset( $resourcetable["{$tdisp}"]['swim'] ) ){   # Display swimming requirements
                            if( $dispthis !== false ){
                                $mapoutput .= 
                                    '<sub>&bsim;'.
                                    $resourcetable["{$tdisp}"]['swim'].
                                    '</sub>';
                            }
                        }





                        if( ! is_NULL( $url ) ){        
                            if( $dispthis !== false )
                                $mapoutput .= '</a>';
                        }
                        else {
                            if( $dispthis !== false )
                                $mapoutput .= '</span>';
                        }
                        if( $dispthis !== false ){
                            $mapoutput .= '</span>';
                        }
                        $mapoutput .= $x == $xmax ? '</div>' : '';
                    }





                    $tilec++;
                    if( isset( $resourcetable["{$v['disp']}"]['mine'] ) ){
                        if( $_SESSION['acquire']['resources'] !== false ){
                            if( $_SESSION['acquire']['score'] !== false ){
                                $score = $score + ( $resourcetable["{$v['disp']}"]['mine'] / 100 );
                            }
                        }
                    }
                    if( $v['disp'] == 'nothingbarrier' ){
                        $score = $score - 1;
                    }
                    if( $v['disp'] == 'tunnel' ){
                        $score = $score - 1;
                    }
                    
                }
            }




            if( $_SESSION['combat']['currently'] !== false ){
                $tdisp = $tndisp = $tsdisp = $tedisp =  $twdisp = NULL;
                if( isset( $_SESSION['coords']["{$_SESSION['playerposition']}"]['disp'] ) ){
                    $tdisp = $_SESSION['coords']["{$_SESSION['playerposition']}"]['disp'];
                    
                    if( isset( $ppcoordnorth ) ){
                        if( isset( $_SESSION['coords']["{$ppcoordnorth}"]['disp'] ) ){
                            $tndisp = $_SESSION['coords']["{$ppcoordnorth}"]['disp'];
                        }
                    }
                    if( isset( $ppcoordeast ) ){
                        if( isset( $_SESSION['coords']["{$ppcoordeast}"]['disp'] ) ){
                            $tedisp = $_SESSION['coords']["{$ppcoordeast}"]['disp'];
                        }
                    }
                    if( isset( $ppcoordsouth ) ){
                        if( isset( $_SESSION['coords']["{$ppcoordsouth}"]['disp'] ) ){
                            $tsdisp = $_SESSION['coords']["{$ppcoordsouth}"]['disp'];
                        }
                    }
                    if( isset( $ppcoordwest ) ){
                        if( isset( $_SESSION['coords']["{$ppcoordwest}"]['disp'] ) ){
                            $twdisp = $_SESSION['coords']["{$ppcoordwest}"]['disp'];
                        }
                    }
                    
                    $mapoutput .= "<div class='battle'>";
                    if( ! is_NULL( $tndisp ) ){
                        $mapoutput .= "<div class='box {$tndisp} north'>";
                        $mapoutput .= '</div>';
                    }
                    if( ! is_NULL( $tsdisp ) ){
                        $mapoutput .= "<div class='box {$tsdisp} south'>";
                        
                        $mapoutput .= '</div>';
                    }
                    if( ! is_NULL( $tedisp ) ){
                        $mapoutput .= "<div class='box {$tedisp} east'>";
                        
                        $mapoutput .= '</div>';
                    }
                    if( ! is_NULL( $twdisp ) ){
                        $mapoutput .= "<div class='box {$twdisp} west'>";
                        
                        $mapoutput .= '</div>';
                    }

                    if( ! is_NULL( $tdisp ) ){
                        $mapoutput .= "<div class='box {$tdisp} center'>";
                        $mapoutput .= '<div class="fist left">&#129308;</div>';
                        $mapoutput .= '<div class="fist right">&#129307;</div>';
                        $mapoutput .= '</div>';
                    }                        
                    
                    $mapoutput .= '</div>';
                }
            }

            $health_available = ( $_SESSION['attributes']['constitution'] * 8 ) + ( $_SESSION['attributes']['stamina'] * 4 );
            $action_available = ( $_SESSION['attributes']['stamina'] * 8 ) + ( $_SESSION['attributes']['constitution'] * 4 );

            if( $_SESSION['died'] > 0 ){
                $percent = ( $_SESSION['died'] / $health_available ) * 100;
                $health_available = round( $health_available - $percent );
            }

            if( ! isset( $_SESSION['health'] ) ){
                $_SESSION['health'] = $health_available;
            }
            if( ! isset( $_SESSION['action'] ) ){
                $_SESSION['action'] = $action_available;
            }

            $health_total = 0;
            $restful      = 0;
            $action_total = ( $_SESSION['action'] / $action_available ) * 100;
            if( $health_available > 0 ){
                $health_total = ( $_SESSION['health'] / $health_available ) * 100;
            }


            if( $_SESSION['health'] <= 0 ){
                if( $_SESSION['dead'] !== true ){
                    if( $_SESSION['area'] > 5 ){
                        $_SESSION['died'] = $_SESSION['died'] + 1;
                    }
                }
                $_SESSION['dead'] = true;
            }
            if( $_SESSION['health'] > 0 ){
                if( $_SESSION['dead'] !== false ){
                    $_SESSION['dead'] = false;
                }
                if( $_SESSION['worldpower'] !== true ){
                    $_SESSION['worldpower'] = true;
                }
            }

            if( $_SESSION['action'] < $action_available ){
                $stamina = round( $_SESSION['attributes']['stamina'] / 100 );
                if( isset( $v['disp'] ) ){
                    if( $v['disp'] == 'tunnel' ){
                        $restful = 1;
                        if( isset( $playersouth ) ){
                            if( $playersouth == 'tunnel' ){
                                $restful = $restful + 1;
                            }
                        }
                        if( isset( $playernorth ) ){
                            if( $playernorth == 'tunnel' ){
                                $restful = $restful + 1;
                            }
                        }
                        if( isset( $playereast ) ){
                            if( $playereast == 'tunnel' ){
                                $restful = $restful + 1;
                            }
                        }
                        if( isset( $playerwest ) ){
                            if( $playerwest == 'tunnel' ){
                                $restful = $restful + 1;
                            }
                        }
                    }
                    $additional_action_regen = $stamina + $restful;
                    # Trinkets, relics, etc?
                    if( time() - $_SESSION['combat']['last'] > 2 ){
                        $_SESSION['action'] = $_SESSION['action'] + time() - $_SESSION['combat']['last'] + $additional_action_regen;
                    }
                }
            }
            if( $_SESSION['health'] < $health_available ){
                if( time() - $_SESSION['combat']['last'] > 11 ){
                    $_SESSION['health'] = $_SESSION['health'] + time() - $_SESSION['combat']['last'];
                }
            }
            if( $_SESSION['health'] > $health_available ){
                $_SESSION['health'] = $health_available;
            }
            if( $_SESSION['action'] > $action_available ){
                $_SESSION['action'] = $action_available;
            }
    
            $jump = '<a href="./?jump">JUMP</a>';
            if( isset( $_GET['jump'] ) ){
                $jump = '<a href="./?x">STAY</a>';
            }
            if( $_SESSION['dead'] !== false ){
                if( $health_available > 0 ){
                    $jump = '<a href="./?rez">REZ</a>';
                }
            }
            if( $_SESSION['combat']['currently'] !== false ){
                $jump = NULL;
            }
            
            $health_detriment = NULL;
            if( isset( $percent ) ){
                $health_detriment = "<span style='width:{$percent}%;'></span>";
            }
            if( $health_available > 0 ){
                $tef = NULL;
                if( time() - $_SESSION['combat']['last'] < 11 ){
                    $tef = ' tef';
                }
                $mapoutput .= "<div class='combat{$_SESSION['combat']['currently']}{$tef} health_display'><span style='width:{$health_total}%;'></span>{$health_detriment}<strong>{$_SESSION['health']} / {$health_available}</strong></div>";
                if( $_SESSION['acquire']['action'] !== false ){
                    $mapoutput .= "<div class='combat{$_SESSION['combat']['currently']} action_display'><span style='width:{$action_total}%;'></span><strong>{$_SESSION['action']} / {$action_available}</strong></div>";
                }
                if( $_SESSION['combat']['currently'] !== true ){
                    $mapoutput .= "<div class='combat{$_SESSION['combat']['currently']} actions'>{$jump}</div>";
                }
            }
            if( $health_available <= 0 ){
                if( ! isset( $_GET['r'] ) ){
                    header( 'Location:./?r' );
                }
            }
        
        }
        $mapoutput .= '</div>';





        if( $_SESSION['acquire']['score'] !== false ){
            if( $score > 0 ){
                $score = $score;
            }
            if( $score != $_SESSION['score_avail'] ){
                $_SESSION['score_avail'] = $score;
            }
        }





        if( $_SESSION['dead'] !== true ){
            if( $_SESSION['combat']['currently'] !== true ){
                $mapoutput .= _scene( [ 'watersources' => $totalwatersources, 'score' => $score ] );
            }
        }





        $mapoutput .= '</section>';





    }





    if( $_SESSION['map_display'] !== false ){
        if( isset( $_SESSION['examining'] ) ){
            $choice = NULL;
            if( isset( $furnituredetails["{$_SESSION['examining']}"] ) ){
                foreach( $furnituredetails["{$_SESSION['examining']}"] as $k => $v ){
                    if( $k == 'powered' ){
                        if( $v !== false ){
                            if( $k == 'powered' AND $_SESSION['examining'] == 'powercorda' ){
                                $choice .= '<a class="choice" href="./?unplug">Unplug</a>';
                            }
                            $powered = true;
                        }
                        else {
                            if( $k == 'powered' AND $_SESSION['examining'] == 'powercorda' ){
                                    $choice .= '<a class="choice" href="./?plugin">Plug back in</a>';
                            }
                            $powered = false;
                        }
                    }
                    if( $powered !== false ){
                        if( $k == 'code' ){ $codeoutput = _lockedroomcode( ['code' => $v] ); }
                    }
                }
            }
            $examining .= '<div class="examining">';
            $examining .= '<a class="close" href="./?x">x</a>';
            $examining .= $choice;
            if( $_SESSION['examining'] == 'computera' ){
                if( $powered !== false ){
                    if( isset( $resourcetable ) ){
                        $examining .= '<div class="examine_resources">';
                        ksort( $resourcetable );
                        foreach( $resourcetable as $k => $v ){
                                    $tdisp  = isset( $v['disp'] ) ? $v['disp'] : NULL;
                                    if( $_SESSION['worldpower'] !== true ){
                                        $tdisp = isset( $v['offdisp'] ) ? $v['offdisp'] : $tdisp;
                                    }
                                    $mine  = isset( $v['mine'] )  ? $v['mine'] : 'N/A';
                                    $break = 'N/A';
                                    if( isset( $v['break'] ) ){
                                        if( is_int( $v['break'] ) ){
                                            $break = isset( $v['break'] ) ? $v['break'] : 'N/A';
                                        }
                                    }
                                    $examining .= '<p><span title="'.$tdisp.'" class="box '.$k.'"></span>'.$tdisp;
                                    $examining .= '<br />&#9935; ' . $mine . ' <small>(' . $break . 't)';
                                    if( isset( $v['harv'] ) ){
                                        $examining .= '<span class="box ' . $v['harv'] . ' next" title="'.$resourcetable["{$v['harv']}"]['disp'].'"></span>';
                                    }
                                    $examining .= '</small>';
                                    if( isset( $v['info'] ) ){
                                        $examining .= '<span class="info">';
                                        foreach( $v['info'] as $info ){
                                            $examining .= '<span>' . _format( $info ) . '</span>';
                                        }
                                        $examining .= '</span><br />';
                                    }
                                    if( isset( $v['case'] ) ){
                                        if( ! empty( $v['case']['combine'] ) ){
                                            $examining .= '<span class="resourcecombination">';
                                            foreach( $v['case']['combine'] as $ck => $cv ){
                                                $examining .= '<span class="box ' . $ck . ' small"> +++ </span><span class="box ' . $cv . ' small"> === </span>';
                                            }
                                            $examining .= '</span><br />';
                                        }
                                    }
                                    $examining .= '</p>';
                        }
                        $examining .= '</div>';
                    }
                }
            }
            $examining .= '</div>';
        }
    }
    if( $_SESSION['worldpower'] !== false ){
        $resourceslink = NULL;
        if( $_SESSION['acquire']['resources'] !== false ){
            $resourceslink = '<a href="./?resources">'.$resourcesdisplay.'</a>';
        }
        $templateb .=  '<footer><p><a href="./?togglemap">'.$mapdisplay.'</a>'.$resourceslink.'<a href="./?ui">'.$uidisplay.'</a><p><code>va2</code> // <a href="./?r">reset</a></p></footer>';
    }
    $templateb.= '</main>';
    $templateb.='</body></html>';
    if( $_SESSION['dead'] !== true ){
        if( $_SESSION['map_display'] !== false ){
            if( $_SESSION['combat']['currently'] !== true ){
                $mapoutput .=  '<section class="language">';
                if( $_SESSION['worldpower'] !== false ){
                    foreach($dat as $d=>$v){
                        $view = true;
                        if(isset($v['mut'])){
                            foreach($v['mut'] as $mk=>$mv){
                                if(isset($_SESSION['opt']["{$posA}"]["{$mv}"])){
                                    $view = false;
                                }
                            }
                        }
                        if($view!==false){
                            if(isset($grpA[1])){
                                if($grpA[1]!=$d)
                                    continue;
                            }
                            if(isset($v['con'])){
                                $view=isset($v['vis'])?(bool)$v['vis']:true;
                                if($view!==false){
                                    $mapoutput .= '<article>';
                                    foreach($v['con'] as $face){
                                        $face=_format($face);
                                        if(is_string($face)){//entities & markdown for display
                                            if(!is_int($d)){
                                                if($d=='d'){
                                                    $mapoutput .= "<p class='d'>{$face}</p>";
                                                    if(isset($_SESSION['opt']["{$posA}"])){
                                                        foreach($_SESSION['opt']["{$posA}"] as $opt){
                                                            if(isset($data['opt'])){
                                                                if(isset($data['opt']["{$opt}"])){
                                                                    $mapoutput .= '<p>'._format($data['opt']["{$opt}"]).'</p>';
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                            if(is_int($d)){
                                                if(!isset($_SESSION['opt']["{$posA}"]["{$d}"])){
                                                    $mapoutput .= '<p>';
                                                    if(!isset($grpA[1]))
                                                        $mapoutput .= "<a href='./?/{$posA}/{$d}'>";
                                                    $mapoutput .= $face;
                                                    if(!isset($grpA[1]))
                                                        $mapoutput .= "</a>";
                                                    $mapoutput .= '</p>';
                                                }
                                            }
                                        }
                                    }
                                    if(is_int($d)||isset($v['lid'])){
                                        if(isset($grpA[1])||isset($v['lid'])){
                                            if(isset($v['opt'])&&!empty($v['opt'])&&is_array($v['opt'])){
                                                if(!isset($grpB[1])){
                                                    foreach($v['opt'] as $k=>$v){
                                                        if(isset($posB)){
                                                            if(!isset($_SESSION['opt']["{$posA}"]["{$d}"])){
                                                                if($v[1]==$posB){
                                                                    $_SESSION['opt']["{$posA}"]["{$d}"] = $posB;
                                                                    _reload([$posA]);
                                                                }
                                                            }
                                                        }
                                                        if(isset($_SESSION['opt']["{$posA}"]["{$d}"])){
                                                            if($_SESSION['opt']["{$posA}"]["{$d}"]==$v[1]){
                                                                $mapoutput .= '<p>'._format($v[0]).'</p>';
                                                            }
                                                        }
                                                        else{
                                                            $mapoutput .=  "<p><a href='./?/{$posA}/{$d}/{$v[1]}'>";
                                                            $mapoutput .=  _format($v[0]);
                                                            $mapoutput .=  '</a></p>';
                                                        }
                                                    }
                                                }
                                            }
                                            $grpA[1]=isset($v['lid'])?$v['lid']:$grpA[1];
                                            $d=isset($v['lid'])?$v['lid']:$d;
                                            $posA=isset($v['lid'])?$v['lid']:$posA;
                                            $dF=isset($v['face'])?$v['face']:'&mdash;!';
                                            if($grpA[1]==$d){
                                                $mapoutput .= "<p><a href='./?/{$posA}'>{$dF}</a></p>";
                                            }
                                        }
                                    }
                                    $mapoutput .= '</article>';
                                }else{unset($dat[$d]);}
                            }
                        }
                    }
                }
                $mapoutput .=  '</section>';
            }
        }
    }
}









/** 'Hidden settings' ~~~~~~~~~~~~~
  * @since va2
  * 
  * Give the player agency over their playstyle while
  * offering tradeoffs for different options/effects:
  */
if( $_SESSION['map_display'] !== true ){
    $mapoutput .= '<section class="options">';
        $mapoutput .= '<div class="options">';
            $mapoutput .= '<p>';
                $mapoutput .= 
                    $_SESSION['acquire']['resources'] !== false ? 
                        '<a href="./?/turnoff/resources">Turn <strong>OFF</strong> <em>resource</em> acquisition</a>' : 
                        '<em>Resource</em> acquisition is <strong>OFF</strong>';
                $mapoutput .= ' / Resources will no longer go into your inventory.';
            $mapoutput .= '</p>';
            $mapoutput .= '<p>';
                $mapoutput .= 
                    $_SESSION['acquire']['encounters'] !== false ? 
                        '<a href="./?/turnoff/encounters">Turn <strong>OFF</strong> <em>random encounters</em></a>' : 
                        '<em>Random encounters</em> are <strong>OFF</strong>';
                $mapoutput .= ' / While you will no longer encounter random battles, you will lose the ability to receive certain rewards that may only be obtained from these battles.';
            $mapoutput .= '</p>';
            $mapoutput .= '<p>';
                $mapoutput .= 
                    $_SESSION['acquire']['score'] !== false ? 
                        '<a href="./?/turnoff/score">Turn <strong>OFF</strong> <em>scoring</em> acquisition</a>' : 
                        '<em>Scoring</em> is <strong>OFF</strong>';
                $mapoutput .= ' / You will no longer acquire an accumulated score for completing an area. This cannot be undone.';
            $mapoutput .= '</p>';
            $mapoutput .= '<p>';
                $mapoutput .= 
                    $_SESSION['acquire']['gravity'] !== true ? 
                        '<a href="./?/turnon/gravity">Turn <strong>ON</strong> <em>gravity</em> for all tiles</a>' : 
                        '<em>Gravity</em> is <strong>ON</strong> for all tiles';
                $mapoutput .= ' / All tiles will now fall into the empty space below them, causing potential chain-reactions. This cannot be undone.';
            $mapoutput .= '</p>';
            $mapoutput .= '<p>';
                $mapoutput .= 
                    $_SESSION['acquire']['falldamage'] !== false ? 
                        '<a href="./?/turnoff/falldamage">Turn <strong>OFF</strong> <em>fall damage</em></a>' : 
                        '<em>Fall damage</em> is <strong>OFF</strong>';
                $mapoutput .= ' / You will no longer receive damage from falling. This cannot be undone.';
            $mapoutput .= '</p>';
            $mapoutput .= '<p>';
                $mapoutput .= 
                    $_SESSION['acquire']['action'] !== false ? 
                        '<a href="./?/turnoff/action">Turn <strong>OFF</strong> <em>action use</em> for mining</a>' : 
                        '<em>Action use</em> for mining is <strong>OFF</strong>';
                $mapoutput .= ' / While you no longer expend energy to mine resources or use actions, you will no longer passively gain levels from these activities.';
            $mapoutput .= '</p>';
        $mapoutput .= '</div>';
    $mapoutput .= '</section>';
}
/** ~~~~~~~~~~~~~ */









echo $header;
echo $body;
echo $template;
echo $examining;
echo $mapoutput;
echo $templateb;
