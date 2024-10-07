<?php

declare(strict_types=1);

namespace JBSNewMedia\VisDemoPlugin;

use JBSNewMedia\VisDemoPlugin\DependencyInjection\VisDemoPluginExtension;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class VisDemoPlugin extends AbstractBundle
{
    public function getContainerExtension(): ?ExtensionInterface
    {
        if (null === $this->extension) {
            $this->extension = new VisDemoPluginExtension();
        }

        if (false === $this->extension) {
            return null;
        }

        return $this->extension;
    }

    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}
