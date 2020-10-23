<?php $v->layout("themes/template_dash") ?>
<div class="result"></div>

<?php $v->start("scripts"); ?>
    <script src="<?= asset("js/libs/chart.js"); ?>"></script>
    <script src="<?= asset("js/admin.js"); ?>"></script>
<?php $v->end(); ?>