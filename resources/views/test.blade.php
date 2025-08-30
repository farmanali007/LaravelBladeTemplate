@php
    $user = 'hello world';
@endphp

<script>
    // var user = @json($user);
    var user = {{ Js::from($user) }};
    console.log(user);
</script>
