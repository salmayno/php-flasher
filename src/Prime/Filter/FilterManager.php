<?php

namespace Flasher\Prime\Filter;

use Flasher\Prime\Manager\AbstractManager;

final class FilterManager extends AbstractManager implements FilterManagerInterface
{
    protected function getDefaultDriver()
    {
        return $this->config->get('default_filter', 'default');
    }
}