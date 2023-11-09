<?php



$image = include('images.php');

return [

    [
        'name' => 'Comunidade da Pizza',
        'description' => 'Quem prefere hamburguer não é gente.',
        'image' => $image['category_path'].'1.png',
        'pfpColor' => '202a3b',
        'backgroundColor' => '377048',
    ],
    [
        'name' => 'Tortas Tontas',
        'description' => 'Não, não temos retas por aqui.',
        'image' => $image['category_path'] . '2.png',
        'pfpColor' => 'ab84e0',
        'backgroundColor' => 'cf8765',
    ],
    [
        'name' => 'X-Tudão Gostoso',
        'description' => 'Não somos gente.',
        'image' => $image['category_path'] . '3.png',
        'pfpColor' => '823140',
        'backgroundColor' => 'd6b578',
    ],
    [
        'name' => 'Reclame Aqui',
        'description' => 'Quer reclamar de empresa vagabunda?',
        'image' => $image['category_path'] . '4.png',
        'pfpColor' => '80bfff',
        'backgroundColor' => '666666',
    ],

];
