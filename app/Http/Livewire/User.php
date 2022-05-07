<?php

namespace App\Http\Livewire;

use App\Models\User as ModelsUser;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class User extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $name;
    public $Editname;
    public $email;
    public $password;
    public $confirmPassword;
    public $userId;

    protected $listeners = [
        'store' => 'handleStore',
        'update' => 'handleUpdate',
        'delete' => 'handleDelete',
    ];

    public function render()
    {
        return view('livewire.user', ['user' => ModelsUser::orderBy('created_at', 'desc')->paginate(4)]);
    }

    public function create()
    {
        $this->validate([
            'name' => 'required|max:255|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:16',
            'confirmPassword' => 'required|same:password'
        ]);
        $store = new ModelsUser();
        $store->name = $this->name;
        $store->email = $this->email;
        $store->password = Hash::make($this->password);
        $store->save();
        $this->emit('store');
    }

    public function handleStore()
    {
        session()->flash('message', 'success create!');
        $this->resetValue();
    }

    public function resetValue()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->confirmPassword = '';
        $this->resetValidation();
    }

    public function edit($id)
    {
        $this->userId = $id;
        $data = ModelsUser::find($id);
        $this->Editname = $data->name;
    }

    public function update()
    {
        $update = ModelsUser::find($this->userId);
        $update->name = $this->Editname;
        $update->save();
        $this->emit('update');
    }

    public function handleUpdate()
    {
        session()->flash('message', 'success update!');
        $this->resetValue();
    }

    public function delete($id)
    {
        $this->userId = $id;
        $data = ModelsUser::find($id);
        $this->Editname = $data->name;
    }

    public function destroy()
    {
        $delete = ModelsUser::find($this->userId);
        $delete->delete();
        $this->emit('delete');
    }

    public function handleDelete()
    {
        session()->flash('message', 'success delete!');
        $this->resetValue();
    }
}
