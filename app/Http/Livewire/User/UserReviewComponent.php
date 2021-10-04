<?php

namespace App\Http\Livewire\User;

use App\Models\photo;
use Livewire\Component;

class UserReviewComponent extends Component
{
    public $photo_id;

    public function mount($photo_id)
    {
        $this->photo_id = $photo_id;
    }
    public function render()
    {
        $photo = photo::find($this->photo_id);
        return view('livewire.user.user-review-component', ['photo' => $photo])->layout('layout.app');
    }
}
