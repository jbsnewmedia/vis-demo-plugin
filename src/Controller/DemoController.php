<?php

declare(strict_types=1);

namespace JBSNewMedia\VisDemoPlugin\Controller;

use JBSNewMedia\VisBundle\Controller\VisAbstractController;
use JBSNewMedia\VisBundle\Service\Vis;
use Symfony\Component\HttpFoundation\Response;

class DemoController extends VisAbstractController
{
    public function __construct(protected Vis $vis)
    {
    }

    public function dashboard(): Response
    {
        $this->vis->setTool('demo');
        $this->vis->setRoute('demo', 'vis_demo_dashboard');

        return $this->render('@VisBundle/tool/dashboard.html.twig', [
            'vis' => $this->vis,
        ]);
    }

    public function tableDatatable(): Response
    {
        $this->vis->setTool('demo');
        $this->vis->setRoute('demo', 'vis_demo_table_datatable');

        return $this->render('@VisBundle/tool/dashboard.html.twig', [
            'vis' => $this->vis,
        ]);
    }
}
