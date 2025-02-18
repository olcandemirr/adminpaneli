<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    
    public function index()
    {
        $settings = Setting::all();
        $settingsArray = $settings->pluck('value', 'key')->toArray();
        return view('admin.settings.index', compact('settingsArray'));
    }

    
    public function store(Request $request)
    {
        $data = $request->all();
        $this->updateSetting('site_title', $data['site_title'] ?? '');
        $this->updateSetting('site_description', $data['site_description'] ?? '');
        $this->updateSetting('admin_email', $data['admin_email'] ?? '');
        $this->updateSetting('analytics_code', $data['analytics_code'] ?? '');
        return redirect()->route('settings.index')->with('success', 'Ayarlar güncellendi!');
    }

    private function updateSetting($key, $value)
    {
        $setting = Setting::where('key', $key)->first();
        if (!$setting) {
            
            Setting::create([
                'key' => $key,
                'value' => $value
            ]);
        } else {
            
            $setting->value = $value;
            $setting->save();
        }
    }
}
