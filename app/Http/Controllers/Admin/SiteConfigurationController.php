<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\SiteConfigurationInterface;
use Illuminate\Http\Request;

class SiteConfigurationController extends Controller
{
    protected $siteConfigurationsRepository;

    public function __construct(SiteConfigurationInterface $siteConfigurationsRepository)
    {
        $this->siteConfigurationsRepository = $siteConfigurationsRepository;
    }

    public function index()
    {
        $site_configurations = $this->siteConfigurationsRepository->getAllConfigurations();
        return view('backend.site-configuration.index',compact('site_configurations'));
    }

    public function updateSiteConfiguration(Request $request)
    {
        $this->siteConfigurationsRepository->updateConfigurations($request);
        return redirect()->route('admin.site-configuration')->with('success', 'Data Updated Successfully.');
    }
}
