<?php

namespace app\commands;

use Yii;
use yii\console\Controller;
/**
 * Инициализатор RBAC выполняется в консоли php yii rbac/init
 */
class RbacController extends Controller {

    public function actionInit() {
        $auth = Yii::$app->authManager;

        $auth->removeAll(); //На всякий случай удаляем старые данные из БД...

        // Создадим роли админа, инкассатора, ремонтника
        $admin = $auth->createRole('admin');
        $inkass = $auth->createRole('inkass');
        $repair = $auth->createRole('repair');

        // запишем их в БД
        $auth->add($admin);
        $auth->add($inkass);
        $auth->add($repair);

        // Создаем разрешения. Например, просмотр админки viewAdminPage инкассация и ремонт
        $viewAdminPage = $auth->createPermission('viewAdminPage');
        $viewAdminPage->description = 'Просмотр админки';

        $updateInkass = $auth->createPermission('updateInkass');
        $updateInkass->description = 'Инкассация';

        $updateRepair = $auth->createPermission('updateRepair');
        $updateRepair->description = 'Ремонт';

        // Запишем эти разрешения в БД
        $auth->add($viewAdminPage);
        $auth->add($updateInkass);
        $auth->add($updateRepair);

        // Теперь добавим наследования.

        // Роли «Инкассатора» присваиваем разрешение «Инкассация»
        $auth->addChild($inkass,$updateInkass);

        // Роли «Ремонтник» присваиваем разрешение «Ремонт»
        $auth->addChild($repair,$updateRepair);

        // админ наследует все роли
        $auth->addChild($admin, $updateInkass);
        $auth->addChild($admin, $updateRepair);

        // Еще админ имеет собственное разрешение - «Просмотр админки»
        $auth->addChild($admin, $viewAdminPage);

        // Назначаем роль admin пользователю с ID 1
        $auth->assign($admin, 1);

        // Назначаем роль инкассатора пользователю с ID 2
        $auth->assign($inkass, 2);

        // Назначаем роль инженера пользователю с ID 3
        $auth->assign($repair, 3);
    }
}