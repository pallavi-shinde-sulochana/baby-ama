@php
	$meta= ($page->meta) ? $page->meta : null;
	$doc= ($page->doc) ? $page->doc : [];
    $docData= ($page->docData) ? $page->docData : [];
    $pageId=($page->id) ? $page->id : null;
    $editable= $page->editable;
    // dd($docData);
    // dd('fuck');
@endphp