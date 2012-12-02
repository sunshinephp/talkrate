<?php
$prev = $next = '';
if ($this->Paginator->hasPrev()) {
$prev = '<li>' . $this->Paginator->prev('Prev', array('tag' => false, 'escape' => false, 'class' => '')) . '</li>';
}

if ($this->Paginator->hasNext()) {
$next = '<li>' . $this->Paginator->next('Next', array('tag' => false, 'escape' => false, 'class' => '')) . '</li>';
}

echo $this->Paginator->numbers(array(
'first' => null,
'before' => '<div class="pagination"><ul>' . $prev,
    'after' => $next . '</div></ul>',
'separator' => '',
'currentTag' => 'a',
'currentClass' => 'current',
'tag' => 'li',
));
