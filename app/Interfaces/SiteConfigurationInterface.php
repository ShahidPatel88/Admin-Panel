<?php

namespace App\Interfaces;

interface SiteConfigurationInterface
{
    public function getAllConfigurations();

    public function getSiteConfigurationsArray();

    public function updateConfigurations($request);
}
