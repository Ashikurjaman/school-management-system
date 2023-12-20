@if (!empty(session('error')))
<div class="alert alert-danger " role="alert">
    {{session('error')}}
</div>

@endif
@if (!empty(session('success')))
<div class="alert alert-success " role="alert">
    {{session('success')}}
    <script>
    // Set a timeout to hide the warning message after 5 seconds (adjust as needed)
    setTimeout(function() {
        document.getElementsByClassName('alert').style.display = 'none';
    }, 5000); // 5000 milliseconds = 5 seconds
</script>

</div>

@endif

@if (!empty(session('warning')))
<div class="alert alert-warning " role="alert">
    {{session('warning')}}
</div>


@endif

<script>
    // Set a timeout to hide the warning message after 5 seconds (adjust as needed)
    setTimeout(function() {
        document.getElementsByClassName('alert').style.display = 'none';
    }, 5000); // 5000 milliseconds = 5 seconds
</script>
