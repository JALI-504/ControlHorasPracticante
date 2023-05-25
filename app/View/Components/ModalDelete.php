<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ModalDelete extends Component
{
    public string $id;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $id)
    {
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal-delete');
    }
}
