<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\WebsiteModel;

abstract class BaseController extends Controller
{
    protected $request;
    protected $websiteModel;
    protected $settings;

    public function initController(
        RequestInterface $request,
        ResponseInterface $response,
        LoggerInterface $logger
    ) {
        parent::initController($request, $response, $logger);

        $this->request = $request;

        // Anti bot (optional, tapi aman)
        $agent = $request->getUserAgent();
        if ($agent && preg_match(
            '/webzip|httrack|wget|flickbot|downloader|production bot|superbot|personapilot|npbot|webcopier|netzip|turnitinbot|full web bot|zeus/i',
            $agent->getAgentString()
        )) {
            exit('- 404?');
        }

        // Load model & settings sekali
        $this->websiteModel = new WebsiteModel();
        $this->settings     = $this->websiteModel->first();
    }

    /**
     * Ambil settings website
     */
    protected function getSettingsData()
    {
        return $this->settings;
    }

    /**
     * Render view dengan data website otomatis
     */
    protected function renderView(string $view, array $data = [])
    {
        $data['web'] = $this->settings;
        return view($view, $data);
    }
}
