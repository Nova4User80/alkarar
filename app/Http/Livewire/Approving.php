<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Approving extends Component
{
    public function approve($id)
    {
      $u=  User::find($id);
      $u->approved=true;
      $u->save();
      return redirect('approving');
    }
    public function delete($id)
    {
        User::find($id)->delete();
        return redirect('approving');
    }
    public function render()
    {
        return view('livewire.approving',['users'=>User::where('approved',false)->get()]);
    }
}
