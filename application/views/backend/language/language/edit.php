<!-- bof: page header -->
<div class="row-fluid">
    <div class="span12">
        <?php $this->load->view('components/style_customize'); ?>
        <!-- bof: page heading -->
        <h3 class="page-title"><?php echo $this->lang->line('heading_title'); ?> <small><?php echo $this->lang->line('heading_description'); ?></small></h3>
        <!-- eof: page heading -->
    </div>
</div>
<!-- eof: page header -->

<!-- bof: dashboard -->
<div id="dashboard">
    <!-- bof: dashboard stats -->
    <div class="row-fluid">
        <div class="span12 responsive">
            <?php if (! isset($language)): ?>

            <div class="alert alert-block alert-error fade in">
                <button type="button" class="close" data-dismiss="alert"></button>
                <h4 class="alert-heading"><?php echo $this->lang->line('error'); ?>!</h4>
                <p><?php echo $this->lang->line('invalid_input'); ?></p>
                <p class="pull-right">
                    <a class="btn green" href="<?php echo site_url('language/add'); ?>"><?php echo $this->lang->line('add_new_language'); ?></a>
                    <a class="btn blue" href="<?php echo site_url('language'); ?>"><?php echo $this->lang->line('language_manager'); ?></a>
                </p>

                <div class="clearfix"></div>
            </div>
            <?php else: ?>
            <div class="portlet box blue">
                <div class="portlet-title">
                    <h4><i class="icon-plus"></i><?php echo $this->lang->line('heading_title'); ?></h4>
                </div>

                <div class="portlet-body form">
                    <!-- <h3 class="block">Basic validation states</h3> -->
                    <form id="edit_language" action="" method="post" class="form-horizontal">
                        <input type="hidden" name="id" value="<?php echo $language->id; ?>" />

                        <?php if (validation_errors()): ?>
                        <div class="alert alert-error">
                            <button class="close" data-dismiss="alert"></button>
                            <span><?php echo $this->lang->line('validation_error'); ?></span>

                            <ul>
                            <?php echo validation_errors('<li>', '</li>'); ?>
                            </ul>
                        </div>
                        <?php endif; ?>

                        <div class="control-group<?php echo (form_error('name') ? ' error' : ''); ?>">
                            <label class="control-label"><?php echo $this->lang->line('language_name'); ?></label>
                            <div class="controls input-icon">
                                <input type="text" name="name" class="span6 m-wrap" value="<?php echo set_value('name', $language->name); ?>" />
                                <span class="help-block"><?php echo $this->lang->line('language_name_desc'); ?></span>
                            </div>
                        </div>

                        <div class="control-group<?php echo (form_error('native_name') ? ' error' : ''); ?>">
                            <label class="control-label"><?php echo $this->lang->line('native_name'); ?></label>
                            <div class="controls input-icon">
                                <input type="text" name="native_name" class="span6 m-wrap" value="<?php echo set_value('native_name', $language->native_name); ?>" />
                                <span class="help-block"><?php echo $this->lang->line('native_name_desc'); ?></span>
                            </div>
                        </div>

                        <div class="control-group<?php echo (form_error('alias') ? ' error' : ''); ?>">
                            <label class="control-label"><?php echo $this->lang->line('alias'); ?></label>
                            <div class="controls input-icon">
                                <input type="text" name="alias" class="span6 m-wrap" value="<?php echo set_value('alias', $language->alias); ?>" />
                                <span class="help-block"><?php echo $this->lang->line('alias_desc'); ?></span>
                            </div>
                        </div>

                        <div class="control-group<?php echo (form_error('code') ? ' error' : ''); ?>">
                            <label class="control-label"><?php echo $this->lang->line('iso-639-1'); ?></label>
                            <div class="controls">
                                <select name="code" id="code" class="span6 select2">
                                    <option value="ab"<?php echo set_select('code', 'ab', ('ab' === $language->code ? true : false)); ?>>Abkhaz</option>
                                    <option value="aa"<?php echo set_select('code', 'aa', ('aa' === $language->code ? true : false)); ?>>Afar</option>
                                    <option value="af"<?php echo set_select('code', 'af', ('af' === $language->code ? true : false)); ?>>Afrikaans</option>
                                    <option value="ak"<?php echo set_select('code', 'ak', ('ak' === $language->code ? true : false)); ?>>Akan</option>
                                    <option value="sq"<?php echo set_select('code', 'sq', ('sq' === $language->code ? true : false)); ?>>Albanian</option>
                                    <option value="am"<?php echo set_select('code', 'am', ('am' === $language->code ? true : false)); ?>>Amharic</option>
                                    <option value="ar"<?php echo set_select('code', 'ar', ('ar' === $language->code ? true : false)); ?>>Arabic</option>
                                    <option value="an"<?php echo set_select('code', 'an', ('an' === $language->code ? true : false)); ?>>Aragonese</option>
                                    <option value="hy"<?php echo set_select('code', 'hy', ('hy' === $language->code ? true : false)); ?>>Armenian</option>
                                    <option value="as"<?php echo set_select('code', 'as', ('as' === $language->code ? true : false)); ?>>Assamese</option>
                                    <option value="av"<?php echo set_select('code', 'av', ('av' === $language->code ? true : false)); ?>>Avaric</option>
                                    <option value="ae"<?php echo set_select('code', 'ae', ('ae' === $language->code ? true : false)); ?>>Avestan</option>
                                    <option value="ay"<?php echo set_select('code', 'ay', ('ay' === $language->code ? true : false)); ?>>Aymara</option>
                                    <option value="az"<?php echo set_select('code', 'az', ('az' === $language->code ? true : false)); ?>>Azerbaijani</option>
                                    <option value="bm"<?php echo set_select('code', 'bm', ('bm' === $language->code ? true : false)); ?>>Bambara</option>
                                    <option value="ba"<?php echo set_select('code', 'ba', ('ba' === $language->code ? true : false)); ?>>Bashkir</option>
                                    <option value="eu"<?php echo set_select('code', 'eu', ('eu' === $language->code ? true : false)); ?>>Basque</option>
                                    <option value="be"<?php echo set_select('code', 'be', ('be' === $language->code ? true : false)); ?>>Belarusian</option>
                                    <option value="bn"<?php echo set_select('code', 'bn', ('bn' === $language->code ? true : false)); ?>>Bengali; Bangla</option>
                                    <option value="bh"<?php echo set_select('code', 'bh', ('bh' === $language->code ? true : false)); ?>>Bihari</option>
                                    <option value="bi"<?php echo set_select('code', 'bi', ('bi' === $language->code ? true : false)); ?>>Bislama</option>
                                    <option value="bs"<?php echo set_select('code', 'bs', ('bs' === $language->code ? true : false)); ?>>Bosnian</option>
                                    <option value="br"<?php echo set_select('code', 'br', ('br' === $language->code ? true : false)); ?>>Breton</option>
                                    <option value="bg"<?php echo set_select('code', 'bg', ('bg' === $language->code ? true : false)); ?>>Bulgarian</option>
                                    <option value="my"<?php echo set_select('code', 'my', ('my' === $language->code ? true : false)); ?>>Burmese</option>
                                    <option value="ca"<?php echo set_select('code', 'ca', ('ca' === $language->code ? true : false)); ?>>Catalan; Valencian</option>
                                    <option value="ch"<?php echo set_select('code', 'ch', ('ch' === $language->code ? true : false)); ?>>Chamorro</option>
                                    <option value="ce"<?php echo set_select('code', 'ce', ('ce' === $language->code ? true : false)); ?>>Chechen</option>
                                    <option value="ny"<?php echo set_select('code', 'ny', ('ny' === $language->code ? true : false)); ?>>Chichewa; Chewa; Nyanja</option>
                                    <option value="zh"<?php echo set_select('code', 'zh', ('zh' === $language->code ? true : false)); ?>>Chinese</option>
                                    <option value="cv"<?php echo set_select('code', 'cv', ('cv' === $language->code ? true : false)); ?>>Chuvash</option>
                                    <option value="kw"<?php echo set_select('code', 'kw', ('kw' === $language->code ? true : false)); ?>>Cornish</option>
                                    <option value="co"<?php echo set_select('code', 'co', ('co' === $language->code ? true : false)); ?>>Corsican</option>
                                    <option value="cr"<?php echo set_select('code', 'cr', ('cr' === $language->code ? true : false)); ?>>Cree</option>
                                    <option value="hr"<?php echo set_select('code', 'hr', ('hr' === $language->code ? true : false)); ?>>Croatian</option>
                                    <option value="cs"<?php echo set_select('code', 'cs', ('cs' === $language->code ? true : false)); ?>>Czech</option>
                                    <option value="da"<?php echo set_select('code', 'da', ('da' === $language->code ? true : false)); ?>>Danish</option>
                                    <option value="dv"<?php echo set_select('code', 'dv', ('dv' === $language->code ? true : false)); ?>>Divehi; Dhivehi; Maldivian;</option>
                                    <option value="nl"<?php echo set_select('code', 'nl', ('nl' === $language->code ? true : false)); ?>>Dutch</option>
                                    <option value="dz"<?php echo set_select('code', 'dz', ('dz' === $language->code ? true : false)); ?>>Dzongkha</option>
                                    <option value="en"<?php echo set_select('code', 'en', ('en' === $language->code ? true : false)); ?>>English</option>
                                    <option value="eo"<?php echo set_select('code', 'eo', ('eo' === $language->code ? true : false)); ?>>Esperanto</option>
                                    <option value="et"<?php echo set_select('code', 'et', ('et' === $language->code ? true : false)); ?>>Estonian</option>
                                    <option value="ee"<?php echo set_select('code', 'ee', ('ee' === $language->code ? true : false)); ?>>Ewe</option>
                                    <option value="fo"<?php echo set_select('code', 'fo', ('fo' === $language->code ? true : false)); ?>>Faroese</option>
                                    <option value="fj"<?php echo set_select('code', 'fj', ('fj' === $language->code ? true : false)); ?>>Fijian</option>
                                    <option value="fi"<?php echo set_select('code', 'fi', ('fi' === $language->code ? true : false)); ?>>Finnish</option>
                                    <option value="fr"<?php echo set_select('code', 'fr', ('fr' === $language->code ? true : false)); ?>>French</option>
                                    <option value="ff"<?php echo set_select('code', 'ff', ('ff' === $language->code ? true : false)); ?>>Fula; Fulah; Pulaar; Pular</option>
                                    <option value="gl"<?php echo set_select('code', 'gl', ('gl' === $language->code ? true : false)); ?>>Galician</option>
                                    <option value="ka"<?php echo set_select('code', 'ka', ('ka' === $language->code ? true : false)); ?>>Georgian</option>
                                    <option value="de"<?php echo set_select('code', 'de', ('de' === $language->code ? true : false)); ?>>German</option>
                                    <option value="el"<?php echo set_select('code', 'el', ('el' === $language->code ? true : false)); ?>>Greek, Modern</option>
                                    <option value="gn"<?php echo set_select('code', 'gn', ('gn' === $language->code ? true : false)); ?>>Guaraní</option>
                                    <option value="gu"<?php echo set_select('code', 'gu', ('gu' === $language->code ? true : false)); ?>>Gujarati</option>
                                    <option value="ht"<?php echo set_select('code', 'ht', ('ht' === $language->code ? true : false)); ?>>Haitian; Haitian Creole</option>
                                    <option value="ha"<?php echo set_select('code', 'ha', ('ha' === $language->code ? true : false)); ?>>Hausa</option>
                                    <option value="he"<?php echo set_select('code', 'he', ('he' === $language->code ? true : false)); ?>>Hebrew (modern)</option>
                                    <option value="hz"<?php echo set_select('code', 'hz', ('hz' === $language->code ? true : false)); ?>>Herero</option>
                                    <option value="hi"<?php echo set_select('code', 'hi', ('hi' === $language->code ? true : false)); ?>>Hindi</option>
                                    <option value="ho"<?php echo set_select('code', 'ho', ('ho' === $language->code ? true : false)); ?>>Hiri Motu</option>
                                    <option value="hu"<?php echo set_select('code', 'hu', ('hu' === $language->code ? true : false)); ?>>Hungarian</option>
                                    <option value="ia"<?php echo set_select('code', 'ia', ('ia' === $language->code ? true : false)); ?>>Interlingua</option>
                                    <option value="id"<?php echo set_select('code', 'id', ('id' === $language->code ? true : false)); ?>>Indonesian</option>
                                    <option value="ie"<?php echo set_select('code', 'ie', ('ie' === $language->code ? true : false)); ?>>Interlingue</option>
                                    <option value="ga"<?php echo set_select('code', 'ga', ('ga' === $language->code ? true : false)); ?>>Irish</option>
                                    <option value="ig"<?php echo set_select('code', 'ig', ('ig' === $language->code ? true : false)); ?>>Igbo</option>
                                    <option value="ik"<?php echo set_select('code', 'ik', ('ik' === $language->code ? true : false)); ?>>Inupiaq</option>
                                    <option value="io"<?php echo set_select('code', 'io', ('io' === $language->code ? true : false)); ?>>Ido</option>
                                    <option value="is"<?php echo set_select('code', 'is', ('is' === $language->code ? true : false)); ?>>Icelandic</option>
                                    <option value="it"<?php echo set_select('code', 'it', ('it' === $language->code ? true : false)); ?>>Italian</option>
                                    <option value="iu"<?php echo set_select('code', 'iu', ('iu' === $language->code ? true : false)); ?>>Inuktitut</option>
                                    <option value="ja"<?php echo set_select('code', 'ja', ('ja' === $language->code ? true : false)); ?>>Japanese</option>
                                    <option value="jv"<?php echo set_select('code', 'jv', ('jv' === $language->code ? true : false)); ?>>Javanese</option>
                                    <option value="kl"<?php echo set_select('code', 'kl', ('kl' === $language->code ? true : false)); ?>>Kalaallisut, Greenlandic</option>
                                    <option value="kn"<?php echo set_select('code', 'kn', ('kn' === $language->code ? true : false)); ?>>Kannada</option>
                                    <option value="kr"<?php echo set_select('code', 'kr', ('kr' === $language->code ? true : false)); ?>>Kanuri</option>
                                    <option value="ks"<?php echo set_select('code', 'ks', ('ks' === $language->code ? true : false)); ?>>Kashmiri</option>
                                    <option value="kk"<?php echo set_select('code', 'kk', ('kk' === $language->code ? true : false)); ?>>Kazakh</option>
                                    <option value="km"<?php echo set_select('code', 'km', ('km' === $language->code ? true : false)); ?>>Khmer</option>
                                    <option value="ki"<?php echo set_select('code', 'ki', ('ki' === $language->code ? true : false)); ?>>Kikuyu, Gikuyu</option>
                                    <option value="rw"<?php echo set_select('code', 'rw', ('rw' === $language->code ? true : false)); ?>>Kinyarwanda</option>
                                    <option value="ky"<?php echo set_select('code', 'ky', ('ky' === $language->code ? true : false)); ?>>Kyrgyz</option>
                                    <option value="kv"<?php echo set_select('code', 'kv', ('kv' === $language->code ? true : false)); ?>>Komi</option>
                                    <option value="kg"<?php echo set_select('code', 'kg', ('kg' === $language->code ? true : false)); ?>>Kongo</option>
                                    <option value="ko"<?php echo set_select('code', 'ko', ('ko' === $language->code ? true : false)); ?>>Korean</option>
                                    <option value="ku"<?php echo set_select('code', 'ku', ('ku' === $language->code ? true : false)); ?>>Kurdish</option>
                                    <option value="kj"<?php echo set_select('code', 'kj', ('kj' === $language->code ? true : false)); ?>>Kwanyama, Kuanyama</option>
                                    <option value="la"<?php echo set_select('code', 'la', ('la' === $language->code ? true : false)); ?>>Latin</option>
                                    <option value="lb"<?php echo set_select('code', 'lb', ('lb' === $language->code ? true : false)); ?>>Luxembourgish, Letzeburgesch</option>
                                    <option value="lg"<?php echo set_select('code', 'lg', ('lg' === $language->code ? true : false)); ?>>Ganda</option>
                                    <option value="li"<?php echo set_select('code', 'li', ('li' === $language->code ? true : false)); ?>>Limburgish, Limburgan, Limburger</option>
                                    <option value="ln"<?php echo set_select('code', 'ln', ('ln' === $language->code ? true : false)); ?>>Lingala</option>
                                    <option value="lo"<?php echo set_select('code', 'lo', ('lo' === $language->code ? true : false)); ?>>Lao</option>
                                    <option value="lt"<?php echo set_select('code', 'lt', ('lt' === $language->code ? true : false)); ?>>Lithuanian</option>
                                    <option value="lu"<?php echo set_select('code', 'lu', ('lu' === $language->code ? true : false)); ?>>Luba-Katanga</option>
                                    <option value="lv"<?php echo set_select('code', 'lv', ('lv' === $language->code ? true : false)); ?>>Latvian</option>
                                    <option value="gv"<?php echo set_select('code', 'gv', ('gv' === $language->code ? true : false)); ?>>Manx</option>
                                    <option value="mk"<?php echo set_select('code', 'mk', ('mk' === $language->code ? true : false)); ?>>Macedonian</option>
                                    <option value="mg"<?php echo set_select('code', 'mg', ('mg' === $language->code ? true : false)); ?>>Malagasy</option>
                                    <option value="ms"<?php echo set_select('code', 'ms', ('ms' === $language->code ? true : false)); ?>>Malay</option>
                                    <option value="ml"<?php echo set_select('code', 'ml', ('ml' === $language->code ? true : false)); ?>>Malayalam</option>
                                    <option value="mt"<?php echo set_select('code', 'mt', ('mt' === $language->code ? true : false)); ?>>Maltese</option>
                                    <option value="mi"<?php echo set_select('code', 'mi', ('mi' === $language->code ? true : false)); ?>>Māori</option>
                                    <option value="mr"<?php echo set_select('code', 'mr', ('mr' === $language->code ? true : false)); ?>>Marathi (Marāṭhī)</option>
                                    <option value="mh"<?php echo set_select('code', 'mh', ('mh' === $language->code ? true : false)); ?>>Marshallese</option>
                                    <option value="mn"<?php echo set_select('code', 'mn', ('mn' === $language->code ? true : false)); ?>>Mongolian</option>
                                    <option value="na"<?php echo set_select('code', 'na', ('na' === $language->code ? true : false)); ?>>Nauru</option>
                                    <option value="nv"<?php echo set_select('code', 'nv', ('nv' === $language->code ? true : false)); ?>>Navajo, Navaho</option>
                                    <option value="nb"<?php echo set_select('code', 'nb', ('nb' === $language->code ? true : false)); ?>>Norwegian Bokmål</option>
                                    <option value="nd"<?php echo set_select('code', 'nd', ('nd' === $language->code ? true : false)); ?>>North Ndebele</option>
                                    <option value="ne"<?php echo set_select('code', 'ne', ('ne' === $language->code ? true : false)); ?>>Nepali</option>
                                    <option value="ng"<?php echo set_select('code', 'ng', ('ng' === $language->code ? true : false)); ?>>Ndonga</option>
                                    <option value="nn"<?php echo set_select('code', 'nn', ('nn' === $language->code ? true : false)); ?>>Norwegian Nynorsk</option>
                                    <option value="no"<?php echo set_select('code', 'no', ('no' === $language->code ? true : false)); ?>>Norwegian</option>
                                    <option value="ii"<?php echo set_select('code', 'ii', ('ii' === $language->code ? true : false)); ?>>Nuosu</option>
                                    <option value="nr"<?php echo set_select('code', 'nr', ('nr' === $language->code ? true : false)); ?>>South Ndebele</option>
                                    <option value="oc"<?php echo set_select('code', 'oc', ('oc' === $language->code ? true : false)); ?>>Occitan</option>
                                    <option value="oj"<?php echo set_select('code', 'oj', ('oj' === $language->code ? true : false)); ?>>Ojibwe, Ojibwa</option>
                                    <option value="cu"<?php echo set_select('code', 'cu', ('cu' === $language->code ? true : false)); ?>>Old Church Slavonic, Church Slavic, Church Slavonic, Old Bulgarian, Old Slavonic</option>
                                    <option value="om"<?php echo set_select('code', 'om', ('om' === $language->code ? true : false)); ?>>Oromo</option>
                                    <option value="or"<?php echo set_select('code', 'or', ('or' === $language->code ? true : false)); ?>>Oriya</option>
                                    <option value="os"<?php echo set_select('code', 'os', ('os' === $language->code ? true : false)); ?>>Ossetian, Ossetic</option>
                                    <option value="pa"<?php echo set_select('code', 'pa', ('pa' === $language->code ? true : false)); ?>>Panjabi, Punjabi</option>
                                    <option value="pi"<?php echo set_select('code', 'pi', ('pi' === $language->code ? true : false)); ?>>Pāli</option>
                                    <option value="fa"<?php echo set_select('code', 'fa', ('fa' === $language->code ? true : false)); ?>>Persian</option>
                                    <option value="pl"<?php echo set_select('code', 'pl', ('pl' === $language->code ? true : false)); ?>>Polish</option>
                                    <option value="ps"<?php echo set_select('code', 'ps', ('ps' === $language->code ? true : false)); ?>>Pashto, Pushto</option>
                                    <option value="pt"<?php echo set_select('code', 'pt', ('pt' === $language->code ? true : false)); ?>>Portuguese</option>
                                    <option value="qu"<?php echo set_select('code', 'qu', ('qu' === $language->code ? true : false)); ?>>Quechua</option>
                                    <option value="rm"<?php echo set_select('code', 'rm', ('rm' === $language->code ? true : false)); ?>>Romansh</option>
                                    <option value="rn"<?php echo set_select('code', 'rn', ('rn' === $language->code ? true : false)); ?>>Kirundi</option>
                                    <option value="ro"<?php echo set_select('code', 'ro', ('ro' === $language->code ? true : false)); ?>>Romanian, Moldavian</option>
                                    <option value="ru"<?php echo set_select('code', 'ru', ('ru' === $language->code ? true : false)); ?>>Russian</option>
                                    <option value="sa"<?php echo set_select('code', 'sa', ('sa' === $language->code ? true : false)); ?>>Sanskrit (Saṁskṛta)</option>
                                    <option value="sc"<?php echo set_select('code', 'sc', ('sc' === $language->code ? true : false)); ?>>Sardinian</option>
                                    <option value="sd"<?php echo set_select('code', 'sd', ('sd' === $language->code ? true : false)); ?>>Sindhi</option>
                                    <option value="se"<?php echo set_select('code', 'se', ('se' === $language->code ? true : false)); ?>>Northern Sami</option>
                                    <option value="sm"<?php echo set_select('code', 'sm', ('sm' === $language->code ? true : false)); ?>>Samoan</option>
                                    <option value="sg"<?php echo set_select('code', 'sg', ('sg' === $language->code ? true : false)); ?>>Sango</option>
                                    <option value="sr"<?php echo set_select('code', 'sr', ('sr' === $language->code ? true : false)); ?>>Serbian</option>
                                    <option value="gd"<?php echo set_select('code', 'gd', ('gd' === $language->code ? true : false)); ?>>Scottish Gaelic; Gaelic</option>
                                    <option value="sn"<?php echo set_select('code', 'sn', ('sn' === $language->code ? true : false)); ?>>Shona</option>
                                    <option value="si"<?php echo set_select('code', 'si', ('si' === $language->code ? true : false)); ?>>Sinhala, Sinhalese</option>
                                    <option value="sk"<?php echo set_select('code', 'sk', ('sk' === $language->code ? true : false)); ?>>Slovak</option>
                                    <option value="sl"<?php echo set_select('code', 'sl', ('sl' === $language->code ? true : false)); ?>>Slovene</option>
                                    <option value="so"<?php echo set_select('code', 'so', ('so' === $language->code ? true : false)); ?>>Somali</option>
                                    <option value="st"<?php echo set_select('code', 'st', ('st' === $language->code ? true : false)); ?>>Southern Sotho</option>
                                    <option value="es"<?php echo set_select('code', 'es', ('es' === $language->code ? true : false)); ?>>Spanish; Castilian</option>
                                    <option value="su"<?php echo set_select('code', 'su', ('su' === $language->code ? true : false)); ?>>Sundanese</option>
                                    <option value="sw"<?php echo set_select('code', 'sw', ('sw' === $language->code ? true : false)); ?>>Swahili</option>
                                    <option value="ss"<?php echo set_select('code', 'ss', ('ss' === $language->code ? true : false)); ?>>Swati</option>
                                    <option value="sv"<?php echo set_select('code', 'sv', ('sv' === $language->code ? true : false)); ?>>Swedish</option>
                                    <option value="ta"<?php echo set_select('code', 'ta', ('ta' === $language->code ? true : false)); ?>>Tamil</option>
                                    <option value="te"<?php echo set_select('code', 'te', ('te' === $language->code ? true : false)); ?>>Telugu</option>
                                    <option value="tg"<?php echo set_select('code', 'tg', ('tg' === $language->code ? true : false)); ?>>Tajik</option>
                                    <option value="th"<?php echo set_select('code', 'th', ('th' === $language->code ? true : false)); ?>>Thai</option>
                                    <option value="ti"<?php echo set_select('code', 'ti', ('ti' === $language->code ? true : false)); ?>>Tigrinya</option>
                                    <option value="bo"<?php echo set_select('code', 'bo', ('bo' === $language->code ? true : false)); ?>>Tibetan Standard, Tibetan, Central</option>
                                    <option value="tk"<?php echo set_select('code', 'tk', ('tk' === $language->code ? true : false)); ?>>Turkmen</option>
                                    <option value="tl"<?php echo set_select('code', 'tl', ('tl' === $language->code ? true : false)); ?>>Tagalog</option>
                                    <option value="tn"<?php echo set_select('code', 'tn', ('tn' === $language->code ? true : false)); ?>>Tswana</option>
                                    <option value="to"<?php echo set_select('code', 'to', ('to' === $language->code ? true : false)); ?>>Tonga (Tonga Islands)</option>
                                    <option value="tr"<?php echo set_select('code', 'tr', ('tr' === $language->code ? true : false)); ?>>Turkish</option>
                                    <option value="ts"<?php echo set_select('code', 'ts', ('ts' === $language->code ? true : false)); ?>>Tsonga</option>
                                    <option value="tt"<?php echo set_select('code', 'tt', ('tt' === $language->code ? true : false)); ?>>Tatar</option>
                                    <option value="tw"<?php echo set_select('code', 'tw', ('tw' === $language->code ? true : false)); ?>>Twi</option>
                                    <option value="ty"<?php echo set_select('code', 'ty', ('ty' === $language->code ? true : false)); ?>>Tahitian</option>
                                    <option value="ug"<?php echo set_select('code', 'ug', ('ug' === $language->code ? true : false)); ?>>Uighur, Uyghur</option>
                                    <option value="uk"<?php echo set_select('code', 'uk', ('uk' === $language->code ? true : false)); ?>>Ukrainian</option>
                                    <option value="ur"<?php echo set_select('code', 'ur', ('ur' === $language->code ? true : false)); ?>>Urdu</option>
                                    <option value="uz"<?php echo set_select('code', 'uz', ('uz' === $language->code ? true : false)); ?>>Uzbek</option>
                                    <option value="ve"<?php echo set_select('code', 've', ('ve' === $language->code ? true : false)); ?>>Venda</option>
                                    <option value="vi"<?php echo set_select('code', 'vi', ('vi' === $language->code ? true : false)); ?>>Vietnamese</option>
                                    <option value="vo"<?php echo set_select('code', 'vo', ('vo' === $language->code ? true : false)); ?>>Volapük</option>
                                    <option value="wa"<?php echo set_select('code', 'wa', ('wa' === $language->code ? true : false)); ?>>Walloon</option>
                                    <option value="cy"<?php echo set_select('code', 'cy', ('cy' === $language->code ? true : false)); ?>>Welsh</option>
                                    <option value="wo"<?php echo set_select('code', 'wo', ('wo' === $language->code ? true : false)); ?>>Wolof</option>
                                    <option value="fy"<?php echo set_select('code', 'fy', ('fy' === $language->code ? true : false)); ?>>Western Frisian</option>
                                    <option value="xh"<?php echo set_select('code', 'xh', ('xh' === $language->code ? true : false)); ?>>Xhosa</option>
                                    <option value="yi"<?php echo set_select('code', 'yi', ('yi' === $language->code ? true : false)); ?>>Yiddish</option>
                                    <option value="yo"<?php echo set_select('code', 'yo', ('yo' === $language->code ? true : false)); ?>>Yoruba</option>
                                    <option value="za"<?php echo set_select('code', 'za', ('za' === $language->code ? true : false)); ?>>Zhuang, Chuang</option>
                                    <option value="zu"<?php echo set_select('code', 'zu', ('zu' === $language->code ? true : false)); ?>>Zulu</option>
                                </select>
                                <span class="help-block"><?php echo $this->lang->line('iso-639-1_desc'); ?></span>
                            </div>
                        </div>

                        <div class="control-group<?php echo (form_error('encoding') ? ' error' : ''); ?>">
                            <label class="control-label"><?php echo $this->lang->line('encoding'); ?></label>
                            <div class="controls">
                                <select name="encoding" id="encoding" class="span6 select2">
                                    <option value="UTF-8"<?php echo set_select('encoding', 'UTF-8', ('UTF-8' === $language->encoding ? true : false)); ?>>Unicode (UTF-8)</option>
                                    <option value="ISO-8859-1"<?php echo set_select('encoding', 'ISO-8859-1', ('ISO-8859-1' === $language->encoding ? true : false)); ?>>Western (ISO-8859-1)</option>
                                    <option value="windows-1252"<?php echo set_select('encoding', 'windows-1252', ('windows-1252' === $language->encoding ? true : false)); ?>>Western (Windows-1252)</option>
                                    <option value="UTF-16LE"<?php echo set_select('encoding', 'UTF-16LE', ('UTF-16LE' === $language->encoding ? true : false)); ?>>Unicode (UTF-16LE)</option>
                                    <option value="windows-1256"<?php echo set_select('encoding', 'windows-1256', ('windows-1256' === $language->encoding ? true : false)); ?>>Arabic (Windows-1256)</option>
                                    <option value="ISO-8859-6"<?php echo set_select('encoding', 'ISO-8859-6', ('ISO-8859-6' === $language->encoding ? true : false)); ?>>Arabic (ISO-8859-6)</option>
                                    <option value="ISO-8859-4"<?php echo set_select('encoding', 'ISO-8859-4', ('ISO-8859-4' === $language->encoding ? true : false)); ?>>Baltic (ISO-8859-4)</option>
                                    <option value="ISO-8859-13"<?php echo set_select('encoding', 'ISO-8859-13', ('ISO-8859-13' === $language->encoding ? true : false)); ?>>Baltic (ISO-8859-13)</option>
                                    <option value="windows-1257"<?php echo set_select('encoding', 'windows-1257', ('windows-1257' === $language->encoding ? true : false)); ?>>Baltic (Windows-1257)</option>
                                    <option value="ISO-8859-14"<?php echo set_select('encoding', 'ISO-8859-14', ('ISO-8859-14' === $language->encoding ? true : false)); ?>>Celtic (ISO-8859-14)</option>
                                    <option value="ISO-8859-2"<?php echo set_select('encoding', 'ISO-8859-2', ('ISO-8859-2' === $language->encoding ? true : false)); ?>>Central European (ISO-8859-2)</option>
                                    <option value="windows-1250"<?php echo set_select('encoding', 'windows-1250', ('windows-1250' === $language->encoding ? true : false)); ?>>Central European (Windows-1250)</option>
                                    <option value="GBK"<?php echo set_select('encoding', 'GBK', ('GBK' === $language->encoding ? true : false)); ?>>Chinese Simplified (GBK)</option>
                                    <option value="gb18030"<?php echo set_select('encoding', 'gb18030', ('gb18030' === $language->encoding ? true : false)); ?>>Chinese Simplified (gb18030)</option>
                                    <option value="Big5"<?php echo set_select('encoding', 'Big5', ('Big5' === $language->encoding ? true : false)); ?>>Chinese Traditional (Big5)</option>
                                    <option value="Big5-HKSCS"<?php echo set_select('encoding', 'Big5-HKSCS', ('Big5-HKSCS' === $language->encoding ? true : false)); ?>>Chinese Traditional (Big5-HKSCS)</option>
                                    <option value="ISO-8859-5"<?php echo set_select('encoding', 'ISO-8859-5', ('ISO-8859-5' === $language->encoding ? true : false)); ?>>Cyrillic (ISO-8859-5)</option>
                                    <option value="windows-1251"<?php echo set_select('encoding', 'windows-1251', ('windows-1251' === $language->encoding ? true : false)); ?>>Cyrillic (Windows-1251)</option>
                                    <option value="KOI8-R"<?php echo set_select('encoding', 'KOI8-R', ('KOI8-R' === $language->encoding ? true : false)); ?>>Cyrillic (KOI8-R)</option>
                                    <option value="KOI8-U"<?php echo set_select('encoding', 'KOI8-U', ('KOI8-U' === $language->encoding ? true : false)); ?>>Cyrillic (KOI8-U)</option>
                                    <option value="ISO-8859-7"<?php echo set_select('encoding', 'ISO-8859-7', ('ISO-8859-7' === $language->encoding ? true : false)); ?>>Greek (ISO-8859-7)</option>
                                    <option value="windows-1253"<?php echo set_select('encoding', 'windows-1253', ('windows-1253' === $language->encoding ? true : false)); ?>>Greek (Windows-1253)</option>
                                    <option value="windows-1255"<?php echo set_select('encoding', 'windows-1255', ('windows-1255' === $language->encoding ? true : false)); ?>>Hebrew (Windows-1255)</option>
                                    <option value="ISO-8859-8-I"<?php echo set_select('encoding', 'ISO-8859-8-I', ('ISO-8859-8-I' === $language->encoding ? true : false)); ?>>Hebrew (ISO-8859-8-I)</option>
                                    <option value="ISO-8859-8"<?php echo set_select('encoding', 'ISO-8859-8', ('ISO-8859-8' === $language->encoding ? true : false)); ?>>Hebrew (ISO-8859-8)</option>
                                    <option value="Shift_JIS"<?php echo set_select('encoding', 'Shift_JIS', ('Shift_JIS' === $language->encoding ? true : false)); ?>>Japanese (Shift_JIS)</option>
                                    <option value="EUC-JP"<?php echo set_select('encoding', 'EUC-JP', ('EUC-JP' === $language->encoding ? true : false)); ?>>Japanese (EUC-JP)</option>
                                    <option value="ISO-2022-JP"<?php echo set_select('encoding', 'ISO-2022-JP', ('ISO-2022-JP' === $language->encoding ? true : false)); ?>>Japanese (ISO-2022-JP)</option>
                                    <option value="windows-949"<?php echo set_select('encoding', 'windows-949', ('windows-949' === $language->encoding ? true : false)); ?>>Korean</option>
                                    <option value="ISO-8859-10"<?php echo set_select('encoding', 'ISO-8859-10', ('ISO-8859-10' === $language->encoding ? true : false)); ?>>Nordic (ISO-8859-10)</option>
                                    <option value="ISO-8859-16"<?php echo set_select('encoding', 'ISO-8859-16', ('ISO-8859-16' === $language->encoding ? true : false)); ?>>Romanian (ISO-8859-16)</option>
                                    <option value="ISO-8859-3"<?php echo set_select('encoding', 'ISO-8859-3', ('ISO-8859-3' === $language->encoding ? true : false)); ?>>South European (ISO-8859-3)</option>
                                    <option value="windows-874"<?php echo set_select('encoding', 'windows-874', ('windows-874' === $language->encoding ? true : false)); ?>>Thai</option>
                                    <option value="windows-1254"<?php echo set_select('encoding', 'windows-1254', ('windows-1254' === $language->encoding ? true : false)); ?>>Turkish</option>
                                    <option value="windows-1258"<?php echo set_select('encoding', 'windows-1258', ('windows-1258' === $language->encoding ? true : false)); ?>>Vietnamese (Windows-1258)</option>
                                    <option value="ISO-8859-15"<?php echo set_select('encoding', 'ISO-8859-15', ('ISO-8859-15' === $language->encoding ? true : false)); ?>>Western (ISO-8859-15)</option>
                                    <option value="macintosh"<?php echo set_select('encoding', 'macintosh', ('macintosh' === $language->encoding ? true : false)); ?>>Western (Macintosh)</option>
                                </select>
                                <span class="help-block"><?php echo $this->lang->line('encoding_desc'); ?></span>
                            </div>
                        </div>

                        <div class="control-group<?php echo (form_error('sort_order') ? ' error' : ''); ?>">
                            <label class="control-label"><?php echo $this->lang->line('sort_order'); ?></label>
                            <div class="controls">
                                <input type="text" name="sort_order" value="<?php echo set_value('sort_order', $language->sort_order); ?>" class="span6 m-wrap" />
                                <span class="help-block"><?php echo $this->lang->line('sort_order_desc'); ?></span>
                            </div>
                        </div>

                        <div class="control-group<?php echo (form_error('translable') ? ' error' : ''); ?>">
                            <label class="control-label"><?php echo $this->lang->line('translable'); ?></label>
                            <div class="controls">
                                <label class="radio"><input type="radio" name="translable" value="1"<?php echo set_radio('translable', '1', ('1' === $language->translable ? true : false)); ?> /> Yes</label>
                                <label class="radio"><input type="radio" name="translable" value="0"<?php echo set_radio('translable', '0', ('0' === $language->translable ? true : false)); ?> /> No</label>
                                <span class="help-block"><?php echo $this->lang->line('translable_desc'); ?></span>
                            </div>
                        </div>

                        <div class="control-group<?php echo (form_error('status') ? ' error' : ''); ?>">
                            <label class="control-label"><?php echo $this->lang->line('status'); ?></label>
                            <div class="controls">
                                <?php if ('POST' === @REQUEST_METHOD): ?>
                                <?php echo form_multiselect('status[]', config_item('status'), $this->input->post('status'), 'id="status" class="span6 select2"'); ?>
                                <?php else: ?>
                                <select name="status[]" id="status" class="span6 select2" multiple>
                                <?php foreach (config_item('status') as $index => $value): ?>
                                    <option value="<?php echo $index; ?>"<?php echo ($index & $language->status ? ' selected' : ''); ?>><?php echo $value; ?></option>
                                <?php endforeach; ?>
                                </select>
                                <?php endif; ?>

                                <!-- <select name="status[]" id="status" class="span6 select2" multiple>
                                    <option value="1"<?php echo set_select('status[]', '1', true); ?>>Active</option>
                                    <option value="2"<?php echo set_select('status[]', '2', false); ?>>Suppend</option>
                                    <option value="4"<?php echo set_select('status[]', '4', false); ?>>Deleted</option>
                                </select> -->

                                <span class="help-block" style="clear: both;"><?php echo $this->lang->line('status_desc'); ?></span>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn blue"><?php echo $this->lang->line('save'); ?></button>
                            <button type="reset" class="btn"><?php echo $this->lang->line('reset'); ?></button>
                        </div>
                    </form>

                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <!-- eof: dashboard stats -->
</div>
<!-- eof: dashboard -->