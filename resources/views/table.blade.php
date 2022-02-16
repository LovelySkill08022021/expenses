<table class="table table-bordered w-100">
    <thead class="table-light">
        <tr>
            <th>Description</th>
            <th>Amount</th>
            <th>Date and Time</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($logs as $log)
            <tr>
                <td>{{$log->description}}</td>
                <td>P {{$log->amount}}</td>
                <td>{{date('D, M d, Y h:i A', strtotime($log->created_at))}}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="text-end">
    Total: P {{$total}}
</div>