<?php
require_once 'XML/Builder.php';

$dt = 'data-dojo-type';
$dp = 'data-dojo-props';
$dl = 'dijit.layout';

XML_Builder::factory(array('doctype'=>XML_Builder::$HTML5))

->html
    ->head
        ->meta_(array('http-equiv'=>'Content-Type','content'=>'text/html; charset=UTF-8'))
        ->meta_(array('http-equiv'=>'X-UA-Compatible','content'=>'IE=edge,chrome=1'))
        ->title_('php-XML_Builder document')
        ->link_(array('rel'=>'stylesheet','href'=>'http://ajax.googleapis.com/ajax/libs/dojo/1.7.1/dijit/themes/claro/claro.css'))
        ->link_(array('rel'=>'stylesheet','href'=>'http://ajax.googleapis.com/ajax/libs/dojo/1.7.1/dojox/highlight/resources/highlight.css'))
        ->link_(array('rel'=>'stylesheet','href'=>'http://fonts.googleapis.com/css?family=Antic'))
        ->style(<<<_CSS_
body { margin:0;padding:0 }
#wrapper {
    margin:0 1em;
}
h1, h2 {
    font-family: 'Antic', sans-serif;
    text-shadow: 0 1px 0 rgba(0, 0, 0, 0.8);
}
h1 {
    background-image: linear-gradient(bottom, rgb(0,26,22) 0%, rgb(21,84,94) 88%);
    background-image: -o-linear-gradient(bottom, rgb(0,26,22) 0%, rgb(21,84,94) 88%);
    background-image: -moz-linear-gradient(bottom, rgb(0,26,22) 0%, rgb(21,84,94) 88%);
    background-image: -webkit-linear-gradient(bottom, rgb(0,26,22) 0%, rgb(21,84,94) 88%);
    background-image: -ms-linear-gradient(bottom, rgb(0,26,22) 0%, rgb(21,84,94) 88%);

    background-image: -webkit-gradient(
        linear,
        left bottom,
        left top,
        color-stop(0, rgb(0,26,22)),
        color-stop(0.88, rgb(21,84,94))
    );
    color: white;
    margin:0 0 10px 0;
    padding: 1em;
    box-shadow: 0 1px 3px 3px #000;
}
_CSS_
        )
    ->_
    ->body(array('class'=>'claro'))
        ->a(array('href'=>'http://github.com/hirak/php-XML_Builder'))
            ->img_(array(
                'style'=>'position: absolute; top: 0; right: 0; border: 0;',
                'src'=>'http://assets.github.com/img/30f550e0d38ceb6ef5b81500c64d970b7fb0f028/687474703a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f6f72616e67655f6666373630302e706e67',
                'alt'=>'Fork me on GitHub'
            ))
        ->_
        ->h1_('php-XML_Builder')
        ->div(array('id'=>'wrapper'))
            ->div(array('style'=>'position:relative;height:100%'))
                ->div(array($dt=>"$dl.TabContainer",'style'=>'position:static; width:100%; height:100%'))
                    ->div(array($dt=>"$dl.ContentPane", 'title'=>'Introduction'))

                        ->h2_('About')
                        ->p_('PHPでXMLを組み立てるためのライブラリです。')
                        ->pre->code_(array($dt=>'dojox.highlight.Code'),<<<_PHP_
    <?php
    require_once 'XML/Builder.php';
    echo XML_Builder::factory()
    ->root
        ->hello_('world')
    ->_
    ;

    /*
    <?xml version="1.0" encoding="UTF-8"?>
    <root>
      <hello>world</hello>
    </root>
     */

_PHP_
                        )->_
                        ->ul
                            ->li
                                ->strong_('簡潔')
                                ->_text(': とにかく短く書けます。')
                            ->_
                            ->li
                                ->strong_('安全')
                                ->_text(': DOMやXMLWriterといった実績のあるライブラリのラッパーとして動作します。そのためXSSのような不具合が原理的に発生しません。')
                            ->_
                            ->li
                                ->strong_('DOMとXMLWriterをサポート')
                                ->_text(': バックエンドとして、')
                                ->em_('高機能なDOM')
                                ->_text('・')
                                ->em_('高速なXMLWriter')
                                ->_text('のいずれかを選択できます。どちらを選んでも同じインターフェースで書けます。')
                            ->_
                            ->li
                                ->strong_('Arrayサポート')
                                ->_text(': おまけ機能として、同一インターフェースで配列を組み立てる機能があります。')
                            ->_
                        ->_
                        ->hr_
                        ->h2_('Install')
                        ->p
                            ->_text('PEARパッケージ形式で')
                            ->a_(array('href'=>'http://openpear.org/package/XML_Builder'),'Openpear')
                            ->_text('に登録してあるため、pearコマンドで簡単にインストールできます。')
                        ->_
                        ->pre->code_(<<<_TEXT_
    # pear channel-discover openpear.org
    # pear install openpear/XML_Builder
_TEXT_
                        )->_
                        ->p
                            ->_text('pearコマンドが使えない環境では、')
                            ->a_(array('href'=>'https://github.com/hirak/php-XML_Builder'), 'github')
                            ->_text('からソースをダウンロードして、include_pathにlibの中身をコピーすればOK。')
                        ->_
                    ->_
                    ->div(array($dt=>"$dl.ContentPane", 'title'=>'API Reference'))
                        ->h2_('XML_Builder::factory()')
                        ->p_('XML_Builderオブジェクトを生成します。')
                        ->hr_
                        ->h2_('Methods')
                        ->h3_('->xmlElem($name), ->$name')
                        ->p_('要素を作成します。')
                        ->hr_
                        ->h3_('->xmlEnd(), ->_')
                        ->h3_('->xmlAttr(), ->_attr()')
                        ->h3_('->xmlText(), ->_text()')
                    ->_
                    ->div(array($dt=>"$dl.ContentPane", 'title'=>'DOM'))
                        ->h2_('XML_Builder_DOM')
                    ->_
                    ->div(array($dt=>"$dl.ContentPane", 'title'=>'XMLWriter'))
                        ->h2_('XML_Builder_XMLWriter')
                    ->_
                    ->div(array($dt=>"$dl.ContentPane", 'title'=>'Array'))
                        ->h2_('XML_Builder_Array')
                    ->_
                ->_
            ->_
        ->_

        ->script_(array(
            'src'=>'http://ajax.googleapis.com/ajax/libs/dojo/1.7.1/dojo/dojo.js',
            'type'=>'text/javascript',
            'data-dojo-config'=>'parseOnLoad:true'
        ),'')
        ->script(array('type'=>'text/javascript'))
            ->_comment(implode(PHP_EOL,array(
                '',
                'dojo.require("dijit.layout.BorderContainer");',
                'dojo.require("dijit.layout.TabContainer");',
                'dojo.require("dijit.layout.ContentPane");',
                'dojo.require("dojox.highlight");',
                'dojo.require("dojox.highlight.languages.javascript");',
                '',
            )))
        ->_
    ->_
->_

->xmlPause($build);

file_put_contents(__DIR__.'/../index.html', $build->_render('html'));
