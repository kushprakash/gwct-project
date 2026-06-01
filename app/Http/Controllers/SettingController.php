<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first() ?? new Setting();
        return view('settings.index', compact('setting'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_title' => 'nullable|string|max:255',
            'website' => 'nullable|string|max:255',
            'company_logo' => 'nullable|image|max:2048',
            'registration_no' => 'nullable|string|max:255',
            'authorized_signatory' => 'nullable|string|max:255',
            'authorized_signatory_sign' => 'nullable|image|max:2048',
            'stamp_signature' => 'nullable|image|max:2048',
            'account_details' => 'nullable|string',
            'sms_config' => 'nullable|array',
            'email_config' => 'nullable|array',
            'theme_colors' => 'nullable|array',
        ]);

        $setting = Setting::first();
        if (!$setting) {
            $setting = new Setting();
        }

        $setting->company_title = $request->company_title;
        $setting->website = $request->website;
        $setting->registration_no = $request->registration_no;
        $setting->authorized_signatory = $request->authorized_signatory;
        $setting->account_details = $request->account_details;
        $setting->sms_config = $request->sms_config;
        $setting->email_config = $request->email_config;
        $setting->theme_colors = $request->theme_colors;

        if ($request->hasFile('company_logo')) {
            // Delete old if exists
            if ($setting->company_logo) {
                Storage::disk('public')->delete($setting->company_logo);
            }
            $setting->company_logo = $request->file('company_logo')->store('settings', 'public');
        }

        if ($request->hasFile('authorized_signatory_sign')) {
            if ($setting->authorized_signatory_sign) {
                Storage::disk('public')->delete($setting->authorized_signatory_sign);
            }
            $setting->authorized_signatory_sign = $request->file('authorized_signatory_sign')->store('settings', 'public');
        }

        if ($request->hasFile('stamp_signature')) {
            if ($setting->stamp_signature) {
                Storage::disk('public')->delete($setting->stamp_signature);
            }
            $setting->stamp_signature = $request->file('stamp_signature')->store('settings', 'public');
        }

        $setting->save();

        return redirect()->back()->with('success', 'Settings updated successfully.');
    }
}
