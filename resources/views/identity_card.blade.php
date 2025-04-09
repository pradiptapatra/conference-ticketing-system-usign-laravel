<!DOCTYPE html>
<html>
<head>
    <title>Identity Card</title>
</head>
<body>
    <h1>Conference Identity Card</h1>
    <p>Name: {{ $ticket->user->name }}</p>
    <p>Session: {{ $ticket->session->title }}</p>
    <p>Speakers: {{ $ticket->session->speakers->pluck('name')->implode(', ') }}</p>
    <p>Seat: Row {{ $ticket->seat->row }}, Column {{ $ticket->seat->column }}</p>
    @if ($qrImage)
        <img src="{{ $qrImage }}" alt="QR Code">
    @else
        <p>QR Code not found</p>
    @endif
</body>
</html>