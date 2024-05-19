
<!DOCTYPE html>
<html lang="en">
@livewire('doctor-search')
<head>
    <title>Doctors List</title>


    @livewireStyles
</head>

<body>
<input type="text" class="form-control" placeholder="Search" wire:model.debounce.500ms="search">

@livewireScripts
</body>
</div>

</html>

