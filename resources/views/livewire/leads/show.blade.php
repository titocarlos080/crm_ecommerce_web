@if($vistacrear)
<livewire:leads.create>
    @elseif($vistaedit)
    <livewire:leads.edit>
        @else
        <div>

            todos los leads


        </div>
        @endif