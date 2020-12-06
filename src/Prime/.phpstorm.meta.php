<?php

namespace PHPSTORM_META;

use Flasher\Prime\Envelope;
use Flasher\Prime\Flasher;
use Flasher\Prime\Notification\NotificationInterface;
use Flasher\Prime\Presenter\PresenterManager;
use Flasher\Prime\Renderer\RendererManager;

override(Envelope::get(), type(0));
override(ManagerInterface::make(0), map(['' => '@']));

registerArgumentsSet('notificationTypes',
    NotificationInterface::TYPE_SUCCESS,
    NotificationInterface::TYPE_ERROR,
    NotificationInterface::TYPE_INFO,
    NotificationInterface::TYPE_INFO,
);

expectedArguments(NotificationBuilder::type(), 1, argumentsSet('notificationTypes'));
expectedReturnValues(NotificationInterface::setType(), 1, argumentsSet('notificationTypes'));
expectedReturnValues(NotificationInterface::getType(), argumentsSet('notificationTypes'));