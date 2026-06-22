<?php
$background_colour = get_field('background_colour');

$background_classes = [
    'warm-cream' => 'bg-warm-cream',
    'champagne-gold' => 'bg-champagne-gold',
];

$background_class = $background_classes[$background_colour] ?? '';
?>