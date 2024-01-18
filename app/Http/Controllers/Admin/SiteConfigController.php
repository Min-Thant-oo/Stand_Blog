<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SiteConfig;
use Illuminate\Http\Request;

class SiteConfigController extends Controller
{
    public function config() {
        return view('admin.config.config', [
            'siteconfig' => SiteConfig::find(1),
        ]);
    }

    public function configUpdate(SiteConfig $siteconfig) {
        $formData = request()->validate([
            'facebook' => 'required',
            'twitter' => 'required',
            'linkedIn' => 'required',
            'about' => 'required',
            'phonenumber' => 'required',
            'email' => 'required | email',
            'address' => 'required',
        ]);

        $siteconfig->update($formData);

        return redirect('/admin/Site-config')->with('success', 'Site Configuration Updated Successfully');
        
    }
}
