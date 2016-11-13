<?php

kirbytext::$tags['gallery'] = array(
    'attr' => array(
        'width',
    ),
    'html' => function ($tag) {

        //        $url = $tag->attr('gallery');

        $width = $tag->attr('width');
        if (empty($width)) {
            $width = c::get('ka.gallery.width', 85);
        }

        $rel = uniqid();

        $images = $tag->page()->images();

        $html = '<section class="gallery">';
        foreach ($images->sortBy('sort', 'asc') as $image):
            $html .= '<a class="fancybox" rel="group-' . $rel . '" href="' . $image->width(900, 900)->url() . '" title="' . $image->text()->kirhtmlbytext() . '">';
            $html .= '<img src="' . $image->crop($width, $width)->url() . '" alt="' . $image->text()->html() . '">';
            $html .= '</a>';
        endforeach;
        $html .= '</section>';

        return $html;
    }
);