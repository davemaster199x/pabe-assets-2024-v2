<div>
    <h2 class="text-2xl font-bold mb-4">Transaction Report</h2>

    <div class="mb-4 flex items-center space-x-4">
        <div>
            <label for="dateRangeFrom" class="mr-2">Date Range From:</label>
            <input wire:model="dateRangefrom" id="dateRangeFrom" type="date" class="form-control" style="width: 200px;">
        </div><br>
        <div>
            <label for="dateRangeTo" class="mr-2">Date Range To:</label>
            <input wire:model="dateRangeto" id="dateRangeTo" type="date" class="form-control" style="width: 200px;">
        </div>
        <br>
        <button type="button" class="btn btn-primary" wire:click="generate_report">Generate</button>
    </div>

    @push('scripts')
        <script>
            document.getElementById('reports-navbar').classList.add('active');

            document.addEventListener('livewire:load', function () {
                Livewire.on('invalid_date', function () {
                    swal(
                        "Error!", "Invalid date range. 'From' date must be earlier than or equal to 'To' date.", "error"           
                    );
                });

                Livewire.on('reportGenerated', function (data) {
                    var link = document.createElement('a');
                    link.href = data.url;
                    link.download = data.filename;
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                });

                Livewire.on('check_asset', function (data) {
                    console.log(data.asset);
                });
            });
        </script>
    @endpush
</div>