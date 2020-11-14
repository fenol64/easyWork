<?php $v->layout("themes/template_dash") ?>
<?php $v->start("css"); ?>
    <link rel="stylesheet" href="<?= asset("css/partner_index.css"); ?>">
<?php $v->end(); ?>
<div class="view_partner"></div>
<?php $v->start("scripts"); ?>
    <script src="<?= asset("js/partners_reqs.js"); ?>"></script>
<?php $v->end(); ?> 