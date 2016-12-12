<?php

/* @var $this yii\web\View */
/* @var $pages \yii\data\Pagination */
/* @var $repository \app\models\Repositories */
/* @var $repositories array */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'Repositories';
?>
<div class="row">
    <div class="col-md-12">
        <?php if (Yii::$app->session->hasFlash('repositoryOperation')): ?>
            <?php $flash = Yii::$app->session->getFlash('repositoryOperation'); ?>
            <div role="alert" class="alert alert-contrast <?= $flash['type'] ?> alert-dismissible">
                <div class="icon"><span class="<?= $flash['icon'] ?>"></span></div>
                <div class="message">
                    <button type="button" data-dismiss="alert" aria-label="Close" class="close">
                        <span aria-hidden="true" class="mdi mdi-close"></span>
                    </button>
                    <strong><?= $flash['title'] ?></strong> <?= $flash['message'] ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="panel panel-default panel-table">
            <div class="panel-heading">
                <div class="tools">
                    <a href="<?= Url::toRoute(['add']) ?>"><span class="icon mdi mdi-collection-plus"></span></a>
                </div>
                <div class="title">Repository list</div>
            </div>
            <div class="panel-body">
                <?php if ($repositories): ?>
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Service</th>
                            <th>Repository</th>
                            <th>Local path</th>
                            <th>Auto update</th>
                            <th class="actions"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($repositories as $repository): ?>
                            <tr>
                                <td>
                                    <?= $repository->service->getServiceName() ?>:
                                    <?= $repository->service->username ?>
                                </td>
                                <td><?= $repository->name ?></td>
                                <td><?= Html::encode($repository->local_path); ?></td>
                                <td><?= $repository->getAutoUpdateStatus(); ?></td>
                                <td class="actions">
                                    <div class="btn-group btn-hspace">
                                        <button type="button" data-toggle="dropdown" class="btn btn-default dropdown-toggle">
                                            Action <span class="icon-dropdown mdi mdi-chevron-down"></span>
                                        </button>
                                        <ul role="menu" class="dropdown-menu pull-right">
                                            <li><a href="#">Details</a></li>
                                            <li><a href="#">Check new version</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#">Settings</a></li>
                                            <li><a href="#">Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                    <?= LinkPager::widget(['pagination' => $pages]); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
