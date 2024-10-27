<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SiteConfigRequest;
use App\Models\SiteConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SiteConfigController extends Controller
{
    public function edit() 
    {
        return view('admin.config.edit', [
            'siteconfig' => SiteConfig::first(),
        ]);
    }

    public function update(SiteConfigRequest $request) 
    {
        $siteconfig = SiteConfig::first();
        $siteconfig->update($request->validated());

        Cache::forget('site_config');

        return back()->with('success', 'Site Configuration Updated Successfully');
        
    }
}
