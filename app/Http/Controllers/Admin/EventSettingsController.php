<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventSetting;
use Illuminate\Http\Request;

class EventSettingsController extends Controller
{
    public function index()
    {
        $settings = EventSetting::firstOrCreate([]);
        return view('admin.other.events', compact('settings'));
    }

    public function update(Request $request)
    {
        $rules = [
            'event_name' => ['required', 'string', 'in:halloween,snow'],
            'is_enabled' => ['boolean'],
            'start_date' => ['nullable', 'date_format:Y-m-d'],
            'end_date' => ['nullable', 'date_format:Y-m-d', 'after_or_equal:start_date'],
        ];

        $request->validate($rules);

        $settings = EventSetting::firstOrCreate([]);

        if ($request->event_name === 'halloween') {
            if ($request->has('is_enabled')) {
                $settings->is_halloween_enabled = $request->is_enabled;
            }
            if ($request->has('start_date')) {
                $settings->halloween_start_date = $request->start_date;
            }
            if ($request->has('end_date')) {
                $settings->halloween_end_date = $request->end_date;
            }
        } elseif ($request->event_name === 'snow') {
            if ($request->has('is_enabled')) {
                $settings->is_snow_enabled = $request->is_enabled;
            }
            if ($request->has('start_date')) {
                $settings->snow_start_date = $request->start_date;
            }
            if ($request->has('end_date')) {
                $settings->snow_end_date = $request->end_date;
            }
        }

        $settings->save();

        return response()->json(['success' => true, 'message' => 'Настройка обновлена.']);
    }
}