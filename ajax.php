<?php

if ($name == 'loadmoresp') {

    $limitC = ws_get('limit');

    $db->pageLimit = $limitC;

    $getProduct = $db
    ->join('tableB b', 'a.id = b.idnoidung', 'inner')
    ->where('idlang', Session::get('_lang', 1))
    ->where('anhien', 1)
    ->where('loai', collect($_arr_loai_noidung)->search('product'))
    ->orderBy('thutu', 'asc')
    ->arrayBuilder()
    ->paginate('tableA a', ($value+1), 'a.id,ten');

    foreach ($getProduct as $k => $o) {

        $smarty->assign('ten', $o['ten']);
        echo $smarty->fetch($smarty->getTemplateDir(0).'item-hotro.tpl');
    }
}