<?php

namespace App\Livewire\Vendor;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public function mount()
    {
        if (!Auth::guard('vendor')->check()) {
            return redirect()->route('vendor.login')
                ->with('error', 'Please login as vendor first.');
        }

        // dd(Auth::guard('vendor')->user());
    }
    public function render()
    {
        return view('livewire.vendor.dashboard');
    }
}
