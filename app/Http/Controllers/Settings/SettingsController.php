<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\ChangeLangRequest;
use App\Http\Requests\Settings\ChangeThemeRequest;
use App\Http\Requests\Settings\StoreRequest;
use App\Models\UserModelSettings;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use function Pest\Laravel\json;

class SettingsController extends Controller
{
    public function changeLanguage(Request $request)
    {
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);

        return redirect()->back();
    }

    public function changeTheme(ChangeThemeRequest $request)
    {
        $data = $request->validated();
        session()->put('theme', $data['theme']);

        return redirect()->back();
    }

    public function changeSidebar(Request $request)
    {
        session()->put('show_sidebar', $request->show_sidebar);

        return redirect()->back();
    }

    public function store(StoreRequest $request)
    {
        $validated  = $request->except(['_token']);
        $settings = UserModelSettings::where('user_id', Auth::id())->first();
        if ($settings) {
            $settings->update($validated);
        } else {
            UserModelSettings::create($validated);
        }

        session()->put('settings', $validated);
    }
}
