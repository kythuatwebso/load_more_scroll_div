<?php

$slimit = 10;
$getProduct = $db
    ->join('tableB b', 'a.id = b.idnoidung', 'inner')
    ->where('idlang', Session::get('_lang', 1))
    ->where('anhien', 1)
    ->where('loai', collect($_arr_loai_noidung)->search('product'))
    ->orderBy('thutu', 'asc')
    ->get('tableA a', $slimit, 'a.id,ten');



if ($db->count) {

    echo '
    <div class="ul_danhmuccheck support" data-page="1" data-limit="'.$slimit.'">';
        foreach ($getProduct as $k => $o) {

            $smarty->assign('ten', $o['ten']);
            echo $smarty->fetch($smarty->getTemplateDir(0).'item-hotro.tpl');
        }
    echo '
    </div><!-- /.ul_danhmuccheck -->';

}