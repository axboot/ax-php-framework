<div class="ax-markdown">
    <?php
    if (file_exists(FCPATH . ax('attr', 'src'))) {
        echo \Michelf\MarkdownExtra::defaultTransform(file_get_contents(FCPATH . ax('attr', 'src')));
    } else {
        echo ax('attr', 'src') . ' not found!';
    }

    ax('setAttr', array('src' => ''));
    ?>
