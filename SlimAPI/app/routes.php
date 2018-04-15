<?php

$app->route(['GET', 'PUT'], '/article[/{id}]', \App\Controllers\ArticleController::class);
