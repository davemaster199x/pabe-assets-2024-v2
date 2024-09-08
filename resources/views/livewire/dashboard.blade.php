<div>
    <div class="container-fluid">
        <div class="col-xl-12 xl-100 dashboard-sec box-col-12">
            <div class="card earning-card" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                <div class="card-body" style="padding: 1.5rem;">
                    <h3 class="card-title mb-4">Check Details</h3>
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" style="border-collapse: separate; border-spacing: 0;">
                            <thead>
                                <tr style="background-color: #f8f9fa;">
                                    <th style="padding: 1rem; font-weight: 600; vertical-align: middle;">Asset</th>
                                    <th style="padding: 1rem; font-weight: 600; vertical-align: middle;">Date</th>
                                    <th style="padding: 1rem; font-weight: 600; vertical-align: middle;">Check No</th>
                                    <th style="padding: 1rem; font-weight: 600; vertical-align: middle;">Description</th>
                                    <th style="padding: 1rem; font-weight: 600; vertical-align: middle;">Amount</th>
                                    <th style="padding: 1rem; font-weight: 600; vertical-align: middle;">Due Date</th>
                                    <th style="padding: 1rem; font-weight: 600; vertical-align: middle;">Status</th>
                                    <th style="padding: 1rem; font-weight: 600; vertical-align: middle;">Bank</th>
                                    <th style="padding: 1rem; font-weight: 600; vertical-align: middle;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($checkDetails as $check)
                                    @php
                                        $today = \Carbon\Carbon::today();
                                        $dueDate = \Carbon\Carbon::parse($check->due_date)->startOfDay();
                                        $fiveDaysBeforeDue = $dueDate->copy()->subDays(5);
                                        $isPaid = $check->status == 'Paid';
                                        $isOverdue = $today->isAfter($dueDate);
                                        $isDueWithinFiveDays = $today->between($fiveDaysBeforeDue, $dueDate);

                                        if ($isPaid) {
                                            $rowStyle = 'background-color: #90EE90;'; // Green for paid
                                        } elseif ($isOverdue) {
                                            $rowStyle = 'background-color: #FF6961;'; // Red for overdue
                                        } elseif ($isDueWithinFiveDays) {
                                            $rowStyle = 'background-color: #FF6961;'; // Yellow for due within 5 days
                                        } else {
                                            $rowStyle = '';
                                        }
                                    @endphp
                                    <tr style="transition: background-color 0.3s ease; {{ $rowStyle }}">
                                        <td style="padding: 0.75rem 1rem; vertical-align: middle;">{{ $check->asset->description }} ({{ $check->asset->assets_tag_id }})</td>
                                        <td style="padding: 0.75rem 1rem; vertical-align: middle;">{{ $check->date }}</td>
                                        <td style="padding: 0.75rem 1rem; vertical-align: middle;">{{ $check->check_no }}</td>
                                        <td style="padding: 0.75rem 1rem; vertical-align: middle;">{{ $check->description }}</td>
                                        <td style="padding: 0.75rem 1rem; vertical-align: middle;">{{ $check->amount }}</td>
                                        <td style="padding: 0.75rem 1rem; vertical-align: middle;">{{ $check->due_date }}</td>
                                        <td style="padding: 0.75rem 1rem; vertical-align: middle;">{{ $check->status }}</td>
                                        <td style="padding: 0.75rem 1rem; vertical-align: middle;">{{ $check->bank }}</td>
                                        <td style="padding: 0.75rem 1rem; vertical-align: middle;">
                                            <button wire:click="openModal({{ $check->id }})" class="btn btn-primary btn-sm">Update</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" style="text-align: center; padding: 1rem;">No check details available.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $checkDetails->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    @if($showModal)
    <div class="modal fade show" style="display: block; background-color: rgba(0,0,0,0.5);" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Check Details</h5>
                    <button type="button" class="close" wire:click="closeModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="updateCheck">
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="date" wire:model="editingCheck.date">
                            @error('editingCheck.date') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="check_no">Check No</label>
                            <input type="text" class="form-control" id="check_no" wire:model="editingCheck.check_no">
                            @error('editingCheck.check_no') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="description" class="form-control" rows="3" wire:model="editingCheck.description"></textarea>
                            @error('editingCheck.description') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="text" class="form-control" id="amount" wire:model="editingCheck.amount">
                            @error('editingCheck.amount') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="due_date">Due Date</label>
                            <input type="date" class="form-control" id="due_date" wire:model="editingCheck.due_date">
                            @error('editingCheck.due_date') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" wire:model="editingCheck.status">
                                <option value="Pending">Pending</option>
                                <option value="Paid">Paid</option>
                            </select>
                            @error('editingCheck.status') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="bank">Bank</label>
                            <select id="bank" class="form-select" wire:model="editingCheck.bank">
                                <option value="">Select Bank</option>
                                <option value="BDO">BDO (Banco de Oro)</option>
                                <option value="BPI">BPI (Bank of the Philippine Islands)</option>
                                <option value="Metrobank">Metrobank</option>
                                <option value="Landbank">Landbank of the Philippines</option>
                                <option value="PNB">Philippine National Bank (PNB)</option>
                                <option value="RCBC">RCBC (Rizal Commercial Banking Corporation)</option>
                                <option value="Security Bank">Security Bank</option>
                                <option value="UnionBank">UnionBank of the Philippines</option>
                                <option value="China Bank">China Bank</option>
                                <option value="EastWest Bank">EastWest Bank</option>
                                <option value="UCPB">United Coconut Planters Bank (UCPB)</option>
                            </select>
                            @error('editingCheck.bank') <span class="text-danger">{{ $message }}</span> @enderror
                        </div><br>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif

    @push('scripts')
        <script>
            document.getElementById('dashboard-navbar').classList.add('active');

            function updateTime() {
                const today = new Date();
                let hours = today.getHours();
                let minutes = today.getMinutes();
                let seconds = today.getSeconds();
                let ampm = hours >= 12 ? 'PM' : 'AM';
                hours = hours % 12;
                hours = hours ? hours : 12; // the hour '0' should be '12'
                minutes = checkTime(minutes);
                seconds = checkTime(seconds);
                document.getElementById('txt').innerHTML = hours + ":" + minutes + ":" + seconds + " " + ampm;
            }

            function checkTime(i) {
                if (i < 10) {
                    i = "0" + i
                }; // add zero in front of numbers < 10
                return i;
            }

            // Update the time every second
            setInterval(updateTime, 1000);

            // Call the function once initially to avoid delay
            updateTime();
        </script>
    @endpush
</div>
