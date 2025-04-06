@php
    $alertTypes = [
        'success' => 'success',
        'error' => 'error',
        'warning' => 'warning',
        'info' => 'info',
        'status' => 'info',
    ];

    $sessionType = null;
    foreach ($alertTypes as $key => $type) {
        if (session()->has($key)) {
            $sessionType = $key;
            break;
        }
    }

    $message = $sessionType ? session($sessionType) : null;
@endphp

@if ($sessionType && $message)
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                icon: "{{ $alertTypes[$sessionType] }}",
                title: "{{ ucfirst($alertTypes[$sessionType]) }}",
                text: "{{ $message }}",
                confirmButtonColor: "#3085d6"
            });
        });
    </script>
@endif
