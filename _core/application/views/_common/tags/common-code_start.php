<?php
$tmpFunc = function() {

    $ci = &get_instance();
    $ci->load->model('common_code_m');

    $type = ax('attr', 'type');
    $id = ax('attr', 'id');
    $name = ax('attr', 'name');
    $dataPath = ax('attr', 'dataPath');
    $defaultValue = ax('attr', 'defaultValue');
    $commonCodeStr = '';

    if (!$type) {
        $type = 'select';
    }

    $commonCodes = $ci->common_code_m->get(ax('attr', 'groupCd'));

    switch ($type) {
        case 'checkbox':
            foreach ($commonCodes as $commonCode) {
                if ($commonCode['code'] == $defaultValue) {
                    $commonCodeStr .= sprintf('<label class="checkbox-inline"><input type="checkbox" name="%s" data-ax-path="%s" value="%s" checked> %s </label>', $name, $dataPath, $commonCode['code'], $commonCode['name']);
                } else {
                    $commonCodeStr .= sprintf('<label class="checkbox-inline"><input type="checkbox" name="%s" data-ax-path="%s" value="%s"> %s </label>', $name, $dataPath, $commonCode['code'], $commonCode['name']);
                }
            }
            break;

        case 'radio':
            foreach ($commonCodes as $commonCode) {
                if ($commonCode['code'] == $defaultValue) {
                    $commonCodeStr .= sprintf('<input type="radio" name="%s" data-ax-path="%s" value="%s" checked> %s ', $name, $dataPath, $commonCode['code'], $commonCode['name']);
                } else {
                    $commonCodeStr .= sprintf('<input type="radio" name="%s" data-ax-path="%s" value="%s"> %s ', $name, $dataPath, $commonCode['code'], $commonCode['name']);
                }
            }
            break;

        default:
            $commonCodeStr .= sprintf('<select class="form-control" id="%s" name="%s" data-ax-path="%s">', $id, $name, $dataPath);
            foreach ($commonCodes as $commonCode) {
                if ($commonCode['code'] == $defaultValue) {
                    $commonCodeStr .= sprintf('<option value="%s" selected>%s</option>', $commonCode['code'], $commonCode['name']);
                } else {
                    $commonCodeStr .= sprintf('<option value="%s">%s</option>', $commonCode['code'], $commonCode['name']);
                }
            }
            $commonCodeStr .= '</select>';
            break;
    }

    echo $commonCodeStr . "\n";
};

$tmpFunc();
unset($tmpFunc);
ax('setAttr', array('groupCd' => '', 'name' => '', 'id' => '', 'dataPath' => '', 'type' => '', 'defaultValue' => ''));