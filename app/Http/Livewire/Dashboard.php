<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CheckDetail;
use Carbon\Carbon;

class Dashboard extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public $perPage = 10;
    public $showModal = false;
    public $editingCheckId;
    public $editingCheck = [
        'date' => '',
        'check_no' => '',
        'description' => '',
        'amount' => '',
        'due_date' => '',
        'status' => '',
        'bank' => '',
    ];

    protected $rules = [
        'editingCheck.date' => 'required|date',
        'editingCheck.check_no' => 'required|string',
        'editingCheck.description' => 'required|string',
        'editingCheck.amount' => 'required|numeric',
        'editingCheck.due_date' => 'required|date',
        'editingCheck.status' => 'required|string',
        'editingCheck.bank' => 'required|string',
    ];

    public function openModal($checkId)
    {
        $this->editingCheckId = $checkId;
        $check = CheckDetail::findOrFail($checkId);
        $this->editingCheck = $check->toArray();
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->editingCheckId = null;
        $this->editingCheck = [
            'date' => '',
            'check_no' => '',
            'description' => '',
            'amount' => '',
            'due_date' => '',
            'status' => '',
            'bank' => '',
        ];
    }

    public function updateCheck()
    {
        $this->validate();

        $check = CheckDetail::findOrFail($this->editingCheckId);
        $check->update($this->editingCheck);

        $this->closeModal();
        session()->flash('message', 'Check details updated successfully.');
    }

    public function render()
    {
        $checkDetails = CheckDetail::with('asset')
                               ->orderBy('due_date', 'asc')
                               ->paginate($this->perPage);

        return view('livewire.dashboard', [
            'checkDetails' => $checkDetails
        ]);
    }
}