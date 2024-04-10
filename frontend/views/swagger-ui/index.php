<?php

use app\assets\SwaggerUiAsset;

$this->title = 'Документация API';
$this->params['breadcrumbs'][] = $this->title;

SwaggerUiAsset::register($this);

?>

<div id="swagger-ui"></div>

<script>
    window.onload = function() {
        const ui = SwaggerUIBundle({
            url: '/yii-application3/frontend/web/api/v1/get-spec',
            dom_id: '#swagger-ui',
            presets: [SwaggerUIBundle.presets.apis, SwaggerUIStandalonePreset],
            layout: 'StandaloneLayout',
            validatorUrl: null,
        });
    }
</script>
