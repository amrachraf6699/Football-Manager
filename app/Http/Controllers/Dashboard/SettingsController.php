<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\UpdateSettingsRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Setting::first();

        return view('dashboard.settings.index' , compact('settings'));
    }

    public function store(UpdateSettingsRequest $request)
    {
        $settings = Setting::first();


        if ($settings)
        {
            $settings->update($request->all());

            if ($request->hasFile('logo'))
            {
                $settings->update([
                    'logo' => $this->uploadFile($request->logo , 'settings')
                ]);
            }
        }
        else
        {
            $settings = new Setting($request->all());

            if ($request->hasFile('logo'))
            {
                $settings->logo = $this->uploadFile($request->logo , 'settings');
            }

            $settings->save();
        }

        return redirect()->route('dashboard.home')->with('success' , 'تم تحديث الاعدادات بنجاح');
    }
}
