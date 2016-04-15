<?=Asset::css('chewing-grid/chewing-grid-atomic.min.css')?>

<ul class="nav nav-pills">
	<li class='<?php echo Arr::get($subnav, "blog" ); ?>'><?php echo Html::anchor('blog/blog','Blog');?></li>
</ul>

<h3>Blog</h3>

<ul class="card_lit chew-row chew-row--gutter chew-row--col-4 chew-row--card-min-50 chew-row--card-max-300">
    <li class="chew-cell">
        <div class="chew-card"><?=Asset::img('test.jpg', array('id'=>'kanna', 'class'=>'uk-img'));?></div>
    </li>
    <li class="chew-cell">
        <div class="chew-card"><?=Asset::img('icon/icon.jpg', array('id'=>'leg', 'class'=>'uk-img')); ?></div>
    </li>
    <li class="chew-cell">
        <div class="chew-card">3 chewing-grid have some workarounds to improve compatibility:</div>
    </li>
    <li class="chew-cell">
        <div class="chew-card">4 chewing-grid have some workarounds to improve compatibility:</div>
    </li>
    <li class="chew-cell">
        <div class="chew-card">5 chewing-grid have some workarounds to improve compatibility:</div>
    </li>
    <li class="chew-cell">
        <div class="chew-card">6 chewing-grid have some workarounds to improve compatibility:</div>
    </li>
    <li class="chew-cell">
        <div class="chew-card">7 chewing-grid have some workarounds to improve compatibility:</div>
    </li>
    <li class="chew-cell">
        <div class="chew-card">8 chewing-grid have some workarounds to improve compatibility:</div>
    </li>
    <li class="chew-cell chew-cell--ghost">
        <div class="chew-card">9 chewing-grid have some workarounds to improve compatibility:</div>
    </li>
    <li class="chew-cell">
        <div class="chew-card">10 chewing-grid have some workarounds to improve compatibility:</div>
    </li>
    <li class="chew-cell">
        <div class="chew-card">11 chewing-grid have some workarounds to improve compatibility:</div>
    </li>
</ul>
