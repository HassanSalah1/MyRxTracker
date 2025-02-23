@if ($receiptUrl)
    <iframe src="{{ $receiptUrl }}" style="text-align: center" width="100%" height="600px"></iframe>
@else
    <p>No receipt available.</p>
@endif
