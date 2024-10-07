<?php

declare(strict_types=1);

namespace JBSNewMedia\VisDemoPlugin\Plugin;

use JBSNewMedia\VisBundle\Entity\Sidebar\SidebarHeader;
use JBSNewMedia\VisBundle\Entity\Sidebar\SidebarItem;
use JBSNewMedia\VisBundle\Entity\Tool;
use JBSNewMedia\VisBundle\Plugin\AbstractPlugin;
use JBSNewMedia\VisBundle\Service\Vis;
use Symfony\Contracts\Translation\TranslatorInterface;

class DemoPlugin extends AbstractPlugin
{
    public function __construct(protected Vis $vis, protected TranslatorInterface $translator)
    {
        parent::__construct();
    }

    public function init(): void
    {
        $tool = new Tool('demo');
        $tool->setTitle($this->translator->trans('main.title', domain: 'vis_demo'));
        $tool->addRole('ROLE_VIS_DEMO');
        $this->vis->addTool($tool);
    }

    public function setNavigation(): void
    {
        $item = new SidebarHeader('demo', 'header_main', 'Main');
        $item->addRole('ROLE_VIS_DEMO');
        $this->vis->addSidebar($item);

        $item = new SidebarItem('demo', 'dashboard', 'Dashboard', 'vis_demo_dashboard');
        $item->generateIcon('fa-fw fa-solid fa-house');
        $item->generateBadge('Error', 'danger');
        $item->generateCounter('5', 'secondary');
        $item->addRole('ROLE_VIS_DEMO');
        $this->vis->addSidebar($item);

        $item = new SidebarItem('demo', 'vis', 'Vis');
        $item->generateIcon('fa-fw fa-solid fa-house');
        $item->addRole('ROLE_VIS_DEMO');
        $this->vis->addSidebar($item);

        $item = new SidebarItem('demo', 'user', 'User', 'vis_demo_user');
        $item->generateIcon('fa-fw fa-solid fa-house');
        $item->generateBadge('Error', 'danger');
        $item->generateCounter('5', 'secondary');
        $item->setParent('vis');
        $item->addRole('ROLE_VIS_DEMO');
        $this->vis->addSidebar($item);

        $item = new SidebarItem('demo', 'vis2', 'Vis2', 'vis_demo_user');
        $item->generateIcon('fa-fw fa-solid fa-house');
        $item->setParent('vis');
        $item->addRole('ROLE_VIS_DEMO');
        $this->vis->addSidebar($item);

        $item = new SidebarItem('demo', 'user2', 'User2', 'vis_demo_user');
        $item->generateIcon('fa-fw fa-solid fa-house');
        $item->generateBadge('Error', 'danger');
        $item->generateCounter('5', 'secondary');
        $item->setParent('vis-vis2');
        $item->addRole('ROLE_VIS_DEMO');
        $this->vis->addSidebar($item);
    }
}
