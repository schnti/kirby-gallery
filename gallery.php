<?php

kirbytext::$tags['gallery'] = array(
    'attr' => array(
        'text',
    ),
    'html' => function ($tag) {

        $url = $tag->attr('gallery');

        $title = $tag->attr('text');

        $images = $tag->page()->images();

        $html = '<section class="gallery">';
        foreach ($images->sortBy('sort', 'asc') as $image):
            $html .= '<a class="fancybox" rel="images" href="' . $image->url() . '" title="' . $image->text()->kirbytext() . '">';
            $html .= thumb($image, array('width' => 85, 'height' => 85, 'crop' => true, 'alt' => $image->caption()->html()));
            $html .= '</a>';
        endforeach;
        $html .= '</section>';

        return $html;
    }
);