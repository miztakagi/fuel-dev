<!-- CONTENT-->
<div id="content">
    <!-- メッセージ表示 -->
    <? if (!empty($message)) { ?>
        <div class="uk-alert uk-text-left" id="message">
          <ul>
            <li><?=$message?></li>
          </ul>
        </div>
    <? } ?>
    <!-- エラー表示 -->
    <? if (!empty($err_message)) { ?>
        <div class="uk-alert uk-alert-danger uk-text-left" id="err_message">
          <ul>
            <li><?=$err_message?></li>
          </ul>
        </div>
    <? } ?>

    <!-- GRID -->
    <div class="forms">
        <div class="uk-grid-width-2-3 uk-align-center">
            マイページTOPの内容
            <?=Form::open(array('action'=>'http://google.com/', 'method'=>'get', 'class'=>'uk-form uk-form-horizontal uk-grid-width-1-1'))?>
                <div><?=Form::fieldset_open(array('class'=>'', 'id'=>'example-id', 'data-uk-margin'=>null))?></div>
                    <div><?=Form::hidden('hidden', 'value', array())?></div>
                    <div><?=Form::label('Male', 'gender')?><?=Form::checkbox('gender', 'Male', true, array('class'=>'uk-form-controls uk-form-controls-condensed'))?></div>
                    <div><?=Form::label('Male', 'gender')?><?=Form::radio('gender', 'Male', true, array('class'=>'uk-form-controls uk-form-controls-condensed'))?></div>
                    <div><?=Form::input('name', '', array('class'=>'uk-form-controls uk-form-controls-condensed uk-width-2-3 aaaa', 'placeholder'=>'value'))?></div>
                    <div><?=Form::input('name', '', array('class'=>'uk-form-controls uk-form-controls-condensed uk-width-2-3 aaaa', 'placeholder'=>'value'))?></div>
                    <div><?=Form::input('name', '', array('class'=>'uk-form-controls uk-form-controls-condensed uk-width-2-3 aaaa', 'placeholder'=>'value'))?></div>
                    <div><?=Form::input('name', '', array('class'=>'uk-form-controls uk-form-controls-condensed uk-width-2-3 aaaa', 'placeholder'=>'value'))?></div>
                    <div><?=Form::textarea('description', '', array('rows'=>6, 'cols'=>8, 'placeholder'=>'value','class'=>'uk-form-controls uk-form-controls-condensed uk-width-2-3 aaaa'))?></div>
                    <div class="uk-form-select" data-uk-form-select>
                        <?=Form::select('country', 'none', array(
                            'none'=>'None',
                            'europe'=>array(
                                'uk'=>'United Kingdom',
                                'nl'=>'Netherlands'
                            ),
                            'us'=>'United States'
                        ))?>
                    </div>
                    <div><?=Form::button('name', 'ok', array('type'=>'button', 'class'=>'uk-button'))?></div>
                    <div><?=Form::submit('ok', 'ok', array('type'=>'submit', 'class'=>'uk-button'))?></div>
                <?=Form::fieldset_close()?>
            <?=Form::close();?>

        </div>
    </div>
</div>
<!-- END CONTENT -->